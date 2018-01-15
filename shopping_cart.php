<?php
	session_start();
	
	$link = mysqli_connect("localhost", "201709_471_g03", "CGpApM1cPsKIdlVlYHKH", "201709_471_g03");
 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>
<html>
<head>
	<title>Shopping Cart</title>
</head>
<body>
	<table align="center" style="border:2px solid blue;">
		<tr>
			<td align="center">
				<form id="checkout" action="check.php" method="post">
					<input type="submit" name="checkout_submit" id="checkout_submit" value="Proceed to Checkout">
				</form>
			</td>
			<td align="center">
				<form id="new_search" action="screen2.php" method="post">
					<input type="submit" name="search" id="search" value="New Search">
				</form>								
			</td>
			<td align="center">
				<form id="exit" action="exit.php" method="post">
					<input type="submit" name="exit" id="exit" value="EXIT 3-B.com">
				</form>					
			</td>
		</tr>
		<tr>
				<form id="recalculate" name="recalculate" action="recalculate.php" method="post">
			<td  colspan="3">
				<div id="bookdetails" style="overflow:scroll;height:180px;width:550;border:1px solid black;">
					<table align="center" BORDER="2" CELLPADDING="2" CELLSPACING="2" WIDTH="100%">
						<th width='10%'>Remove</th><th width='60%'>Book Description</th><th width='10%'>Qty</th><th width='10%'>Price</th>
						<?php
							$tprice = 0;
							
							for($i = 0; $i < count($_SESSION['cart']); $i++)
							{
								$sql = "SELECT title, price, isbn FROM books WHERE isbn='".$_SESSION['cart'][$i]."'";
								mysqli_query($link, $sql) or die('Error querying database.');
								$result = mysqli_query($link, $sql);
								$row = mysqli_fetch_row($result);
								
								echo "<tr><td><button type='submit' name='btnDel' id='btnDel' value='".$i."'>Delete Item</button></td>
										<td>".$row[0]."</td>
										<td><input type='number' name='inQty[]' value='".$_SESSION['cart_qty'][$i]."'></td>
										<td>".$row[1]."</td></tr>";
										
								$tprice += ($_SESSION['cart_qty'][$i]*($row[1]));
							}
						?>
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td align="center">				
					<input type="submit" name="recalculate_payment" id="recalculate_payment" value="Recalculate Payment">
				</form>
			</td>
			<td align="center">
				&nbsp;
			</td>
			<td align="center">			
				Subtotal:  <?php echo " $".$tprice;  ?>			
			</td>
		</tr>
	</table>
</body>
</html>