$(document).ready(function() {
	$(function(){
        $('.admin_moves').hide();
        var clicked = true;
        $('.amenu_open').click(function(){
            if(clicked){
            $('.admin_moves').slideDown(500);clicked = false;}
            else{
                $('.admin_moves').slideUp(function(){
                    $('.admin_moves').hide(300);
                });
                clicked = true;
            }
        });
    });
});