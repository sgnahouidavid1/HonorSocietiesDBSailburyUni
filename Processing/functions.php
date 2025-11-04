<?php

function get_conn() {
    if ($connection = mysqli_connect('localhost', 'rrosiak1', 'rrosiak1', 'HonorSocieties')) {
        // Connection successful
    } else {
        die('Connection failed');
    }
    return $connection;
}

function close_conn($conn) {
    mysqli_close($conn);
}

function print_search_table($query_result,String ...$excludes) {
    // This means that the result is empty, therefore nothing needs to be done
    // Just display no table results
    if (mysqli_num_rows($query_result) == 0) {
        echo "<br><h3 style=\"text-align:center\">No results found...</h3>";        
        return;
    }
    // Get the header fields
    $header_fields = mysqli_fetch_fields($query_result);

    // Get the array of header names array
    $names = array();
    // Have an array that holds the true value index
    $true_value = array();

    // Get the excluded header array
    $exclusions = array();
    if (!empty($excludes)) {
        foreach ($excludes as $ex) {
            array_push($exclusions, $ex);
        }
    }
    // Exclude bool
    $excludeMe = false;

    // Create the table header
    echo "<table>";
    // Create the headers for the table
    echo "<tr>";
    $j = 0; // Dumby index
    foreach ($header_fields as $val) {
        if (!empty($exclusions)) {
            for ($i = 0; $i < count($exclusions); $i++) {
                if (strcmp($val->name, $exclusions[$i]) == 0) {
                    $excludeMe = true;
                }
            }
        }
        if (!$excludeMe) {
            echo "<th>" . $val->name . "</th>";
            array_push($names, $val->name);
            array_push($true_value, $j);
        }
        $excludeMe = false;
        $j++;
    }
    echo "</tr>";
    while ($ret = mysqli_fetch_array($query_result)) {
        echo "<tr>";
        for ($i = 0; $i < count($names); $i++) {
            if (strcmp($ret[$true_value[$i]], "NULL") == 0) {
                echo "<td>N/A</td>"; 
            } else {
                echo "<td>" . $ret[$true_value[$i]] . "</td>"; 
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

function print_photo_table($query_result) {
    // This means that the result is empty, therefore nothing needs to be done
    // Just display no table results
    if (mysqli_num_rows($query_result) == 0) {
        echo "<br><h3 style=\"text-align:center\">No results found...</h3>";        
        return;
    }

    // styling for gallery
    echo "<style>
        	h3{
			text-align:center;
		}    
	.gallery {
              margin: 5px;
              border: 1px solid #ccc;
              float: left;
              width: 180px;
            }

            .gallery:hover {
              border: 1px solid #777;
            }

            .gallery img {
              width: 100%;
              height: auto;
            }

            .desc {
              padding: 15px;
              text-align: center;
            }
        </style>";

    echo "<h3>Gallery</h3>";
    //echo "<table>";
    while ($ret = mysqli_fetch_array($query_result)) {
        //echo "<tr>";
        //echo "<td><img src=\"" . $ret["Link"] . "\" alt=\"Photo\" width=375 height=425></td>";
        echo "<div class=\"gallery\">";
         echo " <a target=\"_blank\" href=\"" . $ret["Link"] . "\">
            <img src=\"" . $ret["Link"] . "\" alt=\"Photo of Students\" width=\"900px\" height=\"400\">
          </a>";
         // <!--<div class=\"desc\">Add a description of the image here</div>-->
       echo "</div>";
        //echo "<img src=\"" . $ret["Link"] . "\" alt=\"Photo\" width=375 height=425>";
        //echo "</tr>";
    }
    //echo "</table>"; 
}

function prevent_injection($conn, $query, $params) {
    // Takes a connection, a query that is in a prepared statement form,
    // and an array (first element is the string containing what characters will be bound and
    // every element following is the parameters to be inserted in that order
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("SQL statement failed " . mysqli_error());
    } else {
        if (sizeof($params) == 2) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1]);
        } else if (sizeof($params) == 3) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2]);
        } else if (sizeof($params) == 4) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2], $params[3]);
        } else if(sizeof($params) == 5 ){
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2], $params[3], $params[4]);
        } else if(sizeof($params) == 6 ){
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2], $params[3], $params[4], $params[5]);
        } else if(sizeof($params) == 7 ){
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2], $params[3], $params[4], $params[5], $params[6]);
        } else if (sizeof($params) == 8) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2], $params[3], $params[4], $params[5], $params[6], $params[7]);
        } else {
            die('This shouldn\'t happen');
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return $result; // returns the query result, used for select
    }
}

function prevent_injection_affected($conn, $query, $params) {
    // Takes a connection, a query that is in a prepared statement form,
    // and an array (first element is the string containing what characters will be bound and
    // every element following is the parameters to be inserted in that order
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("SQL statement failed " . mysqli_error());
    } else {
        if (sizeof($params) == 2) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1]);
        } else if (sizeof($params) == 3) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2]);
        } else if (sizeof($params) == 4) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2], $params[3]);
        } else if (sizeof($params) == 5 ) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2], $params[3], $params[4]);
        } else if (sizeof($params) == 6 ) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2], $params[3], $params[4], $params[5]);
        } else if (sizeof($params) == 7 ) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2], $params[3], $params[4], $params[5], $params[6]);
        } else if (sizeof($params) == 8) {
            mysqli_stmt_bind_param($stmt, $params[0], $params[1], $params[2], $params[3], $params[4], $params[5], $params[6], $params[7]);
        } else {
            die('This shouldn\'t happen');
        }
        mysqli_stmt_execute($stmt);
        $affected = mysqli_affected_rows($conn);
        mysqli_stmt_close($stmt);
        return $affected; // Returns the affect rows, used for update, insert, and delete
    }
}

?>
