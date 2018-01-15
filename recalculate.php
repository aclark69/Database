<?php
		session_start();
		
		if(!is_null($_POST['btnDel']))
		{
			unset($_SESSION['cart'][$_POST['btnDel']]);
			unset($_SESSION['cart_qty'][$_POST['btnDel']]);
			$_SESSION['cart'] = array_values($_SESSION['cart']);
			$_SESSION['cart_qty'] = array_values($_SESSION['cart_qty']);
		}
		
		for($i = 0; $i < count($_POST['inQty']); $i++)
		{
			$_SESSION['cart_qty'][$i] = $_POST['inQty'][$i];
		}
?>

<html>
	<meta http-equiv="refresh" content="1;url=shopping_cart.php">
</html>