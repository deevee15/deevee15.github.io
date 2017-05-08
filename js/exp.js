$(document).ready(function() {
	$(function(){
        $('.what').hide();
        var hovered = true;
        $('.experience').hover(function(){ 
            if(hovered){
            $('.what').show();hovered = false;}
            else{$('.what').hide();hovered = true;}
        });
    });
    $(function(){
        $('.exp_info').hide();
        var hovvered = true;
        $('.what').hover(function(){
            if(hovvered){
            $('.exp_info').show(1000);hovvered = false;}
            else{
            $('.exp_info').hide(1000);hovvered = true;}
        });
    });
});