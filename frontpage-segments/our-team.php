<?php

/**
 * The template for displaying "Our Team" segment section 
 *
 * Fully supported custom post types. When custom post type is used, title name same like name of CPT.
 * Using timeline CSS.
 * @package larestaurante
 */

?>

<section id="team" class="team bg-light-gray">
	<div class="container our-team">
		<div class="row"><!--.row with title of segment-->
            <div class="col-lg-12 text-center">
				
				<?php   $team_cpt_select = cs_get_option ('team_cpt_select')? 
										   cs_get_option ('team_cpt_select'): 'post';
						$menu = new WP_Query(array('post_type' => $team_cpt_select, 'posts_per_page' => 4));
						if ( $team_cpt_select == 'post' ):?>

				<ul class="list-unstyled">
					<?php	wp_get_archives(array(  'limit'  => 1,
													'format' => 'html',
													'before' => '<h1 class="respo m-bt-title">Our Team ',
													'after'  => '</h1>',
													'show_post_count' => false,
													'post_type' => 'post')); ?>
				</ul>					
					<?php else:
				
					$type_obj = get_post_type_object($team_cpt_select);
					if ($type_obj->has_archive == true && $type_obj->name === $team_cpt_select  ): ?>
					
				<h1 class="respo m-bt-title" >
					<a class="link-front"  href="<?php echo get_post_type_archive_link(  $team_cpt_select );?>" >
						<?php _e($team_cpt_select,'larestaurante');?>
					</a>
				</h1>
					<?php else:
					
						  if (is_user_logged_in()) echo 'sorry theres no archives in this custom post type  or empty select cpt option, try to press save options button in theme options admin'; ?>
					<?php endif;?><!--$type_obj->has_archive == true (etc.) -->
					<?php endif;?><!--if ( $ourplaces_cpt_select == 'post' ):-->
			
            </div><!--.col-lg-12 .text-center -->
        </div><!--.row with title of segment-->
		
		<div class="row text-center"><!--row of the timeline-->	
            <div class="col-md-4" align="center"><!--first column-->
                <div class="team-member">
					
					<?php  global $our_team_title;
					
					$our_team_title = new WP_Query(array('post_type' => $team_cpt_select,'posts_per_page' => 6)); 
					$the_slug = $our_team_title->posts[0]->post_name;
            		$our_team = new WP_Query(array('post_type' => $team_cpt_select,'name'=> $the_slug,								'posts_per_page' => 1)); 
					if(is_string($the_slug)):if($our_team->have_posts()): 
					while($our_team->have_posts()): $our_team->the_post();
                    if ( has_post_thumbnail() ) 
					the_post_thumbnail('our-team-size',array('class' =>'rounded-circle img-fluid img-slide anim'));?>
					    <h4><a class="link-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<h5><?php the_author(); ?></h5>
						<h5><?php the_time('j F, Y'); ?></h5>
						<span class="text-justify"><p><?php larestaurante_the_excerpt_max_charlength(150);?></p></span>
							<a href="<?php the_permalink(); ?>" class="btn btn-lg fr-end-butt">
							<?php _e('Read more...','larestaurante');?></a>
                       
						<?php endwhile; 
					          wp_reset_postdata();
							  endif; //if(is_string($the_slug))
					          elseif(is_user_logged_in()):?>
					    <h3>
					    <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
					    array( 'a' => array( 'href' => array(), 'target' => array() )) ),
					    esc_url( admin_url( 'post-new.php?post_type='.$team_cpt_select ) ), '_blank' ); ?>
					    </h3>
		   
					<?php endif; //(is_user_logged_in())?>
				</div><!--.team-member -->
			</div><!-- first column -->
		  
            <div class="col-md-4" align="center"><!--second column -->
                <div class="box-img-container"> 
                        <?php  global $our_team_title;
					
							$the_slug = $our_team_title->posts[1]->post_name;
							$our_team = new WP_Query(array(
								'post_type' => $team_cpt_select,
								'name'		=>  $the_slug,
								'posts_per_page' => 1)); 
					
							if(is_string($the_slug)):if($our_team->have_posts()): while($our_team->have_posts()): 	 $our_team->the_post(); 
							if ( has_post_thumbnail() ) 
							   the_post_thumbnail('our-team-size', array('class' => 'rounded-circle img-fluid img-slide anim'));?>

						<h4><a class="link-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<h5><?php the_author(); ?></h5>
						<h5><?php the_time('j F, Y'); ?></h5>
						<span class="text-justify"><p><?php larestaurante_the_excerpt_max_charlength(150); ?></p></span>
							<a href="<?php the_permalink(); ?>" class="btn btn-lg fr-end-butt">
								<?php _e('Read more...','larestaurante');?></a>
                        
						<?php endwhile; //$our_team->have_posts()
							  wp_reset_postdata();
							  endif; //if(is_string($the_slug)
							  elseif(is_user_logged_in()):?>
							   <h3>
								   <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
								   array( 'a' => array( 'href' => array(), 'target' => array() )) ),
								   esc_url( admin_url( 'post-new.php?post_type='.$team_cpt_select ) ), '_blank' ); ?>
							   </h3>
		  
						<?php endif;//(is_user_logged_in()) ?>
                </div><!--.box-img-container-->
         </div><!--second column -->
		 
		 <div class="col-md-4" align="center"><!--third column -->
            <div class="team-member">
					<?php  global $our_team_title;
					
							$the_slug = $our_team_title->posts[2]->post_name;
							$our_team = new WP_Query(array(
								'post_type' => $team_cpt_select,
								'name'		=>  $the_slug,
								'posts_per_page' => 1)); 
					
							if(is_string($the_slug)):if($our_team->have_posts()): while($our_team->have_posts()): $our_team->the_post();
                            if ( has_post_thumbnail() ) 
								the_post_thumbnail('our-team-size', array('class' => 'rounded-circle img-fluid img-slide anim'));?>
						
							<h4><a class="link-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<h5><?php the_author(); ?></h5>
							<h5><?php the_time('j F, Y'); ?></h5>
							<span class="text-justify">
							<p><?php larestaurante_the_excerpt_max_charlength(150);?></p></span>
							<a href="<?php the_permalink(); ?>" class="btn btn-lg fr-end-butt">
							<?php _e('Read more...','larestaurante');?></a>
                      
							<?php endwhile; //while($our_team->have_posts
								  wp_reset_postdata();
								  endif; //if(is_string($the_slug))
								  elseif(is_user_logged_in()):?>
						   <h3>
							   <?php printf( wp_kses( __( 'Empty post, <a href="%1$s" target="%2$s">publish your first post please here</a>.', 'larestaurante' ), 
							   array( 'a' => array( 'href' => array(), 'target' => array() )) ),
							   esc_url( admin_url( 'post-new.php?post_type='.$team_cpt_select ) ), '_blank' ); ?>
						   </h3>
		   
							<?php endif;//(is_user_logged_in()) ?>
            </div><!--.team-member-->
          </div><!--third column -->
                
		</div><!--.row .text-center-->
		 <hr class="styled">
	</div><!--.container .our-team -->
</section><!--#team -->		