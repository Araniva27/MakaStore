<!-- Clase public_pages, en esta clase se encuentra el header, footer y navbar de las paginas-->
<?php
    class public_pages 
    {
      /**Metodo header, aqui se encuentra el header y navbar de las paginas de la tienda*/
        public static function header($title){
                print('<!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <link rel="stylesheet" type="text/css" href="../../resource/css/materialize.min.css">
                        <link href="../../resource/css/material-icons.css" rel="stylesheet">
                        <link href="../../resource/css/star.css" rel="stylesheet">
                        <link rel="shortcut icon" href="../../resource/img/logo/logoMKStore.png">
                        <title>'.$title.'</title>
                    </head>
                   
                    <body>
                    
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="../../views/public/checkin.php">Registrarse</a></li>
                            <li><a href="../../views/public/login.php">Ingresar</a></li>
                            
                        </ul>
                        <ul id="dropdown2" class="dropdown-content">
                            <li><a href="games.php">Videojuegos</a></li>
                            <li><a href="consoles.php">Consolas</a></li>
                            
                        </ul>
                    <div class="navbar-fixed">    
                      <nav class=" light-blue darken-2">
                     
                            <div class="nav-wrapper container-fluid">
                              <a href="index.php" class="brand-logo"><img src="../../resource/img/logo/logoMKStore.png" width="125" height="70"></a>
                              <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                
                              <ul class="right hide-on-med-and-down">
                                <!-- Dropdown Trigger -->
                                <li><a href="index.php">Inicio</a></li>
                                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Categorias<i class="material-icons right">arrow_drop_down</i></a></li>
                                <li><a href="trends.php">Tendecias</a></li>
                                <li><a href="about_us.php">¿Quienes somos?</a></li>      
                                <li><a href="contact_us.php">Contactanos</a></li> 
                                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">account_circle</i></a></li>                      
                                <li><a href="shopping_cart.php" ><i class="material-icons right">add_shopping_cart</i></a></li>                      
                              </ul>
                              
                            </div>
                         
                      </nav>
                      
                    </div>  
                    <ul class="sidenav" black id="mobile-demo">
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="consoles.php">Consolas</a></li>
                        <li><a href="games.php">Videojuegos</a></li>
                        
                        <li><a href="mobile.html">Tendencias</a></li>
                        <li><a href="about_us.php">¿Quienes somos?</a></li>
                        <li><a href="contact_us.php">Contactanos</a></li>
                        <li><a href="../../views/public/login.php">Ingresa</a></li>
                        <li><a href="../../views/public/checkin.php">Registrate</a></li>
                        <li><a href="shopping_cart.php">Carrito de compras</a></li>
                      </ul>
                    ');
                    
        }
        /*Metodo footer, aqui se encuentra el footer de las paginas publicas*/
        public static function footer(){
            print('<footer class="page-footer light-blue darken-2">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">Maka Store</h5>
                  <p class="grey-text text-lighten-4">Maka Store el mejor sitio web para comprar 
                  tus videojuegos y consolas favoritos a un precio accesible</p>
                  <h5>"Transportandote a otra realidad"</h5>
                </div>
                <div class="col l4 offset-l2 s12">
                  <h5 class="white-text">Links</h5>
                  <ul>
                    
                  <li><a class="white-text" href="index.php">Inicio</a></li>
                  <li><a href="consoles.php" class="white-text">Consolas</a></li>
                  <li><a href="games.php" class="white-text">Videojuegos</a></li>
                  <li><a class="white-text" href="trends.php">Tendecias</a></li>
                  <li><a class="white-text" href="about_us.php">¿Quienes somos?</a></li>      
                  <li><a class="white-text" href="contact_us.php">Contactanos</a></li>
                  <li><a class="white-text" href="frequent_questions.php">Preguntas frecuentes</a></li> 
                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
              © 2019 Copyright Maka Store 
              
              </div>
            </div>
          </footer>
                ');
        } 
        //Metodo detalle_producto aqui se encuentra la card donde se muestra el detalle del producto seleccionado         
        public static function detalle_producto(){
          print('<div class="container">
          <h5 class="center">Detalles del producto</h5>
          <div class="row ">
              <div class="col s12 m6 l6 offset-m3 offset-l3">
                  <div class="card hoverable">
                      <div class="card-image">
                      <img src="../../resource/img/img-card/switch2.jpg">
                     
                      <br>
                       
                      
                      </div><br>
                      <div class="card-content">
                      <p>Es la séptima consola de videojuegos principal desarrollada por
                      Nintendo. Conocida en el desarrollo por su nombre código «NX»,
                      se dio a conocer en octubre de 2016 y fue lanzada mundialmente el 3 de marzo de 2017.</p>
                      <br>
                      <div class="container center">
                      <!--TextBox para ingresar cantidad de producto-->
                      <div class="container center">  
                        <div class="input-field">
                            <i class="material-icons prefix">shop</i>
                            <input id="icon_prefix" type="number" class="validate">
                            <label for="icon_prefix">Cantidad</label>
                        </div>
                      </div>  
                      <div class="col s10 offset-s1 center-align">
                        <a class="btn halfway-fab waves-effect waves-light blue center-align">Agregar al carrito</a>
                      </div><br><br><br>
                      <a class=" modal-trigger" href="#modal1">Agregar comentario</a>
  
                      <div id="modal1" class="modal">
                          <div class="modal-content">
                              <h4>Comentarios</h4>
                              <div class="input-field">
                                <textarea id="textarea1" class="materialize-textarea"></textarea>
                                <label for="textarea1">Comentario</label>
                              </div>
                          </div>
                          <div class="modal-footer center">
                              <a href="#" class="btn blue modal-close">Agregar</a>
                          </div>
                      </div>
                  </div>
                               
                      <p class="clasificacion">
                          
                          <input id="radio1" type="radio" name="estrellas" value="5"><!--
                          --><label class="estrellita" for="radio1">★</label><!--
                          --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                          --><label class="estrellita" for="radio2">★</label><!--
                          --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                          --><label class="estrellita" for="radio3">★</label><!--
                          --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                          --><label class="estrellita" for="radio4">★</label><!--
                          --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                          --><label class="estrellita" for="radio5">★</label>
                         
                      </p>
                     
                      </div>
                  </div>
                  
              </div>   
             
          </div> 
          </div>
      </div>
              ');
      }          
        public static function informacion_producto($titulo,$info,$desarrollador,$precio){
            print('
            <div id="modalI" class="modal">
                <div class="modal-content">
                    <h4>'.$titulo.'</h4>
                    <p>'.$info.'</p>
                    <p>
                    <strong class="blue-text">Desarrollador:</strong> '.$desarrollador.'</p>
                <p>
                    <strong class="blue-text">Precio:</strong> '.$precio.'</p>
                </div>
                <div class="modal-footer">
                 <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Cerrar</a>
                </div>
            </div>');
        }

        
    }
    
?>