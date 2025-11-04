<?php

//TODO add insert, delete, edit pages
        session_start();
	if (empty($_SESSION['username']))
	{	
		header("Location:index.php");
	}
?>

<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="Styles/USfooter.css">
		<link rel="stylesheet" type="text/css" href="Styles/search.css">
		<link rel="stylesheet" type="text/css" href="Styles/admin.css">
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="Styles/header.css">
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	</head>
	
	<body>
		<?php include "Navbar/adminNav.php"; ?>
		<?php include "Processing/functions.php"; ?>
		
<div class="contain">
		
		<div class="tab">
			<button class="tablinks" onclick="selectForm(event, 'Update')" id="defaultOpen">Update Information</button>
			<button class="tablinks" onclick="selectForm(event, 'Insert')">Insert Information</button>
			<button class="tablinks" onclick="selectForm(event, 'Delete')">Delete Information</button>
		</div>

		<div id="Update" class="tabcontent">
			<h3>Update Information</h3>
				<div class="updateContainer">
				<script type="text/javascript">
					function reset(){
						var dropDown = document.getElementById("attributeORdd");
						dropDown.selectedIndex = 0;
					}
					function hidedd(){
						if($('#tabledd').val()=="null"){
							$('label[for=hsdropdown], #hsdropdown').hide();
							$('label[for=attributeMdd], #attributeMdd').hide();
							$('label[for=attributeOdd], #attributeOdd').hide();
							$('label[for=attributeFdd], #attributeFdd').hide();
							$('label[for=attributeSdd], #attributeSdd').hide();
							$('label[for=attributeORdd], #attributeORdd').hide();
							$('label[for=emailM], #emailM').hide();
							$('label[for=emailO], #emailO').hide();
							$('label[for=emailF], #emailF').hide();
							$('label[for=upRecipient], #upRecipient').hide();
							$('label[for=timeU], #timeU').hide();
							$('label[for=dateU], #dateU').hide();
							$('label[for=newTime], #newTime').hide();
							$('label[for=newDate], #newDate').hide();
							$('label[for=attribute], #attribute').hide();
							$('label[for=attributeHdd], #attributeHdd').hide();
				
							$('label[for=hsdropdown], #hsdropdown').prop("required",false);	
							$('label[for=attributeMdd], #attributeMdd').prop("required", false);
							$('label[for=attributeOdd], #attributeOdd').prop("required", false);
							$('label[for=attributeFdd], #attributeFdd').prop("required", false);
							$('label[for=attributeSdd], #attributeSdd').prop("required", false);
							$('label[for=attributeORdd], #attributeORdd').prop("required", false);
							$('label[for=emailM], #emailM').prop("required", false);
							$('label[for=emailO], #emailO').prop("required", false);
							$('label[for=emailF], #emailF').prop("required", false);
							$('label[for=upRecipient], #upRecipient').prop("required", false);
							$('label[for=timeU], #timeU').prop("required", false);
							$('label[for=dateU], #dateU').prop("required", false);
							$('label[for=newTime], #newTime').prop("required", false);
							$('label[for=newDate], #newDate').prop("required", false);
							$('label[for=attribute], #attribute').prop("required", false);
						}
						else if($('#tabledd').val()=="Members"){
							$('label[for=attributeOdd], #attributeOdd').hide();
                                                        $('label[for=attributeFdd], #attributeFdd').hide();
                                                        $('label[for=attributeSdd], #attributeSdd').hide();
                                                        $('label[for=attributeORdd], #attributeORdd').hide();
                                                        $('label[for=emailO], #emailO').hide();
                                                        $('label[for=emailF], #emailF').hide();
                                                        $('label[for=upRecipient], #upRecipient').hide(); 
							$('label[for=timeU], #timeU').hide();
							$('label[for=dateU], #dateU').hide();
							$('label[for=newTime], #newTime').hide();
							$('label[for=newDate], #newDate').hide();
				//			$('label[for=attribute], #attribute').show();				
		
							$('label[for=attributeOdd], #attributeOdd').prop("required", false);
							$('label[for=attributeFdd], #attributeFdd').prop("required", false);
							$('label[for=attributeSdd], #attributeSdd').prop("required", false);
							$('label[for=attributeORdd], #attributeORdd').prop("required", false);
							$('label[for=emailO], #emailO').prop("required", false);
							$('label[for=emailF], #emailF').prop("required", false);
							$('label[for=upRecipient], #upRecipient').prop("required", false);
							$('label[for=timeU], #timeU').prop("required", false);
							$('label[for=dateU], #dateU').prop("required", false);
							$('label[for=newTime], #newTime').prop("required", false);
							$('label[for=newDate], #newDate').prop("required", false);
							$('label[for=attributeHdd], #attributeHdd').hide();
				//			$('label[for=attribute], #attribute').prop("required", true);
						}
						else if($('#tabledd').val() == "Officers"){
							$('label[for=attributeMdd], #attributeMdd').hide();
                                                        $('label[for=attributeFdd], #attributeFdd').hide();
                                                        $('label[for=attributeSdd], #attributeSdd').hide();
                                                        $('label[for=attributeORdd], #attributeORdd').hide();
							$('label[for=emailM], #emailM').hide();
                                                        $('label[for=emailF], #emailF').hide();
                                                        $('label[for=upRecipient], #upRecipient').hide();
							$('label[for=timeU], #timeU').hide();
							$('label[for=dateU], #dateU').hide();
							$('label[for=newTime], #newTime').hide();
							$('label[for=newDate], #newDate').hide();
				//			$('label[for=attribute], #attribute').show();
						
							$('label[for=attributeMdd], #attributeMdd').prop("required", false);	
							$('label[for=attributeFdd], #attributeFdd').prop("required", false);
							$('label[for=attributeSdd], #attributeSdd').prop("required", false);
							$('label[for=attributeORdd], #attributeORdd').prop("required", false);
							$('label[for=emailM], #emailM').prop("required", false);
							$('label[for=emailF], #emailF').prop("required", false);
							$('label[for=upRecipient], #upRecipient').prop("required", false);
							$('label[for=timeU], #timeU').prop("required", false);
							$('label[for=dateU], #dateU').prop("required", false);

							$('label[for=newTime], #newTime').prop("required", false);
							$('label[for=newDate], #newDate').prop("required", false);
							$('label[for=attributeHdd], #attributeHdd').hide();
				//			$('label[for=attribute], #attribute').prop("required", true);
						}
						else if($('#tabledd').val() == "FacultyAdvisors"){
                                                        $('label[for=attributeMdd], #attributeMdd').hide();
                                                        $('label[for=attributeOdd], #attributeOdd').hide();
                                                        $('label[for=attributeSdd], #attributeSdd').hide();
                                                        $('label[for=attributeORdd], #attributeORdd').hide();
							$('label[for=emailM], #emailM').hide();
                                                        $('label[for=emailO], #emailO').hide();
                                                        $('label[for=upRecipient], #upRecipient').hide(); 
							$('label[for=timeU], #timeU').hide();
							$('label[for=dateU], #dateU').hide();
							$('label[for=newTime], #newTime').hide();
							$('label[for=newDate], #newDate').hide();
							$('label[for=attributeHdd], #attributeHdd').hide();
				//			$('label[for=attribute], #attribute').show();
							
							$('label[for=attributeMdd], #attributeMdd').prop("required", false);
							$('label[for=attributeOdd], #attributeOdd').prop("required", false);
							$('label[for=attributeSdd], #attributeSdd').prop("required", false);
							$('label[for=attributeORdd], #attributeORdd').prop("required", false);
							$('label[for=emailM], #emailM').prop("required", false);
							$('label[for=emailO], #emailO').prop("required", false);
							$('label[for=upRecipient], #upRecipient').prop("required", false);
							$('label[for=timeU], #timeU').prop("required", false);
							$('label[for=dateU], #dateU').prop("required", false);
							$('label[for=newTime], #newTime').prop("required", false);
							$('label[for=newDate], #newDate').prop("required", false);
				//			$('label[for=attribute], #attribute').prop("required", true);
						}
						else if($('#tabledd').val() == "Scholarship"){
                                                        $('label[for=attributeMdd], #attributeMdd').hide();
                                                        $('label[for=attributeOdd], #attributeOdd').hide();
                                                        $('label[for=attributeFdd], #attributeFdd').hide();
                                                        $('label[for=attributeORdd], #attributeORdd').hide();
							$('label[for=emailM], #emailM').hide();
                                                        $('label[for=emailO], #emailO').hide();
                                                        $('label[for=emailF], #emailF').hide();
                                                        $('label[for=timeU], #timeU').hide();
							$('label[for=dateU], #dateU').hide();
							$('label[for=newTime], #newTime').hide();
							$('label[for=newDate], #newDate').hide();
							$('label[for=attributeHdd], #attributeHdd').hide();
				//			$('label[for=attribute], #attribute').show();
							
							$('label[for=attributeMdd], #attributeMdd').prop("required", false);
							$('label[for=attributeOdd], #attributeOdd').prop("required", false);
							$('label[for=attributeFdd], #attributeFdd').prop("required", false);
							$('label[for=attributeORdd], #attributeORdd').prop("required", false);
							$('label[for=emailM], #emailM').prop("required", false);
							$('label[for=emailO], #emailO').prop("required", false);
							$('label[for=emailF], #emailF').prop("required", false);
							$('label[for=timeU], #timeU').prop("required", false);
							$('label[for=dateU], #dateU').prop("required", false);
							$('label[for=newTime], #newTime').prop("required", false);
							$('label[for=newDate], #newDate').prop("required", false);
				//			$('label[for=attribute], #attribute').prop("required", true);
						}
						else if($('#tabledd').val() == "OrganizationActivities"){
                                                        $('label[for=attributeMdd], #attributeMdd').hide();
                                                        $('label[for=attributeOdd], #attributeOdd').hide();
                                                        $('label[for=attributeFdd], #attributeFdd').hide();
                                                        $('label[for=attributeSdd], #attributeSdd').hide();
							$('label[for=emailM], #emailM').hide();
							$('label[for=emailO], #emailO').hide();
							$('label[for=emailF], #emailF').hide();
                                                        $('label[for=upRecipient], #upRecipient').hide();
							$('label[for=attributeHdd], #attributeHdd').hide();
				//			$('label[for=attribute], #attribute').show();
							
							$('label[for=attributeMdd], #attributeMdd').prop("required", false);
							$('label[for=attributeOdd], #attributeOdd').prop("required", false);
							$('label[for=attributeFdd], #attributeFdd').prop("required", false);
							$('label[for=attributeSdd], #attributeSdd').prop("required", false);
							$('label[for=emailM], #emailM').prop("required", false);
							$('label[for=emailO], #emailO').hide();
							$('label[for=emailF], #emailF').prop("required", false);
							$('label[for=upRecipient], #upRecipient').prop("required", false);
				//			$('label[for=attribute], #attribute').prop("required", true);
			 			}
						else if($('#tabledd').val()=="HonorSociety"){
							$('label[for=attributeHdd], #attributeHdd').show();	
							$('label[for=attributeMdd], #attributeMdd').hide();
                                                        $('label[for=attributeOdd], #attributeOdd').hide();
                                                        $('label[for=attributeFdd], #attributeFdd').hide();
                                                        $('label[for=attributeSdd], #attributeSdd').hide();
							$('label[for=attributeORdd], #attributeORdd').hide();
                                                        $('label[for=emailM], #emailM').hide();
                                                        $('label[for=emailO], #emailO').hide();
                                                        $('label[for=emailF], #emailF').hide();
                                                        $('label[for=upRecipient], #upRecipient').hide();
                                                        $('label[for=timeU], #timeU').hide();
                                                        $('label[for=dateU], #dateU').hide();
                                                        $('label[for=newTime], #newTime').hide();
                                                        $('label[for=newDate], #newDate').hide();

							
							$('label[for=attributeMdd], #attributeMdd').prop("required", false);
                                                        $('label[for=attributeOdd], #attributeOdd').prop("required", false);
                                                        $('label[for=attributeFdd], #attributeFdd').prop("required", false);
                                                        $('label[for=attributeSdd], #attributeSdd').prop("required", false);
                                                        $('label[for=emailM], #emailM').prop("required", false);
                                                        $('label[for=emailO], #emailO').hide();
                                                        $('label[for=emailF], #emailF').prop("required", false);
                                                        $('label[for=upRecipient], #upRecipient').prop("required", false);
							$('label[for=hsdropdown], #hsdropdown').prop("required",true);
                                                        $('label[for=hsdropdown], #hsdropdown').prop("required",true);
                                                        $('label[for=attributeHdd], #attributeHdd').prop("required", true);
		
						}
				 
					}

					$(document).ready(function(){
						hidedd();

						$('#tabledd').change(function(){
							if($('#tabledd').val() == "null"){
								hidedd();
								reset();
							}
							else if($('#tabledd').val() == 'Members'){
								hidedd();
								reset();

								$('label[for=hsdropdown], #hsdropdown').show();
								$('label[for=attributeMdd], #attributeMdd').show();
								$('label[for=emailM], #emailM').show();
								$('label[for=attribute], #attribute').show();
								$('label[for=attributeHdd], #attributeHdd').hide();
								
								$('label[for=hsdropdown], #hsdropdown').prop("required", true);
								$('label[for=attributeMdd], #attributeMdd').prop("required", true);	
								$('label[for=emailM], #emailM').prop("required", true);
								$('label[for=attribute], #attribute').prop("required", true);
							}
							else if($('#tabledd').val() == "Officers"){
								hidedd();
								reset();

								$('label[for=hsdropdown], #hsdropdown').show();
								$('label[for=attributeOdd], #attributeOdd').show();
                                                        	$('label[for=emailO], #emailO').show();
								$('label[for=attribute], #attribute').show();
								$('label[for=attributeHdd], #attributeHdd').hide();
						
								$('label[for=hsdropdown], #hsdropdown').prop("required", true);
								$('label[for=attributeOdd], #attributeOdd').prop("required", true);
                                                        	$('label[for=emailO], #emailO').prop("required", true);
								$('label[for=attribute], #attribute').prop("required", true);
							}
							else if($('#tabledd').val() == 'FacultyAdvisors'){
								hidedd();
								reset();

								$('label[for=hsdropdown], #hsdropdown').show();
								$('label[for=attributeFdd], #attributeFdd').show();
                                                        	$('label[for=emailF], #emailF').show();
								$('label[for=attribute], #attribute').show();
							
								$('label[for=hsdropdown], #hsdropdown').prop("required",true);
								$('label[for=attributeFdd], #attributeFdd').prop("required", true);	
                                                        	$('label[for=emailF], #emailF').prop("required", true);
								$('label[for=attribute], #attribute').prop("required", true);
							}
							else if($('#tabledd').val() == 'Scholarship'){
								hidedd();
								reset();

								$('label[for=hsdropdown], #hsdropdown').show();
								$('label[for=attributeSdd], #attributeSdd').show();
                                                        	$('label[for=upRecipient], #upRecipient').show();
								$('label[for=attribute], #attribute').show();

								$('label[for=hsdropdown], #hsdropdown').prop("required", true);
								$('label[for=attributeSdd], #attributeSdd').prop("required", true);
                                                        	$('label[for=upRecipient], #upRecipient').prop("required", true);
								$('label[for=attribute], #attribute').prop("required", true);
							}
							else if($('#tabledd').val() == 'OrganizationActivities'){
								hidedd();
								reset();

								$('label[for=hsdropdown], #hsdropdown').show();
								$('label[for=attributeORdd], #attributeORdd').show();
                                                 		$('label[for=timeU], #timeU').show();
								$('label[for=dateU], #dateU').show();
								$('label[for=attribute], #attribute').show();
						
								$('label[for=hsdropdown], #hsdropdown').prop("required",true);
								$('label[for=attributeORdd], #attributeORdd').prop("required", true);
                                                 		$('label[for=timeU], #timeU').prop("required", true);
								$('label[for=dateU], #dateU').prop("required", true);
								$('label[for=attribute], #attribute').prop("required", true);

							}
							else if($('#tabledd').val() == 'HonorSociety'){
								hidedd();
								reset();

								$('label[for=hsdropdown], #hsdropdown').show();
								$('label[for=attributeHdd], #attributeHdd').show();
								$('label[for=attribute], #attribute').show();

								$('label[for=attribute], #attribute').prop("required", true);
								$('label[for=hsdropdown], #hsdropdown').prop("required",true);
                                                                $('label[for=attributeHdd], #attributeHdd').prop("required", true);

							}

							$('#attributeORdd').change(function(){
								if($('#attributeORdd').val() == 'DoA'){
                                                                        $('label[for=attribute], #attribute').hide();
									$('label[for=newTime], #newTime').show();
                                                                	$('label[for=newDate], #newDate').show();
									$('label[for=newDate], #newDate').prop("required", true);
									$('label[for=newTime], #newTime').prop("required", true);

                                                                }
								else{
									$('label[for=attribute], #attribute').show();
									$('label[for=newTime], #newTime').hide();
                                                                        $('label[for=newDate], #newDate').hide();
								}

							});

						});
					});
				</script>
			
				<form action="Processing/processUpdate.php" method="POST">
					<label for="tabledd">Select Table:</label>
                                        	<select class="form-control input-sm" name="tabledd" id="tabledd" required>
                                        		<option value="null">Select One</option>
                                          		<option value="Members">Members</option>
                                          		<option value="Officers">Officers</option>
                                          		<option value="FacultyAdvisors">Faculty Advisors</option>
                                          		<option value="Scholarship">Scholarships</option>
							<option value="HonorSociety">Honor Societies</option>
                                          		<option value="OrganizationActivities">Activities</option>
                                          	</select>

                                         <br>

					<label for="hsdropdown">Select Honor Society:</label>
					<select class="form-control input-sm" name="hsfilterdropdown" id="hsdropdown">
					<option value="null">Select One</option>
					<?php
					$connection = get_conn();

					$query = "SELECT Name FROM HonorSociety";
					$result = mysqli_query($connection, $query);

					while ($ret = mysqli_fetch_array($result)) {
					echo "<option value=\"" . $ret["Name"] . "\">" .
							       $ret["Name"] . "</option>";
						       }
							       close_conn($connection);
							?>
					</select>
					
					<br>

					<label for="emailM">Member Email:</label>
                                        <input type="text" id="emailM" name="emailM" class="form-control input-sm" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80" placeholder= "Email">

					<label for="emailO">Officer Email:</label>
                                        <input type="text" id="emailO" name="emailO" class="form-control input-sm" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80" placeholder= "Email">

					<label for="emailF">Faculty Advisor Email:</label>
                                        <input type="text" id="emailF" name="emailF" class="form-control input-sm" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80" placeholder= "Email">
					
					<label for="upRecipient">Scholarship Recipient:</label>
                                        <input type="text" id="upRecipient" name="schRecipient" class="form-control input-sm" minlength="3" maxlength="50" placeholder="Recipient Name">
					
					<label for="dateU">Activity Date</label>
					<input type="date" id="dateU" name = "date">
				
					<label for="timeU">Activity Time</label>
					<input type="time" id="timeU" name="time" value="12:00" step="1">

					<br>
        				<br>

				       	<label for="attributeMdd">Select an Attribute to Update:</label>
				       	<select class="form-control input-sm" name="attributeMdd" id="attributeMdd" required>
				       	<option value="null">Select One</option>
				       	<option value="MembershipID">Membership ID</option>
				       	<option value="MemName">Member Name</option>
				       	<option value="MemEmail">Member Email</option>
				       	</select>

				       	<label for="attributeOdd">Select an Attribute to Update:</label>
				       	<select class="form-control input-sm" name="attributeOdd" id="attributeOdd" required>
				       	<option value="null">Select One</option>
				      	<option value="ofEmail">Email</option>
					<option value="ofTitle">Title</option>
					<option value="ofYear">Year</option>
					</select>

					<label for="attributeFdd">Select an Attribute to Update:</label>
					<select class="form-control input-sm" name="attributeFdd" id="attributeFdd" required>
					<option value="null">Select One</option>
					<option value="faEmail">Email</option>
					<option value="faYear">Year</option>
					</select>

					<label for="attributeSdd">Select an Attribute to Update:</label>
					<select class="form-control input-sm" name="attributeSdd" id="attributeSdd" required>
					<option value="null">Select One</option>
					<option value="Recipient">Recipient</option>
					<option value="Year">Year</option>
					<option value="Type">Type</option>
					<option value="DollarAmount">Dollar Amount</option>
					</select>

					<label for="attributeORdd">Select an Attribute to Update:</label>
					<select class="form-control input-sm" name="attributeORdd" id="attributeORdd" required>
					<option value="null">Select One</option>
					<option value="ActName">Activity Name</option>
					<option value="ActDesc">Activity Description</option>
					<option value="Speaker">Speaker</option>
					<option value="DoA">Date of Activity</option>
					</select>

					<label for="attributeHdd">Select an Attribute to Update:</label>
                                        <select class="form-control input-sm" name="attributeHdd" id="attributeHdd" required>
                                        <option value="null">Select One</option>
                                        <option value="Sname">Society Name</option>
                                        <option value="SDesc">Society Description</option>
                                        <option value="Requirements">Requirements</option>
                                        <option value="Constitution">Constitution</option>
					<option value="Bylaws">By-Laws</option>
					<option value="OrgLink">Organization Link</option>
					<option value="Fees">Fees</option>
                                        </select>
					
					<br>

					<label for="newDate">Updated Activity Date</label>
                                        <input type="date" id="newDate" name = "newDate">

                                        <label for="newTime">Updated Activity Time</label>
                                        <input type="time" id="newTime" name="newTime" value="12:00" step="1">


					<br>

					<label for="attribute">New Attribute Value:</label>
					<input type="text" id="attribute" name="attribute" class="form-control input-sm" placeholder="New value">
					<br>
                    <?php //TODO ?>
                    <!-- Because of overlap, the field will have some vulnerabilities -->
					<button type="submit" id="submitAttr" name="submitAttr" class="btn btn-danger btn-sm">Update</button>
					</form>
				</div>
			</div>

		<div id="Insert" class="tabcontent">
			<h3>Insert Information</h3>
			<div class="insertContainer">
				<script type="text/javascript">
					function hideFields(){
						if($('#tbldropdown').val() == "null"){
	                                                // hs fields
							$('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                        	        $('label[for=Name], #Name').hide();
                                	                $('label[for=Description], #Description').hide();
                        	                        $('label[for=Requirements], #Requirements').hide();
                	                                $('label[for=Constitution], #Constitution').hide();
        	                                        $('label[for=ByLaws], #ByLaws').hide();
	                                                $('label[for=OrganizationLink], #OrganizationLink').hide();
                                             		$('label[for=Fees], #Fees').hide();
							// members fields
							$('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=MembershipID],#MembershipID').hide();
                                                        $('label[for=MemName],#MemName').hide();
                                                        $('label[for=MemEmail],#MemEmail').hide();
							// officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=ofEmail],#ofEmail').hide();
                                                        $('label[for=ofTitle],#ofTitle').hide();
                                                        $('label[for=ofYear],#ofYear').hide();
                         				// faculty advisors fields       
			                                $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=faEmail],#faEmail').hide();
                                                        $('label[for=faYear],#faYear').hide();
							// organization activity fields
                                                        $('label[for=ActName],#ActName').hide();
                                                        $('label[for=ActDesc],#ActDesc').hide();
                                                        $('label[for=Speaker],#Speaker').hide();
                                                        $('label[for="date"],#date').hide();
                                                        $('label[for="time"],#time').hide();
							// scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=Recipient],#Recipient').hide();
                                                        $('label[for=scholarshipEmail], #scholarshipEmail').hide();
                                                        $('label[for=Year],#Year').hide();
                                                        $('label[for=Type],#Type').hide();
                                                        $('label[for=DollarAmount],#DollarAmount').hide();
							
							//makes form elements not required when option selected
                                                        // hs fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Name], #Name').prop("required", false);
                                                        $('label[for=Description], #Description').prop("required", false);
                                                        $('label[for=Requirements], #Requirements').prop("required", false);
                                                        $('label[for=Constitution], #Constitution').prop("required", false);
                                                        $('label[for=ByLaws], #ByLaws').prop("required", false);
                                                        $('label[for=OrganizationLink], #OrganizationLink').prop("required", false);
                                                        $('label[for=Fees], #Fees').prop("required", false);
							//member fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
							$('label[for=MembershipID],#MembershipID').prop("required", false);
							$('label[for=MemName],#MemName').prop("required", false);
							$('label[for=MemEmail],#MemEmail').prop("required", false);
							// officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required, false");
                                                        $('label[for=ofEmail],#ofEmail').prop("required", false);
                                                        $('label[for=ofTitle],#ofTitle').prop("required", false);
                                                        $('label[for=ofYear],#ofYear').prop("required", false);
                         				// faculty advisors fields       
			                                $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=faEmail],#faEmail').prop("required", false);
                                                        $('label[for=faYear],#faYear').prop("required", false);
							// organization activity fields
                                                        $('label[for=ActName],#ActName').prop("required", false);
                                                        $('label[for=ActDesc],#ActDesc').prop("required", false);
                                                        $('label[for=Speaker],#Speaker').prop("required", false);
                                                        $('label[for="date"],#date').prop("required", false);
                                                        $('label[for="time"],#time').prop("required", false);
							
							// scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Recipient],#Recipient').prop("required", false);
                                                        $('label[for=Year],#Year').prop("required", false);
                                                        $('label[for=Type],#Type').prop("required", false);
                                                        $('label[for=DollarAmount],#DollarAmount').prop("required", false);
					
						}else if($('#tbldropdown').val()=="HonorSociety"){
                                                        // members fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=MembershipID],#MembershipID').hide();
                                                        $('label[for=MemName],#MemName').hide();
                                                        $('label[for=MemEmail],#MemEmail').hide();
                                                        // officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=ofEmail],#ofEmail').hide();
                                                        $('label[for=ofTitle],#ofTitle').hide();
                                                        $('label[for=ofYear],#ofYear').hide();
                                                        // faculty advisors fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=faEmail],#faEmail').hide();
                                                        $('label[for=faYear],#faYear').hide();
                                                        // organization activity fields
                                                        $('label[for=ActName],#ActName').hide();
                                                        $('label[for=ActDesc],#ActDesc').hide();
                                                        $('label[for=Speaker],#Speaker').hide();
                                                        $('label[for="date"],#date').hide();
                                                        $('label[for="time"],#time').hide();
							// scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=Recipient],#Recipient').hide();
                                                        $('label[for=scholarshipEmail], #scholarshipEmail').hide();
                                                        $('label[for=Year],#Year').hide();
                                                        $('label[for=Type],#Type').hide();
                                                        $('label[for=DollarAmount],#DollarAmount').hide();
	
							//makes form elements not required when option selected
							//member fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required",false);
							$('label[for=MembershipID],#MembershipID').prop("required", false);
							$('label[for=MemName],#MemName').prop("required", false);
							$('label[for=MemEmail],#MemEmail').prop("required", false);
							// officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=ofEmail],#ofEmail').prop("required", false);
                                                        $('label[for=ofTitle],#ofTitle').prop("required", false);
                                                        $('label[for=ofYear],#ofYear').prop("required", false);
                         				// faculty advisors fields       
			                                $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=faEmail],#faEmail').prop("required", false);
                                                        $('label[for=faYear],#faYear').prop("required", false);
							// organization activity fields
                                                        $('label[for=ActName],#ActName').prop("required", false);
                                                        $('label[for=ActDesc],#ActDesc').prop("required", false);
                                                        $('label[for=Speaker],#Speaker').prop("required", false);
                                                        $('label[for="date"],#date').prop("required", false);
                                                        $('label[for="time"],#time').prop("required", false);
						       
							// scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Recipient],#Recipient').prop("required", false);
                                                        $('label[for=Year],#Year').prop("required", false);
                                                        $('label[for=Type],#Type').prop("required", false);
                                                        $('label[for=DollarAmount],#DollarAmount').prop("required", false);
						
						}else if($('#tbldropdown').val()=="Members"){
                                                        // hs fields
							$('label[for=Name], #Name').hide();
                                                        $('label[for=Description], #Description').hide();
                                                        $('label[for=Requirements], #Requirements').hide();
                                                        $('label[for=Constitution], #Constitution').hide();
                                                        $('label[for=ByLaws], #ByLaws').hide();
                                                        $('label[for=OrganizationLink], #OrganizationLink').hide();
                                                        $('label[for=Fees], #Fees').hide();
                                                        // officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=ofEmail],#ofEmail').hide();
                                                        $('label[for=ofTitle],#ofTitle').hide();
                                                        $('label[for=ofYear],#ofYear').hide();
                                                        // faculty advisors fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=faEmail],#faEmail').hide();
                                                        $('label[for=faYear],#faYear').hide();
                                                        // organization activity fields
                                                        $('label[for=ActName],#ActName').hide();
                                                        $('label[for=ActDesc],#ActDesc').hide();
                                                        $('label[for=Speaker],#Speaker').hide();
                                                        $('label[for="date"],#date').hide();
                                                        $('label[for="time"],#time').hide();
							// scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=Recipient],#Recipient').hide();
                                                        $('label[for=scholarshipEmail], #scholarshipEmail').hide();
                                                        $('label[for=Year],#Year').hide();
                                                        $('label[for=Type],#Type').hide();
                                                        $('label[for=DollarAmount],#DollarAmount').hide();

							//makes form elements not required when option selected
                                                        // hs fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Name], #Name').prop("required", false);
                                                        $('label[for=Description], #Description').prop("required", false);
                                                        $('label[for=Requirements], #Requirements').prop("required", false);
                                                        $('label[for=Constitution], #Constitution').prop("required", false);
                                                        $('label[for=ByLaws], #ByLaws').prop("required", false);
                                                        $('label[for=OrganizationLink], #OrganizationLink').prop("required", false);
                                                        $('label[for=Fees], #Fees').prop("required", false);
							// officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=ofEmail],#ofEmail').prop("required", false);
                                                        $('label[for=ofTitle],#ofTitle').prop("required", false);
                                                        $('label[for=ofYear],#ofYear').prop("required", false);
                         				// faculty advisors fields       
			                                $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=faEmail],#faEmail').prop("required", false);
                                                        $('label[for=faYear],#faYear').prop("required", false);
							// organization activity fields
                                                        $('label[for=ActName],#ActName').prop("required", false);
                                                        $('label[for=ActDesc],#ActDesc').prop("required", false);
                                                        $('label[for=Speaker],#Speaker').prop("required", false);
                                                        $('label[for="date"],#date').prop("required", false);
                                                        $('label[for="time"],#time').prop("required", false);
							
							// scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Recipient],#Recipient').prop("required", false);
                                                        $('label[for=Year],#Year').prop("required", false);
                                                        $('label[for=Type],#Type').prop("required", false);
                                                        $('label[for=DollarAmount],#DollarAmount').prop("required", false);

						}else if($('#tbldropdown').val()=="Officers"){
							// hs fields
                                                        $('label[for=Name], #Name').hide();
                                                        $('label[for=Description], #Description').hide();
                                                        $('label[for=Requirements], #Requirements').hide();
                                                        $('label[for=Constitution], #Constitution').hide();
                                                        $('label[for=ByLaws], #ByLaws').hide();
                                                        $('label[for=OrganizationLink], #OrganizationLink').hide();
                                                        $('label[for=Fees], #Fees').hide();
                                                        // members fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=MembershipID],#MembershipID').hide();
                                                        $('label[for=MemName],#MemName').hide();
                                                        $('label[for=MemEmail],#MemEmail').hide();
                                                        // faculty advisors fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=faEmail],#faEmail').hide();
                                                        $('label[for=faYear],#faYear').hide();
                                                        // organization activity fields
                                                        $('label[for=ActName],#ActName').hide();
                                                        $('label[for=ActDesc],#ActDesc').hide();
                                                        $('label[for=Speaker],#Speaker').hide();
                                                        $('label[for="date"],#date').hide();
                                                        $('label[for="time"],#time').hide();
							// scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=Recipient],#Recipient').hide();
                                                        $('label[for=scholarshipEmail], #scholarshipEmail').hide();
                                                        $('label[for=Year],#Year').hide();
                                                        $('label[for=Type],#Type').hide();
                                                        $('label[for=DollarAmount],#DollarAmount').hide();

							//makes form elements not required when option selected
                                                        // hs fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Name], #Name').prop("required", false);
                                                        $('label[for=Description], #Description').prop("required", false);
                                                        $('label[for=Requirements], #Requirements').prop("required", false);
                                                        $('label[for=Constitution], #Constitution').prop("required", false);
                                                        $('label[for=ByLaws], #ByLaws').prop("required", false);
                                                        $('label[for=OrganizationLink], #OrganizationLink').prop("required", false);
                                                        $('label[for=Fees], #Fees').prop("required", false);
							//member fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
							$('label[for=MembershipID],#MembershipID').prop("required", false);
							$('label[for=MemName],#MemName').prop("required", false);
							$('label[for=MemEmail],#MemEmail').prop("required", false);
                         				// faculty advisors fields       
			                                $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=faEmail],#faEmail').prop("required", false);
                                                        $('label[for=faYear],#faYear').prop("required", false);
							// organization activity fields
                                                        $('label[for=ActName],#ActName').prop("required", false);
                                                        $('label[for=ActDesc],#ActDesc').prop("required", false);
                                                        $('label[for=Speaker],#Speaker').prop("required", false);
                                                        $('label[for="date"],#date').prop("required", false);
                                                        $('label[for="time"],#time').prop("required", false);
							
							// scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Recipient],#Recipient').prop("required", false);
                                                        $('label[for=Year],#Year').prop("required", false);
                                                        $('label[for=Type],#Type').prop("required", false);
                                                        $('label[for=DollarAmount],#DollarAmount').prop("required", false);
						
						}else if($('#tbldropdown').val()=='FacultyAdvisors'){
                                                        // hs fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=Name], #Name').hide();
                                                        $('label[for=Description], #Description').hide();
                                                        $('label[for=Requirements], #Requirements').hide();
                                                        $('label[for=Constitution], #Constitution').hide();
                                                        $('label[for=ByLaws], #ByLaws').hide();
                                                        $('label[for=OrganizationLink], #OrganizationLink').hide();
                                                        $('label[for=Fees], #Fees').hide();
                                                        // members fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=MembershipID],#MembershipID').hide();
                                                        $('label[for=MemName],#MemName').hide();
                                                        $('label[for=MemEmail],#MemEmail').hide();
                                                        // officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=ofEmail],#ofEmail').hide();
                                                        $('label[for=ofTitle],#ofTitle').hide();
                                                        $('label[for=ofYear],#ofYear').hide();
                                                        // organization activity fields
                                                        $('label[for=ActName],#ActName').hide();
                                                        $('label[for=ActDesc],#ActDesc').hide();
                                                        $('label[for=Speaker],#Speaker').hide();
                                                        $('label[for="date"],#date').hide();
                                                        $('label[for="time"],#time').hide();
							// scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=Recipient],#Recipient').hide();
                                                        $('label[for=scholarshipEmail], #scholarshipEmail').hide();
                                                        $('label[for=Year],#Year').hide();
                                                        $('label[for=Type],#Type').hide();
                                                        $('label[for=DollarAmount],#DollarAmount').hide();

							//makes form elements not required when option selected
                                                        // hs fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Name], #Name').prop("required", false);
                                                        $('label[for=Description], #Description').prop("required", false);
                                                        $('label[for=Requirements], #Requirements').prop("required", false);
                                                        $('label[for=Constitution], #Constitution').prop("required", false);
                                                        $('label[for=ByLaws], #ByLaws').prop("required", false);
                                                        $('label[for=OrganizationLink], #OrganizationLink').prop("required", false);
                                                        $('label[for=Fees], #Fees').prop("required", false);
							//member fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
							$('label[for=MembershipID],#MembershipID').prop("required", false);
							$('label[for=MemName],#MemName').prop("required", false);
							$('label[for=MemEmail],#MemEmail').prop("required", false);
							// officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=ofEmail],#ofEmail').prop("required", false);
                                                        $('label[for=ofTitle],#ofTitle').prop("required", false);
                                                        $('label[for=ofYear],#ofYear').prop("required", false);
                                                        // organization activity fields
                                                        $('label[for=ActName],#ActName').prop("required", false);
                                                        $('label[for=ActDesc],#ActDesc').prop("required", false);
                                                        $('label[for=Speaker],#Speaker').prop("required", false);
                                                        $('label[for="date"],#date').prop("required", false);
                                                        $('label[for="time"],#time').prop("required", false);
							// scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Recipient],#Recipient').prop("required", false);
                                                        $('label[for=Year],#Year').prop("required", false);
                                                        $('label[for=Type],#Type').prop("required", false);
                                                        $('label[for=DollarAmount],#DollarAmount').prop("required", false);
						
						}else if($('#tbldropdown').val()=='OrganizationActivities'){
                                                        // hs fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=Name], #Name').hide();
                                                        $('label[for=Description], #Description').hide();
                                                        $('label[for=Requirements], #Requirements').hide();
                                                        $('label[for=Constitution], #Constitution').hide();
                                                        $('label[for=ByLaws], #ByLaws').hide();
                                                        $('label[for=OrganizationLink], #OrganizationLink').hide();
                                                        $('label[for=Fees], #Fees').hide();
                                                        // members fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=MembershipID],#MembershipID').hide();
                                                        $('label[for=MemName],#MemName').hide();
                                                        $('label[for=MemEmail],#MemEmail').hide();
                                                        // officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=ofEmail],#ofEmail').hide();
                                                        $('label[for=ofTitle],#ofTitle').hide();
                                                        $('label[for=ofYear],#ofYear').hide();
                                                        // faculty advisors fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=faEmail],#faEmail').hide();
                                                        $('label[for=faYear],#faYear').hide();
                                                        // scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=Recipient],#Recipient').hide();
                                                        $('label[for=scholarshipEmail], #scholarshipEmail').hide();
                                                        $('label[for=Year],#Year').hide();
                                                        $('label[for=Type],#Type').hide();
                                                        $('label[for=DollarAmount],#DollarAmount').hide();

							//makes form elements not required when option selected
                                                        // hs fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Name], #Name').prop("required", false);
                                                        $('label[for=Description], #Description').prop("required", false);
                                                        $('label[for=Requirements], #Requirements').prop("required", false);
                                                        $('label[for=Constitution], #Constitution').prop("required", false);
                                                        $('label[for=ByLaws], #ByLaws').prop("required", false);
                                                        $('label[for=OrganizationLink], #OrganizationLink').prop("required", false);
                                                        $('label[for=Fees], #Fees').prop("required", false);
							//member fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
							$('label[for=MembershipID],#MembershipID').prop("required", false);
							$('label[for=MemName],#MemName').prop("required", false);
							$('label[for=MemEmail],#MemEmail').prop("required", false);
							// officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required, false");
                                                        $('label[for=ofEmail],#ofEmail').prop("required", false);
                                                        $('label[for=ofTitle],#ofTitle').prop("required", false);
                                                        $('label[for=ofYear],#ofYear').prop("required", false);
                         				// faculty advisors fields       
			                                $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=faEmail],#faEmail').prop("required", false);
                                                        $('label[for=faYear],#faYear').prop("required", false);
                                                        // scholarship fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Recipient],#Recipient').prop("required", false);
                                                      	$('label[for=Year],#Year').prop("required", false);
                                                       	$('label[for=Type],#Type').prop("required", false);
                                                        $('label[for=DollarAmount],#DollarAmount').prop("required", false);

						}else if($('#tbldropdown').val()=='Scholarship'){
                                                        // hs fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=Name], #Name').hide();
                                                        $('label[for=Description], #Description').hide();
                                                        $('label[for=Requirements], #Requirements').hide();
                                                        $('label[for=Constitution], #Constitution').hide();
                                                        $('label[for=ByLaws], #ByLaws').hide();
                                                        $('label[for=OrganizationLink], #OrganizationLink').hide();
                                                        $('label[for=Fees], #Fees').hide();
                                                        // members fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=MembershipID],#MembershipID').hide();
                                                        $('label[for=MemName],#MemName').hide();
                                                        $('label[for=MemEmail],#MemEmail').hide();
                                                        // officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=ofEmail],#ofEmail').hide();
                                                        $('label[for=ofTitle],#ofTitle').hide();
                                                        $('label[for=ofYear],#ofYear').hide();
                                                        // faculty advisors fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').hide();
                                                        $('label[for=faEmail],#faEmail').hide();
                                                        $('label[for=faYear],#faYear').hide();
                                                        // organization activity fields
                                                        $('label[for=ActName],#ActName').hide();
                                                        $('label[for=ActDesc],#ActDesc').hide();
                                                        $('label[for=Speaker],#Speaker').hide();
                                                        $('label[for="date"],#date').hide();
                                                        $('label[for="time"],#time').hide();
							
							//makes form elements not required when option selected
                                                        // hs fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=Name], #Name').prop("required", false);
                                                        $('label[for=Description], #Description').prop("required", false);
                                                        $('label[for=Requirements], #Requirements').prop("required", false);
                                                        $('label[for=Constitution], #Constitution').prop("required", false);
                                                        $('label[for=ByLaws], #ByLaws').prop("required", false);
                                                        $('label[for=OrganizationLink], #OrganizationLink').prop("required", false);
                                                        $('label[for=Fees], #Fees').prop("required", false);
							//member fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
							$('label[for=MembershipID],#MembershipID').prop("required", false);
							$('label[for=MemName],#MemName').prop("required", false);
							$('label[for=MemEmail],#MemEmail').prop("required", false);
							// officers fields
                                                        $('label[for=hsselectdropdown], #hsselectdropdown').prop("required, false");
                                                        $('label[for=ofEmail],#ofEmail').prop("required", false);
                                                        $('label[for=ofTitle],#ofTitle').prop("required", false);
                                                        $('label[for=ofYear],#ofYear').prop("required", false);
                         				// faculty advisors fields       
			                                $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", false);
                                                        $('label[for=faEmail],#faEmail').prop("required", false);
                                                        $('label[for=faYear],#faYear').prop("required", false);
							// organization activity fields
                                                        $('label[for=ActName],#ActName').prop("required", false);
                                                        $('label[for=ActDesc],#ActDesc').prop("required", false);
                                                        $('label[for=Speaker],#Speaker').prop("required", false);
                                                        $('label[for="date"],#date').prop("required", false);
                                                        $('label[for="time"],#time').prop("required", false);
						}
					}

					$(document).ready(function(){
						hideFields();	
	
						$('#tbldropdown').change(function(){
							if($('#tbldropdown').val()=="null"){
								hideFields();
		
							}else if($('#tbldropdown').val()=="HonorSociety"){
								hideFields();
								$('label[for=Name], #Name').show();
								$('label[for=Description], #Description').show();
                                                        	$('label[for=Requirements], #Requirements').show();
                                                       		$('label[for=Constitution], #Constitution').show();
                                                	        $('label[for=ByLaws], #ByLaws').show();
                                                	        $('label[for=OrganizationLink], #OrganizationLink').show();
                                                 	      	$('label[for=Fees], #Fees').show();
	
								//makes form elements required when option selected
								$('label[for=Name], #Name').prop("required", true);
								$('label[for=Description], #Description').prop("required", true);
                                                        	$('label[for=Requirements], #Requirements').prop("required", true);
                                                       		$('label[for=Constitution], #Constitution').prop("required", true);
                                                	        $('label[for=ByLaws], #ByLaws').prop("required", true);
                                                	        $('label[for=OrganizationLink], #OrganizationLink').prop("required", true);
                                                 	      	$('label[for=Fees], #Fees').prop("required", true);
					
							}else if($('#tbldropdown').val()=="Members"){
								hideFields();
								$('label[for=hsselectdropdown], #hsselectdropdown').show();
								$('label[for=MembershipID],#MembershipID').show();
								$('label[for=MemName],#MemName').show();
								$('label[for=MemEmail],#MemEmail').show();

								//makes form elements required when option selected
								$('label[for=hsselectdropdown], #hsselectdropdown').prop("required", true);
								$('label[for=MembershipID],#MembershipID').prop("required", true);
								$('label[for=MemName],#MemName').prop("required", true);
								$('label[for=MemEmail],#MemEmail').prop("required", true);
							}else if($('#tbldropdown').val()=="Officers"){
								hideFields();
                                                                $('label[for=hsselectdropdown], #hsselectdropdown').show();
                                                                $('label[for=ofEmail],#ofEmail').show();
                                                                $('label[for=ofTitle],#ofTitle').show();
                                                                $('label[for=ofYear],#ofYear').show();

								//makes form elements required when option selected
                                                                $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", true);
                                                                $('label[for=ofEmail],#ofEmail').prop("required", true);
                                                                $('label[for=ofTitle],#ofTitle').prop("required", true);
                                                                $('label[for=ofYear],#ofYear').prop("required", true);
							
							}else if($('#tbldropdown').val()=="FacultyAdvisors"){
								hideFields();
                                                                $('label[for=hsselectdropdown], #hsselectdropdown').show();
                                                                $('label[for=faEmail],#faEmail').show();
                                                                $('label[for=faYear],#faYear').show();

								//makes form elements required when option selected
                                                                $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", true);
                                                                $('label[for=faEmail],#faEmail').prop("required", true);
                                                                $('label[for=faYear],#faYear').prop("required", true);

							}else if($('#tbldropdown').val()=="OrganizationActivities"){
								hideFields();
                                                                $('label[for=hsselectdropdown], #hsselectdropdown').show();
                                                                $('label[for=ActName],#ActName').show();
                                                                $('label[for=ActDesc],#ActDesc').show();
                                                                $('label[for=Speaker],#Speaker').show();
                                       		                $('label[for=date],#date').show();
                                               		        $('label[for=time],#time').show();
								//makes form elements required when option selected
                                                                $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", true);
                                                                $('label[for=ActName],#ActName').prop("required", true);
                                                                $('label[for=ActDesc],#ActDesc').prop("required", true);
                                                                $('label[for=Speaker],#Speaker').prop("required", true);
                                       		                $('label[for=date],#date').prop("required",true);
                                               		        $('label[for=time],#time').prop("required", true);
							
							}else if($('#tbldropdown').val()=="Scholarship"){
								hideFields();
                                                                $('label[for=hsselectdropdown], #hsselectdropdown').show();
                                                                $('label[for=Recipient],#Recipient').show();
								$('label[for=scholarshipEmail], #scholarshipEmail').show();
                                                                $('label[for=Year],#Year').show();
                                                                $('label[for=Type],#Type').show();
                                                                $('label[for=DollarAmount],#DollarAmount').show();

								//makes form elements required when option selected
                                                                $('label[for=hsselectdropdown], #hsselectdropdown').prop("required", true);
                                                                $('label[for=Recipient],#Recipient').prop("required", true);
                                                                $('label[for=Year],#Year').prop("required", true);
                                                                $('label[for=Type],#Type').prop("required", true);
                                                                $('label[for=DollarAmount],#DollarAmount').prop("required", true);
							}
						});
					});	

				</script>

				<form class="insertform" method="POST" action="https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/Processing/processInsert.php" id="insert_form">
					<label for="tbldropdown">Select Table:</label>
					<select class="form-control input-sm" name="tblselect" id="tbldropdown" required>
						<option value="null">Select One</option>
						<option value="FacultyAdvisors">Faculty Advisors</option>
						<option value="HonorSociety">Honor Societies</option>
						<option value="Members">Members</option>
						<option value="Officers">Officers</option>
						<option value="OrganizationActivities">Organization Activities</option>
						<option value="Scholarship">Scholarships</option> 
					</select>

					<label for="hsselectdropdown">Select Honor Society:</label>
					<select class="form-control input-sm" name="hsselect" id="hsselectdropdown" required>
						<option value="null" selected>Select One</option>
						<?php
							$connection = get_conn();
							
							$query = "SELECT Name FROM HonorSociety";
							$result = mysqli_query($connection, $query);

							while($ret = mysqli_fetch_array($result)){
								echo "<option value=\"" . $ret["Name"] . "\">" .
									$ret["Name"] . "</option>";
							}
							close_conn($connection);
						?>
					</select>
					<br>

				<!-- Honor Society Entry Fields -->
					<label for="Name">Society Name</label>					
					<input type="text" id="Name" name="hsName" minlength="1" maxlength="50" placeholder="Honor Society Name">
					
					<label for="Description">Description</label>
					<input type="text" id="Description" name="hsDescription" minlength="1" maxlength="500" placeholder="Description">
					
					
					<label for="Requirements">Requirements</label>
					<input type="text" id="Requirements" name="hsRequirements" minlength="1" maxlength="500" placeholder="Requirements">
					
					<br>	
					<label for="Constitution">Constitution</label>
					<input type="text" id="Constitution" name="hsConstitution" minlength="1" maxlength="50" placeholder="Constitution">
						
					<label for="ByLaws">By Laws</label>
					<input type="text" id="ByLaws" name="hsByLaws" minlength="1" maxlength="50" placeholder="By Laws">
					
					
					<label for="OrganizationLink">Organization Link</label>
					<input type="text" id="OrganizationLink" name="hsOrganizationLink" minlength="1" maxlength="200" placeholder="Organization Link">
					
					<br>		
					<label for="Fees">Fees</label>
					<input type="text" id="Fees" name="hsFees" pattern="([0-9]+(\.[0-9]+)?)" maxlength="10" placeholder="$ Amount Format: 0.00">
				<!-- Members Entry Fields -->
				

					<label for="MembershipID">Membership ID</label>
					<input type="text" id="MembershipID" name="memMembershipID" minlength="1" maxlength="15" placeholder="Membership ID">
					
					<label for="MemName">Member Name</label>
					<input type="text" id="MemName" name="memName" minlength="1" maxlength="50" placeholder="Name">
					
					<label for="MemEmail">Member Email</label>
					<input type="text" id="MemEmail" name="memEmail" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80" placeholder="Student/Faculty Email">
				
				<!-- Officers -->
					<label for="ofEmail">Email</label>
					<input type="text" id="ofEmail" name="offemail" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80" placeholder="Student Email">
					
					<label for="ofTitle">Title</label>
					<input type="text" id="ofTitle" name="offTitle" minlength="1" maxlength="50" placeholder="Officer Title">
					
					<label for="ofYear">Year</label>			
					<input type="text" id="ofYear" name="offYear" pattern="\d{4}" placeholder="YYYY">
			
				<!-- Faculty Advisors -->
			
					<label for="faEmail">Email</label>
					<input type="text" id="faEmail" name="faemail" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80" placeholder="Faculty Advisor Email">
				
					<label for="faYear">Year</label>
					<input type="text" id="faYear" name="faYear" pattern="\d{4}" placeholder="YYYY">
		
				<!-- Scholarship Entry Fields -->
					<label for="Recipient">Recipient</label>
					<input type="text" id="Recipient" name="schRecipient" minlength="1" maxlength="50" placeholder="Recipient Name">
					
					<label for="Year">Year</label>
					<input type="text" id="Year" name="schYear" pattern="\d{4}" placeholder="YYYY">

					<br>	
					<label for="Type">Type of Scholarship</label>
					<input type="text" id="Type" name="schType" minlength="1" maxlength="30" placeholder="Type of Scholarship">
					
					<label for="DollarAmount">Scholarship Amount</label>
					<input type="text" id="DollarAmount" name="schAmount" maxlength="10" pattern="([0-9]+(\.[0-9]+)?)" placeholder="$ Amount Format: 0.00">
                    <label for="scholarshipEmail">Email</label>
                    <input type="text" id="scholarshipEmail" name="schemail" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80" placeholder="Email of Recipient">
	
				<!-- Organization Activity Entry Fields -->
					<label for="date">Activity Date</label>
					<input type="date" id="date" name = "date">
					<label for="time">Activity Time</label>
					<input type="time" id="time" name="time" value="12:00" step="1">
					
					<label for="ActDesc">Activity Description</label>
					<input type="text" id="ActDesc" name="oaDescription" minlength="1" maxlength="200" placeholder="Description">
					
					<label for="Speaker">Speaker</label>
					<input type="text" id="Speaker" name="oaSpeaker" minlength="1" maxlength="50" placeholder="Speaker(s)">
					
					<label for="ActName">Activity Name</label>
					<input type="text" id="ActName" name="oaActivityName" minlength="1" maxlength="50" placeholder="Name of Activity">
					<br>	
					<br>
					<button type="submit" id="submitButton" name="submitButton" class="btn btn-danger btn-sm">Insert</button>
				</form>
			</div>
		</div>

			
		<div id="Delete" class="tabcontent">
			<h3>Delete Information</h3>
				<div class="deleteContainer">
				<script type="text/javascript">
					function hidedd1(){
						if($('#tabledd1').val()=="null"){
							$('label[for=hsdropdown1], #hsdropdown1').hide();
							$('label[for=emailM1], #emailM1').hide();
							$('label[for=emailO1], #emailO1').hide();
							$('label[for=emailF1], #emailF1').hide();
							$('label[for=Recipient1], #Recipient1').hide();
							$('label[for=time1], #time1').hide();
							$('label[for=date1], #date1').hide();
				
							$('label[for=hsdropdown1], #hsdropdown1').prop("required",false);	
							$('label[for=emailM1], #emailM1').prop("required", false);
							$('label[for=emailO1], #emailO1').prop("required", false);
							$('label[for=emailF1], #emailF1').prop("required", false);
							$('label[for=Recipient1], #Recipient1').prop("required", false);
							$('label[for=time1], #time1').prop("required", false);
							$('label[for=date1], #date1').prop("required", false);
						}
						else if($('#tabledd1').val()=="Members"){
                                                        $('label[for=emailO1], #emailO1').hide();
                                                        $('label[for=emailF1], #emailF1').hide();
                                                        $('label[for=Recipient1], #Recipient1').hide(); 
							$('label[for=time1], #time1').hide();
							$('label[for=date1], #date1').hide();
							
							$('label[for=emailO1], #emailO1').prop("required", false);
							$('label[for=emailF1], #emailF1').prop("required", false);
							$('label[for=Recipient1], #Recipient1').prop("required", false);
							$('label[for=time1], #time1').prop("required", false);
							$('label[for=date1], #date1').prop("required", false);
						}
						else if($('#tabledd1').val() == "Officers"){
							$('label[for=emailM1], #emailM1').hide();
                                                        $('label[for=emailF1], #emailF1').hide();
                                                        $('label[for=Recipient1], #Recipient1').hide();
							$('label[for=time1], #time1').hide();
							$('label[for=date1], #date1').hide();
							
							$('label[for=emailM1], #emailM1').prop("required", false);
							$('label[for=emailF1], #emailF1').prop("required", false);
							$('label[for=Recipient1], #Recipient1').prop("required", false);
							$('label[for=time1], #time1').prop("required", false);
							$('label[for=date1], #date1').prop("required", false);

						}
						else if($('#tabledd1').val() == "FacultyAdvisors"){
							$('label[for=emailM1], #emailM1').hide();
                                                        $('label[for=emailO1], #emailO1').hide();
                                                        $('label[for=Recipient1], #Recipient1').hide(); 
							$('label[for=time1], #time1').hide();
							$('label[for=date1], #date1').hide();
							
							$('label[for=emailM1], #emailM1').prop("required", false);
							$('label[for=emailO1], #emailO1').prop("required", false);
							$('label[for=Recipient1], #Recipient1').prop("required", false);
							$('label[for=time1], #time1').prop("required", false);
							$('label[for=date1], #date1').prop("required", false);
						}
						else if($('#tabledd1').val() == "Scholarship"){
							$('label[for=emailM1], #emailM1').hide();
                                                        $('label[for=emailO1], #emailO1').hide();
                                                        $('label[for=emailF1], #emailF1').hide();
                                                        $('label[for=time1], #time1').hide();
							$('label[for=date1], #date1').hide();
							
							$('label[for=emailM1], #emailM1').prop("required", false);
							$('label[for=emailO1], #emailO1').prop("required", false);
							$('label[for=emailF1], #emailF1').prop("required", false);
							$('label[for=time1], #time1').prop("required", false);
							$('label[for=date1], #date1').prop("required", false);
						}
						else if($('#tabledd1').val() == "OrganizationActivities"){
							$('label[for=emailM1], #emailM1').hide();
							$('label[for=emailO1], #emailO1').hide();
							$('label[for=emailF1], #emailF1').hide();
                                                        $('label[for=Recipient1], #Recipient1').hide();
							
							$('label[for=emailM1], #emailM1').prop("required", false);
							$('label[for=emailO1], #emailO1').hide();
							$('label[for=emailF1], #emailF1').prop("required", false);
							$('label[for=Recipient1], #Recipient1').prop("required", false);
			 			}
						else if($('#tabledd1').val()=="HonorSociety"){
                                                        $('label[for=emailM1], #emailM1').hide();
                                                        $('label[for=emailO1], #emailO1').hide();
                                                        $('label[for=emailF1], #emailF1').hide();
                                                        $('label[for=Recipient1], #Recipient1').hide();
                                                        $('label[for=time1], #time1').hide();
                                                        $('label[for=date1], #date1').hide();

							
                                                        $('label[for=emailM1], #emailM1').prop("required", false);
                                                        $('label[for=emailO1], #emailO1').hide();
                                                        $('label[for=emailF1], #emailF1').prop("required", false);
                                                        $('label[for=Recipient1], #Recipient1').prop("required", false);
							$('label[for=hsdropdown1], #hsdropdown1').prop("required",true);
		
						}
				 
					}

					$(document).ready(function(){
						hidedd1();

						$('#tabledd1').change(function(){
							if($('#tabledd1').val() == "null"){
								hidedd1();
							}
							else if($('#tabledd1').val() == 'Members'){
								hidedd1();
								$('label[for=hsdropdown1], #hsdropdown1').show();
								$('label[for=emailM1], #emailM1').show();
								
								$('label[for=hsdropdown1], #hsdropdown1').prop("required", true);
								$('label[for=emailM1], #emailM1').prop("required", true);
							}
							else if($('#tabledd1').val() == "Officers"){
								hidedd1();
								$('label[for=hsdropdown1], #hsdropdown1').show();
                                                        	$('label[for=emailO1], #emailO1').show();
						
								$('label[for=hsdropdown1], #hsdropdown1').prop("required", true);
                                                        	$('label[for=emailO1], #emailO1').prop("required", true);
							}
							else if($('#tabledd1').val() == 'FacultyAdvisors'){
								hidedd1();
								$('label[for=hsdropdown1], #hsdropdown1').show();
                                                        	$('label[for=emailF1], #emailF1').show();
							
								$('label[for=hsdropdown1], #hsdropdown1').prop("required",true);
                                                        	$('label[for=emailF1], #emailF1').prop("required", true);
							}
							else if($('#tabledd1').val() == 'Scholarship'){
								hidedd1();
								$('label[for=hsdropdown1], #hsdropdown1').show();
                                                        	$('label[for=Recipient1], #Recipient1').show();

								$('label[for=hsdropdown1], #hsdropdown1').prop("required", true);
                                                        	$('label[for=Recipient1], #Recipient1').prop("required", true);
							}
							else if($('#tabledd1').val() == 'OrganizationActivities'){
								hidedd1();
								$('label[for=hsdropdown1], #hsdropdown1').show();
                                                 		$('label[for=time1], #time1').show();
								$('label[for=date1], #date1').show();
								$('label[for=attribute1], #attribute1').show();
						
								$('label[for=hsdropdown1], #hsdropdown1').prop("required",true);
                                                 		$('label[for=time1], #time1').prop("required", true);
								$('label[for=date1], #date1').prop("required", true);
								$('label[for=attribute1], #attribute1').prop("required", true);
							}
							else if($('#tabledd1').val() == 'HonorSociety'){
								hidedd1();
								$('label[for=hsdropdown1], #hsdropdown1').show();

								$('label[for=hsdropdown1], #hsdropdown1').prop("required",true);

							}
						});
					});
				</script>
			
				<form action="Processing/processDelete.php" method="POST">
					<label for="tabledd1">Select Table:</label>
                                        	<select class="form-control input-sm" name="tabledd1" id="tabledd1" required>
                                        		<option value="null">Select One</option>
                                          		<option value="Members">Members</option>
                                          		<option value="Officers">Officers</option>
                                          		<option value="FacultyAdvisors">Faculty Advisors</option>
                                          		<option value="Scholarship">Scholarships</option>
							<option value="HonorSociety">Honor Societies</option>
                                          		<option value="OrganizationActivities">Activities</option>
                                          	</select>

                                         <br>

					<label for="hsdropdown1">Select Honor Society:</label>
					<select class="form-control input-sm" name="hsfilterdropdown1" id="hsdropdown1">
					<option value="null">Select One</option>
					<?php
					$connection = get_conn();

					$query = "SELECT Name FROM HonorSociety";
					$result = mysqli_query($connection, $query);

					while ($ret = mysqli_fetch_array($result)) {
					echo "<option value=\"" . $ret["Name"] . "\">" .
							       $ret["Name"] . "</option>";
						       }
							       close_conn($connection);
							?>
					</select>
					
					<br>

					<label for="emailM1">Member Email:</label>
                                        <input type="text" id="emailM1" name="emailM1" class="form-control input-sm" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80" placeholder= "Email">

					<label for="emailO1">Officer Email:</label>
                                        <input type="text" id="emailO1" name="emailO1" class="form-control input-sm" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80" placeholder= "Email">

					<label for="emailF1">Faculty Advisor Email:</label>
                                        <input type="text" id="emailF1" name="emailF1" class="form-control input-sm" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" minlength="1" maxlength="80" placeholder= "Email">
					
					<label for="Recipient1">Scholarship Recipient:</label>
                                        <input type="text" id="Recipient1" name="schRecipient1" class="form-control input-sm" minlength="1" maxlength="50" placeholder= "Recipient">
					
					<label for="date1">Activity Date</label>
					<input type="date" id="date1" name = "date1">
				
					<label for="time1">Activity Time</label>
					<input type="time" id="time1" name="time1" value="12:00" step="1">
					

					<br>
					<br>
					<button type="submit" id="submitAttr1" name="submitAttr1" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</div>
			</div>

		
	</div>

		<script>
			function selectForm(evt,tabName){
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for(i=0; i<tabcontent.length;i++){
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for(i=0; i<tablinks.length; i++){
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(tabName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			document.getElementById("defaultOpen").click();
		</script>
		<?php
                	
                       include "Footer/usfooter.php";
                	
        	?>

	</body>

</html>
