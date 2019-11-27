<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Staffing Request Form</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<div class="header">
		<h2>Staff Recruitment</h2>
	</div>
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

<form method="post" action="">


 <table class="table-fill">
            <thead>
                <tr>
					<th class="text-left"> </th>
                    <th class="text-left">Name</th>
                    <th class="text-left">Experience</th>
                    <th class="text-left">Education</th>
					<th class="text-left">Salary</th>
					<th class="text-left">Location</th>
                </tr>
            </thead>

<?php 
//defining variables
$r = getUsers();
$bg = '#eeeeee'; 
$locate = " ";
$typework = " ";
$sal = " ";
$ary = array();
//pulling data from database

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
//$ary = $row['username'];	

	
	
   
  // echo '<tr bgcolor="' . $bg . '">
   //<td align="left" width="(100/5)%">
   //<input type="checkbox" name="checked[]" value="' . $row['username'] . '" id="' . $row['username'] . '"  /> </td>
//<td align="left">' . $row['username'] ."	&nbsp" ." <b>Experience</b>( " . $row['experience']. " )"  ."	&nbsp"." <b>Education</b>( " . $row['education'] ." )"  ."	&nbsp"  ."	&nbsp". " <b>Salary</b>( ". $row['salary'] . " )"  ."	&nbsp" ."	&nbsp" . " <b>Location</b>( " . $row['location']. " )" . '</td>
   //</tr>';

//debugging   echo $_SESSION['user']['username']
//print_r ($ary);
?>


 <tr>			<td>
				<?php echo'<input type="checkbox" name="checked[]" value="' . $row['username'] . '" id="' . $row['username'] . '"  /> </td> '  ?>
				</td>
               <td>
                   <?php    echo $row['username']; ?>
               </td>
               <td>
                   <?php     echo $row['experience'];?>
               </td>
                <td>
                   <?php     echo $row['education']; ?>
               </td>    
			   <td>
                   <?php     echo $row['salary']; ?>
               </td>  
			   <td>
                   <?php     echo $row['location']; ?>
               </td>  
    </tr>
	<?php
    }
?>


	


</table>
<div class="input-group">

			<label>Location of Work</label>
			<input type="text" name="location" value="<?php echo $locate; ?>">
		</div>
		<div class="input-group">
			<label>Type of Work</label>
			<input type="text" name="typework" value="<?php echo $typework; ?>">
		</div>
		<div class="input-group">
			<label>Salary</label>
			<input type="text" name="sal" value="<?php echo $sal; ?>">
		</div>		
<input type="submit"  class="btn" name="selection_btn" value="submit" />
</form>







 
</html>