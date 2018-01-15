<?php
session_start();

$link = mysqli_connect("localhost", "201709_471_g03", "CGpApM1cPsKIdlVlYHKH", "201709_471_g03");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$user_name = mysqli_real_escape_string($link, $_POST['username']);
$pin = mysqli_real_escape_string($link, $_POST['pin']);

$sql = "SELECT uname, pin FROM customer WHERE uname='".$user_name."'";
//try confirming login	
mysqli_query($link, $sql) or die('Username invalid.');
$result = mysqli_query($link, $sql);
$row=mysqli_fetch_row($result);

if($row[1] == $_POST['pin'])
{
	$_SESSION['logged_in'] = True;
	$_SESSION['username'] = $_POST['username'];
}
else
{
	echo 'PIN incorrect.';
}
 
// close connection
mysqli_close($link);
?>
<html>
	<meta http-equiv="refresh" content="2;url=screen2.php">
</html>