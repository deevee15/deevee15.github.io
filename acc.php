<?
    include_once("bd.php");$id=$_GET['id'];include_once("vars.php");include_once("exp.php");include_once("devices.php");
    include_once("getlang.php");
?>
<head>
    <title><?echo $name;echo" ";echo $surname;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/account.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/acc_menu.js"></script>
    <script type="text/javascript" src="/js/menu.js"></script>
    <script type="text/javascript" src="/js/slider_menu.js"></script>
    <script type="text/javascript" src="/js/exp.js"></script>
    <script type="text/javascript" src="/js/amenu.js"></script>
    <script type="text/javascript" src="/js/friends_menu.js"></script>
    <script type="text/javascript" src="/js/newwmenu.js"></script>
    <script type="text/javascript" src="/js/modal.js"></script>
    <script type="text/javascript" src="/js/modal_followers.js"></script>
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
<?if($adm_lvl==3){echo"<body style='background:url(".$bg.") no-repeat #82c4fb;'>";}else{echo"<body style='background:#82c4fb;'>";}?>
    <script type="text/javascript">
        $(window).width(); //Ширина браузера
        $(window).height();
    </script>
    <?if($mobile==1){echo"<meta http-equiv='Refresh' content='0; URL=/mobile/'>";}else{?>
    <?
        if($id==0){echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";}else{
        $ip=$_SERVER['REMOTE_ADDR'];
        //if($ip!=$user_ip){
            //echo "<meta http-equiv='Refresh' content='0; URL=/security.php?id=".$user_id."'>";
        //}
    ?>
    <div id="header">
        <?
            $res = mysql_query('SELECT COUNT(1) FROM `followers` WHERE u_id = '.$user_id.'');
            if($res)
            $row = mysql_fetch_array($res, MYSQL_NUM);
            $subs = !empty($row[0]) ? $row[0] : 0;  
        ?>
        <div class="header_lg"><a href="/" id="header_lg_a"><div class="header_lg_img"></div></a></div>
        <?if($_COOKIE['account']){?><a href="/account/messages.php"><div class="header_nmsg"><div class="header_nmsg_icon"><font class="nmsg_number">+1</font></div></div></a>
        <a href="/account/friends.php?id=<?echo$user_id;?>"><div class="header_nfrd"><div class="header_nfrd_icon"><?if($subs!=0){?><font class="nfrd_number">+<?echo$subs;?></font><?}?></div></div></a><?}?>
        <form id="header_search" method="post" action="/account/searching.php">
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
    <?
        $result = mysql_query("SELECT * FROM `banned` WHERE `id` = '".$id."'");
        while($row = mysql_fetch_array($result)) {
            $reason=$row['reason'];
            $bannedid=$row['id'];
            $time=$row['time'];
        }
        if($bannedid==$id){?>
        <div id="profile">
            <div class="profile_avatar">
            <div class="profile_avatar_left" onselectstart="return false" onmousedown="return false">
                <div class="profile_ava"><img src="/img/banned.png" width="200px" height="200px" class="profile_ava_img"></div>
            </div>
            </div>
            <div class="blocked_inf">
                <div class="profile_inf_name" style="margin-left:10px;margin-top:10px;"><?echo $name;echo" ";echo $surname;echo" ";if($of==1){echo"<img src='/img/verif.png' width='20px' height='20px' class'verified' title='Проверенный пользователь'>";}?></div>
                 <?if($online==1){?>
                <div class="profile_inf_online" style="color: #939393; font-size:14px;">Online</div><?}else{?>
                <div class="profile_inf_offline" style="color: #939393; font-size:14px;">Заходил(а) <?echo $llogin;?></div>
                <?}?>
                <div class="profile_inf_says"><p class="profile_user_says">Страница заблокирована</p></div>
                <div class="blocked_inf_reason">
                    <?
                        if($reason==1){echo"Страница заблокирована по причине финансовых махинаций на сайте.Разблокировке не подлежит.";}
                        elseif($reason==2){echo"Страница заблокирована по причине подозрения во взломе.Разблокировка через: ".$time." ";}
                        elseif($reason==3){echo"Страница заблокирована по причине массового оскорбления пользователей.Разблокировка через: ".$time."";}
                        elseif($reason==4){echo"Неприемлемый материал на странице.Разблокировке не подлежит.";}
                        elseif($reason==5){echo"Данный пользователь создал страницу под чужим именем.Разблокировке не подлежит.";}
                    ?>
                </div>
            </div>
            <?if($_COOKIE['account']==$login){?>
            <div class="buser_info">
                <?if($time==0){?>Ваш аккаунт заблокирован навсегда.Впредь будьте осторожны.Ваша почта: <?echo$login;}else{?>
                >Ваш аккаунт заблокирован до <?echo$time;?>.Впредь будьте осторожны.Ваша почта: <?echo$login;}?><br>
                <a href="/account/exit.php"><button class="blocked_button">Выйти</button></a>
            </div>
            <?}?>
        </div>
        <?}else{
        $result = mysql_query("SELECT * FROM `banned` WHERE `id` = '".$user_id."'");
        while($row = mysql_fetch_array($result)) {
            $ureason=$row['reason'];
            $ubannedid=$row['id'];
            $utime=$row['time'];
        }
    if(!empty($_COOKIE['account']) and $ubannedid!=$user_id){?>
    <?
        if($user_ava==''){
        $query = "UPDATE users SET avatar='/img/avatar.png' WHERE email = '".$_COOKIE['account']."'";
        $result = mysql_query($query) or die(mysql_error());;}                                              
    ?>
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
            <p class="user_login_form_pass_p">Пароль:</p> <input type="password" name="auth_password"><br>
            <input type="submit" value="Войти" name="auth_submit" class="auth_submit" style="cursor:pointer;"><br>
        </form>
        <a href="/singup.php"><button class="user_registration" style="cursor:pointer;">Регистрация</button></a><br>
        <a href="/settings/forgotten.php" class="user_forgotten">Забыли пароль?</a>
    </div><?}?>
    <div id="profile">
        <div class="profile_avatar">
            <div class="profile_avatar_left">
            <div class="profile_ava" onselectstart="return false" onmousedown="return false"><a href="<?echo $avatar;?>"><img src="<?echo $avatar;?>" class="profile_ava_img"></a></div>
            <div class="experience">
                <?
                    if($exp<2500){?>
                        <?echo '<div id="percent1" style="width: '.$exp.'; max-width:250px;"></div><div class="experience_line" style="background:#3c9dec;"><font style="position:relavite;">'.$exp.'</font><font class="e_text"> опыта</font></div>';
                    }
                    else if($exp>=2500 and $exp<=25000){
                        echo '<div id="percent" style="width: calc('.$exp.'px/100); max-width:250px;"></div><div class="experience_line" style="background:#ff0000;"><font>'.$exp.'</font><font class="e_text"> опыта</font></div>';
                    }
                    else if($exp>=25000 and $exp<=250000){
                        echo '<div id="percent3" style="width: calc('.$exp.'px/1000); max-width:250px;"></div><div class="experience_line" style="background:#b0b7c6;"><font>'.$exp.'</font><font class="e_text"> опыта</font></div>';
                    }
                    else if($exp>=250000){
                        echo '<div id="percent2" style="width: calc('.$exp.'px/10000); max-width:250px;"></div><div class="experience_line" style="background:#ffc014;"><font>'.$exp.'</font><font class="e_text"> опыта</font></div>';
                    }
                ?>
            <div class="what"><p class="exp_info">Универсальный индикатор активности пользователя.Чем выше - тем активнее.</p></div>
            </div>
                <?
                    $result = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_COOKIE['account']."'");
                    while($row = mysql_fetch_array($result)) {$acc_id=$row['id'];}
                ?>
            <?if($_COOKIE['account']==$login){?>
            <link rel="stylesheet" type="text/css" href="/css/acc_dop.css">
            <?if($e_status!=0){echo'<link rel="stylesheet" type="text/css" href="/css/acc_dop2.css">';}?>
            <div class="profile_b_edit">
                <a href="/account/edit.php?id=<?echo$id;?>" id="edit_a"><button class="button_edit">Редактировать</button></a>
            </div><?}else{?>
            <link rel="stylesheet" type="text/css" href="/css/acc_dop1.css">
            <?if($_COOKIE['account']){?>
            <a href="#modal" class="a_write_message"><button class="write_message">Написать сообщение</button></a>
            <?
                    $result = mysql_query("SELECT * FROM `followers`");
                    while($row = mysql_fetch_array($result)) {
                        $s_id=$row['s_id'];
                        $su_id=$row['u_id'];
                        if($s_id==$user_id and $su_id==$id){
                                echo '<button class="add_frienddd subscribed"><div class="friends_moves">
                                <ul class="subscriber_moves_list">
                                    <a href="/account/unsub.php?id=<??>"><li>Отменить заявку</li></a>
                                    <a href="/account/frmsg.php?id=<??>"><li>Написать</li></a>
                                </ul>
                                </div> Заявка отправлена</button>';
                                $friend=1;
                        }
                        else if($su_id==$user_id and $s_id==$id){
                            echo '<button class="add_friendd subscribed"><div class="friends_moves">
                            <ul class="subscriber_moves_list">
                                <a href="/account/unsub.php?id='.$id.'"><li>Подтвердить</li></a>
                                <a href="/account/frmsg.php?id='.$id.'"><li>Заблокировать</li></a>
                            </ul>
                            </div> '.$name.' подписан(a) на вас</button><button class="other_moves">...</button>';
                            $friend=4;
                        }
                    }
                    $result = mysql_query("SELECT * FROM `friends`");
                    while($row = mysql_fetch_array($result)) {
                        $f_id=$row['f_id'];
                        $fu_id=$row['u_id'];
                        if(($f_id==$user_id and $fu_id==$id) or ($fu_id==$user_id and $f_id==$id)){
                            echo '<button class="add_friendd friended"><div class="friends_moves">
                            <ul class="friends_moves_list">
                                <a href="/account/mutualfr.php?id='.$id.'"><li>Общие друзья</li></a>
                                <a href="/account/delfr.php?id='.$id.'"><li>Удалить из друзей</li></a>
                            </ul>
                            </div> <font class="friended_text">У вас в друзьях</font></button><button class="other_moves">...</button>';
                            $friend=2;
                        }
                    }
                if($friend==0){echo '<a href="/settings/addfriend.php?id='.$id.'"><button class="add_friend">Добавить в друзья</button></a>';}
            ?>
            <?}else{echo"<div class='user_notauthed'><span>Зарегистрируйтесь,чтобы добавить или написать</span> ".$name. " ".$surname." </div>";}}?>
        </div></div>
        <div class="profile_inf">
            <div class="profile_inf_name" style="margin-left:10px;margin-top:10px;"><?echo $name;echo" ";echo $surname;echo" ";if($of==1){echo"<img src='/img/verif.png' width='20px' height='20px' class'verified' title='Проверенный пользователь'>";}?></div>
             <?if($online==1){?>
            <div class="profile_inf_online" style="color: #939393; font-size:14px;">Online</div><?}else{?>
            <div class="profile_inf_offline" style="color: #939393; font-size:14px;"><font class="user_status_off">Заходил(а)</font> <?echo $llogin;?></div>
            <?}?>
            <?if($sz!=''){?><div class="profile_inf_says"><?if($login==$_COOKIE['account']){?><script type="text/javascript" src="/js/says.js"></script><form action="settings/changesz.php" method="post"><input type="text" name="sz_input" class="sz_input" value="<?echo$sz;?>"></form><?}?><p class="profile_user_says"><?echo$sz;?></p></div><?}else if($sz=='' and $login==$_COOKIE['account']){?><div class="profile_inf_says"><form action="settings/changesz.php" method="post"><input type="text" name="sz_input" class="sz_input" value=""></form><p class="profile_user_says">Установить статус</p></div><?}
            if($login==$_COOKIE['account']){
            ?>
            <div class="sz_decline"></div><?}else{?>
            <div class="sz_decline" style="display:none;"></div>
            <?}?>
            <div class="profile_inf_other">
                <ul>
                    <li style="margin-top:10px;"><font class="inf_birth">День рождения</font>: <a style="margin-top:-10px;"><?echo $b_day;echo" ";echo $b_month;echo", ";echo $b_year;?></a></li>
                    <li><font class="inf_city">Город</font>: <a style="margin-top:-10px;"><?if($city==''){echo"Неизвестно";}else{echo$city;}?></a></li>
                    <li><font class="inf_site">Веб-сайт</font>: <a style="margin-top:-10px;" href="<?if($site!=''){?>http://<?echo$site;}?>"><?if($site==''){echo"none";}else{echo"http://";echo$site;}?></a></li>
                    <?
                        if($_COOKIE['account']!=$login){echo'<script type="text/javascript" src="/js/info.js"></script>';}
                        else{echo'<script type="text/javascript" src="/js/info1.js"></script>';}
                    ?>
                    <li class="inf_show" onselectstart="return false" onmousedown="return false"><p>Показать остальное</p></li>
                    <li style="margin-top:10px;" class="inf_edu"><font class="inf_edu_ttl">Образование</font>: <a style="margin-top:-10px;"><?if($edu==''){echo"Неизвестно";}else{echo$edu;}?></a></li>
                    <li style="margin-top:10px;" class="inf_about"><font class="inf_ab_ttl">О себе</font>: <p style="margin-top:-10px;width:200px;max-height:100px;"><?if($about==''){echo"Пусто";}else{echo$about;}?></p></li>
                </ul>
            </div>
            <?
            $res = mysql_query('SELECT COUNT(1) FROM `friends` WHERE f_id = '.$id.' OR u_id = '.$id.'');
            if($res)
            $row = mysql_fetch_array($res, MYSQL_NUM);
            $hisfriends = !empty($row[0]) ? $row[0] : 0;  
            ?>
            <div class="profile_stats">
            <ul>
                <a href="/account/friends.php?id=<?echo$id;?>"><li><?echo$hisfriends;?> <br><font class="value_offr">друзья</font></li></a>
                <?
                    $res = mysql_query('SELECT COUNT(1) FROM `followers` WHERE u_id = '.$id.'');
                    if($res)
                    $row = mysql_fetch_array($res, MYSQL_NUM);
                    $hisfollowers = !empty($row[0]) ? $row[0] : 0;  
                ?>
                <li><a class="followers"><?echo$hisfollowers;?> <br><font>подписчики</font></a></li>
                <?
                    $res = mysql_query('SELECT COUNT(1) FROM `photos` WHERE `u_id` = '.$id.'');
                    if($res)
                    $row = mysql_fetch_array($res, MYSQL_NUM);
                    $hisphotos = !empty($row[0]) ? $row[0] : 0;  
                ?>
                <a href="/account/photos.php?id=<?echo$id;?>"><li><?$u_photos = $hisphotos + 1;echo$u_photos;?> <br><font class="value_ofph">фото</font></li></a>
            </ul>
            </div>
            <div class="profile_wall">
                <?if($_COOKIE['account']==$login){?><div class="profile_wall_write">
                    <a href="/acc.php?id=<?echo$user_id;?>"><img src="<?echo$avatar;?>" height="28px" width="28px" style="border-radius:14px;"></a>
                    <form method="post" action="settings/writing.php?id=<?echo$user_id;?>">
                        <textarea name="post_name" class="profile_wall_write_input" onfocus="this.style='border-bottom:1px solid #42aaff;'" onblur="this.style='border-bottom:1px solid #d1d1d1;'" placeholder="Есть ли что-то интересное?"></textarea>
                        <input type="file" class="input_file file_img" name="profile_wall_img" accept=".png,.ico,.jpg,.jpeg,.bmp,.gif">
                        <input type="file" class="input_file file_video" name="profile_wall_video" style="margin-left:-10px;margin-top:10px;position:absolute;" accept=".mp4,.avi,.mov,.wmv">
                        <input type="file" class="input_file file_audio" name="profile_wall_audio" style="margin-left:18px;margin-top:9px;position:absolute;" accept=".mp3,.ogg,.wav,.3gp">
                        <input type="submit" class="msg_button" value="Написать" style="margin-top:10px;margin-left:150px;">
                    </form>
                </div><?}?>
            </div>
        </div>
        <?if($_COOKIE['account']==$login){echo'<link rel="stylesheet" type="text/css" href="/css/wall.css">';}else{echo'<link rel="stylesheet" type="text/css" href="/css/wall1.css">';}?>
        <div class="profile_wall_show">
                <?
                    $result = mysql_query("SELECT * FROM `wall` WHERE `user` = '".$id."' ORDER BY id DESC");
                    if(mysql_num_rows($result)==0){echo"Нет записей";}
                    while($row = mysql_fetch_array($result)) {
                        $w_text=$row['text'];
                        $w_date=$row['w_date'];
                ?>
            <div class="wall_show_avatar"><a href="/acc.php?id=<?echo$id;?>"><img src="<?echo$avatar;?>" height="50px" width="50px" style="border-radius:25px;"></a></div>
            <div class="wall_show">
                <div class="wall_show_user"><a href="/acc.php?id=<?echo$id;?>"><?echo$name;echo" ";echo$surname;?></a></div>
                <div class="wall_show_date"><?echo$w_date;?></div>
                <div class="wall_show_text"><?echo$w_text;?></div>
                <p class="wall_param" onselectstart="return false" onmousedown="return false">...</p>
            </div>
            <?if($_COOKIE['account']){?><ul class="wall_buttons">
                <li class="w_b_like"><div class="w_b_like_img"></div><p>Мне нравится</p></li>
                <li class="w_b_comment"><div class="w_b_comment_img"></div><p>Комментировать</p></li>
                <li class="w_b_repost"><div class="w_b_repost_img"></div></li>
            </ul><?}?>
            <?}?>
        </div>
    </div>
    <div id="modal">
            <form method="post" action="/settings/messageto.php?id=<?echo$id;?>" class="modal_form">
                <div class="modal_title">Новое сообщение</div>
                <div class="modal_user">
                    <div class="user_information">
                        <div class="modal_user_avatar"><a href="/acc.php?id=<?echo$id;?>"><img src="<?echo$avatar;?>" width="50px" height="50px" class="modal_user_avatar"></a></div>
                        <div class="modal_user_name" style="color:#42aaff;"><a href="/acc.php?id=<?echo$id;?>"><?echo$name;echo" ";echo$surname;?></a></div>
                        <div class="modal_user_online">
                            <?if($online==1){?>
                            <p>Online</p><?}else{?>
                            <p><font class="user_status_off">Заходил(а)</font> <?echo $llogin;?></p><?}?>
                        </div>
                        <div class="modal_user_dialogs"><a href="/account/messages.php?id=<?echo$user_id;?>">Перейти ко всем сообщениям</a></div>
                    </div>
                </div>
                <textarea cols="60" rows="5" name="text" class="msg_text" required></textarea>
                <input type="submit" value="Отправить" class="msg_button">
                <a href=""><div class="modal_close"></div></a>
            </form>
    </div>
    <div id="modal_fl">
        <div id="followers">
            <div class="followers_buttons">
                <ul>
                    <li style="position:absolute;"><span style="border-bottom:2px solid #008cff;padding-bottom:7px;">Подписчики  <font style="color:#0169be;"><?echo$hisfollowers;?></font></span></li>
                    <li class="followers_buttons_friend"><span style="padding-bottom:7px;">Друзья  <font style="color:#0169be;"><?echo$hisfriends;?></font></span></li>
                    <a href=""><div class="followers_close"></div></a>
                </ul>
            </div>
            <?
                    $result = mysql_query("SELECT * FROM followers WHERE u_id = '".$id."'");  
                    while($row = mysql_fetch_array($result)) {
                    $followers_sid=$row['s_id'];
                    $followers_uid=$row['u_id'];
            ?>
            <div class="followers_list">
               <div>
                    <p class="followers_list_names">
                        <?
                                $check_online = mysql_query("SELECT name FROM users WHERE id='$followers_sid'");
                                $name = mysql_fetch_array($check_online);
                                $check_name = mysql_query("SELECT surname FROM users WHERE id='$followers_sid'");
                                $sname = mysql_fetch_array($check_name);

                        ?>
                        <a href="/acc.php?id=<?echo$followers_sid;?>"><?echo$name['name'];echo' ';echo$sname['surname'];?></a>
                    </p>
                    <p>
                        <?
                                $check_online = mysql_query("SELECT avatar FROM users WHERE id='$followers_sid'");
                                $avatar = mysql_fetch_array($check_online);
                        ?>
                        <a href="/acc.php?id=<?echo$followers_sid;?>"><img src="<?echo$avatar['avatar'];?>" width="100px" height="100px" class="follower_avatar"></a>
                    </p>
               </div>
            </div><?}?>
        </div>
    </div>
    <?if($user_email_status!=1 and $_COOKIE['account']!=''){?>
    <div class="set_email">
        <span>У вас не подтверждён e-mail!</span><br>
        <a href="/settings/activate.php?code=<?echo$acode;?>"><button class="set_email_accept">Подтвердить</button></a>
    </div>
    <?}}}}?>
</body>
<?if($_COOKIE['language']=="english"){?><script src="/js/eng_translater.js"></script><?}
elseif($_COOKIE['language']=="japanese"){?><script src="/js/jp_translater.js"></script><?}?>