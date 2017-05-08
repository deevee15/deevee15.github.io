<?
    include_once("bd.php");$id=$_GET['id'];include_once("vars.php");$st=$_GET['st'];
?>
<head>
<title>Настройки аккаунта</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/account.css">
    <link rel="stylesheet" type="text/css" href="/css/settings.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/acc_menu.js"></script>
    <script type="text/javascript" src="/js/slider_menu.js"></script>
    <script type="text/javascript" src="/js/avatar.js"></script>
    <script type="text/javascript" src="/js/donate.js"></script>
    <script type="text/javascript" src="/js/changepass.js"></script>
    <script type="text/javascript" src="/js/lang-modal.js"></script>
    <link rel="ICON" href="/img/1.png" type="image/gif">
</head>
    <?
        $result = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_COOKIE['account']."'");
        while($row = mysql_fetch_array($result)) {
            $support=$row['support'];
            $user_id=$row['id'];$ULANG=$row['site_lang'];
        }
    ?>
<?if($adm_lvl==3){echo"<body style='background:url(".$bg.") no-repeat #82c4fb;'>";}else{echo"<body style='background:#82c4fb;'>";}?>
    <?
        $result = mysql_query("SELECT * FROM `banned` WHERE `id` = '".$id."'");
        while($row = mysql_fetch_array($result)) {
            $reason=$row['reason'];
            $bannedid=$row['id'];
            $time=$row['time'];
        }
    if($bannedid==$id){echo"<meta http-equiv='Refresh' content='0; URL=/index.php'>";}?>
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
                <a href="/"><li style="border-bottom:1px solid #afafaf;" class="hd_acc_st_pr">Мой профиль</li></a>
                <a href="/account/edit.php?id=<?echo$id;?>"><li style="margin-top:3px;" class="hd_acc_st_ed">Редактирование</li></a>
                <a href="/account/settings.php?id=<?echo$id;?>&st=1"><li class="hd_acc_st_st">Настройки</li></a>
                <a href="/help.php"><li class="hd_acc_st_hp">Помощь</li></a>
                <a href="/account/exit.php"><li style="border-top:1px solid #afafaf; margin-top:3px;" class="hd_acc_st_ex">Выйти</li></a>
            </ul>
        </div><?}else{?>
        <div class="header_enter">
            <div class="photo_user"><p>Войти</p> <img src="img/default_user.png" width="40px" height="40px"></div>
            <ul class="settings">
                <a href="singup.php"><li>Регистрация</li></a>
                <a href="/"><li>Вход</li></a>
                <a href="rules.php"><li>Правила пользования</li></a>
            </ul>
        </div>
        <?}?>
    </div>
    <?if(!empty($_COOKIE['account']) and $id=$user_id){?>
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
    <div id="settings">
        <div class="settings_title">
            <?
                if($_COOKIE['language']=="russian"){
                if($st==0){$settings="Основные";}
                elseif($st==1){$settings="Основные";}elseif($st==2){$settings="Безопасность";}
                elseif($st==3){$settings="Валюта";}elseif($st==4){$settings="Опыт";}}
                if($_COOKIE['language']=="english"){
                if($st==0){$settings="Main";}
                elseif($st==1){$settings="Main";}elseif($st==2){$settings="Security";}
                elseif($st==3){$settings="Currency";}elseif($st==4){$settings="Experience";}}
                echo$settings;
            ?>
        </div>
        <div class="settings_content">
            <?if($st==1 or $st==0){?>
            <div class="content_password">
                <a>
                    <font>Пароль</font>: <span style="margin-left:185px;" class="change_pass"><?$password = $pass;$password = substr_replace($password,'*******',strlen($password)-strlen($password));echo$password;?></span>
                    <span class="change_sett">
                    <form action="/settings/changepass.php?id=<?echo$id;?>" method="post">
                        <input type="password" placeholder="Ваш старый пароль" name="u_oldpass"><br>
                        <input type="password" placeholder="Ваш новый пароль" name="u_newpass"><br>
                        <input type="password" placeholder="Подтвердите новый пароль" name="u_repass"><br>
                        <input type="submit" value="Сохранить">
                    </form></span>
                </a>
            </div>
            <div class="content_mail">
                <a><font>Почта</font>: <span style="margin-left:194px;"><?echo$login;?></span></a>
            </div>
            <div class="content_lang">
                <?
                    if($slg=='russian'){$u_lang="Русский";}
                    elseif($slg=='english'){$u_lang="English";}
                    elseif($slg=='japanese'){$u_lang="日本語";}
                    elseif($slg=='deutsch'){$u_lang="German";}
                    elseif($slg=='french'){$u_lang="French";}
                ?>
                <a><font>Язык</font>: <span><?echo$u_lang;?></span></a>
            </div><?}elseif($st==4){?>
            <div class="content_exp">
                Опыт - показатель универсальности пользователя.
                Показатель его активности и вклада в проект.<br>
                Пожалуйста,ознакомьтесь с правилами прежде чем пожертвовать дабы избежать неизбежных последствий.
                <h4>1 руб = +1 к опыту.</h4>
                <button class="topup_balance">Пополнить</button>
            </div>
            <?}?>
        </div>
    </div>
    <div id="select_type">
        <ul>
            <?
            if($st==0 or $st==1){
                echo'<a href="/account/settings.php?id='.$id.'&st=1"><li style="border-left:2px solid #42aaff;background:#82c4fb;">Основные</li></a>
                <a href="/account/settings.php?id='.$id.'&st=2"><li>Безопасность</li></a>
                <a href="/account/settings.php?id='.$id.'&st=3"><li>Валюта</li></a>
                <a href="/account/settings.php?id='.$id.'&st=4"><li>Опыт</li></a>';
            }
            elseif($st==2){
                echo'<a href="/account/settings.php?id='.$id.'&st=1"><li>Основные</li></a>
                <a href="/account/settings.php?id='.$id.'&st=2"><li style="border-left:2px solid #42aaff;background:#82c4fb;">Безопасность</li></a>
                <a href="/account/settings.php?id='.$id.'&st=3"><li>Валюта</li></a>
                <a href="/account/settings.php?id='.$id.'&st=4"><li>Опыт</li></a>';
            }
            elseif($st==3){
                echo'<a href="/account/settings.php?id='.$id.'&st=1"><li>Основные</li></a>
                <a href="/account/settings.php?id='.$id.'&st=2"><li>Безопасность</li></a>
                <a href="/account/settings.php?id='.$id.'&st=3"><li style="border-left:2px solid #42aaff;background:#82c4fb;">Валюта</li></a>
                <a href="/account/settings.php?id='.$id.'&st=4"><li>Опыт</li></a>';
            }
            elseif($st==4){
                echo'<a href="/account/settings.php?id='.$id.'&st=1"><li>Основные</li></a>
                <a href="/account/settings.php?id='.$id.'&st=2"><li>Безопасность</li></a>
                <a href="/account/settings.php?id='.$id.'&st=3"><li>Валюта</li></a>
                <a href="/account/settings.php?id='.$id.'&st=4"><li style="border-left:2px solid #42aaff;background:#82c4fb;">Опыт</li></a>';
            }
            ?>
        </ul>
    </div>
    <div id="modal">
        <form method="post" action="/settings/donate.php?id=<?echo$id;?>" class="donate_form">
            <div class="donate_text">Введите,насколько вы хотите увеличить опыт</div>
            <input type="text" name="input_donate" class="input_donate">
            <p class="summa_donate">Итого: 0</p>
            <input type="submit" value="Пополнить" class="msg_button">
            <a href=""><div class="donate_close"></div></a>
        </form>
    </div>
    <?}}?>
    <!--Модальные окна!-->
    <div id="modal_language">
        <div class="modal_lg_list">
            <p>Выберите ваш язык:</p>
            <ul>
                <a href="/settings/setlang.php?id=<?echo$id?>&lg=1"><li><img src='/img/flags/1.gif' width='38px' height='30px'> <span>Russian</span></li></a>
                <a href="/settings/setlang.php?id=<?echo$id?>&lg=2"><li><img src='/img/flags/2.gif' width='38px' height='30px'> <span>English</span></li></a>
                <a href="/settings/setlang.php?id=<?echo$id?>&lg=3"><li><img src='/img/flags/3.gif' width='38px' height='30px'> <span>Japanese</span></li></a>
                <a href="/settings/setlang.php?id=<?echo$id?>&lg=4"><li><img src='/img/flags/4.gif' width='38px' height='30px'> <span>German</span></li></a>
                <a href="/settings/setlang.php?id=<?echo$id?>&lg=5"><li><img src='/img/flags/5.gif' width='38px' height='30px'> <span>French</span></li></a>
            </ul>
            <a href=""><div class="modal_lg_close"></div></a>
        </div>
    </div>
</body>
<?if($_COOKIE['language']=="english"){?><script src="/js/eng_translater.js"></script><?}
elseif($_COOKIE['language']=="japanese"){?><script src="/js/jp_translater.js"></script><?}?>