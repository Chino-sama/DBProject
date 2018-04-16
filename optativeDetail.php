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
	<div class="row no-margin no-padding">
		<div class="card col s10 offset-s1 padded">
			<div class="no-padding col s12">
				<a id="goToOptative" class="btn-link"><i class="material-icons left">chevron_left</i>Volver</a>
			</div>
			<h5 class="no-margin-top col s8"><?=$optative['optative_id']?>&nbsp;&nbsp;&nbsp;<?=$optative['name']?></h5>
			<div class="col s4 no-padding">
				<button id="goToEditOpt" class="btn waves-effect right"><i class="material-icons left">edit</i>Editar</button>
				<?php 
					echo "<script>
						$(document).ready(function() {
							$('#goToEditOpt').click(function() {
								window.location = '/DBProject/optativeEdit.php?id=" . $id . "';
							});
						});
					</script>"
				?>
				<br>
				<br>
			</div>
			<div class="divider col s12"></div>
			<div class="row">
				<h6 class="col s12">Objetivo</h6>
				<textarea disabled class="col s12 materialize-textarea black-text disabled-text"><?=$optative['objective']?></textarea>
				<h6 class="col s12">Temario</h6>
				<textarea disabled class="col s12 materialize-textarea black-text disabled-text"><?=$optative['scheme']?></textarea>
				<h6 class="col s12">Requerimientos</h6>
				<?php 
					if ($res2->num_rows > 0) {
						foreach ($res2 as $req) {
				?>	
					<p class="col s12 no-margin-bottom"><?=$req['req_id']?>&nbsp;&nbsp;<?=$req['req_name']?></p>
				<?php 
						}
					} else {
						echo "<p class='col s12'> N/A </p>";
					}
				?>
			</div>
		</div>
	</div>
<?php		
	}
 ?>
