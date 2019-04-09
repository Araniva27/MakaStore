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
    <div class="conta">
        <div class="row center">
            <a class="waves-effect waves-light btn green modal-trigger" href="#modalprod">Registrar producto + </a>

        </div>
    </div>
    <!--Creacion del modal para registrar productos-->
    <div id="modalprod" class="modal modalprod">
        <div class="modal-content">
            <h4 class="center">Registrar producto</h4>
            <div class="container">
                <form class="col s12" method="post">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                    <div class='row'>
                        <div class='input-field col s12 l6 m6'>
                            <input class='validate' type='text' name='producto' id='Nproducto' />
                            <label for='name'>Nombre del producto</label>
                        </div>


                        <div class='input-field col s12 l6 m6'>
                            <input class='validate' type='text' name='precio' id='precio' />
                            <label for='name'>Precio</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12 l6 m12'>
                            <input class='validate' type='number' name='cantidad' id='cantidad' />
                            <label for='username'>Cantidad</label>
                        </div>
                        <div class="input-field col s12 l6 m12">
                            <!--Creacion de la lista desplegable de categorias-->
                            <select class="browser-default">
                                <option value="" disabled selected>Categoría</option>
                                <option value="1">Consolas</option>
                                <option value="2">Videojuegos</option>

                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12 l6 m12'>
                            <!--Creacion de la lista desplegable de categorias-->
                            <select class="browser-default">
                                <option value="" disabled selected>Proveedor</option>
                                <option value="1">Nintendo</option>
                                <option value="2">Sony</option>
                                <option value="2">Microsoft</option>

                            </select>
                        </div>

                        <!--Creaacion del campo para añadir foto-->
                        <div class="file-field input-field col s12 l6 m6">
                            <div class="">
                                <span class="btn blue">Foto</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
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
                                        Invisible
                                        <input type="checkbox">
                                        <span class="lever"></span>
                                        Visible
                                    </label>
                                </div>
                            </div>

                        </div>
                </form>
                </div>
            </div>

        </div>
        <!--Creacion del container donde se ubica el formulario e ingreso de productos-->

        <!--Creacion del boton para registrar productos y para modificarlos-->
        <div class="row center">
            <a class="waves-effect waves-light btn green">
                <i class="material-icons right">done</i>Registrar</a>

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

        <div class="container-fluid">
            <!---Creacion de la tabla donde se encuentran todos los productos registrados-->
            <table class="centered responsive-table">
                <div class="col">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Categoría</th>
                            <th>Compañía</th>
                            <th>Descripción</th>
                            <th>Eliminar</th>
                            <th>Comentario</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nintendo Switch</td>
                            <td>$259.99</td>
                            <td>750</td>
                            <td>Consolas</td>
                            <td>Nintendo</td>
                            <td>Consola de videojuegos desarrollado por Nintendo</td>

                            <!--Colocacion del boton para eliminar productos-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped red" data-position="top" data-delay="50" data-tooltip="Eliminar">
                                    <i class="material-icons center">close</i>
                                </a>
                            </td>
                            <!--Boton para mostrar modal con los comentarios del producto elegido-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped orange modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Comentarios" href="#modalP">
                                    <i class="material-icons center">list</i>
                                </a>
                            </td>
                            <!--Boton para abrir modal donde se modifican los datos-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Modificar" href="#modalM">
                                    <i class="material-icons center">update</i>
                                </a>
                            </td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Play Station 4</td>
                            <td>$150.00</td>
                            <td>500</td>
                            <td>Consolas</td>
                            <td>Sony</td>
                            <td>Consola de videojuegos desarrollado por Sony</td>

                            <!--Colocacion del boton para eliminar productos-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped red" data-position="top" data-delay="50" data-tooltip="Eliminar">
                                    <i class="material-icons center">close</i>
                                </a>
                            </td>
                            <!--Boton para mostrar modal con los comentarios del producto elegido-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped orange modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Comentarios" href="#modalP">
                                    <i class="material-icons center">list</i>
                                </a>
                            </td>
                            <!--Boton para abrir modal donde se modifican los datos-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Modificar" href="#modalM">
                                    <i class="material-icons center">update</i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Xbox one</td>
                            <td>$250.00</td>
                            <td>374</td>
                            <td>Consolas</td>
                            <td>Microsoft</td>
                            <td>Consola de videojuegos desarrollado por Microsoft</td>

                            <!--Colocacion del boton para eliminar productos-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped red" data-position="top" data-delay="50" data-tooltip="Eliminar">
                                    <i class="material-icons center">close</i>
                                </a>
                            </td>
                            <!--Boton para mostrar modal con los comentarios del producto elegido-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped orange modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Comentarios" href="#modalP">
                                    <i class="material-icons center">list</i>
                                </a>
                            </td>
                            <!--Boton para abrir modal donde se modifican los datos-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Modificar" href="#modalM">
                                    <i class="material-icons center">update</i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Zelda Breath of the wild</td>
                            <td>$59.00</td>
                            <td>147</td>
                            <td>VIdeojuegos</td>
                            <td>Nintendo</td>
                            <td>Ultimo juego de Zelda lanzado</td>

                            <!--Colocacion del boton para eliminar productos-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped red" data-position="top" data-delay="50" data-tooltip="Eliminar">
                                    <i class="material-icons center">close</i>
                                </a>
                            </td>
                            <!--Boton para mostrar modal con los comentarios del producto elegido-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped orange modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Comentarios" href="#modalP">
                                    <i class="material-icons center">list</i>
                                </a>
                            </td>
                            <!--Boton para abrir modal donde se modifican los datos-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Modificar" href="#modalM">
                                    <i class="material-icons center">update</i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Persona 5</td>
                            <td>$59.00</td>
                            <td>85</td>
                            <td>VIdeojuegos</td>
                            <td>Atlus</td>
                            <td>Uno de los mejores RPG de la decada</td>

                            <!--Colocacion del boton para eliminar productos-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped red" data-position="top" data-delay="50" data-tooltip="Eliminar">
                                    <i class="material-icons center">close</i>
                                </a>
                            </td>
                            <!--Boton para mostrar modal con los comentarios del producto elegido-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped orange modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Comentarios" href="#modalP">
                                    <i class="material-icons center">list</i>
                                </a>
                            </td>
                            <!--Boton para abrir modal donde se modifican los datos-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Modificar" href="#modalM">
                                    <i class="material-icons center">update</i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </div>
            </table>
        </div>
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
                <form class="col s12" method="post">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                    <div class='row'>
                        <div class='input-field col s12 l6 m6'>
                            <input class='validate' type='text' name='producto' id='Nproducto' />
                            <label for='name'>Nombre del producto</label>
                        </div>


                        <div class='input-field col s12 l6 m6'>
                            <input class='validate' type='text' name='precio' id='precio' />
                            <label for='name'>Precio</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12 l6 m12'>
                            <!--Creacion de la lista desplegable de categorias-->
                            <select class="browser-default">
                                <option value="" disabled selected>Proveedor</option>
                                <option value="1">Nintendo</option>
                                <option value="2">Sony</option>
                                <option value="2">Microsoft</option>

                            </select>
                        </div>

                        <div class="input-field col s12 l6 m12">
                            <!--Creacion de la lista desplegable de categorias-->
                            <select class="browser-default">
                                <option value="" disabled selected>Categoría</option>
                                <option value="1">Consolas</option>
                                <option value="2">Videojuegos</option>

                            </select>
                        </div>
                    </div>
                    <div class='row'>

                        <!--Creaacion del campo para añadir foto-->
                        <div class="file-field input-field col s12 l12 m12">
                            <div class="">
                                <span class="btn blue">Foto</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class='input-field col s12 l12 m12'>
                                <input class='validate' type='text' name='descripcion' id='descripcion' />
                                <label for='descripcion'>Descripción</label>
                            </div>

                        </div>

                        <div class="row center">

                            <!--Creacion del switch para seleccionar estado del producto visible o invisible-->
                            <div class="switch">

                                <label style="font-size:25px">
                                    <h5 class="black-text">Estado:</h5>
                                    Invisible
                                    <input type="checkbox">
                                    <span class="lever"></span>
                                    Visible
                                </label>
                            </div>

                        </div>
                </form>
                <br>
                <br>
                <div class="card-action">
                    <div class="row center">
                        <!--Boton para modificar datos-->
                        <a class="waves-effect waves-light btn grey">
                            <i class="material-icons right">update</i>Modificar</a>
                    </div>
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
    </body>
    <?php
//llamada a la funcion footer en la clase dashboard
  dashboard::footer();
?>

        </html>