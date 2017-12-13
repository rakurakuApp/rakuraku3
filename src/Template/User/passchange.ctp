<?= $this->Html->css('/private/css/user/passchange.css') ?>

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
    <div class="pass0" id="pw">
        <label for="exampleInputPassword0">現在のパスワード</label>
        <input type="text"  class="form-control " id="exampleInputPassword0">
    </div>

    <div class="pass1" id="new-pw">
        <label for="exampleInputPassword1">新パスワード</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="パスワード">
    </div>

    <div class="pass2" id="re-pw">
        <label for="exampleInputPassword2">新パスワード(再入力)</label>
        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="パスワード">
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
    </div>ｃ
</div>
</body>
</html>