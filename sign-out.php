<?php
session_start();

// store to test if they *were* logged in
$old_user = $_SESSION['valid_user'];  
unset($_SESSION['valid_user']);
session_destroy();
if (!empty($old_user))
{
	// signed in already, sign out normally
	echo '<p>Sign out successfully!'.$old_user.'</P>';
	header('Refresh: 2; URL = index.php');
}
else
{
	// come to this page unusually 
	echo '<p>You have not signed in!</P>';
	header('Refresh: 2; URL = index.php');
}
?>