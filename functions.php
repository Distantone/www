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
	if (isset($_POST['update_btn'])) {
		updatereference();
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
				$ref = mysqli_fetch_assoc($results); //storing $results into $ref
				//print_r($ref);   //debugging
				return $ref;
			}else {
				array_push($errors, "Incorrect Reference number");
			}
		}

	}
	function updatereference(){
		global $db, $errors;
		

		$reference_number = $_GET['reference_number'];
		$user = e($_POST['user']);
		$data = e($_POST['data']);
		$location_of_work = e($_POST['location_of_work']);
		$type_of_work = e($_POST['type_of_work']);
		$salary = e($_POST['salary']);
		$date = e($_POST['date']);
		$status = e($_POST['status']);

	
		if (count($errors) == 0) {
			$query = "UPDATE staff_requests SET reference_number= '$reference_number', user='$user', data= '$data',
			location_of_work='$location_of_work',type_of_work= '$type_of_work',salary='$salary',date='$date',status= '$status' WHERE reference_number= '$reference_number' ";
			mysqli_query($db, $query);
			header("location: /admin/view.php");
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
		
		
		
		//grab resume information
		$filename= $_FILES['file']['name'];
		$tmp_name= $_FILES['file']['tmp_name'];
		$submitbutton= $_POST['staffinformation_btn'];
		$position= strpos($filename, "."); 
		$fileextension= substr($filename, $position + 1);
		$fileextension= strtolower($fileextension);
		$description= $_POST['description_entered'];
		if (isset($filename)) {
		$path= 'Uploads/files/';
			if (!empty($filename)){
				if (move_uploaded_file($tmp_name, $path.$filename)) {
				echo 'Uploaded!';
				}
			}
		}
		
		
		
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
		
		
		
		$query = "INSERT INTO staff_info (description, filename)
		VALUES ('$description', '$name')";
		
		//modification section
		if (count($errors) == 0) {
			$query = "SELECT * FROM staff_info WHERE username='$username'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
			unset($query);
				$query = "UPDATE staff_info SET username= '$username', email= '$email', experience= '$experience', education= '$education', salary= '$salary', 
				location= '$location', description= '$description', filename= '$filename' WHERE username= '$username'";
				mysqli_query($db, $query);
			}else {

				// register user information if none present and there are no errors in the form
				if (count($errors) == 0) {
			

					if (isset($_POST['user_type'])) {
						$user_type = e($_POST['user_type']);
						$query = "INSERT INTO staff_info (username, email, experience, education, salary, location, description, filename) 
								VALUES('$username', '$email', '$experience', '$education', '$salary', '$location','$description','$filename')";
						mysqli_query($db, $query);
						$_SESSION['success']  = "New user successfully created!!";
						
						header('location: home.php');
					}else{
						$query = "INSERT INTO staff_info (username, email, experience, education, salary, location,description, filename) 
								VALUES('$username', '$email', '$experience', '$education', '$salary', '$location','$description','$filename')";
						mysqli_query($db, $query);
					// get id of the created user
						$logged_in_user_id = mysqli_insert_id($db);
						$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
						$_SESSION['success']  = "You are now logged in";
						header('location: submit.php');				
					}
				}
			}
		}
	}
	//submits customer selection of staff
	function submitselection(){	
	global $db, $errors;
	//define variables
		$locate		=  e($_POST['location']);
		$typework		=  e($_POST['typework']);
		$sal		=  e($_POST['sal']);
		
		$date = time();
		// form validation: ensure that the form is correctly filled
		if (empty($_POST['checked'])) { 
			 
			array_push($errors, "please select atleast one"); 
		}else{
		if (empty($locate)) { 
		array_push($errors, "Location of work is required"); 
		}
		else if (empty($typework)) { 
			array_push($errors, "Type of work is required"); 
		}
		else if (empty($sal)) { 
			array_push($errors, "Salary is required"); 
		}else{
		
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				//debugging echo 'You have chosen:';
				foreach ($_POST['checked'] as $value) {
				//debugging echo " $value, ";
				}

					//define logged in user
					$logged_in_user = $_SESSION['user']['username'];
					//redirect

					//error checking
					if (count($errors) == 0) {
						//rolling thru each selected
						foreach ($_POST['checked'] as $value) {
							
							//generate a referenece number using md5(username) and random.
							$uRefNo = md5($logged_in_user) .rand(10*45, 100*98);
							//insert statement
							$query = "INSERT INTO staff_requests (reference_number, user, data, location_of_work, type_of_work, salary) 
									VALUES('$uRefNo','$logged_in_user','$value','$locate','$typework','$sal')";
							mysqli_query($db, $query);
							echo '
							<th class="text-left">'.'Your Reference Number for ' .$value . ' is ' . $uRefNo . '<br>' . '</th>';
						}
						//Debugging  $_SESSION['success']  = "lets see....";
					}else {
						echo mysql_error();
							//header('location: fail.php');
					}		
				}
			}
		}
	}
	
	
	function uploadfile(){
		global $db, $errors;
		if(!empty($description)){
			$query = "INSERT INTO staff_info (username, email, experience, education, salary, location) 
								VALUES('$username', '$email', '$experience', '$education', '$salary', '$location')";
		$query = "INSERT INTO staff_info (description, filename)
		VALUES ('$description', '$name')";
		mysqli_query($db, $query);
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
	function getUser(){
		global $db;
		$query = "SELECT * FROM users";
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $result;
	}
	function getUsers(){
		global $db;
		$query = "SELECT * FROM staff_info";
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $result;
	}
	
	function getrequests(){
		global $db;
		$query = "SELECT * FROM staff_requests";
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