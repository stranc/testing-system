<?php 
$host="localhost"; 
$user="root"; 
$pwd=""; 
$db="GeneralDB";
@mysql_connect($host,$user,$pwd) or die("Couldn't connect to MySQL Database!"); 
@mysql_select_db($db) or die("Couldn't select database!"); 
$loginDel = $_POST['userlogindel'];
$query = "delete FROM ulist WHERE
login='$loginDel';";
$result = mysql_query($query);
header('Refresh: 0; admpanel.php');
?>