<?php
/**
 * Created by PhpStorm.
 * User: 15110011
 * Date: 2017/12/06
 * Time: 9:59
 */
?>

マイページにてログイン情報が変更されました。

URL:http://localhost/rakuraku/

<?php
echo $userName .'様のログインIDとパスワードは以下のとおりです。初回ログイン後マイページにて変更お願いいたします。'."\n\n";

echo 'ID:' . $id . "\n";
echo 'パスワード:' . $passwd . "\n";
?>
※このメールはIDとパスワードを変更するまで大切に取っておいてください。