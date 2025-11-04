<?php
	session_start()
 ?>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>SU HonorSociety Database</title>
	<meta name="description" content="Database for the HonorSocieties located at Salisbury University">
	<meta name="author" content="Cosc-386 HonorSociety team">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Styles/USfooter.css">
	<link rel="stylesheet" type="text/css" href="Styles/index.css">
	<link rel="stylesheet" type="text/css" href="Styles/header.css">

</head>

<body>

<?php
	if(isset($_SESSION['username']))
	{
		include "Navbar/adminNav.php";
	}       
	else{
		include "Navbar/userNav.php"; 
	}

    include"Processing/functions.php";
?>

	 
 	<div class="mainContainer">   
 		<div class="left">
			<h3>Helpful Links</h3>
			<button class="collapsibleButton">Salisbury University</button>
			<div class="content">
				<div class = "sulinks">
					<ul>
						<li><a href="https://www.salisbury.edu/">Salisbury University</a></li>
						<li><a href="https://www.salisbury.edu/administration/academic-affairs/acad-honor-societies.aspx">Salisbury Honor societies</a></li>
						<li><a href="https://www.salisbury.edu/current-students/">Salisbury Current Students</a></li>
						<li><a href="https://www.salisbury.edu/faculty-and-staff/">Salisbury Faculty Directory</a></li>
							
					</ul>
				</div>
			</div>
			<button class="collapsibleButton">Honor Society Organizations</button>
			<div class="content">
				<div class="scroll">
					<div class="cols">
                                		<?php
                                    			$connection = get_conn();
                                    			$query = "SELECT Name, OrganizationLink FROM HonorSociety";
                                    			$result = mysqli_query($connection, $query);
                                    			echo "<ul>";
                                    			while ($ret = mysqli_fetch_array($result)) {
                                        			echo "<li><a href=\"" . $ret["OrganizationLink"]. "\">" . $ret["Name"] . "</a></li>";
                                    			}	
                                    			echo "</ul>";
                                    			close_conn($connection);
                                		?>
					</div>
				</div>	
			</div>
		</div>
		<div class="center">
      			<h1>Salisbury University Honor Societies</h1>
      			<p class="header2">About:</p>
      			<p>This website is designed for the use of Salisbury University's National Honor Societies. It is meant to keep track and store important information about members, advisors, officers, scholarships, and activities within each chapter. This website supports CRUD functionality. The search page can be used to query information stated prior. Users with administrative login credientials can create a new user and login to gain access to more features. To create a new user you must be an active officer or faculty advisor as of two years from creation. Administrative features include creation of new data into the database, the ability to update existing attributes, and delete existing data.</p>
		</div> 

    		<div class="right">
        	
    		</div>
  	</div>

	<script>
		var coll = document.getElementsByClassName("collapsibleButton");
		var i;

		for (i = 0; i < coll.length; i++) {
  			coll[i].addEventListener("click", function() {
    				this.classList.toggle("active");
    				var content = this.nextElementSibling;
    				if (content.style.maxHeight){
      					content.style.maxHeight = null;
    				}else{
      					content.style.maxHeight = content.scrollHeight + "px";
    				}
			  });
		}
	</script>
<footer>
	<?php
                include "Footer/usfooter.php";
        ?>	
	
</footer>
</body>
</html>
