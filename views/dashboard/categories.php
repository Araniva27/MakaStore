<?php
//inclusion de header, navbar y envio del parametro
  include "../../core/helpers/dashboard.php";
  dashboard::header("Categorías");//Inclusion del header y envio del parametro titulo
  dashboard::navbar();//Inclusion del navbar en la pagina
?>
    <!--Creacion del contenedor donde esta la imagen del parallax-->
    <div class="container">
        <div class="card horizontal blue lighten-1">
            <div class="card-stacked">
                <div class="card-content">
                    <h5 class="center" style="color:white">Categorías</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row center">
            <a class="waves-effect waves-light btn green modal-trigger" href="#modalcate">Registrar categoría + </a>

        </div>
    </div>
    <!--Creacion del modal para registrar categorias-->
    <div id="modalcate" class="modal modalcate">
        <div class="modal-content">
            <h4 class="center">Registrar categoría</h4>
            <div class="container">
                <form class="col s12" method="post" id="form-create">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                    <div class='row'>
                        <div class='input-field col s12  m12'>
                            <input class='validate' type='text' name='create_nombreC' id='create_nombreC' onfocusout="validateNombre()"/>
                            <span class="helper-text"></span>
                            <label for='create_nombreC'>Nombre de la categoría</label>
                        </div>
                    </div>
                        <!--Creaacion del campo para añadir foto-->
                        <div class="file-field input-field col s12 m6">
                            <div class="btn waves-effect">
                                <span><i class="material-icons">image</i></span>
                                <input id="create_archivo" type="file" name="create_archivo" required onfocusout="validateImagen()"/>
                                <span class="helper-text"></span>
                            </div>
                            <div class="file-path-wrapper">
                                <input type="text" class="file-path validate" placeholder="Seleccione una imagen"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class='input-field col s12 l12 m12'>
                                <input class='validate' type='text' name='descripcion' id='descripcion' onfocusout="validateDescripcion()"/>
                                <span class="helper-text"></span>
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
            <!---Creacion de la tabla donde se encuentran las categorías registradas-->
            <table class="centered responsive-table" id="tabla-categorias">
                <div class="col">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Imagen</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th>Acciones</th>                           
                        </tr>
                    </thead>

                    <tbody id="tbody-read">
                       
                    </tbody>
                </div>
            </table>
        </div>
        <button type="submit" class="btn waves-effect red"  id="btnEliminados">Categorias eliminadas</button>
        <button type="submit" class="btn waves-effect green" onClick="showTable(1)" >Todas las categorias</button>
    </div>
    <!--creacion de modal para modificar-->
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
                        <input type="hidden" id="idCategoria" name="idCategoria"/>
                        <input type="hidden" id="imagen_categoria" name="imagen_categoria"/>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12 l12 m12'>
                            <input class='validate' type='text' name='update_categoria' id='update_categoria' onfocusout="validateNombreActualizado()"/>
                            <span class="helper-text"></span>
                            <label for='update_categoria'>Nombre de la categoría</label>
                        </div>
                    </div>
                    <div class='row'>

                        <!--Creaacion del campo para añadir foto-->
                        <div class="file-field input-field col s12 m12 l12">
                            <div class="btn waves-effect">
                                <span><i class="material-icons">image</i></span>
                                <input id="update_archivo" type="file" name="update_archivo"/>
                                <span class="helper-text"></span>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Seleccione una imagen"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class='input-field col s12 l12 m12'>
                                <input class='validate' type='text' name='update_descripcion' id='update_descripcion' onfocusout="validateDescripcionActualizada()"/>
                                <span class="helper-text"></span>
                                <label for='update_descripcion'>Descripción</label>
                            </div>

                        </div>

                        <div class="row center">

                            <!--Creacion del switch para seleccionar estado de la categoria visible o invisible-->
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
    </body>
    <?php
//llamada a la funcion footer en la clase dashboard
  dashboard::footer('categories.js','categoriesValidator.js');
?>

        </html>