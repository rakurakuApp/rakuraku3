<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->css('/private/css/manager/PhotoUp.css') ?>
    <?= $this->Html->script('/private/js/manager/photoup.js') ?>
    <?= $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') ?>

    <div>
        <?= $this->element('common\header') ?>
    </div>

</head>
<body>
    <div class="row">

        <div class="col-xs-6">
            <div id="dropArea">Drop or Click here!</div>
            <input id="fileInput" type="file" accept="image" multiple>
        </div>
        <div class="col-xs-6">
            <div class="box26 float-l scroll">
                <span class="box-title">PHOTO</span>
                <div class="overflow ">
                    <div id="output"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <button type="button" class="btn btn-info col-xs-1 col-xs-offset-10">Send</button>

</body>
</html>