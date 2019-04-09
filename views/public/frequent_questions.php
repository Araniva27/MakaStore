<?php
//Inclusion de archivo public_pages.php
    include "../../core/helpers/public_pages.php";
    public_pages::header('Preguntas frecuentes');//Aplicacion del header y envio de parametro titulo
?>

	<body>
		<!--Contenedor con las tajetas de las preguntas-->
		<div class="container">
			<img class="responsive-img" src="../../resource/img/img-card/preguntas.jpeg">
			<!--Imagen de preguntas frecuentes-->
			<div class="row">
				<div class="col s12 m12">
					<div class="card">
						<!--Tajeta con pregunta y respuesta-->
						<div class="card-content black-text">
							<span class="card-title">¿Cómo me registro?</span>
							<!--Texto en la tajeta-->
							<p>Fácil y sencillo, solo debes de dirigirte a nuestro menú, en él se ecnetra la opción de registrarse, has click en
								ella y listo, solo debes de agregar la información necesaria para terminar este proceso.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<div class="card">
						<!--Tajeta con pregunta y respuesta-->
						<div class="card-content black-text">
							<span class="card-title">¿Cómo hago un pedido?</span>
							<p>Solo debes de elegir el producto que deseas y añadirlo al carrito de compras, en esa sección podras ver una pequeña
								descripción del producto junto con su precio y podrás añadir la cantidad que deseas comprar.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<div class="card">
						<!--Tajeta con pregunta y respuesta-->
						<div class="card-content black-text">
							<span class="card-title">¿Puedo hacer cambios en mi pedido?</span>
							<!--Texto en la tajeta-->
							<p>No. Una vez que hayas finalizado tu pedido online no podrás añadir o eliminar productos o cambiar las cantidades.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<div class="card">
						<!--Tajeta con pregunta y respuesta-->
						<div class="card-content black-text">
							<span class="card-title">¿Puedo añadir comentarios a los productos?</span>
							<!--Texto en la tajeta-->
							<p>Por supuesto que puedes, al entrar en nuestra página de productos solo debes de dar click en el boton "Añadir comentario"
								situado en la parte inferior de cada una de las tarjetas que se te mostrarán". </p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<div class="card">
						<!--Tajeta con pregunta y respuesta-->
						<div class="card-content black-text">
							<span class="card-title">No encuentro respuesta a mi pregunta</span>
							<!--Texto en la tajeta-->
							<p>¡No te preocupes! Puedes ponerte en contacto con nosotros a través de nuestro correo electrónico o mediante nuestro
								número de teléfono</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<div class="card">
						<!--Tajeta con pregunta y respuesta-->
						<div class="card-content black-text">
							<span class="card-title">¿Cuánto cuesta el envio del producto?</span>
							<!--Texto en la tajeta-->
							<p>¡Estás de suerte! Los envios en nuestra empresa son totalmente gratis, no debes de preocuparte por montos extra.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<div class="card">
						<!--Tajeta con pregunta y respuesta-->
						<div class="card-content black-text">
							<span class="card-title">¿Cuánto tarda en llegar mi pedido?</span>
							<p>Todo depende de la dirección que nos proporciones, si vives en el área de San Salvador tu pedido demorará aproximadamente
								tres días.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Inclusion de archivos javascript necesarios para la funcionalidad de la pagina-->
		<script src="../../resource/js/jquery-3.3.1.min.js"></script>
		<script src="../../resource/js/materialize.min.js"></script>
		<script src="../../resource/js/initialization.js"></script>
	</body>

	<?php
	//Aplicacion del footer
   public_pages::footer();
?>

		</html>