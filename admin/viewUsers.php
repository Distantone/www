<!--
TPS viewUsers.php
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
<title>View Users</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<ul>
  <li><a href="/admin/home.php">Home</a></li>
  <li style="float:right"><a class="active" href="home.php?logout='1'">LogOut</a></li>
</ul>
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
body { padding-top: 770px; }
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


</style>

<form method="post" action="">
<h2>View Users</h2>
<?php
// get results from database

$result = getUser();

// display data in table
echo "<table class='table-fill'>";

echo "<tr> 
<td>User Name</td>
 <td>Email</td> 
 <td>User Type</td>
 <td> </td>
 <td> </td></tr>";



// loop through results of database query, displaying them in the table

while($row = mysqli_fetch_assoc( $result )) {



// echo out the contents of each row into a table

echo "<tr>";
echo '<td>' . $row['username'] . '</td>';
echo '<td>' . $row['email'] . '</td>';
echo '<td>' . $row['user_type'] . '</td>';



echo '<td><a href="edituser.php?username=' . $row['username'] . '
& email=' . $row['email'] . '
& user_type=' . $row['user_type'] . '
& password=' . $row['password'] . '


">Edit</a></td>';

echo '<td><a href="deleteuser.php?username=' . $row['username'] . '">Delete</a></td>';

echo "</tr>";

}


echo "</table>";

?>






</form>

</body>





 
</html>