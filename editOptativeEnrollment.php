<?php
	require 'index.php';
	require 'sessionInit.php';
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conecto";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$optative = $conexion->real_escape_string($_POST['optative']);
		$type = $conexion->real_escape_string($_POST['type']);
		
		$sql = "update optative set type=" . $type . " where name='" . $optative . "';";
		$conexion->query($sql);

		$conexion->close(); 
	} 	
	echo "
		<script>
			swal({
			  type: 'success',
			  title: 'La materia optativa se ha modificado!',
			  showConfirmButton: false,
			  timer: 1500
			});
			setTimeout(function() {
				window.location = '/DBProject/enrollment.php?';
			}, 1500);
		</script>";
?>