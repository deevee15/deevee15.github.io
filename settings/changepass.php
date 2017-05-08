<?
    include_once("bd.php");$id=$_GET['id'];include_once("vars.php");
    $oldpass = $_POST['u_oldpass'];
    $newpass = $_POST['u_newpass'];
    $repass = $_POST['u_repass'];
    if($oldpass==$pass and $newpass==$repass){
        $query = "UPDATE users SET password='".$newpass."' WHERE email = '".$_COOKIE['account']."'";
        $result = mysql_query($query) or die(mysql_error());;
        echo "<meta http-equiv='Refresh' content='0; URL=/account/settings.php?id=".$id."'>";
    }
?>