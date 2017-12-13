$(function () {
	"use strict";
	$('#chk_edit').change(function () {
		// 入力フォームを編集可能にする
		if ($(this).is(':checked')) {
			$('#email').removeAttr('disabled').focus();
			$('#account_id').removeAttr('disabled').focus();
			$('#password').removeAttr('disabled').focus();
			$('.del_flag').removeAttr('disabled').focus();
			
			// パス再入力項目の設置
			$('.form_table').append(
				'<tr id="pass">' +
				'<td>' +
				'<label for="password_confirm" class="control-label label-layout">再入力:</label>' +
				'<input type="password" class="form-control input-layout" id="password_confirm" name="password">' +
				'</td>' +
				'</tr>'
			);
			
			// メ-ルアドレスバリデーションチェック
			$('#email').blur(function () {
				if (!$(this).val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
					if (!$(this).parent().html().match('※正しいメールアドレスが入力されていません。')) {
						$('#email').parent().append('<p class="validate" id="email_validate">※正しいメールアドレスが入力されていません。&emsp;&emsp;&emsp;&emsp;</p>');
					}
				} else {
					$('#email_validate').remove();
				}
			});
			
			//パスワード入力確認チェック
			$('#password_confirm,#password').blur(function () {
				//PASSWORDと再入力値が異なる場合
				if ($('#password').val() !== $('#password_confirm').val()) {
					if (!$('#password_confirm').parent().html().match('※正しいメールアドレスが入力されていません。')) {
						$('#password_confirm').parent().append('<p class="validate" id="pass_validate">※正しいメールアドレスが入力されていません。&emsp;&emsp;&emsp;&emsp;</p>');
					}
				}else{
					$('#pass_validate').remove();
				}
			});
			
		} else {
			$('#email').attr('disabled', 'disabled');
			$('#account_id').attr('disabled', 'disabled');
			$('#password').attr('disabled', 'disabled');
			$('.del_flag').attr('disabled', 'disabled');
			$('#pass').remove();
		}
	});
	
	//パスワードの表示非表示の切り替え
	$('#chk_show').change(function () {
		//チェックされてるときはtextを適応する
		if ($(this).is(":checked")) {
			$('#password').attr("type", "text");
			$('#password_confirm').attr("type", "text");
		} else {
			$('#password').attr("type", "password");
			$('#password_confirm').attr("type", "password");
		}
	});
	
	//完了ボタン
	$('#confirm_btn').click(function () {
		let errorMsg = "";
		let flag = true;
		//メールアドレスのバリデーションチェック
		if (!$('#email').val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
			errorMsg += "正しいメールアドレスが入力されていません！\n";
			flag = false;
		}
		//パスワード再入力値を比較し、値が違う場合はalertを出す
		if ($('#chk_edit').is(':checked') && $('#password').val() !== $('#password_confirm').val()) {
			errorMsg += "パスワードの入力値が異なっています！\n";
			flag = false;
		}
		if (!flag){
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
	$('#password').removeAttr('disabled').focus();
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