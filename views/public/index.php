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
    <div id="modalP" class="modal modals">
        <div class="modal-content" id="modal-content">
            <h4>Comentarios</h4>
        </div>
        <div class="row center">
         <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar">Cerrar<i class="material-icons"></i></a>
        </div>
    </div>
    
    <div id="modalV" class="modal modals">
        <div class="modal-content" id="modal-puntuaciones">
            <h4>Puntuaciones</h4>
        </div>
        <div class="row center">
         <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar">Cerrar<i class="material-icons"></i></a>
        </div>
    </div>

    <div class="container">
        <h4 class="center blue-text" id="title"></h4>
        <!-- <div class="row" id="barraBusqueda">  -->
            <form method="post" id="form-search">   
            
            </form>                       
        <!-- </div> -->
        <div class="row" id="catalogo"></div>
    </div>
<!--Creacion del modal para comentar productos-->
<div id="modalComentario" class="modal modalprod">
        <div class="modal-content">
            <h4 class="center">Agregar comentario</h4>
            <div class="container">
                <form class="col s12" method="post" id="form-comentario">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                    <div class='row'>
                        <div class='input-field col s12 l12 m6'>
                            <input class='validate' type='hidden' name='idProducto' id='idProducto'/>
                            <input class='validate' type='text' name='create_comentario' id='create_comentario'/>
                            <span class="helper-text"></span>
                            <label for='create_comentario'>Comentario</label>
                        </div>  
                    </div>                          
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Crear"><i class="material-icons">check</i></button>
                        </div>
                </form>
                </div>
            </div>

        </div>        
</div>
    <div id="modalPuntuacion" class="modal modalprod">
        <div class="modal-content">
            <h4 class="center">Agregar Valoracion</h4>
            <div class="container">
                <form class="col s12" method="post" id="form-valoracion">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <!--Creacion de filas y columnas para cada elemento del formulario de registro-->
                    <div class='row'>
                        <div class='input-field col s12 l12 m6'>
                            <input class='validate' type='hidden' name='idProducto2' id='idProducto2'/>
                            <select name="puntuacion" id="puntuacion">
                                <option value="" disabled selected>Seleccione una opcion</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>  
                    </div>                          
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Crear"><i class="material-icons">check</i></button>
                        </div>
                </form>
                </div>
            </div>

        </div>        
    </div>
<br>
<?php 
     //Aplicacion del foooter
      public_pages::footer('catalogue.js');
     ?>
<!--Inclusion scripts javascript para funcionalidad de paginas web-->

</body>

</html>