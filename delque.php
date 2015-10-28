<?php include "connect.php";
$test_id = $_POST['test_id'];
$id = $_POST['id'];
$query = "delete FROM tests WHERE
test_id='$test_id' AND id = '$id';";
$result = mysql_query($query);
header('Refresh: 0; testedit.php');
?>