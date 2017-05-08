<?
    include_once("bd.php");$res=$_POST['search_input'];;include_once("vars.php");
?>
<head>
    <title>Поиск по результату <?echo$res;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/account.css">
    <link rel="stylesheet" type="text/css" href="/css/search.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/acc_menu.js"></script>
    <script type="text/javascript" src="/js/menu.js"></script>
    <link rel="ICON" href="/img/1.png" type="image/gif">
</head>
<body>
    <?
        if($res==''){echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";}else{
        $ip=$_SERVER['REMOTE_ADDR'];
    ?>
    <div id="header">
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
    <div id="results">
        <div class="results_title">Результаты поиска</div>
        <div class="results_itemsearch"><input type="text" value="<?echo$res;?>"></div>
        <div class="results_people">
            Люди <font>4324</font> <a href="/account/searching.php?result=<?echo$res;?>&type=2">Показать всех</a>
        </div>
        <div class="results_music">
            Музыка <font>4324</font> <a href="/account/searching.php?result=<?echo$res;?>&type=3">Показать всех</a>
        </div>
    </div>
<?}?>