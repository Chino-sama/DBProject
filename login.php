<?php
	require 'index.php';
?>

<div class="row">
	<br>
	<br>
	<br>
	<br>
	<form method='post' action='loginAuthenticate.php'>
		<div class="card col s6 offset-s3 padded center">
			<div class="input-field s12">
				<input id="id" type="text" name="id">
				<label for="id">Nómina</label>
			</div>
			<div class="input-field s12">
				<input id="pass" type="password" name="pass">
				<label for="pass">Contraseña</label>
			</div>
			<button type='submit' class="btn waves-effect btn-large">Iniciar Sesión</button>
		</div>
	</form>
</div>