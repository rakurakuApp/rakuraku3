$(function () {
    $("input[name = 'selectFormType']").on('click', function () {
        // ユーザ選択ラジオボタンクリック時に表示を切り替える
        $('.formContents').addClass('display');
        if ($(this).attr('id') === 'selectUserRadio') {
            //保護者ラジオボタンを選択した場合
            $('#userContent').removeClass('display');
        } else if ($(this).attr('id') === 'selectChildRadio') {
            //児童ラジオボタンを選択した場合
            $('#childContent').removeClass('display');
        } else {
            //管理者ラジオボタンを選択した場合
            $('#managerContent').removeClass('display');
        }
    });

    $('.selectPatronBtn').on('click', function () {
        //児童に対する親選択ボタンのクリック時処理
        $('#patron_label').remove();
        $('#patron_data').remove();
        $('#select_Patron_number').remove();
        $('#patron_info').append(
            '<label for = "patron_data" id="patron_label">保護者名</label>' +
            '<input type="text" id="patron_data" readonly value=' + $(this).val() + '>' +
            '<input type="hidden" id="select_Patron_number" value=' + $(this).attr('id') + '>'
        );
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
            $('#email_error').remove();
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
        if (!$(this).val().match(/^[a-zA-Z0-9]+$/) || $(this).val().length < 6) {
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
        //ラジオボタンのチェック項目を取得して入力対象の項目のみバリデーションチェックを行う
        if ($("input[name = 'selectFormType']:eq(0)").prop('checked')) {
            //保護者アカウントの場合
            var userErrorMessage = '';
            //バリデーションチェック項目
            var userValidationCheckFlag = 0;

            if ($('#user_username').val() === '') {
                userValidationCheckFlag = 1;
                userErrorMessage = 'ユーザ名が空白です。\n';
            }
            if (!$('#user_email').val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
                userValidationCheckFlag = 1;
                userErrorMessage += 'メールアドレスが不正です。\n';
            }
            if ($('#child_name').val() === '') {
                userValidationCheckFlag = 1;
                userErrorMessage += '児童名が空白です。\n';
            }
            if (!$('#child_age').val().match(/^[0-9]+$/)) {
                userValidationCheckFlag = 1;
                userErrorMessage += '児童年齢は半角数字のみ入力してください。\n';
            }
            if ($('#child_class').val() === '') {
                userValidationCheckFlag = 1;
                userErrorMessage += '児童クラスが選択されていません。\n';
            }
            if (userValidationCheckFlag === 1) {
                alert(userErrorMessage);
                return false;
            }
        } else if ($("input[name = 'selectFormType']:eq(1)").prop('checked')) {
            //児童アカウントの場合
            var childErrorMessage = '';
            //バリデーションチェック項目
            var childValidationCheckFlag = 0;

            if (!$('#select_Patron_number').length) {
                childValidationCheckFlag = 1;
                childErrorMessage = '保護者が選択されていません。\n';
            }
            if ($('#individual_child_name').val() === '') {
                childValidationCheckFlag = 1;
                childErrorMessage += '児童名が空白です。\n';
            }
            if (!$('#individual_child_age').val().match(/^[0-9]+$/)) {
                childValidationCheckFlag = 1;
                childErrorMessage += '児童年齢は半角数字のみ入力してください。\n';
            }
            if ($('#individual_child_class').val() === '') {
                childValidationCheckFlag = 1;
                childErrorMessage += '所属組を選択してください。\n';
            }
            if (childValidationCheckFlag === 1) {
                alert(childErrorMessage);
                return false;
            }
        } else {
            //管理者アカウントの場合
            var managerErrorMessage = '';
            //バリデーションチェック項目
            var managerValidationCheckFlag = 0;

            if ($('#manager_username').val() === '') {
                managerValidationCheckFlag = 1;
                managerErrorMessage = '管理者名が空白です。\n';
            }
            if (!$('#manager_password').val().match(/^[a-zA-Z0-9]+$/) || $('#manager_password').val().length < 6) {
                managerValidationCheckFlag = 1;
                managerErrorMessage += 'パスワードは英数字6文字以上です。\n';
            }
            if ($('#manager_ReEnter').val() !== $('#manager_password').val()) {
                managerValidationCheckFlag = 1;
                managerErrorMessage += '再入力値が正しくありません。\n';
            }
            if (managerValidationCheckFlag === 1){
                alert(managerErrorMessage);
                return false;
            }
        }
    });
    //バリデーションチェック(submit時)終わり
});
