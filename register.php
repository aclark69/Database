<?php
$link = mysqli_connect("localhost", "201709_471_g03", "CGpApM1cPsKIdlVlYHKH", "201709_471_g03");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$user_name = mysqli_real_escape_string($link, $_REQUEST['username']);
$pin = mysqli_real_escape_string($link, $_REQUEST['pin']);
$first_name = mysqli_real_escape_string($link, $_REQUEST['firstname']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['lastname']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$state = mysqli_real_escape_string($link, $_REQUEST['state']);
$zip = mysqli_real_escape_string($link, $_REQUEST['zip']);
$ccard = mysqli_real_escape_string($link, $_REQUEST['credit_card']);
$cnum = mysqli_real_escape_string($link, $_REQUEST['card_number']);
$expir = mysqli_real_escape_string($link, $_REQUEST['expiration']);
 
// attempt insert query execution
$sql = "INSERT INTO customer VALUES ('$user_name', '$pin', '$first_name', '$last_name', '$address', '$city', '$state', '$zip', '$ccard', '$cnum', '$expir')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
<html>
	<meta http-equiv="refresh" content="2;url=shopping_cart.php">
</html>