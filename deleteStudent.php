<?php 
	require 'index.php';
	require 'sessionInit.php';
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conectó";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$id = $conexion->real_escape_string($_POST['id']);
		$sql = "delete from student where student.student_id = '" . $id . "';";
		$conexion->query($sql);
		$conexion->close();

		echo "
		<script>
			swal({
			  type: 'success',
			  title: 'El alumno ha sido eliminado',
			  showConfirmButton: false,
			  timer: 1500
			});
			setTimeout(function() {
				window.location = '/DBProject/student.php';
			}, 1500);
		</script>";
	}
 ?>