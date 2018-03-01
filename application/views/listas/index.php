<div class="uk-section uk-section-default">
    <div class="uk-container">
        <!-- <h1 class="uk-heading-divider"><i class="fas fa-map-marker-alt fa-lg"></i> Ubicación</h1> -->

        <div class="uk-grid-match uk-child-width-1-4@s" uk-grid>
            <a onClick="javascript:ir('vias')" style="text-decoration: none; cursor: pointer; color: currentColor; ">
            	<i class="fas fa-road fa-9x"></i>
            	<center style="font-size: 1.2em;">Vías</center>
            </a>

            <div>
            	<i class="fas fa-map-pin fa-9x"></i>
            	<center style="font-size: 1.1em;">Puntos de referencia</center>
            </div>

            <div>
            	<i class="far fa-building fa-9x"></i>
            	<center style="font-size: 1.1em;">Oficinas</center>
            </div>

            <div>
            	<i class="fa fa-home fa-9x"></i>
            	<center style="font-size: 1.1em;">Bloques</center>
            </div>

            <div>
            	<i class="fa fa-cubes fa-9x"></i>
            	<center style="font-size: 1.1em;">Aplicaciones</center>
            </div>

            <div>
            	<i class="fa fa-users fa-9x"></i>
            	<center style="font-size: 1.1em;">Usuarios</center>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	function ir(tipo){
		if(tipo == 'vias'){
			imprimir(tipo)
		}
	}
</script>