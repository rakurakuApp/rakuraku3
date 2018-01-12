$(function () {
    $('.star').click(function () {

        var id = $(this).attr('id');
        var favorite = '';

        $(this).toggleClass("active");

        //ボタンの状態取得
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
            dataType: "html"
        }).done(function (result) {
            alert(result);
        }).fail(function () {
            alert("処理に失敗しました。\n一度画面を更新してみてください。\n");
        });
    });
});