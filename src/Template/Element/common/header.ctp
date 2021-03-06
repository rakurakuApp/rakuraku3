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
                <li><?= $this->Html->link('画像一覧', ['controller' => 'common', 'action' => 'photolist']); ?></li>
                <li><?= $this->Html->link('ユーザ情報', ['controller' => 'user', 'action' => 'userinformation']) ?></li>
                <li><?= $this->Html->link('問い合わせ一覧', ['controller' => 'user', 'action' => 'inquiryresponselist']) ?></li>
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
                <li><?= $this->Html->link('ユーザ一覧', ['controller' => 'account', 'action' => 'accountlist']) ?></li>
                <li><?= $this->Html->link('画像アップロード', ['controller' => 'manager', 'action' => 'photoup']) ?></li>
                <li><?= $this->Html->link('画像一覧', ['controller' => 'common', 'action' => 'photolist']) ?></li>
                <li><?= $this->Html->link('問い合わせ一覧', ['controller' => 'manager', 'action' => 'inquiry']) ?></li>
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

