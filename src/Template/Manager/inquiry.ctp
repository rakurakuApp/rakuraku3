<?php
/**
 * @var \App\View\AppView $this
 * @var $Inquiries
 * @var $reasons
 */
?>
<!-- タイトルセット -->
<?php $this->start('title');
echo '問い合わせ一覧画面';
$this->end(); ?>

<!--ヘッダー設定-->
<?= $this->element('common\header') ?>
<?= $this->Html->css('/private/css/common/header.css') ?>

<!--css設定-->
<?= $this->Html->css('/private/css/manager/inquiry.css') ?>

<!--js設定-->
<?= $this->Html->script('/private/js/manager/check.js') ?>

<div class="container-fluid" xmlns:width="http://www.w3.org/1999/xhtml">

    <!--タイトル-->
    <div class="col-md-12 title">
        <h2>問合せ一覧画面</h2>
    </div>

    <!--検索機能-->
    <form action="" method="post" class="Retrieval-table form-inline col-md-8 col-md-offset-2">
        <table class="table table-bordered">
            <thead class="bg-primary">
            <tr>
                <th colspan="4">絞り込み検索</th>
            </tr>
            </thead>
            <tr>
                <!--保護者名-->
                <td class="col-md-3">
                    <label class="Retrieval-table" for="patron-name">問合せ者名:</label>
                    <input type="text" id="patron-name" class="form-control" name="patron_name">
                </td>

                <!--児童名-->
                <td class="col-md-3">
                    <label class="Retrieval-table" for="children_name">児童名:</label>
                    <input type="text" id="children_name" class="form-control" name="children_name">
                </td>
                <!--チェックボックス-->
                <td class="col-md-2">
                    <label for="remove-chk" class="checkbox">対応済み問合せを表示
                        <input type="checkbox" id="remove-chk" class="checkbox" data-toggle="checkbox"
                               name="remove_chk">
                    </label>
                </td>

            </tr>
            <tr>
                <!--写真ID-->
                <td class="col-md-3">
                    <label class="Retrieval-table" for="photo-id">写真ID:</label>
                    <input type="text" id="photo-id" class="form-control" name="photo-id">
                </td>

                <!--問合わせ内容-->
                <td class="col-md-3">
                    <label class="control-label" for="inquiry-class">問合わせ内容:</label>
                    <select id="inquiry_class" class="form-control " name="inquiry_class">
                        <option value="">選択</option>
                        <?php foreach ($reasons as $reasons): ?>
                            <option value="<?= $reasons->id ?>"><?= $reasons->detail ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <!--検索ボタン-->
                <td class="col-md-2">
                    <button type="submit" class="btn btn-primary full" id="btn-Retrieval">検索</button>
                </td>
            </tr>
        </table>
    </form>

    <!--テーブル-->
    <div class="row">
        <div class="Retrieval-table col-md-10 col-md-offset-1">
            <table class="table table-bordered">
                <thead class="bg-primary">
                <tr>
                    <th class="col-md-1">
                        <label>#</label></th>

                    <th class="col-md-2">
                        <label>問合わせ者名</label></th>

                    <th class="col-md-2">
                        <label>児童名</label></th>

                    <th class="col-md-2">
                        <label>問合わせ内容</label></th>

                    <th class="col-md-1">
                        <label>写真ID</label></th>

                    <th class="col-md-1">
                        <label class="checkbox">全て選択
                            <input type="checkbox" id="all" class="checkbox" data-toggle="checkbox"
                                   name="all" onClick="AllChecked();">
                        </label>
                    </th>
                </tr>

                </thead>
                <?php $cnt = 1 ?>
                <?php $line =0 ?>
                <?php foreach ($Inquiries as $key => $value): ?>
                    <?php
                    if ($cnt != 1) {
                        $cnt--;
                        continue;
                    } ?>
                    <?php
                    if ($value->already == 1) {
                        echo '<tr class = "already_info"';
                    } else {

                    } ?>
                    <tr>
                        <!--行番号-->
                        <td id="number" class="inquirylist"
                            onclick="window.open('<?= $this->URL->build(['controller' => 'Manager', 'action' => 'inquirydetail', 'number' => $value->id]) ?>'
                                    ,'問合せ詳細','width=800,height=600')"><?= $line + 1 ?>
                        </td>
                        <!--問合わせ者名-->
                        <td id="patronusername" class="inquirylist"
                            onclick="window.open('<?= $this->URL->build(['controller' => 'Manager', 'action' => 'inquirydetail', 'number' => $value->id]) ?>'
                                    ,'問合せ詳細','width=800,height=600')"><?= $value['patron']['username'] ?>
                        </td>
                        <!--児童名-->
                        <?php
                        $childName = $value['children']['username'];
                        while ($key + $cnt < count($Inquiries) && $value['patron']['username'] == $Inquiries[$key + $cnt]['patron']['username']
                        && $value['reason']['detail'] == $Inquiries[$key + $cnt]['reason']['detail']
                        && $value['photos']['id'] == $Inquiries[$key + $cnt]['photos']['id']) {
                            $childName .= "&nbsp;&nbsp;,&nbsp;&nbsp;";
                            $childName .= $Inquiries[$key + $cnt]['children']['username'];
                            $cnt++;
                        } ?>
                        <td id="childusername" class="inquirylist"
                            onclick="window.open('<?= $this->URL->build(['controller' => 'Manager', 'action' => 'inquirydetail', 'number' => $value->id]) ?>'
                                    ,'問合せ詳細','width=800,height=600')"><?= $childName ?>
                        </td>
                        <!--問合せ理由-->
                        <?php $line++ ?>
                        <td id="reasondetail" class="inquirylist"
                            onclick="window.open('<?= $this->URL->build(['controller' => 'Manager', 'action' => 'inquirydetail', 'number' => $value->id]) ?>'
                                    ,'問合せ詳細','width=800,height=600')"><?= $value['reason']['detail'] ?>
                        </td>
                        <!--写真ID-->
                        <td id="photoid" class="inquirylist"
                            onclick="window.open('<?= $this->URL->build(['controller' => 'Manager', 'action' => 'inquirydetail', 'number' => $value->id]) ?>'
                                    ,'問合せ詳細','width=800,height=600')"><?= $value['photos']['id'] ?>
                        </td>
                        <!--チェックボックス-->
                        <td>
                        <label class="checkbox">
                            <input type="checkbox" class="checkbox" data-toggle="checkbox"
                                   name="check" value=''>
                        </label>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>