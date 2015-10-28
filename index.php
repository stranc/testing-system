<?php
session_start();
if (isset($_SESSION["OK"]) && $_SESSION['OK'] == "OK") {
	switch ($_SESSION["ADMIN"])
		{
		case true:
			header('Location: admpanel.php');
			break;
		default:
			header('Location: userroom.php');
		}
	exit;
}

 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Сторінка тестування з фізики</title>
		<script type="text/javascript" src="jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
$(document).ready(function()
	{
	$('#ajax').click(function()
		{
		$.get('ajax.php', function(data)
			{
			$('#data').html(data);
			});
		});
	});
</script>
	</head>
	<body>
<div id = "data">
<p align = "center">Ласкаво просимо на сайт тестуваня з фізики!</p>
<form name = 'logform' action="logincomp.php" method = "post">
	<table align = "center">
		<tr>
			<td>Логін:</td>
			<td><input type="text" value = "Логін користувача" onFocus="Javascript:if(this.value='text')this.value=''" name="login" size="20" /></td>
		</tr>
		<tr>
			<td>Пароль:</td>
			<td><input type="password" value = "Пароль" onFocus="Javascript:if(this.value='text')this.value=''" name="password" size="20" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Вхід" /></td>
		</tr>
	</table>
</form>
<p align = "center"><a href = "#" id = "ajax">Реєстрація</a>
</div>
	</body>
</html>