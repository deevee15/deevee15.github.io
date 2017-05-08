$(document).ready(function() {
	$(function(){
        $('#modal').hide();
        $('.topup_balance').click(function(){
            $('#modal').show();
        });
        $('.donate_close').click(function(){
            $('#modal').hide();
        });
    });
});