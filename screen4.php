<!-- screen 4: Book Reviews by Prithviraj Narahari, php coding: Alexander Martens-->

<?php

	$curisbn = $_GET['isbn'];

  $link = mysqli_connect("localhost", "201709_471_g03", "CGpApM1cPsKIdlVlYHKH", "201709_471_g03");
 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

  //pull author and title data from database
  $bookquery = "SELECT author, title FROM books WHERE isbn=".$curisbn;
  mysqli_query($link, $bookquery) or die('Error querying database.');
  $bookResult = mysqli_query($link, $bookquery);
  $brow = mysqli_fetch_row($bookResult);
  
  //pull review data from database
  $reviewquery  = "SELECT info FROM reviews WHERE isbn=".$curisbn;
  mysqli_query($link, $reviewquery) or die('Error querying database.');
  $reviewResult = mysqli_query($link, $reviewquery);
 
  //Close a connection
  function db_close() {
    global $link;
    @mysqli_close($link);
  }

?>

<html>
<head>
<title>Book Reviews - 3-B.com</title>
<style>
.field_set
{
	border-style: inset;
	border-width:4px;
}
</style>
</head>
<body>
	<table align="center" style="border:1px solid blue;">
		<tr>
			<td align="center">
				<h5> Reviews For: <?php echo $brow[1]; ?></h5>
			</td>
			<td align="center">
				<br>
				<p> By: <?php echo $brow[0]; ?></p>
			</td>
		</tr>
			
		<tr>
			<td colspan="2">
			<div id="bookdetails" style="overflow:scroll;height:200px;width:300px;border:1px solid black;">
			<table>
					<?php   while ($row=mysqli_fetch_row($reviewResult))
							{
								echo "<tr><td>".$row[0]."</td></tr><br>";
							}
					?>
			</table>
			</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<form action="screen2.php" method="post">
					<input type="submit" value="Done">
				</form>
			</td>
		</tr>
	</table>

</body>

</html>
 