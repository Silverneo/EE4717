<!DOCYTYPE html>
<html lang="en">
<head>
<title>Register Result</title>
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
<li><a href="login.html">Sign in</a></li>
<li><a href="">Search(TBD)</a></li>
</ul>
<div class="clear"></div>
</nav>
</header>
<div class = "content">
<?php // register.php
include "conn_f31s23.php";
if (isset($_POST['submit'])) {
	if (empty($_POST['Name']) || empty ($_POST['Password']) || 
		empty ($_POST['Contact']) || empty($_POST['Email'])) {
	echo "All records should be filled in!";
	exit;}
	}

//value check to be added!!!


$Name     = $_POST['Name'];
$Password = $_POST['Password'];
$Contact  = $_POST['Contact'];
$Email    = $_POST['Email'];

$Password = md5($Password);

$sql = "INSERT INTO FitTastic_Users (name, contact, password, email) 
		VALUES ('$Name', '$Contact', '$Password', '$Email')";

echo "<br>".$sql."<br>";
$result = mysql_query($sql);

if (!$result) 
	echo "Your registration has failed due to unknown reason, please try again later.";
else
	echo "Welcome ". $username . ". You are now registered";
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