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
<title>Staffing Reference Case</title>
<link rel="stylesheet" type="text/css" href="styletest.css">
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
  <li><a href="index.php">Home</a></li>
  <li><a href="staff_request.php">Request Staff</a></li>
  <li><a href="Search_staff_request.php">Search Staff Requests</a></li>
  <li style="float:right"><a class="active" href="index.php?logout='1'">LogOut</a></li>
</ul>
<form method="post" action="">





<div class="input-group">

			<label>Enter Reference Number</label>
			<input type="text" name="refnumber" value="<?php echo $ref_number; ?>">
		</div>
		<table class="table-fill">
		<thead>
                <tr>
					<th class="text-left">Name </th>
                    <th class="text-left">Location</th>
                    <th class="text-left">Type of Work</th>
                    <th class="text-left">Salary</th>
					<th class="text-left">Date Ordered</th>
					<th class="text-left">Status</th>
                </tr>
            </thead>
			<?php 
			//define variables
			$data = " ";
			$location_of_work = " ";
			$type_of_work = " ";
			$salary = " ";
			$date = " ";
			$status = " ";
			if (count($errors) == 0) {
			if (isset($_POST['refnumber'])){	
			//reset variables to recieve data
			unset($data);
			unset($location_of_work);
			unset($type_of_work);
			unset($salary);
			unset($date);
			unset($status);
			
			
			$ref = lookupnumber();
			//extracting $ref array
			extract($ref, EXTR_PREFIX_SAME, "wddx");
			}
			}else {
				echo "INCORRECT REFERENCE NUMBER ENTERED";
			}
			?>
			<thead>
                <tr>
					<th class="text-left"><?php echo $data ?>  </th>
                    <th class="text-left"><?php echo $location_of_work; ?></th>
                    <th class="text-left"><?php echo $type_of_work ?></th>
                    <th class="text-left"><?php echo $salary ?></th>
					<th class="text-left"><?php echo $date ?></th>
					<th class="text-left"><?php echo $status ?></th>
                </tr>
            </thead>
		</table>


<input type="submit" onClick = "this.style.visibility= 'hidden';" class="btn" name="refernce_btn" value="submit"  />
</form>
</body
</html>