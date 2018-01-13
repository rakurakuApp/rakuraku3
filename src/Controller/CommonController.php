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
        $this->loadmodel('ChildClass');
        $this->loadModel('Events');
        $this->loadModel('Face');
        $this->loadModel('Photos');


    }

    public function photolist()
    {
        $this->TOOL->loginRedirect();
        $paginate = [
            'limit' => 8
        ];
        //getChildrenID用検索入力値
        $child_id  =$this->request->getData('childId');//子番号
        $child_name  =$this->request->getData('childName');//子名前
        $child_class_id  =$this->request->getData('childClass_id');//クラス
        //getPhotoID用検索入力値
        $favorite  =$this->request->getData('favorite');//お気に入り
        $events_id  =$this->request->getData('eventsId');//イベント
        $photos_gathered  =$this->request->getData('photosGathered');//集合写真

        $id = $this->TOOL->loadSessionId();
        //getChildrenID
        //$children_id = $this->SQL->getChildrenID($id,$child_id,$child_name,$child_class_id);


//        $midstream1 = $this->Photos->find()
//            ->select(['Patron.id'])





        //ore
//        $midstream1 = $this->Patron->find()
//            ->select(['Patron.number'])
//            ->matching('Children',function ($q) {
//                $q->select(['Children.id','Children.Child_class_id']);
//                return $q;
//            })
//            ->matching('Children.ChildClass',function ($q) {
//                $q->select(['ChildClass.class_name']);
//                return $q;
//            });
//        $midstream1_photosId = array();
//        foreach ($midstream1 as $midstream1_photo){
//            $midstream1_photosId[] = $midstream1_photo['photos_id'];
//        }
//
//
//
//
//        $midstream2 = $this->Favorite->find()
//            ->select(['Favorite.patron_id','Favorite.patron_number'])
//            ->matching('Events',function ($q) {
//                $q->select(['Events.id']);
//                return $q;
//            })
//            ->matching('Favorite',function ($q) {
//                $q->select(['Favorite.id','Favorite.photo_id','Favorite.patron_number']);
//                return $q;
//            })
//            ->matching('Patron',function ($q) {
//                $q->select(['Patron.id']);
//                return $q;
//            });
//        $midstream2_photosId = array();
//        foreach ($midstream2 as $midstream2_photo){
//            $midstream2_photosId[] = $midstream2_photo['photos_id'];
//        }
//
//
//
//        $face = TableRegistry::get('face');
//        $result = $face->find()->select('photos_id')->where(['photos_id IN' =>  $midstream1_photosId,'photos_id IN' => $midstream2_photosId])->all();
//
//        $photoId = array();
//        foreach ($result as $photo){
//            $photoId[] = $photo['photos_id'];
//        }

//            ->matching('Children.Face',function ($q) {
//                $q->select(['Face.Children_id','Face.photos_id']);
//              return $q;

//        $result = $this->Face->find()->select(['Face.id','Face.children_id','Face.photos_id'])
//            ->matching('Children.Patron')
//            //子供検索
//            ->matching('Children', function ($q) {
//                $q->select(['Children.id','Children.patron_number']);
//                if (!empty($this->request->getData('childId'))) {
//                    $q->where(['Children.id' => $this->request->getData('childId')]);
//                }
//                return $q;
//            })
//            //児童クラス
//            ->matching('Children.ChildClass', function ($q) use ($child_class_id){
//                $q->select(['ChildClass.class_name']);
//                if (!empty($child_class_id)) {
//                    $q->where(['ChildClass.id' => $child_class_id]);
//                }
//                return $q;
//            })
//            ->toArray();

        $this->set(compact('result'));
//            //お気に入り
//            ->matching('Favorite', function ($q)use ($favorite){
//                $patronData = $this->TOOL->loadPersonData();
//                $q->select(['Favorite.photos_id']);
//                if (!empty($favorite)) {
//                    $q->where(['Favorite.patron_number' => $patronData[0]['number']]);
//                }
//                return $q;
//            })
//            //イベント
//            ->matching('Events', function ($q) use ($events_id) {
//                $q->select(['Events.id']);
//                if (!empty($events_id)) {
//                    $q->where(['Events.id' => $events_id]);
//                }
//                return $q;
//            })
//            //集合写真
//            ->where( function ($a) use ($photos_gathered){
//                if(!empty($photos_gathered)){
//                    $a->where(['gathered' => $photos_gathered]);
//                }
//                return $a;
//            });

 //       $midstream_photosId = array();
//        foreach ($result as $midstream_photo){
//            $midstream_photosId[] = $midstream_photo['photos_id'];
//        }

        //
  //      $face = TableRegistry::get('face');

//        $result = $face->find()->select('photos_id')->where(['photos_id IN' => $midstream_photosId])->all();
//        $photo = array();
//        foreach ($result as $photo){
//            $photo[] = $photo['photos_id'];
//        }


//        $photo_path = $this->Paginator->paginate($this->SQL->getPhotoPath($photo),$paginate);

//        $this->set('array',$photo_path->toList());

        $reason = TableRegistry::get('reason');
        $detail = $reason->find()->select('detail')->all();
        $this->set('detail',$detail->toArray());

        //ajax通信を受信した場合
        if($this->request->is('ajax')){
            //お気に入り追加処理
            if (empty($this->request->getData('star'))){
                $query = $this->Favorite->find()
                    ->select(["Favorite.id"])
                    ->where([
                        "Favorite.photos_id" => 1,
                        "Favorite.patron_number" => $this->request->getSession()->read('Auth.User.number')
                    ]);
            }
        }
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
