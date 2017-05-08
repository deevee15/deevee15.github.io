<?
    include_once("bd.php");$id=$_GET['id'];include_once("vars.php");
?>
<html>
<head>
<title>Диалоги </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/account.css">
    <link rel="stylesheet" type="text/css" href="/css/newmessages.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/acc_menu.js"></script>
    <script type="text/javascript" src="/js/avatar.js"></script>
    <link rel="ICON" href="/img/1.png" type="image/gif">
</head>
    <?
        $result = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_COOKIE['account']."'");
        while($row = mysql_fetch_array($result)) {
            $support=$row['support'];$ULANG=$row['site_lang'];
            $user_id=$row['id'];
        }
    ?>
<?if($adm_lvl==3){echo"<body style='background:url(".$bg.") no-repeat;'>";}else{echo"<body style='background:#82c4fb;'>";}?>
<?
        $result = mysql_query("SELECT * FROM `banned` WHERE `id` = '".$id."'");
        while($row = mysql_fetch_array($result)) {
            $reason=$row['reason'];
            $bannedid=$row['id'];
            $time=$row['time'];
        }
if($bannedid==$id){echo"<meta http-equiv='Refresh' content='0; URL=/index.php'>";}
elseif($id!=$user_id){echo"<meta http-equiv='Refresh' content='0; URL=/account/messages.php?id=".$user_id."'>";}?>
<?if($_COOKIE['account']==$login){?>
    <div id="header">
        <div class="header_lg"><a href="/" id="header_lg_a"><div class="header_lg_img"></div></a></div>
        <?if($_COOKIE['account']){?><a href="/account/messages.php"><div class="header_nmsg"><div class="header_nmsg_icon"><font class="nmsg_number">+1</font></div></div></a>
        <a href="/account/friends.php?id=<?echo$user_id;?>"><div class="header_nfrd"><div class="header_nfrd_icon"><?if($subs!=0){?><font class="nfrd_number">+<?echo$subs;?></font><?}?></div></div></a><?}?>
        <form id="header_search" method="post" action="">
            <input type="text" name="search_input" class="input_search" placeholder="Поиск" onfocus="if(this.placeholder=='Поиск') {this.placeholder='';}" onblur="if(this.value=='') {this.placeholder='Поиск';}">
        </form>
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
        </div>
    </div>
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
    <div id="messages">
        <input type="text" class="messages_search">
        <div class="messages_select">
            <?
                $result = mysql_query("SELECT * FROM messages WHERE (from_who = '".$user_id."' OR to_who='".$user_id."') GROUP BY from_who, to_who");
                if(mysql_num_rows($result)!=0){
                while($row = mysql_fetch_array($result)) {
                    $f_w=$row['from_who'];
                    $t_w=$row['to_who'];
                    $text=$row['text'];
                    $rd=$row['readed'];
            ?>
            <div class="messages_select_user_avatar">
                
            </div>
            <div class="messages_select_user_names">
                <?
                    if($f_w==$user_id){
                        $m_name = mysql_query("SELECT name FROM users WHERE id='$t_w'");
                        $name = mysql_fetch_array($m_name);
                        $m_sname = mysql_query("SELECT surname FROM users WHERE id='$t_w'");
                        $sname = mysql_fetch_array($m_sname);}
                    else{
                        $m_name = mysql_query("SELECT name FROM users WHERE id='$f_w'");
                        $name = mysql_fetch_array($m_name);
                        $m_sname = mysql_query("SELECT surname FROM users WHERE id='$f_w'");
                        $sname = mysql_fetch_array($m_sname);}
                ?>
                <p><?echo$name['name'];echo" ";echo$sname['surname']?></p>
            </div>
            <div class="messages_select_user_msgtext"></div>
            <?}}?>
        </div>
    </div>
    </body>
<?}?>
<?if($_COOKIE['language']=="english"){?><script src="/js/eng_translater.js"></script><?}
elseif($_COOKIE['language']=="japanese"){?><script src="/js/jp_translater.js"></script><?}?>