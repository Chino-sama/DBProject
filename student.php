<?php
	require 'index.php';

	if ($conexion->connect_errno) {
		echo "<br> No pues no se conectó";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$sql = "SELECT * FROM student ORDER BY student_id";
		$res = $conexion->query($sql);
	}
?>

<div class="row">	
	<div class="card col s10 offset-s1 padded">
		<div class="row col s12 no-padding no-margin">
			<h5 class="col s8 no-margin-top no-padding">Alumnos</h5>
			<div class="col s4 no-padding">
				<a class="waves-effect waves-effect btn modal-trigger right" href="#modal1">Añadir Alumno</a>
			</div>
			<br>
			<br>
		</div>
		<div class="divider col s12"></div>
		<table class="striped">
	        <thead>
				<tr class="grey-text">
					<th>NAME</th>
					<th>STUDENT ID</th>
				</tr>
	        </thead>
	        <tbody>
	        	<?php 
	        		foreach ($res as $student) {
	        	?>
	        		<tr>
	        			<td><?=$student['student_id']?></td>
	        			<td><?=$student['name']?></td>
	        		</tr>
	        	<?php		
	        		}
	        	 ?>

	        </tbody>
    	</table>
	</div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
	<form action="insertStudent.php" method="post">
		<div class="modal-content">
			<h4>Añadir Alumno</h4>
				<div class="input-field s6">
					<input id="name" type="text" name="name">
					<label for="name">Nombre Completo</label>
				</div>
				<div class="input-field s6">
					<input id="id" type="text" name="id">
					<label for="id">Matrícula</label>
				</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat swal-ok">Cancelar</a>
			<button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Guardar</button>
		</div>
	</form>
</div>