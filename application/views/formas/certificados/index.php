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
									<div class="signup-box" id="exito" hidden>
										<h1 class="titulo">Certificados disponibles</h1>
										
										<form class="signup-form">
											<h2>Los datos fueron registrados exitosamente. Ahora puede descargar los certificados:</h2>
											
											<div class="divider"></div>

											<div class="section">
												<div class="row">
      												<div class="col s12">
      													<a class="waves-effect waves-light btn-large" href="http://www.devimed.com.co/wp-content/uploads/2018/04/Certificado-de-calibracion-Manantiales-2018.pdf" target="blank" download>Báscula Manantiales</a>
      												</div>
  												</div>
												<div class="row">
      												<div class="col s12">
      													<a class="waves-effect waves-light btn-large" href="http://www.devimed.com.co/wp-content/uploads/2018/04/Certificado-de-calibracion-Puerto-Triunfo-2018.pdf" target="blank" download>Báscula Puerto Triunfo</a>
      												</div>
  												</div>
											</div>
										</form>
									</div>
									<div class="signup-box" id="formulario">
										<!-- <img src="<?php // echo base_url(); ?>img/logos/devimed.png" class="logo"> -->
										<h1 class="titulo">Certificado de báscula</h1>

										<form class="signup-form">
											<h2>Diligencie los datos a continuación para generar el certificado</h2>

											<div class="divider"></div>

											<div class="section">
												<div class="input-field">
													<label for="nombre">Nombre completo</label>
													<input type="text" id="nombre" title="Nombre">
												</div>

												<div class="input-field">
													<label for="identificacion">Número de identificación</label>
													<input type="text" id="identificacion" title="Número de identificación">
												</div>

												<div class="input-field">
													<select id="genero" title="Género">
														<option value="" disabled selected>Elija un género</option>
														<option value="1">Femenino</option>
														<option value="2">Masculino</option>
													</select>
												</div>

												<div class="input-field">
													<input id="email" type="email" class="validate" title="Correo electrónico">
													<label for="email">Correo electrónico</label>
													<span class="helper-text" data-error="Formato de correo no válido" data-success=""></span>
												</div>

												<div class="input-field">
													<label for="telefono">Número telefónico</label>
													<input type="text" id="telefono" title="Número telefónico">
												</div>

												<p>
													<label>
														<input type="checkbox" id="politica_datos" />
														<span>He leido y acepto la <a href="http://www.devimed.com.co/wp-content/uploads/2018/04/001-Politica-de-Tratamiento-de-Datos-Devimed-Version-001.pdf" onclick="window.open(this.href, '_blank', 'width=720, height=480'); return false;">política de tratamiento de datos</a></span>
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
						"nombre": $("#nombre").val(),
						"identificacion": $("#identificacion").val(),
						"genero": $("#genero").val(),
						"email": $("#email").val(),
						"telefono": $("#telefono").val(),
					}
					// imprimir(campos_obligatorios);
					
					// Si existen campos obligatorios sin diligenciar
					if(validar_campos_obligatorios(campos_obligatorios)){
						return false;
					}

					// Si no ha aceptado la política de tratamiento de datos
					if (!$("#politica_datos").is(':checked')) {
						cerrar_notificaciones();
						imprimir_notificacion(`<span uk-icon='icon: bolt'></span> Por favor acepte que ha leído la política de tratamiento de datos` , "danger");

						return false;
					}

					datos = {
						"Nombre": $("#nombre").val(),
						"Identificacion": $("#identificacion").val(),
						"Genero": $("#genero").val(),
						"Email": $("#email").val(),
						"Telefono":  $("#telefono").val(),
						"Fecha": "<?php echo date('Y-m-d H:i:s'); ?>",
					}
					
					// Se guarda el registro en base de datos
            		registro = ajax("<?php echo site_url('formas/insertar'); ?>", {"tipo": "usuario_registrado", "datos": datos}, 'JSON')

            		if(registro) {
						$("#formulario").hide()
						$("#exito").removeAttr('hidden')
            		}

            		cerrar_notificaciones()
					imprimir_notificacion("Datos ingresados correctamente.", "success")

					return false
				})
			})
		</script>

		<!-- Pié de página -->
        <?php $this->load->view('core/footer'); ?>
	</body>
</html>