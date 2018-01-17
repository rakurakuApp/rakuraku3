<?php
/**
 * @var \App\View\AppView $this
 * @var $sessionData
 */
?>
<?= $this->Html->css('/private/css/common/header.css') ?>

<nav class="navbar navbar-custom">
    <div class="navbar-header">
        <!-- サイトタイトル ロゴ -->
        <a class="navbar-brand" href="#"></a>
        <?php if ($sessionData['role'] != '未ログイン'): ?>
            <!-- 画面縮小時のハンバーガーメニュー -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
                <span class="sr-only">メニュー</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <?php endif; ?>
    </div>
    <div id="gnavi" class="collapse navbar-collapse">
        <?php if ($sessionData['role'] == '保護者'): ?>
            <!--ログインユーザが保護者の場合-->
            <ul class="nav navbar-nav">
                <li><a href="<?= $this->URL->build(['controller' => 'common', 'action' => 'photolist']); ?>">
                        <span class="glyphicon glyphicon-book"></span>画像一覧</a></li>
                <li><a href="<?= $this->URL->build(['controller' => 'user', 'action' => 'userinformation']); ?>">
                        <span class="glyphicon glyphicon-user"></span>ユーザ情報</a></li>
                <li><a href="<?= $this->URL->build(['controller' => 'user', 'action' => 'inquiryresponselist']); ?>">
                        <span class="glyphicon glyphicon-earphone"></span>問い合わせ一覧</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button"><?= $sessionData['userName'] ?>さん <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link('ログアウト', ['controller' => 'login', 'action' => 'logout']) ?></li>
                    </ul>
                </li>
            </ul>
        <?php elseif ($sessionData['role'] == '管理者') : ?>
            <!--ログインユーザが管理者の場合-->
            <ul class="nav navbar-nav">
                <li><a href="<?= $this->URL->build(['controller' => 'account', 'action' => 'accountlist']); ?>">
                        <span class="glyphicon glyphicon-list"></span>ユーザ一覧</a></li>
                <li><a href="<?= $this->URL->build(['controller' => 'manager', 'action' => 'photoup']); ?>">
                        <span class="glyphicon glyphicon-circle-arrow-up"></span>画像アップロード</a></li>
                <li><a href="<?= $this->URL->build(['controller' => 'common', 'action' => 'photolist']); ?>">
                        <span class="glyphicon glyphicon-picture"></span>画像一覧</a></li>
                <li><a href="<?= $this->URL->build(['controller' => 'manager', 'action' => 'inquiry']); ?>">
                        <span class="glyphicon glyphicon-info-sign"></span>問い合わせ一覧</a></li>
            </ul>
            <!--ドロップダウンメニュー-->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button"><?= $sessionData['userName'] ?>さん <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link('ログアウト', ['controller' => 'login', 'action' => 'logout']) ?></li>
                    </ul>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>

