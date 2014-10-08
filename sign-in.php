<!DOCYTYPE html>
<html lang="en">
<head>
<title>Sign-in Result</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
<header>
<div id="logo-box">
<img id="logo" src="images/logo.png">
</div>
<nav>
<ul class="nav-left">
<li><a href="index.html">Home</a></li>
<li><a href="facility.html">Facility</a></li>
<li><a href="membership.html">Membership</a></li>
<li><a href="gettinghere.html">Getting Here</a></li>
<li><a href="tryus.html">Try Us</a></li>
</ul>
<ul class="nav-right">
<li><a href="sign-in.html">Sign in</a></li>
<li>
<form id="search">
<input type="text" placeholder="Search..." required>
<input type="button" value="Search">
</form>
</li>
</ul>
<div class="clear"></div>
</nav>
</header>
<div class="content">
<?php //sign-in.php

session_start();

if (isset($_POST['submit'])) {
	if (empty($_POST['Name']) || empty ($_POST['Password']) || 
		empty ($_POST['Contact']) || empty($_POST['Email'])) {
	echo "All records should be filled in!";
	exit;}
	}
	
$email = $_POST['Email'];
$password = $_POST['Password'];

$db_conn = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

if (mysqli_connect_errno()) {
echo 'Connection to database failed:'.mysqli_connect_error();
exit();
}

$query = 'select * from FitTastic_Users '
	   ."where email='$email'"
	   ." and password='$password'";

$result = $db_conn->query($query);
if ($result->num_rows >0 )
{
	// if they are in the database register the user id
	$_SESSION['valid_user'] = $userid;    
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
</div>
<footer>
<ul>
<li>Contact Us</li>
<li>Membership</li>
<li>Sign up</li>
</ul>
<p style="float: left"><small>Copyright &copy; Fit-Tastic!</small></p>
<div class="clear"></div>
<ul id="footer-social">
<li><A href="http://www.facebook.com"><IMG src="images/facebook.jpg" alt="Facebook" id = "social-logo"></a></li>
<li><A href="http://www.twitter.com"><IMG src="images/Twitter.jpg" alt="Twitter" id = "social-logo"></a></li>
<li><A href="http://www.youtube.com"><IMG src="images/Youtube.jpg" alt="Youtube" id = "social-logo"></a></li>
</ul>
<div class="clear"></div>
</footer>
</div>
</body>
</html>