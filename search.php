<!DOCTYPE html>
<?php 
	session_start(); 
?>

<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="Styles/USfooter.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Styles/search.css">	
    <link rel="stylesheet" type="text/css" href="Styles/header.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
  <?php       
	if(isset($_SESSION['username'])){
		include "Navbar/adminNav.php";
	}
	else{
		include "Navbar/userNav.php";
	}
  ?>
  <?php include "Processing/functions.php"; ?>

  <script type="text/javascript">
        // This script will hide the radio buttons Title and Year until a specified 
        // filter table is selected
        $(document).ready(function() {
            $('#checkbox1').prop('checked', false);
            $('label[for=rbutton3], #rbutton3').hide();
            $('label[for=rbutton4], #rbutton4').hide();
            $('label[for=checkbox1], #checkbox1').hide();
            $('input:radio[name=searchby]')[0].checked = true;
            $('#tabledropdown').change(function() {
                if ($('#tabledropdown').val() == "Officers") {
                    $('#checkbox1').prop('checked', false);
                    $('label[for=rbutton1], #rbutton1').show();
                    $('label[for=rbutton2], #rbutton2').show();
                    $('label[for=rbutton3], #rbutton3').show();
                    $('label[for=rbutton4], #rbutton4').show();
                    $('label[for=checkbox1], #checkbox1').hide();
                    $('input:radio[name=searchby]')[0].checked = true;
                } else if ($('#tabledropdown').val() == "FacultyAdvisors") {
                    $('#checkbox1').prop('checked', false);
                    $('label[for=rbutton1], #rbutton1').show();
                    $('label[for=rbutton2], #rbutton2').show();
                    $('label[for=rbutton3], #rbutton3').hide();
                    $('label[for=rbutton4], #rbutton4').show();
                    $('label[for=checkbox1], #checkbox1').hide();
                    $('input:radio[name=searchby]')[0].checked = true;
                } else if ($('#tabledropdown').val() == "Scholarship") {
                    $('#checkbox1').prop('checked', false);
                    $('label[for=rbutton1], #rbutton1').show();
                    $('label[for=rbutton2], #rbutton2').show();
                    $('label[for=rbutton3], #rbutton3').show();
                    $('label[for=rbutton4], #rbutton4').show();
                    $('label[for=checkbox1], #checkbox1').hide();
                    $('input:radio[name=searchby]')[0].checked = true;
                } else if ($('#tabledropdown').val() == "OrganizationActivities") {
                    $('label[for=rbutton1], #rbutton1').show();
                    $('label[for=rbutton2], #rbutton2').hide();
                    $('label[for=rbutton3], #rbutton3').hide();
                    $('label[for=rbutton4], #rbutton4').show();
                    $('label[for=checkbox1], #checkbox1').show();
                    $('input:radio[name=searchby]')[0].checked = true;
                } else {
                    $('label[for=rbutton1], #rbutton1').show();
                    $('#checkbox1').prop('checked', false);
                    $('label[for=rbutton2], #rbutton2').show();
                    $('label[for=rbutton3], #rbutton3').hide();
                    $('label[for=rbutton4], #rbutton4').hide();
                    $('label[for=checkbox1], #checkbox1').hide();
                    $('input:radio[name=searchby]')[0].checked = true;
                }
            }); 
            $('#checkbox1').change(function() {
                if (this.checked) {
                    $('label[for=rbutton1], #rbutton1').hide();
                    $('label[for=rbutton2], #rbutton2').hide();
                    $('label[for=rbutton3], #rbutton3').hide();
                    $('label[for=rbutton4], #rbutton4').show();
                    $('input:radio[name=searchby]')[3].checked = true;
                } else {
                    $('label[for=rbutton1], #rbutton1').show();
                    $('label[for=rbutton2], #rbutton2').hide();
                    $('label[for=rbutton3], #rbutton3').hide();
                    $('label[for=rbutton4], #rbutton4').show();
                    $('input:radio[name=searchby]')[0].checked = true;
                }
            });
        });
  </script>
  <!-- link with database here -->
  <form class="form-inline" action="search.php" method="POST">
    <br>
    <div class="container">
      <label for="searchbox">Search:</label>
      <input type="text" id="searchbox" name="searchbox" class="form-control input-sm" placeholder="Search">
      <input type="radio" id="rbutton1" name="searchby" value="name" checked>
      <label for="rbutton1">Name</label>
      <input type="radio" id="rbutton2" name="searchby" value="email">
      <label for="rbutton2">Email</label>
      <input type="radio" id="rbutton3" name="searchby" value="title">
      <label for="rbutton3">Title</label>
      <input type="radio" id="rbutton4" name="searchby" value="year">
      <label for="rbutton4">Year</label>
      <input type="checkbox" id="checkbox1" name="check" value="Photos">
      <label for="checkbox1">Photos</label>
      <div>
	<br>
          <label for="hsdropdown">Filter Honor Society:</label>
          <select class="form-control input-sm" name="hsfilterdropdown" id="hsdropdown" required>
          <option value="null" selected>Select One</option>
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
            <label for="tabledropdown">Filter Table:</label>
            <select class="form-control input-sm" name="filtertables" id="tabledropdown" required>
              <option value="null">Select One</option>
              <option value="Members">Members</option>
              <option value="Officers">Officers</option>
              <option value="FacultyAdvisors">Faculty Advisors</option>
              <option value="Scholarship">Scholarships</option>
              <option value="OrganizationActivities">Activities</option>
              </select>
              <button type="submit" id="submitsearch" name="submitsearch" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-search"></span> Search</button>
          </div>
    </div>
    <br>
  </form>
