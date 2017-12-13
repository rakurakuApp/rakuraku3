/**
 * Created by 15110006 on 2017/12/06.
 */
$(function() {
    "use strict";




    setInterval(function() {
        switch ($('#sec').text()){
            case "3":
                $('#sec').text(2);
                break;
            case "2":
                $('#sec').text(1);
                break;
            case "1":
                $('#sec').text(0);
                break;
        }
    },1000);

    $(window).load(function() {
        setTimeout(function(){

            location.href = "/rakuraku/login";
        }, 4000);
    });


});