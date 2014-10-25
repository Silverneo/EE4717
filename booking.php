<?php // back-end booking processing

session_start();

if (!isset($_SESSION['valid_user']))
{
	echo '<p>You are not signed in.</p>';
	echo '<p>Redirect to the previous page now...</p>';
	header('Refresh: 2; URL = ' . $_SERVER['HTTP_REFERER']);
}
else
{
# empty field check
if (isset($_POST['Submit'])) {
	if (empty($_POST['facility']) || empty ($_POST['date']) || 
		empty ($_POST['beg_time']) || empty($_POST['end_time'])) {
	echo "All records should be filled in!";
	exit;}
}

$facility = $_POST['facility'];
$date = $_POST['date'];
$beg_time = $_POST['beg_time'];
$end_time = $_POST['end_time'];

$beg_time = $date.' '.$beg_time;
$end_time = $date.' '.$end_time;

# start and end time check
if ($beg_time >= $end_time)
{
	echo "The start time should be smaller than the end time, please reselect!";
	exit();
}

# connect to the database server
$mysqli = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

# booking time slot validation

# select violated time slot (improvement TODO)
$query = "SELECT * FROM FitTastic_Reservations WHERE (facility_id = '$facility' "
		."OR user_id = '".$_SESSION['user_id']."') AND (beg_time < '$end_time' AND end_time > '$beg_time')";

$result = $mysqli->query($query);

if ($result->num_rows > 0)	// violated time slot exists
{
	echo "The facility you choose has been booked from <br>";
	while($row = $result->fetch_assoc())
		echo $row['beg_time']." to ".$row['end_time']."<br>";
	echo "Please choose another time slot :)";
}
else	// insert the booking information to database
{
	$query = "INSERT INTO FitTastic_Reservations (facility_id, user_id, beg_time, end_time)
				VALUES ('$facility', '".$_SESSION['user_id']."', '$beg_time', '$end_time')";

	$result = $mysqli->query($query);

	if (!$result)
	{
		echo "<p>Error update information!</p>";
		exit;
	}
	else
	{
		# Email sending TODO
		$query = "SELECT email, facility_name from FitTastic_Users, FitTastic_Facilities "
				."WHERE FitTastic_Users.user_id = '".$_SESSION['user_id']."' AND FitTastic_Facilities.facility_id = '$facility'";
		
		$result = $mysqli->query($query);
		
		if($result->num_rows >= 1)
		{
			$row = $result->fetch_assoc();
			$to      = $row['email'];
			$subject = 'Booking reminder from FitTastic! Website';
			$message = 'Dear '.$_SESSION['valid_user'].', you have booked '.$row['facility_name'].' from '.$beg_time.' to '.$end_time.'. Enjoy your exercising!';
			$headers = 'From: f31s23@localhost' . "\r\n" .
				'Reply-To: f31s23@localhost' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers,'-ff31s23@localhost');
			echo "<p>Your booking has been recorded by the system, an e-mail has been sent to you, thank you!</p>";
			echo "<p>Redirect to the previous page now...</p>";
			header('Refresh: 2; URL = ' . $_SERVER['HTTP_REFERER']);
		}
		else
		{
			echo "<p>Something must be wrong right now, please try again later!</p>";
			echo "<p>Redirect to the previous page now...</p>";
			header('Refresh: 2; URL = ' . $_SERVER['HTTP_REFERER']);
		}
	}
}
# close the database connection
$mysqli->close();
}
?>