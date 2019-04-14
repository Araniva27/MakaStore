<?php
//Inclusion del archivo dashboard.php en la pagina
  include "../../core/helpers/dashboard.php";
  dashboard::header("Ingreso");//aplicacion del metodo header y envio del parametro titutlo
  
?>

<body class="blue accent-1">
	<header class="center">
		<br>
		<br>
		<img src="../../resource/img/logo/logoMKStore.png">
		<header>
			<!--Creacion del container donde se encuentra el formulario de login-->
			<div class="container">
				<!--Creacion de la zona donde se encuentra el formuario de ingreso-->
				<div class="z-depth-1 white row offset-l6 hoverable" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
					<img src="../../resource/img/img-card/usuario.png">
					<!--Inclusion de la imagen del formulario-->
					<form class="col s12" method="post" id="form-loginA">
						<div class='row'>
							<div class='col s12'>
							</div>
						</div>
						<!---Campos del formulario de ingreso-->
						<div class='row'>
							<div class='input-field col s12'>
								<input class='validate' type='text' name='usuario' id='usuario' required/>
								<label for='usuario'>Usuario</label>
							</div>
						</div>
						<!---Campos del formulario de ingreso-->
						<div class='row'>
							<div class='input-field col s12'>
								<input class='validate' type='password' name='contrasena' id='contrasena' required/>
								<label for='contrasena'>Contraseña</label>
							</div>

						</div>
						<br />

						<div class='row'>
							<button type='submit' name='btnIngreso'
                            class='col s12 btn btn-large waves-effect indigo'>Ingresar</button>
							<!--<button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>-->
							<!--<a class="white-text" href="main.php">Ingresar</button>-->
							
							<br>
							<br>
							<br>
							<br>

						</div>

					</form>
				</div>
			</div>

			</div>
			<!--Inclusion de archivos javascrip necesarios para la funcionalidad del la pagina-->
			<script src="../../resource/js/jquery-3.3.1.min.js"></script>
			<script src="../../resource/js/materialize.min.js"></script>
			<script src="../../resource/js/initialization.js"></script>
			<script type="text/javascript" src="../../resource/js/sweetalert.min.js"></script>
			<script type="text/javascript" src="../../core/controllers/dashboard/index.js"></script>
			<script type="text/javascript" src="../../core/helpers/functions.js"></script>

</body>

</html>