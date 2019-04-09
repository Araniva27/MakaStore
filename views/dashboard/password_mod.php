<?php
//inclusion de header, navbar y envio del parametro titulo
  include "../../core/helpers/dashboard.php";
  dashboard::header("Modificacion de contraseña");//Aplicacion del metodo header y envio del parametro titulo
  dashboard::navbar();//aplicacion del navbar a la pagina 
?>
    <!--Titulo de la pagina-->
    <div class="container">
        <div class="card-panel blue">
            <div class="jumbotron" id="tagline">
                <h3 class="white-text center">Modificacion de contraseña</h3>
            </div>
        </div>

    </div>
    <!--Creacion del container donde se encuentra el formualario de modificiacion de contraseña-->
    <div class="container">
        <form class="col s12" method="post">
            <div class='row'>
                <!--Creacion de campos donde se ingresan los datos-->
                <div class='input-field col s12 l6 m6 offset-l3 offset-m3'>
                    <input class='validate' type='password' name='passwordA' id='passwordA' />
                    <label for='name'>Contraseña actual</label>
                    <div class="row center">
                        <a class="waves-effect waves-light btn green center-align">
                            <i class="material-icons left">check</i>Verificar</a>
                    </div>
                </div>

            </div>
            <div class='row'>
                <!--Creacion de campos donde se ingresan los datos-->
                <div class='input-field col s12 l6 m6'>
                    <input class='validate' type='password' name='newPass' id='newPass' />
                    <label for='name'>Nueva contraseña</label>
                </div>
                <!--Creacion de campos donde se ingresan los datos-->
                <div class='input-field col s12 l6 m6'>
                    <input class='validate' type='password' name='verPass' id='verPass' />
                    <label for='name'>Verificacion de contraseña</label>
                </div>
            </div>
            <!--Creacion de boton para modificar datos-->
            <div class="row center">
                <a class="waves-effect waves-light btn green">
                    <i class="material-icons left">update</i>Actualizar contraseña</a>
            </div>

        </form>
    </div>
    <br>

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