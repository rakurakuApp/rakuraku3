<!DOCTYPE html>
<!-- ヘッダー -->
<?= $this->Html->css('/private/css/common/header.css') ?>
<?= $this->element('common\header') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

<?= $this->Html->css('/private/css/login/forget.css') ?>

<!DOCTYPE html>
<html lang="jp">
</html>
<body>
<form type="post" class="back" method="post">
    <div class="mail0" id="mail" >
        登録したメールアドレスに
        IDとパスワードを送信します。<br><br>
        <label>登録したメールアドレス</label>
        <input type="text" class="form-control " id="inputEmail" placeholder="メールアドレス" name="mail">
    </div>
    <div class="mail1" id="confirmation-mail">
        <label><br>確認用メールアドレス</label>
        <input type="text" class="form-control" id="confirmationEmail" placeholder="確認用メールアドレス" name="confirmation">
        <label id="errormessage"><?php if(!empty($this->viewVars['errorMessage'])){echo '<br>'.$this->viewVars['errorMessage'];}?></label>
    </div>
    <div class="Savebtn">
        <p>
            <button type="submit" class="btn btn-primary SaveBox">送信</button>
        </p>
    </div>
</form>
</body>
</html>