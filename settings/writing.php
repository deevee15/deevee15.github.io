<?
    include_once("bd.php");
    $id=$_GET['id'];
    $text=$_POST['post_name'];
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
    $query = "INSERT INTO wall (user, text, w_date)
    VALUES ('$id','$text','$data')";
    $result = mysql_query($query) or die(mysql_error());;
    echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";
?>