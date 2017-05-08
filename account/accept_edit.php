<?
    include_once("bd.php");
    $name=$_POST['e_name'];
    $sname=$_POST['e_sname'];
    $city=$_POST['e_city'];
    $query = "UPDATE users SET name='".$name."',surname='".$sname."',city='".$city."' WHERE email = '".$_COOKIE['account']."'";
    $result = mysql_query($query) or die(mysql_error());;
    echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";
?>