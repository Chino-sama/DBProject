<?php 
	require 'index.php';
	require 'sessionInit.php';
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conectó";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$id = $conexion->real_escape_string($_POST['id']);
		$name = $conexion->real_escape_string($_POST['name']);
		$objective = $conexion->real_escape_string($_POST['objective']);
		$scheme = $conexion->real_escape_string($_POST['scheme']);
		$sql = "update optative set optative_id = '" . $id . "', name = '" . $name . "', objective = '" . $objective . "', scheme = '" . $scheme . "' where optative_id = '" . $id . "';";
		$conexion->query($sql);
		$conexion->close();

		echo "
		<script>
			swal({
			  type: 'success',
			  title: 'La materia optativa ha sido actualizada',
			  showConfirmButton: false,
			  timer: 1500
			});
			setTimeout(function() {
				window.location = '/DBProject/optativeDetail.php?id=" . $id . "';
			}, 1500);
		</script>";
	}
?>