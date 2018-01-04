$(function () {
	$('#star').click(function () {
		alert("click");
		$.ajax({
			//現在参照しているURLを見る
			url:location.href,
			data:{
				//ここでstarのIDぶん投げる
				"star":1
			},
			type:"post",
			dataType:"html"
		}).done(function () {
			alert("ルナだよ");
			$('#star').html("るなだよ");
		}).fail(function () {
			alert("ルナじゃないよ");
		});
	});
});