<?php
//Declaring variables to prevent errors
$fname = ""; //First name
$lname = ""; //Last name
$em = ""; //email
$em2 = ""; //email 2
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date
$error_array = array(); //Holds error messages

if(isset($_POST['register_button'])){

	//Registration form values

	//First name
	$fname = strip_tags($_POST['first_name']); //Remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname)); //Uppercase first letter
	$_SESSION['first_name'] = $fname; //Stores first name into session variable

	//Last name
	$lname = strip_tags($_POST['last_name']); //Remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname)); //Uppercase first letter
	$_SESSION['last_name'] = $lname; //Stores last name into session variable

	//email
	$em = strip_tags($_POST['email']); //Remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = ucfirst(strtolower($em)); //Uppercase first letter
	$_SESSION['email'] = $em; //Stores email into session variable
	//Password
	$password = strip_tags($_POST['password']); //Remove html tags



		}



	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
	}

	if($password != $password2) {
		array_push($error_array,  "Your passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain english characters or numbers<br>");
		}
	}

	if(strlen($password > 30 || strlen($password) < 5)) {
		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	}


	if(empty($error_array)) {
		$password = md5($password); //Encrypt password before sending to database

		//Generate username by concatenating first name and last name
		$username = strtolower($fname . "_" . $lname);
		$check_firstName_query = mysqli_query($con, "SELECT first_name FROM midtermproject WHERE first_name='$firstName'");


		$i = 0;
		//if username exists add number to username
		while(mysqli_num_rows($check_firstName_query) != 0) {
			$i++; //Add 1 to i
			$firstName = $firstName . "_" . $i;
			$check_username_query = mysqli_query($con, "SELECT first_name FROM midtermproject WHERE first_name='$firstName'");
		}


		$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname','$em', '$password')");

		array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");

		//Clear session variables
		$_SESSION['first_name'] = "";
		$_SESSION['last_name'] = "";
		$_SESSION['email'] = "";
	}


?>
