<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registration system PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="styletest.css">
	</head>


	<body>
		<form method="post" action="login.php">

			<?php echo display_error(); ?>
			<h1>Login</h1>
			<div class="input-group">
				<input type="text" placeholder="Enter Username" name="username" >
			</div>
			<div class="input-group">
				<input type="password" placeholder="Enter Password" name="password">
			</div>
				<input type="submit" value="Login" name="login_btn">
		
			<h3>Not yet a member?</h3>
				<input type="submit" value="Register" name="reg_btn">
		
	</form>
</body>
</html>