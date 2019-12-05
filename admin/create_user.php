<!--
TPS create_user.php
Author: Payden Boughton
Changelog: https://github.com/Distantone/www
-->

<?php include('../functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL - Create user</title>
	<link rel="stylesheet" type="text/css" href="../styletest.css">
	
</head>
<body>
<style>

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

	
	<form method="post" action="create_user.php">
		<h2>Admin - create user</h2>
		<?php echo display_error(); ?>

		<div class="input-group">
			<input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<input type="email" placeholder="Enter Email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<input type="text" placeholder="Enter UserType" name="user_type">
		</div>
		<div class="input-group">
			<input type="password" placeholder="Enter Password" name="password_1">
		</div>
		<div class="input-group">
			<input type="password" placeholder="Confirm Password" name="password_2">
		</div>
		<div class="input-group">			
			<input type="submit" value="Create User" name="register_btn">
		</div>
	</form>
</body>
</html>