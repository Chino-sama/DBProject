<?php
	require 'index.php';
	require 'side-nav.php';

	if ($conexion->connect_errno) {
		echo "<br> No pues no se conectó";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$opt_id = $_GET['id'];
		$type = $_GET['type'];
		$sql = "SELECT enrollment.*, name FROM enrollment JOIN student using(student_id) WHERE optative_id = '$opt_id' and type = '$type' ORDER BY student_id";
		$res = $conexion->query($sql);
		$sql2 = "SELECT * from optative where optative_id = '$opt_id'";
		$res2 = $conexion->query($sql2);
	}
	foreach ($res2 as $optative) {		
?>

<div class="row">
	<div class="col s10 offset-s1 card padded">
		<h5><?=$optative['name']?> - <?php  
			if ($type == 0) 
				echo "FIT";
			elseif ($type == 1) 
				echo "Presencial";
		?></h5>
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
						<td name='student'><?=$student['student_id']?></td>
						<td><?=$student['name']?></td>
						<td class="right">
							<div class="absolute">
								<div class="fixed-action-btn">
									<a class="btn-floating btn-small <?php
										if ($student['status'] == NULL)
											echo "grey";
										else if($student['status'] == 1)
											echo "green";
										else
											echo "red";
									?>">
										<i class="large material-icons"><?php
											if ($student['status'] == NULL)
												echo "mode_edit";
											else if($student['status'] == 1)
												echo "check";
											else
												echo "clear";
										?></i>
									</a>
									<ul>
										<li>
											<form action="editStudentEnrollment.php" method="post">
												<input type="hidden" name="student_id" value="<?=$student['student_id']?>">
												<input type="hidden" name="status" value='1'>
												<input type="hidden" name="optative_id" value='<?=$opt_id?>'>
												<button class="btn-floating btn-small green">
													<i class="material-icons">check</i>
												</button>
											</form>
										</li>
										<li>
											<form action="editStudentEnrollment.php" method="post">
												<input type="hidden" name="student_id" value="<?=$student['student_id']?>">
												<input type="hidden" name="status" value="0">
												<input type="hidden" name="optative_id" value='<?=$opt_id?>'>
												<button class="btn-floating btn-small red">
													<i class="material-icons">clear</i>
												</button>
											</form>
										</li>
									</ul>
								</div>
							</div>
							<form action='deleteStudentEnrollment.php' method="post">
								<input type="hidden" name="id" value="<?=$student['student_id']?>">
								<button type="submit" class="btn-link"><i class='material-icons'>delete_forever</i></button>
							</form>
						</td>
					</tr>
				<?php		
					}
				 ?>
			</tbody>
		</table>
	</div>
</div>
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

<?php 
	}
?>