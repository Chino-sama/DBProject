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
					<th>MATRÍCULA</th>
					<th>NOMBRE</th>
				</tr>
	        </thead>
	        <tbody>
	        	<?php 
	        		foreach ($res as $student) {
	        	?>
	        		<tr>
	        			<td><?=$student['student_id']?></td>
	        			<td><?=$student['name']?></td>
	        			<td class="right">
	        				<form action='deleteStudent.php' method="post">
								<input type="hidden" name="id" value="<?=$student['student_id']?>">
								<input type="hidden" name="id" value="<?=$student['student_id']?>">
	        					<a class="btn-link modal-trigger" href="#modal2"><i class='material-icons'>edit</i></a>
								<button type="submit" class="btn-link"><i class='material-icons'>delete_forever</i></button>
							</form>
						</td>
	        		</tr>
	        		<div id="modal2" class="modal">
						<form action="updateStudent.php" method="post">
							<div class="modal-content">
								<h4>Editar Alumno</h4>
								<div class="input-field s6">
									<input id="name" type="text" name="id" value="<?=$student['student_id']?>">
									<label for="name">Matrícula</label>
								</div>
								<div class="input-field s6">
									<input id="id" type="text" name="name" value="<?=$student['name']?>">
									<label for="id">Nombre</label>
								</div>
							</div>
							<div class="modal-footer">
								<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat swal-ok">Cancelar</a>
								<button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Guardar</button>
							</div>
						</form>
					</div>
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
				<input id="id" type="text" name="id">
				<label for="id">Matrícula</label>
			</div>
			<div class="input-field s6">
				<input id="name" type="text" name="name">
				<label for="name">Nombre Completo</label>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat swal-ok">Cancelar</a>
			<button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Guardar</button>
		</div>
	</form>
</div>