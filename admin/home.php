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
	<link rel="stylesheet" type="text/css" href="../styletest.css">
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
  <li><a href="view.php">Staff Request Management</a></li>
  <li><a href="create_user.php">Create User</a></li>
  <li style="float:right"><a class="active" href="home.php?logout='1'">LogOut</a></li>
</ul>
	<div class="header">
		<h2>Admin - Home Page</h2>
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
			<img src="../images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" style="color: red;">logout</a>
						&nbsp; <a href="create_user.php"> + add user</a>
						&nbsp; <a href="staff_request.php"> + Request Staff</a>
						&nbsp; <a href="view.php"> + View Staff Requests</a>
					</small>

				<?php endif ?>
			</div>
		</div>



	</div>
		
</body>
</html>