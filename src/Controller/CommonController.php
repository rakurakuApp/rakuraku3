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
        $photo_path = $this->Paginator->paginate($this->SQL->getPhotoPath($photo),$paginate);

        $this->set('array',$photo_path->toArray());

        //ajax通信を受信した場合
        $query = $this->Favorite->find()
            ->select(["Favorite.id"])
            ->where([
                "Favorite.photos_id" => 1,
                "Favorite.patron_number" => $this->request->getSession()->read('Auth.User.number')
            ])
            ->execute();
        print_r($query);
//        $this->set("a",$query);
    }

    public function inquirysend()
    {
        $this->log('aaaa');
        $this->autoRender=FALSE; //ページの自動レンダリング機能をオフにする
       $name=$this->request->getData(); //POSTで受け取った名前
        $name=htmlspecialchars($name); //フォーム欄のコード埋め込みを防ぐ
        $name = 'aa';
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);;

        try //実行
        {
        $Inquirytable=TableRegistry::get('InquiryTable'); //テーブルを取得
           $query=$Inquirytable->query(); //テーブルでクエリ文を使用することを宣言
            $query->insert(['reason_id'])//NAMEとPWの二つのカラムにデータを挿入する文

          ->execute(); //実行

           echo('0'); //データ登録成功
        }
        catch (Exception $e) //例外
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
