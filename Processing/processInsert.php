<?php
    // Start the session
    session_start();
    
    include"functions.php";

    // Make sure they can't get here 
	if (empty($_SESSION['username']))
	{	
		header("Location:index.php");
	}

    // Get the connection
    $connection = get_conn();

    if (strcmp($_POST["tblselect"], "null") == 0) {
        echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
        echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        //die('This should not happen and should be rejected');
    } else if ((strcmp($_POST["hsselect"], "null") == 0) && (strcmp($_POST["tblselect"], "HonorSociety") != 0)) {
        echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
        echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
    } else if (strcmp($_POST["tblselect"], "FacultyAdvisors") == 0) {
        // Insert into the faculty advisors table
        $query = "INSERT INTO FacultyAdvisors(email, hsName, Year) VALUES(?,?,?)";
        $filter = (int)$_POST["faYear"];
        $params = array("ssi", $_POST["faemail"], $_POST["hsselect"], $filter);
        $result = prevent_injection_affected($connection, $query, $params);
        // If result is true, the query was successful
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tblselect"], "HonorSociety") == 0) {
        // Insert into the HonorSociety table
        $query = "INSERT INTO HonorSociety(Name, Description, Requirements, Constitution, ByLaws, OrganizationLink, Fees) VALUES(?,?,?,?,?,?,?)"; 
        $filter = (int)$_POST["hsFees"];
        $params = array("ssssssi", $_POST["hsName"], $_POST["hsDescription"], $_POST["hsRequirements"], $_POST["hsConstitution"], $_POST["hsByLaws"], $_POST["hsOrganizationLink"], $filter);
        $result = prevent_injection_affected($connection, $query, $params);
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tblselect"], "Members") == 0) {
        // Insert into the members table
        $query = "INSERT INTO Members(MembershipID, Email, Name) VALUES(?,?,?)";
        $params = array("sss", $_POST["memMembershipID"], $_POST["memEmail"], $_POST["memName"]);
        $result = prevent_injection_affected($connection, $query, $params);
        // Populate the memberof table for consistency
        $query1 = "INSERT INTO MemberOf(hsName, email) VALUES(?,?)";
        $params1 = array("ss", $_POST["hsselect"], $_POST["memEmail"]);
        $result1 = prevent_injection_affected($connection, $query1, $params1);
        // If result is true, the query was successful
        if (($result > 0) && ($result1 > 0)) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tblselect"], "Officers") == 0) {
        $query = "INSERT INTO Officers(email, Title, Year) VALUES(?,?,?)";
        $filter = (int)$_POST["offYear"];
        $params = array("ssi", $_POST["offemail"], $_POST["offTitle"], $filter);
        $result = prevent_injection_affected($connection, $query, $params);
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tblselect"], "OrganizationActivities") == 0) {
        $query = "INSERT INTO OrganizationActivities(DateOfActivity, Description, Speaker, ActivityName, hsName) VALUES(?,?,?,?,?)";
        $filter = $_POST["date"] . " " . $_POST["time"];
        $params = array("sssss", $filter, $_POST["oaDescription"], $_POST["oaSpeaker"], $_POST["oaActivityName"], $_POST["hsselect"]);
        $result = prevent_injection_affected($connection, $query, $params);
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tblselect"], "Scholarship") == 0) {
        $query = "INSERT INTO Scholarship(Recipient, Year, Type, Amount, hsName, email) VALUES(?,?,?,?,?,?)";
        // html checks so I don't have to on the backend
        $filter1 = (int)$_POST["schYear"];
        $filter2 = (float)$_POST["schAmount"];
        $params = array("sisdss", $_POST["schRecipient"], $filter1, $_POST["schType"], $filter2, $_POST["hsselect"], $_POST["schemail"]);
        $result = prevent_injection_affected($connection, $query, $params);
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else {
        die('This should be impossible');
    }

    close_conn($connection);
?>
