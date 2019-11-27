<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', 'mylove922', 'multi_login');

	// variable declaration
	$username = "";
	$email    = "";
	$experience    = "";
	$education    = "";
	$salary    = "";
	$location    = "";
	$errors   = array(); 
	$ref_number = "";

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}
	if (isset($_POST['staffinformation_btn'])) {
		staffInformationRegister();
	}
	if (isset($_POST['staffpopulate_btn'])) {
		getUsers();
	}
	if (isset($_POST['selection_btn'])) {
		submitselection();
	}
	if (isset($_POST['refernce_btn'])) {
		lookupnumber();
	}
	
	function lookupnumber(){
		global $db, $errors;
		$refernce_number    =  e($_POST['refnumber']);
		
		if (empty($refernce_number)) { 
			array_push($errors, "Reference number is required"); 
		}
		
		
		
		if (count($errors) == 0) {

			$query = "SELECT * FROM staff_requests WHERE reference_number='$refernce_number' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // reference number found
				
				//storing $results into $ref
				$ref = mysqli_fetch_assoc($results);
				
				//debug the array
				//print_r($ref);

				//debugging
				$name = array_column($ref, 'data');
				print_r($name);
				//$data_from_ref = implode(" ",$ref);
				//echo array_key_exists(0, $ref) == false;
				//echo $ref[0];
				
				
					//header('location: staff/home.php');
				
			}else {
				array_push($errors, "Incorrect Reference number");
			}
		}
			
			
		

			
			
			
			
		
	}
	

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	// REGISTER USER
	function register(){
		global $db, $errors;

		// receive all input values from the form
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (username, email, user_type, password) 
						  VALUES('$username', '$email', '$user_type', '$password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: home.php');
			}else{
				$query = "INSERT INTO users (username, email, user_type, password) 
						  VALUES('$username', '$email', 'user', '$password')";
				mysqli_query($db, $query);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
				header('location: index.php');				
			}

		}

	}
	
	/*
	$brand = '#ref';
$cur_date = date('d').date('m').date('y');
$invoice = $brand.$cur_date;
$customer_id = rand(00000 , 99999);
$uRefNo = $invoice.'-'.$customer_id;
echo $uRefNo;
	*/
	//staff information registration
	function staffInformationRegister(){
		global $db, $errors;

		// receive all input values from the form
		$username   	 =  e($_POST['username']);
		$email      	 =  e($_POST['email']);
		$experience		=  e($_POST['experience']);
		$education		=  e($_POST['education']);
		$salary			=  e($_POST['salary']);
		$location		=  e($_POST['location']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($experience)) { 
			array_push($errors, "experience is required"); 
		}
		if (empty($education)) { 
			array_push($errors, "education is required"); 
		}
		if (empty($salary)) { 
			array_push($errors, "salary is required"); 
		}
		if (empty($location)) { 
			array_push($errors, "location is required"); 
		}
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO staff_info (username, email, experience, education, salary, location) 
						  VALUES('$username', '$email', '$experience', '$education', '$salary', '$location')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: home.php');
			}else{
				$query = "INSERT INTO staff_info (username, email, experience, education, salary, location) 
						  VALUES('$username', '$email', '$experience', '$education', '$salary', '$location')";
				mysqli_query($db, $query);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
				header('location: submit.php');				
			}

		}

	}
	//submits customer selection of staff
	function submitselection(){	
	//define variables
		$locate		=  e($_POST['location']);
		$typework		=  e($_POST['typework']);
		$sal		=  e($_POST['sal']);
		

		// form validation: ensure that the form is correctly filled
		if (empty($locate)) { 
			array_push($errors, "Location of work is required"); 
		}
		if (empty($typework)) { 
			array_push($errors, "Type of work is required"); 
		}
		if (empty($sal)) { 
			array_push($errors, "Salary is required"); 
		}
		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//debugging echo 'You have chosen:';
	foreach ($_POST['checked'] as $value) {
		//debugging  echo " $value, ";
		
	}
}
	global $db, $errors;
	//define logged in user
	$logged_in_user = $_SESSION['user']['username'];
	
		//error checking
		if (count($errors) == 0) {
			//rolling thru each selected
			foreach ($_POST['checked'] as $value) {
				//Debugging echo $_SESSION['user']['username'];
				
				$query = "INSERT INTO staff_requests (user, data, location_of_work, type_of_work, salary) 
						  VALUES('$logged_in_user','$value','$locate','$typework','$sal')";
				mysqli_query($db, $query);
				
				
			}
		//header('location: submit.php');
		//Debugging  $_SESSION['success']  = "lets see....";
		}		
	}
	
	function getUserByRefNum($ref){
		global $db;
		$query = "SELECT * FROM staff_requests WHERE reference_number=" . $ref;
		$result = mysqli_query($db, $query);
		
		$user = $result;
		return $user;
		echo $user;
	}
	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}
	function getUsers(){
		global $db;
		$query = "SELECT * FROM staff_info";
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $result;
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: admin/home.php');		  
				}else if($logged_in_user['user_type'] == 'user'){
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: index.php');
				}else if($logged_in_user['user_type'] == 'staff'){
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: staff/home.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}
	
	function isStaff()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'staff' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>