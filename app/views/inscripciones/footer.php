<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
		</div>

	
	</div>
	<!-- SCRIPTS -->
	<?php  echo link_tag('css/estilos.css');  ?>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	 

	<!-- componente fecha simple -->
	<?php echo link_tag('css/bootstrap-datepicker.css'); ?>
	
	<!-- componente rango fecha -->
	<?php echo link_tag('css/daterangepicker-bs3.css'); ?>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.form.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/spin.min.js"></script>

	<!-- componente fecha simple -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>

	<!-- componente rango fecha -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/moment.js"></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>js/daterangepicker.js"></script>		
	
	<!-- nuestro js principal -->

	<script type="text/javascript" src="<?php echo base_url(); ?>js/sistema.js"></script>
	
	<!--para conversion a base64.encode y base64.decode -->
	<script src="<?php echo base_url(); ?>js/base64/jquery.base64.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/base64/jquery.base64.min.js" type="text/javascript"></script>
	
	<!-- <div class="container-fluid foot">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span>Universidad de Negocios ISEC Portal para Aspirantes | 2015</span>
				</div>
			</div>
		</div>
	</div>-->

</body>
</html>