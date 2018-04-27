<?php
	require('index.php');
	session_start();
	$_SESSION['usuario'] = "";
	$_SESSION['autorizado'] = 0;
	session_destroy(); 
	echo "
	<script>			
			window.location = '/DBProject/login.php';
	</script>"
?>