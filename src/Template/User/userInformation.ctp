<head>
    <?= $this->Html->css('/private/css/user/userinformation.css') ?>

</head>

<div>
    <?= $this->element('common\header') ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-offset-3 col-xs-6" id="data">
            <div class="row box">
                <div class="col-xs-12">
                    <p class="f-size title_p">「ユーザ情報」</p>
                </div>

                <div class="col-xs-12">
                    <div class="row">
                        <!--ユーザ名-->
                        <div class="clear col-xs-12">
                            <div class="row">
                                <div class="col-xs-5">
                                    <p class="data-width">保護者名:</p>
                                </div>
                                <div class="col-xs-offset-1 col-xs-6">
                                    <p class="wide margin-l"><?= h($data['person_name']) ?></p>
                                </div>
                            </div>
                        </div>

                        <!--子供-->
                        <div class="clear border col-xs-12" id="child">
                            <div class="row">
                                <div class="col-xs-5">
                                    <p class="data-width">お子様:</p>
                                </div>
                                <div class="col-xs-offset-1 col-xs-6">
                                    <?php
                                    foreach ($data['child_name'] as $name){
                                        ?>
                                        <p class="wide margin-l"><?= h($name) ?></p>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!--メールアドレス-->
                        <div id="mail" class="clear user_box col-xs-12">
                            <div class="row">
                                <div class="col-xs-5">
                                    <p class="text_w">メールアドレス:</p>
                                </div>
                                <div class="col-xs-7">
                                    <p class="wide"><?= h($data['mail']) ?></p>
                                </div>
                                <div class="col-xs-offset-9 col-xs-2">
                                    <form action="./mailchange" method="post">
                                        <input type="hidden" name="email" value=<?= $data['mail'] ?>>
                                        <button type="submit" class="btn btn-default">変更</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--ID-->
                        <div id="useid" class="clear user_box col-xs-12">
                            <div class="row">
                                <div class="col-xs-5">
                                    <p class="text_w">ID:</p>
                                </div>
                                <div class="col-xs-7">
                                    <p class="wide"><?= h($data['ID']) ?></p>
                                </div>
                                <div class="col-xs-offset-9 col-xs-2">
                                    <form action="./idchange" method="post">
                                        <input type="hidden" name="id" value=<?= $data['ID'] ?>>
                                        <button type="submit" class="btn btn-default">変更</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--パスワード-->
                        <div id="password" class="clear user_box col-xs-12">
                            <div class="row">
                                <div class="col-xs-5">
                                    <p class="text_w">パスワード:</p>
                                </div>
                                <div class="col-xs-7">
                                    <p class="wide">非表示設定です</p>
                                </div>
                                <div class="col-xs-offset-9 col-xs-2">
                                    <button onclick="location.href='./passchange'" class="btn btn-default">変更</button>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>
