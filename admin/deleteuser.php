<!--
TPS delete.php
Author: Payden Boughton
Changelog: https://github.com/Distantone/www
-->
<?php
include('../functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
	$username = $_GET['username'];

	$query = "DELETE from users WHERE username='$username'";
	mysqli_query($db, $query);
header("Location: viewusers.php");
?>