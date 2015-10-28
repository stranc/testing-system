<html>
<head>
<title>Реєстрація</title>
</head>
<body >
<form name='regform' action="register.php" method = "post">
<table align = "center">
		<tr>
			<td>Логін:</td>
			<td><input type='text' name='login'><?php if (isset($_GET["error1"])) { echo $_GET["error1"]; } ?></td>
		</tr>
		<tr>
			<td>Пароль:</td>
			<td><input type='password' name='password'><?php if (isset($_GET["error2"])) { echo $_GET["error2"]; } ?></td>
		</tr>
		<tr>
			<td>Повторити пароль:</td>
			<td><input type='password' name='confirm'><?php if (isset($_GET["error3"])) { echo $_GET["error3"]; } ?></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' value='Зареєструвати' name = "go"></td>
		</tr>
		<tr>
			<td></td>
			<td><a href = "index.php">Головна</a></td>
		</tr>

	</table>
</form>
</body>
</html>