<?php

/**
 * The template for displaying "Opinion" segment section 
 *
 * Retriving Opinion of restaurant clients from comments.
 *
 * @package larestaurante
 */

?>
<section id="opinion" class="team bg-light-gray">
	<div class="container opinion"> 	  
		 <div class="row">
			<div  class="col-sm-12 col-lg-12  text-center">
				<h1 class="respo m-bt-title header-front"><?php _e ('Opinion','larestaurante');?></h1>
			</div>
		 </div>
		 
		<header>
			<div class="col-lg-12 text-center">
                    <h2 class="subtitle"><?php _e('Get the reviews of others','larestaurante');?></h2>
            </div>  
        </header>
				<?php if (larestaurante_fetchRecentComments()):?>
				        <!-- take 3 last comments -->
				<?php $recent_comms = larestaurante_fetchRecentComments(3);
						foreach ($recent_comms as $comment): $date = new DateTime($comment->comment_date_gmt);?>

				<div class="offset-md-4 col-md-4 offset-md-4">
					<header><p><small><?php echo $comment->comment_author; _e('in day','larestaurante');
									        echo $date->format('d.m.Y'); ?></small></p></header>   
                    
					<blockquote><p><?php echo '"'.$comment->comment_content.'"'; ?></p></blockquote>
				</div>							
						<?php endforeach;
						      else:?>
						<p><?php _e('no comments, no opinions','larestaurante');?></p>
						<?php endif; ?>
						
				<div class="clear"></div>
                  
        <hr class="styled">    
	</div><!--.container .opinion -->>
</section><!--#opinion -->