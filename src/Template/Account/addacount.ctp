<?php
/**
 * @var \App\View\AppView $this
 * @var $childClass
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
<?= 'アカウント新規作成'; ?>
<?php $this->end(); ?>

<h1 class="title"><span class="glyphicon glyphicon-user" id="glyphicon-user"></span>アカウント新規作成</h1>

<div class="container">
    <div class="formOutline">
        <form action="" method="post" class="form form-inline">
            <div class="formOutlineTitle">
                <!-- タイトル -->
                <h2>アカウントタイプ選択</h2>
            </div>
            <div class="selectFormType row">
                <!-- 作成アカウントタイプ選択 -->
                <div class="radio col-md-6 col-xs-5">
                    <label for="selectUserRadio">
                        <input type="radio" name="selectFormType" value="user" id="selectUserRadio" checked>保護者
                    </label>
                </div>
                <div class="radio col-md-6 col-xs-5">
                    <label for="selectManagerRadio">
                        <input type="radio" name="selectFormType" value="manager" id="selectManagerRadio">管理者
                    </label>
                </div>
            </div>

            <div class="formContents userContent row" id="formContents">
                <div class="userType userForm">
                    <h3>保護者登録</h3>
                </div>
                <ul>
                    <li>
                        <label for="user_ID">ID</label>
                        <input type="text" id="user_ID">
                    </li>
                    <li>
                        <label for="user_username">ユーザー名</label>
                        <input type="text" id="user_username">
                    </li>
                    <li>
                        <label for="user_email">メールアドレス</label>
                        <input type="email" id="user_email">
                    </li>
                    <li>
                        <label for="user_password">パスワード</label>
                        <input type="password" id="user_password">
                    </li>
                    <li>
                        <label for="user_ReEnter">パスワード再入力</label>
                        <input type="password" id="user_ReEnter">
                    </li>
                </ul>
                <div class="userType userForm">
                    <h3>児童情報<span class="glyphicon glyphicon-plus-sign" id="glyphicon-plus-sign"></span></h3>
                </div>
                <div class="addChildInfo">
                    <ul>
                        <li>
                            <label for="child_name">児童名</label>
                            <input type="text" id="child_name" name="child_name[]">
                        </li>
                        <li>
                            <label for="child_age">年齢</label>
                            <input type="text" id="child_age" name="child_age[]">
                        </li>
                        <li>
                            <label for="child_class">所属組</label>
                            <select name="child_class[]" id="child_class">
                                <option value="">選択</option>
                                <?php foreach ($childClass as $data):; ?>
                                    <?= "<option value=" . $data->id . ">" . $data->class_name . '</option>' ?>
                                <?php endforeach; ?>
                            </select>
                        </li>
                        <li>

                        </li>
                    </ul>
                </div>
            </div>

            <div class="formContents managerContent row display" id="formContents">
                <div class="userType managerForm">
                    <h3>管理者登録</h3>
                </div>
                <ul>
                    <li>
                        <label for="manager_username">ユーザー名</label>
                        <input type="text" id="manager_username">
                    </li>
                    <li>
                        <label for="manager_password">パスワード</label>
                        <input type="password" id="manager_password">
                    </li>
                    <li>
                        <label for="manager_ReEnter">パスワード再入力</label>
                        <input type="password" id="manager_ReEnter">
                    </li>
                </ul>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">決定</button>
        </form>
    </div>
</div>
