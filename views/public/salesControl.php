<?php
//Inclusion del archivo public_pages.php
  include "../../core/helpers/public_pages.php";
  public_pages::header('Control de ventas');//Aplicacion del header y envio del parametro titulo  
?>

<div class="container">
    <div class="card horizontal blue lighten-1">
        <div class="card-stacked">
            <div class="card-content">
                <h5 class="center" style="color:white">Compras</h5>
                <a class="waves-effect waves-light btn blue" href="../../core/reports/public/comprobante.php">Reporte de productos por proveedor</a>            
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="container-fluid">
        <!---Creacion de la tabla donde se encuentran todos los productos registrados-->
        <table class="centered responsive-table" id="tabla-compras">
            <div class="col">
                <thead>
                    <tr>
                        <th>Numero de venta</th>
                        <th>Fecha</th>
                        <th>Estado</th>  
                        <th>Detalle de venta</th>                           
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
<?php 
     //Aplicacion del foooter
      public_pages::footer('sales.js');
     ?>
    <!--Inclusion scripts javascript para funcionalidad de paginas web-->
</body>
</html>