<!DOCTYPE html>
<html lang="ja">
<head>

    <!-- タイトルセット -->
    <?php $this->start('title');
    echo '問い合わせ詳細画面';
    $this->end(); ?>

    <!--ヘッダー設定-->
    <?= $this->Html->css('/private/css/common/header.css') ?>

    <!--css設定-->
    <?=$this->Html->css('/private/css/manager/inquirydetail.css') ?>
    <?= $this->Html->css('/private/css/account/cake_flash.css'); ?>

    <!--js設定-->
    <?= $this->Html->script('/private/js/manager/btnSwitching.js') ?>

</head>
<div>
    <h2 class="title col-md-12 text-center">問合わせ詳細</h2>
</div>

<body>
    <div class="container-fluid">
        <form method="post">
            <div class="row">
                <!--写真表示-->
                <div class="col-xs-6">
                    <?= $this->Html->image($parentInfo['0']['photos']['path'],['class'=>'photosize'])  ?>
                </div>
                <!--問合せ表示-->
                <div class="col-xs-offset-1 col-xs-5">
                    <div class="row moziheight">
                        <dl class="dltop">
                            <dt class="font">問合せ者名:
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
                            <dt class="font">問合せ内容:
                            <dd class="font">
                                <?= $parentInfo['0']['reason']['detail'] ?>
                            </dd>
                            </dt>
                        </dl>
                    </div>
                    <?php if ($parentInfo[0]['already'] == '0'): ?>
                        <?php //写真を非表示にするボタン?>
                        <button class="btn btn-primary btnsize" id="hide_btn" type="submit" name="photo_hide"
                                formaction="<?= $this->URL->build(['controller' => 'Manager', 'action' => 'inquirydetailphotohide',
                                    'updetanam' => $parentInfo[0]['id']]) ?>">
                            非表示
                        </button>
                    <?php else: ?>
                        <?php ($parentInfo[0]['already'] == '1') ?>
                        <?php //写真を非表示から表示にするボタン?>
                        <button class="btn btn-primary btnsize" id="hide_btn" type="submit" name="photo_hide"
                                formaction="<?= $this->URL->build(['controller' => 'Manager', 'action' => 'inquirydetailphotohide',
                                    'updetanam' => $parentInfo[0]['id']]) ?>">
                            表示
                        </button>
                    <?php endif; ?>

                    <!--閉じるボタン-->
                    <button class="btn btn-primary btnsize" type="submit" onClick="window.close()">
                        閉じる
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>