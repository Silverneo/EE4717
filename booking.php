<?php // back-end booking processing

session_start();

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

$mysqli = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');


//booking verification!!!
//$query = "SELECT * FROM FitTastic_Reservations WHERE facility_id = '$facility'";





$query = "INSERT INTO FitTastic_Reservations (facility_id, user_id, beg_time, end_time)
			VALUES ('$facility', '".$_SESSION['user_id']."', '$beg_time', '$end_time')";

$result = $mysqli->query($query);

if (!$result)
{
	echo "<p>Error!!!!!</p>";
	exit;
}
else
{
	echo "Your booking has been recorded by the system, an e-mail has been sent to you, thank you!";
	// Email sending
}

$mysqli->close();

?>