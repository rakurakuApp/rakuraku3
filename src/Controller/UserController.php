<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Component\TOOLComponent;
use Cake\Controller\Component;
use App\Mailer\EmailMailer;
use Cake\I18n\Time;
use Cake\Chronos\Chronos;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

class UserController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('RequestHandler');
        $this->loadComponent('RAWS');
        $this->loadComponent('TOOL');
        $this->loadModel('Reset');
        $this->loadModel('Patron');
        $this->loadModel('Inquiries');
        $this->loadModel('Reason');
        $this->loadModel('Photos');
        $this->loadModel('Events');

    }

    public function update()
    {
        if ($this->request->is('post')) {
            try {
                $patron = $this->request->getData('');
            } catch (Exception $e) {
            }
          }
    }

    public function passChange()
    {
        $mail = $this->request->getData('email');
        $this->set('email',$mail);

        $patron = TableRegistry::get('patron');

        $old_password = $this->request->getData('oldPassword');
        $new_password = $this->request->getData('newPassword');
        $confirmation_password = $this->request->getData('confirmationPassword');

        $user = $patron->find()
            ->select(['Patron.number','Patron.id', 'Patron.password', 'Patron.username', 'Patron.email'])
            ->where(['Patron.email LIKE' => $this->request->getData('mail')])
            ->first();
        if (!empty($user)) {

            //password変更処理
            //
            //
            //


            //$result = $patron->query()->set(['password' => $new_mail])->where(['id' => $old_mail])->execute();
            //print_r($result);

            echo $old_password . "<br>";
            echo $new_password . "<br>";
            echo $confirmation_password;

            $this->redirect(['action' => 'userinformation']);
        }
    }

    public  function  mailChange(){
        $mail = $this->request->getData('email');
        $this->set('email',$mail);

        $patron = TableRegistry::get('patron');

        $old_mail = $this->request->getData('oldMail');
        $new_mail = $this->request->getData('newMail');

        //$result = $patron->query()->set(['id' => $new_mail])->where(['id' => $old_mail])->execute();

        //print_r($result);

        echo $old_mail . "<br>";
        echo $new_mail;

        //        $this->redirect(['action' => 'userinformation']);

        if (preg_match("/^([a-z0-9_]|\-|\.|\+)+@(([a-z0-9_]|\-)+\.)+[a-z]{2,6}$/i",$this->request->getData('email'))) {

        }
    }

    public  function  idChange(){
        $id = $this->request->getData('id');
        $this->set('id',$id);

        $patron = TableRegistry::get('patron');

        $old_id = $this->request->getData('oldData');
        $new_id = $this->request->getData('newData');

        //$result = $patron->query()->set(['id' => $new_id])->where(['id' => $old_id])->execute();

        //print_r($result);

        echo $old_id . "<br>";
        echo $new_id;

//        $this->redirect(['action' => 'userinformation']);
    }

    public function upload(){
        //$mailer = new EmailMailer();

        //$mailer->resend('oic.k.koyama@gmail.com','kusamochi2','44444444','test');
    }

    public function uploadlogic()
    {
        $this->autoRender = false;

        $typeList = array('jpg', 'jpeg', 'gif', 'png');
        if (!empty($_FILES)) {
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
                        $this->RAWS->AuthUpload($saveFileName . "." . $fileTypes['extension'], $filePath);

                        $this->redirect($this->referer());
                    } else {
                        //ファイル種類外処理
                    }
                }
            }
        }
    }

    public function inquiry(){}

    public function resetCheck()
    {
        $this->autoRender = false;
        $this->request->getQuery('check');
        $this->request->getQuery('id');

        //親情報の有無
        $Reset = $this->Reset->find()
            ->select(['Reset.patron_number', 'Reset.created'])
            ->where(['Reset.uuid' => $this->request->getQuery('check')])
            ->first();
        $number = $Reset['patron_number'];
        $time = Time::parse($Reset['created']);

        if (!empty($Reset)) {
            if ($time->wasWithinLast('1 days')) {

                //resetpage
                $this->redirect(['controller' => 'User', 'action' => 'reset', $number]);

            } else {

                //期限切れerror
                // $this->redirect([ 'controller' => 'Login','action' => 'login']);
                $errorMessage = 'URLの有効期限が切れています';
                $this->set('errorMessage', $errorMessage);
                echo '期限過ぎてんぞ';
            }
        } else {
            //無効error
            //$this->redirect([ 'controller' => 'Login','action' => 'login']);
            $errorMessage = 'そのメールアドレスは登録されていません。';
            $this->set('errorMessage', $errorMessage);
            echo 'データ無い';
        }
    }

    public function dataValidator($data)
    {
        $validator = new Validator();
        $validator
            ->ascii($data)
            ->notBlank($data)
            ->notEmpty($data);
    }

    //パスワード変更処理
    public function reset($number)
    {
        if (!empty($number)) {
            if (!empty($this->request->getData('password')) && !empty($this->request->getData('confirmation'))) {
                if ($this->request->getData('password') === $this->request->getData('confirmation')) {

                    //password変更処理
                    //
                    //
                    //
                    $patron = TableRegistry::get('Patron');
                    $patron->password = $this->TOOL->_setPassword($notHash);

                        //uuid delete
                        $this->Reset->query()
                            ->delete()
                            ->where(['Reset.uuid' => $this->request->getQuery('check')])
                            ->execute();
                } else {
                    $errorMessage = 'パスワードが確認と異なります';
                    $this->set('errorMessage', $errorMessage);
                }
            } else {
                $errorMessage = 'パスワードを入力してください';
                $this->set('errorMessage', $errorMessage);
            }
        } else {
            //error page
            $errorMessage = '不正なアクセスです';
            $this->set('errorMessage', $errorMessage);
        }
    }

    public function userinformation(){
        $personData = $this->TOOL->loadPersonData();
        $childData = $this->TOOL->loadChildData();
        $set_data['person_name'] = $personData['username'];
        $child_name = array();
        foreach ($childData as $tmp){
            $child_name[] = $tmp['username'];
        }
        $set_data['child_name'] = $child_name;
        $set_data['mail'] = $personData['email'];
        $set_data['ID'] = $personData['id'];
        $set_data['pass'] = $personData['pass'];
        $this->set('data',$set_data);
    }

    // ユーザ問い合わせ一覧表示画面
    public function inquiryResponseList()
    {
        if ($this->request->is("ajax")){
            //問い合わせ情報を更新
            $inquiryTable = TableRegistry::get('Inquiries');
            $inquiry = $inquiryTable->get($this->request->getData('value'));
            $inquiry->already = 1;
            $inquiryTable->save($inquiry);
        }
        //保護者の送信した問い合わせが管理者に対応されたかどうか確認する画面 徳山
        $query = $this->Inquiries->find()
            ->select(['Inquiries.id','Inquiries.already','Inquiries.created'])
            ->matching('Reason', function ($q) {
                $q->select(['Reason.id','Reason.detail']);
                return $q;
            })
            ->matching('Photos',function ($q){
                $q->select(['Photos.id','Photos.path'])
                    ->where(['Photos.deleted'=> 0]);
                return $q;
            })
            ->matching('Photos.Events',function ($q){
                $q->select(['Events.id','Events.event']);
                return $q;
            })
            //セッションIDからログインしている親のIDを取得
            ->where(['Inquiries.patron_number' => $this->TOOL->loadSessionId()])
            ->order(['Inquiries.already' => 'ASC','Inquiries.created'=>'DESC']);
        $this->set('inquiries', $query->toArray());
        if ($this->request->is("ajax")){
            // ajax内で行わないと他のコンテンツが非表示になってしまう
            $this->render("/Element/user/inquiriesList");
        }

    }

    public function upload_logic(){
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
                        $result = $this->RAWS->AuthUpload($saveFileName . "." . $fileTypes['extension'], $filePath,"Auth");

                        $this->SQL->insertAuthPhoto($result['ObjectURL'],$_POST['childId'],$result['FaceId']);

                        $this->redirect($this->referer());
                    } else {
                        //ファイル種類外処理
                    }
                }
            }
        }
    }
}
