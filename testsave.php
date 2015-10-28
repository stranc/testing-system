<?php
$host="localhost"; 
$user="root"; 
$pwd=""; 
$db="GeneralDB"; 
@mysql_connect($host,$user,$pwd) or die("Couldn't connect to MySQL Database!");
@mysql_select_db($db) or die("Couldn't select database!");
$test_id = $_GET["cell0"];
$id = $_GET["cell1"];
$term = $_GET["cell2"];
$ans1 = $_GET["cell3"];
$ans2 = $_GET["cell4"];
$ans3 = $_GET["cell5"];
$ans4 = $_GET["cell6"];
$heaviness = $_GET["cell7"];

$query = "SELECT * FROM tests WHERE id = '".mysql_real_escape_string( $id )."' AND test_id = '" . mysql_real_escape_string( $test_id ). "'";
$sqlt = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sqlt) < 1)
	{
	$query1 = "INSERT INTO tests VALUES 
      ('".mysql_real_escape_string( $test_id )."',
      '".mysql_real_escape_string( $id )."', 
      '".mysql_real_escape_string( $term )."' ,
	  '".mysql_real_escape_string( $ans1 )."' ,
	  '".mysql_real_escape_string( $ans2 )."' ,
	  '".mysql_real_escape_string( $ans3 )."' ,
	  '".mysql_real_escape_string( $ans4 )."' ,
	  '".mysql_real_escape_string( $heaviness )."'
      );";
$sql1 = mysql_query($query1) or die(mysql_error());
}
else
{		
$query = "UPDATE tests
 SET term = '".mysql_real_escape_string( $term )."',
	ans1 = '".mysql_real_escape_string( $ans1 )."',
	ans2 = '".mysql_real_escape_string( $ans2 )."',
	ans3 = '".mysql_real_escape_string( $ans3 )."',
	ans4 = '".mysql_real_escape_string( $ans4 )."',
	heaviness = '".mysql_real_escape_string( $heaviness )."'
	WHERE id = '".mysql_real_escape_string( $id )."' AND test_id = '" . mysql_real_escape_string( $test_id ). "'";
$sql = mysql_query($query) or die(mysql_error());
}
?>