<?php
/**
 * Created by PhpStorm.
 * User: 15110011
 * Date: 2017/12/19
 * Time: 9:28
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

class ValidationComponent extends Component{

    //英数字とアンダーバー（大文字・小文字共存可）が含まれている場合true
    //それ以外が含まれている場合false
    public function charNumberCheck($string){
        if(is_string($string)){
            if(preg_match("/^[\w]+$/",$string)){
                return true;
            }
            else{
                return false;
            }
        }
    }

}