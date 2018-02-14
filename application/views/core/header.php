<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Título que viene desde el controlador de cada interfaz -->
<title><?php echo $titulo; ?> | Configuración</title>

<!-- Scripts -->
<script src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>

<?php if(ENVIRONMENT === 'development') { ?>
	<!-- Estilos -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/uikit.css" />

	<!-- Scripts -->
	<script src="<?php echo base_url(); ?>js/uikit.js"></script>
	<script src="<?php echo base_url(); ?>js/uikit-icons.js"></script>
<?php } ?>

<?php if(ENVIRONMENT === 'production') { ?>
	<!-- Estilos -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/uikit.min.css" />

	<!-- Scripts -->
	<script src="<?php echo base_url(); ?>js/uikit.min.js"></script>
	<script src="<?php echo base_url(); ?>js/uikit-icons.min.js"></script>
<?php } ?>

<script src="<?php echo base_url(); ?>js/funciones.js"></script> <!-- Funciones generales -->