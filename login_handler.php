<?php

if(isset($_POST['login_button'])) {

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //sanitize email

	$_SESSION['email'] = $email; //Store email into session variable
	$password = md5($_POST['password']); //Get password

	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$firstName = $row['first_name'];



		$_SESSION['first_name'] = $firstName;
		header("Location: index.php");
		exit();
	}
	else {
		array_push($error_array, "Email or password was incorrect<br>");
	}


}

?>
