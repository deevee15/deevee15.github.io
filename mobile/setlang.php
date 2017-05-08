<? include_once("devices.php");
    $l=$_GET['l'];
    $u=$_GET['u'];
    if($l==1){setcookie("language","english",time()+300600,"/");}
    elseif($l==2){setcookie("language","russian",time()+300600,"/");}
    elseif($l==3){setcookie("language","japanese",time()+300600,"/");}
    if($mobile==1){echo"<meta http-equiv='Refresh' content='0; URL=index.php'>";}
    else{echo"<meta http-equiv='Refresh' content='0; URL=/index.php'>";}
?>