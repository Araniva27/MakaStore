<?php
//inclusion de header, navbar y envio del parametro titulo
  include "../../core/helpers/dashboard.php";
  dashboard::header("Modificacion de datos");//Aplicacion del metodo header y envio del parametro titulo
  dashboard::navbar();//aplicacion del navbar a la pagina 
?>
    <!--Titulo de la pagina-->
    <div class="container">
        <div class="card-panel blue">
            <div class="jumbotron" id="tagline">
                <h3 class="white-text center">Modificacion de datos</h3>

            </div>
        </div>

    </div>
    <!--Creacion del container donde se encuentran los elementos de modificacion de informacion-->
    <div class="container">
        <form class="col s12" method="post">
            <div class='row'>
                <div class='col s12'>
                </div>
            </div>
            <div class='row'>
                <!--Creacion de campos donde se ingresan los datos-->
                <div class='input-field col s12 l6 m6'>
                    <input class='validate' type='text' name='name' id='name' />
                    <label for='name'>Nombre</label>
                </div>

                <!--Creacion de campos donde se ingresan los datos-->
                <div class='input-field col s12 l6 m6'>
                    <input class='validate' type='text' name='apellido' id='apellido' />
                    <label for='name'>Apellido</label>
                </div>
            </div>

            <div class='row'>
                <!--Creacion de campos donde se ingresan los datos-->
                <div class='input-field col s12 l6 m6'>
                    <input class='validate' type='text' name='usuario' id='usuario' />
                    <label for='username'>Usuario</label>
                </div>

                <!--Creacion de campos donde se ingresan los datos-->
                <div class='input-field col s12 l6 m6'>
                    <input class='validate' type='text' name='telefono' id='telefono' />
                    <label for='phone'>Telefono</label>
                </div>
            </div>
            <div class='row'>



                <!--Creacion de campos donde se ingresan los datos-->
                <div class='input-field col s12 l6 m6'>
                    <input class='validate' type='email' name='correo' id='correo' />
                    <label for='email'>Correo</label>
                </div>
                <div class='input-field col s12 l6 m6'>
                    <input class='validate' type='text' name='telefono' id='telefono' />
                    <label for='phone'>Direccion</label>
                </div>
            </div>
            <div class="row">
                <!--Creacion de campos donde se ingresan los datos-->

            </div>
            <div class="row">
                <!--Creacion de campos donde se ingresan los datos-->
                <div class="file-field input-field">
                    <div class="">
                        <span class="btn blue">Foto</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <!--Creacion de boton para modificar datos-->
            <div class="row center">
                <div class="col offset-l3 offset-m3 offset-s2">
                    <a class="waves-effect waves-light btn green">
                        <i class="material-icons left">update</i>Actualizar datos</a>
                    <a class="waves-effect waves-light btn grey" href="password_mod.php">
                        <i class="material-icons left">update</i>Actualizar contraseña</a>
                    <br>
                    <br>
                </div>

            </div>
        </form>
    </div>
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