<?php // member registration

// sql server connection style is not good, use mysqli instead
include "conn_f31s23.php";
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

$Password = md5($Password);

$sql = "INSERT INTO FitTastic_Users (name, contact, password, email) 
		VALUES ('$Name', '$Contact', '$Password', '$Email')";

//echo "<br>".$sql."<br>";
$result = mysql_query($sql);

if (!$result) 
{
	if (mysql_errno() == 1062)	//duplicate key
	{
		echo "The email you enter has been registered, please try again!";
	}
	else
		echo "Your registration has failed due to unknown reason, please try again later.";
		//die('Invalid query: '.mysql_error());
}
else
{
	echo "Welcome ". $Name . ". You are now registered";
}
?>