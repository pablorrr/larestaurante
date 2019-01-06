<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================


$cpt_array = array();
foreach ( get_post_types( array(), 'names' ) as $post_type ) {
  $cpt_array [] = $post_type;
}
$cpt_array_final = $cpt_array;

/* removal unwanted CPT */


$cpt_array_exclude = array('attachment','customize_changeset','revision','custom_css','nav_menu_item',							 'oembed_cache','user_request','product','product_variation','shop_order',							 'shop_order_refund','shop_coupon','option-tree','page','post','feedback'); 

$cpt_array_final = array_diff ($cpt_array_final,$cpt_array_exclude);

if (!empty($cpt_array_final)){
/* proccessing format options- Codestar Framework - pair key value */

$cpt_array_key = array();
foreach($cpt_array_final as $key => $value) { $cpt_array_key[$value] = $value;   }
$newcpt_array_key = $cpt_array_key;
} 
else 
	
$newcpt_array_key = array ('post'=> 'post');

/*extracting post-names of post names, choose all post names except for Woocomer, post, page,  */

$querystrcpt = "SELECT $wpdb->posts.post_name FROM $wpdb->posts WHERE ($wpdb->posts.post_type!='post')
			 AND($wpdb->posts.post_type!='page')
			 AND($wpdb->posts.post_type!='nav_menu_item')
			 AND($wpdb->posts.post_type!='attachment')  
			 AND($wpdb->posts.post_type!='product')
			 AND($wpdb->posts.post_type!='shop_order')
			 AND($wpdb->posts.post_type!='option-tree')
			 AND($wpdb->posts.post_name != '')
			 AND($wpdb->posts.post_content != '')";
 

$customposts = $wpdb->get_results($querystrcpt, ARRAY_A);
$querystrspt = "SELECT $wpdb->posts.post_name FROM $wpdb->posts WHERE ($wpdb->posts.post_type='post')";
$standardposts = $wpdb->get_results($querystrspt, ARRAY_A);

/* processing of the current table from two to one-dimensional  */

 $customposts = array_map('current', $customposts);
 foreach ($customposts as $key => $value ){ $new_customposts[$value]= $value; }
 $customposts = $new_customposts;

 $standardposts = array_map('current', $standardposts);
 foreach ($standardposts as $key => $value ){ $new_standardposts[$value]= $value; }
 $standardposts = $new_customposts;
 
//end of creating opt array for slider select options	
//dynamic retriving actual theme name 

$theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme();

