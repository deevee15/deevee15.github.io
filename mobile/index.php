<?php
    include_once("bd.php");
?>
<html>
<head>
    <title>Social</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="/mobile/css/newmain.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/singin.js"></script>
    <script type="text/javascript" src="/js/menu.js"></script>
    <script type="text/javascript" src="/js/loginreg.js"></script>
    <link rel="ICON" href="/img/1.png" type="image/gif">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
</head>
<body>
    <?if(empty($_COOKIE['account'])){?>
    <div id="header">
        <div class="header_lg"><a href="/" id="header_lg_a"><div class="header_lg_img"></div></a></div>
    </div>
    <div id="content">
        <div class="content_login">
            <form method="post" action="/settings/singin.php">
                <p>Оставайтесь в сети даже на расстоянии от компьютера.</p>
                <span class="span_login">E-mail или телефон:</span><br>
                <input type="text" name="auth_login" class="login_mail"><br>
                <span class="span_pass">Пароль:</span><br>
                <input type="password" name="auth_password" class="login_pass"><br>
                <input type="submit" value="Вход" class="login_sbmt">
            </form>
            <a href="/settings/forgotten.php" style="margin-top:10px;">Забыли пароль?</a>
        </div>
        <div class="content_registration">
            <p>У вас ещё нет аккаунта?!</p>
            <a href="/mobile/singup.php"><button>Зарегистрироваться</button></a>
        </div>
    </div>
    <div id="footer">
        <ul>
            <?if($_COOKIE['language']!="english"){?><li><a href="/mobile/setlang.php?u=<?echo$id;?>&l=1">English</a></li><?}?>
            <?if($_COOKIE['language']!="russian"){?><li><a href="/mobile/setlang.php?u=<?echo$id;?>&l=2">Русский</a></li><?}?>
            <?if($_COOKIE['language']!="japanese"){?><li><a href="/mobile/setlang.php?u=<?echo$id;?>&l=3">日本語</a></li><?}?>
            <li>Other languages</li>
        </ul>
    </div>
    <?}else{
      $result = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_COOKIE['account']."'");
            while($row = mysql_fetch_array($result)) {
                $id=$row['id'];
            }?>
    <meta http-equiv='Refresh' content='0; URL=acc.php?id=<?echo$id;?>'>
    <?}?>
</body>
</html>
<script>
<?if($_COOKIE['language']=="english"){?>
    $('.content_login form p').html("Stay online in long way for home.");
    $('.span_login').html("E-mail or phone:");
    $('.span_pass').html("Password:");
    $('.content_login a').html("Did you forget password?");
    $('.content_registration p').html("Dont you have account on SOCIAL?");
    $('.content_registration a button').html("Sing up");
    $('.login_sbmt').val("Sing in");
<?}?>
</script>