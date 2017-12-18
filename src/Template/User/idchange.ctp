<?= $this->Html->css('/private/css/user/account.css') ?>

<body>
<div class="back">
    <?php echo $this->Form->create("null",["type"=>"post","url"=>["controller" => "user","action"=>"idchange_logic"]]); ?>
    <div class="old" id="old-data">
        <label for="exampleInputPassword0">現在のID</label>
        <input type="text"  class="form-control" id="exampleInputPassword0" name="oldData" readonly value = <?= $id ?>>
    </div>

    <div class="new" id="new-data">
        <label for="exampleInputPassword1">新ID</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="newData" placeholder="ID">
    </div>

    <div class="Cancelbtn">
        <p>
            <button formaction="javascript:history.back()" class="btn btn-default CancelBox">キャンセル</button>
            </a>
        </p>
    </div>

    <div class="Savebtn">
        <p>
            <button type="submit" class="btn btn-default SaveBox">保存</button>
        </p>
    </div>
    </form>
</div>
</body>
</html>