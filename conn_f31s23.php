<?php
$dbcnx=@mysql_connect('localhost','f31s23','f31s23');
if (!$dbcnx)
	die("Could not connect to mysql");
if (!@mysql_select_db ("f31s23"))
	die("Could not find the database");
?>