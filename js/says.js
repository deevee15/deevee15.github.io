$(document).ready(function() {
	$(function(){
        $('.sz_input').hide();
        $('.sz_decline').hide();
        $('.profile_inf_says').click(function(){
            $('.sz_input').show();
            $('.sz_input').select();
            $('.profile_user_says').hide();
            $('.sz_decline').show();
        });
        $('.sz_decline').click(function(){
            $('.sz_input').hide();
            $('.sz_input').select();
            $('.profile_user_says').show();
            $('.sz_decline').hide();
        });
    });
});