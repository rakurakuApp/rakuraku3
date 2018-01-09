<!DOCTYPE html>
<!-- ヘッダー -->
<?= $this->Html->css('/private/css/common/header.css') ?>
<?= $this->element('common\header') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

<!-- login用css -->
<?= $this->Html->css('/private/css/login/login.css') ?>


<!-- All the files that are required -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>


<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="text-center" style="padding:50px 0">
    <div class="logo">Login</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="login-form" class="text-left" method="post">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="lg_username" class="sr-only">ID</label>
                        <input type="text" class="form-control" id="lg_username" name="id" placeholder="ID"
                               value="<?php if (!empty($this->request->getData('id'))) {
                                   echo $this->request->getData('id');
                               } ?>">
                    </div>
                    <div class="form-group">
                        <label for="lg_password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="lg_password" name="password"
                               placeholder="Password"
                               value="<?php if (!empty($this->request->getData('password'))) {
                                   echo $this->request->getData('password');
                               } ?>">
                    </div>
                    <div class="form-group login-group-checkbox down">
                        <input type="checkbox" id="lg_remember"
                               name="teacher"<?php if (!empty($this->request->getData('teacher'))) {
                            echo 'checked';
                        } ?>>
                        <label for="lg_remember">先生はチェック</label>
                        <span id="errormessage"><?php if (!empty($this->viewVars['errorMessage'])) {
                                echo '<br>' . $this->viewVars['errorMessage'];
                            } ?></span>
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <p><a href="/rakuraku/login/forget">IDまたはパスワードをお忘れの方</a></p>
            </div>
        </form>
    </div>
</div>