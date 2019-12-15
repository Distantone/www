<!--
TPS information.php
Author: Payden Boughton
Changelog: https://github.com/Distantone/www
-->
<?php include('../functions.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Staff Information</title>
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
		<li><a href="home.php">Home</a></li>
		<li style="float:right"><a class="active" href="home.php?logout='1'">LogOut</a></li>
	</ul>

	
	<form method="post" enctype="multipart/form-data">
		<h2>Enter your information</h2>
		<?php echo display_error(); ?>
		

		<div class="input-group">
			<input type="text" placeholder="Enter Name" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<input type="email" placeholder="Enter Email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<input type="text" placeholder="Enter Experience" name="experience" value="<?php echo $experience; ?>">
		</div>
		<div class="input-group">
			<input type="text" placeholder="Enter Education" name="education" value="<?php echo $education; ?>">
		</div>
		<div class="input-group">
			<input type="text" placeholder="Enter Salary" name="salary" value="<?php echo $salary; ?>">
		</div>
		<div class="input-group">
			<input type="text" placeholder="Enter Location" name="location" value="<?php echo $location; ?>">
		</div>
		<div class="input-group">
			<input type="text" placeholder="Enter Availability" name="available" value="<?php echo $available; ?>">
		</div>
		<div>
		Select Resume to Upload:
			<input type="file" name="file" />
		</div>
		<div>
			Select Profile Picture to Upload:
			<input type="file" name="profile" />
		</div>
		<div>			
		<input type="submit" value="Submit" name="staffinformation_btn">	
		</div>	
	</form>
	
	</body>
</html>