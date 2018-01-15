<?php
	session_start();
	
	$link = mysqli_connect("localhost", "201709_471_g03", "CGpApM1cPsKIdlVlYHKH", "201709_471_g03");
 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	if($_POST['group1'] == "nCard")
	{
		//update card info
		$sql = "UPDATE customer SET ccard='".$_POST['credit_card']."', cnum='".$_POST['card_number']."' WHERE uname='".$_SESSION['username']."'";
		mysqli_query($link, $sql) or die('Error querying database.');
		
		//update book quantities
		for($i = 0; $i < count($_SESSION['cart_qty']); $i++)
		{
			$qUp = "UPDATE books SET qty= qty - ".$_SESSION['cart_qty'][$i]." WHERE isbn='".$_SESSION['cart'][$i]."'";
			mysqli_query($link, $qUp) or die('Error querying database.');
		}
		
		//update ordered table
		for($i = 0; $i < count($_SESSION['cart']); $i++)
		{
			$qOr = "INSERT INTO ordered VALUES (".$_SESSION['username'].", ".$_SESSION['cart'][$i].")";
			mysqli_query($link, $qOr) or die('Error queryint database.');
		}
		
		//redirect to proof of purchase
		echo "<html>
				<meta http-equiv='refresh' content='1;url=proof_purchase.php'>
				</html>";
	}
	else
	{
		
		//update book quantities
		for($i = 0; $i < count($_SESSION['cart_qty']); $i++)
		{
			$qUp = "UPDATE books SET qty= qty - ".$_SESSION['cart_qty'][$i]." WHERE isbn='".$_SESSION['cart'][$i]."'";
			mysqli_query($link, $qUp) or die('Error querying database.');
		}
		
		//update ordered table
		for($i = 0; $i < count($_SESSION['cart']); $i++)
		{
			$qOr = "INSERT INTO ordered VALUES (".$_SESSION['username'].", ".$_SESSION['cart'][$i].")";
			mysqli_query($link, $qOr) or die('Error queryint database.');
		}
		//redirect to proof of purchase
		echo "<html>
				<meta http-equiv='refresh' content='1;url=proof_purchase.php'>
				</html>";
	}
?>