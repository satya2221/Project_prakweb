<?php 
	session_start();
	session_destroy();
	header("location:homers.php?pesan=logout");
?>