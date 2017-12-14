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

class UserController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('RAWS');
        $this->loadComponent('TOOL');
        $this->loadmodel('Patron');
    }


    public  function  passchange(){
    }

    public  function  index(){}

    public  function  mailchange(){
        $mail = $this->request->getData('email');
        $this->set('email',$mail);
    }

    public  function  idchange(){
        $id = $this->request->getData('id');
        $this->set('id',$id);
    }

    public function upload(){
        //$mailer = new EmailMailer();

        //$mailer->resend('oic.k.koyama@gmail.com','kusamochi2','44444444','test');
    }

    public function uploadlogic(){
        $this->autoRender = false;

        $typeList = array('jpg','jpeg','gif','png');
        if(!empty($_FILES)){
            for($i = 0;$i < count($_FILES['upfile']['tmp_name']);$i++){
                if(is_uploaded_file($_FILES['upfile']['tmp_name'][$i])){
                    $name = $_FILES['upfile']['name'][$i];
                    $filePath = $_FILES['upfile']['tmp_name'][$i];

                    $fileTypes = pathinfo($name);

                    // ファイル名がアルファベットのみかをチェック
                    if ( preg_match("/^([a-zA-Z0-9\.\-\_])+$/ui", $name) == "0" ) {
                        // アルファベット以外を含む場合はファイル名を日時とする
                        $saveFileName = date("Ymd_His", time());
                    } else {
                        if ( preg_match("/\.jpg$/ui", $name) == true ) {
                            $ret = explode('.jpg', $name);
                        } elseif ( preg_match("/\.gif$/ui", $name) == true ) {
                            $ret = explode('.gif', $name);
                        } elseif ( preg_match("/\.png$/ui", $name) == true ) {
                            $ret = explode('.png', $name);
                        }
                        $saveFileName = $ret[0]; // 拡張子を除いたそのまま
                    }

                    $saveFileName = @('['.(microtime()*1000000).']'.$saveFileName);

                    if(in_array($fileTypes['extension'],$typeList)){
                        //アップロード処理
                        $this->RAWS->AuthUpload($saveFileName .".". $fileTypes['extension'],$filePath);

                        $this->redirect($this->referer());
                    }
                    else{
                        //ファイル種類外処理
                    }
                }
            }
        }
    }

    public function inquiry(){}

    public function userinformation()
    {

    }
}