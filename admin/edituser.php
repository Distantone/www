<!--
TPS editusers.php
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
<link rel="stylesheet" type="text/css" href="../style.css">
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


$username = $_GET['username'];
$email = $_GET['email'];
$user_type = $_GET['user_type'];



?>


<div>
<h2>Edit User</h2>





		
		
		
	<div class="input-group">
		<input type="text" placeholder="Enter UserName" name="username" value="<?php echo $username; ?>"/><br/>
	</div>
	<div class="input-group">
	 <input type="text" placeholder="Enter Email" name="email" value="<?php echo $email; ?>"/><br/>
	</div>
	<div class="input-group">
			<label>User Type: *</label>
			<select name="user_type"  value="<?php echo $user_type; ?>" >
				<option value="user">User</option>
				<option value="staff">Staff</option>
				<option value="admin">Admin</option>
			</select>
		</div>
		<div>
			
		</div>
	
	
	<div class="input-group">
		<input  type="submit" class="btn" name="updateuser_btn" value="Submit">
	</div>

</div>

</form>

</body>

</html>
