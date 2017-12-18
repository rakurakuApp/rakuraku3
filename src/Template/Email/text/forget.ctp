<?php
/**
 * Created by PhpStorm.
 * User: 15110011
 * Date: 2017/12/06
 * Time: 10:24
 */
?>

ログイン画面にてパスワード等忘れのためパスワード再設定のURLを送信いたしました。
リンク先でパスワードの再設定が可能です。

有効期間は1日です。
<?php
echo 'URL : http://localhost/rakuraku/resetCheck?check='.$uuid;

echo "\n";
echo $userName .'様のログインIDとパスワードは以下のとおりです。初回ログイン後マイページにて変更お願いいたします。'."\n\n";

echo 'ID:' . $id . "\n";
?>
※このメールはIDとパスワードを変更するまで大切に取っておいてください。