<?php
/**
 * @var \App\View\AppView $this
 * @var $childName //select用児童情報
 * @var $events //行事情報一覧
 * @var $photoData //写真情報一覧
 */
?>

<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/common/photolist.css') ?>
<?php $this->end(); ?>
<?php $this->start('script'); ?>
<?= $this->Html->script('/private/js/common/PhotoList/inquiry.js') ?>
<?= $this->Html->script('/private/js/common/PhotoList/InquiryForm.js') ?>
<?= $this->Html->script('/private/js/common/PhotoList/favorite.js') ?>
<?php $this->end(); ?>
<?php $this->start('title'); ?>
<?= '画像一覧'; ?>
<?php $this->end(); ?>

<div>
    <?= $this->element('common\header') ?>
</div>

<!--ajax読み込み中ロードアニメーション表示-->
<div class="loading is-hide">
    <div class="loading_icon"></div>
</div>

<div class="container">
    <div class="row box">
        <!--検索フォーム form-horizontal form-inline-->
        <form class="form-inline" method="post">
            <!-- 子供の名前 -->
            <div class="form-group">
                <label for="child_data">児童選択</label>
                <select id="child_data" class="form-control" name="child_data">
                    <option value="">未選択</option>
                    <?php foreach ($childName as $childData):; ?>
                        <option value="<?= $childData->id; ?>"
                            <?php if ($childData->id == $this->request->getData('child_data')) echo 'selected'; ?>><?= $childData->username; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- 学校行事 -->
            <button type="button" id="eventSelectBtn" class="btn btn-info btn-lg" data-toggle="modal"
                    data-target="#eventSelectModal">
                行事選択
            </button>
            <!-- 行事選択モーダル -->
            <div class="modal fade" id="eventSelectModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content row">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            <h4 class="modal-title">行事選択</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!-- イベント一覧取得 -->
                                <?php foreach ($events as $eventData):; ?>
                                    <div class="col-xs-6 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="checkbox_input"
                                                   value="<?= $eventData->id; ?>" name="eventChk[]">
                                            <span class="checkbox_parts_inside"></span>
                                            <span class="checkbox_parts_outside"><?= $eventData->event; ?></span>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">決定</button>
                            <button type="button" class="btn btn-danger btn-lg">選択取り消し</button>
                        </div>
                    </div>
                </div>
            </div><!-- 行事選択モーダル -->

            <!--お気に入り-->
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="checked"
                           name="favoriteChk"<?php if (!empty($this->request->getData('favoriteChk'))) echo 'checked' ?>>お気に入り写真表示
                </label>
            </div>
            <!--集合写真-->
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="checked"
                           name="gatheredChk"<?php if (!empty($this->request->getData('gatheredChk'))) echo 'checked' ?>>集合写真
                </label>
            </div>
            <button type="submit" class="btn btn-primary">検索</button>
        </form>
    </div>
</div>

<div id="contents">
    <div class="Photo-Box">
        <div class="col-md-12">
            <div class="row a">
                <div class="" oncontextmenu="return false;">
                    <?php
                    //画像の表示
                    foreach ($photoData as $data) {
                        if (!empty($data->path)) {
                            echo $this->Html->image($data->path, ['data-target' => '#myModal', 'data-toggle' => 'modal', 'name' => 'listImage', 'class' => 'drag-off contain photo photo-margin col-md-3', 'id' => $data->id]);
                        }
                    }
                    ?>
                    <!-- モーダルウィンドウの中身 -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">picture</h4>
                                </div>
                                <div class="modal-body col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-offset-1 col-xs-10">
                                            <img src="" id="dummy" class="drag-off">
                                        </div>
                                        <div class="col-xs-1">
                                            <div class="row">
                                                <p class="star col-xs-12" name="dummy2" id="test">★</p>

                                                <p class="col-xs-12" id="flag">🏴</p>
                                                <ul id="left-to-right" class="dropmenu">
                                                    <li>
                                                        <ul class="col-xs-12" id="drop">
                                                            <div class="balloon1-left">
                                                                <li><a id="drop0"><?= $detail[0]['detail'] ?></a></li>
                                                                <li><a id="drop1"><?= $detail[1]['detail'] ?></a></li>
                                                                <li><a id="drop2"><?= $detail[2]['detail'] ?></a></li>
                                                                <li><a id="drop3"><?= $detail[3]['detail'] ?></a></li>
                                                                <button type="submit" class="margin btn btn-default"
                                                                        id="sned">送信
                                                                </button>
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
    </div><!--/#contents-->
</div>
<div class="container">
    <div class="col-xs-12" style="text-align: center">
        <ul class="pagination">
            <?= $this->Paginator->numbers(); ?>
        </ul>
    </div>
</div>
<br><br><br><br>

<script>
    $("img[name='listImage']").on('click', function (e) {
        //画像に対してのID割振
        var modalImage = document.getElementById("dummy");
        modalImage.src = e.target.src;
        //問い合わせ内容
        var favorite = document.getElementsByName("dummy2").item([0]);
        favorite.id = e.target.id;
    })
</script>

