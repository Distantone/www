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

$result = getUser();

// display data in table
echo "<table class='table-fill'>";

echo "<tr> 
<td>User Name</td>
 <td>Email</td> 
 <td>User Type</td>
 <td>Resume</td>
 <td>Profile</td>
 <td> </td>
 <td> </td></tr>";



// loop through results of database query, displaying them in the table

while($row = mysqli_fetch_assoc( $result )) {



// echo out the contents of each row into a table

echo "<tr>";
echo '<td>' . $row['username'] . '</td>';
echo '<td>' . $row['email'] . '</td>';
echo '<td>' . $row['user_type'] . '</td>';
echo '<td>' . $row['resume'] . '</td>';
echo '<td>' . $row['profile'] . '</td>';

echo '<td><a href="edit.php?username=' . $row['username'] . '
& email=' . $row['email'] . '
& user_type=' . $row['user_type'] . '
& resume=' . $row['resume'] . '
& profile=' . $row['profile'] . '

">Edit</a></td>';

echo '<td><a href="delete.php?username=' . $row['username'] . '">Delete</a></td>';

echo "</tr>";

}


echo "</table>";

?>






</form>

</body>





 
</html>