<?php
 session_start();
if ($_SESSION['OK'] != "OK") {
	header('Location: index.php');
	exit;
}
?>