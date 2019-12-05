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
	$reference_number = $_GET['reference_number'];

	$query = "DELETE from staff_requests WHERE reference_number='$reference_number'";
	mysqli_query($db, $query);
header("Location: view.php");
?>