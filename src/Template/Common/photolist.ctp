<header>
    <?php
    echo $this->Html->css('../private/css/common/photolist.css');
    echo $this->Html->script('../private/js/common/PhotoList/ColorChange.js');
    echo $this->Html->script('../private/js/common/PhotoList/inquiry.js');
    echo $this->Html->script('../private/js/common/PhotoList/InquiryForm.js');
    ?>
    <div>
        <?= $this->element('common\header') ?>
    </div>
    <div>
        <?= $this->element('common\sidemenu') ?>
    </div>
</header>

<body>
<!--画像-->
<div id="contents">
    <p><a href="#open02">
    <div class="Photo-Box a">
            <?php
            foreach ($array as $image) {
                echo $this->Html->image($image['path'],['class'=>'photo photo-margin']);
            }
            ?>
    </div>
        </a></p>
<!--モーダル-->
        <div id="modal">
            <div id="open02">
                <a href="#" class="close_overlay">×</a>
                <div class="example">
                    <div class="modal_window">
                        <h2 id="list">picture</h2>
                        <p id="star" class=" size" onclick="star()" >★</p>

                        <!--問い合わせ一覧-->
                        <ul id="left-to-right" class="dropmenu">
                            <li>
                                <p id="flag" class="size">🏴</p>
                                <ul id="drop">
                                    <div class="balloon1-left">
                                        <li><a id="drop0">画像が不適切</a></li>
                                        <li><a id="drop1">写りが悪い</a></li>
                                        <li><a id="drop2">画像が不適切</a></li>
                                        <li><a id="drop3">//////</a></li>
<!--                                        <a class="square_btn">送信</a>-->
                                        <button type="submit"  id="send" class="margin btn btn-default">送信</button>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                        <!--モーダルのがぞう-->
                        <?php
                        echo $this->Html->image($image,['class'=>'photo-size photo-auto']);
                        ?>
                        <br/>
                        <a href="#" class="text-hight">【×】CLOSE</a>
                    </div><!--/.modal_window-->
                </div>
            </div><!--/#open02-->
        </div><!--/#modal-->
</div><!--/#contents-->


<?= $this->Paginator->first('<<first'); ?>
<?= $this->Paginator->prev('<prev'); ?>
<?= $this->Paginator->numbers(); ?>
<?= $this->Paginator->next('next>'); ?>
<?= $this->Paginator->last('last>>'); ?>

</body>