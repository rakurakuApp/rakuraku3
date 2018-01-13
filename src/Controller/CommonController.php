<?php
/**
 * Created by PhpStorm.
 * User: 15110005
 * Date: 2017/11/08
 * Time: 9:56
 */

namespace App\Controller;

use App\Model\Entity\Photo;
use Cake\Core\Exception\Exception;
use Cake\ORM\TableRegistry;


class CommonController extends AppController
{
    public $helpers = ['Paginator' => ['templates' => 'paginator-templates']];

    public function initialize()
    {
        /*初期化*/
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('SQL');
        $this->loadComponent('TOOL');
        $this->loadModel('Children');
        $this->loadModel('Patron');
        $this->loadmodel('Reason');
        $this->loadmodel('Favorite');
        $this->loadmodel('Face');
        $this->loadmodel('Photos');
        $this->loadmodel('Events');
    }

    public function photolist()
    {
        $paginate = [
            'limit' => 8
        ];

        //サブクエリ使用テスト
        //サブクエリ2
        $getChildrenQuery = $this->Children->find()
            ->select(['Children.id'])
            ->where(['Children.deleted' => 0])//未削除
            ->andwhere(['Children.patron_number' => $this->request->getSession()->read('id')]); //ログイン中親アカウント
        if (!empty($this->request->getData('児童名選択'))) {  //児童名
            $getChildrenQuery->where(['Children.id' => ($this->request->getData('児童名選択(プルダウン)'))]);
        }
        //サブクエリ1
        $getFaceQuery = $this->Face->find()
            ->select(['Face.id'])
            ->where(['Face.children_id IN' => $getChildrenQuery]); //未削除
        //主クエリ
        $getPhotoQuery = $this->Photos->find()
            ->select(['Photos.id'])
            ->where(['Photos.deleted' => 0])//未削除
            ->andwhere(['Photos.id IN' => $getFaceQuery]);
        if (!empty($this->request->getData('イベントフォーム(プルダウン)'))) {  //イベント検索
            $getPhotoQuery->where(['Photos.event_id' => $this->request->getData('イベントフォーム(プルダウン)')]);
        }
        if (empty($this->request->getData('集合写真チェックフォーム'))) { //集合写真検索
            $getPhotoQuery->where(['Photos.gathered' => 0]);
        } else {
            $getPhotoQuery->where(['Photos.gathered' => 1]);
        }
        if (!empty($this->request->getData('お気に入りチェック'))) {  //お気に入り
            //サブクエリ3
            $getFavoriteQuery = $this->Favorite->find()
                ->select(['Favorite.photos_id'])
                ->where(['Favorite.patron_number' => $this->request->getSession()->read('id')]);
            $getPhotoQuery->where(['Photos.id IN' => $getFavoriteQuery]);
        }
        $this->set('array', $getPhotoQuery->toArray());

        //(selectフォーム用)ログイン中の親の児童名とID取得
        $getChildrenQuery->select(['Children.username']);
        $this->set('childName', $this->paginate($getChildrenQuery)->toArray());

        //(selectフォーム用)登録イベント名とID取得
        $getEventsQuery = $this->Events->find('all');
        $this->set('events', $getEventsQuery);

        //問い合わせ理由の一覧取得
        $reason = TableRegistry::get('reason');
        $detail = $reason->find()->select('detail')->all();
        $this->set('detail', $detail->toArray());

        //ajax通信を受信した場合
        if ($this->request->is('ajax')) {
            $this->autoRender = false;

            //モーダルオープン時に対象写真のID取得
            if (!empty($this->request->getData('photoID'))) {
                $query = $this->Favorite->find()
                    ->where([
                        'Favorite.photos_id' => $this->request->getData('photoID'),
                        'Favorite.patron_number' => $this->request->getSession()->read('id')
                    ])
                    ->toArray();
                if (count($query)) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            }
            $result = '';   //結果出力文字
            //お気に入り追加処理
            if (!empty($this->request->getData('star')) && !empty($this->request->getData('order'))) {
                try {
                    if ($this->request->getData('order') == 'insert') {
                        //Insert処理
                        $favoriteTable = TableRegistry::get('Favorite');
                        $favorite = $favoriteTable->newEntity();
                        //データ項目の挿入
                        $favorite->photos_id = $this->request->getData('star');
                        $favorite->patron_number = $this->request->getSession()->read('id');
                        $favoriteTable->save($favorite);
                        $result = 'お気に入り登録しました。';
                        echo $result;
                    } else if ($this->request->getData('order') == 'delete') {
                        //Delete処理
                        $this->Favorite->find()
                            ->delete()
                            ->where([
                                'Favorite.photos_id' => $this->request->getData('star'),
                                'Favorite.patron_number' => $this->request->getSession()->read('id')
                            ])
                            ->execute();
                        $result = 'お気に入り登録を解除しました。';
                        echo $result;
                    } else {
                        $result = '"処理に失敗しました。\n一度画面を更新してみてください。';
                        echo $result;
                    }
                } catch (Exception $e) {
                    echo $e;
                }

            }
        }

    }

    public function inquirysend()
    {
        $this->log('aaaa');
        $this->autoRender = FALSE; //ページの自動レンダリング機能をオフにする
        $name = $this->request->getData(); //POSTで受け取った名前
        $name = htmlspecialchars($name); //フォーム欄のコード埋め込みを防ぐ
        $name = 'aa';
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);;

        try //実行
        {
            $Inquirytable = TableRegistry::get('InquiryTable'); //テーブルを取得
            $query = $Inquirytable->query(); //テーブルでクエリ文を使用することを宣言
            $query->insert(['reason_id'])//NAMEとPWの二つのカラムにデータを挿入する文

            ->execute(); //実行

            echo('0'); //データ登録成功
        } catch (Exception $e) //例外
        {
            echo('1'); //データ登録失敗（0とか1に特に意味はない）
        }
    }

    public function index(){}
    public function deleterecord()
    {
        if ($this->request->is('post')) {
            try {
                $entity = $this->Patron->get($this->request->getData('number'));

            } catch (Exception $e) {

            }
        }
    }
    public function inquiry(){}
    public function hoge(){}
}
