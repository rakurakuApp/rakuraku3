$(function () {
	$('#resetEvents').click(function () {
		$('.modal-body').find('input[type = checkbox]').prop('checked', false);
	});
});