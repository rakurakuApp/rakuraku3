<?php
/**
 * @var \App\View\AppView $this
 * @var
 * @var
 */
?>

<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/account/addacount.css'); ?>
<?php $this->end(); ?>

<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/account/addacount.js'); ?>
<?php $this->end(); ?>

<?php $this->start('title'); ?>
<?= 'ユーザ一覧'; ?>
<?php $this->end(); ?>

<?= $this->element('common\header') ?>

<div class="container">
    <h1>アカウント新規作成</h1>
    <div class="formOutline">
        <form action="" method="post" class="form form-inline">
            <div class="formOutlineTitle">
                <!-- タイトル -->
                <h2>アカウント選択</h2>
            </div>
            <div class="selectFormType row">
                <!-- 作成アカウントタイプ選択 -->
                <div class="radio">
                    <label for="selectUserRadio">
                        <input type="radio" name="selectFormType" value="user" id="selectUserRadio" checked>保護者
                    </label>
                </div>
                <div class="radio">
                    <label for="selectManagerRadio">
                        <input type="radio" name="selectFormType" value="manager" id="selectManagerRadio">管理者
                    </label>
                </div>
            </div>
            <div class="formContents managerContent row" id="formContents">
                <div class="userType managerForm">
                    <h3>@@@</h3>
                </div>
            </div>
        </form>
    </div>
</div>
