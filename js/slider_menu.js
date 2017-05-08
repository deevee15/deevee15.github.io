$(document).ready(function() {
	$(function(){
        var slided = true;
        $('#mslider').click(function(){
                if(slided){
                    $('.menu_ul_a_li').animate({
                        left: '-=100',
                    }, 500, function() {
                });
                $('#slider_menu').width(80);
                slided = false;
            }
            else{
                $('.menu_ul_a_li').animate({
                        left: '+=100',
                    }, 500, function() {
                });
                $('#slider_menu').width(150);
                slided = true;
            }
        });
    });
});