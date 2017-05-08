$(document).ready(function() {
	$(function(){
        $('.settings').hide();
        var clicked = true;
        $('.header_account').click(function(){
            if(clicked){
                $('.settings').show();
                $('.header_account').css({"background":"#2a9efc"});
                clicked = false;
            }
            else{
                $('.settings').hide();
                $('.header_account').css({"background":"0"});
                clicked = true;
            }
        });
    });
});