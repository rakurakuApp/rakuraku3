<?php
/**
 * @var \App\View\AppView $this
 *
 *  * 問い合わせ内容
 * @var $inquiries
 * already 対応済みかどうか
 * created['time'] 問い合わせした時刻
 * _matchingdata['Reason']['detail']
 * 問い合わせ時刻
 * _matchingdata['photo']['path']
 * 画像パス
 */
?>
<!-- 各読み込み -->
<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/user/inquiryResponseList.css') ?>
<?php $this->end() ?>

<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/common/searchResult.js') ?>
<?php $this->end(); ?>

<?php $this->start('title'); ?>
<?= '問い合わせ情報' ?>
<?php $this->end(); ?>

<!-- グローバルナビ読み込み -->
<?= $this->Element('common/header'); ?>

<div class="container-fluid">
    <div class="row">
        <h1>問い合わせ情報</h1>
    </div>
    <br>
    <div class="row" id="content">
       <?= $this->Element('user/inquiriesList')?>
    <br><br><br>
</div>