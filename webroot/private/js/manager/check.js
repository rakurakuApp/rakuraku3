$(function() {
    //「全て選択」のチェックボックスをチェックしたら発動
    $('input[name="all"]').change(function() {
        //「全て選択」のチェックが入ったら
        if ($(this).prop('checked')) {
            //チェックを付ける
            $('input[name="check"]').prop('checked', true);
            //チェックが外れたら
        } else {
            //チェックを外す
            $('input[name="check"]').prop('checked', false);
        }
    });
});