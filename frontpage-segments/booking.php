<?php

/**
 * The template for displaying "Booking" segment section 
 *
 * Possibility of booking restaurant places from front page.
 * Reservation are stored and administrated in Admin Panel.
 *
 * @package larestaurante
 */

?>
<section id="booking" class="booking bg-light-gray">

<div class="container booking"> 	  
 <div class="row">
	
	<div class="col-lg-12 text-center">
		<h1 class="respo m-bt-title header-front"><?php _e ('Booking','larestaurante') ?></h1>
		<h2 class="subtitle" id="bookit"><?php _e('Click here to open booking','larestaurante');?></h2>
		<?php echo do_shortcode( '[booking-form]' ); ?>
		http://doc.themeofthecrop.com/plugins/restaurant-reservations/developer/
	</div>	
</div>