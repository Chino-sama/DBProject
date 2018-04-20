<?php
	session_start();
	if (($_SESSION['autorizado'] != 1) || (!isset($_SESSION['autorizado']))) {
		echo "Acceso NO autorizado";
		header( "Location: login.php" );
		exit();
	}
?>