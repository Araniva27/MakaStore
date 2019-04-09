<?php
//instanciacion del documento dashboard
  include "../../core/helpers/dashboard.php";
  //llamada del metodo header y envio del parametro de titulo
  dashboard::header("Compañias");
  //lamada del metodo navbar
  dashboard::navbar();
?>  
    <!--Creacion de contenedor donde se colocara la imagen con efecto parallax-->
    
    <!--Creacion del contendedo donde se encuentra el titulo de Comentarios de productos-->
        <div class="container">
            <!--Creacion de la tarjeta donde se encuentra el titulo-->
            <div class="card horizontal blue lighten-1">
                <div class="card-stacked">
                    <div class="card-content">
                        <!--Colocacion del titulo en la tajeta-->
                        <h5 class="center" style="color:white">Comentarios de productos</h5>
                    </div>
                </div>
            </div>  
        </div>    
        <br>
        <div class="container"> 
            <h5 class="center">Búsqueda de productos</h5>    
            <nav>   
                <!--Creacion de la barra de busqueda de productos-->
                <div class="nav-wrapper blue">
            <form>
                <div class="input-field">
                <input id="search" type="search" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
                </div>
                
            </form>
            
        </div>
        
    </nav>
    <br>
    <!--Creacion de botones de busqueda de productos y comentarios-->
        <div class="row center">
            <a class="waves-effect waves-light btn blue"><i class="material-icons right">search</i>Buscar</a>
            <a class="waves-effect waves-light btn green"><i class="material-icons right">check</i>Mostar todos</a>
        </div>

            <!--Creacion de tajetas donde se contendra la imagen del producto, nombre del usuario, comentarios del producto y su Calificación-->
            <div class="col s12 m12 l12">
                <div class="card horizontal hoverable">
                <div class="card-image">
                    <img src="../../resource/img/img-card/zelda.jpg">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                    <h5 class="center"> The legend of Zelda Breath of the wild</h5>
                    <p><strong class="blue-text">Usuario:</strong> Manuel Araniva</p>
                    <p><strong class="blue-text">Comentario:</strong> Un juego muy maravilloso
                    con gran libertad para explorar, diversidad de situaciones ademas de un 
                    estilo grafico que recuerda a la animación japonesa muy recomendable</p>
                    <p><strong class="blue-text">Calificación:</strong> 5</p>
                    </div>
                    
                </div>
                </div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card horizontal hoverable">
                <div class="card-image">
                    <img src="../../resource/img/img-card/switch.jpg">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                    <h5 class="center"> Nintendo Switch</h5>
                    <p><strong class="blue-text">Usuario:</strong> Rolin Salas</p>
                    <p><strong class="blue-text">Comentario:</strong> Una muy buena consola híbrida con 
                    magníficos juegos para poder disfutar en ella, elaborada con muy buenos materiales y 
                    un muy buen diseño, aunque una de sus mas grandes carencias es la poca potencia en
                    comparación a las demas consolas de la competencia </p>
                    <p><strong class="blue-text">Calificación:</strong> 4</p>
                    </div>
                    
                </div>
                </div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card horizontal hoverable">
                <div class="card-image">
                    <img src="../../resource/img/img-card/ps4_1.png">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                    <h5 class="center"> Play Station 4</h5>
                    <p><strong class="blue-text">Usuario:</strong> Karla Barillas</p>
                    <p><strong class="blue-text">Comentario:</strong> Una consola muy 
                    buena con una gran cantidad de juegos de todas las compañías con 
                    una muy buena potencia gráfica que corre todos los juegos de esta generación de consolas,
                    aunque con problemas de sobrecalentamiento</p>
                    <p><strong class="blue-text">Calificación:</strong> 4</p>
                    </div>
                    
                </div>
                </div>
            </div>
        
        </div>    
    <br><br>   
    <!--Inclusion de scrip javascript para la inicializacion y uso de diversos elementos-->
    <script src="../../resource/js/jquery-3.3.1.min.js"></script>
    <script src="../../resource/js/materialize.min.js"></script>
    <script src="../../resource/js/initialization.js"></script>
    </body>
    
<?php
//llamada a la funcion footer en la clase dashboard
  dashboard::footer();
?>
</html>  