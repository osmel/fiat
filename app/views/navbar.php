<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php 
	  $perfil= $this->session->userdata('id_perfil'); 


?>	

<div class="row-fluid">
	<div class="navbar navbar-default navbar-custom" role="navigation">
		<div class="container">
			
	 <?php  if ($this->session->userdata('session')) {  ?>
				<div class="navbar-brand">
					<a href="<?php echo base_url(); ?>" style="color: #ffffff;"><i class="glyphicon glyphicon-home"></i></a>
				</div>
				

				<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#main-navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
				<div class="collapse navbar-collapse" id="main-navbar">
					<ul class="nav navbar-nav navbar-left" id="menu_opciones">

					 <?php if ( ( $perfil == 1 ) ) { ?>
						<li>
							<a href="<?php echo base_url(); ?>usuarios" class="color-blanco">Usuarios</a> 
						</li>
					<?php } ?>	
			

						<li>
							<a href="<?php echo base_url(); ?>salir" class="color-blanco">Salir <i class="glyphicon glyphicon-log-out"></i></a>
						</li>
					</ul>
				</div>
	 <?php } ?>
		</div>
	</div>
</div>