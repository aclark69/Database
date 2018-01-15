<?php
	session_start();
	
	$link = mysqli_connect("localhost", "201709_471_g03", "CGpApM1cPsKIdlVlYHKH", "201709_471_g03");
 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$sql = "SELECT * FROM customer WHERE uname='".$_SESSION['username']."'";
	
	mysqli_query($link, $sql) or die('Error querying database.');
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_row($result);
	
	
?>
<html>
<head>
	<title>Confirm Order</title>
</head>
<body>
	<h2 align="center">Confirm Order</h2>
	<table align="center">
		<form id="newCard" name="newCard" action="checkout.php" method="post">
		<tr>
			<td align="right">
				<b>Shipping Address:</b>
			</td>
		</tr>
		<tr>
			<td align="right">
				<label><?php echo $row[2]." ".$row[3]; ?></label>
			</td>
			<td>
				<input type="radio" name="group1" value="oCard" checked="checked">Use Credit Card on File<br/>
			</td>
		</tr>
		<tr>
			<td align="right">
				<label><?php echo $row[4]; ?></label>
			</td>
			<td align="left">
				<label><?php echo $row[8]." - ".$row[9]; ?></label>
			</td>
		</tr>
		<tr>
			<td align="right">
				<label><?php echo $row[5]; ?></label>
			</td>
			<td>
				<input type="radio" name="group1" value="nCard">New Credit Card<br/>
			</td>
		</tr>
		<tr>
			<td align="right">
				<div><span style="padding-right:12px"><?php echo $row[6]; ?></span><?php echo $row[7]; ?></div>
			</td>
			<td align="left">
				<div>
					<span>
						<select id="credit_card" name="credit_card">
						<option selected disabled>select a card type</option>
						<option>VISA</option>
						<option>MASTER</option>
						<option>DISCOVER</option>
						</select>
					</span>
					<span>
						<input type="text" id="card_number" name="card_number" placeholder="Credit card number">
					</span>
				</div>
			</td>
		</tr>
		<tr>
			<td  colspan="3">
				<div id="bookdetails" style="overflow:scroll;height:180px;width:400px;border:1px solid black;">
					<table align="center" BORDER="2" CELLPADDING="2" CELLSPACING="2" WIDTH="100%">
						<th width='60%'>Book Description</th><th width='10%'>Qty</th><th width='10%'>Price</th>
						<?php
							$tprice = 0;
							
							for($i = 0; $i < count($_SESSION['cart']); $i++)
							{
								$sql = "SELECT title, price, isbn FROM books WHERE isbn='".$_SESSION['cart'][$i]."'";
								mysqli_query($link, $sql) or die('Error querying database.');
								$result = mysqli_query($link, $sql);
								$row = mysqli_fetch_row($result);
								
								echo "<tr><td>".$row[0]."</td>
										<td>".$_SESSION['cart_qty'][$i]."</td>
										<td>".$row[1]."</td></tr>";
										
								$tprice += ($_SESSION['cart_qty'][$i]*($row[1]));
							}
						?>
					</table>
				</div>
			</td>
		</tr>
	</table>
	<table align="center" style="width:500px">
		<tr>
			<td width ="9%" valign="top" bgcolor="ADD8E6">
				<b>SHIPPING NOTE: </b>
			</td>
			<td width ="10%" bgcolor="ADD8E6">
				The book will be  
				delivered within 5  
				business days. 
			</td>
			<td width ="18%">
				<div>
					<span>Subtotal: <?php echo " $ ".$tprice; $tprice += 4;?></span><br/>
					<span>Shipping & Handling: $ 4.00</span><br/>
					<span>Total: <?php echo " $ ".$tprice; ?></span>
				</div>
			</td>
		</tr>
	</table>
	<table align="center">
		<tr>
			<td align="center">
				<input type="submit" name="purchase_submit" id="purchse_submit" value="Buy It!">
			</td>
		</form>
			<td align="center">
				<form id="update" action="update_customerprofile.php" method="post">
					<input type="submit" name="update_submit" id="update_submit" value="Update Customer Profile">	
				</form>
			</td>
			<td align="center">
				<form id="cancel" action="screen2.php" method="post">
					<input type="submit" name="cancel_submit" id="canel_submit" value="Cancel">
				</form>
			</td>
		</tr>
	</table>
</body>
</html>