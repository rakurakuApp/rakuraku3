$(function () {
    $("input[name = 'selectFormType']").on('click', function () {
        // ユーザ選択ラジオボタンクリック時に表示を切り替える
        $('.formContents').addClass('display');
        if ($(this).attr('id') === 'selectUserRadio') {
            //保護者ラジオボタンを選択した場合
            $('#userContent').removeClass('display');
        } else if ($(this).attr('id') === 'selectChildRadio') {
            $('#childContent').removeClass('display');
        } else {
            $('#managerContent').removeClass('display');
        }
    });
    //バリデーションチェック(フォーカスを当てる時)
    $('#user_username').blur(function () {
        //ユーザー名バリデーションチェック
        if ($(this).val() === '') {
            //入力フォームに既に警告が出ていないか
            if (!($(this).parent().text().match('※ユーザ名が空白です。'))) {
                $('#user_username').parent().append('<p class="errorMsg" id="username_error">※ユーザ名が空白です。</p>');
            }
        } else {
            $('#username_error').remove();
        }
    });
    $('#user_email').blur(function () {
        //メールアドレスバリデーションチェック
        if (!$(this).val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
            //入力フォームに既に警告が出ていないか
            if (!($(this).parent().text().match('※不正な値です。'))) {
                $('#user_email').parent().append('<p class="errorMsg" id="email_error">※不正な値です。</p>');
            }
        } else {
            $('#user_email').remove();
        }
    });
    $('#child_name').blur(function () {
        //児童名バリデーションチェック
        if ($(this).val() === '') {
            //入力フォームに既に警告が出ていないか
            if (!($(this).parent().text().match('※児童名が空白です。'))) {
                $('#child_name').parent().append('<p class="errorMsg" id="childName_error">※児童名が空白です。</p>');
            }
        } else {
            $('#childName_error').remove();
        }
    });
    $('#child_age').blur(function () {
        //児童年齢バリデーションチェック
        if (!$(this).val().match(/^[0-9]+$/)) {
            //入力フォームに既に警告が出ていないか
            if (!($(this).parent().text().match('※数字を入力してください。'))) {
                $('#child_age').parent().append('<p class="errorMsg" id="childAge_error">※数字を入力してください。</p>');
            }
        } else {
            $('#childAge_error').remove();
        }
    });
    $('#child_class').blur(function () {
        //児童所属クラスを選択しているかどうか
        if ($(this).val() === '') {
            if (!($(this).parent().text().match('※所属組を選択してください。'))) {
                $('#child_class').parent().append('<p class="errorMsg" id="childClass_error">※所属組を選択してください。</p>');
            }
        } else {
            $('#childClass_error').remove();
        }
    });
    $('#individual_child_name').blur(function () {
        //児童名バリデーションチェック(個別登録)
        if ($(this).val() === '') {
            //入力フォームに既に警告が出ていないか
            if (!($(this).parent().text().match('※児童名が空白です。'))) {
                $('#individual_child_name').parent().append('<p class="errorMsg" id="individual_childName_error">※児童名が空白です。</p>');
            }
        } else {
            $('#individual_childName_error').remove();
        }
    });
    $('#individual_child_age').blur(function () {
        //児童年齢バリデーションチェック(個別登録)
        if (!$(this).val().match(/^[0-9]+$/)) {
            //入力フォームに既に警告が出ていないか
            if (!($(this).parent().text().match('※数字を入力してください。'))) {
                $('#individual_child_age').parent().append('<p class="errorMsg" id="individual_childAge_error">※数字を入力してください。</p>');
            }
        } else {
            $('#individual_childAge_error').remove();
        }
    });
    $('#individual_child_class').blur(function () {
        //児童所属クラスを選択しているかどうか(個別登録)
        if ($(this).val() === '') {
            if (!($(this).parent().text().match('※所属組を選択してください。'))) {
                $('#individual_child_class').parent().append('<p class="errorMsg" id="individual_childClass_error">※所属組を選択してください。</p>');
            }
        } else {
            $('#individual_childClass_error').remove();
        }
    });
    $('#manager_username').blur(function () {
        //管理者名バリデーションチェック
        if ($(this).val() === '') {
            if (!($(this).parent().text().match('※管理者名が空白です。'))) {
                $('#manager_username').parent().append('<p class="errorMsg" id="manager_username_error">※管理者名が空白です。</p>');
            }
        } else {
            $('#manager_username_error').remove();
        }
    });
    $('#manager_password').blur(function () {
        if (!$(this).val().match(/^[0-9a-zA-Z]+$/) || $(this).val().length < 6) {
            if (!($(this).parent().text().match('※パスワードは英数字6文字以上です。'))) {
                $('#manager_password').parent().append('<p class="errorMsg" id="manager_password_error">※パスワードは英数字6文字以上です。</p>');
            }
        } else {
            $('#manager_password_error').remove();
        }

    });
    $('#manager_ReEnter').blur(function () {
        if ($(this).val() !== $('#manager_password').val()) {
            if (!$(this).parent().text().match('※再入力値が正しくありません。')) {
                $('#manager_ReEnter').parent().append('<p class="errorMsg" id="manager_ReEnter_error">※再入力値が正しくありません。</p>');
            }
        } else {
            $('#manager_ReEnter_error').remove();
        }
    });
    //バリデーションチェック(フォーカスを当てる時)終わり
    //バリデーションチェック(submit時)
    $('#confirm').submit(function () {
        if($("input[name = 'selectFormType']:eq(0)").prop('checked')){
            alert('aa');
        }else if ($("input[name = 'selectFormType']:eq(1)").prop('checked')){
            alert('ab');
        }else{
            alert('ac');
        }
        return false;
    });
});