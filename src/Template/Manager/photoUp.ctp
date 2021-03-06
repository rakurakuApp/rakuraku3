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

<?= $this->Flash->render() ?>

<body>
<form action="./upload_logic" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-6">

            <select class="form-control" name="eventId">
                <?php
                foreach ($event as $data) {
                    ?>
                    <option value=<?= $data['id'] ?>><?= $data['event'] ?></option>
                <?php
                }
                ?>
            </select>
            <br>

            <div id="dropArea">Drop or Click here!</div>
            <input name="upfile[]" id="fileInput" type="file" accept="image/*" multiple="multiple">
<!--            <input name="upfile[]" type="file" accept="image/*" multiple="multiple">-->
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
    <input type="submit" value="Send" class="btn btn-info col-xs-1 col-xs-offset-10">
</form>

</body>
</html>