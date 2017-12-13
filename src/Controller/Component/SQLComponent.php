<?php
/**
 * Created by PhpStorm.
 * User: 15110011
 * Date: 2017/12/07
 * Time: 10:54
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class SQLComponent extends Component
{
    //引数に渡されている親IDから子供IDを全件取得する
    public function getChildrenID($id){
        $children = TableRegistry::get('children');

        $result = $children->find()->select('id')->where(['patron_number' => $id])->all();
        $childrenId = array();
        foreach ($result as $childId){
            $childrenId[] = $childId['id'];
        }

        return $childrenId;
    }

    //引数に渡されている子ID(配列)に紐づけられている写真IDを全取得
    public function getPhotoID($children_id){
        $face = TableRegistry::get('face');

        $result = $face->find()->select('photos_id')->where(['children_id IN' => $children_id])->all();
        $photosId = array();
        foreach ($result as $photo){
            $photosId[] = $photo['photos_id'];
        }

        return $photosId;
    }

    //引数に渡されている親IDに紐づけられている親情報を全取得
    public function getUserDate($id){
        $patron = TableRegistry::get('patron');

        $result = $patron->find()->where(['number'=>$id])->all();
        $patron_data = array();
        foreach ($result as $tmp){
            $patron_data['number'] = $tmp['number'];
            $patron_data['id'] = $tmp['id'];
            $patron_data['password'] = $tmp['password'];
            $patron_data['username'] = $tmp['username'];
            $patron_data['email'] = $tmp['email'];
            $patron_data['pass'] = $tmp['password'];//代入する前にデコードしましょう
        }

        return $patron_data;
    }

    //引数に渡されている親IDに紐づけられている子供情報を全取得
    public function getChildrenData($id){
        $children = TableRegistry::get('children');

        $result = $children->find()->where(['patron_number' => $id])->all();
        $childrenId = array();
        foreach ($result as $childId){
            $tmp = array();
            $tmp['Id'] = $childId['id'];
            $tmp['username'] = $childId['username'];
            $tmp['age'] = $childId['age'];
            $tmp['child_class_id'] = $childId['child_class_id'];
            $tmp['graduated'] = $childId['graduated'];
            $tmp['uploaded'] = $childId['uploaded'];
            $tmp['deleted'] = $childId['deleted'];
            $childrenId[] = $tmp;
        }
        return $childrenId;
    }

    //photolistでページネーションを行う用のsql自動構築
    public function getPhotoPath($id){
        $photos = TableRegistry::get('photos');

        $result = $photos->find()->select('path')->where(['id IN' => $id]);

        return $result;
    }

    //引数に渡されたユーザー名とアドレスと一致するアドレスが存在する場合trueを返す
    public function compAddress($address,$userName){
        $patron = TableRegistry::get('patron');

        $result = $patron->find()
            ->where(['email LIKE' => $address])
            ->where(['username LIKE' => $userName])
            ->count();

        if($result == 1){
            return true;
        }
        else{
            return false;
        }
    }
}