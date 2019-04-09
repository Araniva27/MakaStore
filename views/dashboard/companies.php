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
    </div>
    <div class="row center">
        <a class="waves-effect waves-light btn green modal-trigger" href="#modal-create">Registrar compañia + </a>
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
                            <input class='validate' type='text' name='create_direccion' id='create_direccion'/>
                            <label for='create_direccion'>Dirección</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12 l6 m12'>
                            <input class='validate' type='text' name='create_telefono' id='create_telefono'/>
                            <label for='create_telefono'>Teléfono</label>
                        </div>
                        <div class="input-field col s12 l6 m12">
                            <input class='validate' type='email' name='create_correo' id='create_correo'/>
                            <label for='create_correo'>Correo</label>
                        </div>
                    </div>
                    <!--Creacion del boton para registrar productos-->
                    <div class="row center">
                        <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                        <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i class="material-icons">save</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Creacion del container donde se encuentra la barra busqueda-->
    <div class="container">
        <nav>
            <!--Creacion de la barra de busqueda de compañias-->
            <form method="post" id="form-search">
                <div class="nav-wrapper blue">
                    <div class="input-field">
                        <input id="buscar" type="search" name="busqueda" >
                        <label class="label-icon" for="buscar">
                            <i class="material-icons">search</i>
                        </label>
                        <i class="material-icons">close</i>
                    </div>
                    <div class="row center">
                        <div class="input-field offset col s12 m12 l12">
                            <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Buscar" id="busqueda">Buscar</button>
                        </div>
                    </div>
                </div>                    
            </form>
        </nav>
        </div>
        <div class="container">
            <!---Creacion de la tabla donde se encuentran todos los productos registrados-->
            <table class="centered">
                <div class="col">
                    <thead>
                        <tr>
                            <!--Creacion del encabezado de las tablas-->
                            <th>Código</th>
                            <th>Compañía</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Eliminar</th>
                            <th>Actualizar</th>
                        </tr>
                    </thead>

                    <tbody id="tbody-read">                    
                    </tbody>
                </div>
            </table>
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
                            <div class='row'>
                                <div class='input-field col s12 l3 m12'>
                                    <input class='validate' type='text' name='idProveedor' id='idProveedor' />
                                    <label for='idProveedor'>Código</label>
                                </div>
                                <div class='input-field col s12 l4 m12'>
                                    <input class='validate' type='text' name='update_nombre' id='update_nombre' />
                                    <label for='update_nombre'>Nombre del proveedor</label>
                                </div>


                                <div class='input-field col s12 l4 m12'>
                                    <input class='validate' type='text' name='update_direccion' id='update_direccion' />
                                    <label for='update_direccion'>Dirección</label>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='input-field col s12 l6 m12'>
                                    <input class='validate' type='text' name='update_telefono' id='update_telefono' />
                                    <label for='update_telefono'>Teléfono</label>
                                </div>
                                <div class="input-field col s12 l6 m12">
                                    <input class='validate' type='email' name='update_correo' id='update_correo' />
                                    <label for='update_correo'>Correo</label>
                                </div>
                            </div>
                            <!--Creacion del boton para registrar productos y para modificarlos-->
                            <div class="row center-align">
                                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar"><i class="material-icons">update</i></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <br>
    <!--Inclusion de scrip javascript para la inicializacion y uso de diversos elementos-->
    <script src="../../resource/js/jquery-3.3.1.min.js"></script>
    <script src="../../resource/js/materialize.min.js"></script>
    <script src="../../resource/js/initialization.js"></script>
    <script type="text/javascript" src="../../resource/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../core/helpers/functions.js"></script>
    <script type="text/javascript" src="../../core/controllers/companies.js"></script>
    </body>
    <?php
//llamada a la funcion footer en la clase dashboard
  dashboard::footer();
  
?>

        </html>