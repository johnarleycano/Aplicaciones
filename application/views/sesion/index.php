<?php
// Consulta de datos
$proyectos = $this->configuracion_model->obtener("proyectos");
$aplicacion = $this->configuracion_model->obtener("aplicacion", $id_aplicacion);
?>

<div class="uk-section uk-section-default">
    <div class="uk-container">
    	<center>
	        <h2>Sistema de administración de aplicaciones</h2>
        	<h2 class="uk-text-muted"><?php echo $aplicacion->Nombre; ?></h2>
    	</center>
        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
            <div>
                <p>
                	<center>
                	<!-- Se listan los proyectos -->
                	<?php foreach($proyectos as $proyecto){ ?>
                			<img class="uk-responsive-width" src="<?php echo base_url()."img/logos/$proyecto->Logo"; ?>" width="140" title="<?php echo $proyecto->Nombre; ?>" uk-tooltip="pos: top-center">
                	<?php } ?>
                	</center>
                </p>
            </div>
            <div>
                <p><?php echo $aplicacion->Descripcion; ?></p>
            </div>
            <div>
                <form>
				    <fieldset class="uk-fieldset">
				        <div class="uk-margin">
				            <input class="uk-input uk-form-large" id="login" title="nombre de usuario" type="text" placeholder="Nombre de usuario" autofocus>
				        </div>
				        <div class="uk-margin">
				            <input class="uk-input uk-form-large" id="clave" title="contraseña" type="password" placeholder="Contraseña">
				        </div>
				        <p uk-margin>
    						<input type="submit" class="uk-button uk-button-secondary uk-button-large uk-width-1-1" value="ingresar a <?php echo $aplicacion->Nombre; ?>">
    					</p>
				    </fieldset>
				</form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		// Botón iniciar sesión
		$("form").on("submit", function(){
			cerrar_notificaciones();
			imprimir_notificacion("<div uk-spinner></div> Iniciando sesión...");

			campos_obligatorios = {
				"login": $("#login").val(),
				"clave": $("#clave").val()
			}
			// imprimir(campos_obligatorios);

			// Si existen campos obligatorios sin diligenciar
			if(validar_campos_obligatorios(campos_obligatorios)){
				return false;
			}

			// Se consulta los datos del usuario
            usuario = ajax("<?php echo site_url('sesion/validar'); ?>", {"usuario": $("#login").val(), "clave": $("#clave").val()}, 'JSON');
            // imprimir(usuario, "tabla");

            // Si no existe el usuario con esas credenciales
            if (!usuario) {
				cerrar_notificaciones();
				imprimir_notificacion(`<span uk-icon='icon: bolt'></span> El usuario y contraseña que ha digitado no existen en la base de datos. Por favor verifique e intente nuevamente, o comuníquese con el área de sistemas.`, "danger");

            	return false;
            }

            // Si el usuario está desactivado
			if (usuario.Estado != 1) {
				cerrar_notificaciones();
				imprimir_notificacion(`<span uk-icon='icon: bolt'></span> El acceso para ${usuario.Nombres} ${usuario.Apellidos} se encuentra desactivado y no puede iniciar sesión. Para mayor información, comuníquese con el área de sistemas.` , "danger");

            	return false;
			}

			// Se consulta el acceso a la aplicación
			permiso = ajax("<?php echo site_url('sesion/validar_permiso'); ?>", {"id_usuario": usuario.Pk_Id_Usuario, "id_aplicacion": <?php echo $id_aplicacion ?>}, 'JSON');

			// Si no tiene permiso de acceder a la aplicación
			if (!permiso) {
				cerrar_notificaciones();
				imprimir_notificacion(`<span uk-icon='icon: bolt'></span> ${usuario.Nombres} ${usuario.Apellidos} no tiene acceso autorizado a <?php echo $aplicacion->Nombre; ?> y la sesión no puede ser iniciada. Para mayor información, comuníquese con el área de sistemas`, "danger");

            	return false;
			}
			
			// Se inicia la sesión
			ajax("<?php echo site_url('sesion/conectar'); ?>", {"datos_usuario": usuario, "redirect": $("#redirect").val(), "url": "<?php echo $aplicacion->Url; ?>"}, 'HTML');

			window.location.replace(`<?php echo $aplicacion->Url; ?>index.php/sesion`)

			return false;
		});
	});
</script>