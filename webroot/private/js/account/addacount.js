$(function () {
	$("input[name = 'selectFormType']").on('click',function () {
		// ユーザ選択ラジオボタンクリック時に表示を切り替える
        $('.formContents').addClass('display');
        if($(this).attr('id') === 'selectUserRadio') {
            //保護者ラジオボタンを選択した場合
            $('#userContent').removeClass('display');
        }else if($(this).attr('id') === 'selectChildRadio'){
            $('#childContent').removeClass('display');
        }else{
            $('#managerContent').removeClass('display');
		}
	});

	//バリデーションテック
    //ユーザ側バリデーションチェック
    //管理者側バリデーションチェック
});