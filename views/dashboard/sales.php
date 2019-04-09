<?php
//instanciacion del documento dashboard
  include "../../core/helpers/dashboard.php";
  //llamada del metodo header y envio del parametro de titulo
  dashboard::header("Ventas");
  //lamada del metodo navbar
  dashboard::navbar();
?>
    <!--Contenedor con el titulo de la pagina-->

    <div class="container">
        <div class="card-panel blue">
            <div class="jumbotron" id="tagline">
                <h3 class="white-text center">Ventas</h3>

            </div>
        </div>

    </div>
    <!--Creacion del container donde se encuentra una lista 
    desplegable y un date picker estos elementos para realizar busquedas con filtros-->
    <div class="container">
        <br>
        <div class='input-field col s12 l6 m12'>
            <h5 class="center"> Estado de venta:</h5>
            <select class="">
                <option value="" disabled selected>Estado de venta</option>
                <option value="1">Entregada</option>
                <option value="2">Pendiente de entrega</option>
            </select>
            <div class="row center">
                <a class="waves-effect waves-light btn blue centered">
                    <i class="material-icons right">search</i>Buscar</a>
            </div>
        </div>
        <br>
        <br>
        <div class="row center">
            <h5>Fecha</h5>
            <div class="col l6 offset-l3">
                <input type="text" class="datepicker center">
                <a class="waves-effect waves-light btn blue centered">
                    <i class="material-icons right">search</i>Buscar</a>
                <br>
                <br>
                <a class="waves-effect waves-light btn blue centered">
                    <i class="material-icons right">bookmark</i>Mostrar todo</a>
            </div>

        </div>


        <div class="container-fluid">
            <!---Creacion de la tabla donde se encuentran todas las ventas realizadas-->
            <table class="centered responsive-table">
                <div class="col">
                    <thead>
                        <tr>
                            <!--Creacion de encabezado de la tabla-->
                            <th>Código</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Total</th>


                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Manuel Araniva</td>
                            <td>16/2/2018</td>
                            <td>Pendiente de entrega</td>
                            <td>$299.00</td>
                            <!--Boton para actualizar estado de venta-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Actualizar estado" href="#modal1">
                                    <i class="material-icons center">update</i>
                                </a>
                            </td>
                            <!--Boton para ver detalle de la venta-->
                            <td>
                                <a class="waves-effect waves-light btn tooltipped blue modal-trigger" data-position="top" data-delay="50"
                                    data-tooltip="Detalle de venta" href="#modal2">
                                    <i class="material-icons center">list</i>
                                </a>
                            </td>

                            <tr>
                                <td>2</td>
                                <td>Alejandro Perez</td>
                                <td>15/2/2018</td>
                                <td>Pendiente de entrega</td>
                                <td>$299.00</td>
                                <!--Boton para actualizar estado de venta-->
                                <td>
                                    <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top"
                                        data-delay="50" data-tooltip="Actualizar estado" href="#modal1">
                                        <i class="material-icons center">update</i>
                                    </a>
                                </td>
                                <!--Boton para ver detalle de la venta-->
                                <td>
                                    <a class="waves-effect waves-light btn tooltipped blue modal-trigger" data-position="top"
                                        data-delay="50" data-tooltip="Detalle de venta" href="#modal2">
                                        <i class="material-icons center">list</i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Claudia Iraheta</td>
                                <td>16/2/2018</td>
                                <td>Entregada</td>
                                <td>$299.00</td>
                                <!--Boton para actualizar estado de venta-->
                                <td>
                                    <a class="waves-effect waves-light btn tooltipped grey modal-trigger" data-position="top"
                                        data-delay="50" data-tooltip="Actualizar estado" href="#modal1">
                                        <i class="material-icons center">update</i>
                                    </a>
                                </td>
                                <!--Boton para ver detalle de la venta-->
                                <td>
                                    <a class="waves-effect waves-light btn tooltipped blue modal-trigger" data-position="top"
                                        data-delay="50" data-tooltip="Detalle de venta" href="#modal2">
                                        <i class="material-icons center">list</i>
                                    </a>
                                </td>

                            </tr>

                    </tbody>
                </div>
            </table>

        </div>
    </div>
    <!--Modal para detalle de venta-->
    <div id="modal2" class="modal">
        <div class="modal-content">

            <h4>Detalle de venta</h4>
            <table class="centered responsive-table">
                <div class="col">
                    <thead>
                        <tr>
                            <!--Creacion de encabezado de la tabla-->

                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Precio Total</th>

                        </tr>
                    </thead>
                    <!--Datos de la tabla-->
                    <tbody>
                        <tr>
                            <td>Nintendo Switch</td>
                            <td>1</td>
                            <td>$299.99</td>
                            <td>$299.99</td>
                        </tr>
                        <tr>
                            <td>Zelda breath of the wild</td>
                            <td>2</td>
                            <td>$50.00</td>
                            <td>$100.00</td>
                        </tr>
                        <tr>
                            <td>Persona 5</td>
                            <td>1</td>
                            <td>$30.00</td>
                            <td>$30.00</td>
                        </tr>
                    </tbody>
                </div>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn red modal-close">Cerrar</a>
        </div>
    </div>
    <!--Creacion del modal para realizar la actualizacion del estado de la venta-->
    <div id="modal1" class="modal">
        <div class="modal-content">

            <h4>Actualizacion de estado</h4>
            <input class='validate' type='text' name='venta' id='idventa' />
            <label for='name'>Código venta</label>
            <h5 class="center"> Estado de venta:</h5>
            <select class="">
                <option value="" disabled selected>Estado de venta</option>
                <option value="1">Entregada</option>
                <option value="2">Pendiente de entrega</option>
            </select>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn green modal-close">Actualizar</a>
        </div>
    </div>
    <!--Inclusion de scrip javascript para la inicializacion y uso de diversos elementos-->
    <script src="../../resource/js/jquery-3.3.1.min.js"></script>
    <script src="../../resource/js/materialize.min.js"></script>
    <script src="../../resource/js/initialization.js"></script>
    </body>
    <br>
    <br>
    <?php
//llamada a la funcion footer en la clase dashboard
  dashboard::footer();
?>

        </html>