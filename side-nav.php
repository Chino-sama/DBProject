<?php
	require('index.php');
	require('sessionInit.php');
	$id = $_SESSION['id'];
?>
<nav class="blue">
	<div class="nav-wrapper">
		<ul id="slide-out">
			<?php
				if($id[0] == 'L' || $id[0] == 'l') {
			?>
				<li><a href="optative.php">Optativas</a></li>
				<li><a href="student.php">Alumnos</a></li>
			<?php
				}
			?>
			<li><a href="enrollment.php">Inscripción</a></li>
			<li><a href="signout.php">Cerrar sesión</a></li>
		</ul>
	</div>
</nav>