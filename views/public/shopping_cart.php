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
                <div class="row">
                    <div class="card horizontal hoverable">
                        <!--Definicion de la tajeta horizontal-->
                        <div class="card-image">
                            <img src="../../resource/img/img-card/zelda.jpg">
                            <!--Imagen de la tarjeta-->
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <!--Contenido de la tarjeta-->
                                <strong>
                                    <h5>The Legend of Zelda Breath of the wild
                                        <strong>
                                    </h5>
                                    <strong>
                                        <h5>Cantidad: 2
                                            <strong>
                                        </h5>
                                        <strong>
                                            <h5>Precio Unitario($): $50.00
                                                <strong>
                                            </h5>
                                            <strong>
                                                <h5>Precio Total($): $100.00
                                                    <strong>
                                                </h5>


                            </div>


                        </div>
                    </div>
                    <div class="card horizontal hoverable">
                        <!--Definicion de la tajeta horizontal-->
                        <div class="card-image">
                            <img src="../../resource/img/img-card/switch.jpg">
                            <!--Imagen de la tarjeta-->
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <!--Contenido de la tarjeta-->
                                <strong>
                                    <h5>Nintendo Switch
                                        <strong>
                                    </h5>
                                    <strong>
                                        <h5>Cantidad: 1
                                            <strong>
                                        </h5>
                                        <strong>
                                            <h5>Precio Unitario($): $299.00
                                                <strong>
                                            </h5>
                                            <strong>
                                                <h5>Precio Total($): $299.00
                                                    <strong>
                                                </h5>

                            </div>
                        </div>
                    </div>
                    <div class="card horizontal hoverable">
                        <!--Definicion de la tajeta horizontal-->
                        <div class="card-image">
                            <img src="../../resource/img/img-card/ps4_1.png">
                            <!--Imagen de la tarjeta-->
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <!--Contenido de la tarjeta-->
                                <strong>
                                    <h5>Play Station 4
                                        <strong>
                                    </h5>
                                    <strong>
                                        <h5>Cantidad: 1
                                            <strong>
                                        </h5>
                                        <strong>
                                            <h5>Precio Unitario($): $175.00
                                                <strong>
                                            </h5>
                                            <strong>
                                                <h5>Precio Total($): $175.00
                                                    <strong>
                                                </h5>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l3">
            <div class="card light-blue darken-2 hoverable">
                <!--Definicion de la tajeta para pagar-->
                <div class="card-content white-text">
                    <!--Contenido de la tarjeta-->
                    <span class="card-title">MakaStore</span>
                    <h5>Total a pagar($): 524.99</h5>
                </div>
                <div class="card-action center">
                    <!--Boton para pagar-->
                    <button data-target="modalPa" class="btn waves-effect waves-light btn green modal-trigger" type="submit"
                        name="action">Pagar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



<!--Creacion del modal donde se encuentran los metodos de pago-->
<div id="modalPa" class="modal white">
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
                    </div>
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                    <div class='row'>
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
    
     
</div>



<!--Inclusion de archivos javascript-->
<script src="../../resource/js/jquery-3.3.1.min.js"></script>
<script src="../../resource/js/materialize.min.js"></script>
<script src="../../resource/js/initialization.js"></script>

</body>
<?php
//Aplicacion del footer
    public_pages::footer();
?>

</html>