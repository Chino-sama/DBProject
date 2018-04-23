<?php
	require 'index.php';
	require 'sessionInit.php';
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conecto";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$status = $conexion->real_escape_string($_POST['status']);
		$student = $conexion->real_escape_string($_POST['student_id']);
		$opt_id = $conexion->real_escape_string($_POST['optative_id']);

		$sql = "update enrollment set status=" . $status . " where student_id='" . $student . "' and optative_id = '" . $opt_id . "';";

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
				window.location = '/DBProject/enrollmentDetail.php?id=$opt_id';
			}, 1500);
		</script>";
?>