<?
    if($_SESSION['admined']!=1){
        include_once("bd.php");include_once("check.php");$id=$_GET['id'];
        
        $id=$_GET['id'];
        $reason=$_GET['reason'];
        $time=$_GET['time'];
        $query = "INSERT INTO banned (id, admin, reason, time, date)
	    VALUES ('$id','1','$reason','$time','25 ноября 2016')";
	    $result = mysql_query($query) or die(mysql_error());;
    
        echo "<meta http-equiv='Refresh' content='0; URL=/admin/'>"; 
    }
?>