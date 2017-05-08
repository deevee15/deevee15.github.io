<?php
    include_once("bd.php");
    $result = mysql_query("SELECT * FROM `users`");
    while($row = mysql_fetch_array($result)) {$id=$row['id'];}
    $email = $_POST['auth_email'];
?>
<html>
<head>
    <title>Регистрация в Social</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/newreg.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/menu.js"></script>
    <script type="text/javascript" src="/js/birthday.js"></script>
    <script type="text/javascript" src="/js/prewiew_register.js"></script>
    <script type="text/javascript" src="/js/singup.js"></script>
    <link rel="ICON" href="/img/1.png" type="image/gif">
</head>
<body>
    <div id="header">
        <div class="header_lg"><a href="/" id="header_lg_a"><div class="header_lg_img"></div></a></div>
        <form id="header_search" method="post" action="search.php">
            <input type="text" name="search_input" class="input_search" placeholder="Поиск" onfocus="if(this.placeholder=='Поиск') {this.placeholder='';}" onblur="if(this.value=='') {this.placeholder='Поиск';}">
        </form>
        <div class="header_enter" style="padding-top:1px;">
            <div class="photo_user"><p>Войти</p> <img src="img/default_user.png" width="40px" height="40px"></div>
            <ul class="settings">
                <a href="singup.php"><li>Регистрация</li></a>
                <a href="/"><li>Вход</li></a>
                <a href="rules.php"><li>Правила пользования</li></a>
            </ul>
        </div>
    </div>
    <div id="objects">
        <div class="preview">
            <div class="users_quad">
                <div class="user_avatar"></div>
                <div class="user_names"></div>
            </div>
        </div>
        <div class="registration">
            <form action="settings/registrating.php" method="post" name="form_singup">
                <p style="margin-left:15px;margin-bottom:5px;" class="form_singup_names">Инициалы:</p>
                <input type="text" placeholder="Имя" name="auth_name" class="auth_name"> <input type="text" placeholder="Фамилия" name="auth_sname" class="auth_sname">
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;" class="form_singup_mail">Электронная почта:</p>
                <input type="text" placeholder="E-mail" name="auth_mail" value="<?echo$email;?>" class="auth_mail">
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;" class="form_singup_pass">Пароль:</p>
                <input type="password" placeholder="" name="auth_pass" class="auth_pass">
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;" class="form_singup_repass">Повторите пароль:</p>
                <input type="password" placeholder="" name="auth_pass" class="auth_repass">
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;" class="form_singup_birth">Дата рождения:</p>
                <input type="text" placeholder="День" name="auth_b_day" class="auth_b_day"><select name="ageMonth" class="ageMonth">
                    <option value="month">Месяц</option>
                    <option value="January">Январь</option>
                    <option value="February">Февраль</option>
                    <option value="March">Март</option>
                    <option value="April">Апрель</option>
                    <option value="May">Май</option>
                    <option value="June">Июнь</option>
                    <option value="July">Июль</option>
                    <option value="August">Август</option>
                    <option value="September">Сентябрь</option>
                    <option value="October">Октябрь</option>
                    <option value="November">Ноябрь</option>
                    <option value="December">Декабрь</option>
				</select> <input type="text" placeholder="Год" name="auth_b_year" class="auth_b_year">
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;" class="form_singup_gender">Пол:</p>
                <select name="auth_gender" class="u_gender">
                    <option value="Мужской" class="u_gender_male">Мужской</option>
                    <option value="Женский" class="u_gender_female">Женский</option>
                </select>
                <?if($_COOKIE['language']!='russian'){?>
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;" class="form_singup_country">Страна:</p>
                <select name="auth_country" class="country">
                    <option value="RUS" class="country_val_rus">Россия</option>
                    <option value="UA" class="country_val_ua">Украина</option>
                    <option value="BY" class="country_val_by">Белоруссия</option>
                    <option value="US" class="country_val_us">США</option>
                    <option value="UK" class="country_val_uk">Великобритания</option>
                    <option value="CA" class="country_val_ca">Канада</option>
                    <option value="JAP" class="country_val_jap">Япония</option>
                    <option value="CN" class="country_val_cn">Китай</option>
                    <option value="Estonia" class="country_val_ee">Эстония</option>
                    <option value="Latvia" class="country_val_lv">Латвия</option>
                    <option value="Litva" class="country_val_lt">Литва</option>
				</select><?}?>
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;" class="form_singup_city">Город:</p>
                <input type="text" placeholder="Город" name="auth_city" class="auth_city"><br>
                <p class="info"></p>
                <input type="submit" value="Регистрация" class="auth_button" name="auth_button" style="cursor:pointer;">
            </form>
        </div>
        <div class="footer">
            Сайт спроектирован и создан <b><a href="http://vk.com/id128992545" style="color:#42aaff;">DeeVee</a></b> в 2016 году<br>
            (c) все права защищены
        </div>
    </div>
</body>
<script>
<?if($_COOKIE['language']=="english"){?>
    $('.photo_user p').html("Sing in");
    $('.st_reg').html("Sing up");$('.st_ent').html("Login");$('.st_rl').html("Rules");
    $('.scr_text_1').html("User's page");$('.scr_text_2').html("User's photos");
    $('.select_enter').html("Log in");$('.select_reg').html("Log up");
    $('.preview_title').html("Some people have registered:");
    $('.form_singup_names').html("Initials:");$('.form_singup_mail').html("Web mail:");
    $('.form_singup_pass').html("Input the password:");$('.form_singup_repass').html("Reinput the password:");
    $('.form_singup_birth').html("Birthday:");$('.form_singup_gender').html("Gender:");
    $('.form_singup_country').html("Country:");$('.form_singup_city').html("City:");
    $('.auth_button').val("Sing up");
    $('.auth_name').attr('placeholder','Name');$('.auth_sname').attr('placeholder','Surname');
    $('.auth_b_day').attr('placeholder','Day');$('.auth_b_year').attr('placeholder','Year');
    $('.auth_city').attr('placeholder','City');
    //countries
    $('.country_val_rus').html("Russia");$('.country_val_ua').html("Ukraine");$('.country_val_by').html("Belarus");
    $('.country_val_us').html("USA");$('.country_val_uk').html("United Kingdom");$('.country_val_ca').html("Canada");
    $('.country_val_ee').html("Estonia");$('.country_val_lv').html("Latvia");$('.country_val_lt').html("Lithuania");
    $('.country_val_jap').html("Japan");$('.country_val_cn').html("China");
    //genders
    $('.u_gender_male').html("Male");
    $('.u_gender_female').html("Female");
<?}?>
</script>