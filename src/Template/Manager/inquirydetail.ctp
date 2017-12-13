<!DOCTYPE html>
<html lang="ja">
<head>

    <!-- タイトルセット -->
    <?php $this->start('title');
    echo '問い合わせ詳細画面';
    $this->end(); ?>

    <!--ヘッダー設定-->
    <?= $this->element('common\header') ?>
    <?= $this->Html->css('/private/css/common/header.css') ?>

    <!--css設定-->
    <?=$this->Html->css('/private/css/manager/inquirydetail.css') ?>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!--写真表示-->
                <div class="col-xs-6">
                    <?= $this->Html->image($parentInfo['0']['photos']['path'],['class'=>'photosize'])  ?>
                </div>
            <!--問い合わせ表示-->
            <div class="col-xs-offset-1 col-xs-5">
                <div class="row moziheight">
                    <dl class="dltop">
                        <dt class="font">問合わせ者名:
                            <dd class="font">
                                <?= $parentInfo['0']['patron']['username'] ?>
                            </dd>
                        </dt>
                    </dl>
                </div>

                <div class="row moziheight">
                    <dl class="dltop">
                        <dt class="font">児童名:
                            <dd class="font">
                                <?= $parentInfo['0']['children']['username'] ?>
                            </dd>
                        </dt>
                   </dl>
                </div>

                <div class="row moziheight">
                    <dl class="dltop">
                        <dt class="font">問合わせ内容:
                            <dd class="font">
                                <?= $parentInfo['0']['reason']['detail'] ?>
                            </dd>
                        </dt>
                    </dl>
                </div>
                <?php if ($parentInfo[0]['already'] == '0'): ?>
                    <?php //写真を非表示にするボタン?>
                    <?= $this->Form->button("非表示", [
                        "class" => "btn btn-hide",
                        "id" => "hide_btn",
                        "type" => "submit",
                        "formaction"=> $this->URL->build(['controller' => 'account', 'action' => 'reloadPatronDelete', 'deleteNum' => $parentInfo[0]['number']]),
                        "name" => "photo_hide",
                        "value" => 1,
                    ]) ?>
                <?php else: ?>
                    <?php ($parentInfo[0]['already'] == '1') ?>
                    <?php //親データの削除チェックがついている場合削除からの復帰ボタン?>
                    <?= $this->Form->button("表示", [
                        "class" => "btn btn-inverse",
                        "id" => "re_spawn_btn",
                        "type" => "submit",
                        "formaction"=> $this->URL->build(['controller' => 'account', 'action' => 'reloadPatronDelete', 'deleteNum' => $accountInfo[0]['number']]),
                        "name" => "patron_deleted",
                        'onClick' => 'return chkNumOfDelete(' . $cnt . ')',
                        "value" => 0,
                    ]) ?>
                <?php endif; ?>


                <!--閉じるボタン-->
                <button class="button" type="button"
                        onclick="window.close()">
                    閉じる
                </button>
             </div>
        </div>
    </div>
</body>
</html>
