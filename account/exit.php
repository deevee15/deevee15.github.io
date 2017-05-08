<?
    include_once("bd.php");
    function date_ru() {
        $day=date("d");
        $month_en=date("F");
        $year=date("Y");
        $days_of_week_en=date("l");
        $month_ru=array(
            'January'=>'января',
            'February'=>'февраля',
            'March'=>'марта',
            'April'=>'апреля',
            'May'=>'мая',
            'June'=>'июня',
            'July'=>'июля',
            'August'=>'августа',
            'September'=>'сентября',
            'October'=>'октября',
            'November'=>'ноября',
            'December'=>'декабря',
        );
        $month=$month_ru[$month_en];
        $days_of_week=$days_of_week_ru[$days_of_week_en];
        $hour=date("H");
        $minute=date("i");
        $date="$day $month $year года в $hour:$minute";
        return $date;
    }
    $data = date_ru();
    $query = "UPDATE users SET online=0,last_login = '".$data."' WHERE email = '".$_COOKIE['account']."'";
    $result = mysql_query($query) or die(mysql_error());;
	setcookie("account",$_COOKIE['account'],time()-300600,"/");
	echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";
?>