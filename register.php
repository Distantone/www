<!--
TPS register.php
Author: Payden Boughton
Changelog: https://github.com/Distantone/www
-->
<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system</title>
	<link rel="stylesheet" type="text/css" href="styletest.css">
</head>
<body>
	<div class="header">
		
	</div>
	
	<form method="post" action="register.php">
		<h1>Register</h1>
		<?php echo display_error(); ?>

		<div class="input-group">
			
			<input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			
			<input type="email" placeholder="Enter Email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			
			<input type="password" placeholder="Enter Password" name="password_1">
		</div>
		<div class="input-group">
			
			<input type="password" placeholder="ReEnter Password" name="password_2">
		</div>
		
		
		<input type="submit" value="Register" name="register_btn">
		<p>
		<h3>Already a member?</h3>
		 <input type="submit" value="Login" name="log_btn">
		</p>
	</form>
</body>
</html>