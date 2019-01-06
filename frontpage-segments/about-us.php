<?php
/**
 * The template for displaying "About us" segment section 
 *
 * Fully supported custom post types. When custom post type is used, title name same like name of CPT.
 *
 * @package LaRestaurante
 */

?>

<section id="about_us" class="team bg-light-gray">

<div class="container about-us"> 
	<div class="row">
		<div  class="col-sm-12 col-lg-12 text-center">
			<?php   $aboutus_cpt_select = cs_get_option ('aboutus_cpt_select')?
										  cs_get_option ('aboutus_cpt_select'): 'post';
			
					$aboutus = new WP_Query(array('post_type' => $aboutus_cpt_select, 'posts_per_page' => 4));
					if ( $aboutus_cpt_select == 'post' ):?>
					
			<ul class="list-unstyled">
			<?php	wp_get_archives(array(  'limit'  => 1,
											'format' => 'html', 
											'before' => '<h1 class="respo m-bt-title">About Us ',
											'after'  => '</h1>',
											'show_post_count' => false,
											'post_type' => 'post')); ?>
			</ul>					
			<?php else:?>
			
			<?php	$type_obj = get_post_type_object($aboutus_cpt_select);
					if ($type_obj->has_archive == true && $type_obj->name === $aboutus_cpt_select  ): ?>
			<h1 class="respo m-bt-title" >
				<a class="link-front"  href="<?php echo get_post_type_archive_link( $aboutus_cpt_select );?>" >
					<?php _e( $aboutus_cpt_select,'larestaurante' );?>
				</a>
			</h1>
			<?php else:?>
			<?php if (is_user_logged_in()) echo 'sorry theres no archives in this custom post type  or empty select cpt option, try to press save options button in theme options admin'; ?>
			<?php endif;?><!--$type_obj->has_archive == true (etc.) -->
			<?php endif;?><!--if ( $ourplaces_cpt_select == 'post' ):-->
		</div><!--.col-sm-12 .col-lg-12 .text-center-->
	</div><!--.row -->
	
	<!-- Timeline taken from: https://bootsnipp.com/snippets/featured/zigzag-timeline-layout
		 Slightly modified for this theme
		 Author link: https://bootsnipp.com/andrewnite
		 Licence 	: MIT
		 Licence link: https://bootsnipp.com/license -->
		
	<div class="row">
		 <div class="col-lg-12">
               <ul class="timeline">
				<?php  	$about_us = new WP_Query(array('post_type' => $aboutus_cpt_select,'posts_per_page' => 4));
						$i = 0;
						if($about_us->have_posts()): while($about_us->have_posts()): $about_us->the_post();?> 
			
						 <li <?php $i++; $i = $i % 2; if ($i == 0 )  echo 'class = "timeline-inverted"';?>>
						   <div class="timeline-image" width="auto" height="auto">
								<div class="box-img-container">  
								 <?php if ( has_post_thumbnail() )
									 the_post_thumbnail('about-us-size', array('class' => 'rounded-circle img-fluid')) ;
									else
									echo '<img src = "'.get_template_directory_uri(). '/img/no.imagez.png" class = "rounded-circle img-fluid"/>';?>
								<div class="overlay circle-cover">
									<div class="text"><?php the_title(); ?></div>
								</div>	
								</div><!--.box-img-container -->
							</div><!--.timeline-image -->
							
							<div class="timeline-panel">
                                <div class="timeline-heading">
									<h5><?php the_time('j F, Y'); ?></h5>
									<h5><?php the_author(); ?></h5>
									<h4 class="subheading">
										<a class="link-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h4>
						        </div><!--.timeline-heading -->
								<div class="timeline-body">
									<p class="text-muted text-justify">
									<?php larestaurante_the_excerpt_max_charlength(150); ?></p>
								</div>
							</div><!--.timeline-panel -->
						 </li>
						   <?php endwhile; ?>
						   <?php wp_reset_postdata();?>
						   <?php elseif(is_user_logged_in()):?>
						   <h3 class="panel-title">
						   <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
						   array( 'a' => array( 'href' => array(), 'target' => array() )) ),
						   esc_url( admin_url( 'post-new.php?post_type='.$aboutus_cpt_select ) ), '_blank' ); ?>
						   </h3>
						  <?php endif; ?>
				  
				</ul><!--timeline-->
		
		</div><!--.col-lg-12-->	
	</div><!--.row-->
	 <hr class="styled">
</div><!--container-->	
</section><!--#about_us -->