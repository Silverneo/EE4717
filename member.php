<!DOCYTYPE html>
<html lang="en">
<head>
<title>Member Page</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<script src="js/sign-in.js" type="text/javascript"></script>
</head>
<body>
<?php

session_start();
var_dump($_SESSION);

if (isset($_SESSION['valid_user']))
{
	echo '<p>Welcome '.$_SESSION['valid_user'].'!</p>';
	echo '<p>You have booked the following facilities: </p>';
	echo '<a href="sign-out.php">Sign Out</a>';
}
else
{
	echo '<p>You are not logged in.</p>';
	echo '<p>Please sign in first...</p>';
	header('Refresh: 2; URL = sign-in.html');	
}


?>
</body>
</html>