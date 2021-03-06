<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Patron;
use Cake\Core\Exception\Exception;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
use function PMA\Util\get;
use App\Mailer\EmailMailer;

class AccountController extends AppController
{
    public $paginate;

    public function initialize()
    {
        parent::initialize();
        $this->loadmodel('Patron');
        $this->loadmodel('Reason');
        $this->loadmodel('Inquiries');
        $this->loadmodel('Children');
        $this->loadmodel('ChildClass');
        $this->loadComponent('TOOL');
        $this->loadComponent('SQL');
        $this->loadComponent('Paginator');//ページネーターの読み込み
        $this->loadComponent('Flash');//ページネーターの読み込み
    }

    public function index(){}

    //アカウント一覧表示アクション
    public function accountList()
    {
        try {
            $this->TOOL->loginRedirect();
            $this->paginate = [
                'limit' => 10
            ];

            //必要な項目の取得
            $query = $this->Patron->find()
                //親テーブル
                ->select(['Patron.number', 'Patron.username', 'Patron.deleted'])
                //園児テーブル
                ->matching('Children', function ($q) {
                    $q->select(['Children.id', 'Children.username', 'Children.age', 'Children.deleted', 'Children.patron_number']);
                    if (!empty($this->request->getData('child_no'))) {
                        $q->where(['Children.id' => $this->request->getData('child_no')]);
                    }
                    if (!empty($this->request->getData('child_name'))) {
                        $q->where(['Children.username LIKE' => '%' . $this->request->getData('child_name') . '%']);
                    }
                    if (!empty($this->request->getData('child_age'))) {
                        $q->where(['Children.age' => $this->request->getData('child_age')]);
                    }
                    return $q;
                })
                //児童クラス
                ->matching('Children.ChildClass', function ($q) {
                    $q->select(['ChildClass.class_name']);
                    if (!empty($this->request->getData('child_class'))) {
                        $q->where(['ChildClass.id' => $this->request->getData('child_class')]);
                    }
                    return $q;
                });
            if (!empty($this->request->getData('parent_name'))) {
                $query->where(['Patron.username' => $this->request->getData('parent_name')]);
            }
            if (!empty($this->request->getData('remove_chk'))) {
                $query->Where(['Patron.deleted' => '1'])
                    ->orWhere(['Children.deleted' => '1']);
            } else {
                $query->where(['Patron.deleted' => '0', 'Children.deleted' => '0']);
            }
            $query->order(['Patron.number' => 'ASC']);
            $this->set('patrons', $query->toArray());
//            $this->set('patrons', $this->paginate($query)->toArray());
        } catch
        (Exception $e) {
            $this->Flash->error('missing');
        }

        // 児童クラスselectの値取得
        $this->set('childClass', $this->ChildClass->find('all'));
    }

    //個人ユーザ情報編集画面
    public function individualInfo()
    {
        $this->TOOL->loginRedirect();
        if (!empty($this->request->getParam('id'))) {
            $query = $this->Patron->find()
                ->select(['Patron.number', 'Patron.id', 'Patron.username', 'Patron.email', 'Patron.deleted'])
                ->contain(['Children' => [
                    'fields' => [
                        'Children.id', 'Children.username', 'Children.deleted', 'Children.patron_number'
                    ]
                ], 'Children.ChildClass' => [
                    'fields' => [
                        'ChildClass.class_name'
                    ]
                ]])
                ->where(['Patron.number' => $this->request->getParam('id')]);
            $this->set('accountInfo', $query->toArray());
        }
    }

    //完了ボタンからユーザアカウントの情報変更を行うアクション
    public function editRecord()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            try {
                //親情報の更新
                $patronTable = TableRegistry::get('Patron');
                $patron = $patronTable->get($this->request->getParam('editNum'));
                $patron->id = $this->request->getData('account_id');
                $patron->email = $this->request->getData('email');
                $patronTable->save($patron);
                //園児情報の更新
                $childrenTable = TableRegistry::get('Children');
                foreach ($this->request->getData('delete_chk') as $data) {
                    $children = $childrenTable->get([$data['id'], $this->request->getParam('editNum')]);
                    $children->deleted = $data['delete'];
                    $childrenTable->save($children);
                }
                //更新時に親の持つ子供が全て削除済みになっている場合は親の削除フラグにもチェックを行う
                if ($this->request->getData('Patron_deleted') == 0) {
                    $connection = ConnectionManager::get('default');
                    $sql = 'UPDATE patron SET patron.deleted = 1
                      WHERE patron.number IN
                      (SELECT children.patron_number FROM children
                        GROUP BY children.patron_number
                        HAVING COUNT(*) = SUM(CASE WHEN children.deleted = 1 THEN 1 ELSE 0 END));';
                    $results = $connection->execute($sql);
                }
                $this->Flash->success("更新しました。");
            } catch (Exception $e) {
                $this->Flash->error("更新に失敗しました。");
            }
        }
        $this->redirect($this->referer());
    }

    //親情報削除チェックの更新を行うアクション
    public function reloadPatronDelete()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            try {
                $patronTable = TableRegistry::get('Patron');
                $patron = $patronTable->get($this->request->getParam('deleteNum'));//クリックした時ナンバー取得
                $patron->deleted = $this->request->getData('patron_deleted');//
                $patronTable->save($patron);//ＤＢ更新
                $this->Flash->success("更新しました。");
            } catch (Exception $e) {
                $this->Flash->error("更新に失敗しました。");
            }
        }
        $this->redirect($this->referer());
    }
    // ランダム文字列生成 (英数字)
    //$length: 生成する文字数
    public function makeRandStr($length)
    {
        $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
        $r_str = null;
        for ($i = 0; $i < $length; $i++) {
            $r_str .= $str[rand(0, count($str) - 1)];
        }
        return $r_str;
    }

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
        return 0;
    }

    //アカウント追加
    public function addacount()
    {
        if ($this->request->is('post')) {
            //email,patronName,childName,childAge,childClass

            //親情報の有無
            $patronNumber = $this->Patron->find()
                ->select(['Patron.number'])
                ->where(['Patron.username LIKE' => $this->request->getData('patronName')])
                ->where(['Patron.email LIKE' => $this->request->getData('email')])
                ->first();

            if (empty($patronNumber)) {
                //Patron　親情報追加
                $patronTable = TableRegistry::get('Patron');
                $patron = $patronTable->newEntity();
                $id =$this->TOOL->makeRandStr(8);
                $patron->id = $id;
                $notHash = $this->TOOL->makeRandStr(8);
                $patron->password = $this->TOOL->_setPassword($notHash);
                $patron->username = $this->request->getData('patronName');
                $patron->email = $this->request->getData('email');
                $patronTable->save($patron);
                //めえーるそうしん
                $mailer = new EmailMailer();
                $mailer->beginning($this->request->getData('email'), $id,$notHash, $$this->request->getData('patronName'));
            }

            if ($this->SQL->compAddress($this->request->getData('email')))
                //children 子供情報追加
                $childrenTable = TableRegistry::get('Child');
            $children = $childrenTable->newEntity();
            $children->patron_number = $patronNumber;
            $children->username = $this->request->getData('childName');
            $children->age = $this->request->getData('childAge');
            $children->child_class_id = $this->request->getData('childAge');
            $childrenTable->save($children);
        }
        $this->redirect(['action' => 'accountlist']);
    }
}
