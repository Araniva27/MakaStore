<?php
//Inclusion del archivo dashboard.php
  include "../../core/helpers/dashboard.php";
  dashboard::header("Ingreso");//Aplicacion del header a la pagina  y envio de parametro titulo
  dashboard::navbar();//Aplicacion del navbar a la pagina
?>
<!--Creacion de la zona donde se encuentra el formulario de registro de administradores-->
<header class="center">
    <br><br>
    <header>
        <!--Creacion del container donde se encuentran los elementos del formulario-->
        <div class="container">
            <div class="z-depth-1 grey lighten-4 row"
                style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                <img src="../../resource/img/img-card/registro.png">
                <!--Aplicacion de la imagen del formularios-->
                <form class="col s12" method="post" id="registro-admin">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <!--Creacion de cada una de las filas donde se encuentran algunos elementos del formulario de registro-->
                    <div class='row'>
                        <div class='input-field col s12 l6 m6'>
                            <!--Definicion del tipo de campo a crear-->
                            <input class='validate' type='text' name='nombre_admin' id='nombre_admin' onfocusout="validateNombre()"/>
                            <span class="helper-text"></span>    
                            <label id="labelNombre" for='nombre_admin' data-error="hola" >Nombre</label>                                        
                        </div>
                        <div class='input-field col s12 l6 m6'>
                            <!--Definicion del tipo de campo a crear-->
                            <input class='validate' type='text' name='apellido_admin' id='apellido_admin' onfocusout="validateApellido()"/>
                            <span class="helper-text"></span>   
                            <label for='apellido_admin'>Apellido</label>                                        
                        </div>
                    </div>

                    <div class='row'>
                        <!--Creacion de cada una de las filas donde se encuentran algunos elementos del formulario de registro-->
                        <div class='input-field col s12 l6 m6'>
                            <!--Definicion del tipo de campo a crear-->
                            <input class='validate' type='text' name='usuario_admin' id='usuario_admin' onfocusout="validateUsuario()"/>
                            <span class="helper-text"></span>
                            <label for='usuario_admin'>Usuario</label>                                            
                        </div>


                        <div class='input-field col s12 l6 m6'>
                            <!--Definicion del tipo de campo a crear-->
                            <input class='validate' type='password' name='contra_admin' id='contra_admin' onfocusout="validateContraseña()"/>
                            <span class="helper-text"></span>  
                            <label for='contra_admin'>Contraseña</label>                                         
                        </div>
                    </div>
                    <div class='row'>
                        <!--Creacion de cada una de las filas donde se encuentran algunos elementos del formulario de registro-->
                        <div class='input-field col s12 l6 m6'>
                            <!--Definicion del tipo de campo a crear-->
                            <input class='validate' type='text' name='telefono_admin' id='telefono_admin' onfocusout="validateTelefono()"/>
                            <span class="helper-text"></span>     
                            <label for='telefono_admin'>Telefono</label>                                       
                        </div>


                        <div class='input-field col s12 l6 m6'>
                            <!--Definicion del tipo de campo a crear-->
                            <input class='validate' type='email' name='correo_admin' id='correo_admin' onfocusout="validateCorreo()"/>
                            <span class="helper-text"></span> 
                            <label for='correo_admin'>Correo</label>                                           
                        </div>

                    </div>
                    <div class="row">
                        <!--Creacion de cada una de las filas donde se encuentran algunos elementos del formulario de registro-->
                        <div class='input-field col s12 l12 m12'>
                            <!--Definicion del tipo de campo a crear-->
                            <input class='validate' type='text' name='direccion_admin' id='direccion_admin' onfocusout="validateDireccion()"/>
                            <span class="helper-text"></span>
                            <label for='direccion_admin'>Direccion</label>                
                        </div>
                    </div>
                        <!--<div class="row">-->
                        <!--Creacion de cada una de las filas donde se encuentran algunos elementos del formulario de registro-->
                        <!-- <div class="file-field input-field"> -->
                        <!--Definicion del tipo de campo a crear-->
                        <!-- <div class=""> -->
                        <!-- <span class="btn blue">Foto</span>
                                <input type="file"> -->
                        <!--  </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div> -->


                    <div class='row'>
                        <!--Creacion de cada una de las filas donde se encuentran algunos elementos del formulario de registro-->
                        <button type='submit' name='btnRegistrarA' id="btnRegistrarA"
                            class='col s12 btn btn-large waves-effect indigo'>Registrarse</button>
                        <br><br><br><br>

                    </div>

                </form>
            </div>
        </div>

        </div>
        <!--Inclusion de archivos javascript que son necesarios para diversas funciones del sitio-->       
        </body>
        <?php
//Aplicacion del metodo footer en la pagina
  dashboard::footer('admin.js', 'registryValidator.js');
?>

        </html>