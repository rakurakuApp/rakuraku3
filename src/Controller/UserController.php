<?php
/**
 * Created by PhpStorm.
 * User: 15110005
 * Date: 2017/11/16
 * Time: 9:36
 */

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
        $this->loadComponent('RAWS');
        $this->loadComponent('TOOL');
        $this->loadmodel('Patron');
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

    }

    public  function  mailChange(){
        $mail = $this->request->getData('email');
        $this->set('email',$mail);

    }

    public  function  mailchangelogic(){
        $this->autoRender = false;

        $patron = TableRegistry::get('patron');

        $old_mail = $this->request->getData('oldMail');
        $new_mail = $this->request->getData('newMail');

        //$result = $patron->query()->set(['id' => $new_mail])->where(['id' => $old_mail])->execute();

        //print_r($result);

        echo $old_mail . "<br>";
        echo $new_mail;

        $this->redirect(['action' => 'userinformation']);
    }

    public  function  idChange(){
        $id = $this->request->getData('id');
        $this->set('id',$id);
    }

    public function idchangelogic(){
        $this->autoRender = false;

        $patron = TableRegistry::get('patron');

        $old_id = $this->request->getData('oldData');
        $new_id = $this->request->getData('newData');

        //$result = $patron->query()->set(['id' => $new_id])->where(['id' => $old_id])->execute();

        //print_r($result);

        echo $old_id . "<br>";
        echo $new_id;

        $this->redirect(['action' => 'userinformation']);
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

                //親情報の取得
                $Patron = $this->Patron->find()
                    ->select(['Patron.id'])
                    ->where(['Patron.number' => $Reset['patron_number']])
                    ->first();

                //resetpage
                $this->redirect(['controller' => 'User', 'action' => 'reset', $number]);
            } else {
                //期限切れerror
                // $this->redirect([ 'controller' => 'Login','action' => 'login']);
                echo '期限過ぎてんぞ';
            }
        } else {
            //無効error
            //$this->redirect([ 'controller' => 'Login','action' => 'login']);
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

                    //バリデーション
                    if (true) {

                        //uuid delete
                        $this->Reset->query()
                            ->delete()
                            ->where(['Reset.uuid' => $this->request->getQuery('check')])
                            ->execute();
                    }else{

                    }
                } else {
                    $errorMessage = 'パスワードが確認と異なります';
                    $this->set('errorMessage', $errorMessage);
                }
            } else {
                $errorMessage = 'パスワードを入力してください';
                $this->set('errorMessage', $errorMessage);
            }
        } else {
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
}
