<?
    include_once("bd.php");
    $id=$_GET['id'];
?>
<head>
    <?
      $result = mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'");
        while($row = mysql_fetch_array($result)) {
        $name=$row['name'];
        $surname=$row['surname'];}  
    ?>
    <?
        $res = mysql_query('SELECT COUNT(1) FROM `friends` WHERE (from_who = '.$id.' AND accepted = 1) OR (to_who = '.$id.' AND accepted = 1)');
        if($res)
        $row = mysql_fetch_array($res, MYSQL_NUM);
        $kolvo_userov = !empty($row[0]) ? $row[0] : 0;                                                    
    ?>
    <title>Друзья онлайн <?echo $name;echo" ";echo $surname;?> (<?echo$kolvo_userov;?>)</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/account.css">
    <link rel="stylesheet" type="text/css" href="/css/friends.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/acc_menu.js"></script>
    <script type="text/javascript" src="/js/menu.js"></script>
    <script type="text/javascript" src="/js/slider_menu.js"></script>
    <script type="text/javascript" src="/js/exp.js"></script>
    <script type="text/javascript" src="/js/amenu.js"></script>
    <link rel="ICON" href="/img/1.png" type="image/gif">
</head>
<?
    $result = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_COOKIE['account']."'");
    while($row = mysql_fetch_array($result)) {
        $support=$row['support'];
        $user_id=$row['id'];$ULANG=$row['site_lang'];
    }
