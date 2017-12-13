<?php
/**
 * @var \App\View\AppView $this
 * @var $accountInfo
 * @var $entity
 */
?>

<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/account/individual_info.css'); ?>
<?= $this->Html->css('/private/css/account/cake_flash.css'); ?>
<?php $this->end() ?>

<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/account/edit_form.js'); ?>

<?php $this->end(); ?>

<?php $this->start('title'); ?>
<?= 'ユーザ管理'; ?>
<?php $this->end(); ?>
<div>
    <h2 class="title col-md-12 text-center">ユーザ管理</h2>
</div>
<br>
<div class="container-fluid">
    <form method="post" class="form form-inline individual_info_form" id="editForm">
        <table class="table table-responsive form_table">
            <tr>
                <th class="bg-warning font_center">アカウント情報</th>
            </tr>
            <tr>
                <td class="font_center">
                    <h6><?= $accountInfo[0]['username'] ?></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email" class="control-label label-layout">メールアドレス:</label>
                    <input type="text" class="form-control input-layout" id="email" name="email" disabled
                           value="<?= $accountInfo[0]['email'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="account_id" class="control-label label-layout">ID:</label>
                    <input type="text" class="form-control input-layout" id="account_id" name="account_id" disabled
                           value="<?= $accountInfo[0]['id'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password" class="control-label label-layout">PassWord:</label>
                    <input type="password" class="form-control input-layout" id="password" name="password" disabled
                           value="<?= $accountInfo[0]['password'] ?>">
                </td>
            </tr>
        </table>
        <div class="row">
            <label for="chk_show" class="checkbox control-label form_edit_chk">パスワードを表示
                <input type="checkbox" id="chk_show" class="checkbox" data-toggle="checkbox">
            </label>
            <label for="chk_edit" class="checkbox control-label form_edit_chk">編集可能にする
                <input type="checkbox" id="chk_edit" class="checkbox" data-toggle="checkbox">
            </label>
        </div>
        <br><br>
        <table class="table table-bordered children_info">
            <thead class="bg-primary">
            <tr>
                <th class="col-md-1">#</th>
                <th class="col-md-1">児童番号</th>
                <th class="col-md-3">児童クラス</th>
                <th class="col-md-4">児童名</th>
                <th class="col-md-1">削除</th>
            </tr>
            </thead>
            <?php foreach ($accountInfo[0]['children'] as $key => $data): ?>
                <tr>
                    <td><?= ($key + 1) ?></td>
                    <td><?= $data->id ?></td>
                    <td><?= $data->child_clas['class_name'] ?></td>
                    <td><?= $data->username ?></td>
                    <td>
                        <input type="hidden" name="delete_chk[<?= $key; ?>][id]" value="<?= $data->id ?>">
                        <input type="hidden" name="delete_chk[<?= $key; ?>][delete]" value="0">
                        <label for="delete_chk<?= ($key + 1) ?>" class="control-label checkbox">
                            <input type="checkbox" id="delete_chk<?= ($key + 1) ?>"
                                   name="delete_chk[<?= $key; ?>][delete]"
                                   value="1" class="checkbox del_flag"
                                   data-toggle="checkbox"
                                <?php if ($data->deleted == 1) echo "checked" ?> disabled>
                        </label>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button class="btn btn-primary" id="confirm_btn"
                formaction="<?= $this->URL->build(['action' => 'editrecord', 'editNum' => $accountInfo[0]['number']]) ?>">
            完了
        </button>

        <?php if ($accountInfo[0]['deleted'] == '0'): ?>
            <?php //親データの削除チェックがついていない場合削除ボタン?>
            <?= $this->Form->button("このアカウントを削除する", [
                "class" => "btn btn-danger",
                "id" => "delete_btn",
                "type" => "submit",
                "formaction"=> $this->URL->build(['controller' => 'account', 'action' => 'reloadPatronDelete', 'deleteNum' => $accountInfo[0]['number']]),
                "name" => "patron_deleted",
                "value" => 1,
            ]) ?>
        <?php else: ?>
            <?php $cnt = count($accountInfo[0]->children); ?>
            <?php //親データの削除チェックがついている場合削除からの復帰ボタン?>
            <?= $this->Form->button("削除チェックを外す", [
                "class" => "btn btn-inverse",
                "id" => "re_spawn_btn",
                "type" => "submit",
                "formaction"=> $this->URL->build(['controller' => 'account', 'action' => 'reloadPatronDelete', 'deleteNum' => $accountInfo[0]['number']]),
                "name" => "patron_deleted",
                'onClick' => 'return chkNumOfDelete(' . $cnt . ')',
                "value" => 0,
            ]) ?>
        <?php endif; ?>
    </form>
    <br><br>
</div>