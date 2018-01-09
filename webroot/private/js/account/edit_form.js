$(function () {
	"use strict";
	$('#chk_edit').change(function () {
		// 入力フォームを編集可能にする
		if ($(this).is(':checked')) {
			$('#email').removeAttr('disabled').focus();
			$('#account_id').removeAttr('disabled').focus();
			$('.del_flag').removeAttr('disabled').focus();
			
			// メ-ルアドレスバリデーションチェック
			$('#email').blur(function () {
				if (!$(this).val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
					// 警告表示がまだ出ていない場合
					if (!$(this).parent().html().match('※正しいメールアドレスが入力されていません。')) {
						$('#email').parent().append('<p class="validate" id="email_validate">※正しいメールアドレスが入力されていません。&emsp;&emsp;&emsp;&emsp;</p>');
					}
				} else {
					// 警告表示後に書式の正しいメールアドレスが入力された時、警告を消す
					$('#email_validate').remove();
				}
			});
			
			// IDバリデーションチェック
			$('#account_id').blur(function () {
				if (!$('#account_id').val().match(/^[a-zA-Z0-9]+$/)) {
					// 警告表示がまだ出ていない場合
					if (!$(this).parent().html().match('※アカウントは半角英数字を入力して下さい。')) {
						$('#account_id').parent().append('<p class="validate" id="id_validate">※アカウントは半角英数字を入力して下さい。&emsp;&emsp;&emsp;&emsp;</p>');
					}
				}
			});
			
			
		} else {
			$('#email').attr('disabled', 'disabled');
			$('#account_id').attr('disabled', 'disabled');
			$('.del_flag').attr('disabled', 'disabled');
		}
	});
	
	//完了ボタン
	$('#confirm_btn').click(function () {
		let errorMsg = "";
		let flag = true;
		//メールアドレスのバリデーションチェック
		if (!$('#email').val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
			errorMsg += "正しいメールアドレスが入力されていません。\n";
			flag = false;
		}
		//IDのバリデーションチェック
		if (!$('#account_id').val().match(/^[a-zA-Z0-9]+$/)) {
			errorMsg += "アカウントは半角英数字を入力して下さい。";
			flag = false;
		}
		
		// チェックに引っかかった場合、該当項目をalertでまとめて出す
		if (!flag) {
			window.alert(errorMsg);
			return false;
		}
	});
	
	//削除ボタン
	$('#delete_btn').click(function () {
		removeDisabled();
	});
	
	//削除復帰ボタン
	$('#re_spawn_btn').click(function () {
		removeDisabled();
	});
})
;

//情報更新のため、ボタンクリック時に入力フォームのdisabled解除
function removeDisabled() {
	"use strict";
	$('#email').removeAttr('disabled').focus();
	$('#account_id').removeAttr('disabled').focus();
	$('.del_flag').removeAttr('disabled').focus();
}

//復帰ボタンを押す時、園児の削除チェックを確認し、全ての園児がチェックされている場合は警告を行う
function chkNumOfDelete(numOfChk) {
	"use strict";
	//チェック済情報数の取得
	let chkCnt = $('.children_info :checked').length;
	if (chkCnt === numOfChk) {
		window.alert("全ての園児に削除チェックが付いています。\nいずれかの園児のチェックを外してください。");
		return false;
	} else {
		return true;
	}
}