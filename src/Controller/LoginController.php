<?php
namespace App\Controller;

use App\Mailer\EmailMailer;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class LoginController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadmodel('Patron');
        $this->loadmodel('Children');
        $this->loadmodel('ChildClass');
        $this->loadmodel('Reason');
        $this->loadmodel('Reset');
        $this->loadmodel('Inquiries');
        $this->loadComponent('TOOL');
        $this->loadComponent('SQL');
    }

    public function login(){
        $session_data = $this->TOOL->loadSession();

        if(!empty($session_data['username']) && !empty($session_data['id']) && !empty($session_data['role'])){
            if($session_data['role'] === "patron"){
                //遷移先未定
                $this->redirect([ 'controller' => 'common','action' => 'photolist']);
            }else if($session_data['role'] === "manager"){
                //遷移先未定
                $this->redirect([ 'controller' => 'account','action' => 'accountList']);
            }
        }

        if(!empty($this->request->getData('teacher')) && $this->request->getData('teacher') === "on"){
            $this->loadComponent('Auth', [
                'loginAction' => [
                    'controller' => 'Login',
                    'action' => 'login'
                ],
                'authenticate' => [
                    'Form' => [
                        'userModel' => 'teachers',
                        'fields' => [
                            'username' => 'id',
                            'password' => 'password'
                        ],
                        'finder' => 'Auth'
                    ]
                ],

                'loginRedirect' => [
                    'controller' => 'account',
                    'action' => 'accountList'
                    //未定
                ],
                'logoutRedirect' => [
                    'controller' => 'Login',
                    'action' => 'logout',
                    'home'
                    //未定
                ]
            ]);
        }else{
            $this->loadComponent('Auth', [
                'loginAction' => [
                    'controller' => 'Login',
                    'action' => 'login'
                ],
                'authenticate' => [
                    'Form' => [
                        'userModel' => 'patron',
                        'fields' => [
                            'username' => 'id',
                            'password' => 'password'
                        ],
                        'finder' => 'Auth'
                    ]
                ],

                'loginRedirect' => [
                    'controller' => 'common',
                    'action' => 'photolist',
                ],
                'logoutRedirect' => [
                    'controller' => 'Login',
                    'action' => 'logout',
                    'home'
                ]
            ]);
        }
        if(!empty($this->request->getData())) {
            if ($this->request->is('post'))
            {
                $user = $this->Auth->identify();
                if ($user)
                {
                    $this->Auth->setUser($user);
                    if (!empty($this->request->getData('teacher')) && $this->request->getData('teacher') === "on")
                    {
                        $this->TOOL->setSession($user['id'],$user['username'],'teacher');
                    }
                    else
                    {
                        $this->TOOL->setSession($user['number'],$user['username'],'patron');
                    }
                    return $this->redirect($this->Auth->redirectUrl());
                }
                else
                {
                    $errorMessage = 'idかパスワードが間違っています。';
                    $this->set('errorMessage', $errorMessage);
                }
                // $this->Flash->error(__('Invalid username or password, try again'));
            }
            else
            {
                $errorMessage = '番号かパスワードが間違っています。';
                $this->set('errorMessage', $errorMessage);
            }
        }
    }

    public function logout(){

       if(empty($this->request->getSession())){
           $this->redirect([ 'controller' => 'Login','action' => 'login']);
       }

       $this->request->session()->destroy(); // セッションの破棄
       $this->redirect([ 'controller' => 'Login','action' => 'login']);

   }

    public function forget()
    {
       $patron = TableRegistry::get('Patron'); // 呼び出したいテーブル名を指定

       if (!empty($this->request->getData('mail')) && !empty($this->request->getData('confirmation'))) {

           if ($this->request->getData('mail') === $this->request->getData('confirmation')) {

               if (preg_match("/^([a-z0-9_]|\-|\.|\+)+@(([a-z0-9_]|\-)+\.)+[a-z]{2,6}$/i",$this->request->getData('mail'))) {

                   //email,patronName,childName,childAge,childClass
                   $user = $patron->find()
                       ->select(['Patron.number','Patron.id', 'Patron.password', 'Patron.username', 'Patron.email'])
                       ->where(['Patron.email LIKE' => $this->request->getData('mail')])
                       ->first();
                   if (!empty($user)) {

                       $uuid = Text::uuid();

                       if (empty($patronNumber)) {
                           //Patron　親情報追加
                           $resetTable = TableRegistry::get('Reset');

                           $reset = $resetTable->newEntity();
                           $reset->patron_number = $user['number'];
                           $reset->uuid = $uuid;
                           $resetTable->save($reset);

                           //メール送信処理
                           $mailer = new EmailMailer();
                           $mailer->forget($user['email'], $user['id'], $user['username'], $uuid);

                           $this->redirect(['controller' => 'Login', 'action' => 'success']);
                       } else {
                           $errorMessage = '謎';
                           $this->set('errorMessage', $errorMessage);
                       }
                   } else {
                       $errorMessage = 'このメールアドレスは登録されていません';
                       $this->set('errorMessage', $errorMessage);
                   }

               } else {
                   $errorMessage = 'メールアドレスを入力してください';
                   $this->set('errorMessage', $errorMessage);
               }
           }
       }
   }

    public function success(){

    }

    public function index()
    {

    }
}
