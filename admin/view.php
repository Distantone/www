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
<title>View Requests</title>
<link rel="stylesheet" type="text/css" href="../styletest.css">
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
<h2>View Staff Requests</h2>
<?php
// get results from database

$result = getrequests();

// display data in table
echo "<table class='table-fill'>";

echo "<tr> 
<td>Reference Number</td>
 <td>Customer</td> 
 <td>Staff Member</td>
 <td>Location</td> 
 <td>Type of Work</td>
 <td>Salary</td>
 <td>Date</td>
 <td>Status</td>
 <td> </td>
 <td> </td></tr>";



// loop through results of database query, displaying them in the table

while($row = mysqli_fetch_assoc( $result )) {



// echo out the contents of each row into a table

echo "<tr>";
echo '<td>' . $row['reference_number'] . '</td>';
echo '<td>' . $row['user'] . '</td>';
echo '<td>' . $row['data'] . '</td>';
echo '<td>' . $row['location_of_work'] . '</td>';
echo '<td>' . $row['type_of_work'] . '</td>';
echo '<td>' . $row['salary'] . '</td>';
echo '<td>' . $row['date'] . '</td>';
echo '<td>' . $row['status'] . '</td>';

echo '<td><a href="edit.php?reference_number=' . $row['reference_number'] . '
& user=' . $row['user'] . '
& data=' . $row['data'] . '
& location_of_work=' . $row['location_of_work'] . '
& type_of_work=' . $row['type_of_work'] . '
& salary=' . $row['salary'] . '
& date=' . $row['date'] . '
& status=' . $row['status'] . '

">Edit</a></td>';

echo '<td><a href="delete.php?reference_number=' . $row['reference_number'] . '">Delete</a></td>';

echo "</tr>";

}


echo "</table>";

?>






</form>

</body>





 
</html>