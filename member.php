<?php
session_start();

if (!isset($_SESSION['valid_user'])) {
echo '<p>You are not signed in.</p>';
echo '<p>Please sign in first...</p>';
header('Refresh: 2; URL = index.php');
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
		<?php	//member information page
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
		?>
	</div>
	<?php include 'footer.php' ?>
</div>
</body>
</html>
<?php } ?>