$(document).ready(function() {
	$(function(){
        $('#modal').hide();
        $('.a_write_message').click(function(){
            $('.profile_stats').css("position","relative");
            $('#modal').show();
        });
        $('.modal_close').click(function(){
            $('.profile_stats').css("position","absolute");
            $('#modal').hide();
        });
    });
});