<nav class="uk-navbar-container uk-margin" style="
    position: fixed;
    right: 0;
    left: 0;
    top: 0;
    z-index: 1030;
    " uk-navbar>
    <div class="uk-navbar-center">
        <!-- <div class="uk-navbar-center-left">
            <div>
                <ul class="uk-navbar-nav">
                    <li><a href="#">Suite de</a></li>
                </ul>
            </div>
        </div> -->
        
        <!-- Recorrido de los proyectos -->
        <?php foreach ($this->inicio_model->obtener("proyectos") as $proyecto) { ?>
            <!-- Logos -->
            <a class="uk-navbar-item uk-logo" onCLick="javascript:listar(<?php echo $proyecto->Pk_Id; ?>)" disabled>
                <img src="<?php echo base_url(); ?>img/logos/<?php echo $proyecto->Logo; ?>" width="70" title="Ver aplicaciones de <?php echo $proyecto->Nombre; ?>">
            </a>
        <?php } ?>

        <!-- <div class="uk-navbar-center-right">
            <div>
                <ul class="uk-navbar-nav">
                    <li><a href="#">aplicaciones</a></li>
                </ul>
            </div>
        </div> -->
    </div>
</nav>

<div id="cont_aplicaciones"></div>

<script type="text/javascript">
    function listar(id_proyecto)
    {
        cargar_interfaz("cont_aplicaciones","<?php echo site_url('inicio/cargar_interfaz'); ?>", {"tipo": "aplicaciones", "id_proyecto": id_proyecto});
    }

    // Cuando el DOM esté listo
    $(document).ready(function(){
        // Por defecto, listado de aplicaciones de Devimed
        listar(1);
    });
</script>