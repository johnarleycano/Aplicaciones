<nav id="menu_superior" class="uk-navbar uk-navbar-container uk-margin" uk-navbar>
    <!-- Ícono que activa el menú lateral -->
    <a class="uk-navbar-toggle" href="#" uk-toggle="target: #offcanvas-nav" title="Visualice el menú principal" uk-tooltip="pos: right">
        <span uk-navbar-toggle-icon></span>
    </a>
    
    <!-- Menú derecho -->
    <div class="uk-navbar-right uk-hidden">
        <ul class="uk-iconnav">
            <li><a onClick="javascript:volver()" id="icono_volver" uk-icon="icon: reply; ratio: 2" title="Volver al panel" uk-tooltip="pos: bottom-center"></a></li>
        </ul>
    </div>
</nav>

<div class="uk-offcanvas-content">
    <div id="offcanvas-nav" uk-offcanvas="overlay: false; mode: push; flip: false;">
        <div id="menu_lateral" class="uk-offcanvas-bar">
            <ul class="uk-nav uk-nav-default">
                <li class="uk-active"><a onCLick="javascript:ir('aplicaciones')">INICIO</a></li>

                <li><a onCLick="javascript:ir('aplicaciones')"><i class="fas fa-cubes fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;Aplicaciones</a></li>
                <li><a onCLick="javascript:ir('listas')"><i class="far fa-list-alt fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;Listas</a></li>
                
                <li class="uk-nav-divider"></li>
                <li><a href="<?php echo site_url('sesion/cerrar'); ?>"><i class="fas fa-sign-out-alt fa-lg"></i>&nbsp;&nbsp;&nbsp;Salir</a></li>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    function ir(tipo)
    {
        switch(tipo) {
            case 'aplicaciones':
                redireccionar("<?php echo site_url('aplicaciones'); ?>")
            break

            case 'inicio':
                redireccionar("<?php echo site_url(''); ?>")
            break

            case 'listas':
                redireccionar("<?php echo site_url('listas'); ?>")
            break
        }
    }
</script>