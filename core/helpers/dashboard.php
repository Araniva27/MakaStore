<!--Clase dashboard en esta se encuentran contenido el header, navbar y footer de las paginas del sitio privado-->
<?php
    class dashboard{
        //Metodo header recibe el parametro de titulo y sirve para colocar el header en las paginas del sitio privado
        public static function header($title){
            print('<!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" type="text/css" href="../../resource/css/materialize.min.css">
                    <link rel="stylesheet"type="text/css" href="../../resource/css/material-icons.css" >
                    <link rel="stylesheet"type="text/css" href="../../resource/css/star.css" >
                    <link rel="stylesheet" type="text/css" href="../../resource/css/modals.css" >
                    <link rel="shortcut icon" href="../../resource/img/logo/logoMKStore.png">
                    <link rel="stylesheet" type="text/css" href="../../resource/css/material.min.css" >
                    <link rel="stylesheet" type="text/css" href="../../resource/css/dataTables.material.min.css">
                    

                    <title>'.$title.'</title>
                </head>
               
                ');
        }  
        //Metodo navbar no recibe parametros y su funcion es la creacion del navbar en las paginas privadas
        public static function navbar(){
            print('
            <body>
            <div class="navbar-fixed">    
                <nav class="blue navbar-fixed">
                  <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a> <center><img src="../../resource/img/logo/logoMKStore.png" width="125" height="70" class="center-align">
                </nav>
            </div>
                <ul id="slide-out" class="sidenav">
                  <li><div class="user-view">
                    <div class="background red">
                      <img src="../../resource/img/img-card/black.jpg" >
                    </div>
                    <a href="#user"><img class="circle" src="../../resource/img/img-card/yo.jpg"></a>
                    <a href="#name"><span class="white-text name">Manuel Araniva</span></a>
                    <a href="#email"><span class="white-text email">manuelaraniva07@gmail.com</span></a>
                  </div></li>
                  <!--creacion de los elementos que se encuentran en el menu asi como su icono-->
                  <li><a href="../../views/dashboard/main.php"><i class="material-icons">home</i>Home</a></li>
                  <li><a href="../../views/dashboard/products.php"><i class="material-icons">videogame_asset</i>Productos</a></li>
                  <li><a href="../../views/dashboard/companies.php"><i class="material-icons">assignment_late</i>Proveedores</a></li>
                  <li><a href="../../views/dashboard/sales.php"><i class="material-icons">attach_money</i>Control de ventas</a></li>
                  <li><a href="../../views/dashboard/stock.php"><i class="material-icons">add_circle</i>Reabastecimiento</a></li>
                  <li><a href="../../views/dashboard/control.php"><i class="material-icons">find_replace</i>Controlador</a></li>
                  <li><a href="../../views/dashboard/customers.php"><i class="material-icons">list</i>Control clientes</a></li>
                  <li><a href="../../views/dashboard/mod.php"><i class="material-icons">update</i>Modificación de datos</a></li>
                  <li><a href="../../views/dashboard/index.php"><i class="material-icons">power_settings_new</i>Cerrar sesión</a></li>
                  <li><a href="index.php"><i class="material-icons">account_circle</i>Ingresar</a></li>
                  <li><a href="../../views/dashboard/check_in.php"><i class="material-icons">assignment</i>Registrarse</a></li>
                  
                </ul>');
        }

        //Metodo footer aqui se encuentra el footer utilizado en las paginas privadas
        public static function footer(){
            print('
            <footer class="page-footer light-blue darken-2">
                <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                    <h5 class="white-text">Maka Store</h5>
                    <p class="grey-text text-lighten-4">Maka Store el sitio número uno en venta de videojuegos a nivel mundial
                    el sitio favorito de los gamer</p>
                    <h5>"Transportándote a otra realidad"</h5>
                    </div>
                    <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        
                    <li><a class="white-text" href="../../views/dashboard/main.php">Home</a></li>
                    <li><a class="white-text" href="../../views/dashboard/products.php">Productos</a></li>
                    <li><a class="white-text" href="../../views/dashboard/companies.php">Proveedores</a></li>
                    <li><a class="white-text" href="../../views/dashboard/sales.php">Control de ventas</a></li>
                    <li><a class="white-text" href="../../views/dashboard/mod.php">Modificación de datos</a></li>
                    <li><a class="white-text" href="index.php">Ingresar</a></li>
                    <li><a class="white-text" href="../../views/dashboard/check_in.php">Registrarse</a></li>
                    </ul>
                    </div>
                </div>
                </div>
                <div class="footer-copyright">
                <div class="container">
                © 2019 Copyright Maka Store 
                
                </div>
                </div>
            </footer>');
        }
    }

?>