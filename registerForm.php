<?php
require 'config.php';
require 'form_handlers/register_handler.php';
require 'form_handlers/login_handler.php';
?>
<html>
<head>
	<title>Tic Tac Toe!</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/submit.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>
<body>
	<?php
	if(isset($_POST['register_button'])) {
		echo '
		<script>
		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
		});
		</script>
		';
	}
	?>
	<div class="wrapper">
		<div class="login_box">
			<div class="login_header">
				<h1>Lets Play!</h1>
				Login or sign up below!
			</div>
			<br>
			<div id="first">
				<form action="registerForm.php" method="POST">
					<input type="email" name="email" placeholder="Email Address" value="<?php
					if(isset($_SESSION['email'])) {
						echo $_SESSION['email'];
					}
					?>" required>
					<br>
					<input type="password" name="password" placeholder="Password">
					<br>
					<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
					<script >
					$(document).ready(function() {
						$(function() {
							$( "#button1" ).click(function() {
								$( "#button1" ).addClass( "onclic", 250, validate);
							});

							function validate() {
								setTimeout(function() {
									$( "#button1" ).removeClass( "onclic" );
									$( "#button1" ).addClass( "validate", 450, callback );
								}, 2250 );
							}
							function callback() {
								setTimeout(function() {
									$( "#button1" ).removeClass( "validate" );
								}, 1250 );
							}
						});
					});
					</script>
					<button id="button1" type="submit" value="Login"></button>
					<br>
				</form>
			</div>
			<div id="second">
				<form action="registerForm.php" method="POST">
					<input type="text" name="first_name" placeholder="First Name" value="<?php
					if(isset($_SESSION['first_name'])) {
						echo $_SESSION['first_name'];
					}
					?>" required>
					<br>
					<input type="text" name="last_name" placeholder="Last Name" value="<?php
					if(isset($_SESSION['last_name'])) {
						echo $_SESSION['last_name'];
					}
					?>" required>
					<br>
					<input type="email" name="email" placeholder="Email" value="<?php
					if(isset($_SESSION['email'])) {
						echo $_SESSION['email'];
					}
					?>" required>
					<br>
					<input type="password" name="password" placeholder="Password" required>
					<br>
					<script >
					$(document).ready(function() {
						$(function() {
							$( "#button" ).click(function() {
								$( "#button" ).addClass( "onclic", 250, validate);
							});

							function validate() {
								setTimeout(function() {
									$( "#button" ).removeClass( "onclic" );
									$( "#button" ).addClass( "validate", 450, callback );
								}, 2250 );
							}
							function callback() {
								setTimeout(function() {
									$( "#button" ).removeClass( "validate" );
								}, 1250 );
							}
						});
					});
					</script>
					<button id="button" type="submit" value="Submit"></button>
					<br>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
