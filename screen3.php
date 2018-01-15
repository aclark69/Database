<!-- Figure 3: Search Result Screen by Prithviraj Narahari, php coding: Alexander Martens -->

<?php
	session_start();
	
	$link = mysqli_connect("localhost", "201709_471_g03", "CGpApM1cPsKIdlVlYHKH", "201709_471_g03");

 	$search = $_GET['searchfor'];
	$searchIn = $_GET['searchon'];
	$category = $_GET['category'];
 
 	if($category == 1)
	{
		$category = "Fantasy";
	}
	else if($category == 2) 
	{
		$category = "Adventure";
 	}
 	else if($category == 3)
 	{
		$category = "Fiction";
  	}
	else if($category == 4)
 	{
		$category = "Textbook";
  	}
	else if($category == "all")
	{
		$category = "All";
	}

	switch ($searchIn) {
		case "title":
			if($category != "All")
			{
				$sql = "SELECT * FROM books WHERE title LIKE '%".$search."%' and category='".$category."'";
			}
			else{
				$sql = "SELECT * FROM books WHERE title LIKE '%".$search."%'";
			}
          	break;
    	case "author":
			if($category != "All")
			{
				$sql = "SELECT * FROM books WHERE author LIKE '%".$search."%' and category='".$category."'";
			}
			else{
				$sql = "SELECT * FROM books WHERE author LIKE '%".$search."%'";
			}
         	break;
    	case "publisher":
			if($category != "All")
			{
				$sql = "SELECT * FROM books WHERE publisher LIKE '%".$search."%' and category='".$category."'";
			}
			else{
				$sql = "SELECT * FROM books WHERE publisher LIKE '%".$search."%'";
			}
         	break;
        case "isbn":
			if($category != "All")
			{
				$sql = "SELECT * FROM books WHERE isbn LIKE '%".$search."%' and category='".$category."'";
			}
			else{
				$sql = "SELECT * FROM books WHERE isbn LIKE '%".$search."%'";
			}
			break;
		case "anywhere":
			if($category != "All")
			{
				$sql = "SELECT * FROM books WHERE category='".$category."' and title LIKE '%".$search."%' or author LIKE '%".$search."%' or isbn LIKE '%".$search."%' or publisher LIKE '%".$search."%'";
			}
			else{
				$sql = "SELECT * FROM books WHERE title LIKE '%".$search."%' and title LIKE '%".$search."%' or author LIKE '%".$search."%' or isbn LIKE '%".$search."%' or publisher LIKE '%".$search."%'";
			}
         	break;	
 	}
 
	if($link === false)
	{
  	  die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	else if($link === true)
	{
		echo "worked fine"; 
	}
	
	mysqli_query($link, $sql) or die('Error querying database.');
	$result = mysqli_query($link, $sql); 
  
 ?>
 
<html>
<head>
	<title> Search Result - 3-B.com </title>
	<script>
	//redirect to reviews page
	function review(isbn){
		window.location.href="screen4.php?isbn="+ isbn;
	}
	</script>
</head>
<body>
	<table align="center" style="border:1px solid blue;">
		<tr>
			<td align="left">
				
					<h6> <fieldset>Your Shopping Cart has <?php echo count($_SESSION['cart']); ?> items</fieldset> </h6>
				
			</td>
			<td>
				&nbsp
			</td>
			<td align="right">
				<form action="shopping_cart.php" method="post">
					<input type="submit" value="Manage Shopping Cart">
				</form>
			</td>
		</tr>	
		<tr>
		<td style="width: 350px" colspan="3" align="center">
			<div id="bookdetails" style="overflow:scroll;height:180px;width:400px;border:1px solid black;background-color:LightBlue">
			<table>
			<?php
			
			while ($row=mysqli_fetch_row($result))
			{	
				echo
			"<form method='post'>
			<tr><td align='left'><button type='submit' name='btnCart' id='btnCart' value='".$row[2]."'>Add to Cart</button></td>
				<td rowspan='2' align='left'>".$row[0]."</br>By ".$row[1]."</br><b>Publisher:</b> ".$row[5].",</br><b>ISBN:</b> ".$row[2]."<b>Price:</b> ".$row[4]."</td>
			</tr>
			<tr>
				<td align='left'><button name='review' onClick='review(\"".$row[2]."\")'>Reviews</button></td>
			</tr>
			<tr>
				<td colspan='2'><p>_______________________________________________</p></td>
			</tr></form>";
			}
			?>
			<?php
				//add vals
				array_push($_SESSION['cart'], $_POST['btnCart']);
				array_push($_SESSION['cart_qty'], 1);
				//remove nulls and re-index
				$_SESSION['cart'] = array_values(array_filter($_SESSION['cart']));
				$_SESSION['cart_qty'] = array_values(array_filter($_SESSION['cart_qty']));
			?>			
			</table>
			</div>
			
			</td>
		</tr>
		<tr>
			<td align= "center">
				<form action="confirm_order.php" method="get">
					<input type="submit" value="Proceed To Checkout" id="checkout" name="checkout">
				</form>
			</td>
			<td align="center">
				<form action="screen2.php" method="post">
					<input type="submit" value="New Search">
				</form>
			</td>
			<td align="center">
				<form action="exit.php" method="post">
					<input type="submit" name="exit" value="EXIT 3-B.com">
				</form>
			</td>
		</tr>
	</table>
</body>
</html>