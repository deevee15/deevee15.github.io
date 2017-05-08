<?
    include_once("bd.php");
    $name=$_POST['auth_name'];
    $surname=$_POST['auth_sname'];
    $b_day=$_POST['auth_b_day'];
    $b_month=$_POST['ageMonth'];
    $b_year=$_POST['auth_b_year'];
    $mail=$_POST['auth_mail'];
    $pass=$_POST['auth_pass'];
    $city=$_POST['auth_city'];
    $gender=$_POST['auth_gender'];
    $country=$_POST['auth_country'];
    if($country=='RUS' or $country=='UA' or $country=='BY' or $country=='EE' or $country=='LV'){$lg='russian';}
    elseif($country=='US' or $country=='UK' or $country=='CA' or $country=='LT'){$lg='english';}
    elseif($country=='JAP'){$lg='japanese';}elseif($country=='CN'){$lg='chinese';}
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
    $query = "INSERT INTO users (name, surname, email, password,b_day,b_month,b_year,city,gender,regdate,site_lang)
	VALUES ('$name','$surname','$mail','$pass','$b_day','$b_month','$b_year','$city','$gender','$date','$lg')";
	$result = mysql_query($query) or die(mysql_error());;
    echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";
?>