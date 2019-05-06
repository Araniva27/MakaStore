<?php
//Inclusion del archivo public_pages.php 
    include "../../core/helpers/public_pages.php";
    public_pages::header('¿Quiénes somos?');//inclusion del header y envio de parametro titulo
?>

    <body>
        <!--Creacion del container donde se encuentra las tajetas con la informacion de la empresa-->
        <div class="container">
            <!--Creacion de tajeta con quienes somos-->
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <div class="card-panel white">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <img src="../../resource/img/img-card/quienes-somos.png" alt="" class="circle responsive-img">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s10">
                            <span class="black-text">
                                <h5>¿Quiénes somos?</h5>
                            </span>
                            <p class="blue-text"> Somos un grupo de profesionales dedicados a la venta y compra de videojuegos y consolas de la
                                mejor calidad: Ofrecemos un desempeño eficaz y rápido a los usuarios. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!--Creacion de tarjeta con la mision-->
                <div class="card-panel white">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <img src="../../resource/img/img-card/mision.png" alt="" class="circle responsive-img">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s10">
                            <span class="black-text">
                                <h5>Misión</h5>
                            </span>
                            <p class="blue-text"> Ofrecer a las personas amantes de los videojuegos la posibilidad de adquirir videojuegos y consolas
                                novedosas, originales y de buena calidad mediante el uso de una tienda en línea en la cual
                                se muestran cada uno de los productos disponibles. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!--Creacion de tarjeta con la vision-->
                <div class="card-panel white">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <img src="../../resource/img/img-card/vision.png" alt="" class="circle responsive-img">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s10">
                            <span class="black-text">
                                <h5> Visión </h5>
                            </span>
                            <p class="blue-text"> Ser para el año 2023 una empresa reconocida a nivel nacional e internacional por la variedad,
                                calidad y eficacia ofrecida en todos nuestros productos y en las entregas de estos, siendo
                                una de las empresas más confiables y con los mejores servicios de la región. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--Creacion de tarjeta con los valores-->
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <div class="card-panel white">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <img src="../../resource/img/img-card/valores.png" alt="" class="circle responsive-img">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s10">
                            <span class="black-text">
                                <h5> Valores </h5>
                            </span>
                            <p class="blue-text"> Transparencia. En un entorno social donde cada vez es menos frecuente, dentro de nuestros valores
                                empresariales podemos integrar la transparencia hacia nuestro equipo y hacia nuestros clientes.
                                </p>
                            <p class="blue-text">Puntualidad. El tiempo es dinero, y la gente cada vez valora más el suyo.</p>
                            <p class="blue-text">Excelencia. La calidad llevada al máximo, eso es la excelencia. Si nos exigimos lo mejor, podremos
                                dar lo mejor.</P>
                        </div>
                    </div>
                </div>
            </div>
            <!--Creacion de tar}jeta con el equipo maka store-->
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <div class="card-panel white">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <img src="../../resource/img/img-card/equipo.jpg" alt="" class="circle responsive-img">
                            <!-- notice the "circle" class -->
                        </div>
                        <div class="col s10">
                            <span class="black-text">
                                <h5> Equipo </h5>
                            </span>
                            <p class="blue-text"> Somos un grupo de empresarios porfesionales en la comercializacion de consolas y videojuegos
                                formados por Karla Maria experta en comercio de productos en linea y Manuel Araniva experto
                                en comercio internacional juntos y con ayuda de otros empresarios hemos fundado MakaStore
                                para facilitar el acceso a videojuegos y consolas a mas publico </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Inclusion de archivos javascript necesarios para la funcionalidad del sitio web-->
        <script src="../../resource/js/jquery-3.3.1.min.js"></script>
        <script src="../../resource/js/materialize.min.js"></script>
        <script src="../../resource/js/initialization.js"></script>

    </body>
    <?php
//Inclusion del footer de la pagina
   public_pages::footer('cataloge.js');
?>

        </html>