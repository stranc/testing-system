<?php 
$host="localhost"; 
$user="root"; 
$pwd=""; 
$db="GeneralDB";
@mysql_connect($host,$user,$pwd) or die("Couldn't connect to MySQL Database!"); 
@mysql_select_db($db) or die("Couldn't select database!");
?>