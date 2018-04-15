<?php
	require 'index.php';

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
			<!-- <div class="col s4 no-padding">
				<a class="waves-effect waves-effect btn modal-trigger right" href="#modal1">Añadir Alumno</a>
			</div> -->
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
	        			<td><?=$optative['optative_id']?></td>
	        			<td><?=$optative['name']?></td>
	        			<td class="right">
	        				<form action='deleteOptative.php' method="post">
								<input type="hidden" name="id" value="<?=$optative['optative_id']?>">
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