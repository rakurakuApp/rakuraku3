<?php
/**
 * @var \App\View\AppView $this
 * @var $childClass
 * @var $patrons
 */
?>
<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/account/account_list.css'); ?>
<?php $this->end(); ?>
<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/account/table_link.js'); ?>
<?php $this->end(); ?>
<?php $this->start('title'); ?>
<?= 'ユーザ一覧'; ?>
<?php $this->end(); ?>

<div class="container container-fluid">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <h1>ユーザ一覧</h1>
        </div>
    </div>

    <form action="" method="post" class="form-inline">
        <div class="right">
            <button class="btn btn-info" id="updateBtn" type="submit">更新</button>
        </div>
        <table class="table table-bordered">
            <thead class="bg-primary">
            <tr>
                <th colspan="4" class="col-md-12">絞り込み検索</th>
            </tr>
            </thead>
            <tr>
                <td class="col-md-3">
                    <label class="control-label" for="children-no">児童番号:</label>
                    <input type="text" id="children-no" class="form-control" name="child_no">
                </td>
                <td class="col-md-2">
                    <label class="control-label" for="child-class">クラス:</label>

                    <select id="child-class" class="form-control" name="child_class">
                        <option value="">選択</option>
                        <?php foreach ($childClass as $childClasses): ?>
                            <option value="<?= $childClasses->id ?>"><?= $childClasses->class_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="col-md-3">
                    <label class="control-label" for="child-name">児童名:</label>
                    <input type="text" id="child-name" class="form-control" name="child_name">
                </td>
                <td class="col-md-3">
                    <label class="control-label" for="child-age">児童年齢:</label>
                    <input type="text" id="child-age" class="form-control" name="child_age">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label" for="parent-name">保護者名:</label>
                    <input type="text" id="parent-name" class="form-control" name="parent_name">
                </td>
                <td>
                    <label for="remove-chk" class="checkbox">除外アカウントを表示
                        <input type="checkbox" id="remove-chk" class="checkbox" data-toggle="checkbox"
                               name="remove_chk">
                    </label>
                </td>
                <td>
                    <button type="submit" class="btn btn-primary full">検索</button>
                </td>
                <td>
                    <button type="button" class="btn btn-warning full"
                            onclick="window.open('<?= $this->URL->build(['controller' => 'Account', 'action' => 'addacount']);?>','アカウント追加','width=700,height=600')">
                        アカウント新規作成
                    </button>
                </td>
            </tr>
        </table>
        <div class="row">
            <div class="col-md-12 col-xs-12" id="content">
                <?= $this->Element('account/acListEle') ?>
            </div>
        </div>
    </form>
    <br><br>
</div>

