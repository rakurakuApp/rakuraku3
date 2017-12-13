<?php
/**
 * @var \App\View\AppView $this
 * @var $photoList //画像情報の入った配列
 * @var $inquiryReason //通報理由一覧配列
 *
 */
?>

<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/common/header.css') ?>
<?= $this->Html->css('/private/css/common/photolist.css') ?>
<?php $this->end(); ?>

<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/common/PhotoList/ColorChange.js') ?>
<?= $this->Html->script('/private/js/common/PhotoList/inquiry.js') ?>
<?= $this->Html->script('/private/js/common/PhotoList/InquiryForm.js') ?>
<?php $this->end(); ?>

<?= $this->element('common\header') ?>

<div class="container-fluid">
    <div class="Photo-Box">
        <?php foreach ($photoList as $key => $image) {
            if ($key % 4 == 0) {
                echo '<div class="row row-eq-height">';
                echo '<div class = "col-lg-offset-2 col-md-2">';
            }else if ($key % 4 == 3){
                echo '<div class = "col-md-2 col-lg-offset-2">';
            }else{
                echo '<div class = "col-md-2">';
            }
            echo $this->Html->image('common/pin.png', ['class' => 'pin']);
            echo $this->Html->image($image['path'], ['class' => 'photo']);
            echo '</div>';
            if ($key % 4 == 3 && $key != 0) {
                echo '</div><br><br>';
            }
        } ?>
        <br><br><br>
    </div>
    <!--モーダル-->
    <div id="modal">
        <div id="open02">
            <a href="#" class="close_overlay">×</a>
            <div class="example">
                <div class="modal_window">
                    <h2 id="list">picture</h2>
                    <p id="star" class=" size" onclick="star()">★</p>

                    <!--問い合わせ一覧-->
                    <ul id="left-to-right" class="dropmenu">
                        <li>
                            <p id="flag" class="size">🏴</p>
                            <ul id="drop">
                                <div class="balloon1-left">
                                    <?php foreach ($inquiryReason as $key => $reasonData):; ?>
                                        <li><a id='drop<?= $key; ?>'><?= $reasonData->detail; ?></a></li>
                                    <?php endforeach; ?>
                                </div>
                            </ul>
                        </li>
                    </ul>
                    <!--モーダルのがぞう-->
                    <br/>
                    <a href="#" class="text-hight">【×】CLOSE</a>
                </div><!--/.modal_window-->
            </div>
        </div><!--/#open02-->
    </div><!--/#modal-->
    <?= $this->Paginator->first('<<first'); ?>
    <?= $this->Paginator->prev('<prev'); ?>
    <?= $this->Paginator->numbers(); ?>
    <?= $this->Paginator->next('next>'); ?>
    <?= $this->Paginator->last('last>>'); ?>
</div><!--/#contents-->
