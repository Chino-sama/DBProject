<?php
	require 'index.php';

	if ($conexion->connect_errno) {
		echo "<br> No pues no se conectó";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$id = $_GET['id'];
		$sql = "SELECT * FROM optative where optative_id = '" . $id ."';";
		$sql2 = "SELECT * FROM requirement where optative_id = '" . $id ."';";
		$res = $conexion->query($sql);
		$res2 = $conexion->query($sql2);
	}
?>	
<?php 
	foreach ($res as $optative) {
?>	
	<form action="updateOptative.php" method="post" class="row no-margin no-padding">
		<div class="card col s10 offset-s1 padded">
			<div class="no-padding col s12">
				<a id="goToOptative" class="btn-link"><i class="material-icons left">chevron_left</i>Volver</a>
			</div>
			<div class="input-field col s4">
				<label for="#id">Clave</label>
				<input id="id" type="text" name="id" value="<?=$optative['optative_id']?>">
			</div>
			<div class="input-field col s4">
				<label for="#name">Nombre</label>
				<input id="name" type="text" name="name" value="<?=$optative['name']?>">
			</div>
			&nbsp;&nbsp;&nbsp;
			<div class="col s4 no-padding">
				<button type="submit" class="btn waves-effect right">Guardar Cambios</button>
				<br>
				<br>
			</div>
			<div class="divider col s12"></div>
			<div class="row">
				<h6 class="col s12">Objetivo</h6>
				<div class="input-field col s12 no-margin">
					<textarea class="materialize-textarea" name="objective"><?=$optative['objective']?></textarea>
				</div>
				<h6 class="col s12">Temario</h6>
				<div class="input-field col s12 no-margin">
					<textarea class="materialize-textarea" name="scheme"><?=$optative['scheme']?></textarea>
				</div>
				<h6 class="col s12">Requerimientos</h6>
				<?php 
					foreach ($res2 as $req) {
				?>	
					<p class="col s12 no-margin-bottom"><?=$req['req_id']?>&nbsp;&nbsp;<?=$req['req_name']?></p>
				<?php 
					}
				?>
				<a class="col s2 modal-trigger" href="#modal1"><i class="material-icons left">add</i> Añadir Requerimiento</a>
			</div>
		</div>
	</form>
	<div id="modal1" class="modal">
		<form action="insertReq.php" method="post">
			<div class="modal-content">
				<h4>Añadir Requerimiento</h4>
				<input id="id" type="hidden" name="optative_id" value="<?=$optative['optative_id']?>">
				<div class="input-field s6">
					<input id="id" type="text" name="req_id">
					<label for="id">Clave</label>
				</div>
				<div class="input-field s6">
					<input id="name" type="text" name="name">
					<label for="name">Nombre</label>
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

