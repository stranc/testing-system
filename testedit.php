<html>
<head>
<title>Редагування тестів</title>
<script type="text/javascript" src="jquery-1.8.2.min.js"></script>
    <script type="text/javascript">
      function buttonClick ()
      {
        var div = document.getElementById ("myDiv");
        var button = document.getElementById ("myButton");
        var content_div = document.getElementById ("ListContent");
        var textarea = document.getElementById ("myTextarea");

        if (div.contentEditable == "true")
        {
          div.contentEditable = "false";
          content_div.style.display = "inline";
          textarea.innerHTML = div.innerHTML;
          button.value = "Редактировать";
        }

        else
        {
          div.contentEditable = "true";
          content_div.style.display = "none";
          button.value = "Сохранить";
        }
	  }
	  function addrow (qnty) 
{
var newRow;
var newCell;
for (j=0; j<=(qnty-1); j++)
	{
newRow = document.all.tests.insertRow(-1);
for (i=0; i<8; i++)
		{
newCell = newRow.insertCell();
newCell.contentEditable = true;
		}
	}
}
function displayResult()
{
for ( var i = 1; i < document.getElementById("tests").rows.length; i++)
	{
	var result = "?";
for ( var j = 0; j < document.getElementById("tests").rows[i].cells.length; j++)
		{
		result += "&cell" + j + "=" + encodeURIComponent(document.getElementById("tests").rows[i].cells[j].innerHTML);
		}
		$.get("testsave.php"+result, function(data) {});
	}
}
</script>
</head>
<body>
<?php
$host="localhost"; 
$user="root"; 
$pwd=""; 
$db="GeneralDB"; 
@mysql_connect($host,$user,$pwd) or die("Couldn't connect to MySQL Database!");
@mysql_select_db($db) or die("Couldn't select database!");

$query = "SELECT *
FROM `tests`";
$rs = mysql_query($query);
$query ="SELECT * 
FROM  `tests` 
ORDER BY  `tests`.`test_id` ASC 
LIMIT 0 , 30";
$rs = mysql_query($query);
?><table id = "tests" border = "1">
<caption align="top"></caption>
<tr>
<th>Test ID</th>
<th>ID</th>
<th>Умова</th>
<th>Відповідь 1</th>
<th>Відповідь 2</th>
<th>Відповідь 3</th>
<th>Відповідь 4</th>
<th>Тяжкість</th>
</tr>
<?php

while($row = mysql_fetch_array($rs))
{
?><tr>
<td contenteditable="true" style="max-width: 20px;"><?php echo $row['test_id']; ?></td>
<td contenteditable="true" style="max-width: 20px;"><?php echo $row['id']; ?></td>
<td contenteditable="true" style="max-width: 250px;"><?php echo $row['term']; ?></td>
<td contenteditable="true" style="max-width: 50px;"><?php echo $row['ans1']; ?></td>
<td contenteditable="true" style="max-width: 50px;"><?php echo $row['ans2']; ?></td>
<td contenteditable="true" style="max-width: 50px;"><?php echo $row['ans3']; ?></td>
<td contenteditable="true" style="max-width: 50px;"><?php echo $row['ans4']; ?></td>
<td contenteditable="true" style="max-width: 200px;"><?php echo $row['heaviness']; ?></td>
</tr>
<?php
}
?>
</table>
<input name='html' type='text' value='0' id=addque style="max-width: 20px">
<input type='button' value='Додати питання' onClick='addrow(addque.value)'>
<input type='button' value='Зберегти' onClick='displayResult()'>
<br/>
<hr width = "100%" />
<br/>
<form action="delque.php"  method = "post">
<table>
<tr><td>Введіть TEST_ID:</td> <td><input type='text' style="max-width: 20px" name = "test_id"></td></tr>
<tr><td>Введіть ID:</td> <td><input type='text' style="max-width: 20px" name = "id"></td></tr>
<tr><td><input type='submit' value='Видалити питання'></td></tr>
</table>
</form>
<a href = "admpanel.php">Повернутися в адмін-панель</a><br/>
<a href = "logout.php">Вихід</>
</body>	
</html>