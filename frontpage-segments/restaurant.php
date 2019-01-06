<?php

/*
 * The template for displaying "Restaurant" segment section 
 *
 * Fully supported custom post types. When custom post type is used, title name same like name of CPT.
 * 
 * @package larestaurante
 */

?>
<section id="restaurants" class="bg-light-gray" >
	<div class="container restaurant">
            <div class="row"><!--row with title of the segment -->
               <div  class="col-sm-12 col-lg-12 text-center">
					<?php   $ourplaces_cpt_select = cs_get_option ('ourplaces_cpt_select')?
													cs_get_option ('ourplaces_cpt_select'): 'post';
							$menu = new WP_Query(array('post_type' => $ourplaces_cpt_select, 'posts_per_page' =>4));
							if ( $ourplaces_cpt_select == 'post' ):?>

					<ul class="list-unstyled">
						<?php	wp_get_archives(array(  'limit'  => 1,
														'format' => 'html',
														'before' => '<h1 class="respo m-bt-title">Our Places ',
														'after'  => '</h1>',
														'show_post_count' => false,
														'post_type' => 'post')); ?>
					</ul>					
					<?php else:?>
					
					<?php	$type_obj = get_post_type_object($ourplaces_cpt_select);
							if ($type_obj->has_archive == true && 
							$type_obj->name === $ourplaces_cpt_select  ): ?>
						
					<h1 class="respo m-bt-title">
						<a class="link-front" 
						   href="<?php echo get_post_type_archive_link( $ourplaces_cpt_select );?>" >
								 <?php _e($ourplaces_cpt_select,'larestaurante');?></a>
					</h1>
					
					<?php else:
					
						  if (is_user_logged_in()) echo 'sorry theres no archives in this custom post type  or empty select cpt option, try to press save options button in theme options admin'; ?>
					<?php endif;?><!--$type_obj->has_archive == true (etc.) -->
					<?php endif;?><!--if ( $ourplaces_cpt_select == 'post' ):-->
                  
               </div><!--.col-sm-12 .col-lg-12 .text-center" -->
            </div><!--row with the title of the segment-->
			
            <div class="row text-center"><!-- main content row-->
                <div class="col-sm-12 col-md-4 col-lg-4"><!--first column-->
					<div class="box-img-container">   
						<?php  global $our_places;
								
									  $our_places = new WP_Query(array('post_type' => $ourplaces_cpt_select,'posts_per_page' => 6)); 
									  $the_slug = $our_places->posts[0]->post_name;
								
									  $our_placesQuery = new WP_Query(array('post_type' => $ourplaces_cpt_select,
																		    'name'	  =>  $the_slug,
																		    'posts_per_page' => 1)); 
					
									  if(is_string($the_slug)):if($our_placesQuery->have_posts()): 
									  while($our_placesQuery->have_posts()): $our_placesQuery->the_post(); 
                                      if ( has_post_thumbnail() ) 
										  the_post_thumbnail('medium_large',array('class' =>'img-thumbnail img-responsive restaurants'));
							          else
								          echo '<img src = "'.get_template_directory_uri(). '/img/no.imagez.png" class = "img-thumbnail img-responsive restaurants img-slide"/>';?>
						<div class="overlay"><!--transparent overlay background CSS-->
							<div class="text"><?php the_title(); ?></div>
						</div>	
					</div><!--box img conatiner -->	
                        <h4><a class="link-post" href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
						<h5><?php the_time('j F, Y'); ?></h5>
						<h5><?php the_author(); ?></h5>
                        <span class="text-justify">
						<p><?php larestaurante_the_excerpt_max_charlength(250);?></p></span>
						<a href="<?php the_permalink(); ?>" class="btn btn-lg fr-end-butt">
						<?php _e('Read more...','larestaurante');?></a>
                        
						<?php endwhile; 
					          wp_reset_postdata();
							  endif; 
							  elseif(is_user_logged_in()):?>
						<h3>
						   <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
						   array( 'a' => array( 'href' => array(), 'target' => array() )) ),
						   esc_url( admin_url( 'post-new.php?post_type='.$ourplaces_cpt_select ) ), '_blank' ); ?>
						</h3>
		   
						<?php endif; ?>
				</div><!--first column-->
				
                <div class="col-sm-12 col-md-4 col-lg-4"><!--second column-->
					<div class="box-img-container">   
                        <?php  global $our_places;
					
								$the_slug =  $our_places->posts[1]->post_name;
								$our_placesQuery = new WP_Query(array(
											'post_type' =>  $ourplaces_cpt_select,
											'name'		=>  $the_slug,
											'posts_per_page' => 1)); 
								if(is_string($the_slug)):if($our_placesQuery->have_posts()): 
								while($our_placesQuery->have_posts()):$our_placesQuery->the_post();
								if ( has_post_thumbnail() ) 
								the_post_thumbnail('medium_large', array('class' => 'img-thumbnail img-responsive restaurants'));
							else
								echo '<img src = "'.get_template_directory_uri(). '/img/no.imagez.png" class = "img-thumbnail img-responsive restaurants img-slide"/>';?>
						<div class="overlay">
							<div class="text"><?php the_title(); ?></div>
						</div>	
				    </div><!--box img conatiner -->		
                        <h4><a class="link-post" href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
						<h5><?php the_time('j F, Y'); ?></h5>
						<h5><?php the_author(); ?></h5>
                        <span class="text-justify">
						<p><?php larestaurante_the_excerpt_max_charlength(250);?></p></span>
						<a href="<?php the_permalink(); ?>" class="btn btn-lg fr-end-butt">
						<?php _e('Read more...','larestaurante');?></a>
                        
						<?php endwhile; 
						      wp_reset_postdata();
							  endif; 
							  elseif(is_user_logged_in()):?>
							   <h3>
							   <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
							   array( 'a' => array( 'href' => array(), 'target' => array() )) ),
							   esc_url( admin_url('post-new.php?post_type='.$ourplaces_cpt_select ) ),'_blank' ); ?>
							   </h3>
						<?php endif; ?>
               
				</div><!--second column-->
				
				<div class="col-sm-4"><!--third column -->
					<div class="box-img-container">            

						<?php  global $our_places;
					
							$the_slug = $our_places->posts[2]->post_name;
            		        $our_placesQuery = new WP_Query(array(
								'post_type' =>  $ourplaces_cpt_select,
								'name'		=>  $the_slug,
								'posts_per_page' => 1)); 
							if(is_string($the_slug)):if($our_placesQuery->have_posts()):while($our_placesQuery->have_posts()):$our_placesQuery->the_post();
                            if ( has_post_thumbnail() ) 
								the_post_thumbnail('medium_large' , array('class' => 'img-thumbnail img-responsive'));
							else
								echo '<img src = "'.get_template_directory_uri(). '/img/no.imagez.png" class = "img-thumbnail img-responsive restaurants img-slide"/>';?>
						<div class="overlay">
							<div class="text"><?php the_title(); ?></div>
						</div>	
					</div><!--box img conatiner -->		
                        <h4><a class="link-post" href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
						<h5><?php the_time('j F, Y'); ?></h5>
						<h5><?php the_author(); ?></h5>
                        <span class="text-justify">
						<p><?php larestaurante_the_excerpt_max_charlength(250);?></p></span>
						<a href="<?php the_permalink(); ?>" class="btn btn-lg fr-end-butt">
						<?php _e('Read more...','larestaurante');?></a>
                       
						<?php endwhile; 
						      wp_reset_postdata();
						      endif; 
						      elseif(is_user_logged_in()):?>
						   <h3>
							   <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
							   array( 'a' => array( 'href' => array(), 'target' => array() )) ),
							   esc_url(admin_url( 'post-new.php?post_type='.$ourplaces_cpt_select ) ), '_blank' ); ?>
						   </h3>
						   <?php endif; ?>
            
				</div><!--third column -->
			</div><!--main row -->  
		</div><!--.container .restaurant-->	 
		<hr class="styled">	
</section><!--#restaurants -->	