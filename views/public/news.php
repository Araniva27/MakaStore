<?php
//Inclusion de archivo public_pages.php
  include "../../core/helpers/public_pages.php";
  public_pages::header('Novedades');//Colocacion del header y envio del parametro titulo
?>
<body>
<br>
    <!--Contenedor con jumbotron que contiene el titulo de la seccion-->
    <div class="container">
        <div class="card-panel blue">
            <div class="jumbotron" id="tagline">
                <h3 class="white-text center">Novedades</h3> <!--Titulo-->
              
                
           </div>
        </div>
        
    </div>
   <!--Contenedor donde se ubican las tajetas con los productos de acuerdo a la categoria-->
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                    <img src="../../resource/img/img-card/zelda.jpg">
                    
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                    <p ><strong class="blue-text">The legend of Zelda Breath of the wild</strong><br> Es el título oficial del videojuego de acción-aventura 
                    de la serie The Legend of Zelda, desarrollado por Nintendo
                    EPD (división de Nintendo creada por la unión de Nintendo
                    EAD, Nintendo Software Planning & Development), en colaboración 
                    con Monolith Soft para Wii U y Nintendo Switch.</p>
                    <p><strong class="blue-text">Desarrollador:</strong> Nintendo</p>
                    <p><strong class="blue-text">Precio:</strong> $45.00</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                    <img src="../../resource/img/img-card/p5.jpg">
                    
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                    <p ><strong class="blue-text">Persona 5</strong><br> 
                    Es un videojuego de rol desarrollado por Atlus para las consolas PlayStation 3 y 
                    PlayStation 4. Cronológicamente se trata del sexto videojuego de la saga Persona,
                    que forma parte de la franquicia Megami Tensei. 
                    Persona 5 superó las dos millones de copias vendidas en todo el mundo.</p>
                    <p><strong class="blue-text">Desarrollador:</strong> Atlus</p>
                    <p><strong class="blue-text">Precio:</strong> $35.00</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                    <img src="../../resource/img/img-card/smash.jpg">
                    
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                    <p ><strong class="blue-text">Super Smash Bros. Ultimate</strong><br> 
                    es un videojuego de lucha de la serie Super Smash Bros. desarrollada por 
                    Bandai Namco Games y Sora Ltd. y publicado por Nintendo. Este salió a la 
                    venta para Nintendo Switch a nivel mundial el 7 de diciembre de 2018. presenta
                    un crossover de luchadores de diferentes franquicias de Nintendo asi como personajes de terceros</p>
                    <p><strong class="blue-text">Desarrollador:</strong> Nintendo</p>
                    <p><strong class="blue-text">Precio:</strong> $55.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../resource/js/jquery-3.3.1.min.js"></script>
    <script src="../../resource/js/materialize.min.js"></script>
    <script src="../../resource/js/initialization.js"></script>
</body>
<?php
   public_pages::footer();
?>    
</html>