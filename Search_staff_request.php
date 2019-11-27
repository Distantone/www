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
                </tr>
            </thead>

		</table>


<input type="submit"  class="btn" name="refernce_btn" value="submit" />
</form>
</body
</html>