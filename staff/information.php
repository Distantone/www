<?php include('../functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Information</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Register your information</h2>
	</div>
	
	<form method="post" action="submit.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>experience</label>
			<input type="text" name="experience" value="<?php echo $experience; ?>">
		</div>
		<div class="input-group">
			<label>education</label>
			<input type="text" name="education" value="<?php echo $education; ?>">
		</div>
		<div class="input-group">
			<label>salary</label>
			<input type="text" name="salary" value="<?php echo $salary; ?>">
		</div>
		<div class="input-group">
			<label>location</label>
			<input type="text" name="location" value="<?php echo $location; ?>">
		</div>
		<div>
		
		<button type="submit" class="btn" name="staffinformation_btn">Submit</button>
	</form>
	
</body>
</html>