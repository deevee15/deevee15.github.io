$(document).ready(function() {
	$(function(){
        $('.header_menu_list').css({ marginLeft: "-220px"});
        var haveseen = true;
        $('.header_menu_icon').click(function(){
            if(haveseen){
                $('.header_menu_list').animate({ marginLeft: "-10px"} , 300);
                haveseen = false;
            }
            else{
                $('.header_menu_list').animate({ marginLeft: "-220px"} , 500);
                haveseen = true;
            }
        });
    });
});