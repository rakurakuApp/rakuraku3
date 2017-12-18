$(function () {
	"use strict";
	$('.deleteInq').click(function () {
		//取り消し確定ボタンクリックイベント
		$.ajax({
			url: "http://localhost/rakuraku3/user/deleteInq",
			type: "get",
			dataType: "json",
            data: {
                value: 'aaa'
            }
		}).done(function (data) {
			alert("success");
			console.log("success");
            console.log(data);
        }).fail(function (data) {
			alert("fail");
            console.log(data);
        });
	});
});