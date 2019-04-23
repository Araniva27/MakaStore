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
                        <th>Numero de venta</th>
                        <th>Fecha</th>
                        <th>Detalle de venta</th>                           
                    </tr>
                </thead>
             <tbody id="tbody-read">
             </tbody>
            </div>
        </table>
    </div>
</div>
<?php 
     //Aplicacion del foooter
      public_pages::footer();
     ?>
    <!--Inclusion scripts javascript para funcionalidad de paginas web-->
</body>
</html>