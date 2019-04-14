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
		<!---Creacion de la tabla donde se encuentran todos los productos registrados-->
		<table class="centered responsive-table" id="tabla-clientes">
			<div class="col">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo</th>
						<th>Usuario</th>
						<th>Visibilidad</th>
						<th>Direccion</th>
						<th>Eliminar</th>
						<th>Estado</th>

					</tr>
				</thead>
				<tbody id="tbody-read">	
										
				</tbody>
			</div>
		</table>
	</div>	
		<div id="modalUpdate" class="modal">
			<div class="modal-content">
				<h4 class="center">Estado del cliente</h4>
				<form class="col s12" method="post" id="form-update" enctype="multipart/form-data">
						<div class="row">
							<div class='input-field col s12 l12 m12'>
									<input class='validate' type='hidden' name='idCliente' id='idCliente' />
								</div>
							</div>
							<div class="row center">
								<div class="switch">
									<label style="font-size:30px">
										<i class="material-icons">visibility_off</i>
										<input id="update_estado" type="checkbox" name="update_estado">
										<span class="lever"></span>
										<i class="material-icons">visibility</i>
									</label>
								</div>
							</div>
						</div>		
						<div class="row center">
							<a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar">
								<i class="material-icons">cancel</i>
							</a>
							<button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Modificar">
								<i class="material-icons">update</i>
							</button>
						</div>
					</form>	
				<div class="modal-footer">

				</div>
			</div>
		</div>
		<br>
		<br>
	
	<!--Inclusion de scrip javascript para la inicializacion y uso de diversos elementos-->
	
	</body>
	<?php
//llamada a la funcion footer en la clase dashboard
  dashboard::footer('customer.js');
?>

		</html>