$(document).ready(function() {
	$(function(){
        $('.change_sett').hide()
        $('.change_pass').click(function(){
            $('.change_pass').hide();
            $('.change_sett').show()      
        });
    });
});