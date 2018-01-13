<?= $this->Html->css('/private/css/user/passchange.css') ?>

<body>
<div class="back">
    <form method="post" onsubmit="return false;">
    <div class="pass0" id="pw">
        <label for="exampleInputPassword0">現在のパスワード</label>
        <input type="text"  class="form-control " id="exampleInputPassword0" name="oldPassword">
    </div>

    <div class="pass1" id="new-pw">
        <label for="exampleInputPassword1">新パスワード</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="パスワード" name="newPassword">
    </div>

    <div class="pass2" id="re-pw">
        <label for="exampleInputPassword2">新パスワード(再入力)</label>
        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="パスワード" name="confirmationPassword">
    </div>
        <div id="message2">
        <label id="errormessage"><?php if(!empty($this->viewVars['errorMessage'])){echo $this->viewVars['errorMessage'];}?></label>
        </div>
    <div class="Cancelbtn">
        <p>
            <button formaction="javascript:history.back()" class="btn btn-default CancelBox">キャンセル</button>
        </p>
    </div>
            <div class="Savebtn">
        <p>
            <button type="button" class="btn btn-default SaveBox" name="Save" onclick="submit();">保存</button>
        </p>
    </div>
    </form>
</div>
</body>
</html>