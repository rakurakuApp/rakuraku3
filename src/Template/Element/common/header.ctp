<?php
/**
 * @var \App\View\AppView $this
 * @var $sessionData
 */
?>

<?= $this->Html->css('/private/css/common/header.css') ?>

<div class="header-container container container-fluid">
    <div class="row row-eq-height">
        <div class="col-md-3">
            <img src="<?= $this->request->getAttribute("webroot") ?>img/common/headerSample2.png" class="head-pic">
        </div>

        <?php if ($sessionData['role'] == '保護者'): ?>
            <!--ログインユーザが保護者の場合-->
            <div class="col-md-6">
                <ul class="globalMenu">
                    <li><?= $this->Html->link('画像一覧', ['controller' => 'common', 'action' => 'photolist']) ?></li>
                    <li><?= $this->Html->link('ユーザ情報', ['controller' => 'user', 'action' => 'userinfomation']) ?></li>
                    <li><?= $this->Html->link('問い合わせ一覧', ['controller' => 'manager', 'action' => 'inquiry']) ?></li>
                </ul>
            </div>

        <?php elseif ($sessionData['role'] == '管理者') : ?>
            <!--ログインユーザが管理者の場合-->
            <div class="col-md-6">
                <ul class="globalMenu">
                    <li><?= $this->Html->link('ユーザ一覧', ['controller' => 'account', 'action' => 'accountlist']) ?></li>
                    <li><a href="#">画像アップロード</a></li>
                    <li><?= $this->Html->link('画像一覧', ['controller' => 'common', 'action' => 'photolist']) ?></li>
                    <li><?= $this->Html->link('問い合わせ一覧', ['controller' => 'manager', 'action' => 'inquiry']) ?></li>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($sessionData['role'] != '未ログイン'): ?>
            <div class="col-md-3 login_status">
                <p id="user_type"><?= $sessionData['role'] ?></p>
                <p id="user_name"><u><?= $sessionData['userName'] ?></u>さん、ようこそ</p>
            </div>
        <?php endif; ?>
        <!--グラデーション-->
    </div>
</div>
<br><br>
