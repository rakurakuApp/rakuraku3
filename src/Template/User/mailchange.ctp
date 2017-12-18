<?= $this->Html->css('/private/css/user/account.css') ?>

<body>
<div class="back">
    <?php echo $this->Form->create("null",["type"=>"post","url"=>["controller" => "","action"=>""]]); ?>
    <div class="old" id="old-data">
        <label for="exampleInputPassword0">現在のメールアドレス</label>
        <input type="text"  class="form-control " id="exampleInputPassword0" readonly value = <?= $email ?>>
    </div>

    <div class="new" id="new-data">
        <label for="exampleInputPassword1">新メールアドレス</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="メールアドレス">
    </div>


    <div class="Cancelbtn">
        <p>
            <button formaction="javascript:history.back()" class="btn btn-default CancelBox">キャンセル</button>
        </p>
    </div>

    <div class="Savebtn">
        <p>
            <button type="submit" class="btn btn-default SaveBox" name="Save">保存</button>
        </p>
    </div>
    </form>
</div>
</body>
</html>