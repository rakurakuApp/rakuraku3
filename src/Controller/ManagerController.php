<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Component\RAWSComponent;
use App\Model\Entity\Patron;
use Cake\Core\Exception\Exception;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;

class ManagerController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadmodel('Patron');
        $this->loadmodel('Reason');
        $this->loadmodel('Children');
        $this->loadmodel('ChildClass');
        $this->loadmodel('Inquiries');
        $this->loadComponent('TOOL');
        $this->loadComponent('SQL');
        $this->loadComponent('Flash');
        $this->loadComponent('RAWS');
    }

    public function index(){}

    public function photoup(){}

    //問合せ一覧画面
    public function inquiry()
    {
        //問合せ一覧の情報をctpに受け渡す
        if ($this->request->is('post')) {
            try {
                $query = $this->Inquiries->find()
                    ->select(['Inquiries.id','Inquiries.already','patron.username','children.username','photos.id','reason.detail'])
                    ->join([
                        'table' => 'patron',
                        'type' => 'LEFT OUTER',
                        'conditions' => 'Inquiries.patron_number = patron.number'
                    ])
                    ->join([
                        'table' => 'reason',
                        'type' => 'LEFT OUTER',
                        'conditions' => 'Inquiries.reason_id=reason.id'
                    ])
                    ->join([
                        'table' => 'children',
                        'type' => 'LEFT OUTER',
                        'conditions' => 'patron.number = children.patron_number'
                    ])
                    ->join([
                        'table' => 'photos',
                        'type' => 'LEFT OUTER',
                        'conditions' => ' Inquiries.photos_id = photos.id'
                    ]);
                //保護者名
                if (!empty($this->request->getData('patron_name'))) {
                    $query->where(['patron.username LIKE' => '%' . $this->request->getData('patron_name') . '%']);
                }
                //児童名
                if (!empty($this->request->getData('children_name'))) {
                    $query->where(['children.username LIKE' => '%' . $this->request->getData('children_name') . '%']);
                }
                //問合せ内容
                if (!empty($this->request->getData('inquiry_class'))) {
                    $query->where(['reason.id' => $this->request->getData('inquiry_class')]);
                }

                //写真ID
                if (!empty($this->request->getData('photo-id'))) {
                    $query->where(['photos.id' => $this->request->getData('photo-id')]);
                }
                $this->set('Inquiries', $query->toArray());
                //問合せ済チェックボックス
                if (!empty($this->request->getData('remove_chk'))) {
                    $query->where(['Inquiries.already' => '1']);
                } else {
                    $query->where(['Inquiries.already' => '0']);
                }
                $this->set('Inquiries', $query->toArray());
            } catch
            (Exception $e) {
                $this->Flash->error('missing');
            }
        }else{
            //検索条件がない場合
            try {
                $query = $this->Inquiries->find()
                    ->select(['Inquiries.id','Inquiries.already','patron.username','children.username','photos.id','reason.detail'])
                    ->join([
                        'table' => 'patron',
                        'type' => 'LEFT OUTER',
                        'conditions' => 'Inquiries.patron_number = patron.number'
                    ])
                    ->join([
                    'table' => 'reason',
                    'type' => 'LEFT OUTER',
                    'conditions' => ' Inquiries.reason_id=reason.id '
                ])
                    ->join([
                        'table' => 'children',
                        'type' => 'LEFT OUTER',
                        'conditions' => 'patron.number = children.patron_number'
                    ])
                    ->join([
                        'table' => 'photos',
                        'type' => 'LEFT OUTER',
                        'conditions' => ' Inquiries.photos_id = photos.id '
                    ]);
                if (!empty($this->request->getData('remove_chk'))) {
                    $query->where(['Inquiries.already' => '1']);
                } else {
                    $query->where(['Inquiries.already' => '0']);
                }
                $this->set('Inquiries',$query->toArray());
            } catch (Exception $e) {
                $this->Flash->error('missing');
            }
        }
        //select用問合せ内容取得
        $this->set('reasons', $this->Reason->find('all'));

    }

    //問い合わせ詳細画面
    public function inquirydetail()
    {
        if (!empty($this->request->getParam('number'))) {
            $query = $this->Inquiries->find()
                ->select(['Inquiries.id','Inquiries.already','patron.username','children.username','photos.id','reason.detail','photos.path','photos.deleted'])
                ->join([
                    'table' => 'reason',
                    'type' => 'LEFT OUTER',
                    'conditions' => 'Inquiries.reason_id=reason.id'
                ])
                ->join([
                    'table' => 'patron',
                    'type' => 'LEFT OUTER',
                    'conditions' => 'Inquiries.patron_number = patron.number'
                ])
                ->join([
                    'table' => 'children',
                    'type' => 'LEFT OUTER',
                    'conditions' => 'patron.number = children.patron_number'
                ])
                ->join([
                    'table' => 'photos',
                    'type' => 'LEFT OUTER',
                    'conditions' => 'Inquiries.photos_id = photos.id'
                ])
                ->where(['Inquiries.id' => $this->request->getParam('number')]);
            $this->set('parentInfo', $query->toArray());
        }else{
        }
    }

    //問合せ詳細画面の表示非表示ボタンが押された時、問合せ更新するボタン
    public function inquirydetailphotohide()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            try {
                $InquiriesTable = TableRegistry::get('Inquiries');
                $parentInfo = $InquiriesTable->get($this->request->getParam('updetanam'));
                if (!($parentInfo->already)) {
                    $parentInfo->already = true;
                    $parentInfo->photos['deleted'] = 1;
                }else{
                    $parentInfo->already = false;
                    $parentInfo->photos['deleted'] = 0;
                }
                $InquiriesTable->save($parentInfo);
                $this->Flash->success("更新しました。");
            } catch (Exception $e) {
                $this->Flash->success("更新に失敗しました");
            }
        }
        $this->redirect($this->referer());
    }

    //問合わせ済みにボタン
    public function inquiryswitching()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            try {
                $this->Flash->success("更新しました");
            } catch (Exception $e) {
                $this->Flash->success("更新に失敗しました");
            }
        }
        $this->redirect($this->referer());
    }

    public function uploadlogic(){
        $this->autoRender = false;

        $typeList = array('jpg', 'jpeg', 'gif', 'png');

        if(!empty($_FILES)){
            for ($i = 0; $i < count($_FILES['upfile']['tmp_name']); $i++) {
                if (is_uploaded_file($_FILES['upfile']['tmp_name'][$i])) {
                    $name = $_FILES['upfile']['name'][$i];
                    $filePath = $_FILES['upfile']['tmp_name'][$i];

                    $fileTypes = pathinfo($name);

                    // ファイル名がアルファベットのみかをチェック
                    if (preg_match("/^([a-zA-Z0-9\.\-\_])+$/ui", $name) == "0") {
                        // アルファベット以外を含む場合はファイル名を日時とする
                        $saveFileName = date("Ymd_His", time());
                    } else {
                        $ret = null;
                        if (preg_match("/\.jpg$/ui", $name) == true) {
                            $ret = explode('.jpg', $name);
                        } elseif (preg_match("/\.gif$/ui", $name) == true) {
                            $ret = explode('.gif', $name);
                        } elseif (preg_match("/\.png$/ui", $name) == true) {
                            $ret = explode('.png', $name);
                        }
                        $saveFileName = $ret[0]; // 拡張子を除いたそのまま
                    }

                    $saveFileName = @('[' . (microtime() * 1000000) . ']' . $saveFileName);

                    if (in_array($fileTypes['extension'], $typeList)) {
                        //アップロード処理
                        $result = $this->RAWS->SearchUpload($saveFileName . "." . $fileTypes['extension'], $filePath,"ViewImage");

                        $childId = $this->SQL->searchChild($result[0]);

//                        $eventId = $_POST['eventId'];
                        $eventId = 1;

                        if(count($childId) == 1) {
                            $photoId = $this->SQL->insertPhoto($result['ObjectURL'], $eventId, 0);
                            $this->SQL->insertFaceTable('view',$childId[0]['children_id'],$photoId);
                        }
                        else{
                            $photoId = $this->SQL->insertPhoto($result['ObjectURL'], $eventId, 1);
                            foreach($childId as $number) {
                                $this->SQL->insertFaceTable('view',$number['children_id'],$photoId);
                            }
                        }

                        $this->redirect($this->referer());
                    }
                        //ファイル種類外処理
                }
            }
        }
    }

    public function upload(){}
}