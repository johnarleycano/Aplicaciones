<!DOCTYPE html>
<html lang="es">
	<head>
		<!-- Cabecera con todos los estilos y scripts -->
        <?php $this->load->view('core/header'); ?>
		
		<!-- CSS de Materialize -->
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

		<!-- Fuentes adicionales -->
	  	<link href="https://fonts.googleapis.com/css?family=Montserrat|Oleo Script" rel="stylesheet">

		<!-- Estilos propios -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/estilos.css">
	
		<!-- Etiqueta meta para que ocupe todo el ancho del dispositivo, zoom en 100% y no permite hacer zoom1 -->
	  	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	
		<!-- Codificación de caracteres -->
		<meta charset="utf-8">

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<section id="main-container">
			<div class="container">
				<div class="row">
					<div class="col s10 push-s1">
						<div class="row" style="margin: 0; padding: 0;">
							<!-- Contenedor 3 -->
							<!-- Se va a ocultar en dispositivos móviles -->
							<div class="col m4 hide-on-small-only">
								<img src="<?php echo base_url(); ?>img/fondos/truck.jpg" class="truck">
							</div>
							
							<!-- Contenedor 2 -->
							<div class="col s12 m8">
								<div class="row">
									<div class="signup-box">
										<img src="<?php echo base_url(); ?>img/logos/devimed.png" class="logo">
										<h1 class="titulo">Certificado de báscula</h1>

										<form class="signup-form">
											<h2>Diligencie los datos a continuación para generar el certificado</h2>

											<div class="divider"></div>

											<div class="section">
												<div class="input-field">
													<label for="nombre">Nombre completo</label>
													<input type="text" id="nombre">
												</div>

												<div class="input-field">
													<label for="identificacion">Número de identificación</label>
													<input type="text" id="identificacion">
												</div>

												<div class="input-field">
													<select id="genero">
														<option value="" disabled selected>Elija un género</option>
														<option value="1">Femenino</option>
														<option value="2">Masculino</option>
													</select>
												</div>

												<div class="input-field">
													<input id="email" type="email" class="validate">
													<label for="email">Correo electrónico</label>
													<span class="helper-text" data-error="Formato de correo no válido" data-success=""></span>
												</div>

												<p>
													<label>
														<input type="checkbox" />
														<span>Acepto <a href="#">términos y condiciones</a></span>
													</label>
												</p>

												<button type="submit" class="btn waves-effect waves-light btn-signup">Descargar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Javascript de Materialize -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('select').formSelect();

				$("form").on("submit", function(){
					cerrar_notificaciones()
					imprimir_notificacion("<div uk-spinner></div> Validando la información...")

					campos_obligatorios = {
						"login": $("#login").val(),
						"clave": $("#clave").val()
					}
					// imprimir(campos_obligatorios);
					
					// Si existen campos obligatorios sin diligenciar
					if(validar_campos_obligatorios(campos_obligatorios)){
						return false;
					}

					return false
				})
			})
		</script>

		<!-- Pié de página -->
        <?php $this->load->view('core/footer'); ?>
	</body>
</html>