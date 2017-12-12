	<?php
// Se consulta la medición
$medicion_temporal = $this->roceria_model->obtener("medicion_temporal", $id_medicion_temporal);
// $medicion_temporal = $this->roceria_model->obtener("medicion_temporal", $id_medicion_temporal);
// print_r($medicion_temporal);

// Se consulta los ítems a medir
$tipos_mediciones = $this->configuracion_model->obtener("tipos_mediciones");
// print_r($tipos_mediciones);

// Se consulta los costados de la vía a medir
$costados = $this->configuracion_model->obtener("costados", $medicion_temporal->Fk_Id_Via);
// print_r($costados);
// Se consulta los costados de la vía a medir
$calificaciones = $this->configuracion_model->obtener("calificaciones");
// print_r($costados);

?>
<!-- <input type="hidden" id="abscisa_medicion" value="<?php // echo $medicion_temporal->Abscisa_Inicial; ?>"> -->

<div id="mediciones">
	<h3 class="uk-heading-bullet">Kilómetro <?php echo ($medicion_temporal->Abscisa_Inicial/1000) ?></h3>
	<div id="medicion">
		<h5 class="uk-heading-divider">&nbsp;</h5>

		<div class="contenedor" id="cinco">
			<img class="icon" src="<?php echo base_url(); ?>img/5.png">
		</div>

		<div class="contenedor" id="cuatro">
			<img class="icon" src="<?php echo base_url(); ?>img/4.png">
		</div>

		<div class="contenedor" id="tres">
			<img class="icon" src="<?php echo base_url(); ?>img/3.png">
		</div>

		<div class="contenedor" id="dos">
			<img class="icon" src="<?php echo base_url(); ?>img/2.png">
		</div>

		<div class="contenedor" id="uno">
			<img class="icon" src="<?php echo base_url(); ?>img/1.png">
		</div>

		<div class="contenedor" id="cero">
			<p class="texto"><b>FE</b></p>
		</div>
	</div>
	<div class="separador"></div>

	<?php foreach ($tipos_mediciones as $tipo_medicion) { ?>
		<?php foreach ($costados as $costado) { ?>
			<div id="medicion">
				<h5 class="uk-heading-divider"><?php echo $costado->Codigo; ?></h5>

				<?php foreach ($calificaciones as $calificacion) { ?>
					<label>
						<div class="contenedor opacidad" id="<?php echo $calificacion->Clase; ?>" name="<?php echo "{$tipo_medicion->Pk_Id}_{$costado->Pk_Id}_{$calificacion->Valor}" ?>">
							<input class="uk-radio opacidad" type="radio" name='<?php echo "{$tipo_medicion->Pk_Id}_{$costado->Pk_Id}" ?>' onClick="javascript:marcar(<?php echo $tipo_medicion->Pk_Id; ?>, <?php echo $costado->Pk_Id; ?>, <?php echo $calificacion->Valor; ?>)">
						</div>
					</label>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="separador"></div>
	<?php } ?>
</div>

<script type="text/javascript">
	function marcar(tipo_medicion, costado, calificacion)
	{
		$("div[name^='" + tipo_medicion + "_" + costado + "']").addClass('opacidad');
		$("div[name='" + tipo_medicion + "_" + costado + "_" + calificacion + "']").removeClass("opacidad");
	}

	function anterior()
	{
		datos = {
	    	"tipo": "medicion_roceria",
	    	"abscisa_inicial": $("#abscisa_inicial").val(),
	    	"abscisa_final": parseFloat($("#abscisa_final").val()) - 1000
	    }

		// Se carga la interfaz de medición
		cargar_interfaz("contenedor_principal", "<?php echo site_url('configuracion/cargar_interfaz'); ?>", datos);
	}

	function siguiente()
	{
		datos = {
	    	"tipo": "medicion_roceria",
	    	"abscisa_inicial": $("#abscisa_inicial").val(),
	    	"abscisa_final": parseFloat($("#abscisa_final").val()) + 1000
	    }
	    imprimir(datos)

		// Se carga la interfaz de medición
		// cargar_interfaz("contenedor_principal", "<?php echo site_url('configuracion/cargar_interfaz'); ?>", datos);
	}
	
	$(document).ready(function(){
		// Botones del menú
		botones(Array("anterior", "siguiente", "terminar"));

		datos = {

		}
	});
</script>