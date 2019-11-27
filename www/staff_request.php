<?php include('functions.php') ?>
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

<form method="post" action="">
<?php 
//debuging
//print_r($_POST);

$results = getUsers();
while($line = mysqli_fetch_array($results)) {
    $name = $line['username'];
    $email = $line['email'];
    $experience = $line['experience'];
	$education = $line['education'];
	$salary = $line['salary'];
	$location = $line['location'];
	//$data = array();
    echo '<div id=box-1 class=box>';
	//echo "<input type='checkbox' value='$name'>";
   // echo "<gt_descA>$name</gt_descA> <gt_descC>$email</gt_descC> <gt_descC>$experience</gt_descC> <gt_descC>$education</gt_descC> <gt_descC>$salary</gt_descC> <gt_descC>$location</gt_descC>";
    
	echo "<table>
	<tr>
	
        <td><input type='checkbox' value='data'> $name  $email 	$experience 	$education 	$salary $location</td>
    </tr>
	</table>";
    echo "<span class='caption simple-caption'>";
    echo '<div style=clear:both;></div>';
    echo '</span>';
    echo '</div>';
	
	if(isset($_POST['data']) )
{
	$data = $_POST['data'];
	
}
}

?>


</form>
<div class="input-group">
			<button type="submit" class="btn" name="selection_btn">Submit Selection</button>
		</div>
 
</html>