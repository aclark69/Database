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
	<title>Proof of Purchase</title>
</head>
<body>
	<h2 align="center">Proof of Purchase</h2>
	<table align="center">
		<tr>
			<td align="right">
				<b>Shipping Address:</b>
			</td>
			<td align="right">
				<label>UserID: <?php echo $row[0]; ?></label>
			</td>
		</tr>
		<tr>
			<td align="right">
				<label><?php echo $row[2]." ".$row[3]; ?></label>
			</td>
			<td align="right">
				<label>Date:</label>
			</td>
		</tr>
		<tr>
			<td align="right">
				<label><?php echo $row[4]; ?></label>
			</td>
			<td align="right">
				<label>Time:</label>
			</td>
		</tr>
		<tr>
			<td align="right">
				<label><?php echo $row[5]; ?></label>
			</td>
			<td align="right">
				<b>Credit Card Information:</b>
			</td>
		</tr>
		<tr>
			<td align="right">
				<div><span style="padding-right:12px"><?php echo $row[6]; ?></span><?php echo $row[7]; ?></div>
			</td>
			<td align="right">
				<label><?php echo $row[8]." - ".$row[9]; ?></label>
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
					<span>Subtotal:<?php echo " $ ".$tprice; $tprice += 4;?></span><br/>
					<span>Shipping & Handling: $ 4.00</span><br/>
					<span>Total:<?php echo " $ ".$tprice; ?></span>
				</div>
			</td>
		</tr>
	</table>
	<table align="center">
		<tr>
			<td align="center">
					<input type="submit" name="print_submit" id="print_submit" value="Print">
			</td>
			<td align="center">
				<form name="beginAgain" id="beginAgain" action="screen1.php">
					<input type="submit" name="search_submit" id="search_submit" value="New Order">	
				</form>
			</td>
			<td align="center">
					<form action="exit.php" method="post" id="exit">
					<input type="submit" name="exit" id="exit" value="Exit">
					</form>
			</td>
		</tr>
	</table>
</body>
</html>