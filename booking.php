<?php // back-end booking processing

session_start();

# empty field check
if (isset($_POST['submit'])) {
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
	echo "The start time should be smaller thatn the end time, please reselect!";
	exit();
}

# connect to the database server
$mysqli = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

# booking time slot validation

# select violated time slot (improvement TODO)
$query = "SELECT * FROM FitTastic_Reservations WHERE facility_id = '$facility' AND (beg_time < '$end_time' AND end_time > '$beg_time')";

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
		echo "Your booking has been recorded by the system, an e-mail has been sent to you, thank you!";
		# Email sending TODO
	}
}
# close the database connection
$mysqli->close();
?>