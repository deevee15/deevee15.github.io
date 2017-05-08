$(document).ready(function(){
    $(function(){
        function light(element){
            $(element).css({'border-color':'#e93939'});
            setTimeout(function(){
            $(element).removeAttr('style');
            },700);
        }
        $('.auth_button').click(function(){
            var name = $('.auth_name').val();
            var sname = $('.auth_sname').val();
            var mail = $('.auth_mail').val();
            var pass = $('.auth_pass').val();
            var repass = $('.auth_repass').val();
            var day = $('.auth_b_day').val();
            var year = $('.auth_b_year').val();
            //длины символов
            var p_length = $('.auth_pass').val().length;
            var e_length = $('.auth_mail').val().length;
            if(name=='' && sname=='' && mail=='' && pass=='' && repass==''){
                light($('.auth_name'));
                light($('.auth_sname'));
                light($('.auth_mail'));
                light($('.auth_pass'));
                light($('.auth_repass'));
                return false;
            }
            else if(name==''){
                light($('.auth_name'));
                return false;
            }
            else if(sname==''){
                light($('.auth_sname'));
                return false;
            }
            else if(mail==''){
                light($('.auth_mail'));
                return false;
            }
            else if(pass==''){
                light($('.auth_pass'));
                return false;
            }
            else if(repass==''){
                light($('.auth_repass'));
                return false;
            }
            else if(e_length<8){
                $('.info').text('Почта не менее 6 символов!');
                return false;
            }
            else if(pass!=repass){
                $('.info').text('Введите пароль правильно!');
                light($('.auth_pass'));
                light($('.auth_repass'));
                return false;
            }
            else if(day>31){
                $('.info').text('Введите реальную дату рождения');
                light($('.auth_b_day'));
                return false;
            }
            else if(year<1950 && year>2000){
                light($('.auth_b_year'));
                return false;
            }
        });
    });
});
