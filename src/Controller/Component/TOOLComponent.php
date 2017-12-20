<?php
/**
 * Created by PhpStorm.
 * User: 15110011
 * Date: 2017/12/07
 * Time: 11:48
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Auth\DefaultPasswordHasher;

class TOOLComponent extends Component
{
    public $components = ['SQL'];

    //セッションからidを読み出す
    public function loadSessionId(){
        $tmp = $this->loadSession();
        return $tmp['id'];
    }

    //セッション情報を全て読み出す
    public function loadSession(){
        $session = $this->request->getSession();

        $result = array();

        $result['id'] = $session->read('id');
        $result['username'] = $session->read('username');
        $result['role'] = $session->read('role');

        return $result;
    }

    //セッションに情報を書き込む
    public function setSession($id ,$username,$role){
        $session = $this->request->getSession();

        $session->write([
            'username'=>$username,
            'role'=>$role,
            'id'=>$id
        ]);
    }

    //セッションIDから親情報を全取得する
    public function loadPersonData(){
        $id = $this->loadSessionId();
        $personData = $this->SQL->getUserDate($id);

        return $personData;
    }

    //セッションIDから子情報を全取得する
    public function loadChildData(){
        $id = $this->loadSessionId();
        $childData = $this->SQL->getChildrenData($id);

        return $childData;
    }

    //セッションからユーザー名とユーザー種類を取得する
    public function loadSessinUser(){
        $tmp = $this->loadSession();
        $result['userName'] = $tmp['username'];
        if($tmp['role'] === "patron"){
            $result['role'] = '保護者';
        }
        elseif ($tmp['role'] === "teacher"){
            $result['role'] = '管理者';
        }
        else{
            $result['role'] = '未ログイン';
        }
        return $result;
    }

    // ランダム文字列生成 (英数字)
    //$length: 生成する文字数
    public function makeRandStr($length){
        $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
        $r_str = null;
        for ($i = 0; $i < $length; $i++) {
            $r_str .= $str[rand(0, count($str) - 1)];
        }
        return $r_str;
    }

    public function _setPassword($password){
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
        return 0 ;
    }
}