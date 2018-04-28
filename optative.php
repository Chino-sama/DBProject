<?php
	require 'index.php';
	require 'side-nav.php';


	if ($conexion->connect_errno) {
		echo "<br> No pues no se conectó";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$sql = "SELECT optative_id, name FROM optative ORDER BY optative_id";
		$res = $conexion->query($sql);
	}
?>

<div class="row">	
	<div class="card col s10 offset-s1 padded">
		<div class="row col s12 no-padding no-margin">
			<h5 class="col s8 no-margin-top no-padding">Optativas</h5>
			<div class="col s4 no-padding">
				<?php
					$id = $_SESSION['id'];
					if($id[0] == 'L' || $id[0] == 'l') {
				?>
				<a class="waves-effect waves-effect btn modal-trigger right" href="#modal1">Añadir Optativa</a>
				<?php
					}
				?>
			</div>
			<br>
			<br>
		</div>
		<div class="divider col s12"></div>
		<table class="striped">
	        <thead>
				<tr class="grey-text">
					<th>CLAVE</th>
					<th>NOMBRE</th>
				</tr>
	        </thead>
	        <tbody>
	        	<?php 
	        		foreach ($res as $optative) {
	        	?>
	        		<tr>
	        			<td>
							<form action='optativeDetail.php' method="get">
								<input type="hidden" name="id" value="<?=$optative['optative_id']?>">
	        					<button type="submit" class="btn-link"><?=$optative['optative_id']?></button>
	        				</form>
	        			</td>
	        			<td><?=$optative['name']?></td>
	        			<?php
							$id = $_SESSION['id'];
							if($id[0] == 'L' || $id[0] == 'l') {
						?>
							<td class="right">
		        				<form action='deleteOptative.php' method="post">
									<input type="hidden" name="id" value="<?=$optative['optative_id']?>">
									<button type="submit" class="btn-link"><i class='material-icons'>delete_forever</i></button>
								</form>
							</td>
						<?php
							}
						?>
	        		</tr>
	        	<?php		
	        		}
	        	 ?>
	        </tbody>
    	</table>
	</div>
</div>

<div id="modal1" class="modal">
	<form action="insertOptative.php" method="post">
		<div class="modal-content">
			<h4>Añadir Optativa</h4>
			<div class="input-field s6">
				<input id="id" type="text" name="id">
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