<div class="testing">
<section id="table">
  <h2>Database Table</h2>

<?php

    $connection = get_conn();

    if (!empty($_POST)) {
        // This is the case where the user opts for a gallery table
        if (isset($_POST["check"])) {
            if (($_POST["searchbox"] !== '') && (strcmp($_POST["hsfilterdropdown"], "null") == 0)) { 
                // This is the case where the user searches for a year for photos but doesnt specify a society
                $query = "SELECT Link FROM Photos WHERE year(doa) = ?";
                $params = array("i", $_POST["searchbox"]);
                $result = prevent_injection($connection, $query, $params);
                print_photo_table($result);
            } else if (($_POST["searchbox"] !== '') && (strcmp($_POST["hsfilterdropdown"], "null") != 0)) {
                // This is the case where the user searches for a year for photos and does specify a society
                $query = "SELECT Link FROM Photos WHERE year(doa) = ? AND hsName = ?";
                $params = array("is", $_POST["searchbox"], $_POST["hsfilterdropdown"]);
                $result = prevent_injection($connection, $query, $params);
                print_photo_table($result);
            } else if (($_POST["searchbox"] == '') && (strcmp($_POST["hsfilterdropdown"], "null") != 0)) {
                // This is the case where the user picks an honor society but does not specify a year
                $query = "SELECT Link FROM Photos WHERE hsName = ?";
                $params = array("s", $_POST["hsfilterdropdown"]);
                $result = prevent_injection($connection, $query, $params);
                print_photo_table($result);
            } else {
                // This is the default case where nothing is specified. All photos are displayed from the table
                $query = "SELECT Link FROM Photos";
                $result = mysqli_query($connection, $query);
                print_photo_table($result);
            }
        } else if ($_POST["searchbox"] !== '') {
        // This is the case for when the user opts to enter text into the search box
            if ((strcmp($_POST["hsfilterdropdown"], "null") == 0) && (strcmp($_POST["filtertables"], "null") != 0)) {
                // This is the case for when the search box is filled and only a table is selected as a filter
                if (strcmp($_POST["filtertables"], "Members") == 0) {
                    if (strcmp($_POST["searchby"], "name") == 0) {
                        $query = "SELECT * FROM Members WHERE Name LIKE ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result);
                        } else {
                            print_search_table($result, "MembershipID");
                        }
                        //$query = "SELECT * FROM Members WHERE Name LIKE \"%" . $_POST["searchbox"] . "%\"";            
                    } else if (strcmp($_POST["searchby"], "email") == 0) {
                        $query = "SELECT * FROM Members WHERE Email LIKE ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result);
                        } else {
                            print_search_table($result, "MembershipID");
                        }
                        //$query = "SELECT * FROM Members WHERE Email LIKE \"%" . $_POST["searchbox"] . "%\""; 
                    } else {
                        die('This shouldn\'t happen');
                    }
                } else if (strcmp($_POST["filtertables"], "Officers") == 0) {
                    if (strcmp($_POST["searchby"], "name") == 0) {
                        $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email
                           WHERE Name LIKE ?"; 
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                        //$query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email
                           //WHERE Name LIKE \"%" . $_POST["searchbox"] . "%\""; 
                    } else if (strcmp($_POST["searchby"], "email") == 0) {
                        $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email 
                            WHERE Officers.email LIKE ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                        //$query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email 
                            //WHERE Officers.email LIKE \"%" . $_POST["searchbox"] . "%\"";
                    } else if (strcmp($_POST["searchby"], "title") == 0) {
                        $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email 
                            WHERE Title LIKE ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                        //$query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email 
                            //WHERE Title LIKE \"%" . $_POST["searchbox"] . "%\"";
                    } else if (strcmp($_POST["searchby"], "year") == 0) {
                        $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email
                            WHERE Year = ?";
                        if (is_numeric($_POST["searchbox"])) {
                            $filter = (int)$_POST["searchbox"];
                        } else {
                            $filter = 0;
                        }
                        $params = array("i", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                        /*
                        if (is_numeric($_POST["searchbox"])) {
                            $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email
                                WHERE Year = " . $_POST["searchbox"];
                        } else {
                            $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email
                                WHERE Year = 0";
                        }
                         */
                    } else {
                        die('This shouldn\'t happen');
                    }
                } else if (strcmp($_POST["filtertables"], "FacultyAdvisors") == 0) {
                    if (strcmp($_POST["searchby"], "name") == 0) {
                        $query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                           WHERE Name LIKE ?"; 
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                        //$query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                           //WHERE Name LIKE \"%" . $_POST["searchbox"] . "%\""; 
                    } else if (strcmp($_POST["searchby"], "email") == 0) {
                        $query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                           WHERE FacultyAdvisors.email LIKE ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                        //$query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                           //WHERE FacultyAdvisors.email LIKE \"%" . $_POST["searchbox"] . "%\""; 
                    } else if (strcmp($_POST["searchby"], "year") == 0) {
                        $query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                           WHERE Year = ?";
                        if (is_numeric($_POST["searchbox"])) {
                            $filter = (int)$_POST["searchbox"];
                        } else {
                            $filter = 0;
                        }
                        $params = array("i", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                        /*
                        if (is_numeric($_POST["searchbox"])) {
                            $query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                               WHERE Year = " . $_POST["searchbox"]; 
                        } else {
                            $query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                               WHERE Year = 0"; 
                        }
                         */
                    } else {
                        die('This shouldn\'t happen');
                    }
                } else if (strcmp($_POST["filtertables"], "Scholarship") == 0) {
                    if (strcmp($_POST["searchby"], "name") == 0) {
                        $query = "SELECT * FROM Scholarship WHERE Recipient LIKE ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                    } else if (strcmp($_POST["searchby"], "email") == 0) {
                        $query = "SELECT * FROM Scholarship WHERE email LIKE ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                    } else if (strcmp($_POST["searchby"], "title") == 0) {
                        $query = "SELECT * FROM Scholarship WHERE Type LIKE ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                    } else if (strcmp($_POST["searchby"], "year") == 0) {
                        $query = "SELECT * FROM Scholarship WHERE Year = ?";
                        if (is_numeric($_POST["searchbox"])) {
                            $filter = (int)$_POST["searchbox"];
                        } else {
                            $filter = 0;
                        }
                        $params = array("i", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                        /*
                        if (is_numeric($_POST["searchbox"])) {
                            $query = "SELECT * FROM Scholarship WHERE Year = " . $_POST["searchbox"];
                        } else {
                            $query = "SELECT * FROM Scholarship WHERE Year = 0";
                        }
                         */
                    } else {
                        die('This shouldn\'t happen');
                    }
                } else if (strcmp($_POST["filtertables"], "OrganizationActivities") == 0) {
                    if (strcmp($_POST["searchby"], "name") == 0) {
                        $query = "SELECT * FROM OrganizationActivities WHERE ActivityName LIKE ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("s", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                    } else if (strcmp($_POST["searchby"], "year") == 0) {
                        $query = "SELECT * FROM OrganizationActivities WHERE year(DateOfActivity) = ?";
                        if (is_numeric($_POST["searchbox"])) {
                            $filter = (int)$_POST["searchbox"];
                        } else {
                            $filter = 0;
                        }
                        $params = array("i", $filter);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                        /*
                        if (is_numeric($_POST["searchbox"])) {
                            $query = "SELECT * FROM OrganizationActivities WHERE year(DateOfActivity) = " . $_POST["searchbox"];
                        } else {
                            $query = "SELECT * FROM OrganizationActivities WHERE year(DateOfActivity) = 0";
                        }
                         */
                    } else {
                        die('This shouldn\'t happen');
                    }
                } else {
                    die('This shouldn\'t happen');
                }
            } else if ((strcmp($_POST["hsfilterdropdown"], "null") != 0) && (strcmp($_POST["filtertables"], "null") != 0)) {
                // This is the case for when the search box if filled and both drop down filters are selected
                if (strcmp($_POST["filtertables"], "Members") == 0) {
                    if (strcmp($_POST["searchby"], "name") == 0) {
                        $query = "SELECT * FROM Members JOIN MemberOf ON Members.Email = MemberOf.email
                            WHERE Name LIKE ? AND hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                    } else if (strcmp($_POST["searchby"], "email") == 0) {
                        $query = "SELECT * FROM Members JOIN MemberOf ON Members.Email = MemberOf.email
                            WHERE Members.Email LIKE ? AND hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                    } else {
                        die('This shouldn\'t happen');
                    }
                } else if (strcmp($_POST["filtertables"], "Officers") == 0) {
                    if (strcmp($_POST["searchby"], "name") == 0) {
                        $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email
                            JOIN MemberOf ON Officers.email = MemberOf.email 
                            WHERE Members.Name LIKE ? AND MemberOf.hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                    } else if (strcmp($_POST["searchby"], "email") == 0) {
                        $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email 
                            JOIN MemberOf ON Officers.email = MemberOf.email
                            WHERE Officers.email LIKE ? AND MemberOf.hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                    } else if (strcmp($_POST["searchby"], "title") == 0) {
                        $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email
                            JOIN MemberOf ON Officers.email = MemberOf.email
                            WHERE Officers.Title LIKE ? AND MemberOf.hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                    } else if (strcmp($_POST["searchby"], "year") == 0) {
                        $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email
                            JOIN MemberOf ON Officers.email = MemberOf.email
                            WHERE Officers.Year = ? AND MemberOf.hsName = ?";
                        if (is_numeric($_POST["searchbox"])) {
                            $filter = (int)$_POST["searchbox"];
                        } else {
                            $filter = 0;
                        }
                        $params = array("is", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                        /*
                        if (is_numeric($_POST["searchbox"])) {
                            $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email
                                JOIN MemberOf ON Officers.email = MemberOf.email
                                WHERE Officers.Year = " . $_POST["searchbox"] . " AND MemberOf.hsName = \"" . $_POST["hsfilterdropdown"] . "\"";
                        } else {
                            $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email
                                JOIN MemberOf ON Officers.email = MemberOf.email
                                WHERE Officers.Year = 0 AND MemberOf.hsName = \"" . $_POST["hsfilterdropdown"] . "\"";
                        }
                         */
                    } else {
                        die('This shouldn\'t happen');
                    }
                } else if (strcmp($_POST["filtertables"], "FacultyAdvisors") == 0) {
                    if (strcmp($_POST["searchby"], "name") == 0) {
                        $query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                           WHERE Name LIKE ? AND hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                    } else if (strcmp($_POST["searchby"], "email") == 0) {
                        $query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                           WHERE FacultyAdvisors.email LIKE ? AND hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                    } else if (strcmp($_POST["searchby"], "year") == 0) {
                        $query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                           WHERE Year = ? AND hsName = ?";
                        if (is_numeric($_POST["searchbox"])) {
                            $filter = (int)$_POST["searchbox"];
                        } else {
                            $filter = 0;
                        }
                        $params = array("is", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        if (isset($_SESSION["username"])) {
                            print_search_table($result, "email");
                        } else {
                            print_search_table($result, "email", "MembershipID");
                        }
                        /*
                        if (is_numeric($_POST["searchbox"])) {
                            $query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                               WHERE Year = " . $_POST["searchbox"] . " AND hsName = \"" . $_POST["hsfilterdropdown"] . "\"";
                        } else {
                            $query = "SELECT * FROM FacultyAdvisors JOIN Members ON FacultyAdvisors.email = Members.Email
                               WHERE Year = 0 AND hsName = \"" . $_POST["hsfilterdropdown"] . "\"";
                        }
                         */
                    } else {
                        die('This shouldn\'t happen');
                    }
                } else if (strcmp($_POST["filtertables"], "Scholarship") == 0) {
                    if (strcmp($_POST["searchby"], "name") == 0) {
                        $query = "SELECT * FROM Scholarship WHERE Recipient LIKE ? AND hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                    } else if (strcmp($_POST["searchby"], "email") == 0) {
                        $query = "SELECT * FROM Scholarship WHERE email LIKE ? AND hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                    } else if (strcmp($_POST["searchby"], "title") == 0) {
                        $query = "SELECT * FROM Scholarship WHERE Type LIKE ? AND hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                    } else if (strcmp($_POST["searchby"], "year") == 0) {
                        $query = "SELECT * FROM Scholarship WHERE Year = ? AND hsName = ?";
                        if (is_numeric($_POST["searchbox"])) {
                            $filter = (int)$_POST["searchbox"];
                        } else {
                            $filter = 0;
                        }
                        $params = array("is", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                        /*
                        if (is_numeric($_POST["searchbox"])) {
                            $query = "SELECT * FROM Scholarship WHERE Year = " . $_POST["searchbox"] . " AND hsName = \""
                                . $_POST["hsfilterdropdown"] . "\"";
                        } else {
                            $query = "SELECT * FROM Scholarship WHERE Year = 0 AND hsName = \""
                                . $_POST["hsfilterdropdown"] . "\"";
                        }
                         */
                    } else {
                        die('This shouldn\'t happen');
                    }
                } else if (strcmp($_POST["filtertables"], "OrganizationActivities") == 0) {
                    if (strcmp($_POST["searchby"], "name") == 0) {
                        $query = "SELECT * FROM OrganizationActivities WHERE ActivityName LIKE ? AND hsName = ?";
                        $filter = "%" . $_POST["searchbox"] . "%";
                        $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                    } else if (strcmp($_POST["searchby"], "year") == 0) {
                        $query = "SELECT * FROM OrganizationActivities WHERE year(DateOfActivity) = ? AND hsName = ?";
                        if (is_numeric($_POST["searchbox"])) {
                            $filter = (int)$_POST["searchbox"];
                        } else {
                            $filter = 0;
                        }
                        $params = array("is", $filter, $_POST["hsfilterdropdown"]);
                        $result = prevent_injection($connection, $query, $params);
                        print_search_table($result);
                        /*
                        if (is_numeric($_POST["searchbox"])) {
                            $query = "SELECT * FROM OrganizationActivities WHERE year(DateOfActivity) = " . $_POST["searchbox"]
                                . " AND hsName = \"" . $_POST["hsfilterdropdown"] . "\"";
                        } else {
                            $query = "SELECT * FROM OrganizationActivities WHERE year(DateOfActivity) = 0 AND hsName = \"" . $_POST["hsfilterdropdown"] . "\"";
                        }
                         */
                    } else {
                        die('This shouldn\'t happen');
                    }
                } else {
                    die('This shouldn\'t happen');
                }
            } else if ((strcmp($_POST["hsfilterdropdown"], "null") != 0) && (strcmp($_POST["filtertables"], "null") == 0)) {
                // This is the case for when the search box is filled and only the honor society drop down is selected
                if (strcmp($_POST["searchby"], "name") == 0) {
                    $query = "SELECT * FROM Members JOIN MemberOf ON Members.Email = MemberOf.email 
                        WHERE Members.Name LIKE ? AND MemberOf.hsName = ?";
                    $filter = "%" . $_POST["searchbox"] . "%";
                    $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                    $result = prevent_injection($connection, $query, $params);
                    if (isset($_SESSION["username"])) {
                        print_search_table($result, "email");
                    } else {
                        print_search_table($result, "email", "MembershipID");
                    }
                } else if (strcmp($_POST["searchby"], "email") == 0) {
                    $query = "SELECT * FROM Members JOIN MemberOf ON Members.Email = MemberOf.email 
                        WHERE Members.Email LIKE ? AND MemberOf.hsName = ?";
                    $filter = "%" . $_POST["searchbox"] . "%";
                    $params = array("ss", $filter, $_POST["hsfilterdropdown"]);
                    $result = prevent_injection($connection, $query, $params);
                    if (isset($_SESSION["username"])) {
                        print_search_table($result, "email");
                    } else {
                        print_search_table($result, "email", "MembershipID");
                    }
                } else { // ***Title and Year will be hidden for case where no specific table is selected
                    die('This shouldn\'t happen');
                }
            } else {
                // These are the default cases... will hide the two extra radio buttons for when a specific 
                // drop down item is selected
                if (strcmp($_POST["searchby"], "name") == 0) {
                    $query = "SELECT * FROM Members WHERE Name LIKE ?";
                    $filter = "%" . $_POST["searchbox"] . "%";
                    $params = array("s", $filter);
                    $result = prevent_injection($connection, $query, $params);
                    if (isset($_SESSION["username"])) {
                        print_search_table($result);
                    } else {
                        print_search_table($result, "MembershipID");
                    }
                } else if (strcmp($_POST["searchby"], "email") == 0) {
                    $query = "SELECT * FROM Members WHERE Email LIKE ?";
                    $filter = "%" . $_POST["searchbox"] . "%";
                    $params = array("s", $filter);
                    $result = prevent_injection($connection, $query, $params);
                    if (isset($_SESSION["username"])) {
                        print_search_table($result);
                    } else {
                        print_search_table($result, "MembershipID");
                    }
                } else {
                    die('This shouldn\'t happen');
                } // ***Title and Year will be hidden for case where no specific table is selected
            } 
        } else { // These are the cases for when the user does not submit any text, just filters
            // This is the case that no honor society is filtered but a table filter is selected
            if ((strcmp($_POST["hsfilterdropdown"], "null") == 0) && (strcmp($_POST["filtertables"], "null") != 0)) {
                if (strcmp($_POST["filtertables"], "Officers") == 0) {
                    $query = "SELECT * FROM " . $_POST["filtertables"] . " JOIN Members ON 
                       Officers.email = Members.Email ORDER BY Year DESC";
                    $result = mysqli_query($connection, $query);

                    if (isset($_SESSION["username"])) {
                        print_search_table($result, "email");
                    } else {
                        print_search_table($result, "email", "MembershipID");
                    }
                } else if (strcmp($_POST["filtertables"], "FacultyAdvisors") == 0) {
                    $query = "SELECT * FROM " . $_POST["filtertables"] . " JOIN Members ON Members.Email = FacultyAdvisors.email";
                    $result = mysqli_query($connection, $query);

                    if (isset($_SESSION["username"])) {
                        print_search_table($result, "email");
                    } else {
                        print_search_table($result, "email", "MembershipID");
                    }
                } else {
                    $query = "SELECT * FROM " . $_POST["filtertables"];
                    // Make sure the query was successful
                    $result = mysqli_query($connection, $query);

                    if (isset($_SESSION["username"])) {
                        print_search_table($result);
                    } else {
                        print_search_table($result, "MembershipID");
                    }
                }
            } else if ((strcmp($_POST["hsfilterdropdown"], "null") != 0) && (strcmp($_POST["filtertables"], "null") != 0)) {
                // This is the case where both the honor society filter and the table filter are set
                if (strcmp($_POST["filtertables"], "Members") == 0) {
                    $query = "SELECT * FROM Members JOIN MemberOf ON Members.Email = MemberOf.email 
                        WHERE hsName = \"" . $_POST["hsfilterdropdown"] . "\"";

                    $result = mysqli_query($connection, $query);

                    if (isset($_SESSION["username"])) {
                        print_search_table($result, "email");
                    } else {
                        print_search_table($result, "email", "MembershipID");
                    }
                } else if (strcmp($_POST["filtertables"], "Officers") == 0) {
                    $query = "SELECT * FROM Officers JOIN Members ON Officers.email = Members.Email 
                        JOIN MemberOf ON Officers.email = MemberOf.email 
                        WHERE MemberOf.hsName = \"" . $_POST["hsfilterdropdown"] . "\"";

                    $result = mysqli_query($connection, $query);

                    if (isset($_SESSION["username"])) {
                        print_search_table($result, "email");
                    } else {
                        print_search_table($result, "email", "MembershipID");
                    }
                } else if (strcmp($_POST["filtertables"], "FacultyAdvisors") == 0) {
                    $query = "SELECT * FROM FacultyAdvisors JOIN Members ON Members.Email = FacultyAdvisors.email WHERE hsName = \""
                        . $_POST["hsfilterdropdown"] . "\"";
                    
                    $result = mysqli_query($connection, $query);

                    if (isset($_SESSION["username"])) {
                        print_search_table($result);
                    } else {
                        print_search_table($result, "email", "MembershipID");
                    }
                } else if (strcmp($_POST["filtertables"], "Scholarship") == 0) {
                    $query = "SELECT * FROM Scholarship WHERE hsName = \""
                        . $_POST["hsfilterdropdown"] . "\"";

                    $result = mysqli_query($connection, $query);

                    print_search_table($result);
                } else if (strcmp($_POST["filtertables"], "OrganizationActivities") == 0) {
                    $query = "SELECT * FROM OrganizationActivities WHERE hsName = \""
                        . $_POST["hsfilterdropdown"] . "\"";

                    $result = mysqli_query($connection, $query);

                    print_search_table($result);
                } else {
                    die('This shouldn\'t happen');
                }
            } else if ((strcmp($_POST["hsfilterdropdown"], "null") != 0) && (strcmp($_POST["filtertables"], "null") == 0)) {
                // This is the case where an honor society is selected but not table is filtered
                $query = "SELECT * FROM HonorSociety WHERE Name = \"" . $_POST["hsfilterdropdown"] . "\"";

                $result = mysqli_query($connection, $query);

                print_search_table($result);
            } else { // This is the case where nothing is filterd at all, default view
                // Default just display information about the honor societies
                $query = "SELECT * FROM HonorSociety ";

                $result = mysqli_query($connection, $query);

                print_search_table($result);
            }
        }
    } else {
        // Default just display information about the honor societies
        $query = "SELECT * FROM HonorSociety";

        $result = mysqli_query($connection, $query);

        print_search_table($result);
    }

    // Make sure to close the connection
    close_conn($connection);
?>
</section>
</div>
 <?php
                
                
                        include "Footer/usfooter.php";
                
        ?>

</body>

</html>
