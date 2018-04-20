<?php
	require 'index.php';
	require 'sessionInit.php'; 
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conecto";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$id = $conexion->real_escape_string($_POST['id']);
	} 	
	echo "
		<script>			
				window.location = '/DBProject/optativeDetail.php?id=" . $id . "';
		</script>";
?>