<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Aws\Rekognition\RekognitionClient;
use Aws\S3\S3Client;

class RAWSComponent extends Component {

    private $AWS_Access_key;
    private $AWS_Secret_key;//別ファイルへ
    const AWS_rekognition_region = "us-east-1";
    const AWS_rekognition_collection = "JSP3";
    const AWS_S3_region = "us-east-1";
    const AWS_S3_bucketname = 'test-koyama3';
    const AWS_UnderSimilarity = 80.0;

    public $components = ['Const'];

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->AWS_Access_key = ConstComponent::AWS_Access_key;
        $this->AWS_Secret_key = ConstComponent::AWS_Secret_key;
    }

    //コンストラクタ生成用
    public function RekognitionFactry(){
        $tmp = RekognitionClient::factory([
            'credentials' => [
                'key'   => $this->AWS_Access_key,
                'secret'=> $this->AWS_Secret_key
            ],
            'region'    => RAWSComponent::AWS_rekognition_region,
            'version'   => 'latest'
        ]);
        return $tmp;
    }
    public function S3Factry(){
        $tmp = S3Client::factory([
            'credentials' => [
                'key' => $this->AWS_Access_key,
                'secret' =>$this->AWS_Secret_key
            ],
            'region' =>RAWSComponent::AWS_S3_region,
            'version' =>'latest'
        ]);
        return $tmp;
    }

    //二枚の画像の顔の一致率
    //各種引数　画像パス　返り値　比較対象一致率
    public function compareFaces($image1,$image2){

        $tmp = $this->RekognitionFactry()->compareFaces([
            'Attributes' => 'ALL',
            'SourceImage' => [
                'Bytes' => file_get_contents($image1)
            ],
            'TargetImage' => [
                'Bytes' => file_get_contents($image2)
            ]
        ]);
        $result = $tmp['FaceMatches'][0]['Similarity'];

        return $result;
    }

    //S3へファイルアップロード
    //第一引数　S3でのファイルパス　第二引数　アップロード元ファイルのパス
    //返り値　ファイルのアクセス用アドレス
    public function putObject($key,$SourceFile,$Directry = ""){
        if(is_string($Directry)&&$Directry == ""){
            $tmp = $this->S3Factry()->putObject([
                'Bucket' => RAWSComponent::AWS_S3_bucketname,
                'Key' => $key,
                'SourceFile' => $SourceFile,
                'ACL' => 'public-read'
            ]);
        }
        else {
            $tmp = $this->S3Factry()->putObject([
                'Bucket' => RAWSComponent::AWS_S3_bucketname,
                'Key' => $Directry.'/'.$key,
                'SourceFile' => $SourceFile,
                'ACL' => 'public-read'
            ]);
        }
        $result = $tmp['ObjectURL'];

        return $result;
    }

    //Rekognitionのコレクションへ顔を登録
    //引数 顔が写ってる写真のパス
    //返り値　顔ID
    public function indexFaces($image){
        $tmp = $this->RekognitionFactry()->indexFaces([
            'CollectionId' => RAWSComponent::AWS_rekognition_collection,
            'Image'=>[
                //'Bytes' => file_get_contents($_FILES['image1']['tmp_name'])
                'Bytes' => file_get_contents($image)
            ]
        ]);
        $result = $tmp['FaceRecords'][0]['Face']['FaceId'];

        return $result;
    }

    //Rekognitionのコレクションに引数で渡された顔がある場合顔IDを返す
    //引数 比較したい顔が写っている写真のパス
    //返り値　'Similarity':一致度 'FaceId':顔ID を含む連想配列
    public function searchFacesByImage($image){
        $tmp = $this->RekognitionFactry()->searchFacesByImage([
            "CollectionId"=> RAWSComponent::AWS_rekognition_collection,
            "FaceMatchThreshold" => RAWSComponent::AWS_UnderSimilarity,
            "Image"=>[
                "Bytes" => file_get_contents($image)
            ]
        ]);
        $result = array();
        foreach ( $tmp['FaceMatches'] as $tmp1 ){
            $result[] =[
                'Similarity'  => $tmp1['Similarity'],
                'FaceId' => $tmp1['Face']['FaceId']
            ];
        }
        return $result;
    }

    //S3にアップロードした後にRekognitionのコレクションに登録
    //第一引数 S3でのファイルパス　第二引数　アップロード元ファイルのパス 第三引数　ディレクトリパス　例hoge/hoge
    //返り値 'ObjectURL' ファイルのアクセス用アドレス 'FaceId' 顔ID
    public function AuthUpload($key,$SourceFile,$Directry = ""){
        $result['ObjectURL'] = $this->putObject($key,$SourceFile,$Directry);
        $result['FaceId'] = $this->indexFaces($SourceFile);
        return $result;
    }

    //S3にアップロードした後にRekognitionのコレクションと比較
    //第一引数 S3でのファイルパス　第二引数　アップロード元のファイルパス　第三引数　ディレクトリパス
    //返り値 'ObjectURL' 配列{'Similarity' 一致度 'FaceId' 顔ID}を含む連想配列
    public function SearchUpload($key,$SourceFile,$Directry = ""){
        $result['ObjectURL'] = $this->putObject($key,$SourceFile,$Directry);
        $tmp = $this->searchFacesByImage($SourceFile);

//        $result = array_merge($result,$tmp);
        $result[] = $tmp;

        return $result;
    }

    //構築されているコレクション名を取得
    //第一引数　取得する最大数(nullの場合無制限)
    //返り値　コレクションIDの配列
    public function listCollections($Max = null){
        if(is_integer($Max)){
            $tmp = $this->RekognitionFactry()->listCollections(['MaxResults'=>$Max]);
        }
        else{
            $tmp = $this->RekognitionFactry()->listCollections([]);
        }
        return $tmp['CollectionIds'];
    }

    //コレクションを作成
    //第一引数　作成するコレクション名
    public function createCollection($collectionId){
        $tmp = $this->RekognitionFactry()->createCollection(['CollectionId' => $collectionId]);
        return $tmp;
    }

    //コレクション内の情報を取得
    //第一引数　閲覧するコレクション名　第二引数　読み出す最大数(nullの場合無制限)
    public function listFaces($collectionId, $Max = null){
        if(is_integer($Max)){
            $tmp = $this->RekognitionFactry()->listFaces(['CollectionId'=> $collectionId,'MaxResults'=>$Max]);
        }
        else{
            $tmp = $this->RekognitionFactry()->listFaces(['CollectionId'=> $collectionId]);
        }

        return $tmp['Faces'];
    }
}
