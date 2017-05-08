$(document).ready(function() {
	$(function(){
        $('.inf_edu,.inf_about').hide();
        var showed = true;
        $('.inf_show').click(function(){
            if(showed){
                $('.inf_edu,.inf_about').show();
                $('.inf_show p').html("Скрыть остальное");
                $('.profile_wall_show').css("margin-top","460px");
                showed = false;
            }
            else{
                $('.inf_edu,.inf_about').hide();
                $('.inf_show p').html("Показать остальное");
                $('.profile_wall_show').css("margin-top","400px");
                showed = true;
            }
        });
    });
});