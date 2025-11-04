<?php
	session_start();
?>

<html lang="en">
	<head>

		<?php include "Navbar/userNav.php"?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="Styles/header.css">
                <link rel="stylesheet" type="text/css" href="Styles/login.css">
		<link rel="stylesheet" type="text/css" href="Styles/USfooter.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		
		<!-- JS for client side check if psswords match -->
		<script type='text/javascript'>
			function myFunction() {
			    var pass1 = document.getElementById("password").value;
			    var pass2 = document.getElementById("confirmPassword").value;
			    if (pass1 != pass2) {
				alert("Passwords do not match.");
				document.getElementById("password").style.borderColor = "#E34234";
				document.getElementById("confirmPassword").style.borderColor = "#E34234";
				return false;
			    }
			    else {
				return true;
			    }
			}
		 </script>
	


	</head>

	<body>
	
		<div class="formContainer" id ="create">

			<form class = "form-inline" action =
			"https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/Processing/processNewUser.php"
			 method="POST" onSubmit="return myFunction()"  name="createLogin" id="createLoginForm">
				<div class="formElement">
					<label for="memberID">Member ID#</label>
					<input name="memberID" type="text" id="memberID" 
					class="form-control input-sm" placeholder="MemberID #" required/>
					<br>
					<p class="hint">Please contact your Honor Society's Faculty Advisor if you do not have a Member ID#.</p>
				</div>
					
				<div class="formElement">
					<label for="username">Username</label>
					<input name="Username" type="text" id="username" 
					class="form-control input-sm" placeholder="Username" required/>
					<br>
					<p class="hint">This will be the Username you will use to login in.</p>
			
				</div>

			
				<div class="formElement">
					<label for="email">Email</label>
					<input name = "email" type="text" id="email" 
					class="form-control input-sm"  pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80"  placeholder="email" required/>
				</div>
			
				<div class="formElement">
					<label for="password">Password</label>
					<input name="password1" id="password" type="password" 
					class="form-control input-sm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
					title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
					 placeholder="Password" required="required"/>				

					<div  id="message">
					  <p>Password must contain the following:</p>
					  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
					  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
					  <p id="number" class="invalid">A <b>number</b></p>
					  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
					</div>
				</div>

				<div class="formElement">
					<label for="confirmPassword">Confirm Password</label>
					<input name="confirmPassword" id="confirmPassword" type="password" 
					class="form-control input-sm" placeholder="Confirm Password" required="required"/>
				</div>

				<div class="formElement">
					<p id="heading">Are you an Officer or Faculty Advisor?</p><br>
					<input id="officer" type = "radio"  name="off_or_fac" value="officer" required>
					<label for ="officer">Officer</label><br>
					
					<input id="faculty" type = "radio"  name="off_or_fac" value="faculty">
					<label for ="faculty">Faculty Advisor</label><br>
				</div>
				
				<div class="button">
					<button type="submit" class="btn btn-default btn-sm" name="newUser" value="Submit">Submit</button>
 				</div>


			</form>
		</div>
		<script src="Styles/loginJS.js"></script>

<footer>
	 <?php
                if(isset($_SESSION['username']))
                {
                        include "Footer/adminfooter.php";
                }
                else{
                        include "Footer/usfooter.php";
                }
        ?>

</footer>

	</body>
</html>
