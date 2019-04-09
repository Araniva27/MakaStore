<?php
//Inclusion de archivo public_pages.php
    include "../../core/helpers/public_pages.php";
    public_pages::header('Consolas');//Aplicacion del metodo header y envio del parametro titulo
?>

    <body>
        <!--Creacion del container donde se encuentra el jumbotron-->
        <div class="container">
            <div class="card-panel blue">
                <!--Creacion del jumbotron con titulo y descripcion de la categoria-->
                <div class="jumbotron" id="tagline">
                    <h3 class="white-text">Consolas</h3>
                    <h4 class="white-text">Descubre una gran variedad de consolas, para todo tipo de jugadores a un precio muy accesible </h4>

                </div>
            </div>

        </div>
        <!--Creacion del container donde se encuentra la barra de busqueda de consolas-->
        <div class="container">
            <nav>

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
            <br>
            <!--Creacion de la fila donde se encuentra el boton para realizar la busqueda-->
            <div class="row center">
                <a class="waves-effect waves-light btn blue">
                    <i class="material-icons right">search</i>Buscar</a>
            </div>


        </div>
        <!--Container donde se ubica las tajetas con las consolas ofrecidas-->
        <div class="container">
            <div class="row">
                <div class="col s12 m6 l4">
                    <!--Creacion de columna para la tajeta-->
                    <div class="card hoverable">
                        <div class="card-image">
                            <!--creacion de la tajeta con imagen e informacion de la consola-->
                            <img src="../../resource/img/img-card/ps4_1.png">
                            <!--Imagen de la tajeta-->

                            <a class="btn-floating halfway-fab waves-effect waves-light green">
                                <i class="material-icons">add</i>
                            </a>
                        </div>
                        <!--Contenido de la tajeta-->
                        <div class="card-content">
                            <p>
                                <strong class="blue-text">PlayStation 4</strong>
                                <br> Es la cuarta videoconsola del modelo PlayStation. Forma parte de las videoconsolas de octava
                                generación. Fue anunciada oficialmente el 20 de febrero de 2013 en el evento PlayStation
                                Meeting 2013</p>
                            <p>
                                <strong class="blue-text">Fabricante:</strong> Sony Computer Entertainment</p>
                            <p>
                                <strong class="blue-text">Precio:</strong> $245.00</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <!--Creacion de columna para la tajeta-->
                    <div class="card hoverable">
                        <div class="card-image">
                            <!--creacion de la tajeta con imagen e informacion de la consola-->
                            <img src="../../resource/img/img-card/switch.jpg">
                            <!--Imagen de la tajeta-->

                            <a class="btn-floating halfway-fab waves-effect waves-light green">
                                <i class="material-icons">add</i>
                            </a>
                        </div>
                        <!--Contenido de la tajeta-->
                        <div class="card-content">
                            <p>
                                <strong class="blue-text">Nintendo Switch</strong>
                                <br> es la séptima consola de videojuegos principal desarrollada por Nintendo. Conocida en el
                                desarrollo por su nombre código «NX», se dio a conocer en octubre de 2016 y fue lanzada mundialmente
                                el 3 de marzo de 2017.</p>
                            <p>
                                <strong class="blue-text">Fabricante:</strong> Nintendo</p>
                            <p>
                                <strong class="blue-text">Precio:</strong> $259.00</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <!--Creacion de columna para la tajeta-->
                    <div class="card hoverable">
                        <div class="card-image">
                            <!--creacion de la tajeta con imagen e informacion de la consola-->
                            <img src="../../resource/img/img-card/xbox.jpg">
                            <!--Imagen de la tajeta-->

                            <a class="btn-floating halfway-fab waves-effect waves-light green">
                                <i class="material-icons">add</i>
                            </a>
                        </div>
                        <!--Contenido de la tajeta-->
                        <div class="card-content">

                            <p>
                                <strong class="blue-text">Xbox One</strong>
                                <br> Es la tercera videoconsola de sobremesa de la marca Xbox, producida por Microsoft. Forma
                                parte de las videoconsolas de octava generación. Fue presentada por Microsoft el 21 de mayo
                                de 2013. La consola Xbox One se empezó a gestar tras la salida al mercado de su antecesora,
                                la Xbox 360. </p>
                            <p>
                                <strong class="blue-text">Fabricante:</strong> Microsoft/Foxconn</p>
                            <p>
                                <strong class="blue-text">Precio:</strong> $300.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Aplicacion de recursos javascript necesarios para funcionalidades del sitio-->
        <script src="../../resource/js/jquery-3.3.1.min.js"></script>
        <script src="../../resource/js/materialize.min.js"></script>
        <script src="../../resource/js/initialization.js"></script>
    </body>
    <?php
//Aplicacion del footer a la pagina
   public_pages::footer();
?>

        </html>