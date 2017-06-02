<?php 
	session_start();

	if (isset($_POST['destroy'])) {
		session_destroy();
		location("location:index.php");
		echo "cleared";
	}

	if (isset($_GET['destroy'])) {
		//session_clear();
		session_destroy();
		echo "cleard";
	}
?>