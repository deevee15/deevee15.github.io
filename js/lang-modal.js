$(document).ready(function() {
	$(function(){
        $('#modal_language').hide();
        $('.content_lang a span').click(function(){
            $('#modal_language').show();
        });
        $('.modal_lg_close').click(function(){
            $('#modal_language').hide();
        });
    });
});