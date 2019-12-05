<!--
TPS submit.php
Author: Payden Boughton
Changelog: https://github.com/Distantone/www
-->
<?php
include('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thank you for placing a Staff Request</title>

</head>
<body>
<strong>Thank you for placing a Staff Request <?php echo $_SESSION['user']['username']; ?><br></strong> </strong>
<?php
//echo $_SESSION['value'];
//echo $_SESSION['refnum'];

$ar = $_SESSION['array'];
print_r($ar);
$data = " ";
$reference_number = " ";

extract($ar, EXTR_PREFIX_SAME, "wddx");

?>
Your Reference number for <?php echo $ar[0] ?> is  <strong><?php echo $ar[1]?></strong>


</body>
</html>