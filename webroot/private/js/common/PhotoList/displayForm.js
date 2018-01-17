$(function () {
   $('.title_serach_form').find('span').on('click',function () {
      alert('aa');
      $(this).removeClass('glyphicon-plus-sign');
      $(this).addClass('glyphicon glyphicon-minus-sign');
   });
});