<?php
session_start();
$_SESSION = array();
session_regenerate_id();
header("Location: index.php");
?>