//検索結果を画面に適応するajax
$(function () {
	"use strict";
	//inquiryResponseList
	$(".deleteInq").click(function () {
		var val = $(this).val();
		test(val);
	});
	
	//各フォームからsubmitした場合の処理
	$("#the_form").submit(function (event) {
		var val = $(this).serialize();
		test(val);
	});
	
	function test($value) {
		$.ajax({
			// 自分自身のURLを取得
			url: location.href,
			type: "post",
			dataType: "html",
			data: {
				"value": $value
			}
		}).done(function (response) {
			$('#content').html(response);
		}).fail(function () {
			alert("fail");
		});
	}
});
