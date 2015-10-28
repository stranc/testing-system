<body>
Твої результати:<br/>
<table id = "tests" border = "1">
<caption align="top"></caption>
<tr>
<th>Test ID</th>
<th>Результат</th>
<th>Дата</th>
</tr>
<?php include "connect.php";
session_start();
$user_id = $_SESSION['ID'];
$query = "SELECT *
FROM `test_results`
WHERE user_id = '$user_id'";
$rs = mysql_query($query);
$rs = mysql_query($query);
while($row = mysql_fetch_array($rs))
{
?>
<tr>
<td><?php echo $row['test_id']; ?></td>
<td><?php echo $row['result']; ?></td>
<td><?php echo $row['date']; ?></td>
</tr>
<?php
}
?>
</table>
<br/>
</body>