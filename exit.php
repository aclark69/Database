<?php
	session_start();
	
	$_SESSION['logged_in'] = False;
	$_SESSION['username'] = "";
	$_SESSION['cart'] = array();
	
?>
<html>
	<meta http-equiv="refresh" content="2;url=screen1.php">
</html>