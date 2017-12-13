<?php
echo $this->Html->css('../private/css/common/header.css');
?>

<div class="header-container">
    <div class="row">
        <div class="col-md-4">
            <img src="<?= $this->request->getAttribute("webroot") ?>img/common/headerSample2.png" class="head-pic">
        </div>

        <div class="col-md-8 user_info">
        <p id="user_type"><?= $sessionData['role'] ?></p>
        <p id="user_name"><?= $sessionData['userName'] ?>さん、ようこそ</p>
        </div>

        <nav class="navbar navbar-default col-md-8">
            <div id="gnavi" class="collapse navbar-collapse nav col-md-12">
                <ul class="nav navbar-nav">
                    <li><a href="">ユーザ一覧</a></li>
                    <li><a href="">画像アップロード</a></li>
                    <li><a href="">画像一覧</a></li>
                    <li><a href="">問い合わせ一覧</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="weed_label"></div>

