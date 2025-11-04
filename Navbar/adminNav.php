<?php 
	session_start();
?>

  <nav class="navbar">
    <a class="newPage" href="index.php">Home</a>
    <a class="newPage" href="search.php">Search</a>
    <a class="newPage" href="admin.php">Edit</a>
    <a class="newPage" href="logout.php">Logout</a>
    <a class="user">
	<?php 
		echo $_SESSION['username']; 
	?>
    </a>
 </nav>
