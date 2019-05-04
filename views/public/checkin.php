<?php
//Inclusion del archivo public_pages.php
include "../../core/helpers/public_pages.php";
public_pages::header('Registro');//aplicacion del header y envio del parametro titulo
?>
    <!--Aplicacion del logo de maka store en la pagina-->
    <header class="center">
        <img src="../../resource/img/logo/logoMKStore.png">
        <header>
            <!--Creacion  del container donde se encuentra el formulario de registro-->
            <div class="container">
                <!--Creacion de la zon¿a del formulario-->
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <img src="../../resource/img/img-card/registro.png">
                    <!--Creacion del text input en el formulario-->
                    <form class="col s12" method="post" id="form-createC">
                        <div class='row'>
                            <div class='col s12'>
                            </div>
                        </div>
                        <div class='row'>
                            <!--Creacion del text input en el formulario-->
                            <div class='input-field col s12 l6 m6'>
                                <input class='validate' type='text' name='nombre' id='nombre' onfocusout="validateNombre()"/>
                                <span class="helper-text"></span>
                                <label for='nombre'>Nombre</label>
                            </div>

                            <!--Creacion del text input en el formulario-->
                            <div class='input-field col s12 l6 m6'>
                                <input class='validate' type='text' name='apellido' id='apellido' onfocusout="validateApellido()"/>
                                <span class="helper-text"></span>
                                <label for='apellido'>Apellido</label>
                            </div>
                        </div>

                        <div class='row'>
                            <!--Creacion del text input en el formulario-->
                            <div class='input-field col s12 l6 m6'>
                                <input class='validate' type='text' name='usuario' id='usuario' onfocusout="validateUsuario()"/>
                                <span class="helper-text"></span>
                                <label for='usuario'>Usuario</label>
                            </div>

                            <!--Creacion del text input en el formulario-->
                            <div class='input-field col s12 l6 m6'>
                                <input class='validate' type='password' name='contra' id='contra' onfocusout="validateContraseña()"/>
                                <span class="helper-text"></span>
                                <label for='contra'>Contraseña</label>
                            </div>
                        </div>
                        <div class='row'>
                            <!--Creacion del text input en el formulario-->
                            <div class='input-field col s12 l6 m6'>
                                <input class='validate' type='text' name='telefono' id='telefono' onfocusout="validateTelefono()"/>
                                <span class="helper-text"></span>
                                <label for='telefono'>Telefono</label>
                            </div>

                            <!--Creacion del text input en el formulario-->
                            <div class='input-field col s12 l6 m6'>
                                <input class='validate' type='email' name='correo' id='correo' onfocusout="validateCorreo()"/>
                                <span class="helper-text"></span>
                                <label for='correo'>Correo</label>
                            </div>

                            <div class="row">
                                <!--Creacion del text input en el formulario-->
                                <div class='input-field col s12 l12 m12'>
                                    <input class='validate' type='text' name='direccion' id='direccion' onfocusout="validateDireccion()"/>
                                    <span class="helper-text"></span>
                                    <label for='direccion'>Direccion</label>
                                </div>
                                <input class='validate' type='hidden' name='estado' id='estado' value="1" />
                            </div>
                            <!--Creacion del container y el modal para mostrar los terminos y condiciones de la tienda-->
                            <div class="container">
                                <a class=" modal-trigger" href="#modalT">Terminos y condiciones</a>
                                <!--Creacion del modal con los terminos y condiciones-->
                                <div id="modalT" class="modal">
                                    <div class="modal-content">
                                        <h4>Terminos y condiciones</h4>
                                        <p>Términos y Condiciones de Uso</p>
                                        <p> INFORMACIÓN RELEVANTE </p>
                                        <p> Es requisito necesario para la adquisición de los productos que se ofrecen en este
                                            sitio, que lea y acepte los siguientes Términos y Condiciones que a continuación
                                            se redactan. El uso de nuestros servicios así como la compra de nuestros productos
                                            implicará que usted ha leído y aceptado los Términos y Condiciones de Uso en
                                            el presente documento. Todas los productos que son ofrecidos por nuestro sitio
                                            web pudieran ser creadas, cobradas, enviadas o presentadas por una página web
                                            tercera y en tal caso estarían sujetas a sus propios Términos y Condiciones.
                                            En algunos casos, para adquirir un producto, será necesario el registro por parte
                                            del usuario, con ingreso de datos personales fidedignos y definición de una contraseña.
                                            </p>
                                        <p> El usuario puede elegir y cambiar la clave para su acceso de administración de la
                                            cuenta en cualquier momento, en caso de que se haya registrado y que sea necesario
                                            para la compra de alguno de nuestros productos. MaKa Store no asume la responsabilidad
                                            en caso de que entregue dicha clave a terceros. Todas las compras y transacciones
                                            que se lleven a cabo por medio de este sitio web, están sujetas a un proceso
                                            de confirmación y verificación, el cual podría incluir la verificación del stock
                                            y disponibilidad de producto, validación de la forma de pago, validación de la
                                            factura (en caso de existir) y el cumplimiento de las condiciones requeridas
                                            por el medio de pago seleccionado. En algunos casos puede que se requiera una
                                            verificación por medio de correo electrónico. </p>
                                        <p> Los precios de los productos ofrecidos en esta Tienda Online es válido solamente
                                            en las compras realizadas en este sitio web. </p>
                                        <p> LICENCIA </p>
                                        MaKa Store a través de su sitio web concede una licencia para que los usuarios utilicen los productos que son vendidos en
                                        este sitio web de acuerdo a los Términos y Condiciones que se describen en este documento.
                                        <p> USO NO AUTORIZADO
                                            <p>
                                                <p> En caso de que aplique (para venta de software, templetes, u otro producto
                                                    de diseño y programación) usted no puede colocar uno de nuestros productos,
                                                    modificado o sin modificar, en un CD, sitio web o ningún otro medio y
                                                    ofrecerlos para la redistribución o la reventa de ningún tipo. </p>
                                                <p> PROPIEDAD </p>
                                                <p> Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros
                                                    productos, modificado o sin modificar. Todos los productos son propiedad
                                                    de los proveedores del contenido. En caso de que no se especifique lo
                                                    contrario, nuestros productos se proporcionan sin ningún tipo de garantía,
                                                    expresa o implícita. En ningún esta compañía será responsables de ningún
                                                    daño incluyendo, pero no limitado a, daños directos, indirectos, especiales,
                                                    fortuitos o consecuentes u otras pérdidas resultantes del uso o de la
                                                    imposibilidad de utilizar nuestros productos. </p>
                                                <p> COMPROBACIÓN ANTIFRAUDE </p>
                                                La compra del cliente puede ser aplazada para la comprobación antifraude. También puede ser suspendida por más tiempo para
                                                una investigación más rigurosa, para evitar transacciones fraudulentas.
                                                <p> PRIVACIDAD </p>
                                                <p> Este sitio web MaKa Store garantiza que la información personal que usted
                                                    envía cuenta con la seguridad necesaria. Los datos ingresados por usuario
                                                    o en el caso de requerir una validación de los pedidos no serán entregados
                                                    a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial
                                                    o requerimientos legales. </p>
                                                <p> La suscripción a boletines de correos electrónicos publicitarios es voluntaria
                                                    y podría ser seleccionada al momento de crear su cuenta. </p>
                                                <p> MaKa Store reserva los derechos de cambiar o de modificar estos términos
                                                    sin previo aviso.</p>
                                            </p>
                                    </div>
                                    <!--Boton para cerrar modal-->
                                    <div class="modal-footer">
                                        <a href="#" class="btn blue modal-close">Cerrar</a>
                                    </div>
                                </div>
                            </div>

                            <p>
                                <label>
                                    <!--Creacion del checkbox para aceptar terminos y condiciones-->
                                    <input type="checkbox" name="check" id="check" />
                                    <span>He leido y acepto los terminos y condiciones</span>
                                </label>
                            </p>
                        </div>


                        <!--Boton registrarse-->
                        <div class='row'>
                            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Registrarse</button>
                            <br>
                            <br>
                            <br>
                            <br>
                            <!--Enlace para ir a la pagina de login-->
                            <h5>
                                <a href="login.php" class="blue-text">Ingresa</a>
                            </h5>
                        </div>

                    </form>
                </div>
            </div>
    
            </div>         
            <script type="text/javascript" src="../../core/helpers/customerRegistrationValidator.js"></script>       
            <?php
//aplicacion del footer a la pagina
 public_pages::footer('customer.js');
?>

                </html>