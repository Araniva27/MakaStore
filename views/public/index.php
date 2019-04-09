<?php
//Inclusion del archivo public_pages.php
  include "../../core/helpers/public_pages.php";
  public_pages::header('Inicio');//Aplicacion del header y envio del parametro titulo
  
?>
    <!--Creacion de  slider-->
    <div class="slider">
        <ul class="slides">
            <li class="light-blue darken-3">
                <img src="../../resource/img/img-slider/bb.jpg" alt="">
                <!--Inclusion de imagen del slider-->
                <div class="caption center-align">
                    <h3>¡Descubre mundos fantásticos!</h3>
                    <!--Titulo del slide-->
                    <h5 class="light grey-text text-lighten-3">En los videojuegos</h5>
                    <!--Descripcion del slide-->

                </div>
            </li>
            <li>
                <img src="../../resource/img/img-slider/consolas.jpg" alt="">
                <!--Inclusion de imagen del slider-->
                <div class="caption left-align">
                    <h3>Consolas</h3>
                    <!--Titulo del slide-->
                    <h5 class="light grey-text text-lighten-3">Conoce las mejores consolas para divertirte</h5>
                    <a class="waves-effect waves-light btn red darken-3" href="consoles.php">Conoce mas</a>
                </div>
            </li>
            <li>
                <img src="../../resource/img/img-slider/xbox.jpg" alt="">
                <!--Inclusion de imagen del slider-->
                <div class="caption right-align">
                    <h3>Las mejores consolas</h3>
                    <!--Titulo del slide-->
                    <h5 class="light grey-text text-lighten-3">Con los mejores juegos</h5>
                    <!--Descripcion del slide-->
                </div>
            </li>
            <li>
                <img src="../../resource/img/img-slider/mk.jpg" alt="">
                <!--Inclusion de imagen del slider-->
                <div class="caption center-align">
                    <h3>Juegos de lanzamiento</h3>
                    <!--Titulo del slide-->
                    <h5 class="light grey-text text-lighten-3">Al mejor precio</h5>
                    <!--Descripcion del slide-->
                </div>
            </li>
        </ul>
    </div>
    </div>

    <div class="container">
        <div class="card horizontal blue lighten-1">

            <div class="card-stacked">
                <div class="card-content">
                    <h5 class="center" style="color:white">Consolas</h5>

                </div>
            </div>

        </div>
    </div>
    <!--Container con las tarjetas de los productos ofrecidos-->
    <div class="container">
        <div class="row">
            <div class="col s12 m4 l4">
                <div class="card hoverable">
                    <!--Creacion de las tajetas con efecto hoverable-->
                    <div class="card-image">
                        <img src="../../resource/img/img-card/switch2.jpg">
                        <!--Imagen de la carta-->
                        <span class="card-title"></span>
                        <a class="btn-floating halfway-fab waves-effect waves-light green" href="product_detail.php">
                            <i class="material-icons">add</i>
                        </a>
                        <!--Boton para ver detalle de producto-->
                    </div>
                    <div class="card-content">
                        <p>Nintendo Switch</p>
                        <!--Contenido de la tarjeta-->
                    </div>

                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card hoverable">
                    <!--Creacion de las tajetas con efecto hoverable-->
                    <div class="card-image">
                        <img src="../../resource/img/img-card/ps42.jpg">
                        <!--Imagen de la carta-->
                        <span class="card-title"></span>
                        <a class="btn-floating halfway-fab waves-effect waves-light green">
                            <i class="material-icons">add</i>
                        </a>
                        <!--Boton para ver detalle de producto-->
                    </div>
                    <div class="card-content">
                        <p>PlayStation 4</p>
                        <!--Contenido de la tarjeta-->
                    </div>

                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card hoverable">
                    <!--Creacion de las tajetas con efecto hoverable-->
                    <div class="card-image">
                        <img src="../../resource/img/img-card/xboxc.jpg">
                        <!--Imagen de la carta-->
                        <span class="card-title"></span>
                        <a class="btn-floating halfway-fab waves-effect waves-light green">
                            <i class="material-icons">add</i>
                        </a>
                        <!--Boton para ver detalle de producto-->
                    </div>
                    <div class="card-content">
                        <p>Xbox One</p>
                        <!--Contenido de la tarjeta-->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card horizontal blue lighten-1">

            <div class="card-stacked">
                <div class="card-content">
                    <h5 class="center" style="color:white">Últimos lanzamientos</h5>

                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12 m4 l4">
                <div class="card hoverable">
                    <!--Creacion de las tajetas con efecto hoverable-->
                    <div class="card-image">
                        <img src="../../resource/img/img-slider/KH.jpg">
                        <!--Imagen de la carta-->
                        <span class="card-title"></span>
                        <a class="btn-floating halfway-fab waves-effect waves-light green">
                            <i class="material-icons">add</i>
                        </a>
                        <!--Boton para ver detalle de producto-->
                    </div>
                    <div class="card-content">
                        <p>Kingdom Hearts</p>
                        <!--Contenido de la tarjeta-->
                    </div>

                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card hoverable">
                    <!--Creacion de las tajetas con efecto hoverable-->
                    <div class="card-image">
                        <img src="../../resource/img/img-card/re2.jpg">
                        <!--Imagen de la carta-->
                        <span class="card-title"></span>
                        <a class="btn-floating halfway-fab waves-effect waves-light green">
                            <i class="material-icons">add</i>
                        </a>
                        <!--Boton para ver detalle de producto-->
                    </div>
                    <div class="card-content">
                        <p>Resident Evil 2 Remake</p>
                        <!--Contenido de la tarjeta-->
                    </div>

                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card hoverable">
                    <!--Creacion de las tajetas con efecto hoverable-->
                    <div class="card-image">
                        <img src="../../resource/img/img-card/mariano.jpg">
                        <!--Imagen de la carta-->
                        <span class="card-title"></span>
                        <a class="btn-floating halfway-fab waves-effect waves-light green">
                            <i class="material-icons">add</i>
                        </a>
                        <!--Boton para ver detalle de producto-->
                    </div>
                    <div class="card-content">
                        <p>New Super Mario bros U Deluxe</p>
                        <!--Contenido de la tarjeta-->
                    </div>

                </div>
            </div>


        </div>

    </div>

    <?php 
     //Aplicacion del foooter
      public_pages::footer();
     ?>
    <!--Inclusion scripts javascript para funcionalidad de paginas web-->
    <script src="../../resource/js/jquery-3.3.1.min.js"></script>
    <script src="../../resource/js/materialize.min.js"></script>
    <script src="../../resource/js/initialization.js"></script>

    </body>

    </html>