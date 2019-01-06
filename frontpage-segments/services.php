<?php

/*
 * The template for displaying "Services" segment section 
 *
 * Fully supported custom post types. When custom post type is used, title name same like name of CPT.
 * 
 * @package LaRestaurante
 */

?>

<section id="services"  class="team bg-light-gray">
	<div class="container services">   
		<div class="row"><!--title row-->
			<div  class="col-sm-12 col-lg-12 text-center m-bt-title">
				<h1 class="respo">
				<?php   $services_cpt_select = cs_get_option ('services_cpt_select') ? 
										   cs_get_option ('services_cpt_select') : 'post';
						$services = new WP_Query(array('post_type' => $services_cpt_select, 'posts_per_page' => 4));
						if ( $services_cpt_select == 'post' ):?>

					<ul class="list-unstyled">
						<?php	wp_get_archives(array(  'limit'  => 1,
														'format' => 'html',
														'before' => '<h1 class="respo m-bt-title">Our Services ',
														'after'  => '</h1>',
														'show_post_count' => false,
														'post_type' => 'post')); ?>
					</ul>					
					<?php else:
						  $type_obj = get_post_type_object($services_cpt_select);
						  if (is_object($type_obj) && $type_obj->has_archive === true && 
						  $type_obj->name === $services_cpt_select  ): ?>
						
					<h1 class="respo m-bt-title" >
						<a class="link-front" 
						   href="<?php echo get_post_type_archive_link( $services_cpt_select );?>" >
							<?php _e($services_cpt_select,'larestaurante');?>
						</a>
					</h1>
				<?php else:
						if (is_user_logged_in()) echo 'sorry theres no archives in this custom post type  or empty select cpt option, try to press save options button in theme options admin'; 
					endif;//$type_obj->has_archive == true (etc.) 
					endif;?><!--if ( $ourplaces_cpt_select == 'post' ):-->
		
			</div><!--col-sm-12 col-lg-12 text-center m-bt-title-->
		</div><!--title row-->
	 
	<div class="row text-center"><!--main row-->
		<div class="col-sm-12 col-md-4 col-lg-4"><!--first column-->
		   <span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x text-warning"></i>
							<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
			</span>
        <?php  
			   global $services_title;
			   
			   $services_title = new WP_Query(array('post_type' => $services_cpt_select,'posts_per_page' => 6)); 
			   $the_slug = $services_title->posts[0]->post_name;	
			   $services = new WP_Query(array(
										'post_type' => $services_cpt_select,
										'name'		=> $the_slug,
										'posts_per_page' => 1)); 
				if(is_string($the_slug)):if($services->have_posts()): while($services->have_posts()):
				$services->the_post();?> 
			
				<h4><a class="link-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<h5><?php the_author(); ?></h5>
				<h5><?php the_time('j F, Y'); ?></h5>
				<span class="text-justify">
				<p><?php larestaurante_the_excerpt_max_charlength(150); ?></p></span>
					<a href="<?php the_permalink(); ?>" class="btn btn-lg fr-end-butt">
						<?php _e('Read more...','larestaurante');?></a>
		  <?php endwhile; 
				wp_reset_postdata();
			    endif;//if(is_string($the_slug))
			    elseif(is_user_logged_in()):?>
			   <h3>
			   <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
			   array( 'a' => array( 'href' => array(), 'target' => array() )) ),
			   esc_url( admin_url( 'post-new.php?post_type='.$services_cpt_select ) ), '_blank' ); ?>
			   </h3>
		  <?php endif;//elseif(is_user_logged_in()) ?>
          
      </div><!--first column-->
	  
	  <div class="col-sm-12 col-md-4 col-lg-4"><!--second column-->
		    <span class="fa-stack fa-4x">
							 <i class="fa fa-circle fa-stack-2x text-warning"></i>
							 <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
			</span>				
		  <?php global $services_title;
				
				$the_slug = $services_title->posts[1]->post_name;	
				$services = new WP_Query(array( 'post_type' => $services_cpt_select,
												'name'		=> $the_slug,
												'posts_per_page' => 1)); 
		if(is_string($the_slug)):if($services->have_posts()): while($services->have_posts()):
		$services->the_post();?> 		
		    <h4><a class="link-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<h5><?php the_author(); ?></h5>
            <h5><?php the_time('j F, Y'); ?></h5>
            <span class="text-justify">
			<p><?php larestaurante_the_excerpt_max_charlength(150); ?></p></span>
			<a href="<?php the_permalink(); ?>" class="btn btn-lg fr-end-butt"><?php _e('Read more...','larestaurante');?></a>
		   <?php endwhile;
		         wp_reset_postdata();
		         endif; 
		         elseif(is_user_logged_in()):?>
				   <h3 class="panel-title">
				   <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
				   array( 'a' => array( 'href' => array(), 'target' => array() )) ),
				   esc_url( admin_url( 'post-new.php?post_type='.$services_cpt_select ) ), '_blank' ); ?>
				   </h3>
		   
		   <?php endif; ?>
       </div><!--second column-->
	   
      <div class="col-sm-12 col-md-4 col-lg-4"><!--third column-->
		<span class="fa-stack fa-4x">
                         <i class="fa fa-circle fa-stack-2x text-warning"></i>
                         <i class="fa fa-car fa-stack-1x fa-inverse"></i>
        </span>
         <?php  	
	          global $services_title;
				$the_slug = $services_title->posts[2]->post_name;	
				$services = new WP_Query(array('post_type'  => $services_cpt_select,
											   'name'		=> $the_slug,
											   'posts_per_page' => 1)); 
			 if(is_string($the_slug)):if($services->have_posts()): while($services->have_posts()): $services->the_post();?> 	
				
			<h4><a class="link-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<h5><?php the_author(); ?></h5>
            <h5><?php the_time('j F, Y'); ?></h5>
            <span class="text-justify">
			<p><?php larestaurante_the_excerpt_max_charlength(150); ?></p></span>
			<a href="<?php the_permalink(); ?>" class="btn btn-lg fr-end-butt"><?php _e('Read more...','larestaurante');?></a>
		   
           <?php endwhile; 
				 wp_reset_postdata();
				 endif;// if(is_string($the_slug)) 
				 elseif(is_user_logged_in()):?>
				   <h3 class="panel-title">
				   <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
				   array( 'a' => array( 'href' => array(), 'target' => array() )) ),
				   esc_url( admin_url( 'post-new.php?post_type='.$services_cpt_select ) ), '_blank' ); ?>
				   </h3>
		   <?php endif;//elseif(is_user_logged_in() ?>	
	    </div><!--third column-->
	</div><!--main row-->
	<hr class="styled">
 </div><!--.container .services -->
</section><!--#sevices-->	