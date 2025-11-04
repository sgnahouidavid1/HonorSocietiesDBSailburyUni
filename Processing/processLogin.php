<?php
//TODO search query parameterization

	session_start();

	include "functions.php";
	
	$connection = get_conn();
	
	if(isset($_POST['login'])){	//button is clicked from login.php form
		if(isset($_POST['username']) && isset($_POST['password'])){	//user input in login form
	
			$username = $_POST['username'];	
			$password = $_POST['password'];
			
			//check if values are in DB; use prepared statement & parameter binding
			//query returns username, password, and hsName from DB based on username entered
			//if a result is returned, the password hash is verified
			
			$query="SELECT OfficerLogin.Username, OfficerLogin.Password, MemberOf.hsName FROM OfficerLogin
			        JOIN MemberOf WHERE OfficerLogin.Username = (?) AND MemberOf.email = OfficerLogin.email  
				UNION SELECT FacultyLogin.Username, FacultyLogin.Password, FacultyAdvisors.hsName  
				FROM FacultyLogin JOIN FacultyAdvisors WHERE FacultyLogin.Username = (?) AND FacultyAdvisors.email = FacultyLogin.email";
			$stmt = mysqli_stmt_init($connection);
			$param =array("ss", $username, $username);

			//if query fails end connection
			if(!(mysqli_stmt_prepare($stmt, $query)))
			{
				echo "<script type='text/javascript'>alert('Stmt prep error');</script>";
				die("SQL statement failed".mysqli_error());		
				echo"<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
			}	
			mysqli_stmt_bind_param($stmt, $param[0], $param[1], $param[2]);
			mysqli_stmt_execute($stmt);

			if(!($result=mysqli_stmt_get_result($stmt)))
			{
				echo "<script type='text/javascript'>alert('Get result error');</script>";
				die("SQL statement failed".mysqli_error());		
				echo"<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
			}

			$row = mysqli_fetch_array($result);	
	
			$count = mysqli_num_rows($result);
			mysqli_stmt_close($stmt);
			
			//if a result was returned, verify entered password 
			//against hashed password in the database,
			//then verify year is up to date
			if($count > 0){
				//use password_verify() to check hashed password in DB
				//to hashed version of entered password

				if(password_verify($password,$row[1])){
					//make sure user is up to date
					//query user's year and check if it is within 2 years of current year
					$yearQuery ="SELECT OfficerLogin.Year FROM OfficerLogin  WHERE OfficerLogin.Username = (?) 
						UNION SELECT FacultyLogin.Year FROM FacultyLogin WHERE FacultyLogin.Username = (?)
						ORDER BY Year DESC";
					$yearParams=array("ss", $username, $username);
					$yearResult = prevent_injection($connection, $yearQuery, $yearParams);

					$yearRow =mysqli_fetch_array($yearResult);
					$YearCount =mysqli_num_rows($yearResult);

					$memberYear = $yearRow[0];
					
					
					$currentYear = date("Y");
					$memberYear = $yearRow[0];

					if($currentYear - $memberYear > 2){
						echo "<script type='text/javascript'>alert('Error: Credentials Expired. Please contact a Faculty Advisor to update.');</script>";
						echo"<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/login.php')</script>";	
							
					}
					else{
						
						$_SESSION['username'] = $username;
						$_SESSION['hs'] = $row[2];
					}

				}else{
					
					echo "<script type='text/javascript'>alert('Incorrect password entered.');</script>";
					echo"<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/login.php')</script>";	
				}
			}else{
				
				//echo "<script type='text/javascript'>alert('Error: No username, password combination found.');</script>";
				//if credentials don't match
				$fmsg = "Invalid login.";
				close_conn($connection);
			}
		}
	} //login_form if
	//if user is logged in, greet them with message
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		echo "<script type='text/javascript'>alert('Welcome $username');</script>";
		echo"<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
	}else{
		//display error on incorrect login
		if($fmsg != ''){
			echo "<script type='text/javascript'>alert('$fmsg');</script>";
			echo"<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/login.php')</script>";	
		}
	}
 	
	close_conn($connection);
?>
