<?php	//member information page

session_start();
var_dump($_SESSION);

if (isset($_SESSION['valid_user']))
{
	echo '<p>Welcome '.$_SESSION['valid_user'].'!</p>';
	$db_conn = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

	if (mysqli_connect_errno()) {
	echo 'Connection to database failed:'.mysqli_connect_error();
	exit();
	}

	$query ='SELECT beg_time, end_time, facility_name '
			.'FROM FitTastic_Reservations, FitTastic_Facilities '
			."WHERE FitTastic_Reservations.user_id ='".$_SESSION['user_id']."' AND FitTastic_Reservations.facility_id = FitTastic_Facilities.facility_id";

	$result = $db_conn->query($query);
	
	if ($result->num_rows > 0 )
	{
		echo '<p>You have booked the following facilities: </p>';
		$i = 1;
		echo '<table border="1">';
		echo '<tr><th>No.</th><th>Facility</th><th>Start</th><th>End</th></tr>';
		while ($row = $result->fetch_assoc())
		{
			echo '<tr><th>'.$i.'</th><th>'.$row['facility_name'].'</th><th>'.$row['beg_time'].'</th><th>'.$row['end_time'].'</th></tr>';
			$i = $i + 1;
		}
		echo '</table>';
	}
	else
	{
		echo '<p>You have not booked any facilities right now.</p>';
	}
	
	
	
	
	
	
	echo '<a href="sign-out.php">Sign Out</a>';	
}
else
{
	echo '<p>You are not signed in.</p>';
	echo '<p>Please sign in first...</p>';
	header('Refresh: 2; URL = sign-in.html');	
}
?>