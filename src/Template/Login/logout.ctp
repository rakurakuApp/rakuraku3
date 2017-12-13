<!DOCTYPE html>
<!-- ヘッダー -->
<?= $this->Html->css('/private/css/common/header.css') ?>
<?= $this->element('common\header') ?>

<!--css-->
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css') ?>
<?= $this->Html->css('flat-ui.css') ?>

<!--js-->
<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js') ?>
<?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js')?>
<?= $this->Html->script('flat-ui.js')?>

<?= $this->Html->script('application.js') ?>
<?= $this->Html->script('prettify.js') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

<!-- logout用css -->
<?= $this->Html->css('/private/css/login/logout.css') ?>

<html>
<form id="loginform" name="loginform" action="" method="post">
    <div class="container-fluid">
                    <?= $this->fetch('content') ?>
        <div class="contain-solid">
                        <div class="logout-message">
                            <br>
                            <div class="box">
                                <span id="text1">ログアウトしています．．．</span>
                            </div>
                            <div class="pon"><span id="sec">3</span>
                                <span>秒後にログイン画面に移動します。</span>
                                <div class="hand">
                                    <span>しばらく待っても移動しない場合は<br><a href="/rakuraku/login">ログイン</a>をクリック。</span>
                                </div>
                                <br>
                            </div>
                        </div>
        </div>
        </div>
</form>
</html>