$(function () {
	"use strict";
	
	//お気に入り
	$('.star').click(function () {
		//クリック時に星の色を取得 色を反転する
		$(this).toggleClass("active");
		$.ajax({
			url: "http://localhost/rakuraku3/common/favorite",
			type: "get",
			dataType: "json"
		}).done(function (data) {
			console.log('success');
			console.log(data);
		}).fail(function (a, textStatus, error) {
			console.log(a.status);
			console.log(textStatus);
			console.log(error);
			alert("fail");
			console.log(data);
		});
	});
});

