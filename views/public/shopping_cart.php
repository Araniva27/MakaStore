<?php
//Inclusion del archivo public_pages.php
    include "../../core/helpers/public_pages.php";
    public_pages::header('Carrito de compras');//Aplicacion del header y envio del parametro titulo
    
?>

<br>
<br>
<!--Titulo y subtitulo-->
<h5 class="center">Carrito de compras</h5>
<h5 class="center">Productos</h5>
<!--Contenedor con los las tajetas de los productos -->
<div class="container">
    <div class="row">        
        <div class="col s12 m12 l9">
            <!--Columna donde se encuentra la tajeta-->
            <div class="container-fluid">
                <div id="detalleVenta">
                </div>               
            </div>
        </div>
        <div id="total"></div>
        
    </div>
    
</div>

                


<!--Creacion del modal donde se encuentran los metodos de pago-->
<!-- <div id="modalPa" class="modal white">
    <div class="modal-content">
        <h4 class="center">Pago</h4>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3 l12"><a href="#test12" class="active">Tarjeta</a></li>
                    

                </ul>
            </div>
            <div id="test12" class="col s12">
            <form class="col s12" method="post">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div> -->
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                  <!--   <div class='row'>
                        <div class='input-field col s12 l6 m6'>
                            <input class='validate' type='text' name='numeroTarjeta' id='numeroTarjeta' />
                            <label for='numeroT'>Numero de tarjeta</label>
                        </div>


                        <div class='input-field col s12 l6 m6'>
                            <input class='validate' type='text' name='precio' id='precio' />
                            <label for='name'>CVV</label>
                        </div>
                    </div>
                    <div class="row center">
                        <a href="#!" class="class btn green  waves-effect waves-green"><i class="material-icons right">check</i>Aceptar</a>
                    </div>    
                </form>
                </div>
            
            

        </div>
    </div>
     -->
     
<!-- </div> -->


<div id="modalCantidad" class="modal">
        <div class="modal-content">
            <h4 class="center">Agregar producto</h4>
            <br>
            <form class="col s12" method="post" id="form-cantidadC" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" id="idPre" name="idPre"/>
                    <input type="hidden" id="cantidadPro" name="cantidadPro"/>
                    <div class="input-field col s12 l6 m12 offset-l3">
                        <i class="material-icons prefix">add</i>
                        <input id="cantidadPre" name="cantidadPre" type="number" class="validate">
                        <label for="cantidadPre">Cantidad</label>
                    </div>
                </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Agregar"><i class="material-icons">check</i></button>
                </div>
            </form>
        </div>
    </div>
<!--Modal para asignar el tipo de pago-->
<div id="pagar" class="modal">
    <div class="modal-content">
        <h4>Realizar Compra</h4>
        <form method='post' id="crearFactura">            
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i
                        class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Aceptar"><i
                        class="material-icons">check</i></button>
            </div>
        </form>
    </div>
</div>





<!--Inclusion de archivos javascript-->
<script src="../../resource/js/jquery-3.3.1.min.js"></script>
<script src="../../resource/js/materialize.min.js"></script>
<script src="../../resource/js/initialization.js"></script>
<script src="../../core/controllers/public/shoppingCart.js"></script>

</body>
<?php
//Aplicacion del footer
    public_pages::footer('catalogue.js');
?>

</html>