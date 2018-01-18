$(function () {
	$("input[name = 'selectFormType']").on('click',function () {
		// ユーザ選択ラジオボタンクリック時に表示を切り替える
		if($(this).val() === 'user'){
			$('.userContent').removeClass('display');
			$('.managerContent').addClass('display');
		}else{
            $('.managerContent').removeClass('display');
            $('.userContent').addClass('display');
		}
	});

	//バリデーションテック

});