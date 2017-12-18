<?php
/**
 * @var \App\View\AppView $this
 *
 *  * 問い合わせ内容
 * @var $inquiries
 * already 対応済みかどうか
 * created['time'] 問い合わせした時刻
 * _matchingdata['Reason']['detail']
 * 問い合わせ時刻
 * _matchingdata['photo']['path']
 * 画像パス
 */
?>
<!-- 各読み込み -->
<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/user/inquiryResponseList.css') ?>
<?php $this->end() ?>

<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/user/inquiryResponseList.js') ?>
<?php $this->end(); ?>

<?php $this->start('title'); ?>
<?= '問い合わせ情報' ?>
<?php $this->end(); ?>

<!-- グローバルナビ読み込み -->
<?= $this->Element('common/header'); ?>

<div class="container-fluid">
    <div class="row">
        <h1>問い合わせ情報</h1>
    </div>
    <br>
    <div class="row">
        <?php if (!empty($inquiries)): ?>
            <?php foreach ($inquiries as $key => $data): ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="<?= $data['_matchingData']['Photos']['path'] ?>" alt="イメージが見つかりません"
                             style="width: 20rem;border-radius: 6px">
                        <div class="caption">
                            <h3 id="event"><?= $data['_matchingData']['Events']['event'] ?></h3>
                            <!-- 対応済みかどうか -->
                            <?php if ($data['already']) {
                                echo '<p>保育士：対応済み</p>';
                            } else {
                                echo '<p>保育士：未対応</p>';
                            }
                            ?>
                            <p>理由：<?= $data['_matchingData']['Reason']['detail'] ?></p>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-warning center-block" type="button"
                                            data-toggle="modal" data-target="#modal_<?= $key ?>" style="width: 80%">
                                        問い合わせを取り消す
                                    </button>
                                </div>
                            </div>

                            <div class="modal fade" id="modal_<?= $key ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span>x</span>
                                            </button>
                                            <h4 class="modal-title"><?= $data['_matchingData']['Events']['event'] ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            この問い合わせを取り消します。<br>
                                            よろしいですか？
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary deleteInq"
                                                    id="deleteInq_<?= $key ?>" value="<?= $data->id ?>">確定
                                            </button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p id="inqDate">
                                問い合わせ日付：<?= substr($data['created'], 0, strpos($data['created'], ',')) ?></p>
                        </div><!-- /.caption -->
                    </div><!-- /.thumbnail -->
                </div><!-- /.col-sm-6.col-md-3 -->
            <?php endforeach; ?>
        <?php else: ?>
            <p>データがありません</p>
        <?php endif; ?>
    </div>
    <!-- モーダルダイアログ -->
    <br><br><br>
</div>