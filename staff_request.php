<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>
<!doctype html>
<html>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="staff_request.php">Request Staff</a></li>
			<li><a href="Search_staff_request.php">Search Staff Requests</a></li>
			<li style="float:right"><a class="active" href="index.php?logout='1'">LogOut</a></li>
		</ul>
	</nav>

	<head>
		<meta charset="utf-8">
		<title>Staffing Request Form</title>
			<link rel="stylesheet" type="text/css" href="styletest.css">
	

	</head>
	
<body>


	
<style>
.active {
  background-color: #4CAF50;
}


</style>



<form method="post" action="">
 <table style=" width: 1300px;  left: 0; right: 0;border:1px solid">
            <thead>
                <tr>
					<th class="text-left"> </th>
                    <th class="text-left">Name</th>
                    <th class="text-left">Experience</th>
                    <th class="text-left">Education</th>
					<th class="text-left">Salary</th>
					<th class="text-left">Location</th>
					<th class="text-left">Availability</th>
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
			   <td>
                   <?php     echo $row['availability']; ?>
               </td> 
    </tr>
	<?php
    }
?>


	


</table>

<footer class = "mainFooter">



			<div class="input-group">
				<label for="location">Location of Work</label>
				<input  type="text"  name="location" value="<?php echo $locate; ?>">
			</div>
			
			<div class="input-group">
				<label for="typework">Type of Work</label>
				<input type="text"  name="typework" value="<?php echo $typework; ?>">
			</div>
			<div class="input-group">
				<label for="sal">Salary</label>
				<input type="text"  name="sal" value="<?php echo $sal; ?>">
			</div>		
			<input type="submit"  class="btn" name="selection_btn" value="submit" />
			

</form>
</footer>
</body>





 
</html>