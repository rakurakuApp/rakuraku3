<head>
    <?= $this->Html->css('/private/css/user/userinformation.css') ?>
</head>

<body>
<div class="box" id="data">
    <p class="f-size title_p">「ユーザ情報」</p>

    <!--ユーザ名-->
    <div id="user" class="clear">
        <p  class="user-width float_l">保護者名:</p>
        <p class="wide margin-l"><?= $data['person_name'] ?></p>
    </div>

    <!--子供-->
    <div id="child" class="clear border">
        <p class="child-width float_l">お子様:</p>

        <?php
        foreach ($data['child_name'] as $name){
            ?>
            <p class="wide margin-l"><?= $name ?></p>
            <?php
        }
        ?>
    </div>

    <div class="box_p">

        <!--メールアドレス-->
        <div id="mail" class="clear user_box">
            <p class="text_w float_l">メールアドレス:</p>
            <p class="wide"><?= $data['mail'] ?></p>
            <form action="cgi-bin/abc.cgi" method="post">
                <input type="hidden" name="email" value=<?= $data['mail'] ?>>
                <button type="submit" class="btn btn-default float_r margin-t">変更</button>
            </form>
        </div>


        <!--ID-->
        <div id="useid" class="clear user_box">
            <p class="text_w float_l">ID:</p>
            <p class="wide"><?= $data['ID'] ?></p>
            <form action="cgi-bin/abc.cgi" method="post">
                <input type="hidden" name="id" value=<?= $data['ID'] ?>>
                <button type="submit" class="btn btn-default float_r margin-t">変更</button>
            </form>
        </div>

        <!--パスワード-->
        <div id="password" class="clear user_box">
            <p class="text_w float_l">パスワード:</p>
            <p class="wide">非表示設定です</p>
            <button onclick="location.href='test" class="btn btn-default float_r margin-t">変更</button>
        </div>
    </div>
</div>
</body>

<script>
    window.onload = function () {
        var data = document.getElementById('data');
        var div_height = data.clientHeight + 50;
        $("#data").css('height',div_height);
    }
</script>