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

    if (strcmp($_POST["hsfilterdropdown"], "null") == 0) {
        echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
        echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
    } else if (strcmp($_POST["tabledd"], "null") == 0) {
        echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
        echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
    } else if (strcmp($_POST["tabledd"], "Members") == 0) {
        // Create the query based on which attribute they want to change 
        if (strcmp($_POST["attributeMdd"], "null") == 0) {
            echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else if (strcmp($_POST["attributeMdd"], "MembershipID") == 0) {
            // Set the membership id to that of the text field input 
            // to the tuple of the given email key
            $query = "UPDATE Members SET MembershipID = ? WHERE Email = ?";
            $params = array("ss", $_POST["attribute"], $_POST["emailM"]);              
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeMdd"], "MemName") == 0) {
            $query = "UPDATE Members SET Name = ? WHERE Email = ?";
            $params = array("ss", $_POST["attribute"], $_POST["emailM"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeMdd"], "MemEmail") == 0) {
            $query = "UPDATE Members SET Email = ? WHERE Email = ?";
            $params = array("ss", $_POST["attribute"], $_POST["emailM"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else {
            die('This shouldn\'t happen');
        }
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tabledd"], "Officers") == 0) {
        if (strcmp($_POST["attributeOdd"], "null") == 0) {
            echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else if (strcmp($_POST["attributeOdd"], "ofEmail") == 0) {
            $query = "UPDATE Members SET Email = ? WHERE Email = ?";
            $params = array("ss", $_POST["attribute"], $_POST["emailO"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeOdd"], "ofTitle") == 0) {
            $query = "UPDATE Officers SET Title = ? WHERE Email = ?";
            $params = array("ss", $_POST["attribute"], $_POST["emailO"]);
            $result = prevent_injection_affected($connection, $query, $params); 
        } else if (strcmp($_POST["attributeOdd"], "ofYear") == 0) {
            $query = "UPDATE Officers SET Year = ? WHERE Email = ?";
            $filter = (int)$_POST["attribute"];
            $params = array("is", $filter, $_POST["emailO"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else {
            die('This shouldn\'t happen');
        }
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tabledd"], "FacultyAdvisors") == 0) {
        if (strcmp($_POST["attributeFdd"], "null") == 0) {
            echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else if (strcmp($_POST["attributeFdd"], "faEmail") == 0) {
            $query = "UPDATE Members SET Email = ? WHERE Email = ?";
            $params = array("ss", $_POST["attribute"], $_POST["emailF"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeFdd"], "faYear") == 0) {
            $query = "UPDATE FacultyAdvisors SET Year = ? WHERE email = ?";
            $filter = (int)$_POST["attribute"];
            $params = array("is", $filter, $_POST["emailF"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else {
            die('This shouldn\'t happen');
        }
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tabledd"], "Scholarship") == 0) {
        if (strcmp($_POST["attributeSdd"], "null") == 0) {
            echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else if (strcmp($_POST["attributeSdd"], "Recipient") == 0) {
            $query = "UPDATE Scholarship SET Recipient = ? WHERE Recipient = ?";
            $params = array("ss", $_POST["attribute"], $_POST["schRecipient"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeSdd"], "Year") == 0) {
            $query = "UPDATE Scholarship SET Year = ? WHERE Recipient = ?";
            $filter = (int)$_POST["attribute"];
            $params = array("is", $filter, $_POST["schRecipient"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeSdd"], "Type") == 0) {
            $query = "UPDATE Scholarship SET Type = ? WHERE Recipient = ?";
            $params = array("ss", $_POST["attribute"], $_POST["schRecipient"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeSdd"], "DollarAmount") == 0) {
            $query = "UPDATE Scholarship SET Amount = ? WHERE Recipient = ?";
            $filter = (float)$_POST["attribute"];
            $params = array("ds", $filter, $_POST["schRecipient"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else {
            die('This shouldn\'t happen');
        }
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tabledd"], "OrganizationActivities") == 0) {
        if (strcmp($_POST["attributeORdd"], "null") == 0) {
            echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else if (strcmp($_POST["attributeORdd"], "ActName") == 0) {
            $query = "UPDATE OrganizationActivities SET ActivityName = ? WHERE DateOfActivity = ?";
            $filter = $_POST["date"] . " " . $_POST["time"];
            $params = array("ss", $_POST["attribute"], $filter);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeORdd"], "ActDesc") == 0) {
            $query = "UPDATE OrganizationActivities SET Description = ? WHERE DateOfActivity = ?";
            $filter = $_POST["date"] . " ". $_POST["time"];
            $params = array("ss", $_POST["attribute"], $filter);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeORdd"], "Speaker") == 0) {
            $query = "UPDATE OrganizationActivities SET Speaker = ? WHERE DateOfActivity = ?";
            $filter = $_POST["date"] . " " . $_POST["time"];
            $params = array("ss", $_POST["attribute"], $filter);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeORdd"], "DoA") == 0) {
            $query = "UPDATE OrganizationActivities SET DateOfActivity = ? WHERE DateOfActivity = ?";
            $filter1 = $_POST["date"] . " ". $_POST["time"];
            $filter2 = $_POST["newDate"] . " " . $_POST["newTime"];
            $params = array("ss", $filter2, $filter1);
            $result = prevent_injection_affected($connection, $query, $params);
        } else {
            die('This shouldn\'t happen');
        }
        if ($result > 0) {
            echo "<script type='text/javascript'>alert('Query Successful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else {
            echo "<script type='text/javascript'>alert('Query Unsuccessful');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        }
    } else if (strcmp($_POST["tabledd"], "HonorSociety") == 0) {
        if (strcmp($_POST["attributeHdd"], "null") == 0) {
            echo "<script type='text/javascript'>alert('You must select from every drop down and fill in every text box');</script>";
            echo "<script type='text/javascript'>window.location.replace('https://lamp.salisbury.edu/~rrosiak1/HonorSocietiesDB/admin.php')</script>";	
        } else if (strcmp($_POST["attributeHdd"], "Sname") == 0) {
            $query = "UPDATE HonorSociety SET Name = ? WHERE Name = ?";
            $params = array("ss", $_POST["attribute"], $_POST["hsfilterdropdown"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeHdd"], "SDesc") == 0) {
            $query = "UPDATE HonorSociety SET Description = ? WHERE Name = ?";
            $params = array("ss", $_POST["attribute"], $_POST["hsfilterdropdown"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeHdd"], "Requirements") == 0) {
            $query = "UPDATE HonorSociety SET Requirements = ? WHERE Name = ?";
            $params = array("ss", $_POST["attribute"], $_POST["hsfilterdropdown"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeHdd"], "Constitution") == 0) {
            $query = "UPDATE HonorSociety SET Constitution = ? WHERE Name = ?";
            $params = array("ss", $_POST["attribute"], $_POST["hsfilterdropdown"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeHdd"], "Bylaws") == 0) {
            $query = "UPDATE HonorSociety SET ByLaws = ? WHERE Name = ?";
            $params = array("ss", $_POST["attribute"], $_POST["hsfilterdropdown"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeHdd"], "OrgLink") == 0) {
            $query = "UPDATE HonorSociety SET OrganizationLink = ? WHERE Name = ?";
            $params = array("ss", $_POST["attribute"], $_POST["hsfilterdropdown"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else if (strcmp($_POST["attributeHdd"], "Fees") == 0) {
            $query = "UPDATE HonorSociety SET Fees = ? WHERE Name = ?";
            $filter = (float)$_POST["attribute"];
            $params = array("ds", $filter, $_POST["hsfilterdropdown"]);
            $result = prevent_injection_affected($connection, $query, $params);
        } else {
            die('This shouldn\'t happen');
        }
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
