<!DOCYTYPE html>
<html lang="en">
<head>
<title>Book Now</title>
<meta charset="utf-8">
<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
</head>
<body>
<div class="wrapper">
	<?php include 'header.php'; ?>
	<div class="content">
		<div style="width: 80%; text-align: center; margin-left: 10%; margin-top: 100px;">
			<h1>Book Now</h1>
			<p style="margin: 20px auto;"><i class="fa fa-quote-left fa-border"></i>
				Make the booking below, your facility is just one step away! 
				<i class="fa fa-quote-right fa-border"></i>
			</p>
		</div>
	
	<?php

	$mysqli = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

	$open_time = 9;
	$close_time = 22;

	$query = "SELECT * FROM FitTastic_Facilities ORDER BY facility_name";

	$result = $mysqli->query($query);

	if ($result)
	{
		// booking-form
		echo '<div class="form-back">';
		echo '<form action="booking.php" method="post" class="sign-form">';
		
		// facility selection
		echo '<span>Facility</span>';
		echo '<select size="1" name="facility">';
		while($row = $result->fetch_assoc())
			echo '<option value="'.strval($row['facility_id']).'">'.$row['facility_name'].'</option>';
		echo '</select>';
		$result->free();
		
		echo '<br>';
		
		// date selection
		$start_date = date("Y-m-d", strtotime("tomorrow"));
		$end_date = date("Y-m-d", strtotime("+1 week"));
		
		echo '<span>Date</span>';
		//echo '<input type="date" name="date" min="'.$start_date.'" max="'.$end_date.'">';
		
		echo '<select size="1" name="date">';
		
		while(strtotime($start_date) <= strtotime($end_date))
		{
			echo "<option value='$start_date'>$start_date</option>";
			$start_date = date("Y-m-d", strtotime("+1 day", strtotime($start_date)));
		}
		
		echo '</select>';
		
		echo '<br>';
		
		// beginning and ending time selection
		echo '<span>From</span>';
		echo '<select size="1" name="beg_time">';
		for ($hour = $open_time; $hour < $close_time; $hour++)
		{
			echo '<option value="'.str_pad($hour, 2, 0, STR_PAD_LEFT)
				.':00:00">'.str_pad($hour, 2, 0, STR_PAD_LEFT).':00</option>';
		}
		echo '</select>';
		
		echo '<br>';
		
		echo '<span>To</span>';
		echo '<select size="1" name="end_time">';
		for ($hour = $open_time + 1; $hour < $close_time + 1; $hour++)
		{
			echo '<option value="'.str_pad($hour, 2, 0, STR_PAD_LEFT)
				.':00:00">'.str_pad($hour, 2, 0, STR_PAD_LEFT).':00</option>';
		}
		echo '</select>';
		echo '<br>';
		
		echo '<input type="submit" name="Submit" value="Book Now">';
		echo '</form>';
		echo '</div>';
	}

	$mysqli->close();

	?>
	</div>
	<?php include 'footer.php' ?>
</div>
</body>
</html>