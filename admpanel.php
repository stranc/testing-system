<?php  include 'sessioncheck.php';
if (!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] !== true)
	{
	header("Location: userroom.php");
	exit();
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Особистий кабінет адміністратора</title>
	<script type="text/javascript">
	$(document).ready(function()
	{
	$('#ajax').click(function()
		{
		$.get('testedit.php', function(data)
			{
			$('#data').html(data);
			});
		});
	}); 
	$(document).ready(function()
	{
	$('#ajax1').click(function()
		{
		$.get('resAll.php', function(data)
			{
			$('#data1').html(data);
			});
		});
	}); </script>
	</head>
	<body>
<?php include 'connect.php';
?>
<hr />
<b>Видалити користувача:</b>
<form method="post" action = "userDel.php" id = 'delUser'>
<input type="text" value="Логін користувача" onFocus="Javascript:if(this.value='text')this.value=''" name="userlogindel" id="userlogindel" /><br />
<input type="submit" value="Видалити" />
</form>
<br/>
<u>Список користувачів:</u><br />
<?php
$query = "select * from ulist";
$result = mysql_query($query);?>
<table id = "users" border = "1">
<caption align="top"></caption>
<tr>
<th>Список користувачів</th>
</tr>
<?php
while($row = mysql_fetch_array($result))
{
?><tr>
<td style="max-width: 60px;"><?php echo $row['login']; ?></td>
</tr>
<?php
}
?>

</table>
<hr/>
<a href = "testedit.php">Редагувати тести</a><br/>
<div id = "data">
		</div>
<a href = "resAll.php">Перегляд і редагування загальних результатів</a><br/>
<div id = "data1">
		</div>
<a href = "userroom.php">Перейти в кімнату користувача</a><br/>
<a href = "logout.php">Вихід</a>
	</body>
</html>