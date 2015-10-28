<?php 
session_start();
$host="localhost"; 
$user="root";
$pwd="";
$db="GeneralDB";
$admin	= "admin";
@mysql_connect($host,$user,$pwd) or die("Couldn't connect to MySQL Database!"); 
@mysql_select_db($db) or die("Couldn't select database!");

if (isset($_POST['login']) && isset($_POST['password']))
{
    $login = mysql_real_escape_string($_POST['login']);
    $password = md5(md5($_POST['password']));
	$query = "SELECT `id`
            FROM `ulist`
            WHERE `login`='{$login}' && `pass`='{$password}'
            LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());

   
	 if (mysql_num_rows($sql) == 1 && $login == $admin) {
	 session_regenerate_id();
	 $_SESSION["OK"]="OK";
	 $_SESSION["ADMIN"]=true;
	 $row = mysql_fetch_assoc($sql);
     $_SESSION['ID'] = $row['id'];
	echo 'Вітаю тебе, адміне!'; header('Refresh: 3; admpanel.php');}
	else { 
    if (mysql_num_rows($sql) == 1 ) {
	session_regenerate_id();
	$_SESSION["OK"]="OK";
	$_SESSION["ADMIN"]=false;
	$row = mysql_fetch_assoc($sql);
     $_SESSION['ID'] = $row['id'];
		echo 'Авторизація прошла успішно.';
	header('Refresh: 3; userroom.php');
	echo ' Через 3 сек. ви будете перенаправлені у власний кабінет.';
        $_SESSION['user_id'] = $row['id'];
    }
    else {
        die('Такой логин с паролем не найдены в базе данных.');
		 header('Refresh: 3; index.php');
    }
	}
}
?>