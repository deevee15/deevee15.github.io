<?php
    include_once("bd.php");$id=$_GET['id'];include_once("vars.php");include_once("exp.php");include_once("devices.php");
?>
<head>
    <title><?echo $name;echo" ";echo $surname;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/mobile/css/account.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/mobile/js/acc_menu.js"></script>
    <link rel="ICON" href="/img/1.png" type="image/gif">
</head>
    <?
        $result = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_COOKIE['account']."'");
        while($row = mysql_fetch_array($result)) {
            $support=$row['support'];
            $u_id=$row['id'];
            $user_ip=$row['user_ip'];
            $ULANG=$row['site_lang'];
            $u_ava=$row['avatar'];
            $u_name=$row['name'];
            $u_sname=$row['surname'];
            $u_sz=$row['says'];
        }
    ?>
<body>
    <?
        if($id==0){echo "<meta http-equiv='Refresh' content='0; URL=/mobile/index.php'>";}else{
        $ip=$_SERVER['REMOTE_ADDR'];
        if($ip!=$user_ip){
            //echo "<meta http-equiv='Refresh' content='0; URL=/mobile/security.php?id=".$user_id."'>";
        }
    ?>
    <div id="header">
        <div class="header_menu">
            <div class="header_menu_icon"></div>
            <div class="header_menu_list">
                <div class="menu_user"><a href="/mobile/acc.php?id<?echo$u_id;?>">
                    <div class="user_avatar"><img src="<?echo$u_ava;?>" width="30px" height="30px"></div>
                    <div class="user_names"><?echo$u_name;echo" ";echo$u_sname;?></div>
                    <div class="user_sz"><?echo$u_sz;?></div>
                </a></div>
                <div class="menu_list">
                    <ul>    
                        <a href="/mobile/account/messages.php?id=<?echo$id;?>"><li>Сообщения</li></a>
                        <a href="/mobile/account/friends.php?id=<?echo$id;?>"><li>Друзья</li></a>
                        <a href="/mobile/account/photos.php?id=<?echo$id;?>"><li>Фотографии</li></a>
                        <a href="/mobile/settings/search.php"><li>Поиск</li></a>
                        <a href="/mobile/account/settings.php"><li>Настройки</li></a>
                        <a href="/account/exit.php"><li>Выйти</li></a>
                    </ul>
                </div>
                <div class="menu_settings" hidden="hidden">
                    <a>Log out</a>
                </div>
            </div>
        </div>
        <div class="header_username"><b><?echo$name;?></b></div>
        <div class="header_buttonmsg"><div class="header_msg_icon"></div></div>
    </div>
    <div id="account">
        <div class="account_names">
            <div class="account_avatar"><img src="<?echo$avatar;?>" width="50px" height="50px" style="margin-top:5px;"></div>
            <div class="account_name"><b><?echo$name;echo" ";echo$surname;?></b></div>
            <div class="account_status">Online</div>
            <div class="account_sz"><?echo$sz;?></div>
        </div>
        <div class="account_title">Информация</div><div class="account_edit"><a href="account/edit.php?id=<?echo$u_id;?>">редактировать</a></div>
        <div class="account_information">
            <ul>
                <li>Дата рождения: <a><?echo $b_day;echo" ";echo $b_month;echo", ";echo $b_year;?></a></li>
                <li>Веб-сайт: <a href="<?if($site!=''){?>http://<?echo$site;}?>"><?if($site==''){echo"none";}else{echo"http://";echo$site;}?></a></li>
                <li>Образование: <a><?if($edu==''){echo"Неизвестно";}else{echo$edu;}?></a></li>
                <li>Мобильный телефон: <a>Неизвестно</a></li>
                <li>Город: <a><?if($city==''){echo"Неизвестно";}else{echo$city;}?></a></li>
            </ul>
        </div>
        <div class="account_title" style="margin-top:5px;">Другое</div>
        <?
            $res = mysql_query('SELECT COUNT(1) FROM `friends` WHERE (from_who = '.$id.' AND accepted = 1) OR (to_who = '.$id.' AND accepted = 1)');
            if($res)
            $row = mysql_fetch_array($res, MYSQL_NUM);
            $hisfriends = !empty($row[0]) ? $row[0] : 0;
            //
            $res = mysql_query('SELECT COUNT(1) FROM `photos` WHERE `u_id` = '.$id.'');
            if($res)
            $row = mysql_fetch_array($res, MYSQL_NUM);
            $hisphotos = !empty($row[0]) ? $row[0] : 0;  
        ?>
        <div class="account_points">
            <ul>
                <a href="/account/friends.php?id=<?echo$id;?>"><li>Друзья <font style="color:#42aaff;"><?echo$hisfriends;?></font></li></a>
                <a href="/account/photos.php?id=<?echo$id;?>"><li>Фотографии <font style="color:#42aaff;"><?echo$hisphotos;?></font></li></a>
                <a href="/account/videos.php?id=<?echo$id;?>"><li>Видео <font style="color:#42aaff;">0</font></li></a>
                <a href="/account/audios.php?id=<?echo$id;?>"><li>Аудио <font style="color:#42aaff;">0</font></li></a>
            </ul>
        </div>
        <div class="account_title">3 поста</div>
    </div>
<?}?>
</body>