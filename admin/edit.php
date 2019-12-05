<!--
TPS edit.php
Author: Payden Boughton
Changelog: https://github.com/Distantone/www
-->
<?php 
	include('../functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Requests</title>
<link rel="stylesheet" type="text/css" href="../styletest.css">
</head>
<body>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
</style>
<ul>
  <li><a href="/admin/home.php">Home</a></li>
  <li><a href="view.php">Staff Request Management</a></li>
  <li><a href="create_user.php">Create User</a></li>
  <li style="float:right"><a class="active" href="home.php?logout='1'">LogOut</a></li>
</ul>
	
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<form method="post" action="">
<?php


$reference_number = $_GET['reference_number'];
$user = $_GET['user'];
$data = $_GET['data'];
$location_of_work = $_GET['location_of_work'];
$type_of_work = $_GET['type_of_work'];
$salary = $_GET['salary'];
$date = $_GET['date'];
$status = $_GET['status'];

?>


<div>
<h2>Edit Staff Request</h2>
<p><label><strong>Reference Number:</strong></label> <?php echo $reference_number; ?></p>




		
		
		
	<div class="input-group">
		<input type="text" placeholder="Enter Customer Name" name="user" value="<?php echo $user; ?>"/><br/>
	</div>
	<div class="input-group">
	 <input type="text" placeholder="Enter Staff Name" name="data" value="<?php echo $data; ?>"/><br/>
	</div>
	<div class="input-group">
		<input type="text" placeholder="Enter Location of Work" name="location_of_work" value="<?php echo $location_of_work; ?>"/><br/>
	</div>
	<div class="input-group">
		<input type="text" placeholder="Enter Type of Work" name="type_of_work" value="<?php echo $type_of_work; ?>"/><br/>
	</div>
	<div class="input-group">
		<input type="text" placeholder="Enter Salary" name="salary" value="<?php echo $salary; ?>"/><br/>
	</div>
	<div class="input-group">
		<input type="text" placeholder="<?php echo $date; ?>" name="date" value="<?php echo $date; ?>"/><br>
	</div>
	
	<div class="input-group">
			<label>Status: *</label>
			<select name="status"  value="<?php echo $status; ?>" >
				<option value="pending">Pending</option>
				<option value="Complete">Complete</option>
				<option value="Unavailable">Unavailable</option>
			</select>
		</div>
	<div class="input-group">
		<input  type="submit" class="btn" name="update_btn" value="Submit">
	</div>

</div>

</form>

</body>

</html>
