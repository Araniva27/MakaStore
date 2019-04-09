<?php
//instanciacion del documento dashboard
  include "../../core/helpers/dashboard.php";
  //llamada del metodo header y envio del parametro de Título
  dashboard::header("Control clientes");
  //lamada del metodo navbar
  dashboard::navbar();
?>
	<div class="container">
		<div class="card horizontal blue lighten-1">
			<div class="card-stacked">
				<div class="card-content">
					<h5 class="center" style="color:white">Control de clientes</h5>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<nav>
			<!--Creacion de la barra de busqueda de productos-->
			<div class="nav-wrapper blue">
				<form>
					<div class="input-field">
						<input id="search" type="search" required>
						<label class="label-icon" for="search">
							<i class="material-icons">search</i>
						</label>
						<i class="material-icons">close</i>
					</div>
				</form>
			</div>
	</div>
	<div class="container">
		</nav>
		<br>
		<!--Creacion del boton de busqueda-->
		<div class="row center">
			<a class="waves-effect waves-light btn blue">
				<i class="material-icons right">search</i>Buscar</a>
		</div>
	</div>
	<div class="container">
		<!---Creacion de la tabla donde se encuentran todos los productos registrados-->
		<table class="centered responsive-table">
			<div class="col">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo</th>
						<th>Usuario</th>
						<th>Telefono</th>
						<th>Direccion</th>
						<th>Eliminar</th>
						<th>Estado</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Manuel</td>
						<td>Araniva</td>
						<td>manuelaraniva07@gmail.com</td>
						<td>manu</td>
						<td>73742058</td>
						<td>Colonia escalon, San Salvador, El Salvador</td>

						<!--Colocacion del boton para eliminar cliente-->
						<td>
							<a class="waves-effect waves-light btn tooltipped red" data-position="top" data-delay="50" data-tooltip="Eliminar">
								<i class="material-icons center">close</i>
							</a>
						</td>
						<!--Boton para mostrar modal para cambiar estado del usuario-->
						<td>
							<a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50" data-tooltip="Estado"
							    href="#modalC">
								<i class="material-icons center">update</i>
							</a>
						</td>


					</tr>
					<tr>
						<td>2</td>
						<td>Ricardo</td>
						<td>Araniva</td>
						<td>kaky@gmail.com</td>
						<td>ricar</td>
						<td>77722052</td>
						<td>Colonia escalon, San Salvador, El Salvador</td>

						<!--Colocacion del boton para eliminar cliente-->
						<td>
							<a class="waves-effect waves-light btn tooltipped red" data-position="top" data-delay="50" data-tooltip="Eliminar">
								<i class="material-icons center">close</i>
							</a>
						</td>
						<!--Boton para mostrar modal para cambiar estado del usuario-->
						<td>
							<a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50" data-tooltip="Estado"
							    href="#modalC">
								<i class="material-icons center">update</i>
							</a>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Juan Carlos</td>
						<td>Gomez</td>
						<td>juancag@gmail.com</td>
						<td>juanca278</td>
						<td>12540236</td>
						<td>Mejicanos, San Salvador, El Salvador</td>

						<!--Colocacion del boton para eliminar cliente-->
						<td>
							<a class="waves-effect waves-light btn tooltipped red" data-position="top" data-delay="50" data-tooltip="Eliminar">
								<i class="material-icons center">close</i>
							</a>
						</td>
						<!--Boton para mostrar modal para cambiar estado del usuario-->
						<td>
							<a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50" data-tooltip="Estado"
							    href="#modalC">
								<i class="material-icons center">update</i>
							</a>
						</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Giselle</td>
						<td>Perez</td>
						<td>gisp@gmail.com</td>
						<td>gisy</td>
						<td>54158962</td>
						<td>Chinameca, San Miguel, El Salvador</td>

						<!--Colocacion del boton para eliminar cliente-->
						<td>
							<a class="waves-effect waves-light btn tooltipped red" data-position="top" data-delay="50" data-tooltip="Eliminar">
								<i class="material-icons center">close</i>
							</a>
						</td>
						<!--Boton para mostrar modal para cambiar estado del usuario-->
						<td>
							<a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50" data-tooltip="Estado"
							    href="#modalC">
								<i class="material-icons center">update</i>
							</a>
						</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Jaime</td>
						<td>Lopez</td>
						<td>jailo@gmail.com</td>
						<td>jailop</td>
						<td>45213620</td>
						<td>Cucatancingo, San Salvador, El Salvador</td>

						<!--Colocacion del boton para eliminar cliente-->
						<td>
							<a class="waves-effect waves-light btn tooltipped red" data-position="top" data-delay="50" data-tooltip="Eliminar">
								<i class="material-icons center">close</i>
							</a>
						</td>
						<!--Boton para mostrar modal para cambiar estado del usuario-->
						<td>
							<a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50" data-tooltip="Estado"
							    href="#modalC">
								<i class="material-icons center">update</i>
							</a>
						</td>
					</tr>
				</tbody>
			</div>
		</table>
		<div id="modalC" class="modal">
			<div class="modal-content">
				<h4 class="center">Estado del cliente</h4>
				<div class="row center">
					<div class="switch">
						<label style="font-size:30px">
							Dar de alta
							<input type="checkbox">
							<span class="lever"></span>
							Dar de baja
						</label>
					</div>
				</div>
				<div class="row center">
					<a href="#!" class="btn grey modal-close waves-effect ">
						<i class="material-icons left">update</i>Actualizar</a>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
		<br>
		<br>
	</div>
	<!--Inclusion de scrip javascript para la inicializacion y uso de diversos elementos-->
	<script src="../../resource/js/jquery-3.3.1.min.js"></script>
	<script src="../../resource/js/materialize.min.js"></script>
	<script src="../../resource/js/initialization.js"></script>
	</body>
	<?php
//llamada a la funcion footer en la clase dashboard
  dashboard::footer();
?>

		</html>