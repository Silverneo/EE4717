<!DOCYTYPE html>
<html lang="en">
<head>
<title>Booking</title>
<meta charset="utf-8">
<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<div class="wrapper">
	<?php include 'header.php'; ?>
	<div class="content">
	<br>
	<br>
	<?php

	$mysqli = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

	$open_time = 9;
	$close_time = 22;

	$query = "SELECT * FROM FitTastic_Facilities ORDER BY facility_name";

	$result = $mysqli->query($query);

	if ($result)
	{
		// booking-form
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
		
		echo '<span>To</span>';
		echo '<select size="1" name="end_time">';
		for ($hour = $open_time + 1; $hour < $close_time + 1; $hour++)
		{
			echo '<option value="'.str_pad($hour, 2, 0, STR_PAD_LEFT)
				.':00:00">'.str_pad($hour, 2, 0, STR_PAD_LEFT).':00</option>';
		}
		echo '</select>';
		echo '<br>';
		
		echo '<input type="submit" name="Submit" value="book">';
		echo '</form>';
	}

	$mysqli->close();

	?>
	</div>
	<?php include 'footer.php' ?>
</div>
</body>
</html>