<?php 
	require 'index.php';
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conectó";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$id = $conexion->real_escape_string($_POST['id']);
		$optId = $conexion->real_escape_string($_POST['opt_id']);
		$name = $conexion->real_escape_string($_POST['name']);
		$sql = "update requirement set req_id = '" . $id . "', req_name = '" . $name . "' where req_id = '" . $id . "';";
		$conexion->query($sql);
		$conexion->close();

		echo "
		<script>
			swal({
			  type: 'success',
			  title: 'El requerimiento ha sido actualizado',
			  showConfirmButton: false,
			  timer: 1500
			});
			setTimeout(function() {
				window.location = '/DBProject/optativeEdit.php?id=" . $optId . "';
			}, 1500);
		</script>";
	}
?>