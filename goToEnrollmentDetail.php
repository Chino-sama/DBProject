<?php
	require 'index.php';
	require 'sessionInit.php'; 
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conecto";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$id = $conexion->real_escape_string($_GET['id']);
		$type = $conexion->real_escape_string($_GET['type']);
	}	
	echo "
		<script>			
				window.location = '/DBProject/enrollmentDetail.php?id=" . $id . "&type=" . $type . "';
		</script>";
?>