<!DOCYTYPE html>
<html lang="en">
<head>
<title>Try Us</title>
<meta charset="utf-8">
<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
<script src="js/validate.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
</head>
<body>
<div class="wrapper">
	<?php include 'header.php'; ?>
	<div class="content">
		<div style="width: 80%; text-align: center; margin-left: 10%; margin-top: 100px;">
			<h1>Sign Up Now</h1>
			<p style="margin: 20px auto;"><i class="fa fa-quote-left fa-border"></i>
				Sign up as a <b>Fit-Tastic! member</b> and gain access to our facilities and classes - <b>all for FREE!</b>
				<i class="fa fa-quote-right fa-border"></i>
			</p>
		</div>
		<div class="form-back">
			<form action="register.php" method="post" class="sign-form" id="Sign-Up">
				<input type="text" name="Name" id="Name" placeholder="Your name">
				<br>
				<input type="text" name="Contact" id="Contact" placeholder="Phone number">
				<br>
				<input type="email" name="Email" id="Email" placeholder="E-mail">
				<br>
				<input type="password" name="Password" id="Password" placeholder="Password">
				<br>
				<input type="password" name="Password2" id="Password2" placeholder="Confirm password">
				<br>
				<input type="submit" name="Submit" value="Sign Up">
				<br>
			</form>
		</div>
	</div>
	<?php include 'footer.php' ?>
</div>
</body>
</html>