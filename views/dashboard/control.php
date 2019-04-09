<?php
//instanciacion del documento dashboard
  include "../../core/helpers/dashboard.php";
  //llamada del metodo header y envio del parametro de Título
  dashboard::header("Controlador");
  //lamada del metodo navbar
  dashboard::navbar();
?>
    <!--Contenedor de tarjeta donde se encuentra el Título de la seccion-->
    <div class="container">
        <div class="card horizontal blue lighten-1">
            <div class="card-stacked">
                <div class="card-content">
                    <h5 class="center" style="color:white">Controlador slider</h5>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class='input-field col s12 l1 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='CódigoSlide1' />
                <label for='name'>Código</label>
            </div>
            <div class='input-field col s12 l5 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='Títuloslide1' />
                <label for='name'>Título</label>
            </div>
            <div class='input-field col s12 l3 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='Descripción1' />
                <label for='name'>Descripción</label>
            </div>
            <div class="file-field input-field col s12 l3 m12">
                <!--Definicion del tipo de campo a crear-->
                <div class="">
                    <span class="btn blue">Foto</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="row center">
                <a class="waves-effect waves-light btn green">
                    <i class="material-icons right">update</i>Actualizar</a>
            </div>
        </div>
        <div class="row">
            <div class='input-field col s12 l1 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='CódigoSlide2' />
                <label for='name'>Código</label>
            </div>
            <div class='input-field col s12 l5 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='Títuloslide2' />
                <label for='name'>Título</label>
            </div>
            <div class='input-field col s12 l3 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='Descripción2' />
                <label for='name'>Descripción</label>
            </div>
            <div class="file-field input-field col s12 l3 m12">
                <!--Definicion del tipo de campo a crear-->
                <div class="">
                    <span class="btn blue">Foto</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="row center">
                <a class="waves-effect waves-light btn green">
                    <i class="material-icons right">update</i>Actualizar</a>
            </div>
        </div>
        <div class="row">
            <div class='input-field col s12 l1 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='CódigoSlide' />
                <label for='name'>Código</label>
            </div>
            <div class='input-field col s12 l5 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='Títuloslide3' />
                <label for='name'>Título</label>
            </div>
            <div class='input-field col s12 l3 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='Descripción3' />
                <label for='name'>Descripción</label>
            </div>
            <div class="file-field input-field col s12 l3 m12">
                <!--Definicion del tipo de campo a crear-->
                <div class="">
                    <span class="btn blue">Foto</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="row center">
                <a class="waves-effect waves-light btn green">
                    <i class="material-icons right">update</i>Actualizar</a>
            </div>
        </div>
        <div class="row">
            <div class='input-field col s12 l1 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='CódigoSlide4' />
                <label for='name'>Código</label>
            </div>
            <div class='input-field col s12 l5 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='Títuloslide4' />
                <label for='name'>Título</label>
            </div>
            <div class='input-field col s12 l3 m12'>
                <!--Definicion del tipo de campo a crear-->
                <input class='validate' type='text' name='CódigoS' id='Descripción4' />
                <label for='name'>Descripción</label>
            </div>
            <div class="file-field input-field col s12 l3 m12">
                <!--Definicion del tipo de campo a crear-->
                <div class="">
                    <span class="btn blue">Foto</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="row center">
                <a class="waves-effect waves-light btn green">
                    <i class="material-icons right">update</i>Actualizar</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card horizontal blue lighten-1">
            <div class="card-stacked">
                <div class="card-content">
                    <h5 class="center" style="color:white">Controlador Novedades</h5>
                </div>
            </div>
        </div>
    </div>
    <!--Creacion de la tabla con las tajetas y sus opciones-->
    <div class="container">
        <table class="centered highlight ">
            <thead>
                <tr>
                    <!--Creacion de encabezado de la tabla-->
                    <th>Tarjeta</th>
                    <th>Producto</th>
                    <th>Acción</th>

                </tr>
            </thead>
            <!--Colocacion de datos que se mostraran en la tabla-->
            <tbody>
                <tr>
                    <td>Tarjeta 1/principal</td>
                    <td>Nintedo switch</td>
                    <!--Boton para seleccionar producto-->
                    <td>
                        <a class="btn green modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Seleccionar"
                            href="#modal1">
                            <i class="material-icons">check</i>
                        </a>
                    </td>



                </tr>
                <tr>
                    <td>Tajeta 2/principal</td>
                    <td>Zelda breath of the wild
                        <!--Boton para seleccionar producto-->
                        <td>
                            <a class="btn green modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Seleccionar"
                                href="#modal1">
                                <i class="material-icons">check</i>
                            </a>
                        </td>

                </tr>
                <tr>
                    <td>Tarjeta 3/Principal </td>
                    <td>Play Station4</td>
                    <!--Boton para seleccionar producto-->
                    <td>
                        <a class="btn green modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Seleccionar"
                            href="#modal1">
                            <i class="material-icons">check</i>
                        </a>
                    </td>


                </tr>
                <tr>
                    <td>Tarjeta 1/novedades</td>
                    <td>Persona 5</td>
                    <!--Boton para seleccionar producto-->
                    <td>
                        <a class="btn green modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Seleccionar"
                            href="#modal1">
                            <i class="material-icons">check</i>
                        </a>
                    </td>

                </tr>
                <tr>
                    <td>Tarjeta 2/novedades</td>
                    <td>Xbox One</td>
                    <!--Boton para seleccionar producto-->
                    <td>
                        <a class="btn green modal-trigger tooltipped " data-position="top" data-delay="50" data-tooltip="Seleccionar"
                            href="#modal1">
                            <i class="material-icons">check</i>
                        </a>
                    </td>

                </tr>
            </tbody>
        </table>

        <!--Creacion del modal con los productos registrados-->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Seleccionar producto</h4>
                <table class="centered responsive-table">

                    <div class="nav-wrapper">
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
                    <div class="row center">
                        <a class="waves-effect waves-light btn blue">
                            <i class="material-icons right">search</i>Buscar</a>
                    </div>
                    <div class="col">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Compañia</th>

                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nintendo Switch</td>
                                <td>$259.99</td>
                                <td>Consola de videojuegos desarrollado por Nintendo</td>
                                <td>Nintendo</td>


                                <!--Colocacion del boton para seleccionar productos-->
                                <td>
                                    <a class="waves-effect waves-light btn green">
                                        <i class="material-icons center">check</i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Play Station 4</td>
                                <td>$259.99</td>
                                <td>Consola de videojuegos desarrollado por Sony</td>
                                <td>Sony</td>


                                <!--Colocacion del boton para seleccionar productos-->
                                <td>
                                    <a class="waves-effect waves-light btn green">
                                        <i class="material-icons center">check</i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Persona 5</td>
                                <td>$50.00</td>
                                <td>Videojuego RPG desarrollado por Atlus</td>
                                <td>Atlus</td>


                                <!--Colocacion del boton para seleccionar productos-->
                                <td>
                                    <a class="waves-effect waves-light btn green">
                                        <i class="material-icons center">check</i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Persona 4</td>
                                <td>$30.00</td>
                                <td>Videojuego RPG desarrollado por Atlus</td>
                                <td>Atlus</td>


                                <!--Colocacion del boton para seleccionar productos-->
                                <td>
                                    <a class="waves-effect waves-light btn green">
                                        <i class="material-icons center">check</i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Persona Q</td>
                                <td>$25.00</td>
                                <td>Videojuego RPG desarrollado por Atlus</td>
                                <td>Atlus</td>


                                <!--Colocacion del boton para seleccionar productos-->
                                <td>
                                    <a class="waves-effect waves-light btn green">
                                        <i class="material-icons center">check</i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </div>
                </table>
            </div>
            <!--Boton para cerrar modal-->
            <div class="modal-footer">

                <a href="#" class="btn blue modal-close">Aceptar</a>
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