<?php

/**
 * The template for displaying "Menu" segment section 
 *
 * Fully supported custom post types. When custom post type is used, title name same like name of CPT.
 *
 * @package LaRestaurante
 */

?>

<section id="menu" class="team bg-light-gray menu">

  <div class="container"> 	  
	<div class="row">
		<div  class="col-sm-12 col-lg-12 text-center">
			<?php   $menu_cpt_select = cs_get_option ('menu_cpt_select') ?
					cs_get_option ('menu_cpt_select') : 'post';
					$menu = new WP_Query(array('post_type' => $menu_cpt_select, 'posts_per_page' => 4));
					if ( $menu_cpt_select == 'post' ):?>
					
			<ul class="list-unstyled">
				<?php	wp_get_archives(array(  'limit'  => 1,
												'format' => 'html',
												'before' => '<h1 class="respo m-bt-title">Our Menu ',
												'after' => '</h1>',
												'show_post_count' => false,
												'post_type' => 'post')); ?>
					</ul>					
				<?php else:
			
				  $type_obj = get_post_type_object($menu_cpt_select);
				  if ($type_obj->has_archive == true && $type_obj->name === $menu_cpt_select  ): ?>
				  
			<h1 class="respo m-bt-title" >
				<a class="link-front"  href="<?php echo get_post_type_archive_link(  $menu_cpt_select );?>" >
					<?php _e($menu_cpt_select,'larestaurante');?>
				</a>
			</h1>
			<?php else:?>
			
			<?php if (is_user_logged_in()) echo 'sorry theres no archives in this custom post type or empty select cpt option, try to press save options button in theme options admin'; ?>
			<?php endif;?><!--$type_obj->has_archive == true (etc.) -->
			<?php endif;?><!--if ( $ourplaces_cpt_select == 'post' ):-->
			
		</div><!--.col-sm-12 .col-lg-12 .text-center -->
	</div><!--.row-->
	
	<div class="row">
		<?php	$menu = new WP_Query(array('post_type' => $menu_cpt_select, 'posts_per_page' => 4));
				$i = 0;
				if($menu->have_posts()): while($menu->have_posts()): $menu->the_post();?> 
			
						<div class="col-lg-12">
								<?php if ( has_post_thumbnail() )
									  the_post_thumbnail('medium', array('class' => 'rounded img-fluid anim')); ?>
									<h5><?php the_time('j F, Y'); ?></h5>
									<h4><a class="link-post" href="<?php the_permalink(); ?>">
										<?php the_title(); ?></a>
									</h4>
										<p><?php larestaurante_the_excerpt_max_charlength(150); ?></p>
									<a href="<?php the_permalink(); ?>" class="btn btn-lg fr-end-butt">
										<?php _e('Read more...','larestaurante');?></a>
						</div>
							
		<?php endwhile; 
		      wp_reset_postdata();
			  elseif(is_user_logged_in()):// if CPT have no posts ?>
			  
			   <h3 class="panel-title">
			   <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
			   array( 'a' => array( 'href' => array(), 'target' => array() )) ),
			   esc_url( admin_url( 'post-new.php?post_type='.$menu_cpt_select ) ), '_blank' ); ?>
			   </h3>
		   
		   <?php endif;//if($menu->have_posts()) ?>
				  
	</div><!--.row -->
	 <hr class="styled">
  </div><!--.container -->
</section><!--#menu -->		