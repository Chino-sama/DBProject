<?php
	require 'index.php'; 
	
	if($conexion->connect_errno) {
		echo "<br> No pues no se conecto";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$id = $conexion->real_escape_string($_POST['id']);
		$name = $conexion->real_escape_string($_POST['name']);
		
		$sql = "insert into student values ('$id', '$name');";
		$conexion->query($sql);
		$conexion->close(); 
	} 	
	echo "
		<script>
			swal({
			  type: 'success',
			  title: 'El alumno ha sido guardado!',
			  showConfirmButton: false,
			  timer: 1500
			});
			setTimeout(function() {
				window.location = '/DBProject/student.php';
			}, 1500);
		</script>";
	// header("Location: student.php");
	// exit();
?>