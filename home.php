<!--
TPS Customer Homepage
Author: Payden Boughton
Changelog: https://github.com/Distantone/www
-->
<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
<style>
.active {
  background-color: #4CAF50;
}
</style>
<ul>
  <li><a href="index.php">Home</a></li>
  <li style="float:right"><a class="active" href="index.php?logout='1'">LogOut</a></li>
</ul>
	<div class="header">
		
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info"
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<input type="submit" value="Staff Request"  onclick="window.location='staff_request.php';">
						<input type="submit" value="Search Staff Request"  onclick="window.location='Search_staff_request.php';">
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>

</html>