<!DOCTYPE html>
<html lang="ja">
<head>

    <!-- タイトルセット -->
    <?php $this->start('title');
    echo '画像詳細';
    $this->end(); ?>

    <!--ヘッダー設定-->
    <?= $this->element('common\header') ?>
    <?= $this->Html->css('/private/css/common/header.css') ?>

    <!--css設定-->
    <?php
    echo $this->Html->css('inquiry.css');
    ?>


<form method="post" accept-charset="UTF8" index="index" action="/hello">
    <div style="display:none;",>
        <input type="hidden" name="_method" value="post" />
    </div>
    <select name="HelloForm[select1]">
        <option value="">項目を選択してください</option>
        <option value="ウィンドウズ"  selected="selected">Windows</option>
        <option value="リナックス">Linux</option>

    </select>
    <div class="submit">
        <input type="submit">
    </div>
</form>