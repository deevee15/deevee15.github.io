<?php
    include_once("bd.php");$id=$_GET['id'];include_once("vars.php");
?>
<head>
    <title>Фотографии <?echo $name;echo" ";echo $surname;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/account.css">
    <link rel="stylesheet" type="text/css" href="/css/photos.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/acc_menu.js"></script>
    <script type="text/javascript" src="/js/menu.js"></script>
    <link rel="ICON" href="/img/1.png" type="image/gif">
</head>
<?
            $result = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_COOKIE['account']."'");
            while($row = mysql_fetch_array($result)) {
                $support=$row['support'];
                $user_id=$row['id'];
                $user_ip=$row['user_ip'];
                $ULANG=$row['site_lang'];
                $user_ava=$row['avatar'];
                $user_email_status=$row['email_status'];
            }
?>
<?if($adm_lvl==3){echo"<body style='background:url(".$bg.");'>";}else{echo"<body style='background:#82c4fb;'>";}?>
    <script type="text/javascript">
        $(window).width(); //Ширина браузера
        $(window).height();
    </script>
    <?
        if($id==0){echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";}else{
    ?>
    <div id="header">
        <?
            $res = mysql_query('SELECT COUNT(1) FROM `friends` WHERE to_who = '.$user_id.' AND accepted = 0');
            if($res)
            $row = mysql_fetch_array($res, MYSQL_NUM);
            $subs = !empty($row[0]) ? $row[0] : 0;  
        ?>
        <div class="header_lg"><a href="/" id="header_lg_a"><div class="header_lg_img"></div></a></div>
        <?if($_COOKIE['account']){?><a href="/account/messages.php"><div class="header_nmsg"><div class="header_nmsg_icon"><font class="nmsg_number">+1</font></div></div></a>
        <a href="/account/friends.php?id=<?echo$user_id;?>"><div class="header_nfrd"><div class="header_nfrd_icon"><?if($subs!=0){?><font class="nfrd_number">+<?echo$subs;?></font><?}?></div></div></a><?}?>
        <form id="header_search" method="post" action="search.php">
            <input type="text" name="search_input" class="input_search" placeholder="Поиск" onfocus="if(this.placeholder=='Поиск') {this.placeholder='';}" onblur="if(this.value=='') {this.placeholder='Поиск';}" autocomplete="off">
        </form>
        <?if($_COOKIE['account']){?>
        <div class="header_account" onselectstart="return false" onmousedown="return false">
            <?
               $result = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_COOKIE['account']."'");
            while($row = mysql_fetch_array($result)) {$cook_name=$row['name'];$cook_ava=$row['avatar'];}
            ?>
            <div class="photo_user"><p style="font-size:15px;"><b><?echo $cook_name;?></b></p><img src="<?echo $cook_ava;?>" width="40px" height="40px"></div>
            <ul class="settings">
                <a href="/"><li style="border-bottom:1px solid #afafaf;" class="hd_acc_st_pr">Мой профиль</li></a>
                <a href="/account/edit.php?id=<?echo$id;?>"><li style="margin-top:3px;" class="hd_acc_st_ed">Редактирование</li></a>
                <a href="/account/settings.php?id=<?echo$id;?>&st=1"><li class="hd_acc_st_st">Настройки</li></a>
                <a href="/help.php"><li class="hd_acc_st_hp">Помощь</li></a>
                <a href="/account/exit.php"><li style="border-top:1px solid #afafaf; margin-top:3px;" class="hd_acc_st_ex">Выйти</li></a>
            </ul>
        </div><?}else{?>
        <div class="header_enter">
            <div class="photo_user"><p>Войти</p> <img src="/img/default_user.png" width="40px" height="40px"></div>
            <ul class="settings">
                <a href="singup.php"><li>Регистрация</li></a>
                <a href="/"><li>Вход</li></a>
                <a href="rules.php"><li>Правила пользования</li></a>
            </ul>
        </div>
        <?}?>
    </div>
    <?if(!empty($_COOKIE['account'])){?>
    <div id="slider_menu">
        <ul class="menu_ul_a_li">
            <a href="/acc.php?id=<?echo$user_id;?>"><li><div class="profile_icon"></div> <font class="mn_pr">Профиль</font></li></a>
            <a href="/account/messages.php?id=<?echo$user_id;?>"><li><div class="msg_icon"></div> <font class="mn_msg">Сообщения</font></li></a>
            <a href="/account/friends.php?id=<?echo$user_id;?>"><li><div class="friends_icon"></div> <font class="mn_fr">Друзья</font></li></a>
            <a href="/account/photos.php?id=<?echo$user_id;?>"><li><div class="photos_icon"></div> <font class="mn_ph">Фотографии</font></li></a>
            <a href="/account/audios.php?id=<?echo$user_id;?>"><li><div class="audios_icon"></div> <font class="mn_aud">Аудио</font></li></a>
            <a href="/account/videos.php?id=<?echo$user_id;?>"><li><div class="videos_icon"></div> <font class="mn_vid">Видео</font></li></a>
        </ul>
        <div class="menu_settings" onselectstart="return false" onmousedown="return false">
            <?if($ULANG=='russian'){$language="<img src='/img/flags/1.gif' width='16px' height='12px'> русский";}
                else if($ULANG=='english'){$language="<img src='/img/flags/2.gif' width='16px' height='12px'> english";}
                else if($ULANG=='japanese'){$language="<img src='/img/flags/3.gif' width='16px' height='13px'> 日本語";}
                else if($ULANG=='deutsch'){$language="<img src='/img/flags/4.gif' width='16px' height='13px'> Deutsch";}
                else if($ULANG=='french'){$language="<img src='/img/flags/5.gif' width='16px' height='13px'> Français";}
                else{$language="неизвестно";}
            ?>
            <p><a href="/about.php" class="mn_aboutus">О нас</a></p>
            <p><a href="/account/settings.php?id=<?echo$user_id;?>&st=4" class="mn_donate">Донат</a></p>
            <p><font class="mn_lg">Язык</font>: <?echo$language;?></p>
            <p><a href="/mobile/" class="mn_mobile">Версия для мобильных</a></p>
            <?if($support>=1){?><p><a href="/admin/" class="mn_adm"><i>Admin</i></a></p><?}?>
        </div>
    </div>
    <?}else{?>
    <div id="user_login">
        <form method="post" action="settings/singin.php" name="user_login_form">
            <p>E-mail:</p> <input type="text" name="auth_login"><br>
            <p>Пароль:</p> <input type="password" name="auth_password"><br>
            <input type="submit" value="Войти" name="auth_submit"><br>
        </form>
        <a href="/singup.php"><button class="user_registration">Регистрация</button></a><br>
        <a href="/settings/forgotten.php" class="user_forgotten">Забыли пароль?</a>
    </div><?}?>
    <div id="photos">
        <?if($id==$user_id){?>
        <form action="/user/photos/p_upload.php?id=<?echo$id;?>" method="post" enctype="multipart/form-data" name="edit_form">
            <script src="/js/custom-file-input.js"></script>
            <input type="file" name="uploadfile" accept=".png,.gif,.jpg,.jpeg" class="outtaHere inputfile" id="upload" data-multiple-caption="{count} files selected" multiple>
            <label for="upload"><span class="lbl_ttl">Выбрать фото</span></label>
            <input type="submit" value="OK" style="position:absolute; margin-left:670px;margin-top:6px;height:25px; color:#fff; background:#42aaff;border:1px solid #42aaff;cursor:pointer;">
        </form><?}else{?>
        <div class="back_to_profile">
            <a href="/acc.php?id=<?echo$id;?>"><button><font>Вернуться к</font> <?echo $name;echo" ";echo $surname;?></button></a>
        </div>
        <?}?>
        <div class="photos_avatar">
            <p><font>Фотография профиля</font> <?echo$name;?></p>
            <a href="<?echo$avatar?>"><img src="<?echo$avatar?>"></a>
        </div>
        <div class="photos_other">
            <?
                $res = mysql_query('SELECT COUNT(1) FROM `photos` WHERE `u_id` = '.$id.'');
                if($res)
                $row = mysql_fetch_array($res, MYSQL_NUM);
                $hisphotos = !empty($row[0]) ? $row[0] : 0;  
            ?>
            <p><font class="photos_other_ttl">Фотографии со стены</font> <?echo$name;?> (<font style="color:#42aaff;"><?echo$hisphotos;?></font>)</p>
            <?
            $result = mysql_query("SELECT * FROM `photos` WHERE u_id = ".$id." ORDER BY id DESC");                 
            while($row = mysql_fetch_array($result)) {
                $p_name = $row['p_name'];
                $p_date = $row['p_date'];
            ?>
            <a href="/user/photos/<?echo$p_name;?>"><img src="/user/photos/<?echo$p_name;?>" height="135px" width="135px"></a><?}?>
        </div>
    </div>
<?}?>
</body>
<?if($_COOKIE['language']=="english"){?><script src="/js/eng_translater.js"></script><?}
elseif($_COOKIE['language']=="japanese"){?><script src="/js/jp_translater.js"></script><?}?>