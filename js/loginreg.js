$(document).ready(function() {
	$(function(){
        $('.form_reg').hide();
        $('.select_reg').click(function(){
            $('.form_reg').show();
            $('.form_login').hide();
            $(this).css({"border-bottom":"2px solid #42aaff"});
            $('.select_enter').css({"border-bottom":"0"});
        });
        $('.select_enter').click(function(){
            $('.form_login').show();
            $('.form_reg').hide();
            $(this).css({"border-bottom":"2px solid #42aaff"});
            $('.select_reg').css({"border-bottom":"0"});
        });
    });
});