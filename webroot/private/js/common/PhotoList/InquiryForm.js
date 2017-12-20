//選択された要素の設定
const color1 = '#BDBDBD';
const left1 = '10px';
// 選択された要素以外の設定
const color2 = '#A4A4A4';
const left2 ='0px';
// -------------------------------------
var flg;
flg = 1;

//問い合わせメニュー
$(function(){
    $("#flag").click(function(){
        if( flg == 1){
            $('#drop').css('width','90%');
            flg = 0;
        }else{
            $('#drop').css('width','0%');
            flg = 1;
        }
    });

    $('#drop > div > li > a').click(function(){
        var index = $('#drop > div > li > a').index(this);
        if(index == 0){
            $('#drop0').css({'background':color1,'margin-left':left1});
            $('#drop1,#drop2,#drop3').css({'background':color2,'margin-left':left2});
        }else if(index == 1){
            $('#drop1').css({'background':color1,'margin-left':left1});
            $('#drop0,#drop2,#drop3').css({'background':color2,'margin-left':left2});
        }else if(index == 2){
            $('#drop2').css({'background':color1,'margin-left':left1});
            $('#drop0,#drop1,#drop3').css({'background':color2,'margin-left':left2});
        }else if(index == 3){
            $('#drop3').css({'background':color1,'margin-left':left1});
            $('#drop0,#drop1,#drop2').css({'background':color2,'margin-left':left2});
        }
    });
});

$(function () {

    $('#myModal').on('hide.bs.modal', function () {
        $('#drop').css('width','0%');
        flg = 1;
        $('#drop0,#drop1,#drop2,#drop3').css({'background':color2,'margin-left':left2});
    });
    // $('#myModal').on('hidden.bs.modal', function () {
    //     console.log("2");
    // });
});