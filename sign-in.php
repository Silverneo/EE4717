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

$db_conn = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

if (mysqli_connect_errno()) {
echo 'Connection to database failed:'.mysqli_connect_error();
exit();
}

$query = 'select * from FitTastic_Users '
	   ."where email='$email'"
	   ." and password='$password'";

$result = $db_conn->query($query);
if ($result->num_rows > 0 )
{
    $row = $result->fetch_assoc();
	//echo $row['name'];
	// if they are in the database register the user id
	$_SESSION['valid_user'] = $row['name'];  
	echo '<p>Log in Successfully, redirect to the home page...</P>';
	header('Refresh: 2; URL = index.html');
} 
else 
{
	echo '<p>Cannot log you in, please try again...</p>';
	header('Refresh: 2; URL = sign-in.html');
}

$db_conn->close();
?>