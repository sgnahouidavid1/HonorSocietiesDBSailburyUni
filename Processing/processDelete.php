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

    // Start processing the possibilities
    if (strcmp($_POST["hsfilterdropdown1"], "null") == 0) {
        echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
        echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
    } else if (strcmp($_POST["tabledd1"], "null") == 0) {
        echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
        echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
    } else if (strcmp($_POST["tabledd1"], "Members") == 0) {
        $query = "DELETE FROM Members WHERE Email = ?";
        $params = array("s", $_POST["emailM1"]);
        $result = prevent_injection_affected($connection, $query, $params);
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tabledd1"], "Officers") == 0) {
        $query = "DELETE FROM Members WHERE Email = ?";
        $params = array("s", $_POST["emailO1"]);
        $result = prevent_injection_affected($connection, $query, $params);
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tabledd1"], "FacultyAdvisors") == 0) {
        $query = "DELETE FROM Members WHERE Email = ?";
        $params = array("s", $_POST["emailF1"]);
        $result = prevent_injection_affected($connection, $query, $params);
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tabledd1"], "Scholarship") == 0) {
        $query = "DELETE FROM Scholarship WHERE Recipient = ?";
        $params = array("s", $_POST["schRecipient1"]);
        $result = prevent_injection_affected($connection, $query, $params);
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tabledd1"], "HonorSociety") == 0) {
        $query = "DELETE FROM HonorSociety WHERE Name = ?";
        $params = array("s", $_POST["hsfilterdropdown1"]);
        $result = prevent_injection_affected($connection, $query, $params);
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tabledd1"], "OrganizationActivities") == 0) {
        $query = "DELETE FROM OrganizationActivities WHERE DateOfActivity = ?";
        $filter = $_POST["date1"] . " " . $_POST["time1"];
        $params = array("s", $filter);
        $result = prevent_injection_affected($connection, $query, $params);
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else {
        die('This shouldn\'t happen');
    }

    close_conn($connection);
?>