$settings           = array(
  'menu_title'      => 'Theme Options',
  'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'lares',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => $theme_name . ' by Codestar Framework' ,
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ------------------------------
// accordion sections           -
// ------------------------------
$options[]   = array(
  'name'     => 'theme_options',
  'title'    => __('Theme Options','larestaurante'),
  'icon'        => 'fa fa-wrench',
  'sections' => array(

    // sub GENERAL
    array(
      'name'     => 'general',
      'title'    => __('General Settings','larestaurante'),
      'icon'     => 'fa fa-minus',
      'fields'   => array(
	  
		array(
          'type'    => 'heading',
          'content' => __('Header button "post of the day" Settings','larestaurante')
        ),
       
		/* Post Day Settings */
		 array(
			'id'      => 'menu_day',
			'type'    => 'radio',
			'title'   => 'Menu Day',
			'class'   => 'horizontal',
			'options' => array(
			'list'    => 'Select a post from the list',
			'randomly'=> 'Select a post randomly',),
			'default' => 'list',
			'help'    => 'Choose the way you want the post view',),	
			
		 //alternative way to retrive custom menu post type posts, no support for type notice
		 /* array(
          'id'          => 'unique_radio_9',
          'type'        => 'select',
          'title'       => 'Radio Field with CPT Posts',
          'options'     => 'posts',
          'query_args'  => array(
            'post_type' => 'menu',
          ),
          'after'       => '<div class="cs-text-muted"><strong>query_args:</strong> post_type=menu</div>',
        ),		 */				  				
		
		/* select menu posts with usage dependencies of codestar */
		 array(
			'id'           => 'info_sorter',
		    'type'         => 'notice',
		    'class'        => 'warning',
		    'content'      => 'Make sure that the post title matches the type of post you have allocated',
			),		
		 array(
			'id'      => 'menu_day_posts',
			'type'    => 'select',
			'title'   => 'Select post of the day',
			'options' =>  $customposts ,	
			'default' =>  $standardposts,
			'dependency'   => array( 'menu_day_list', '==', 'true' ),//when "list" keyword is equal "true" display //this opt
			),
			
			 array(
			'id'      => 'select_cpt',
			'type'    => 'select',
			'title'   => 'Select Custom Post Type',
			'options' =>  $newcpt_array_key ,	
			'default' =>  'post',
			'dependency'   => array( 'menu_day_list', '==', 'true' ),//when "list" keyword is equal "true" display //this opt
			),
			
			
		 /* just in case when custo post type "Menu"  has no posts*/
		 array(
			'id'           => 'info_menu_select',
		    'type'         => 'notice',
		    'class'        => 'danger',
		    'content'      => 'Sorry , lack of post. GO to <a href = "'.esc_url(admin_url('edit.php?post_type=menu')).'">  Admin Panel</a> and add some posts, please.',
			'dependency'   => array( 'menu_day_posts', '==', 'no_posts' ),
			),		  
						   
						  
						  
	   //Segements Front End  Sorter
		array(
			 'type'    => 'heading',
			 'content' => __('Segment Front Page Settings','larestaurante')  
			),	  
								
		 array(
			'id'           => 'info_sorter',
		    'type'         => 'notice',
		    'class'        => 'warning',
		    'content'      => 'If theres segment empty ,should not be placed in Enabled Segments',
			),	
			
			/* segment_sorter */
		array(
				'id'    => 'segment_sort',
				'type'           => 'sorter',
				'title'          => 'Segment Sorter',
				'default'        => array(
				'enabled'      	 => array( 'res'  => 'restaurant'),
				'disabled'       => array(
									    'carousel' => 'carousel',
										'serv' 	   => 'services',
										'about'    => 'about-us',
										'ourt'     => 'our-team',
										'menu'     => 'menu',
										'gallery'  => 'gallery',
										'opinion'  => 'opinion',
										'form'     => 'form',
										'booking'  => 'booking',
											),
										  ),
										'help' => 'select segments to appear on the page and the order of their occurrence',
										  
			),//segment sorter array end
			
			/* select cpt for about us segment */
		array(
				'id'             => 'aboutus_cpt_select',
				'type'           => 'select',
				'title'          => 'Select Post Type for About us Segment',
				'options'        =>  $newcpt_array_key,
				'default_option' => 'post',  
				),	
			/* select cpt for restaurant(zamienic nazwe na naze miejsca lokale) segment */	
		array(
				'id'             => 'ourplaces_cpt_select',
				'type'           => 'select',
				'title'          => 'Select Post Type for Our Places Segment',
				'options'        =>  $newcpt_array_key,
				'default_option' => 'post',  
				),			
		/* select cpt for services segment */	
		array(
				'id'             => 'services_cpt_select',
				'type'           => 'select',
				'title'          => 'Select Post Type for Services Segment',
				'options'        =>  $newcpt_array_key,
				'default_option' => 'post',    
				),		
		/* select cpt for menu segment */	
		array(
				'id'             => 'menu_cpt_select',
				'type'           => 'select',
				'title'          => 'Select Post Type for Menu Segment',
				'options'        =>  $newcpt_array_key,
				'default_option' => 'post',  
				),		
		/* select cpt for Our Team segment */	
		array(
				'id'             => 'team_cpt_select',
				'type'           => 'select',
				'title'          => 'Select Post Type for Our Team Segment',
				'options'        =>  $newcpt_array_key,
				'default_option' =>  'post', 
				),		 	
				
      )
    ),//end General Subsection

    //Basic Subsection 
    array(
      'name'     => 'basic',
      'title'    => __('Basic Settings','larestaurante'),
      'icon'     => 'fa fa-minus',
      'fields'   => array(
	
		array(
          'type'    => 'heading',
          'content' =>__( 'Basic Settings','larestaurante')
        ),
	
	/* group options  single Post Settings*/
		array(
          'id'              => 'group_basic_single',
          'type'            => 'group',
          'title'           => 'Single Post Settings',
          'button_title'    => 'Add New',
          'accordion_title' => 'Single Post',
          'fields'          => array( 
		
		//single post template settings comments 	
		  array(
		  'id'      => 'single_comments_switcher',
		  'type'    => 'switcher',
		  'title'   => 'single post comments',
		  'label'   => 'Will comments be displayed ?',
		),
		
		//single post template settings thumbnails
		  array(
		  'id'      => 'single_thumbnails_switcher',
		  'type'    => 'switcher',
		  'title'   => 'single post thumbnails ',
		  'label'   => 'Should thumbnails of posts be displayed ?',
		),
		
		),//end for keyword "fields" from  group
		),//end of single post seettings group
		
		
		/* group options  404 no page found Settings*/
		 
	  array(
          'id'              => 'group_basic_404',
          'type'            => 'group',
          'title'           => '404 - Page not found Settings',
          'button_title'    => 'Add New',
          'accordion_title' => '404',
          'fields'          => array( 
		//404 ( no page site ) template settings
										  array(
										  'id'      => '404_page_switcher',
										  'type'    => 'switcher',
										  'title'   => '404 - No Page Site',
										  'label'   => 'Will the search engine be displayed ?',
										),
			),// end of keyword "fields" from group
		),//end of 404 seettings group
		//layout group
		array(
          'id'              => 'group_basic_layout',
          'type'            => 'group',
          'title'           => 'Layout Settings',
          'button_title'    => 'Add New',
          'accordion_title' => 'Layout Settings',
          'fields'          => array( 
		
		//layout proposal 
			array(
				  'id'           => 'layout_radio',
				  'type'         => 'image_select',
				  'title'        => 'Select Layout',
				  'options'      => array(
					'normal'     =>  get_template_directory_uri() . '/inc/admin/img/default.png',
					'wide'     	 =>  get_template_directory_uri() . '/inc/admin/img/wide.png',
					),
				  'radio'        => true,
				  'default'      => 'normal'
				),
			),
		),//end of layout group
		
		//slider settings group
		
		array(
          'id'              => 'group_basic_slider',
          'type'            => 'group',
          'title'           => 'Slider Settings',
          'button_title'    => 'Add New',
          'accordion_title' => 'Slider Settings',
          'fields'          => array( 
			
		 array(
			'id'             => 'slider_select',
			'type'           => 'select',
			'title'          => 'Select Post Type',
			'options'        => $newcpt_array_key,
			'default_option' => 'post',
				),	
				
			/* just in case when some custom post type has no posts*/
		 array(
			'id'           => 'info_slider_select',
		    'type'         => 'notice',
		    'class'        => 'danger',
		    'content'      => 'Sorry , lack of post. GO to <a href = "'.esc_url(admin_url()).'">  Admin Panel</a> and add some posts, please.',
			'dependency'   => array( 'slider_select', '==', 'no_posts' ),
			),			
				
				
			),
		),//end of slider group
		
		
		/* social media group */
			
		array(
		
          'id'              => 'group_social',
          'type'            => 'group',
          'title'           => 'Social Media Settings',
		  'button_title'    => 'Add New',
          'accordion_title' => 'Social Media Field',
          'fields'          => array(
									/* paste social media url : Facebook */
									
									array(
									 'id'    => 'social_fburl',
									 'type'  => 'text',
									 'title' => '<i style="font-size:3em;" class="fa fa-facebook-square"></i>',
									 'attributes'    => array(
										'placeholder' 	 => 'paste your fb url like e.g. https://facebook.com/'),
									 'default'     => 'facebook.com',
									 'sanitize' => 'custom_my_url',
									 
										),
        
									/*  paste social media url : Youtube*/
								
										
									  array(
											  'id'       => 'social_yturl',
											  'type'     => 'text',
											  'title'    => '<i style="font-size:3em;" class="fa fa-youtube-square"></i>',
											  'attributes'    => array(
												'placeholder' 	 => 'paste your yt url like e.g. https://youtube.com/'),
											  'default'     => 'youtube.com',
											  'sanitize' => 'custom_my_url',
											),
								
								
				  
									/*  paste social media url : Twitter*/

									  array(
											  'id'       => 'social_twturl',
											  'type'     => 'text',
											  'title'    => '<i style="font-size:3em;" class="fa fa-twitter-square"></i>',
											   'attributes'    => array(
												'placeholder' 	 => 'paste your twt url like e.g. https://twitter.com/'),
												'default'     => 'twitter.com',
											  'sanitize' => 'custom_my_url',
											),
					
									/*  paste social media url : Youtube*/
								
										
									  array(
											  'id'       => 'social_googleplus_url',
											  'type'     => 'text',
											  'title'    => '<i style="font-size:3em;" class="fa fa-google-plus-square"></i>',
											  'attributes'    => array(
												'placeholder' 	 => 'paste your google plus url like e.g. https://plus.google.com/discover'),
											   'default'     => 'plus.google.com',
											  'sanitize' => 'custom_my_url',
											),

									  ),
									 
									   
        ),/* end group  options  social*/
		
	),	//end of keyword "fields" from "Basic  Settings Subsection"	
		
	
	),//end of basic subsection
	
	
	/* Start others  subsection  gallery, google fonts */
	
	
	 //Other Subsection 
    array(
      'name'     => 'other',
      'title'    => __('Other  Settings','larestaurante'),
      'icon'     => 'fa fa-minus',
      'fields'   => array(
	
		array(
          'type'    => 'heading',
          'content' => 'Other  Settings',
        ),
		
		array(
			  'id'              => 'group_gallery',
			  'type'            => 'group',
			  'title'           => 'Gallery Settings',
			  'button_title'    => 'Add New',
			  'accordion_title' => 'Gallery Settings',
			  'fields'          => array(

			  
						//gallery pictures upload
								//picture one 
							     array(
										'id'      => 'upload_pic_one',
										'type'    => 'upload',      
									    'title'   => 'Upload first pic',    
										'settings'       => array(
									    'button_title' => 'Upload first pic',
										'frame_title'  => 'Choose a image',
										'insert_title' => 'Use this image',
										  ),
										),
		
								//picture two 
							     array(
										'id'      => 'upload_pic_two',
										'type'    => 'upload',      
									    'title'   => 'Upload second pic',    
										'settings'       => array(
									    'button_title' => 'Upload second pic',
										'frame_title'  => 'Choose a image',
										'insert_title' => 'Use this image',
										  ),
										),
										
										
								 //picture three 
							     array(
										'id'      => 'upload_pic_three',
										'type'    => 'upload',      
									    'title'   => 'Upload third pic',    
										'settings'       => array(
									    'button_title' => 'Upload third pic',
										'frame_title'  => 'Choose a image',
										'insert_title' => 'Use this image',
										  ),
										),
										
								 //picture four
							     array(
										'id'      => 'upload_pic_four',
										'type'    => 'upload',      
									    'title'   => 'Upload fourth pic',    
										'settings'       => array(
									    'button_title' => 'Upload fourth pic',
										'frame_title'  => 'Choose a image',
										'insert_title' => 'Use this image',
										  ),
										),	
								//picture five
							     array(
										'id'      => 'upload_pic_five',
										'type'    => 'upload',      
									    'title'   => 'Upload fifth pic',    
										'settings'       => array(
									    'button_title' => 'Upload fifth pic',
										'frame_title'  => 'Choose a image',
										'insert_title' => 'Use this image',
										  ),
										),	
								//picture sixth
							     array(
										'id'      => 'upload_pic_six',
										'type'    => 'upload',      
									    'title'   => 'Upload sixth pic',    
										'settings'       => array(
									    'button_title' => 'Upload sixth pic',
										'frame_title'  => 'Choose a image',
										'insert_title' => 'Use this image',
										  ),
										),														
			
			), //end of gallery fields group
	
	
	), //end of gallery group
	

	  array(
		'id'              => 'group_fonts',
	    'type'            => 'group',
		'title'           => 'Fonts Settings',
		'button_title'    => 'Add New',
	    'accordion_title' => 'Fonts Settings',
		'fields'          => array(
								
								
								array(
									'id'        => 'para_typo',
									'type'      => 'typography',
									'title'     => 'Paragraphs Typography',
									'default'   => array(
									'family'  => 'Arial',
									'font'    => 'websafe', // this is helper for output ( google, websafe, custom )
									'variant' => '800',
										),
									 'chosen'    => false,	
									),
									
									
									array(
									'id'        => 'head_typo',
									'type'      => 'typography',
									'title'     => 'Headers Typography',
									'default'   => array(
									'family'  => 'Ubuntu',
									'font'    => 'google', // this is helper for output ( google, websafe, custom )
									'variant' => '800',
										),
									'chosen'    => false,	
									),
			  
			  
			  ),
			  ),//end of font group
	  
 ),//end of fields subsection
  
),//end of asubsection others

) //end of sections keyword

);// end of option section


// ------------------------------
// separator                       -
// ------------------------------
 $options[] = array(
  'name'   => 'seperator_1',
  'title'  => __('Backup Options and Licence','larestaurante'),
  'icon'   => 'fa fa-bookmark'
); 


// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => __('Backup','larestaurante'),
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => 'You can save your current options. Download a Backup and Import.',
    ),

    array(
      'type'    => 'backup',
    ),

  )
); 
   
// ------------------------------
// license                      -
// ------------------------------
$options[]   = array(
  'name'     => 'license_section',
  'title'    => __('License','larestaurante'),
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => '100% GPL License, Yes it is free!'
    ),
    array(
      'type'    => 'content',
      'content' => 'Codestar Framework is <strong>free</strong> to use both personal and commercial. If you used commercial, <strong>please credit</strong>. Read more about <a href="http://www.gnu.org/licenses/gpl-2.0.txt" target="_blank">GNU License</a>',
    ),

  )
);
CSFramework::instance( $settings, $options );