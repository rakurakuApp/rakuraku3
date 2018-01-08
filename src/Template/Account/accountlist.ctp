<?php
/**
 * @var \App\View\AppView $this
 * @var $childClass
 * @var $patrons
 */
?>
<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/account/account_list.css'); ?>
<?php $this->end(); ?>
<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/account/table_link.js'); ?>
<?php $this->end(); ?>
<?php $this->start('title'); ?>
<?= 'ユーザ一覧'; ?>
<?php $this->end(); ?>
<?= $this->element('common\header') ?>

<div class="container container-fluid">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <h1>ユーザ一覧</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12" id="content">
            <?= $this->Element('account/acListEle')?>
        </div>
    </div>
</div>