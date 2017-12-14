<?php

namespace App\Controller;

use App\Controller\AppController;
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
    }

    public function index(){}

    public function photoup(){}

    //問い合わせ詳細画面
    public function inquirydetail()
    {
        if (!empty($this->request->getParam('number'))) {
            $query = $this->Inquiries->find()
                ->select(['Inquiries.id','Inquiries.already','patron.username','children.username','photos.id','reason.detail','photos.path'])
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
                //問合わせ内容
                if (!empty($this->request->getData('inquiry_class'))) {
                    $query->where(['reason.id' => $this->request->getData('inquiry_class')]);
                }

                //写真ID
                if (!empty($this->request->getData('photo-id'))) {
                    $query->where(['photos.id' => $this->request->getData('photo-id')]);
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
                $this->set('Inquiries',$query->toArray());
            } catch (Exception $e) {
                $this->Flash->error('missing');
            }
        }
        //select用問合せ内容取得
        $this->set('reasons', $this->Reason->find('all'));

    }

}
