<nav class="uk-navbar-container uk-margin" style="
position: fixed;
    right: 0;
    left: 0;
    top: 0;
    z-index: 1030;
    " uk-navbar>
    <div class="uk-navbar-center">

        <div class="uk-navbar-center-left"><div>
            <ul class="uk-navbar-nav">
                <li><a href="#">Suite de</a></li>
            </ul>
        </div></div>
        <a class="uk-navbar-item uk-logo" href="#"><img src="<?php echo base_url(); ?>img/logos/devimed.png" width="70"></a>
        <div class="uk-navbar-center-right"><div>
            <ul class="uk-navbar-nav">
                <li><a href="#">aplicaciones</a></li>
            </ul>
        </div></div>

    </div>
</nav>

<div class="uk-child-width-1-2@m" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-card; delay: 500; repeat: true" style="margin-top: 5.5em;">

	<?php foreach ($this->inicio_model->obtener("aplicaciones") as $aplicacion) { ?>
	    <div>
	        <div class="uk-card uk-card-default uk-card-body">
	        	<article class="uk-comment">
				    <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
				        <div class="uk-width-auto">
				            <img class="uk-comment-avatar" src="<?php echo base_url()."img/aplicaciones/".$aplicacion->Pk_Id.".png"; ?>" width="90" alt="">
				        </div>
				        <div class="uk-width-expand">
				            <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#"><?php echo $aplicacion->Nombre; ?></a></h4>

				            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
				                <li><a href="#"><?php echo $aplicacion->Tipo; ?></a></li>
				                <li><a href="#">Ver galería</a></li>
				            </ul>
				        </div>
				    </header>
				    <div class="uk-comment-body">
				        <p><?php echo $aplicacion->Descripcion; ?></p>
				    </div>
				</article>
				<p>
					<a class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom" href="<?php echo $aplicacion->Url; ?>" target="_blank">Ingresar</a>
				</p>
	        </div>
	    </div>
	<?php } ?>
</div>