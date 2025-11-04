<?php 
	session_start();

	echo'<script>alert("Redirecting")</script>';
	session_destroy();
	header("Location:index.php");
?>
