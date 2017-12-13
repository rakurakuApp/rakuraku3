<?= $this->Html->css('/private/css/user/mailchange.css') ?>

<!DOCTYPE html>
<html lang="en">
</html>
<head>
    <div>
        <?= $this->element('common\sidemenu') ?>
    </div>
</head>
<body>
<div class="back">
    <div class="mail0" id="mail">
        <label for="exampleInputPassword0">現在のメールアドレス</label>
        <input type="text"  class="form-control " id="exampleInputPassword0">
    </div>

    <div class="mail1" id="new-mail">
        <label for="exampleInputPassword1">新メールアドレス</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="メールアドレス">
    </div>


    <div class="Cancelbtn">
        <p>
            <a href="">
            <button type="button" class="btn btn-default CancelBox">キャンセル</button>
        </p>
    </div>

    <div class="Savebtn">
        <p>
            <button type="button" class="btn btn-default SaveBox">保存</button>
        </p>
    </div>
</div>
</body>
</html>