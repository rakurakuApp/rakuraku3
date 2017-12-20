<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/common/photolist.css') ?>
<?php $this->end(); ?>
<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/common/PhotoList/ColorChange.js') ?>
<?= $this->Html->script('/private/js/common/PhotoList/inquiry.js') ?>
<?= $this->Html->script('/private/js/common/PhotoList/InquiryForm.js') ?>
<?php $this->end(); ?>

<div>
    <?= $this->element('common\header') ?>
</div>
<div>
    <?= $this->element('common\sidemenu') ?>
</div>
<!--画像-->

<div id="contents">
    <div class="Photo-Box">
        <div class="col-md-12">
            <div class="row a ">
                <div class="row">
                    <?php
                    //                偶数
                    for($i = 0;$i < 8;$i += 2){
                        if(!empty($array)) {
                            echo $this->Html->image($array, ['data-target'=>'#myModal' , 'data-toggle'=>'modal' , 'class' => 'photo photo-margin col-md-3 ' ,'id'=>'image'.($i + ( ($this->Paginator->current() - 1) * 8))]);
                        }
                    }
                    ?>
                    <?php
                    //                奇数
                    for($i = 1;$i < 8;$i += 2){
                        if(!empty($array)) {
                            echo $this->Html->image($array, ['data-target'=>'#myModal' , 'data-toggle'=>'modal' , 'class' => 'photo photo-margin col-md-3' , 'id'=>'image'.($i + ( ($this->Paginator->current() - 1) * 8))]);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contents-->


<!-- モーダルウィンドウを呼び出すボタン -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">クリックするとモーダルウィンドウが開きます。</button>-->

<!-- モーダルウィンドウの中身 -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">picture</h4>
            </div>
            <div class="modal-body col-xs-12">
                <div class="row">
                    <!--                <div class="col-xs-12">-->
                    <p class="col-xs-offset-11 col-xs-1">★</p>
                    <p class="col-xs-offset-11 col-xs-1">🏴</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br>

<?= $this->Paginator->first('<<first'); ?>
<?= $this->Paginator->prev('<prev'); ?>
<?= $this->Paginator->numbers(); ?>
<?= $this->Paginator->next('next>'); ?>
<?= $this->Paginator->last('last>>'); ?>

</body>
</html>
