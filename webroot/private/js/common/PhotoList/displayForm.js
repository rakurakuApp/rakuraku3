$(function () {
	// フォームは初期状態は非表示
	// フォームのアイコンクリック時にコンテンツ表示非表示を切り替える処理
	$('.title_search_form').find('span').on('click', function () {
		// alert('aa');
		
		if ($(this).attr('class') === 'glyphicon glyphicon-plus-sign') {
			//アイコンがプラスの場合（非表示中の場合）
			$('#search_contents').removeClass('display');
			$(this).removeClass('glyphicon-plus-sign');
			$(this).addClass('glyphicon-minus-sign');
		} else {
			//アイコンがマイナスの場合
			$('#search_contents').addClass('display');
			$(this).removeClass('glyphicon-minus-sign');
			$(this).addClass('glyphicon-plus-sign');
		}
	});
});