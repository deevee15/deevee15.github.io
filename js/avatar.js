$(document).ready(function() {
	$(function(){
        $('.profile_ava_edit').hide();
        $('.profile_ava').hover(function(){
            $('.profile_ava_edit').show();
            hovered = false;
        });
    });
});