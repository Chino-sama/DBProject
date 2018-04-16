<?php
	require 'index.php'; 
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conecto";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$id = $conexion->real_escape_string($_POST['id']);
		$name = $conexion->real_escape_string($_POST['name']);
		
		$sql = "insert into optative (optative_id, name) values ('" . $id . "', '" . $name . "');";
		$conexion->query($sql);
		$conexion->close(); 
	} 	
	echo "
		<script>
			swal({
			  type: 'success',
			  title: 'La materia optativa ha sido guardada!',
			  showConfirmButton: false,
			  timer: 1500
			});
			setTimeout(function() {
				window.location = '/DBProject/optativeEdit.php?id=" . $id . "';
			}, 1500);
		</script>";
?>