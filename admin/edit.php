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
<link rel="stylesheet" type="text/css" href="../style3.css">
</head>
<body>
	<div class="header">
		<h2>Edit Staff Request</h2>
	</div>
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

<p><label><strong>Reference Number:</strong></label> <?php echo $reference_number; ?></p>


	<div class="input-group">
		<label><strong>Customer Name: *</strong></label> 
		<input type="text" name="user" value="<?php echo $user; ?>"/><br/>
	</div>
	<div class="input-group">
		<label><strong>Staff Name: *</strong></label>  <input type="text" name="data" value="<?php echo $data; ?>"/><br/>
	</div>
	<div class="input-group">
		<label><strong>Location of Work: *</strong></label> <input type="text" name="location_of_work" value="<?php echo $location_of_work; ?>"/><br/>
	</div>
	<div class="input-group">
		<label><strong>Type of Work: *</strong></label> <input type="text" name="type_of_work" value="<?php echo $type_of_work; ?>"/><br/>
	</div>
	<div class="input-group">
		<label><strong>Salary: *</strong></label> <input type="text" name="salary" value="<?php echo $salary; ?>"/><br/>
	</div>
	<div class="input-group">
		<label><strong>Date: *</strong></label> <input type="text" name="date" value="<?php echo $date; ?>"/><br>
	</div>
	<div class="input-group">
		<label><strong>Status: *</strong></label> <input type="text" name="status" value="<?php echo $status; ?>"/><br/>
	</div>
	<p><strong>* Required</strong></p>
	<div class="input-group">
		<button type="submit" class="btn" name="update_btn" value="Submit">Submit</button>
	</div>

</div>

</form>

</body>

</html>
