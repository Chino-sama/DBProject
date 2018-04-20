<?php
	require('index.php');

	$id = $conexion->real_escape_string($_POST['id']);
	$pass = $conexion->real_escape_string($_POST['pass']);

	if ($conexion->connect_errno) 
	{
 		echo "<br>Error: Fallo al conectarse a MySQL debido a:" ;
   	 	echo "<br>Errno: " . $conexion->connect_errno;
    	echo "<br>Error: " . $conexion->connect_error;
        exit;
	}

	if($id[0] == 'A' || $id[0] == 'a') {
		$sql = "select * from student where student_id = '" . $id . "';";

		$rows = $conexion->query($sql);
		var_dump($sql);
		$fila = $rows->fetch_assoc();

		if($fila['student_id'] == $id){
			echo "Acceso autorizado";
			session_start(); 
			$_SESSION['id'] = $id;
			$_SESSION['autorizado'] = 1;
			header( "Location: enrollment.php" );
			exit();
		} else {
			echo "Acceso NO autorizado";
			header( "Location: login.php" );
			exit();
		}

	}
	else if($id[0] == 'L' || $id[0] == 'l'){
		$sql = "select * from admin where admin_id = '" . $id . "';";

		$rows = $conexion->query($sql);
		$fila = $rows->fetch_assoc();

		if($fila['admin_id'] == $id){
			echo "Acceso autorizado";
			session_start(); 
			$_SESSION['id'] = $id;
			$_SESSION['autorizado'] = 1;
			header( "Location: enrollment.php" );
			exit();
		} else {
			echo "Acceso NO autorizado";
			header( "Location: login.php" );
			exit();
		}

	}
	 
	$conexion->close();
?>