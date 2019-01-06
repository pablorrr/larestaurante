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
		<?php if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
			
			/* Load JS scripts and CSS only on this page taken from https://contactform7.com/loading-javascript-and-stylesheet-only-when-it-is-necessary/*/
			
			 if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
					wpcf7_enqueue_scripts();
				}
			 
				if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
					wpcf7_enqueue_styles();
				}
			
					echo do_shortcode('[contact-form-7 id="164" title="Formularz 1"]');
		}?>
			</div> 
		</div>		 	
	 
	 <hr class="styled">
	</div>
</section>