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
            <div class="preview_title">У нас уже зарегистрированы такие люди,как: </div>
            <div class="preview_user">
                <?
                    $result = mysql_query("SELECT * FROM `users` WHERE id=1");
                    while($row = mysql_fetch_array($result)) {
                        $u1_name=$row['name'];
                        $u1_sname=$row['surname'];
                        $u1_ava=$row['avatar'];
                        $u1_about=$row['about'];
                        $u1_id=$row['id'];
                    }
                ?>
                <div class="preview_user_name u1"><a href="/acc.php?id=<?echo$u1_id;?>"><?echo$u1_name;echo" ";echo$u1_sname;?></a></div>
                <div class="preview_user_avatar u1"><a href="/acc.php?id=<?echo$u1_id;?>"><img src="<?echo$u1_ava;?>" height="200px" width="200px"></a></div>
                <div class="preview_user_info u1"><?echo$u1_about;?></div>
                <div class="button_left u1"></div>
                <div class="button_right u1"></div>
                <?
                    $result = mysql_query("SELECT * FROM `users` WHERE id=5");
                    while($row = mysql_fetch_array($result)) {
                        $u2_name=$row['name'];
                        $u2_sname=$row['surname'];
                        $u2_ava=$row['avatar'];
                        $u2_about=$row['about'];
                        $u2_id=$row['id'];
                    }
                ?>
                <div class="preview_user_name u2"><a href="/acc.php?id=<?echo$u2_id;?>"><?echo$u2_name;echo" ";echo$u2_sname;?></a></div>
                <div class="preview_user_avatar u2"><a href="/acc.php?id=<?echo$u2_id;?>"><img src="<?echo$u2_ava;?>" height="200px" width="200px"></a></div>
                <div class="preview_user_info u2"><?echo$u2_about;?></div>
                <div class="button_left u2"></div>
                <div class="button_right u2"></div>
            </div>
        </div>
        <div class="registration">
            <form action="settings/registrating.php" method="post" name="form_singup">
                <p style="margin-left:15px;margin-bottom:5px;">Инициалы:</p>
                <input type="text" placeholder="Имя" name="auth_name" class="auth_name"> <input type="text" placeholder="Фамилия" name="auth_sname" class="auth_sname">
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;">Электронная почта:</p>
                <input type="text" placeholder="E-mail" name="auth_mail" value="<?echo$email;?>" class="auth_mail">
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;">Пароль:</p>
                <input type="password" placeholder="" name="auth_pass" class="auth_pass">
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;">Повторите пароль:</p>
                <input type="password" placeholder="" name="auth_pass" class="auth_repass">
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;">Дата рождения:</p>
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
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;">Пол:</p>
                <select name="auth_gender" class="u_gender">
                    <option value="Мужской">Мужской</option>
                    <option value="Женский">Женский</option>
                </select>
                <!--Для того,чтобы выбрать страну,надо поставить английский язык(а его пока нет)!-->
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;">Страна:</p>
                <select name="country" class="country">
                    <option value="RUS">Россия</option>
                    <option value="UA">Украина</option>
                    <option value="BY">Белоруссия</option>
                    <option value="Estonia">Эстония</option>
                    <option value="Latvia">Латвия</option>
                    <option value="Litva">Литва</option>
				</select>
                <p style="margin-left:15px;margin-bottom:5px;margin-top:20px;">Город:</p>
                <input type="text" placeholder="Город" name="auth_city"><br>
                <p class="info"></p>
                <input type="submit" value="Регистрация" class="auth_button" name="auth_button">
            </form>
        </div>
        <div class="information">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempor risus a purus tempor lobortis. Sed ligula metus, congue id pulvinar id, feugiat sed purus. Vivamus pretium sed magna vestibulum fringilla. Praesent at risus id ex mattis interdum eu laoreet felis. Nunc vitae nisl in velit facilisis mattis. Proin ut fermentum sapien. Donec mattis, dolor in vestibulum scelerisque, tellus lacus vestibulum sem, ac pretium urna sapien quis eros.

            Fusce vitae nunc tortor. Donec quis urna nec orci vestibulum maximus. Sed vel nibh sit amet nibh mattis aliquet. Sed at libero bibendum, scelerisque felis sit amet, varius lacus. Donec hendrerit, nulla sed dapibus congue, ipsum risus iaculis sapien, in pulvinar lorem arcu eu metus. Phasellus tempus faucibus est ac semper. Pellentesque a ligula tellus. Maecenas sit amet vulputate orci. Morbi vel sodales odio. Quisque vehicula nulla ut massa sodales, sed eleifend dui ornare. Suspendisse finibus sollicitudin lacinia. Nunc nec turpis semper, pellentesque eros laoreet, dignissim neque. Fusce vitae dolor elementum neque porttitor pulvinar nec eget eros. Curabitur accumsan facilisis tortor et pretium. Curabitur tempor ex quis fermentum malesuada.

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempor risus a purus tempor lobortis. Sed ligula metus, congue id pulvinar id, feugiat sed purus. Vivamus pretium sed magna vestibulum fringilla. Praesent at risus id ex mattis interdum eu laoreet felis. Nunc vitae nisl in velit facilisis mattis. Proin ut fermentum sapien. Donec mattis, dolor in vestibulum scelerisque, tellus lacus vestibulum sem, ac pretium urna sapien quis eros.
        </div>
        <div class="footer">
            Сайт спроектирован и создан <b><a href="http://vk.com/id128992545" style="color:#42aaff;">DeeVee</a></b> в 2016 году<br>
            (c) все права защищены
        </div>
    </div>
</body>