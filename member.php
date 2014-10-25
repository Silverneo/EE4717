<?php
session_start();

if (!isset($_SESSION['valid_user'])) {
echo '<p>You are not signed in.</p>';
echo '<p>Please sign in first...</p>';
header('Refresh: 2; URL = index.php');

} else if (isset($_GET['cancel_id'])) {

	$db_conn = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

	if (mysqli_connect_errno()) {
	echo 'Connection to database failed:'.mysqli_connect_error();
	exit();
	}

	$query = "DELETE FROM FitTastic_Reservations where reservation_id = ".$_GET['cancel_id'];

	$result = $db_conn->query($query);
	
	if(!$result)
		echo "Your booking is not cancelled successfully, please try again later.\n";
	else
		echo "Your booking is cancelled successfully!\n";
		
	echo 'Redirect to the previous page now...';
	header('Refresh: 2; URL = member.php');
	$db_conn->close();
	
	
} else { ?>
<!DOCYTYPE html>
<html lang="en">
<head>
<title>Member Page</title>
<meta charset="utf-8">
<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
<script src="js/validate.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<div class="wrapper">
	<?php include 'header.php'; ?>
	<div class="content">
		<div id="member-page">
			<h2>
				<?php echo $_SESSION['valid_user']; ?>
			</h2>
			<?php	//member information page
				$db_conn = new mysqli('localhost', 'f31s23', 'f31s23', 'f31s23');

				if (mysqli_connect_errno()) {
				echo 'Connection to database failed:'.mysqli_connect_error();
				exit();
				}

				$query ='SELECT reservation_id, beg_time, end_time, facility_name '
						.'FROM FitTastic_Reservations, FitTastic_Facilities '
						."WHERE FitTastic_Reservations.user_id ='".$_SESSION['user_id'].
						"' AND FitTastic_Reservations.facility_id = FitTastic_Facilities.facility_id"
						." ORDER BY beg_time DESC";

				$result = $db_conn->query($query);
				
				if ($result->num_rows > 0 )
				{
					$i = 1;
					echo '<p>Your booking history</p>';
					echo '<table border="1">';
					echo '<tr><td>No.</td><td>Facility</td><td>Start</td><td>End</td><td>Status</td></tr>';
					while ($row = $result->fetch_assoc())
					{
						echo '<tr><td>'.$i.'</td><td>'.$row['facility_name'].'</td><td>'.$row['beg_time'].'</td><td>'.$row['end_time'].'</td>';
						
						if(strtotime($row['beg_time']) <= time()) {
							echo '<td>expired</td></tr>';
						} else {
							echo "<td><a href='".$_SEVER['PHP_SELF']."?cancel_id=".$row['reservation_id']."'>cancel</a></td></tr>";
						}
						$i = $i + 1;
					}
					echo '</table>';
				}
				else
				{
					echo '<p>You have not booked any facilities right now.</p>';
				}
			?>
		</div>
	</div>
	<?php include 'footer.php' ?>
</div>
</body>
</html>
<?php } ?>