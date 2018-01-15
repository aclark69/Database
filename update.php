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
$sql = "UPDATE customer 
	SET pin = '$pin', fname =  '$first_name', lname = '$last_name', address = '$address', city = '$city', stt = '$state', zip = '$zip', ccard = '$ccard', cnum = '$cnum', expir = '$expir'
	WHERE uname = '$user_name'";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
<html>
	<meta http-equiv="refresh" content="2;url=confirm_order.php">
</html>