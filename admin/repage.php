<?
    $showuser=$_POST['user_id'];
    $ban_user=$_POST['ban_user'];
    $ban_reason=$_POST['ban_reason'];
    $ban_time=$_POST['ban_time'];
    if($showuser!='' and ($ban_user=='' and $ban_reason=='' and $ban_time=='')){
        echo "<meta http-equiv='Refresh' content='0; URL=/admin/showuser.php?id=".$showuser."'>"; 
    }
    else if($showuser=='' and ($ban_user!='' and $ban_reason!='' and $ban_time!='')){
        echo "<meta http-equiv='Refresh' content='0; URL=/admin/banuser.php?id=".$ban_user."&reason=".$ban_reason."&time=".$ban_time."'>"; 
    }
?>