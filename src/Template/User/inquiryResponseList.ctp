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
    <div class="row">
        <?php foreach ($inquiries as $key => $data): ?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="<?= $data['_matchingData']['Photos']['path'] ?>" alt="イメージが見つかりません" style="width: 20rem">
                    <div class="caption">
                        <h3><?= $data['_matchingData']['Events']['event']?></h3>
                        <!-- 対応済みかどうか -->
                        <?php if ($data['already']){
                            echo '<p>対応済み</p>';
                        }else{
                            echo '<p>未対応</p>';
                        }
                        ?>
                        <p>理由：<?= $data['_matchingData']['Reason']['detail']?></p>
                        <p>問い合わせ日付：<?= substr($data['created'],0,strpos($data['created'],','))  ?></p>
                    </div><!-- /.caption -->
                </div><!-- /.thumbnail -->
            </div><!-- /.col-sm-6.col-md-3 -->
        <?php endforeach; ?>
    </div>
</div>