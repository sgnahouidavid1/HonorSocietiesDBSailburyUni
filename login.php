<?php 
	session_start();
?>

<html lang="en">
	<head>
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="Styles/USfooter.css">
		<link rel="stylesheet" type="text/css" href="Styles/search.css"> 
		<link rel="stylesheet" type="text/css" href="Styles/header.css">
		<link rel="stylesheet" type="text/css" href="Styles/login.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<?php include "Navbar/userNav.php";?>

	</head>

	<body>
		<!-- login form -->	
		<div class="formContainer" id="loginContainer">
		<form class="form-inline" method ="POST" 
		action="https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/Processing/processLogin.php" id="login_form">
			<div>
				<div class="username">
					<label for="username">Username</label>
					<input type="text" id="username" 
					class="form-control input-sm" name="username" required placeholder="Username"/>
				</div>
				<div class="password">
					<label for="password">Password</label>
					<input type="password" id="password" 
					class="form-control input-sm" name="password" required placeholder="Password"/>	
				</div>
			<div class="buttons">	
				<button type="submit" class="btn btn-default btn-sm" name="login" value="login"> Submit </button>
				<a href="createLogin.php">Create New Login</a>
			</div>
			</div>

		</form>
		
		</div>

<footer>
 <?php
               
                        include "Footer/usfooter.php";
                
        ?>

</footer>
	</body>
</html>
