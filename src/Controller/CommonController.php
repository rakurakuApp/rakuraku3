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

        $this->set('array',$photo_path->toList());
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

          ->eecute(); //実行

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

    // お気に入り追加時処理
    public function favorite()
    {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $this->set(compact('data'));
            $this->set('_serialize', ['data']);
        } else {
            $this->log("error");
        }
        $this->log("check");
    }

    public function hoge(){}
}
