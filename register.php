<?php // member registration

if (isset($_POST['Submit'])) {
	if (empty($_POST['Name']) || empty ($_POST['Password']) || 
		empty ($_POST['Contact']) || empty($_POST['Email'])) {
	echo "All records should be filled in!";
	exit;}
	}

// value check to be added!!!

$Name     = $_POST['Name'];
$Password = $_POST['Password'];
$Contact  = $_POST['Contact'];
$Email    = $_POST['Email'];

# connect to the database server
$mysqli = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

$Password = md5($Password);

$query = "INSERT INTO FitTastic_Users (name, contact, password, email) 
		VALUES ('$Name', '$Contact', '$Password', '$Email')";

$result = $mysqli->query($query);

if (!$result) 
{
	if ($mysqli->errno == 1062)	//duplicate key
	{
		echo "<p>The email you enter has been registered, please try again!</p>";
	}
	else
		echo "<p>Your registration has failed due to unknown reason, please try again later.</p>";
}
else
{
	echo "<p>Welcome ". $Name . ". You are now registered.</p>";
	echo "<p>You can sign in now to enjoy our services!</p>";
	echo "<p>Redirect to the previous page now...</p>";
	header('Refresh: 2; URL = ' . $_SERVER['HTTP_REFERER']);
}
?>