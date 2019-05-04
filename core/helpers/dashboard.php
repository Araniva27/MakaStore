<!--Clase dashboard en esta se encuentran contenido el header, navbar y footer de las paginas del sitio privado-->
<?php
    class dashboard{
        //Metodo header recibe el parametro de titulo y sirve para colocar el header en las paginas del sitio privado
        public static function header($title){
            session_start();
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
            if(isset($_SESSION['idAdmin'])){
                $filename = basename($_SERVER['PHP_SELF']);
                if ($filename != 'index.php') {
                    self::modals();
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
                            <a href=""><span class="white-text name" >Nombre: '.$_SESSION['nombre'].' '.$_SESSION['apellido'].'</span></a> 
                            <a href=""><span class="white-text name" >Usuario: '.$_SESSION['usuario'].'</span></a>       
                            <br>                                                      
                        </div></li>
                        <!--creacion de los elementos que se encuentran en el menu asi como su icono-->
                        <li><a href="../../views/dashboard/main.php"><i class="material-icons">home</i>Home</a></li>
                        <li><a href="../../views/dashboard/products.php"><i class="material-icons">videogame_asset</i>Productos</a></li>
                        <li><a href="../../views/dashboard/companies.php"><i class="material-icons">assignment_late</i>Proveedores</a></li>
                        <li><a href="../../views/dashboard/sales.php"><i class="material-icons">attach_money</i>Control de ventas</a></li>                        
                        <li><a href="../../views/dashboard/control.php"><i class="material-icons">find_replace</i>Controlador</a></li>
                        <li><a href="../../views/dashboard/customers.php"><i class="material-icons">list</i>Control clientes</a></li>
                        <li><a href="#"  onclick="modalProfile()"><i class="material-icons">update</i>Modificación de datos</a></li>
                        <li><a href="#modal-password" class="modal-trigger"><i class="material-icons">lock</i>Cambiar clave</a></li>
                        <li><a href="#" onclick="cerrarSesion()"><i class="material-icons">clear</i>Cerrar Sesion</a></li>                       
                        <li><a href="../../views/dashboard/check_in.php"><i class="material-icons">assignment</i>Registrarse</a></li>
                        
                        </ul>');
                } else {
                    header('location: main.php');
                }
            }else{
                header('location:index.php');
                print('
                <div class="navbar-fixed">    
                    <nav class="blue navbar-fixed">
                        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons"></i></a> <center><img src="../../resource/img/logo/logoMKStore.png" width="125" height="70" class="center-align">
                    </nav>
                </div>');
            }
                   
        }

        //Metodo footer aqui se encuentra el footer utilizado en las paginas privadas
        public static function footer($controller, $validator){
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
                <script src="../../resource/js/jquery-3.3.1.min.js"></script>
                <script src="../../resource/js/materialize.min.js"></script>
                <script src="../../resource/js/initialization.js"></script>
                <script type="text/javascript" src="../../resource/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../core/helpers/functions.js"></script>
                <script type="text/javascript" src="../../core/controllers/dashboard/account.js"></script>
                <script type="text/javascript" src="../../core/controllers/dashboard/'.$controller.'"></script>
                <script type="text/javascript" src="../../resource/js/datatables.min.js"></script>
                <script type="text/javascript" src="../../resource/js/dataTables.material.min.js"></script>
                <script type="text/javascript" src="../../core/helpers/'.$validator.'"></script>
                <script type="text/javascript" src="../../core/helpers/userValidator.js"></script>
                <script type="text/javascript" src="../../resource/js/jquery.validate.min.js"></script>
                <script type="text/javascript" src="../../core/helpers/table.js"></script>
            </footer>');
        }

        private function modals()
	{
		print('
			<div id="modal-profile" class="modal">
				<div class="modal-content">
					<h4 class="center-align">Editar perfil</h4>
					<form method="post" id="form-profile">
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">person</i>
                                <input id="profile_nombre" type="text" name="profile_nombre" class="validate"  onfocusout="validateNombreUsuario()" required/>                             
								<label for="profile_nombre">Nombres</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">person</i>
                                <input id="profile_apellido" type="text" name="profile_apellido" class="validate" onfocusout="validateApellidoUsuario()" required/>                                
								<label for="profile_apellido">Apellidos</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">email</i>
                                <input id="profile_correo" type="email" name="profile_correo" class="validate" onfocusout="validateCorreoUsuario()" required/>                                
								<label for="profile_correo">Correo</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">person_pin</i>
                                <input id="profile_usuario" type="text" name="profile_usuario" class="validate" onfocusout="validateUsuario2()" required/>                                
								<label for="profile_usuario">Usuario</label>
                            </div>
                            <div class="input-field col s12 m6">
								<i class="material-icons prefix">person_pin</i>
                                <input id="profile_telefono" type="text" name="profile_telefono" class="validate" onfocusout="validateTelefonoUsuario()" required/>                            
								<label for="profile_telefono">Telefono</label>
                            </div>
                            <div class="input-field col s12 m6">
								<i class="material-icons prefix">person_pin</i>
                                <input id="profile_direccion" type="text" name="profile_direccion" class="validate" onfocusout="validateDireccionUsuario()" required/>                                
								<label for="profile_direccion">Direccion</label>
							</div>
						</div>
						<div class="row center-align">
							<a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
							<button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Modificar"><i class="material-icons">update</i></button>
						</div>
					</form>
				</div>
			</div>
			<div id="modal-password" class="modal">
				<div class="modal-content">
					<h4 class="center-align">Cambiar contraseña</h4>
					<form method="post" id="form-password">
						<div class="row center-align">
							<label>CLAVE ACTUAL</label>
						</div>
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">security</i>
								<input id="clave_actual_1" type="password" name="clave_actual_1" class="validate" onfocusout="validateContraseñaActual1()" required/>
								<label for="clave_actual_1">Clave</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">security</i>
								<input id="clave_actual_2" type="password" name="clave_actual_2" class="validate" onfocusout="validateContraseñaActual2()" required/>
								<label for="clave_actual_2">Confirmar clave</label>
							</div>
						</div>
						<div class="row center-align">
							<label>CLAVE NUEVA</label>
						</div>
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">security</i>
								<input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" onfocusout="validateContraseñaNueva1()" required/>
								<label for="clave_nueva_1">Clave</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">security</i>
								<input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" onfocusout="validateContraseñaNueva2()" required/>
								<label for="clave_nueva_2">Confirmar clave</label>
							</div>
						</div>
						<div class="row center-align">
							<a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
							<button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar"><i class="material-icons">update</i></button>
						</div>
					</form>
				</div>
			</div>
		');
	}
    }

?>