<?php
/**
 * Created by PhpStorm.
 * User: 15110005
 * Date: 2017/11/08
 * Time: 9:56
 */

namespace App\Controller;

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
    }

    public function photolist()
    {
        $paginate = [
            'limit' => 8
        ];

        $id = $this->TOOL->loadSessionId();
        $children = $this->SQL->getChildrenID($id);
        $photo = $this->SQL->getPhotoID($children);
        $photo_path = $this->Paginator->paginate($this->SQL->getPhotoPath($photo), $paginate);

        $this->set('array', $photo_path->toList());

        //問い合わせ理由の一覧取得
        $reason = TableRegistry::get('reason');
        $detail = $reason->find()->select('detail')->all();
        $this->set('detail', $detail->toArray());

        //ajax通信を受信した場合
        if ($this->request->is('ajax')) {
            //お気に入り追加処理
            if (!empty($this->request->getData('star')) && !empty($this->request->getData('order'))) {
                if ($this->request->getData('order') == 'insert') {
                    //Insert処理
                    $favoriteTable = TableRegistry::get('Favorite');
                    $favorite = $favoriteTable->newEntity();
                    //データ項目の挿入
                    $favorite->photos_id = $this->request->getData('star');
                    $favorite->patron_number = $this->request->getSession()->read('id');
                    $favoriteTable->save($favorite);
                } else if ($this->request->getData('order') == 'delete') {
                    //Delete処理
                    $query = $this->Favorite->find()
                        ->delete()
                        ->where([
                            'Favorite.photos_id' => $this->request->getData('star'),
                            'Favorite.patron_number' => $this->request->getSession()->read('id')
                        ])
                        ->execute();
                }
            }
        }

    }

    public
    function inquirysend()
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

    public
    function index()
    {
    }

    public
    function deleterecord()
    {
        if ($this->request->is('post')) {
            try {
                $entity = $this->Patron->get($this->request->getData('number'));

            } catch (Exception $e) {

            }
        }
    }

    public
    function inquiry()
    {
    }

    public
    function hoge()
    {
    }
}
