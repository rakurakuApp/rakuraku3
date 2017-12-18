$(function()
{
    var index = $('#drop > li > a').index(this);　//クリック

    $("#send").click(function() //dataadd.ctpの送信ボタンをクリック
    {
            $.ajax(
                {

                    url: "http://localhost:8080/rakuraku3/common/inquirysend",
                    type: "post",
                    data: "aaa",

                    success: function(hoge) //通信成功、AddCControllerからの返り値を受け取る
                    {

                        {
                            alert('正常終了しました');
                             }
        {
                            alert('失敗しました');
                        }
                    },
                    error: function(XMLHttpRequest,textStatus,errorThrown) //通信失敗
                    {
                        alert('処理できませんでした');
                    }
                });
            return false; //ページが更新されるのを防ぐ
        })
    });


