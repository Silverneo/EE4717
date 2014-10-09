<!DOCYTYPE html>
<html lang="en">
<head>
<title>Fit-Tastic!</title>
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
<?php
session_start();
if (isset($_SESSION['valid_user'])
{
	echo '<li><a href="member.php">'.$_SESSION['valid_user'].'</a></li>';
	echo '<li><a href="sign-out.php">Sign Out</a></li>';
}
else
{
	echo '<li><a href="sign-in.html">Sign in</a></li>';
}
?>
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
<div><img src="images/intro.jpg" alt="Fit-Tastic!" id="intro-photo"></div>
<div class="section-box">
<section>Facility</section>
<section>Class Timetable</section>
<section>Membership</section>
</div>
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