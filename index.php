<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>

<!DOCTYPE html>
<html>
<head>
	<title>DBProject</title>
	<!-- Materialize -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
   	<script src="swal2.all.min.js"></script>
    <script src="app.js"></script>       
</head>
<body>
	<?php 
		header("Content-Type: text/html; charset=UTF-8");
		$conexion = new mysqli("localhost", 'root', '', 'ititDB');
		if (!$conexion->set_charset("utf8")) {
	        printf("Error loading character set utf8: %s\n", $conexion->error);
	    } else {
	        printf("Current character set: %s\n", $conexion->character_set_name());
	    }
	?>	
</body>
</html>