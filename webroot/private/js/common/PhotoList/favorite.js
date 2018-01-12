// モーダル開くタイミングでその写真がお気に入りかどうかを取得
$(function () {
	$(document).on('click','.photo' , function () {
		var $loading = $(".loading");
		var id = $(this).attr('id');
		
		$(".star").removeClass("active");
		$.ajax({
			url: location.href,
			data: {
				"photoID": id
			},
			type: "post",
			dataType: "html",
			beforeSend:function(){
				$loading.removeClass("is-hide");
			}
		}).done(function (result) {
			$loading.addClass("is-hide");
		    if (result == "true"){
			    $(".star").addClass("active");
            }
		}).fail(function (result) {
			$loading.addClass("is-hide");
		});
	});
});

$(function () {
    $('.star').click(function () {
     
	    var $loading = $(".loading");
        var id = $(this).attr('id');
        var favorite = '';

        $(this).toggleClass("active");

        // ボタンの状態取得
        if ($(this).hasClass('active')) {
            favorite = 'insert';
        } else {
            favorite = 'delete';
        }

        $.ajax({
            url: location.href,
            data: {
                //ここでstarのIDぶん投げる
                "star": id,
                "order": favorite
            },
            type: "post",
            dataType: "html",
	        beforeSend:function(){
		        $loading.removeClass("is-hide");
	        }
        }).done(function (result) {
            //controllerからの返り値結果を出力
	        $loading.addClass("is-hide");
            alert(result);
        }).fail(function (result) {
            console.log(result);
	        $loading.addClass("is-hide");
            alert("処理に失敗しました。\n一度画面を更新してみてください。\n");
        });
    });
});

