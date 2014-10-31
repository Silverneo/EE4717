<?php //sign-in.php

session_start();

if (isset($_POST['Submit'])) {
	if (empty ($_POST['Password']) || empty($_POST['Email'])) {
	echo "All records should be filled in!";
	exit;}
	}
	
$email = $_POST['Email'];
$password = $_POST['Password'];

$password = md5($password);

$mysqli = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}

$query = 'select * from FitTastic_Users '
	   ."where email='$email'"
	   ." and password='$password'";

$result = $mysqli->query($query);
if ($result->num_rows > 0 )
{
    $row = $result->fetch_assoc();

	$_SESSION['valid_user'] = $row['name'];
	$_SESSION['user_id'] = $row['user_id'];
	echo "<p>Welcome ".$_SESSION['valid_user'].". Redirect to the previous page now...</p>";
	header('Refresh: 2; URL = ' . $_SERVER['HTTP_REFERER']);
} 
else 
{
	echo '<p>Cannot log you in, redirect to the previous page now...</p>';
	header('Refresh: 2; URL = ' . $_SERVER['HTTP_REFERER']);
}

$mysqli->close();
?>