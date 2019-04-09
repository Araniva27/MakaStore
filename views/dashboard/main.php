<?php
/* Inclusion de archivo dashboard.php donde de se encuentre el header footer y navbar de los sitios privados */
  include "../../core/helpers/dashboard.php";
  dashboard::header("Ingreso");//Aplicacion del header y envio del parametro titulo 
  dashboard::navbar();//aplicacion del navbar en la pagina web
?>

    <header>
        <!--<h5 class="center">Bienvenido Administrador!!!</h5>-->
    </header>
    
    <!--Maquetacion de zona donde se colocara el titulo del grafico, y el grafico de ventas que se mostrara en la pagina-->
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="panel panel-primary">
                    <div class="panel panel-heading center-align">
                        <strong class="blue-text">
                            <div class="container-fluid">
                                <div class="card horizontal blue lighten-1">
                                    <div class="card-stacked">
                                        <div class="card-content">
                                            <h5 class="center" style="color:white">Gráficos de venta</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
                </strong>
                <div class="panel panel-body">
                    <!--Definicion de la fila, columnas y colocacion del grafico que se mostrara-->
                    <div class="row">
                        <div class="col l12 s12 m12">
                            <!---<div id="graficaLineal"></div>-->
                            <canvas id="bar-chart" width="800" height="450"></canvas>                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Creacion del contenedor donde se encuentra ubicado el 
    titulo de los productos mas vendidos y la tabla donde se 
    encuentran los productos mas vendidos de la tienda online-->
    <div class="container">
        <div class="card horizontal blue lighten-1">
            <div class="card-stacked">
                <div class="card-content">
                    <h5 class="center" style="color:white">Productos más vendidos</h5>
                </div>
            </div>

        </div>
        <!--Creacion de tabla donde se encuentran los productos mas vendidos de la tienda-->
        <table class="centered highlight responsive-table">
            <thead>
                <tr>
                    <!--Creacion de encabezado de la tabla-->
                    <th>Productos</th>
                    <th>Compañía</th>
                    <th>Unidades vendidad</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <!--Colocacion de datos que se mostraran en la tabla-->
            <tbody>
                <tr>
                    <td>Nintendo Switch</td>
                    <td>Nintendo</td>
                    <td>500</td>
                    <td>Consolas</td>
                </tr>
                <tr>
                    <td>Super Smash Bros</td>
                    <td>Nintendo</td>
                    <td>450</td>
                    <td>Videojuegos</td>
                </tr>
                <tr>
                    <td>Kingdom Hearth 3</td>
                    <td>Sqare Enix</td>
                    <td>300</td>
                    <td>Videojuegos</td>
                </tr>
                <tr>
                    <td>Play Station 4</td>
                    <td>Sony</td>
                    <td>278</td>
                    <td>Consolas</td>
                </tr>
                <tr>
                    <td>Zelda Breath of the wild</td>
                    <td>Nintendo</td>
                    <td>250</td>
                    <td>Videojuegos</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--Creacion del contenedor donde se encuentra ubicado el 
    titulo de los productos menos vendidos y la tabla donde se 
    encuentran los productos menos vendidos de la tienda online-->
    <div class="container">
        <div class="card horizontal blue lighten-1">
            <div class="card-stacked">
                <div class="card-content">
                    <h5 class="center" style="color:white">Productos menos vendidos</h5>
                </div>
            </div>

        </div>
        <!--Creacion de tabla donde se encuentran los productos mas vendidos de la tienda-->
        <table class="centered highlight responsive-table">
            <thead>
                <tr>
                    <!--Creacion de encabezado de la tabla-->
                    <th>Productos</th>
                    <th>Compañía</th>
                    <th>Unidades vendidad</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <!--Colocacion de datos que se mostraran en la tabla-->
            <tbody>
                <tr>
                    <td>Play Station mini</td>
                    <td>Sony</td>
                    <td>50</td>
                    <td>Consolas</td>
                </tr>
                <tr>
                    <td>The world end with you Remix</td>
                    <td>Square Enix</td>
                    <td>36</td>
                    <td>Videojuegos</td>
                </tr>
                <tr>
                    <td>Final Fantasy XIV</td>
                    <td>Square Enix</td>
                    <td>30</td>
                    <td>Videojuegos</td>
                </tr>
                <tr>
                    <td>Pesona 4</td>
                    <td>Atlus</td>
                    <td>27</td>
                    <td>Videojuegos</td>
                </tr>
                <tr>
                    <td>Metroid Prime: Federation Force</td>
                    <td>Nintendo</td>
                    <td>17</td>
                    <td>Videojuegos</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6">
                <div class="card blue lighten-1 hoverable">
                    <div class="card-content white-text">
                        <span class="card-title">Monto de ventas del día</span>
                        <h5>Total: $500.43</h5>
                    </div>

                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="card blue lighten-1 hoverable">
                    <div class="card-content white-text">
                        <span class="card-title">Monto total</span>
                        <h5 class>Total: $20,000</h5>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
        <div class="col s12 m6 l6 ">
                <div class="card blue lighten-1 hoverable">       
                    <div class="card-content white-text">
                        <span class="card-title">Ventas relizadas</span>
                        <h5>Total: 412</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l6 ">
                <div class="card blue lighten-1 hoverable">       
                    <div class="card-content white-text">
                        <span class="card-title">Productos registrados</span>
                        <h5>Total: 150</h5>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--Insertacion de los script javascript utilizados en la pagina web-->
    <script src="../../resource/js/jquery-3.3.1.min.js"></script>
    <script src="../../resource/js/materialize.min.js"></script>
    <script src="../../resource/js/initialization.js"></script>
    <script src="../../resource/js/plotly-latest.min.js"></script>
    <script src="../../resource/js/chart.min.js"></script>
    <script src="../../resource/js/chart.js"></script>

    </body>
    <br>
    <br>
    <?php
//invocacion de la clase public_pages y colocacion del footer
 dashboard::footer();
?>

        </html>