<?php
//Inclusion del archivo public_pages.php
    include "../../core/helpers/public_pages.php";
    public_pages::header('Contáctanos');//Aplicacion del header y envio de parametro titulo
?>

	<body>
		<!---Creacion del contenedo con las tajetas con las formas de contacto -->
		<div class="container">
			<!--Creacion de fila con las tajetas-->
			<div class="row">
				<div class="col s12 m4 l4">
					<div class="card">
						<!--Creacion de tajeta-->
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="../../resource/img/img-card/facebook.png">
							<!--Imagen de la tajeta-->
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Facebook
								<i class="material-icons right">more_vert</i>
							</span>
							<p>
								<a href="http://facebook.com" target="_blank">Visitar</a>
							</p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Facebook
								<i class="material-icons right">close</i>
							</span>
							<p>Puedes ver más de nuestras tendencias y promociones en nuestra página de facebook MaKa Store.</p>
						</div>
					</div>
				</div>
				<div class="col s12 m4 l4">
					<div class="card">
						<!--Creacion de tajeta-->
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="../../resource/img/img-card/instagram.jpeg">
							<!--Imagen de la tajeta-->
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Instagram
								<i class="material-icons right">more_vert</i>
							</span>
							<p>
								<a href="http://instagram.com" target="_blank">Visitar</a>
							</p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Instagram
								<i class="material-icons right">close</i>
							</span>
							<p>Sigue nuestra cuenta en instagram y conoce muchos de nuestros videojuegos y consolas mas novedosos.</p>
						</div>
					</div>
				</div>
				<div class="col s12 m4 l4">
					<div class="card">
						<!--Creacion de tajeta-->
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="../../resource/img/img-card/contacto.png">
							<!--Imagen de la tajeta-->
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Otras formas de contacto
								<i class="material-icons right">more_vert</i>
							</span>

						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Otros
								<i class="material-icons right">close</i>
							</span>
							<p>Teléfono</p>
							<p>7864-4175</p>
							<p>Correo electrónico</p>
							<p>makastore@gmail.com</p>
						</div>
					</div>
				</div>

			</div>
			<!--Creacion de fila para el mapa-->
			<div class="row">
				<div class="col s12 m8 l8">
					<!--Creacion del video-container-->
					<div class="video-container">
						<!--Aplicaion del mapa-->
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.14483468983!2d-89.2465027856887!3d13.709676501963147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f63301e7cc64337%3A0xa5f36e559841e58a!2sCalle+El+Mirador+4714%2C+San+Salvador!5e0!3m2!1sen!2ssv!4v1549376609392"
						    width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>

				</div>
			</div>
			<!--Direccion-->
			<div class="col s12 m4 l4">
				<h5>Dirección</h5>
				<p>Calle El Mirador 4714-3, Colonia Escalón.</p>
			</div>
		</div>
		</div>
		<!--Inclusion de archivos javascrip para las funcionalidades del sitio-->
		<script src="../../resource/js/jquery-3.3.1.min.js"></script>
		<script src="../../resource/js/materialize.min.js"></script>
		<script src="../../resource/js/initialization.js"></script>
	</body>
	<?php
//Aplicacion del footer a la pagina
    public_pages::footer('cataloge.js');
?>

		</html>