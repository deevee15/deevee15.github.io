<?
    include_once("bd.php");$l=$_GET['l'];$u=$_GET['u'];include_once("vars.php");
    if($u!='' and $l!=''){
        if($l=='1'){$lg="english";}
        elseif($l=='2'){$lg="russian";}
        elseif($l=='3'){$lg="japanese";}
        elseif($l=='4'){$lg="deutsch";}
        elseif($l=='2'){$lg="french";}
        $query = "UPDATE users SET site_lang='".$lg."' WHERE id = '".$u."'";
        $result = mysql_query($query) or die(mysql_error());;
        if($l==1){setcookie("language","english",time()+300600,"/");}
        elseif($l==2){setcookie("language","russian",time()+300600,"/");}
        elseif($l==3){setcookie("language","japanese",time()+300600,"/");}
        echo "<meta http-equiv='Refresh' content='0; URL=/acc.php?id=".$u."'>";
    }
?>