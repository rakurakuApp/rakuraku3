<!DOCTYPE html>
<!-- ヘッダー -->
<?= $this->Html->css('/private/css/common/header.css') ?>
<?= $this->element('common\header') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

<?= $this->Html->css('/private/css/login/success.css') ?>

<?= $this->Html->script('/private/js/login/success.js') ?>

<!DOCTYPE html>
<html lang="jp">
</html>
<body>
<form type="post" class="back" method="post">
    <div class="message" id="message">
        <label id="successText">メールアドレスにIDとパスワードを送信しました。<br></label>
        <div class="pon"><span id="sec">3</span>
            <span>秒後にログイン画面に移動します。</span>
            <div class="hand">
                <span>しばらく待っても移動しない場合は<a href="/rakuraku/login">ログイン</a>をクリック。</span>
            </div>
            <br>
        </div>
    </div>
</form>
</body>
</html>