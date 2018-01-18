$(function () {
	$("input[name = 'selectFormType']").on('click',function () {
		// ユーザ選択ラジオボタンクリック時に表示を切り替える
		if($(this).val() === 'user'){
			alert('aa');
		}
	});
});