?>
<?if($adm_lvl==3){echo"<body style='background:url(".$bg.");'>";}else{echo"<body style='background:#82c4fb;'>";}?>
    <?if($id==0){echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";}else{?>
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
            <input type="text" name="search_input" class="input_search" placeholder="Поиск" onfocus="if(this.placeholder=='Поиск') {this.placeholder='';}" onblur="if(this.value=='') {this.placeholder='Поиск';}">
        </form>
        <?if($_COOKIE['account']){?>
        <div class="header_account">
            <?
               $result = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_COOKIE['account']."'");
            while($row = mysql_fetch_array($result)) {$cook_name=$row['name'];$cook_ava=$row['avatar'];}
            ?>
            <div class="photo_user"><p style="font-size:15px;"><b><?echo $cook_name;?></b></p><img src="<?echo $cook_ava;?>" width="40px" height="40px"></div>
            <ul class="settings">
                <a href="/"><li style="border-bottom:1px solid #afafaf;">Мой профиль</li></a>
                <a href="/account/edit.php?id=<?echo$id;?>"><li style="margin-top:3px;">Редактирование</li></a>
                <a href="/account/settings.php?id=<?echo$id;?>&st=1"><li>Настройки</li></a>
                <a href="/account/exit.php"><li style="border-top:1px solid #afafaf; margin-top:3px;">Выйти</li></a>
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
            <a href="/acc.php?id=<?echo$id;?>"><li><div class="profile_icon"></div> Профиль</li></a>
            <a href="/account/messages.php?id=<?echo$id;?>"><li><div class="msg_icon"></div> Сообщения</li></a>
            <a href="/account/friends.php?id=<?echo$id;?>"><li><div class="friends_icon"></div> Друзья</li></a>
            <a href="/account/photos.php?id=<?echo$id;?>"><li><div class="photos_icon"></div> Фотографии</li></a>
            <a href="/account/audios.php?id=<?echo$id;?>"><li><div class="audios_icon"></div> Аудио</li></a>
            <a href="/account/videos.php?id=<?echo$id;?>"><li><div class="videos_icon"></div> Видео</li></a>
        </ul>
        <div class="menu_settings" onselectstart="return false" onmousedown="return false">
            <?if($ULANG==1){$language="<img src='/img/flags/1.gif' width='16px' height='12px'> русский";}
                else if($ULANG==2){$language="<img src='/img/flags/2.gif' width='16px' height='12px'> english";}
                else if($ULANG==3){$language="<img src='/img/flags/3.gif' width='16px' height='13px'> 日本語";}
                else if($ULANG==4){$language="<img src='/img/flags/4.gif' width='16px' height='13px'> Deutsch";}
                else if($ULANG==5){$language="<img src='/img/flags/5.gif' width='16px' height='13px'> Français";}
                else{$language="неизвестно";}
            ?>
            <p><a href="/about.php">О нас</a></p>
            <p><a href="/account/settings.php?id=<?echo$user_id;?>&st=4">Донат</a></p>
            <p>Язык: <?echo$language;?></p>
            <?if($support>=1){?><p><a href="/admin/"><i>Admin</i></a></p><?}?>
        </div>
    </div><?}else{?>
    <div id="user_login">
        <form method="post" action="settings/singin.php" name="user_login_form">
            <p>E-mail:</p> <input type="text" name="auth_login"><br>
            <p>Пароль:</p> <input type="password" name="auth_password"><br>
            <input type="submit" value="Войти" name="auth_submit"><br>
        </form>
        <a href="/singup.php"><button class="user_registration">Регистрация</button></a><br>
        <a href="/settings/forgotten.php" class="user_forgotten">Забыли пароль?</a>
    </div><?}?>
    <div id="list_friends">
        <div class="list_friends_section">
            <ul>
                <a href="friends.php?id=<?echo$id;?>"><li>Все друзья (<?echo$kolvo_userov;?>)</li></a>
                <a href="onlinefriends.php?id=<?echo$id;?>"><li style="border-bottom:2px solid #42aaff;padding-bottom:10px;">Онлайн (0)</li></a>
            </ul>
        </div>
        <div class="list_friends_input">
            <br><input type="text" placeholder="Введите имя или фамилию   <параметры>" class="list_friends_search">
        </div>
        <?
            $result = mysql_query("SELECT * FROM `friends` WHERE (`from_who` = '".$id."' OR `to_who` = '".$id."')");                 
            while($row = mysql_fetch_array($result)) {
            $to_who=$row['to_who'];
            $from_who=$row['from_who'];
            $accepted=$row['accepted'];
            if(($to_who!='' and $accepted==1) or ($from_who!='' and $accepted==1)){
            
        ?>
        <div class="list_friends_profile">
            <?
                if($to_who!=$id){$check_online = mysql_query("SELECT online FROM users WHERE id='$to_who'");
	               $online = mysql_fetch_array($check_online);}
                if($online['online']==1){
            ?>
            <div class="list_friends_profile_avatar">
                <?
                    if($to_who!=$id){$check_online = mysql_query("SELECT avatar FROM users WHERE id='$to_who'");
	                   $avatar = mysql_fetch_array($check_online);}
                    else{$check_online = mysql_query("SELECT avatar FROM users WHERE id='$from_who'");
	                    $avatar = mysql_fetch_array($check_online);
                    }
                ?>
                <a href="/acc.php?id=<?if($to_who!=$id){echo$to_who;}else{echo$from_who;}?>"><img src="<?echo$avatar['avatar'];?>" class="list_friends_profile_avatar_img"></a>
            </div>
            <div class="list_friends_profile_contacts">
                <?
                    if($to_who!=$id){
                    $check_name = mysql_query("SELECT name FROM users WHERE id='$to_who'");
	                $name = mysql_fetch_array($check_name);}
                    else{
                    $check_name = mysql_query("SELECT name FROM users WHERE id='$from_who'");
	                $name = mysql_fetch_array($check_name);}
                
                //фамилия
                    if($to_who!=$id){
                    $check_name = mysql_query("SELECT surname FROM users WHERE id='$to_who'");
	                $sname = mysql_fetch_array($check_name);}
                    else{
                    $check_name = mysql_query("SELECT surname FROM users WHERE id='$from_who'");
	                $sname = mysql_fetch_array($check_name);}
                ?>
                <a href="/acc.php?id=<?if($to_who!=$id){echo$to_who;}else{echo$from_who;}?>"><?echo$name['name'];echo' ';echo$sname['surname'];?></a>
            </div>
            <div class="list_friends_profile_edu">SCHOOL</div>
            <div class="list_friends_profile_write"><a href="/settings/messageto.php?id=<?if($to_who!=$id){echo$to_who;}else{echo$from_who;}?>">Написать сообщение</a></div>
        </div><?}}?>
    </div>
</body>
<?}}?>