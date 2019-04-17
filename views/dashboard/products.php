<?php
//inclusion de header, navbar y envio del parametro
  include "../../core/helpers/dashboard.php";
  dashboard::header("Productos");//Inclusion del header y envio del parametro titulo
  dashboard::navbar();//Inclusion del navbar en la pagina
?>
    <!--Creacion del contenedor donde esta la imagen del parallax-->
    <div class="container">
        <div class="card horizontal blue lighten-1">
            <div class="card-stacked">
                <div class="card-content">
                    <h5 class="center" style="color:white">Productos</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row center">
            <a class="waves-effect waves-light btn green modal-trigger" href="#modalprod">Registrar producto + </a>

        </div>
    </div>
    <!--Creacion del modal para registrar productos-->
    <div id="modalprod" class="modal modalprod">
        <div class="modal-content">
            <h4 class="center">Registrar producto</h4>
            <div class="container">
                <form class="col s12" method="post" id="form-create">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                    <div class='row'>
                        <div class='input-field col s12 l6 m6'>
                            <input class='validate' type='text' name='create_nombreP' id='create_nombreP' />
                            <label for='create_nombreP'>Nombre del producto</label>
                        </div>


                        <div class='input-field col s12 l6 m6'>
                            <input class='validate' type='number' min="0.01" max="999.99" step="any" name='create_precioP' id='create_precioP' />
                            <label for='create_precioP'>Precio</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12 l6 m12'>
                            <input class='validate' type='number' name='create_cantidadP' id='create_cantidadP' />
                            <label for='create_cantidadP'>Cantidad</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <select id="create_proveedor" name="create_proveedor">
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                    <div class="input-field col s12 m6">
                        <select id="create_categoria" name="create_categoria">
                        </select>
                    </div>

                        <!--Creaacion del campo para añadir foto-->
                        <div class="file-field input-field col s12 m6">
                            <div class="btn waves-effect">
                                <span><i class="material-icons">image</i></span>
                                <input id="create_archivo" type="file" name="create_archivo" required/>
                            </div>
                            <div class="file-path-wrapper">
                                <input type="text" class="file-path validate" placeholder="Seleccione una imagen"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class='input-field col s12 l12 m12'>
                                <input class='validate' type='text' name='descripcion' id='descripcion' />
                                <label for='descripcion'>Descripción</label>
                            </div>
                            <!--Creacion del switch para seleccionar estado del producto visible o invisible-->
                            <div class="row center">
                                <div class="switch">
                                    <label style="font-size:25px">
                                        <h5 class="black-text">Estado:</h5>
                                        <i class="material-icons">visibility_off</i>
                                        <input type="checkbox" name="create_estado" id="create_estado">
                                        <span class="lever"></span>
                                        <i class="material-icons">visibility</i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Crear"><i class="material-icons">check</i></button>
                        </div>
                </form>
                </div>
            </div>

        </div>        
    </div>
    
    <div class="container">
        <div class="container-fluid">
            <!---Creacion de la tabla donde se encuentran todos los productos registrados-->
            <table class="centered responsive-table" id="tabla-productos">
                <div class="col">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>                            
                            <th>Compañía</th>
                            <th>Estado</th>
                            <th>Eliminar</th>
                            <th>Comentario</th>
                            <th>Modificar</th>
                            <th>Reabastecimiento</th>
                        </tr>
                    </thead>

                    <tbody id="tbody-read">
                       
                    </tbody>
                </div>
            </table>
        </div>
    </div>
    <div id="modalP" class="modal modals">
        <div class="modal-content">
            <h4>Comentarios</h4>

            <div class="card white">
                <div class="card-content white-text hoverable">
                    <span class="card-title blue-text">Manuel Araniva</span>
                    <p class="black-text">
                        <strong class="blue-text">Comentario:</strong> Una muy buena consola híbrida con magníficos juegos para poder disfutar en ella,
                        elaborada con muy buenos materiales y un muy buen diseño, aunque una de sus mas grandes carencias
                        es la poca potencia en comparación a las demas consolas de la competencia </p>
                    <p class="black-text">
                        <strong class="blue-text">Calificación:</strong> 4</p>
                </div>

            </div>
            <div class="card white">
                <div class="card-content white-text hoverable">
                    <span class="card-title blue-text">Rolin Salas</span>
                    <p class="black-text">
                        <strong class="blue-text">Comentario:</strong> Una excelente consola con un buen catalogo de juegos y un buen precio de venta,
                        aunque accesorios muy caros</p>
                    <p class="black-text">
                        <strong class="blue-text">Calificación:</strong> 4</p>
                </div>

            </div>
            <div class="card white">
                <div class="card-content white-text hoverable">
                    <span class="card-title blue-text">Gabriela Perez</span>
                    <p class="black-text">
                        <strong class="blue-text">Comentario:</strong> Una consola elaborada con muy buenos materiales con grandes juegos, aunque con
                        una plataforma online mejorable </p>
                    <p class="black-text">
                        <strong class="blue-text">Calificación:</strong> 4</p>
                </div>

            </div>

        </div>
        <!--Boton para cerrar modal-->
        <div class="modal-footer">

            <a href="#" class="btn blue modal-close">Cerrar</a>
        </div>
    </div>
    <div id="modalM" class="modal modalsM">
        <div class="modal-content">
            <h4 class="center">Modificar Datos</h4>
            <div class="container">
                <form class="col s12" method="post" id="form-update" enctype="multipart/form-data">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                    <div class="row">
                        <input type="hidden" id="idProducto" name="idProducto"/>
                        <input type="hidden" id="imagen_producto" name="imagen_producto"/>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12 l6 m6'>
                            <input class='validate' type='text' name='update_producto' id='update_producto' />
                            <label for='update_producto'>Nombre del producto</label>
                        </div>


                        <div class='input-field col s12 l6 m6'>
                            <input class='validate' type='number' min="0.01" max="999.99" step="any" name='update_precio' id='update_precio' />
                            <label for='update_precio'>Precio</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12 l6 m12'>
                            <!--Creacion de la lista desplegable de categorias-->
                            <select id="update_proveedor" name="update_proveedor">
                            </select>
                        </div>

                        <div class="input-field col s12 l6 m12">
                            <!--Creacion de la lista desplegable de categorias-->
                            <select id="update_categoria" name="update_categoria">
                            </select>
                        </div>
                    </div>
                    <div class='row'>

                        <!--Creaacion del campo para añadir foto-->
                        <div class="file-field input-field col s12 m12 l12">
                            <div class="btn waves-effect">
                                <span><i class="material-icons">image</i></span>
                                <input id="update_archivo" type="file" name="update_archivo"/>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Seleccione una imagen"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class='input-field col s12 l12 m12'>
                                <input class='validate' type='text' name='update_descripcion' id='update_descripcion' />
                                <label for='update_descripcion'>Descripción</label>
                            </div>

                        </div>

                        <div class="row center">

                            <!--Creacion del switch para seleccionar estado del producto visible o invisible-->
                            <div class="switch">

                                <label style="font-size:25px">
                                    <h5 class="black-text">Estado:</h5>
                                    <i class="material-icons">visibility_off</i>
                                    <input type="checkbox" id="update_estado" type="checkbox" name="update_estado">
                                    <span class="lever"></span>
                                    <i class="material-icons">visibility</i>
                                </label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Modificar"><i class="material-icons">update</i></button>
                        </div>
                    </div>    
                </form>
                <br>
                <br> 
                </div>

            </div>
        </div>
    </div>
    <div id="modalE" class="modal">
        <div class="modal-content">
            <h4 class="center">Agregar exitencia</h4>
            <br>
            <form class="col s12" method="post" id="form-cantidad" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" id="idProductoC" name="idProductoC"/>
                    <input type="hidden" id="cantidadS" name="cantidadS"/>
                    <div class="input-field col s12 l6 m12 offset-l3">
                        <i class="material-icons prefix">add</i>
                        <input id="cantidadP" name="cantidadP" type="number" class="validate">
                        <label for="cantidadP">Cantidad</label>
                    </div>
                </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Agregar"><i class="material-icons">check</i></button>
                </div>
            </form>
        </div>
    </div>

    <br>
    <br>
    <br>
    <!--Inclusion de scrip javascript para la inicializacion y uso de diversos elementos-->
    
    </body>
    <?php
//llamada a la funcion footer en la clase dashboard
  dashboard::footer('products.js');
?>

        </html>