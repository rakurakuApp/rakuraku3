<?php
/**
 * @var \App\View\AppView $this
 * @var $childClass
 */
?>

<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/account/confirmAddAccount.css'); ?>
<?php $this->end(); ?>

<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/account/**.js'); ?>
<?php $this->end(); ?>

<?php $this->start('title'); ?>
<?= '入力項目確認'; ?>
<?php $this->end(); ?>

<h1 class="center anotherBlue anotherBlue_fonts">最終確認</h1>
<div class="container">
    <form action="" method="post">
        <p class="center">以下の情報を追加登録します。<br>よろしいですか？</p>
        <!-- 前回入力ラジオボタンの種別により表示項目を切り替える -->
        <?php if ($this->request->getData('selectFormType') == 'user'):?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="2" class="center heavenBlue heavenBlue_fonts">ユーザ情報</th>
                </tr>
                </thead>
                <tr>
                    <td>ユーザ名</td>
                    <td><?= $this->request->getData('username'); ?></td>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <td><?= $this->request->getData('email'); ?></td>
                </tr>
                <thead>
                <tr>
                    <th colspan="2" class="center heavenBlue heavenBlue_fonts">児童情報</th>
                </tr>
                </thead>
                <tr>
                    <td>児童名</td>
                    <td><?= $this->request->getData('child_name'); ?></td>
                </tr>
                <tr>
                    <td>年齢</td>
                    <td><?= $this->request->getData('child_age'); ?></td>
                </tr>
                <tr>
                    <td>所属組</td>
                    <td><?= $childClass[0]->class_name; ?></td>
                </tr>
            </table>
            <input type="hidden" value="<?= $this->request->getData('username');?>" name="username">
            <input type="hidden" value="<?= $this->request->getData('email'); ?>" name="email">
            <input type="hidden" value="<?= $this->request->getData('child_name'); ?>" name="child_name">
            <input type="hidden" value="<?= $this->request->getData('child_age'); ?>" name="child_age">
            <input type="hidden" value="<?=$this->request->getData('child_class');?>" name="child_class">
        <?php else:?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="2" class="center blush blush_fonts">ユーザ情報</th>
                </tr>
                </thead>
                <tr>
                    <td>管理者名</td>
                    <td><?= $this->request->getData('manager_username'); ?></td>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <td><?= $this->request->getData('manager_password'); ?></td>
                </tr>
            </table>
            <input type="hidden" value="<?= $this->request->getData('manager_username'); ?>">
            <input type="hidden" value="<?= $this->request->getData('manager_password'); ?>">
        <?php endif; ?>
        <ul class="center side_by_side">
            <li>
                <button type="submit" class="btn btn-info"
                        formaction="<?= $this->URL->build(['controller' => 'account', 'action' => 'registryaccount']);?>">
                    登録する
                </button>
            </li>
            <li>
                <button type="submit" class="btn btn-danger"
                        formaction="<?= $this->URL->build(['controller' => 'account', 'action' => 'addacount']);?>">修正する
                </button>
            </li>
        </ul>
        <input type="hidden" name="selectFormType" value="<?= $this->request->getData('selectFormType'); ?>">
    </form>
</div>