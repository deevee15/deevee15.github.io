<?
    include_once("bd.php");
    $status=$_POST['sz_input'];
    $query = "UPDATE users SET says='".$status."' WHERE email = '".$_COOKIE['account']."'";
    $result = mysql_query($query) or die(mysql_error());;
    echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";
?>