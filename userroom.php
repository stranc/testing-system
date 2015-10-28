<?php  include 'sessioncheck.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Особистий кабінет користувача з ID <?php echo $_SESSION["ID"]; ?></title>
		<script type="text/javascript" src="jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
$(document).ready(function()
	{
	$('#ajax').click(function()
		{
		$.get('choosing tests.php', function(data)
			{
			$('#data').html(data);
			});
		});
	});
$(document).ready(function()
	{
	$('#ajax1').click(function()
		{
		$.get('userres.php', function(data)
			{
			$('#data1').html(data);
			});
		});
	});
	</script>
	</head>
	<body>
		<a href = "#" id = "ajax">Почати тестування</a><br/>
		<div id = "data">
		</div>
		<a href = "#" id =  "ajax1">Переглянути результати</a><br/>
		<div id = "data1">
		</div>
		<?php
			if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"] == true)
				{
				echo "<a href=\"admpanel.php\">Повернутись в адмін-панель</a><br/>";
				}
		?>
		<a href = "logout.php">Вихід</a>
	</body>
</html>