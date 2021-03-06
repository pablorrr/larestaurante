<?php

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// ENQUEUE SCRIPTS AND STYLES. 
// -----------------------------------------------------------------------------------------------
// ===============================================================================================

function larestaurante_scripts() {
	
	//load WP styles
	wp_enqueue_style( 'larestaurante-style', get_stylesheet_uri() );
	
	
// ---------------------------------------------
// load theme and Bootstrap CSS  conditionally     -
// ---------------------------------------------

	if (!is_admin()){
		//load Bootstrap Css
		wp_enqueue_style( 'larestaurante-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );	
		// load theme styles
		wp_enqueue_style( 'la-restaurante-css', get_template_directory_uri() . '/inc/assets/css/lares-css/culinares.css', array(),'1.0', false ); 
		
		//affix effect of Bootstrap
		wp_enqueue_style( 'affix', get_template_directory_uri() . '/inc/assets/css/lares-css/affix.css', array(), '1.0', false );
		//paralax header effect
		wp_enqueue_style( 'styleparx', get_template_directory_uri() . '/inc/assets/css/lares-css/stylepar.css', array(), '1.0.0', 'all' );
		//timeline effect
		wp_enqueue_style( 'larestaurante-timeline-css', get_template_directory_uri() . '/inc/assets/css/lares-css/timeline.css', array(), '1.0.0', 'all' );	
		
		//light-box-gallery.min.css
		wp_enqueue_style( 'light-box-css-min', get_template_directory_uri() . '/inc/assets/css/light-box-gallery.min.css', array(), '1.0.0', 'all' ); 
		}
		
// -----------------------------------------------
// load dashicon WP style, Jquery, HTML5 support     -
// -----------------------------------------------	
  
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script('jquery');
    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

// ---------------------------------------------------
// load Bootstrap Jquery, Theme Jquery conditionally    -
// --------------------------------------------------		
	
	if (!is_admin()){
	//fontawesome
    wp_enqueue_script('larestaurante-fontawesome', get_template_directory_uri() . '/inc/assets/js/fontawesome/fontawesome-all.min.js', array() );
	//fontawesome-V4
    wp_enqueue_script('larestaurante-fontawesome-v4', get_template_directory_uri() . '/inc/assets/js/fontawesome/fa-v4-shims.min.js', array() );
	//popper
    wp_enqueue_script('larestaurante-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array() );
	//theme's JS
    wp_enqueue_script('larestaurante-themejs', get_template_directory_uri() . '/inc/assets/js/themes-scripts.js', array() );
	//skip focus link
	wp_enqueue_script( 'larestaurante-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	//easing scroll menu effect
	wp_enqueue_script('jquery-effects-core',get_template_directory_uri() . '/inc/assets/js/easing-effect/jquery.easing.min.js', array('jquery'), '1.8.8', true);
	 // scroll nav effect
	wp_enqueue_script('nav-scroll',get_template_directory_uri() . '/inc/assets/js/scrolling-nav.js', array('jquery'), '1.8.8', true);
	//bt carousel jqery 
	wp_enqueue_script('ajax-googleapis',get_template_directory_uri() . '/inc/assets/js/jquery.min.js');
	
	//Bootstrap Jquery 
	wp_enqueue_script('larestaurante-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js'); 
	
	//datepicker support
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('smoothness-css',get_template_directory_uri() . '/inc/assets/css/jquery-ui.css',false,"1.9.0",false);
	
    //light box js load (gallery)
	//taken from https://github.com/ashleydw/lightbox/blob/master/ licensed under MIT
	wp_enqueue_script('ekko-lightbox',get_template_directory_uri() . '/inc/assets/js/ekko-lightbox.min.js', array('jquery'), '5.3.0', true); 
	wp_enqueue_script('light-box-gallery',get_template_directory_uri() . '/inc/assets/js/light-box-gallery.js', array('jquery'), '1.0.0', true); 
	//booking form validation
	wp_enqueue_script('larestaurante-form-val-book', get_template_directory_uri() . '/inc/assets/js/validate-booking-form.js', false, '1.0.0', true ); 
	//affix plugin
	wp_enqueue_script('affix-plugin', get_template_directory_uri() . '/inc/assets/js/affix-plugin.js', false, '', true ); 
	 }
	 
	 
// ---------------------------------------------------
// load Pagination AJAX   conditionally    -
// --------------------------------------------------			 
	 
	 if(is_archive()){
		 wp_register_script( 'cpta-pagination-custom-js',get_template_directory_uri(). '/inc/assets/js/cptapagination.js');
		 wp_localize_script( 'cpta-pagination-custom-js', 'ajax_params',
						 array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		 wp_enqueue_script( 'cpta-pagination-custom-js' ); 
	 }
	 
// ---------------------------------------------------
//  thread comments support  -
// --------------------------------------------------		 
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'larestaurante_scripts' );

// ---------------------------------------------
// remove WooCommerce css style when is unnecessary     -
// source: https://crunchify.com/how-to-stop-loading-woocommerce-js-javascript-and-css-files-on-all-wordpress-postspages/
// ---------------------------------------------

/* */
add_action( 'wp_enqueue_scripts', 'crunchify_disable_woocommerce_loading_css_js' );
 
function crunchify_disable_woocommerce_loading_css_js() {
 
	// Check if WooCommerce plugin is active
	if( function_exists( 'is_woocommerce' ) ){
 
		// Check if it's any of WooCommerce page
		if(! is_woocommerce() && ! is_cart() && ! is_checkout() ) { 		
			
			## Dequeue WooCommerce styles
			wp_dequeue_style('woocommerce-layout'); 
			wp_dequeue_style('woocommerce-general'); 
			wp_dequeue_style('woocommerce-smallscreen'); 	
 
			## Dequeue WooCommerce scripts
			wp_dequeue_script('wc-cart-fragments');
			wp_dequeue_script('woocommerce'); 
			wp_dequeue_script('wc-add-to-cart'); 
		
		}
	}	
}