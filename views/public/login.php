<?php
//Inclusion del archivo public_pages.php
  include "../../core/helpers/public_pages.php";
  public_pages::header('Login');//Colocacion del header y envio del parametro titulo
?>
    <!--Logo de Maka Store como logo-->
    <header class="center">
        <img src="../../resource/img/logo/logoMKStore.png">
        <header>
            <!--Contenedor con los elementos del formulario de login-->
            <div class="container">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <img src="../../resource/img/img-card/usuario.png">
                    <!--Imagen del login-->
                    <form class="col s12" method="post">
                        <!--Creacion del formulario-->
                        <!-- <div class='row'>
                <div class='col s12'>
                </div>
            </div>-->

                        <div class='row'>
                            <!--FIla con elementos del formulario-->
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='username' id='email' />
                                <!--Colocacion del campo usuario-->
                                <label for='username'>Usuario</label>
                            </div>
                        </div>

                        <div class='row'>
                            <!--FIla con elementos del formulario-->
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password' id='password' />
                                <!--Colocacion del campo contraseña-->
                                <label for='password'>Contraseña</label>
                            </div>

                        </div>


                        <br/>

                        <div class='row'>
                            <!--FIla con el boton de registrar-->
                            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Ingresar</button>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h5>
                                <a href="checkin.php" class="blue-text">Registrarse</a>
                            </h5>
                            <!--Enlace para registrarse-->
                        </div>

                    </form>
                </div>
            </div>



            </div>
            <!--Inclusion de archivos javascript-->
            <script src="../../resource/js/jquery-3.3.1.min.js"></script>
            <script src="../../resource/js/materialize.min.js"></script>
            <script src="../../resource/js/initialization.js"></script>
            </body>
            <?php
//Colocacion del footer
 public_pages::footer();
?>

                </html>