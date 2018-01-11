$(function () {
	$('.star').click(function () {
		
		var id = $(this).attr('id');
		var favorite = '';
		
		//ボタンの状態取得
		if($(this).hasClass('active')){
			favorite = 'insert';
		}else{
			favorite = 'delete';
		}
		
		$.ajax({
			url:location.href,
			data:{
				//ここでstarのIDぶん投げる
				"star": id,
				"order": favorite
			},
			type:"post",
			dataType:"html"
		}).done(function () {
			alert('ルナだよ');
		}).fail(function () {
			alert("ルナじゃないよ");
		});
	});
});