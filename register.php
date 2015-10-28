<?php


$error1 = '';
$error2 = '';
$error3 = '';

if (!empty($_POST['go']))
	{	
		$login = $_POST['login'] ;
		$password = $_POST['password'] ;
		$confirm = $_POST['confirm'] ;
		if (!preg_match("/[а-яa-z]/i",$login)) $error1 = 'Неправильно введений логін.';
		if (!preg_match("/([а-яa-z0-9]{5})/",$password)) $error2 = 'Неправильно введений пароль.' ;
		if ( !empty( $password ) and !empty( $confirm ) and $password != $confirm ) $error3 = 'не співпадають паролі'."\n"; 
	}


if ($error1 != '' || $error2 != '' || $error3 != '')
	{
	header('Location: /ajax.php?error1=' . $error1 . '&error2=' . $error2 . '&error3=' . $error3);
	exit();
	}
$host="localhost"; 
$user="root"; 
$pwd=""; 
$db="GeneralDB"; 
$admin     = "admin";
$login     = substr( $_POST['login'], 0, 30 ); 
$password  = substr( $_POST['password'], 0, 30 ); 
$confirm   = substr( $_POST['confirm'], 0, 30 ); 
$login     = trim( $login ); 
$password  = trim( $password ); 
$confirm   = trim( $confirm ); 
@mysql_connect($host,$user,$pwd) or die("Couldn't connect to MySQL Database!"); 
@mysql_select_db($db) or die("Couldn't select database!"); 
$query="SELECT * FROM ulist WHERE( 
login='$login'
)"; 
$res=mysql_query($query); 
if(mysql_num_rows($res)!=0): 
{
echo 'Користувач з такими даними існує!<br>'; 
echo '<a href="index.php">Пройти реєстрацію</a>'; 
}
else : 
$query = "INSERT INTO ulist VALUES 
      (NULL,  
      '".mysql_real_escape_string( $login )."', 
      '".mysql_real_escape_string( md5(md5( $password )) )."' 
      );"; 
$res=mysql_query($query); 

echo 'Ви пройшли реєстрацію!';
header('Refresh: 3; index.php'); 
endif;
?>