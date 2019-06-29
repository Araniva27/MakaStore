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
    <div class="row center">
        <a class="waves-effect waves-light btn blue" href="../../core/reports/dashboard/reporteVentas.php">Reporte de ventas</a>            
        <a class="waves-effect waves-light btn blue" href="../../core/reports/dashboard/reporteVentaProductos.php">Reporte de ventas por producto</a>            
        <a class="waves-effect waves-light btn blue" href="../../core/reports/dashboard/reportePedidos.php">Reporte de pedidos</a>            
    </div>
    <!--Creacion del container donde se encuentra una lista 
    desplegable y un date picker estos elementos para realizar busquedas con filtros-->
    <div class="container">
        <br>
       <!-- aqui -->

        <div class="container-fluid">
            <!---Creacion de la tabla donde se encuentran todas las ventas realizadas-->
            <table class="centered responsive-table"  id="tabla-ventas">
                <div class="col">
                    <thead>
                        <tr>
                            <!--Creacion de encabezado de la tabla-->
                            <th>Código</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>

                    <tbody id="tbody-read">
                    </tbody>
                </div>
            </table>

        </div>
    </div>
    <!--Modal para detalle de venta-->
    <div id="modalDetalle" class="modal">
        <div class="modal-content">

            <h4>Detalle de venta</h4>
            <table class="centered responsive-table" id="tabla-detalle">
                <div class="col">
                    <thead>
                        <tr>
                            <!--Creacion de encabezado de la tabla-->
                            <th>Codigo</th>   
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Precio Total ($)</th>
                        </tr>
                    </thead>
                    <!--Datos de la tabla-->
                    <tbody id="detalle">                                           
                    </tbody>
                    <div id="total">
                    </div>
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
  dashboard::footer('sales.js','productValidator.js');
?>

        </html>