<?php
	require 'index.php';
	require 'sessionInit.php';

	if ($conexion->connect_errno) {
		echo "<br> No pues no se conectó";
		echo "<br> Error: " . $conexion->connect_erno;
		echo "<br> Error: " . $conexion->connect_error;
	} else {
		$sql = "SELECT * FROM optative where type is not null ORDER BY optative_id;";
		$res = $conexion->query($sql);
	}

	$id = $_SESSION['id'];

	if($id[0] == 'L' || $id[0] == 'l'){
?>
	<div class="row">	
		<div class="card col s10 offset-s1 padded">
			<div class="row col s12 no-padding no-margin">
				<h5 class="col s8 no-margin-top no-padding">Optativas</h5>
				<div class="col s4 no-padding">
					<a class="waves-effect waves-effect btn modal-trigger right" href="#addModal">Añadir Optativa</a>
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
						<th>TIPO</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$count = 1;
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
							<td>
								<?php  
									$type = $optative['type'];
									if ($type == 0) 
										echo "FIT";
									elseif ($type == 1) 
										echo "Presencial";
									elseif ($type == 2)
										echo "FIT y Presencial";
								?>
							</td>
							<td class="right">
								<a class="btn-link modal-trigger" href="#modal<?=$count?>"><i class='material-icons'>mode_edit</i></a>
							</td>
						</tr>
						<div id="modal<?=$count?>" class="modal">
							<form action="editOptativeEnrollment.php" method="post">
								<div class="modal-content">
									<h4>Editar Optativa</h4>
									<div class="row">
										<div class="input-field col s6">
											<input type="text" name="optative" value="<?=$optative['name']?>">
											<label>Optativa</label>
										</div>
										<div class="input-field col s6">
											<select name="type" class="browser-default">
												<option value="" select>Choose your option</option>
												<option value="0">Fit</option>
												<option value="1">Presencial</option>
												<option value="2">Ambas</option>
											</select>
											<label class="active">Tipo</label>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat swal-ok">Cancelar</a>
									<button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Guardar</button>
								</div>
							</form>
						</div>
					<?php
						$count++;		
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<div id="addModal" class="modal">
		<form action="insertOptativeEnrollment.php" method="post">
			<div class="modal-content">
				<h4>Añadir Optativa</h4>
				<div class="row">
					<div class="input-field col s6">
						<select name="optative">
							<option value="" selected>Choose your option</option>
							<?php
								$optatives = "SELECT * FROM optative where type is null";
								$resOptatives = $conexion->query($optatives);
								foreach ($resOptatives as $optative) {
							?>
								<option value="<?=$optative['optative_id']?>"><?=$optative['name']?></option> 
							<?php		
								}
							?>
						</select>
						<label>Optativa</label>
					</div>
					<div class="input-field col s6">
						<select name="type">
							<option value="" selected>Choose your option</option>
							<option value="0">FIT</option>
							<option value="1">Presencial</option>
							<option value="2">FIT y Presencial</option>
						</select>
						<label>Tipo</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat swal-ok">Cancelar</a>
				<button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Guardar</button>
			</div>
		</form>
	</div>
<?php
	} else {
?>
	<div class="row">	
		<div class="card col s10 offset-s1 padded">
			<div class="row col s12 no-padding no-margin">
				<h5 class="col s8 no-margin-top no-padding">Optativas</h5>
				<div class="col s4 no-padding">
					<a class="waves-effect waves-effect btn modal-trigger right" href="#addModal">Inscribir</a>
				</div>
				<br>
				<br>
			</div>
			<div class="divider col s12"></div>
			
			<?php
				$myOpts = "SELECT enrollment.*, name FROM enrollment JOIN optative using(optative_id) where enrollment.status is null;";
				$myOptatives = $conexion->query($myOpts);

				$block1 = "SELECT * FROM optative where block=1 and type is not null;";
				$block2 = "SELECT * FROM optative where block=2 and type is not null;";
				$block3 = "SELECT * FROM optative where block=3 and type is not null;";
				$b1 = $conexion->query($block1);
				$b2 = $conexion->query($block2);
				$b3 = $conexion->query($block3);
				$studentOpts = "SELECT * FROM enrollment where student_id = '$id';";
				$studentOptatives = $conexion->query($studentOpts);
				if($studentOptatives->num_rows == 0 || $studentOptatives->num_rows == 1){
					$studentOptatives = $b1;
				} else if($studentOptatives->num_rows == 2) {
					$studentOpts = "SELECT * FROM optative where (block = 2 or block = 1) and type is not null and optative_id not in (SELECT optative_id from enrollment where student_id = '$id');";
					$studentOptatives = $conexion->query($studentOpts);
				}
			?>
			<div id="addModal" class="modal">
				<form action="insertEnrollment.php" method="post">
					<div class="modal-content">
						<h4>Inscribir</h4>
						<div class="row">
							<div class="input-field col s12">
								<select name="optative" class="browser-default">
									<option value="" selected>Choose your option</option>
									<?php
										foreach ($studentOptatives as $opt) {
											$type = $opt['type'];
											if ($type == 0) 
												$nType = array("FIT");
											elseif ($type == 1) 
												$nType = array("Presencial");
											elseif ($type == 2)
												$nType = array(0 => 'FIT', 1 => 'Presencial');
											
											if ($type == 2) {
												foreach ($nType as $key => $nType) {
									?>
												<option value="<?=$key . $opt['optative_id']?>"><?=$opt['name']?> - <?=$nType?></option> 
									<?php		
												}
											}
											else {
									?>
												<option value="<?=key($nType) . $opt['optative_id']?>"><?=$opt['name']?> - <?=$nType[0]?></option> 
									<?php			
											}
										}
									?>
								</select>
								<label class="active">Optativa</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat swal-ok">Cancelar</a>
						<button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Inscribir</button>
					</div>
				</form>
			</div>
			<table class="striped">
				<thead>
					<tr class="grey-text">
						<th>CLAVE</th>
						<th>NOMBRE</th>
						<th>STATUS</th>
						<th>TIPO</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						foreach ($myOptatives as $optative) {
					?>
						<tr>
							<td>
								<form action='optativeDetail.php' method="get">
									<input type="hidden" name="id" value="<?=$optative['optative_id']?>">
									<button type="submit" class="btn-link"><?=$optative['optative_id']?></button>
								</form>
							</td>
							<td><?=$optative['name']?></td>
							<td>
								<?php
									if ($optative['status'] == NULL)
										echo 'Cursando';
									else
										echo $optative['status'];
								?>
							</td>
							<td>
								<?php
									$type = $optative['type'];
									if ($type == 0) 
										echo 'FIT';
									elseif ($type == 1) 
										echo 'Presencial';
								?>
							</td>
						</tr>
					<?php		
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
<?php
	}
?>

