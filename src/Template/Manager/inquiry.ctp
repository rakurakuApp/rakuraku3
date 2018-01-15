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
<?= $this->Html->css('/private/css/account/cake_flash.css'); ?>

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
                    <input type="text" id="patron-name" class="form-control" name="patron_name"
                           value="<?php if( !empty($_POST['patron_name']) ) {
                               echo $_POST['patron_name'];
                           } ?>">
                </td>
                <!--児童名-->
                <td class="col-md-3">
                    <label class="Retrieval-table" for="children_name">児童名:</label>
                    <input type="text" id="children_name" class="form-control" name="children_name"
                           value="<?php if( !empty($_POST['children_name']) ) {
                               echo $_POST['children_name'];
                           } ?>">
                </td>
                <!--チェックボックス-->
                <td class="col-md-2">
                    <label for="remove-chk" class="checkbox" style="padding-left:5px;">
                        <input type="checkbox" id="remove-chk" class="checkbox" name="remove_chk" value="1"
                            <?php if( !empty($_POST['remove_chk']) && $_POST['remove_chk'] === "1" ){ echo 'checked'; } ?>> 対応済み問合わせを表示
                    </label>
                </td>

            </tr>
            <tr>
                <!--写真ID-->
                <td class="col-md-3">
                    <label class="Retrieval-table" for="photo-id">写真ID:</label>
                    <input type="text" id="photo-id" class="form-control" name="photo-id"
                           value="<?php if( !empty($_POST['children_name']) ) {
                               echo $_POST['children_name'];
                           } ?>">
                </td>

                <!--問合せ内容-->
                <td class="col-md-3">
                    <label class="control-label" for="inquiry-class">問合せ内容:</label>
                    <select id="inquiry_class" class="form-control " name="inquiry_class">
                        <option value="">選択</option>
                        <?php foreach ($reasons as $reasons): ?>
                            <option value="<?= $reasons->id ?>"><?= $reasons->detail ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <!--検索ボタン-->
                <td class="col-md-2">
                    <button type="submit" class="btn btn-primary retrievalbtn" id="btn-Retrieval">検索</button>
                </td>
            </tr>
        </table>
    </form>

    <!--テーブル-->
    <form method="post" name="form">
        <div class="row">
            <div class="Retrieval-table col-md-10 col-md-offset-1">
                <table class="table table-bordered">
                    <thead class="bg-primary">
                    <tr>
                        <th class="col-md-1">
                            <label>#</label></th>

                        <th class="col-md-2">
                            <label>問合せ者名</label></th>

                        <th class="col-md-2">
                            <label>児童名</label></th>

                        <th class="col-md-2">
                            <label>問合せ内容</label></th>

                        <th class="col-md-1">
                            <label>写真ID</label></th>

                        <th class="col-md-1">
                            <label class="checkbox">
                                <input type="checkbox" id="all" class="checkbox" data-toggle="checkbox"
                                       name="all" onClick="AllChecked();"> 全て選択
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
                            <!--問合せ者名-->
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
                            }?>
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
                            <td style="padding-left:20px;">
                                <input class="checkbox" type="checkbox"  data-toggle="checkbox"
                                       name="check_<?= $line ?>[]" value=''>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <!--右下のボタン-->
                <button class="btn btn-primary inquirybtn" type="submit"
                        formaction="<?= $this->URL->build(['controller' => 'Manager', 'action' => 'inquiryswitching']) ?>">
                    問合せ済みに
                </button>
            </div>
        </div>
    </form>
</div>