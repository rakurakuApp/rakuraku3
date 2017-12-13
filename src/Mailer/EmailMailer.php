<?php

/**
 * Created by PhpStorm.
 * User: 15110006
 * Date: 2017/11/27
 * Time: 10:58
 */
namespace App\Mailer;

use Cake\Mailer\Email;


class EmailMailer extends Email
{
    public function __construct($config = null)
    {
        parent::__construct($config);
        $this->setProfile('default');
    }

    public function forget($address,$id,$userName,$uuid)
    {
        $this
            ->setFrom(["rakuraku.noreply@gmail.com" => 'らくらくうちのこど～こだ'])
            ->setTo($address)
            ->setSubject('【うちのこど～こだ】パスワード再設定【重要】')
            ->setTemplate('forget')
            ->setViewVars(['id'=>$id,'userName'=>$userName,'uuid'=>$uuid])
            ->send();
    }

    public function beginning($address,$id,$pass,$userName)
    {
        $this
            ->setFrom(["rakuraku.noreply@gmail.com" => 'らくらくうちのこど～こだ'])
            ->setTo($address)
            ->setSubject('【うちのこど～こだ】初回メール【重要】')
            ->setTemplate('beginning')
            ->setViewVars(['id'=>$id,'passwd'=>$pass,'userName'=>$userName])
            ->send();
    }

    public function resend($address,$id,$pass,$userName)
    {
        $this
            ->setFrom(["rakuraku.noreply@gmail.com" => 'らくらくうちのこど～こだ'])
            ->setTo($address)
            ->setSubject('【うちのこど～こだ】ログイン情報の変更【重要】')
            ->setTemplate('resend')
            ->setViewVars(['id'=>$id,'passwd'=>$pass,'userName'=>$userName])
            ->send();
    }

}