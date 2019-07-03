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
                                            <h5 class="center" style="color:white">Gráfico de venta</h5>
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
                        <div class="col s12">      
                            <div class="card-panel white hoverable">
                                <canvas id="graficoVentas"></canvas>                                          
                            </div>                                                                          
                        </div>
                        <!-- <div class="col s12 ">  
                            <div class="card-panel white hoverable"> 
                                <canvas id="graficoCategorias"></canvas>      
                            </div>          
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                            <h5 class="center" style="color:white">Gráfico de productos por proveedor</h5>
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
                        <div class="col s12">      
                            <div class="card-panel white hoverable">
                                <canvas id="graficoCategorias"></canvas>                                          
                            </div>                                                                          
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!--Insertacion de los script javascript utilizados en la pagina web-->
    <script src="../../resource/js/jquery-3.3.1.min.js"></script>
    <script src="../../resource/js/materialize.min.js"></script>
    <script src="../../resource/js/initialization.js"></script>    
    <script src="../../resource/js/chart.min.js"></script>
    <!-- <script src="../../resource/js/chart.js"></script> -->

    </body>
    <br>
    <br>
    <?php
//invocacion de la clase public_pages y colocacion del footer
 dashboard::footer('main.js', 'companiesValidator.js');
?>

        </html>