<head>

    <?= $this->Html->css('/private/css/user/userinformation.css') ?>

</head>
<body>
    <div class="box">
        <p class="f-size title_p">「ユーザ情報」</p>

            <!--ユーザ名-->
            <div id="user" class="clear">
                <p  class="user-width float_l">保護者名:</p>
                <p class="wide margin-l">ながせあきお</p>
            </div>

            <!--子供-->
            <div id="child" class="clear border">
                <p class="child-width float_l">お子様:</p>
                <p class="wide margin-l">○組　ながせ光宙</p>
                <!--<p class="wide margin-l">○組　ながせ光宙</p>-->
                <!--<p class="wide margin-l">○組　ながせ光宙</p>-->
            </div>

        <div class="box_p">

            <!--メールアドレス-->
            <div id="mail" class="clear user_box">
                <p class="text_w float_l">メールアドレス:</p>
                <p class="wide">oic.r.kunitomi@gmail.com</p>
                <button type="button" class="btn btn-default float_r margin-t">変更</button>
            </div>


            <!--ID-->
            <div id="useid" class="clear user_box">
                <p class="text_w float_l">ID:</p>
                <p class="wide">toshio_0000</p>
                <button type="button" class="btn btn-default float_r margin-t">変更</button>
            </div>

            <!--パスワード-->
            <div id="password" class="clear user_box">
                <p class="text_w float_l">パスワード:</p>
                <p class="wide">***********</p>
                <button type="button" class="btn btn-default float_r margin-t">変更</button>
            </div>
        </div>
    </div>
</body>