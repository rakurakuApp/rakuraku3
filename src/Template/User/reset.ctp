<?= $this->Html->css('/private/css/user/reset.css') ?>

<!DOCTYPE html>
<html lang="jp">
</html>
<body>
<form method="post">
<div class="back">
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
    </div>
</div>
</form>>
</body>
</html>