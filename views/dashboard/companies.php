<?php
//instanciacion del documento dashboard
  include "../../core/helpers/dashboard.php";
  //llamada del metodo header y envio del parametro de titulo
  dashboard::header("Compañias");
  //lamada del metodo navbar
  dashboard::navbar();
?>
    <!--Creacion del titulo de la pagina-->
    <div class="container">
        <div class="card horizontal blue lighten-1">
            <div class="card-stacked">
                <div class="card-content">
                    <h5 class="center" style="color:white">Compañias</h5>
                </div>
            </div>
        </div>
        <div class="row center">
            <a class="waves-effect waves-light btn green modal-trigger" href="#modal-create">Registrar compañia + </a>
        </div>        
        <!---Creacion de la tabla donde se encuentran todos los productos registrados-->
            <table class="responsive-table highlight" id="tabla-proveedores">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Compañía</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>                        
                    </tr>
                </thead>
                <tbody id="tbody-read">
                </tbody>
            </table>
            <button type="submit" class="btn waves-effect red"  id="btnProveedoresEliminado">Productos eliminados</button>
            <button type="submit" class="btn waves-effect green" onClick="showTable(1)" >Todos los productos</button>
    </div>       
    <div id="modal-create" class="modal">
        <div class="modal-content">
            <h4 class="center">Registro de compañia</h4>
            <div class="container">
                <form class="col s12" method="post" id="form-create" enctype="multipart/form-data">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                    <div class='row'>
                        <div class='input-field col s12 l6 m12'>
                            <input class='validate' type='text' name='create_nombre' id='create_nombre'/>
                            <label for='create_nombre'>Nombre del proveedor</label>
                        </div>


                        <div class='input-field col s12 l6 m12'>
                            <input class='validate' type='text' name='create_direccion' id='create_direccion' />
                            <label for='create_direccion'>Dirección</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12 l6 m12'>
                            <input class='validate' type='text' name='create_telefono' id='create_telefono' onkeypress="return validarTelefono(event)"/>
                            <label for='create_telefono'>Teléfono</label>
                        </div>
                        <div class="input-field col s12 l6 m12">
                            <input class='validate' type='email' name='create_correo' id='create_correo' />
                            <label for='create_correo'>Correo</label>
                        </div>
                    </div>
                    <!--Creacion del boton para registrar productos-->
                    <div class="row center">
                        <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar">
                            <i class="material-icons">cancel</i>
                        </a>
                        <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear">
                            <i class="material-icons">save</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modal-update" class="modal">
        <div class="modal-content">
            <h4 class="center">Modificacion de datos</h4>
            <div class="container">
                <form class="col s12" method="post" id="form-update" enctype="multipart/form-data">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                    <div class="row">
                        <div class='input-field col s12 l12 m12'>
                            <input class='validate' type='hidden' name='idProveedor' id='idProveedor' />
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12 l4 m12'>
                            <input class='validate' type='text' name='update_nombre' id='update_nombre' />
                            <label for='update_nombre'>Nombre del proveedor</label>
                        </div>
                        <div class='input-field col s12 l4 m12'>
                            <input class='validate' type='text' name='update_direccion' id='update_direccion' />
                            <label for='update_direccion'>Dirección</label>
                        </div>
                        <div class='input-field col s12 l4 m12'>
                            <input class='validate' type='text' name='update_telefono' id='update_telefono' />
                            <label for='update_telefono'>Teléfono</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="input-field col s12 l12 m12">
                            <input class='validate' type='email' name='update_correo' id='update_correo' />
                            <label for='update_correo'>Correo</label>
                        </div>
                    </div>
                    <div class="row center">
						<div class="switch">
							<label style="font-size:30px">
								<i class="material-icons">visibility_off</i>
								<input id="update_state" type="checkbox" name="update_state">
								<span class="lever"></span>
								<i class="material-icons">visibility</i>
							</label>
						</div>
					</div>
                    <!--Creacion del boton para registrar productos y para modificarlos-->
                    <div class="row center-align">
                        <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar">
                            <i class="material-icons">cancel</i>
                        </a>
                        <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar">
                            <i class="material-icons">update</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
       
    </div>
    <br>
    <br>        
    
    <?php
//llamada a la funcion footer en la clase dashboard
  dashboard::footer('companies.js', 'registryValidator.js');
  
?>
        
</body>
</html>