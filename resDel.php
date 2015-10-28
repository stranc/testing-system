<?php include "connect.php";
$id = $_POST['id'];
$query = "delete FROM test_results WHERE id='$id'";
$rs = mysql_query($query);
$query ="SELECT * 
FROM  `tests` 
ORDER BY  `tests`.`test_id` ASC 
LIMIT 0 , 30";
$rs = mysql_query($query);
header ('Location: resAll.php');
?>