<?
    include_once("bd.php");
    $id=$_GET['id'];
    $section = $_GET['section'];
    $act = $_GET['act'];
    include_once("vars.php");
?>
<head>
    <?
      $result = mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'");
        while($row = mysql_fetch_array($result)) {
        $name=$row['name'];
        $surname=$row['surname'];}  
    ?>
    <?
        $res = mysql_query('SELECT COUNT(1) FROM `friends` WHERE f_id = '.$id.' OR u_id = '.$id.'');
        if($res)
        $row = mysql_fetch_array($res, MYSQL_NUM);
        $kolvo_userov = !empty($row[0]) ? $row[0] : 0;
        //check online friends
        $tw = mysql_query("SELECT u_id FROM friends WHERE f_id = ".$id."");$tw1 = mysql_fetch_array($tw);
        $fw = mysql_query("SELECT f_id FROM friends WHERE u_id = ".$id."");$fw1 = mysql_fetch_array($fw);
    ?>
    <title>Друзья <?echo $name;echo" ";echo $surname;?> (<?if($section=='' or $section=='all'){echo$kolvo_userov;}?>) <?if($section=='online'){echo'в сети ';}?></title>
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

if($adm_lvl==3){echo"<body style='background:url(".$bg.") no-repeat #82c4fb;'>";}else{echo"<body style='background:#82c4fb;'>";}
    if($id==0){echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";}else{
        if($section==''){$section='all';}
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
                <a href="/help.php"><li>Помощь</li></a>
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
    <div class="friends_menu">
        <?if($id!=$user_id){?>
        <a href="/acc.php?id=<?echo$id;?>"><div class="friends_menu_upage">
            <div class="friends_menu_upage_avatar"><img src="<?echo$avatar;?>" class="friends_menu_upage_avatar_st"></div>
            <div class="friends_menu_upage_names"><?echo$name;echo" ";echo$surname;?></div>
            <div class="friends_menu_upage_title">Вернуться на страницу</div>
        </div></a>
        <div class="friends_menu_st1">
            <a href="/account/friends.php?id=<?echo$id;?>&section=all"><div class="friends_menu_friends" style="<?if($section=='all' or $section=='online'){?>border-left:2px solid #42aaff;<?}?>">Друзья <?echo$name;?></div></a>
            <a href="/account/friends.php?id=<?echo$id;?>&section=followers"><div class="friends_menu_subs" style="border-bottom: 1px solid #afafaf;<?if($section=='followers'){?>border-left:2px solid #42aaff;<?}?>">Подписчики <?echo$name;?></div>
        </div>
        <div class="friends_menu_st2">
            <a><div class="friends_menu_flists">Списки друзей</div></a>
        </div><?}else{?>
        <div class="friends_menu_st1">
            <a href="/account/friends.php?id=<?echo$user_id;?>&section=all"><div class="friends_menu_friends" style="<?if($section=='all' or $section=='online'){?>border-left:2px solid #42aaff;<?}?>">Мои друзья</div></a>
            <a href="/account/friends.php?id=<?echo$user_id;?>&section=followers"><div class="friends_menu_subs" style="<?if($section=='followers'){?>border-left:2px solid #42aaff;<?}?>">Мои подписчики</div>
            <a href="/account/friends.php?id=<?echo$user_id;?>&act=find"><div class="friends_menu_findf" style="border-bottom: 1px solid #afafaf;<?if($act=='find'){?>border-left:2px solid #42aaff;<?}?>">Найти друзей</div>
        </div>
        <div class="friends_menu_st2">
            <a><div class="friends_menu_flists">Списки друзей</div></a>
        </div>    
        <?}?>
    </div>
    <div id="list_friends">
        <div class="list_friends_section">
            <ul>
                <?if($section=='all' or $section==''){?>
                <a href="/account/friends.php?id=<?echo$id;?>"><li style="border-bottom:2px solid #42aaff;padding-bottom:10px;">Все друзья (<?echo$kolvo_userov;?>)</li></a>
                <a href="/account/friends.php?id=<?echo$id;?>&section=online"><li style="padding-bottom:10px;">Онлайн (0)</li></a>
                <?}elseif($section=='online'){?>
                <a href="/account/friends.php?id=<?echo$id;?>"><li style="padding-bottom:10px;">Все друзья (<?echo$kolvo_userov;?>)</li></a>
                <a href="/account/friends.php?id=<?echo$id;?>&section=online"><li style="border-bottom:2px solid #42aaff;padding-bottom:10px;">Онлайн (0)</li></a>
                <?}elseif($section=='followers'){?><li style="cursor:auto;">Подписчики (0)</li>
                <?}?>
            </ul>
        </div>
        <div class="list_friends_input">
            <br><input type="text" placeholder="Введите имя или фамилию   <параметры>" class="list_friends_search">
        </div>
        <?
            $result = mysql_query("SELECT * FROM `friends` WHERE (`f_id` = '".$id."' OR `u_id` = '".$id."')");                 
            while($row = mysql_fetch_array($result)) {
            $to_who=$row['f_id'];
            $from_who=$row['u_id'];
            if($to_who!='' or $from_who!=''){
            if($section=='all' or $section==''){  
        ?>
        <div class="list_friends_profile">
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

                
                //offical
                if($to_who!=$id){$check_of = mysql_query("SELECT offical FROM users WHERE id='$to_who'");
	                   $offical = mysql_fetch_array($check_of);}
                else{$check_of = mysql_query("SELECT offical FROM users WHERE id='$from_who'");
	                    $offical = mysql_fetch_array($check_of);
                    }
                ?>
                <a href="/acc.php?id=<?if($to_who!=$id){echo$to_who;}else{echo$from_who;}?>"><?echo$name['name'];echo' ';echo$sname['surname'];if($offical['offical']==1){echo"<img src='/img/verif.png' width='18px' height='18px' class'verified' title='Проверенный пользователь' style='margin-left:5px;'>";}?></a>
            </div>
            <div class="list_friends_profile_edu">
               <? 
                    if($to_who!=$id){
                    $check_name = mysql_query("SELECT education FROM users WHERE id='$to_who'");
                    $edu = mysql_fetch_array($check_name);}
                    else{
                    $check_name = mysql_query("SELECT education FROM users WHERE id='$from_who'");
                    $edu = mysql_fetch_array($check_name);}
                ?>
                <a><?if($edu['education']!=''){echo$edu['education'];}else{echo"Неизвестно";}?></a>
            </div>
            <div class="list_friends_profile_sct">
               <? 

                    $check_sc = mysql_query("SELECT section FROM friends WHERE (u_id='$to_who' AND f_id='$from_who') OR 
                    (u_id='$from_who' AND f_id='$to_who')");
                    $sect = mysql_fetch_array($check_sc);
                ?>
                <a>
                    <?
                        if($sect['section']==1){echo"<div><span>Лучшие друзья</span></div>";}
                        elseif($sect['section']==2){echo"<div><span>Семья</span></div>";}
                        elseif($sect['section']==3){echo"<div><span>Коллеги</span></div>";}
                        elseif($sect['section']==4){echo"<div><span>ВУЗ</span></div>";}
                        elseif($sect['section']==5){echo"<div><span>Школьные друзья</span></div>";}
                    ?>
                </a>
            </div>
            <div class="list_friends_profile_write"><a href="/settings/messageto.php?id=<?if($to_who!=$id){echo$to_who;}else{echo$from_who;}?>">Написать сообщение</a></div>
            <?}elseif($section=='online'){?>
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
                //offical
                if($to_who!=$id){$check_of = mysql_query("SELECT offical FROM users WHERE id='$to_who'");
	                   $offical = mysql_fetch_array($check_of);}
                else{$check_of = mysql_query("SELECT offical FROM users WHERE id='$from_who'");
	                    $offical = mysql_fetch_array($check_of);
                    }
                ?>
                <a href="/acc.php?id=<?if($to_who!=$id){echo$to_who;}else{echo$from_who;}?>"><?echo$name['name'];echo' ';echo$sname['surname'];if($offical['offical']==1){echo"<img src='/img/verif.png' width='18px' height='18px' class'verified' title='Проверенный пользователь' style='margin-left:5px;'>";}?></a>
            </div>
            <div class="list_friends_profile_edu">
               <? 
                    if($to_who!=$id){
                    $check_name = mysql_query("SELECT education FROM users WHERE id='$to_who'");
                    $edu = mysql_fetch_array($check_name);}
                    else{
                    $check_name = mysql_query("SELECT education FROM users WHERE id='$from_who'");
                    $edu = mysql_fetch_array($check_name);}
                ?>
                <a><?if($edu['education']!=''){echo$edu['education'];}else{echo"Неизвестно";}?></a>
            </div>
            <div class="list_friends_profile_sct">
               <? 

                    $check_sc = mysql_query("SELECT section FROM friends WHERE (u_id='$to_who' AND f_id='$from_who') OR 
                    (u_id='$from_who' AND f_id='$to_who')");
                    $sect = mysql_fetch_array($check_sc);
                ?>
                <a>
                    <?
                        if($sect['section']==1){echo"<div><span>Лучшие друзья</span></div>";}
                        elseif($sect['section']==2){echo"<div><span>Семья</span></div>";}
                        elseif($sect['section']==3){echo"<div><span>Коллеги</span></div>";}
                        elseif($sect['section']==4){echo"<div><span>ВУЗ</span></div>";}
                        elseif($sect['section']==5){echo"<div><span>Школьные друзья</span></div>";}
                    ?>
                </a>
            </div>
            <div class="list_friends_profile_write"><a href="/settings/messageto.php?id=<?if($to_who!=$id){echo$to_who;}else{echo$from_who;}?>">Написать сообщение</a></div>
            </div>
            <?}?>
        </div>
        <?}}elseif($section=='followers'){
            $result = mysql_query("SELECT * FROM followers WHERE u_id = '".$id."'");                 
            while($row = mysql_fetch_array($result)) {
            $s_id=$row['s_id'];
            $su_id=$row['u_id'];
            if($s_id!=''){?>
        <div class="list_followers_profile">
            <div class="list_friends_profile_avatar">
                <?
                    $s_check_ava = mysql_query("SELECT avatar FROM users WHERE id='".$s_id."'");
	                $savatar = mysql_fetch_array($s_check_ava);
                ?>
                <a href="/acc.php?id=<?echo$s_id;?>"><img src="<?echo$savatar['avatar'];?>" class="list_friends_profile_avatar_img"></a>
            </div>
            <div class="list_followers_profile_contacts">
                <?
                    $scheck_name = mysql_query("SELECT name FROM users WHERE id='$s_id'");
	                $sname = mysql_fetch_array($scheck_name);
                    
                
                //фамилия
                    $sucheck_name = mysql_query("SELECT surname FROM users WHERE id='$s_id'");
	                $suname = mysql_fetch_array($sucheck_name);

                
                //offical
                    $scheck_of = mysql_query("SELECT offical FROM users WHERE id='$s_id'");
	                $soffical = mysql_fetch_array($scheck_of);
                ?>
                <a href="/acc.php?id=<?echo$s_id;?>"><?echo$name['name'];echo' ';echo$sname['surname'];if($offical['offical']==1){echo"<img src='/img/verif.png' width='18px' height='18px' class'verified' title='Проверенный пользователь' style='margin-left:5px;'>";}?></a>
            </div>
        <?}}}elseif($act=='find'){$section='';}?>
    </div>
</body>
<?}}?>
<?if($_COOKIE['language']=="english"){?><script src="/js/eng_translater.js"></script><?}
elseif($_COOKIE['language']=="japanese"){?><script src="/js/jp_translater.js"></script><?}?>