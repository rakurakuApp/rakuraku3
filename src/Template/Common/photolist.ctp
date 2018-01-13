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

<div class="col-md-12">
    <div class="row box">
<!--        検索フォーム　form-horizontal　　form-inline-->
        <form class="form-inline">
            <div class="form-group">
<!--                子供の名前-->
                <div class="">
                    <div class="float-l margin-10">
                        <label for="exampleInputName2">Name</label>
                    </div>
                    <div class="float-l margin-10">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                子供の名前
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">メニュー1</a></li>
                                <li><a href="#">メニュー2</a></li>
                                <li><a href="#">メニュー3</a></li>
                                <li><a href="#">メニュー4</a></li>
                            </ul>
                        </div>
                    </div>
    <!--            子供のクラス-->
                    <div class="float-l margin-10">
                        <label for="exampleInputName2">class</label>
                    </div>
                    <div class="float-l margin-10">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                クラス名
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">メニュー1</a></li>
                                <li><a href="#">メニュー2</a></li>
                                <li><a href="#">メニュー3</a></li>
                                <li><a href="#">メニュー4</a></li>
                            </ul>
                        </div>
                    </div>
    <!--            学校行事-->
                    <div class="float-l margin-10">
                        <label for="exampleInputName2">event</label>
                    </div>
                    <div class="float-l margin-10">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                行事
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">メニュー1</a></li>
                                <li><a href="#">メニュー2</a></li>
                                <li><a href="#">メニュー3</a></li>
                                <li><a href="#">メニュー4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
<!--            お気に入り-->
                <div class="checkbox">
                    <label>
                        <input type="checkbox">お気に入り
                    </label>
                </div>
    <!--            集合写真-->
                <div class="checkbox">
                    <label>
                        <input type="checkbox">集合写真
                    </label>
                </div>
            </div>
        </form>
    </div>
</div>

<!--画像-->
<div id="contents">
    <div class="Photo-Box">
        <div class="col-md-12">
            <div class="row a">
                <div class="" oncontextmenu="return false;">
                    <?php
                    //画像の表示
                    for($i = 0;$i < 8;$i++){
                        if(!empty($array[$i])) {
                            echo $this->Html->image($array[$i]['path'], ['data-target'=>'#myModal' , 'data-toggle'=>'modal' , 'name'=>'listImage' ,'class' => 'drag-off contain photo photo-margin col-md-3' ,'id' => $array[$i]['id']]);
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
                                            <img src="" id="dummy" class="drag-off">
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

<div class="col-xs-12">
    <div class="col-xs-offset-6 size">

        <?= $this->Paginator->numbers(); ?>

    </div>
</div>
<script>
    $("img[name='listImage']").on('click',function (e) {
        var modalImage = document.getElementById("dummy");
        modalImage.src = e.target.src;
        var favorite = document.getElementsByName("dummy2").item([0]);
        favorite.id = e.target.id;
    })
</script>
