<html>
	<head>
	<title>Всі результати</title>
	</head>
<body>
<table id = "tests" border = "1">
<caption align="top"></caption>
<tr>
<th>ID</th>
<th>Test ID</th>
<th>User ID</th>
<th>Результат</th>
<th>Дата</th>
</tr>
<?php include "connect.php";
$query = "SELECT *
FROM `test_results`";
$rs = mysql_query($query);
while($row = mysql_fetch_array($rs))
{
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['test_id']; ?></td>
<td><?php echo $row['user_id']; ?></td>
<td><?php echo $row['result']; ?></td>
<td><?php echo $row['date']; ?></td>
</tr>
<?php
}
?>
</table>
<form action="resDel.php"  method = "post">
<table>
<tr><td>Введіть ID:</td> <td><input type='text' style="max-width: 20px" name = "id"></td></tr>
<tr><td><input type='submit' value='Видалити результат'></td></tr>
</table>
</form>
<br/><a href = "admpanel.php">Повернутись в адмін-панель</a>
<br/><a href = "logout.php">Вийти</a>
</body>
</html>