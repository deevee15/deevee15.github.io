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
    <title>Сообщения</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/messages.css">
    <link rel="stylesheet" type="text/css" href="/css/account.css">
    
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
        $support=$row['support'];$ULANG=$row['site_lang'];
    }
?>
<body>
    <?if($id==0){echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";}else{?>
    <div id="header">
        <div class="header_lg"><a href="/" id="header_lg_a"><div class="header_lg_img"></div></a></div>
        <a href="/account/messages.php"><div class="header_nmsg"><div class="header_nmsg_icon"><font class="nmsg_number">+1</font></div></div></a>
        <a href="/account/friends.php"><div class="header_nfrd"><div class="header_nfrd_icon"><font class="nfrd_number">+1</font></div></div></a>
        <form id="header_search" method="post" action="search.php">
            <input type="text" name="search_input" class="input_search" placeholder="Поиск" onfocus="if(this.placeholder=='Поиск') {this.placeholder='';}" onblur="if(this.value=='') {this.placeholder='Поиск';}">
        </form>
        <?if($support>=1){?><a href="/admin/"><div class="header_admin">Пользователи</div></a><?}?>
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
                <a href="/account/settings.php"><li>Настройки</li></a>
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
        <div id="mslider">
            <div id="lines"></div>
        </div>
        <ul class="menu_ul_a_li">
            <a href="/acc.php?id=<?echo$id;?>"><li>Профиль <div class="profile_icon"></div></li></a>
            <a href="/account/messages.php?id=<?echo$id;?>"><li>Сообщения <div class="msg_icon"></div></li></a>
            <a href="/account/friends.php?id=<?echo$id;?>"><li>Друзья <div class="friends_icon"></div></li></a>
            <a href="/account/photos.php?id=<?echo$id;?>"><li>Фотографии <div class="photos_icon"></div></li></a>
        </ul>
        <div class="menu_settings">
            <?if($ULANG==1){$language="<img src='/img/flags/1.gif' width='16px' height='12px'> русский";}
                else if($ULANG==2){$language="<img src='/img/flags/2.gif' width='16px' height='12px'> english";}
                else if($ULANG==3){$language="<img src='/img/flags/3.gif' width='16px' height='13px'> 日本語";}
            ?>
            <p><a href="/about.php">О нас</a></p>
            <p><a href="/account/settings.php?id=<?echo$user_id;?>&st=4">Донат</a></p>
            <p>Язык: <?echo$language;?></p>
        </div>
    </div>
    <div id="messages">
        <div class="messages_dialog_left">
               <? 
                    $result = mysql_query("SELECT * FROM `messages` WHERE (`from_who` = '".$id."' OR `to_who` = '".$id."')");             while($row = mysql_fetch_array($result)) {
                        $to_who=$row['to_who'];
                        $from_who=$row['from_who'];
                        $text=$row['text'];
                        $date=$row['date'];
                        $readed=$row['readed'];
                        if(($to_who!='' and $from_who==$id) or (from_who!='' and $to_who==$id)){
                ?>
                <div class="messages_dialog_avatar">
                    <?
                        if($to_who!=$id){$check_online = mysql_query("SELECT avatar FROM users WHERE id='$to_who'");
                           $avatar = mysql_fetch_array($check_online);}
                        else{$check_online = mysql_query("SELECT avatar FROM users WHERE id='$from_who'");
                            $avatar = mysql_fetch_array($check_online);
                        }
                    ?>
                    <a href="/acc.php?id=<?if($to_who!=$id){echo$to_who;}else{echo$from_who;}?>"><img src="<?echo$avatar['avatar'];?>" class="messages_dialog_avatar_img"></a>
                </div>
                <div class="messages_dialog_names">
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
                <div class="messages_dialog_lastmsg">
                    <?
                        if($to_who==$id and $from_who!=$id){echo$text;}
                        elseif($to_who!=$id and $from_who==$id){echo$text;}
                    ?>
                </div>
            <?}}?>
        </div>
    </div>
</body>
<?}}?>