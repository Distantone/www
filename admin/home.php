<!--
TPS Administrator Homepage
Author: Payden Boughton
Changelog: https://github.com/Distantone/www
-->
<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
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
		<div class="profile_info">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>	
						<input type="submit" value="Create User"  onclick="window.location='create_user.php';">
						<input type="submit" value="View/Edit User"  onclick="window.location='viewusers.php';">
						<input type="submit" value="Search Staff Request"  onclick="window.location='Search_staff_request.php';">
						<input type="submit" value="Staff Request"  onclick="window.location='../staff_request.php';">
						<input type="submit" value="View/Edit Staff Requests"  onclick="window.location='view.php';">
					</small>

				<?php endif ?>
			</div>
		</div>



	</div>
		
</body>
</html>