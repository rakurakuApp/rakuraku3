<!--コンテンツ内容-->
<div class="pure-container" data-effect="pure-effect-slide">
    <input type="checkbox" id="pure-toggle-left" class="pure-toggle" data-toggle="left">
    <label class="pure-toggle-label" for="pure-toggle-left" data-toggle-label="left">
        <span class="pure-toggle-icon"></span>
    </label>

    <div class="pure-drawer" data-position="left">
        <br>
        <?php //管理者画面でのサイドメニュー項目  ?>
        <ul class="nav-primary">
            <li class="user-info">ユーザタイプ</li>
            <li class="user-info">ユーザ名</li>
            <li><a href="<?= $this->URL->build(['controller'=>'account','action'=>'accountlist']) ?>">ユーザ一覧</a></li>
            <li><a href="<?= $this->URL->build(['controller'=>'','action'=>'']) ?>">画像アップロード</a></li>
            <li><a href="<?= $this->URL->build(['controller'=>'common','action'=>'photolist']) ?>">画像一覧</a></li>
            <li><a href="<?= $this->URL->build(['controller'=>'manager','action'=>'inquiry']) ?>">問い合わせ一覧</a></li>
            <li id="logout" style="font-weight: bold"><a href="<?= $this->URL->build([]) ?>">ログアウト</a></li>
        </ul>
    </div>
</div>