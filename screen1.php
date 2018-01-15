<!-- Figure 1: Welcome Screen by Alexander -->
<?php
	session_start();
	
	$shopping_cart = array();
	$_SESSION['cart']=$shopping_cart;
	$cart_qty = array();
	$_SESSION['cart_qty'] = $cart_qty;
	
	$logged_in = False;
	$_SESSION['logged_in'] = $logged_in;
	
	$username = "";
	$_SESSION['username'] = $username;
?>
<html>
<head>
<title>Welcome to Best Book Buy Online Bookstore!</title>
</head>
<body>
	<table align="center" style="border:1px solid blue;">
	<tr><td><h2>Best Book Buy (3-B.com)</h2></td></tr>
	<tr><td><h4>Online Bookstore</h4></td></tr>
	<tr><td><form action="javascript:location.assign(document.querySelector('input[name=\x22group1\x22]:checked').value);" method="post">
		<input type="radio" name="group1" value="screen2.php" id="2" checked>Search Online<br/>
		<input type="radio" name="group1" value="customer_registration.php" id="creg">New Customer<br/>
		<input type="radio" name="group1" value="user_login.php" id="ulog">Returning Customer<br/>
		<input type="radio" name="group1" value="admin_login.php" id="alog">Administrator<br/>
		<input type="submit" name="submit" value="ENTER">
	</form></td></tr>
	</table>
</body>
</html>