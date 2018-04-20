<?php
	session_start();
	$_SESSION['usuario'] = "";
	$_SESSION['autorizado'] = 0;
	session_destroy(); 
?>
<html>
	<h1>Saliste :)</h1>

	<br>Si lo deseas puedes volver a ingresar
	<br><a href="login.php">Iniciar Sesión</a>
</html>