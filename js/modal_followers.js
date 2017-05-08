$(document).ready(function() {
    $(function(){
        $('#modal_fl').hide();
        $('.followers').click(function(){
            $('#modal_fl').show();
        });
        $('.followers_close').click(function(){
            $('#modal_fl').hide();
        });
    });
});