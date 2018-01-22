//選択された要素の設定
const color1 = '#BDBDBD';
const left1 = '10px';
// 選択された要素以外の設定
const color2 = '#A4A4A4';
const left2 = '0px';
// -------------------------------------
var flg = 0;
var inquiredID = 0;//問い合わせ番号
var targetPhoto;//問い合わせ対象画像

//問い合わせメニュー
$(function () {
	//外枠表示処理
	$("#flag").click(function () {
		if (flg == 1) {
			$('#drop').css('width', '125%');
			flg = 0;
		} else {
			$('#drop').css('width', '0%');
			flg = 1;
		}
	});
	
	$('#drop > div > li > a').click(function () {
		inquiredID = $(this).attr('id');
		targetPhoto = $("img[name='listImage']").
		alert(targetPhoto);
		$('#drop > div > li > a').css({'background': color2, 'margin-left': left2});
		$(this).css({'background': color1, 'margin-left': left1});
	});
	
	// 送信ボタンクリック時処理
	$("#inquiry_send").on('click', function () {
		return $.ajax({
			url: location.href,
			dataType: 'html',
			data:
				{
					'inquiredID': inquiredID,
					'targetPhoto': targetPhoto
				},
			type: 'post'
		}).done(function (response) {
		
		}).fail(function (response) {
		
		});
	});
});

$(function () {
	$('#myModal').on('hide.bs.modal', function () {
		$('#drop').css('width', '0%');
		flg = 1;
		$('#drop0,#drop1,#drop2,#drop3').css({'background': color2, 'margin-left': left2});
	});
});