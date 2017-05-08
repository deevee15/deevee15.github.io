$(document).ready(function() {
	$(function(){
        $('.list_day').hide();
        $('.list_month').hide();
        $('.list_year').hide();
        var clicked = true;
        var showed = false;
        $('.reg_day').click(function(){
            if(clicked){
                clicked = false;
                $('.list_day').show();
                showed = true;
            }
            else{
                clicked = true;
                $('.list_day').hide();
                showed = false;
            }
        });
        $('.reg_month').click(function(){
            if(clicked){
                clicked = false;
                $('.list_month').show();
                showed = true;
            }
            else{
                clicked = true;
                $('.list_month').hide();
                showed = false;
            }
        });
        $('.reg_year').click(function(){
            if(clicked){
                clicked = false;
                $('.list_year').show();
                showed = true;
            }
            else{
                clicked = true;
                $('.list_year').hide();
                showed = false;
            }
        });
        $('.1').click(function(){
            $('.reg_day').val("1");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.2').click(function(){
            $('.reg_day').val("2");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.3').click(function(){
            $('.reg_day').val("3");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.4').click(function(){
            $('.reg_day').val("4");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.5').click(function(){
            $('.reg_day').val("5");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.6').click(function(){
            $('.reg_day').val("6");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.7').click(function(){
            $('.reg_day').val("7");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.8').click(function(){
            $('.reg_day').val("8");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.9').click(function(){
            $('.reg_day').val("9");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.10').click(function(){
            $('.reg_day').val("10");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.11').click(function(){
            $('.reg_day').val("11");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.12').click(function(){
            $('.reg_day').val("12");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.13').click(function(){
            $('.reg_day').val("13");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.14').click(function(){
            $('.reg_day').val("14");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.15').click(function(){
            $('.reg_day').val("15");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.16').click(function(){
            $('.reg_day').val("16");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.17').click(function(){
            $('.reg_day').val("17");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.18').click(function(){
            $('.reg_day').val("18");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.19').click(function(){
            $('.reg_day').val("19");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.20').click(function(){
            $('.reg_day').val("20");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.21').click(function(){
            $('.reg_day').val("21");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.22').click(function(){
            $('.reg_day').val("22");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.23').click(function(){
            $('.reg_day').val("23");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.24').click(function(){
            $('.reg_day').val("24");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.25').click(function(){
            $('.reg_day').val("25");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.26').click(function(){
            $('.reg_day').val("26");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.27').click(function(){
            $('.reg_day').val("27");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.28').click(function(){
            $('.reg_day').val("28");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.29').click(function(){
            $('.reg_day').val("29");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.30').click(function(){
            $('.reg_day').val("30");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.31').click(function(){
            $('.reg_day').val("31");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        $('.day').click(function(){
            $('.reg_day').val("День");
            $('.list_day').hide();
            clicked = true;
            showed = false;
        });
        //месяцы
        $('.jan').click(function(){
            $('.reg_month').val("Январь");
            $('.list_month').hide();
            clicked = true;
            showed = false;
        });
        $('.feb').click(function(){
            $('.reg_month').val("Февраль");
            $('.list_month').hide();
            clicked = true;
            showed = false;
        });
        $('.march').click(function(){
            $('.reg_month').val("Март");
            $('.list_month').hide();
            clicked = true;
            showed = false;
        });
        $('.apr').click(function(){
            $('.reg_month').val("Апрель");
            $('.list_month').hide();
            clicked = true;
            showed = false;
        });
        $('.may').click(function(){
            $('.reg_month').val("Май");
            $('.list_month').hide();
            clicked = true;
            showed = false;
        });
        $('.june').click(function(){
            $('.reg_month').val("Июнь");
            $('.list_month').hide();
            clicked = true;
            showed = false;
        });
        //годы
        $('.1996').click(function(){
            $('.reg_year').val("1996");
            $('.list_year').hide();
            clicked = true;
            showed = false;
        });
    });
});