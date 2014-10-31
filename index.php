<!DOCYTYPE html>
<html lang="en">
<head>
<title>Fit-Tastic!</title>
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
		<span style="position: absolute; top: 180px; width: 350px; left: 800px; font-size: 50px;
			z-index: 1; font-weight: 600; font-family: century gothic; color: white;
			background: rgba(51, 51, 51, 0.3); border-radius: 10px;">
			Keep fit and be Fit-Tastic!
		</span>
		<div class="slider">
			<img id="1" src="images/slider1.jpg" border="0" alt ="Fit-Tastic!">
			<img id="2" src="images/slider2.jpg" border="0" alt ="Fit-Tastic!">
			<img id="3" src="images/slider3.jpg" border="0" alt ="Fit-Tastic!">
			<img id="4" src="images/slider4.jpg" border="0" alt ="Fit-Tastic!">
			<img id="5" src="images/slider5.jpg" border="0" alt ="Fit-Tastic!">
		</div>
		<h1><i class="fa fa-heart-o"></i>UR CLUB</h1>
		<div class="section-box">
			<section>
				<span class="flip"><a href="facility.php"><i class="fa fa-arrow-circle-right"></i> Facility</a></span>
				<img src="images/intro-facility.jpg">
			</section>
			<section>
				<span class="flip"><a href="membership.php"><i class="fa fa-arrow-circle-right"></i> Membership</a></span>
				<img src="images/intro-membership.jpg">
			</section>
		</div>
		<script src="js/slider.js"></script>
	</div>
	<?php include 'footer.php' ?>
</div>
</body>
</html>