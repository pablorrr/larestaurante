<?php

/**
 * The template for displaying "Gallery" segment section 
 *
 * Possibility of displaying gallery.
 * Select pictures in Admin Panel(theme options) before usage.
 *
 * @package LaRestaurante
 */

?>

<section id="gallery" class="gall bg-light-gray">
	<div class="container gallery">   
		<div class="row">
			<div  class="col-sm-12 col-lg-12 text-center">
				<h1 class="respo m-bt-title header-front"><?php _e ('Our Gallery','larestaurante') ?></h1>
			</div>
		</div>
		<?php
			//first get option value  social group , next single values opt field
			$cs_gallery_get_option_group  = cs_get_option('group_gallery');
			
			if ( !empty($cs_gallery_get_option_group)) {
				foreach($cs_gallery_get_option_group as $single ){
					if ( !empty($single['upload_pic_one']))
						$first_pic_opt_cs = $single['upload_pic_one'];
							else
						$first_pic_opt_cs = NULL;} 							
											
				 foreach($cs_gallery_get_option_group as $single ){
					if ( !empty($single['upload_pic_two']))
						$second_pic_opt_cs = $single['upload_pic_two'];
							else
						$second_pic_opt_cs = NULL;} 	

				foreach($cs_gallery_get_option_group as $single ){
					if ( !empty($single['upload_pic_three']))
						$third_pic_opt_cs = $single['upload_pic_three'];
							else
						$third_pic_opt_cs = NULL;} 
					
				foreach($cs_gallery_get_option_group as $single ){
					if ( !empty($single['upload_pic_four']))
						$fourth_pic_opt_cs = $single['upload_pic_four'];
							else
						$fourth_pic_opt_cs = NULL;} 	

			  foreach($cs_gallery_get_option_group as $single ){
					if ( !empty($single['upload_pic_five']))
						$fifth_pic_opt_cs = $single['upload_pic_five'];
							else
						$fifth_pic_opt_cs = NULL;} 
					
			  foreach($cs_gallery_get_option_group as $single ){
					if ( !empty($single['upload_pic_six']))
						$sixth_pic_opt_cs = $single['upload_pic_six'];
							else
						$sixth_pic_opt_cs = NULL;} 		
					
			}
			if ( !empty($first_pic_opt_cs )|| !empty($second_pic_opt_cs) || !empty($third_pic_opt_cs) || !empty($fourth_pic_opt_cs)|| !empty($fifth_pic_opt_cs) || !empty($sixth_pic_opt_cs)   ) :?>

		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="row gal-row">
					<!--first pic -->
					<?php if ( $first_pic_opt_cs):?>
					<div class="gal-col">
						<a href="<?php echo $first_pic_opt_cs;?>" data-toggle="lightbox"
							data-gallery="example-gallery" class="col-sm-4">
							<img class="gallery img-fluid anim" src="<?php echo $first_pic_opt_cs;?>" />
						</a>
					</div>
					<?php endif; ?>
					<!--second pic -->
					<?php if ( $second_pic_opt_cs):?>
					<div class="gal-col">
						 <a href="<?php echo $second_pic_opt_cs;?>" data-toggle="lightbox" 
							data-gallery="example-gallery" class="col-sm-4">
							<img class="gallery img-fluid anim" src="<?php echo $second_pic_opt_cs;?>" />
						 </a>
					</div> 
					<?php endif; ?>
					<!--third pic -->
					<?php if ( $third_pic_opt_cs):?>
					<div class="gal-col">
						<a href="<?php echo $third_pic_opt_cs;?>" data-toggle="lightbox" data-gallery="example-gallery"
						   class="col-sm-4">
							<img class="gallery img-fluid anim"  src="<?php echo $third_pic_opt_cs;?>" />
						</a>
					</div>
					<?php endif; ?>
					<!--fourth pic -->
					<?php if ( $fourth_pic_opt_cs):?>
					<div class="gal-col">
						<a href="<?php echo $fourth_pic_opt_cs;?>" data-toggle="lightbox"
						   data-gallery="example-gallery" class="col-sm-4">
								<img style="width:100%" class="gallery img-fluid anim" 
									 src="<?php echo $fourth_pic_opt_cs;?>" />
						</a>
					</div>
					<?php endif; ?>
					<!--fifth pic -->
					<?php if ( $fifth_pic_opt_cs):?>
					<div class="gal-col">
						 <a href="<?php echo $fifth_pic_opt_cs;?>" data-toggle="lightbox" 
							data-gallery="example-gallery" 
							class="col-sm-4">
							 <img style="width:100%" class="gallery img-fluid anim" 
							 src="<?php echo $fifth_pic_opt_cs;?>" />
						 </a> 
					</div>
					<?php endif; ?> 
					<!--sixth pic -->
					<?php if ( $sixth_pic_opt_cs):?>
					<div class="gal-col">
						<a href="<?php echo $sixth_pic_opt_cs;?>" data-toggle="lightbox" data-gallery="example-gallery"
						   class="col-sm-4">
							<img style="width:100%" class="gallery img-fluid anim" 
								 src="<?php echo $sixth_pic_opt_cs;?>" />
						</a>
					</div>
					<?php endif; ?>
					<?php elseif(is_user_logged_in()):?>
							 <div class=" sm-12 md-12">
								  <?php printf( wp_kses( __( 'No pictures loaded, <a href="%1$s" 		target="%2$s">publish your first picture please here</a>.', 'larestaurante' ), 
								  array( 'a' => array( 'href' => array(), 'target' => array() )) ),
								  esc_url(admin_url('themes.php?page=lares') ) , '_blank' ); ?>
							 </div>
							
							 <?php //endif (line 50)
									endif;?> 
				</div><!--.row .gal-row -->
			</div><!--.col-md-12 -->
		</div><!--.row .justify-content-center -->  
		<hr class="styled">
	</div><!--.container .gallery -->
</section><!--#gallery -->			