$(function(){
    //名前(漢字)
    $("input[name='name']").blur(function(e){
        if(!emptyCheck(e.target.value && htmlCheck(e.target.value) && nameCheck(e.target.value))){
            return true;
        }
        else{
            alert("入力不可文字があります\n再度入力してください");
            e.target.value = "";
        }
    });

    //ID
    $("input[name='id']").blur(function(e){
       if(!emptyCheck(e.target.value && htmlCheck(e.target.value) && idCheck(e.target.value))){
           return true;
       }
       else{
           alert("入力不可文字があります\n再度入力してください");
           e.target.value = "";
       }
    });

    //アドレス
    $("input[name='address']").blur(function(e){
        if(!emptyCheck(e.target.value && htmlCheck(e.target.value) && emailCheck(e.target.value))){
            return true;
        }
        else{
            alert("入力不可文字があります\n再度入力してください");
            e.target.value = "";
        }
    });

    //パスワード
    $("input[name='pass']").blur()(function (e) {
        if(!emptyCheck(e.target.value && htmlCheck(e.target.value && strCheck(e.target.value)))){
            return true;
        }
        else{
            alert("入力不可文字があります\n再度入力してください");
            e.target.value = "";
        }
    });


    //文字列がアドレスであるか
    //アドレス形式ならtrue
    function emailCheck(str){
        if(str.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
            return true;
        }
        else{
            return false;
        }
    }

    //文字列が英数字(大文字・小文字共存可)
    //含まれているならtrue
    function strCheck(str){
        if(str.match(/^[a-zA-Z0-9]+$/)){
            return true;
        }
        else{
            return false;
        }
    }

    //名前(漢字可)
    //文字と空白のみならtrue
    function nameCheck(str){
        if(str.match(/^[ぁ-んァ-ヶー一-龠 　\r\n\t]+$/)){
            return true;
        }
        else{
            return false;
        }
    }

    //htmlタグか含まれているか
    //含まれている場合はtrue
    function htmlCheck(str){
        if(str.match(/[<(.*)>.*<\/\1>]/)){
            return true;
        }
        else{
            return false;
        }
    }

    //空白のみか
    //空白のみの場合はtrue
    function emptyCheck(str) {
        if(str.match(/^[ 　\r\n\t]*$/)){
            return true;
        }
        else {
            return false;
        }
    }

    //id確認
    //id形式(英数字 大文字小文字　共存可)の場合true
    function idCheck(str){
        if(str.match(/^[a-zA-Z0-9]{6}$/)){
            return true;
        }
        else{
            return false;
        }
    }

});