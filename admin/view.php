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
<link rel="stylesheet" type="text/css" href="../style2.css">
</head>
<body>
	<div class="header">
		<h2>View Staff Requests</h2>
	</div>
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

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<form method="post" action="">

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