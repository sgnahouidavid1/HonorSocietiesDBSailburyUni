<?php
//TODO Page redirect after message
			
	session_start();

	include "functions.php"; 


	$connection = get_conn();

	if(isset($_POST['newUser'])){		//if form is submitted
		$password1 = $_POST['password1'];
		$password2 = $_POST['confirmPassword'];
		$username = $_POST['Username'];
		if(strcmp($password1, $password2) === 0){

			$membershipID = $_POST['memberID'];
			$email = $_POST['email'];
			$officer_faculty = $_POST['off_or_fac'];

			//this query checks if the user already has an existing account
			$query_existing = "SELECT email FROM OfficerLogin WHERE
			       	email = ? UNION SELECT email FROM FacultyLogin WHERE email = ?";
			$params = array("ss", $email, $email);
			$result = prevent_injection($connection, $query_existing, $params);
			$count = mysqli_num_rows($result);
			
			//if a result was returned display error
			if($count > 0)
			{
				echo "<script type='text/javascript'>alert('Error: There is already
				       	an account linked to that email.');</script>";
				echo"<script type='text/javascript'>window.location.replace
					('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/createLogin.php')</script>";	
			}
			else
			{
				
	//			 Search query matches MembershipID and email to database
	//			  and returns the year the user was an officer or faculty. The
	//			  year result is in descending order, and the most recent year is 
	//			  used for the comparision. If the year is within two years of
	//			  the current year, a login will be created. 		 

				if(strcmp($officer_faculty, "officer") === 0){
					$query ="SELECT Officers.Year FROM Officers JOIN
						Members WHERE Officers.email = (?) AND 
						Members.email = (?) AND Members.MembershipID = (?) 
						ORDER BY Year DESC";
				}
				if(strcmp($officer_faculty, "faculty")=== 0){
					$query ="SELECT FacultyAdvisors.Year FROM 
						FacultyAdvisors JOIN Members
						WHERE FacultyAdvisors.email = (?) AND Members.email = (?)
					       	AND Members.MembershipID = (?) ORDER BY Year DESC";
				}
				$params =array("sss",$email,$email,$membershipID);
				$result =prevent_injection($connection, $query, $params);
				$row =mysqli_fetch_array($result);
				$count =mysqli_num_rows($result);

				$memberYear = $row[0];
				
				//query returned a result
				if($count >= 1)
				{
					$currentYear = date("Y");
					$memberYear = $row[0];
					
					//check if officer/faculty year is valid
					if(($currentYear - $memberYear) <= 2)
					{
						
						//check if username already taken
						$query="SELECT Username FROM OfficerLogin 
							WHERE Username = ? 
							UNION SELECT Username From FacultyLogin 
							WHERE Username = ?";

						$param =array("ss", $username, $username);
						$result = prevent_injection($connection, $query, $param);
						$row = mysqli_fetch_array($result);
						$count = mysqli_num_rows($result);

						if($count > 0){
						
							echo"<script type ='text/javascript'>
								alert('Error: Username already taken.');</script>";
							echo"<script type='text/javascript'>
								window.location.replace
							('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/createLogin.php')</script>";	
						}	
						else{
							//get hsName of the user
							if(strcmp($officer_faculty, "officer") === 0){
								$query= "SELECT hsName FROM MemberOf WHERE email = ?";
							}	
							
							else if(strcmp($officer_faculty, "faculty") === 0){
								$query= "SELECT hsName FROM FacultyAdvisors WHERE email = ?";
							}	
							else
							{
								//this shouldn't happen - requires both radio buttons are unchecked
								echo"<script type ='text/javascript'>
									alert('Something went wrong. Please verify that you are in an Honor Society');
									</script>";
								echo"<script type='text/javascript'>window.location.replace
									('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/createLogin.php')</script>";	
							}
							$param =array("s", $email);
							$result = prevent_injection($connection, $query, $param);

							$row = mysqli_fetch_array($result);
							$hs = $row[0];
							
							//hash password before inserting into database							
							$hashed = password_hash($password1, PASSWORD_DEFAULT);

							//insert into OfficerLogin table
							if(strcmp($officer_faculty, "officer")===0){
								$query = "INSERT INTO OfficerLogin (Username, Password, email, year) VALUES (?, ?, ?, ?)";
								$param = array("sssi", $username, $hashed, $email, $memberYear);
								prevent_injection($connection, $query, $param);
							
								echo"<script type ='text/javascript'>alert
									('User sucessfully created. You are being redirected to the Login page.');</script>";
								echo"<script type='text/javascript'>window.location.replace
									('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/login.php')</script>";	
							}
							//else insert into FacultyLogin table
							else if(strcmp($officer_faculty, "faculty")===0){
								$query = "INSERT INTO FacultyLogin 
									(Username, Password, email, hsName, year) 
									VALUES (?, ?, ?, ?, ?)";
								$param = array("ssssi", $username,$hashed, $email, $hs, $memberYear);
								$result = prevent_injection($connection, $query, $param);
						
								echo"<script type ='text/javascript'>
									alert('User sucessfully created. You are being redirected to the Login page.');</script>";
								echo"<script type='text/javascript'>window.location.replace
									('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/login.php')</script>";	
							}
							else{
								//this shouldn't happen - requires both radio buttons to be unchecked
								echo"<script type ='text/javascript'>
									alert('An error occured.');</script>";
								echo"<script type='text/javascript'>window.location.replace
									('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/createLogin.php')</script>";	
								closs_conn($connection);	
							}	
						}	
					}		
					else	//year is out of date
					{
						
						echo"<script type ='text/javascript'>
							alert('Error: Credentials expired.');</script>";
						echo"<script type='text/javascript'>window.location.replace
							('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/createLogin.php')</script>";	
						close_conn($connection);
					}
				}
				else	//user email and membership ID# not found
				{
					echo"<script type ='text/javascript'>
						alert('No valid Officer or Faculty Advisor found with that email and membership ID number.');</script>";
					echo"<script type='text/javascript'>window.location.replace
						('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/createLogin.php')</script>";	
					close_conn($connection);
				}
			
			}
		} 
		else	//server side check if inputted passwords match; shouldn't get here b/c of client side JS
		{
			echo"<script type ='text/javascript'>
				alert('Passwords do not match!');</script>";
			echo"<script type='text/javascript'>window.location.replace
				('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/createLogin.php')</script>";	
			close_conn($connection);
		}

	}
	else
	{
		exit;
	}
	close_conn($connection);
?>

