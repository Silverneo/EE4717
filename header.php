<header>
	<div id="logo-box">
	<img id="logo" src="images/logo.png">
	</div>
	<nav>
		<ul class="nav-left">
			<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="facility.php">Facility</a></li>
			<li><a href="membership.php">Membership</a></li>
			<li><a href="tryus.php">Try Us</a></li>
		</ul>
		<ul class="nav-right">
			<?php
			session_start();
			if (isset($_SESSION['valid_user']) && isset($_SESSION['user_id']))
			{
				echo '<li><a href="member.php">'.$_SESSION['valid_user'].'</a></li>';
				echo '<li><a href="sign-out.php"><i class="fa fa-sign-out"></i> Sign Out</a></li>';
			}
			else
			{
				echo '<li id="sign-in-list"><a href="#popup-box" class="popup-window"><i class="fa fa-sign-in"></i> Sign In</a></li>';
			}
			?>
			<li><a href="facility-booking.php">Book Now</a></li>
		</ul>
	<div class="clear"></div>
	</nav>
	<div id="popup-box" class="popupInfo">
		<h2>Sign In</h2>
		<form action="sign-in.php" method="post" id="Sign-In">
			<input type="email" placeholder="E-mail" name="Email"><br>
			<input type="password" placeholder="Password" name="Password"><br>
			<input type="submit" name="Submit" value="Sign In"><br>
			<button type="button" class="close"><i class="fa fa-close"></i></button><br>
			<a href="tryus.php">Don't have an account? Try us</a>
		</form>
	</div>
	<script src="js/popup.js"></script>
</header>