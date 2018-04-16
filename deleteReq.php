<?php 
	require 'index.php';
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conectó";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$reqId = $conexion->real_escape_string($_POST['req_id']);
		$optId = $conexion->real_escape_string($_POST['opt_id']);
		$sql = "delete from requirement where req_id = '" . $reqId . "' and optative_id = '" . $optId . "';";
		$conexion->query($sql);
		$conexion->close();

		echo "
		<script>
			swal({
			  type: 'success',
			  title: 'El requerimiento ha sido eliminado',
			  showConfirmButton: false,
			  timer: 1500
			});	
			setTimeout(function() {
				window.location = '/DBProject/optativeEdit.php?id=" . $optId . "';
			}, 1500);
		</script>";
	}
 ?>