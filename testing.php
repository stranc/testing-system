<?php
if (!isset($_POST["test"])) { exit; }
?><html>
<head>
<title></title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function()
	{
	$('#test').load('test.php?act=start&test=<?php echo $_POST["test"]; ?>');
	});
</script>
</head>
<body>
<div id="test">
</div>
<br/><a href="userroom.php">Повернутись назад.</a>
</body>
</html>