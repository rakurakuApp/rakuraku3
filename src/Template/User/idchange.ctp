<?= $this->Html->css('/private/css/user/idchange.css') ?>

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
    <div class="change0" id="current">
        <label for="exampleInputPassword0">現在のID</label>
        <input type="text"  class="form-control " id="exampleInputPassword0">
    </div>

    <div class="change1" id="new">
        <label for="exampleInputPassword1">新ID</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ID">
    </div>


    <div class="Cancelbtn">
        <p>
            <button type="button" class="btn btn-default CancelBox">キャンセル</button>
            </a>
        </p>
    </div>

    <div class="Savebtn">
        <p>
            <button type="submit" class="btn btn-default SaveBox">保存</button>
        </p>
    </div>
</div>
</body>
</html>