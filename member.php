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
		echo "<p>Your booking is not cancelled successfully, please try again later.</p>";
	else
		echo "<p>Your booking is cancelled successfully!</p>";
		
	echo '<p>Redirect to the previous page now...</p>';
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
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
</head>
<body>
<div class="wrapper">
	<?php include 'header.php'; ?>
	<div class="content">
		<div id="member-page">
			<h1>
				<?php echo 'Hi! ' .$_SESSION['valid_user']; ?>
			</h1>
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
					echo '<p style="margin: 20px auto;">';
					echo "<i class=\"fa fa-quote-left pull-left fa-border\"></i> Your booking, our care! The table below shows your booking history,
							if you encounter any problem, please don't hesitate to give us a call.<i class=\"fa fa-quote-right pull-right fa-border\"></i>";
					echo '</p>';
					echo '<table border="1">';
					echo '<tr><td>No.</td><td>Facility</td><td>Start Time</td><td>End Time</td><td>Status</td></tr>';
					while ($row = $result->fetch_assoc())
					{
						echo '<tr><td>'.$i.'</td><td>'.$row['facility_name'].'</td><td>'.$row['beg_time'].'</td><td>'.$row['end_time'].'</td>';
						
						if(strtotime($row['beg_time']) <= time()) {
							echo "<td><i class=\"fa fa-clock-o\"></i> expired</td></tr>";
						} else {
							echo "<td><a href='".$_SEVER['PHP_SELF']."?cancel_id=".$row['reservation_id']."'><i class=\"fa fa-trash\"></i> cancel</a></td></tr>";
						}
						$i = $i + 1;
					}
					echo '</table>';
				}
				else
				{
					echo '<p>Oops! You have not booked any facilities yet.</p>';					
				}
			?>
		</div>
	</div>
	<?php include 'footer.php' ?>
</div>
</body>
</html>
<?php } ?>