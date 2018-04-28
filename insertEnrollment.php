<?php
	require 'index.php';
	require 'sessionInit.php';
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conecto";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$data = $conexion->real_escape_string($_POST['optative']);
		$type = $data[0];
		$opt_id = substr($data, 1);
		$student_id = $_SESSION['id'];
		$sql = "insert into enrollment values ('$student_id', '$opt_id', NULL, '$type');";
		$conexion->query($sql);
		$conexion->close(); 
	}
	echo "
		<script>
			swal({
			  type: 'success',
			  title: '¡Se han inscrito las materias! :)',
			  showConfirmButton: false,
			  timer: 1500
			});
			setTimeout(function() {
				window.location = '/DBProject/enrollment.php';
			}, 1500);
		</script>";
?>