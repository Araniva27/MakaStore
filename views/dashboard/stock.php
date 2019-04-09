<?php
//inclusion de header, navbar y envio del parametro titulo
  include "../../core/helpers/dashboard.php";
  dashboard::header("Reabastecimiento de productos");//Aplicacion del metodo header y envio del parametro titulo
  dashboard::navbar();//aplicacion del navbar a la pagina 
?>
    <!--Contenedor con el titulo de la pagina-->

    <div class="container">
        <div class="card-panel blue">
            <div class="jumbotron" id="tagline">
                <h3 class="white-text center">Reabastecimiento de productos</h3>

            </div>
        </div>

    </div>
    <!--Creacion del container donde se encuentra la barra busqueda-->
    <div class="container">
        <nav>
            <!--Creacion de la barra de busqueda de compañias-->
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
        </nav>
    </div>
    <br>
    <!--Creacion del boton de busqueda-->
    <div class="row center">
        <a class="waves-effect waves-light btn blue">
            <i class="material-icons right">search</i>Buscar</a>
    </div>
    <br>
    <div class="container">
        <!---Creacion de la tabla donde se encuentran todos los productos registrados-->
        <table class="centered responsive-table">

            <thead>
                <tr>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoría</th>
                    <th>Compañía</th>
                    <th>Descripción</th>
                    <th>Agregar existencia</th>

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
                    <!--Boton para abrir modal donde se modifican los datos-->
                    <td>
                        <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                            data-tooltip="Agregar" href="#modalE">
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


                    <!--Boton para abrir modal donde se modifican los datos-->
                    <td>
                        <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                            data-tooltip="Agregar" href="#modalE">
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
                    <!--Boton para abrir modal donde se modifican los datos-->
                    <td>
                        <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                            data-tooltip="Agregar" href="#modalE">
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


                    <!--Boton para abrir modal donde se modifican los datos-->
                    <td>
                        <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                            data-tooltip="Agregar" href="#modalE">
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
                    <!--Boton para abrir modal donde se modifican los datos-->
                    <td>
                        <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                            data-tooltip="Agregar" href="#modalE">
                            <i class="material-icons center">update</i>
                        </a>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
    <!--Modal para agregar stock a los productos-->
    <div id="modalE" class="modal">
        <div class="modal-content">
            <h4 class="center">Agregar exitencia</h4>
            <br>
            <div class="row">
                <div class="input-field col s12 l6 m12 offset-l3">
                    <i class="material-icons prefix">add</i>
                    <input id="cantidadP" type="number" class="validate">
                    <label for="cantidadP">Cantidad</label>
                </div>
            </div>
            <div class="row center">
                <a href="#" class="btn green">Agregar +</a>
            </div>
        </div>

    </div>
    <!--Inclusion de scrip javascript para la inicializacion y uso de diversos elementos-->
    <script src="../../resource/js/jquery-3.3.1.min.js"></script>
    <script src="../../resource/js/materialize.min.js"></script>
    <script src="../../resource/js/initialization.js"></script>
    </body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
//llamada a la funcion footer en la clase dashboard
  dashboard::footer();
?>

        </html>