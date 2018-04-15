<?php 
	require 'index.php';
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conectó";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$id = $conexion->real_escape_string($_POST['id']);
		$name = $conexion->real_escape_string($_POST['name']);
		$sql = "update student set student_id = '" . $id . "', name = '" . $name . "' where student_id = '" . $id . "';";
		$conexion->query($sql);
		$conexion->close();

		echo "
		<script>
			swal({
			  type: 'success',
			  title: 'El alumno ha sido actualizado',
			  showConfirmButton: false,
			  timer: 1500
			});
			setTimeout(function() {
				window.location = '/DBProject/student.php';
			}, 1500);
		</script>";
	}
?>