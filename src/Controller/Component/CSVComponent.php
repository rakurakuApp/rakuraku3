<?php
/**
 * Created by PhpStorm.
 * User: 15110011
 * Date: 2017/12/07
 * Time: 10:18
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use \SplFileObject;

class CSVComponent extends Component{

    public function csvEncode($path){
        $file = new SplFileObject($path);
        $file->setFlags(SplFileObject::READ_CSV);

        $header = array();
        $records = array();
        foreach ($file as $line) {
            //変数headerが空の場合読み込んだ列は連想配列のヘッダーとする
            if(@is_null( $header )) {
                foreach ($line as $tmp) {
                    $header[] = mb_convert_encoding($tmp, "UTF-8", "sjis");
                }
            }
            else {
                //頭の要素が空の場合終了
                if(empty($line[0])) {
                    break;
                }
                $tmp2 = array();
                for($i = 0;$i < count($line);$i++) {
                    $tmp2[$header[$i]] = mb_convert_encoding($line[$i], "UTF-8", "sjis");
                }
                $records[] = $tmp2;
            }
        }

        return $records;
    }

}