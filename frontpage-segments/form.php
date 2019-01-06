<?php

/**
 * The template for displaying "Form" segment section 
 *
 * Possibility of contact with sending email by Front End.
 * Configure your SMTP settings in Admin Panel before usage.
 *
 * @package LaRestaurante
 */

?>
<section id="contact" class="team bg-light-gray">

	<div class="container contact"> 	  
		<div class="row">
			<div  class="col-sm-12 col-lg-12  text-center">
			<h1 class="respo m-bt-title header-front"><?php _e ('Contact Us','larestaurante') ?></h1>
			</div> 
		</div>	
	<div class="row">
			<div  class="col-sm-12 col-lg-12">
		<?php echo do_shortcode('[pw_map]'); ?>
			</div> 
		</div>		 	
	 
	 <hr class="styled">
	</div>
</section>