<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/common/photolist.css') ?>
<?php $this->end(); ?>
<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/common/PhotoList/ColorChange.js') ?>
<?= $this->Html->script('/private/js/common/PhotoList/inquiry.js') ?>
<?= $this->Html->script('/private/js/common/PhotoList/InquiryForm.js') ?>
<?= $this->Html->script('/private/js/common/PhotoList/favorite.js') ?>
<?php $this->end(); ?>

<div>
    <?= $this->element('common\header') ?>
</div>
<!--画像-->

<div id="contents">
    <div class="Photo-Box">
        <div class="col-md-12">
            <div class="row a">
                <div class="row">
                    <?php
                    //画像の表示
                    for($i = 0;$i < 8;$i++){
                        if(!empty($array[$i])) {
                            echo $this->Html->image($array[$i]['path'], ['data-target'=>'#myModal' , 'data-toggle'=>'modal' , 'name'=>'listImage' ,'class' => 'contain photo photo-margin col-md-3 ' ,'id' => $array[$i]['id']]);
                        }
                    }
                    ?>




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
                                        <div class="col-xs-offset-1 col-xs-10">
                                            <img src="" id="dummy">
                                        </div>
                                        <div class="col-xs-1">
                                            <div class="row">
                                                <p class="star col-xs-12" name ="dummy2" id="test">★</p>
                                                <p class="col-xs-12" id ="flag" >🏴</p>
                                                <ul id="left-to-right" class="dropmenu">
                                                    <li>
                                                        <ul class="col-xs-12" id="drop">
                                                            <div class="balloon1-left">

                                                                <li><a id="drop0"><?=  $detail[0]['detail'] ?></a></li>
                                                                <li><a id="drop1"><?=  $detail[1]['detail'] ?></a></li>
                                                                <li><a id="drop2"><?=  $detail[2]['detail'] ?></a></li>
                                                                <li><a id="drop3"><?=  $detail[3]['detail'] ?></a></li>
                                                                <button type="submit" class="margin btn btn-default" id="sned">送信</button>
                                                            </div>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contents-->


<br><br><br><br><br><br><br><br><br><br><br>

<?= $this->Paginator->first('<<first'); ?>
<?= $this->Paginator->prev('<prev'); ?>
<?= $this->Paginator->numbers(); ?>
<?= $this->Paginator->next('next>'); ?>
<?= $this->Paginator->last('last>>'); ?>

<script>
    $("img[name='listImage']").on('click',function (e) {
        var modalImage = document.getElementById("dummy");
        modalImage.src = e.target.src;
        var favorite = document.getElementsByName("dummy2").item([0]);
        favorite.id = e.target.id;
    })
</script>
