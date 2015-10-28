<?php include "sessioncheck.php";
include "connect.php";
function getQuestion()
	{
	$testID = $_SESSION["currentTest"];
	$difficulty = $_SESSION["currentDifficulty"];
	$query = "SELECT * FROM tests WHERE test_id = '$testID' AND heaviness = '$difficulty';";
	$res = mysql_query($query);
	$rows = mysql_num_rows($res);
	if ($rows == 0)
		{
		echo "Фатальна помилка!<br />";
		echo "<a href=\"userroom.php\">Повернутись назад.</a>";
		exit;
		}
	$rand = mt_rand(0, $rows - 1);
	array_push($_SESSION["askedQuestions"], (int) mysql_result($res, $rand, "id"));
?><form method="post" id="form" action="" onsubmit="return false;">
<div>
<?php echo mysql_result($res, $rand, "term"); ?><br />
<table border = "1">
<?php
	$answrs = array();
	array_push($answrs, "ans1", "ans2", "ans3", "ans4");
	while (count($answrs) > 0)
		{
		$randId = rand(0, count($answrs) - 1);
		$randAns = $answrs[$randId];
		array_splice($answrs, $randId, 1);
?><tr><td><input type='radio' name='answer' value="<?php echo str_replace(" ", "", mysql_result($res, $rand, $randAns)); ?>"><?php echo mysql_result($res, $rand, $randAns); ?></td></tr>
<?php
		}
?>
<tr><td><input type="button" name="send" onclick="$(this).attr('disabled','disabled');$.post('test.php?act=next',$('#form').serialize(),function(data){$('#test').html(data);});" value="Відповісти"></td></tr>
</table>

</div>
</form>
<?php
	}
if (!isset($_GET["act"])) { exit; }
switch ($_GET["act"])
	{
	case "start":
		if (!isset($_GET["test"])) { exit; }
		$_SESSION["currentTest"] = $_GET["test"];
		$_SESSION["success"] = 0;
		$_SESSION["askedQuestions"] = array();
		$_SESSION["currentDifficulty"] = 10;
		getQuestion();
		break;
	case "next":
		if (!isset($_POST["answer"])) { exit; }
		$testID = $_SESSION["currentTest"];
		$questionID = end($_SESSION["askedQuestions"]);
		$answer = $_POST["answer"];
		$rightAnswer = false;
		$query = "SELECT ans1 FROM tests WHERE test_id = '$testID' AND id = '$questionID';";
		$res = mysql_query($query);
		$rows = mysql_num_rows($res);
		if ($rows > 0)
			{
			if ($answer == str_replace(" ", "", mysql_result($res, 0, "ans1"))) { $rightAnswer = true; }
			}
		if ($rightAnswer)
			{
			$_SESSION["currentDifficulty"] -= 1;
			$_SESSION["success"] += 1;
			}
		else
			{
			$_SESSION["currentDifficulty"] -= 2;
			}
		if (count($_SESSION["askedQuestions"]) >= 3)
			{
			$testResult = $_SESSION["success"] / count($_SESSION["askedQuestions"]) * 100;
			echo "Твій результат: " . $testResult . "%<br />";
			if ($testResult <= '50')
			{
			echo "Тобі треба серйозно вивчити цей розділ фізики!";
			}
			else if ($testResult > '50' && $testResult <= '90')
			{
			echo "Ти непогано знаєш цей розділ фізики! Але слід підучити...";
			}
			else if ($testResult > '90' && $testResult <= '100')
			{
			echo "Ти відмінно знаєш цей розділ фізики!";
			}
			$query = "INSERT INTO test_results VALUES 
      (NULL,
	  '".mysql_real_escape_string( $testID )."',
	  '".mysql_real_escape_string( $_SESSION['ID'] )."', 
      '".mysql_real_escape_string( $testResult )."',
	  NOW()
      );";  
			$res=mysql_query($query); 
			if (false === $res)
{
   echo mysql_error() . ": " . mysql_error() .'<br>';
   die ('<b>Error database SQL query</b><br>');
}
?>
<?php
			}
		else
			{
			getQuestion();
			}
		break;
	}

?>