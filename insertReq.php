<?php
	require 'index.php';
	require 'sessionInit.php';
	
	if ($conexion->connect_errno) {
		echo "<br> No pues no se conecto";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$optative = $conexion->real_escape_string($_POST['optative_id']);
		$req = $conexion->real_escape_string($_POST['req_id']);
		$name = $conexion->real_escape_string($_POST['name']);
		
		$sql = "insert into requirement values ('" . $optative . "', '" . $req . "', '" . $name . "');";
		$conexion->query($sql);
		echo $sql;
		$conexion->close(); 
	} 	
	echo "
		<script>
			swal({
			  type: 'success',
			  title: 'El requerimiento ha sido guardado!',
			  showConfirmButton: false,
			  timer: 1500
			});
			setTimeout(function() {
				window.location = '/DBProject/optativeEdit.php?id=" . $optative . "';
			}, 1500);
		</script>";
?>