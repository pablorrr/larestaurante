<?php

/**
 * The template for displaying "Carousel" segment section 
 *
 * Possibility of displaying slides with selected CPT (custom post type) in Admin Page(theme options).
 *
 * @package LaRestaurante
 */

?>

<section id="slideshow" class="slideshow bg-light-gray">
<!-- to run carousel add minimum 2 posts -->
	<div class="container carousel bigcarousel">  
		<div class="col-md-12"  >
			<div id="lares-carousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
				<ul class="carousel-indicators">
					<li data-target="#lares-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#lares-carousel" data-slide-to="1"></li>
					<li data-target="#lares-carousel" data-slide-to="2"></li>
				</ul>

				<div class="carousel-inner">
						<?php 	$i=1;	
						//retriving group opt value to get codestar slider select option 		
						$cs_slider_get_option_group = cs_get_option('group_basic_slider'); 

						if ( ! empty ($cs_slider_get_option_group)){
							foreach($cs_slider_get_option_group as $single ){
							 if ( !empty($single['slider_select']))
								 $slider_opt_cs = $single['slider_select'];
							 else
								 $slider_opt_cs = NULL;} 
							 }
						$slider_post_type = $slider_opt_cs;
						$carouselpost = new WP_Query(array(
											'post_type' => $slider_post_type,
											'posts_per_page' => 4
											)); ?>
			
							<?php   if($carouselpost->have_posts()):
							while($carouselpost->have_posts()): $carouselpost->the_post();
							if($i == 1){?> 
							
						<div class="carousel-item active">
							<?php if( has_post_thumbnail()):?>
							<?php the_post_thumbnail('large',array('class'=>'rounded img-fluid bigcarousel'));?>
							<?php else: ?>
							<img src="<?php echo get_template_directory_uri(); ?>/img/no.imagez.png" 
							class="bigcarousel" width="100%"alt="resaturant picture" />
							<?php endif;?>	
							<div class="carousel-caption"style="padding:20px;">
								<h2 class="text-primary"><?php the_title();?></h2>
								<?php the_excerpt();?>
							</div>
						</div><!--.item active-->
							<?php }
							else { ?>
							
						<div class="carousel-item">
							<?php if( has_post_thumbnail()):?>
							<?php the_post_thumbnail('large',array('class'=>'rounded img-fluid bigcarousel'));?>
							<?php else: ?>
							  
							<img src="<?php echo get_template_directory_uri(); ?>/img/no.imagez.png"
							width="100%" alt="resaturant picture" />
							<?php endif;?>
							<div class="carousel-caption"style="padding:20px;">
								<h2 class="text-primary"><?php the_title();?></h2>
								<?php the_excerpt();?>
							</div>
						</div><!--.carousel-item-->
						<?php }
						$i++; endwhile;
						wp_reset_postdata();?>
						<?php else:?>
						<h3>Sorry no posts</h3>
						<?php endif;?>
						
				</div><!-- .carousel inner-->
						
						
						<!-- Left and right controls -->
				<a class="carousel-control-prev" href="#lares-carousel" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#lares-carousel" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
				
			</div><!--#lares-carousel -->
						<!--end dcarousel-->
		</div><!--.col-md-12 -->
					
		 <hr class="styled">				
	</div><!-- .container .carousel .bigcarousel-->
</section>		