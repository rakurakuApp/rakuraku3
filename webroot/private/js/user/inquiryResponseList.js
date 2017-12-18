$(function () {
	"use strict";
	$('.deleteInq').click(function () {
		//問い合わせ取り消しボタンクリックイベント
		//id取得
		// var id = $(this).attr("id");
		$.ajax({
			url: "http://localhost/rakuraku3/user/inquiryresponselist",
			type: "get",
			dataType: "html"
		}).done(function () {
			alert("success");
		}).fail(function () {
			alert("fail");
		});
	});
});