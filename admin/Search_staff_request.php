<!--
TPS Search_staff_request.php
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
<title>Staffing Reference Case</title>
<link rel="stylesheet" type="text/css" href="style2.css">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body>
<form method="post" action="">





<div class="input-group">

			
		<table class="table-fill">
		<thead>
                <tr>
					<th class="text-left"> </th>
					<th class="text-left">Reference Number </th>
                    <th class="text-left">Customer</th>
                    <th class="text-left">Staff Member</th>
                    <th class="text-left">Location</th>
					<th class="text-left">Type of Work</th>
					<th class="text-left">Salary</th>
					<th class="text-left">Date</th>
                </tr>
            </thead>
			<?php 
//defining variables
$r = getrequests();
$bg = '#eeeeee'; 
$locate = " ";
$typework = " ";
$sal = " ";
$ary = array();
//pulling data from database

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
//$ary = $row['username'];		
?>

<input type="text" name="refnumber" value="<?php    echo $row['reference_number']; ?>">
 <tr>			<td>
				<?php echo'<input type="checkbox" name="checked[]" value="' . $row['reference_number'] . '" id="' . $row['reference_number'] . '"  /> </td> '  ?>
				</td>
               <td>
                   <?php    echo $row['reference_number']; ?>
               </td>
               <td>
                   <?php     echo $row['user'];?>
               </td>
                <td>
                   <?php     echo $row['data']; ?>
               </td>    
			   <td>
                   <?php     echo $row['location_of_work']; ?>
               </td>  
			   <td>
                   <?php     echo $row['type_of_work']; ?>
               </td>  
			   <td>
                   <?php     echo $row['salary']; ?>
               </td> 
			   <td>
                   <?php     echo $row['date']; ?>
               </td> 

			
		</table>

<?php
    }
?>
<input type="submit" onClick = "this.style.visibility= 'hidden';" class="btn" name="refernce_btn" value="submit"  />
</form>
</body
</html>