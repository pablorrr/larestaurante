<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework admin enqueue style and scripts
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'cs_admin_enqueue_scripts' ) ) {
  function cs_admin_enqueue_scripts() {

    // admin utilities
    wp_enqueue_media();

    // wp core styles
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'wp-jquery-ui-dialog' );

    // framework core styles
    wp_enqueue_style( 'cs-framework', CS_URI .'/assets/css/cs-framework.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'font-awesome', CS_URI .'/assets/css/font-awesome.css', array(), '4.7.0', 'all' );

    if ( CS_ACTIVE_LIGHT_THEME ) {
      wp_enqueue_style( 'cs-framework-theme', CS_URI .'/assets/css/cs-framework-light.css', array(), "1.0.0", 'all' );
    }

    if ( is_rtl() ) {
      wp_enqueue_style( 'cs-framework-rtl', CS_URI .'/assets/css/cs-framework-rtl.css', array(), '1.0.0', 'all' );
    }

    // wp core scripts
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'jquery-ui-accordion' );

    // framework core scripts
    wp_enqueue_script( 'cs-plugins',    CS_URI .'/assets/js/cs-plugins.js',    array(), '1.0.0', true );
    wp_enqueue_script( 'cs-framework',  CS_URI .'/assets/js/cs-framework.js',  array( 'cs-plugins' ), '1.0.0', true );

  }
 //conditional loading script handle, load scripts only where is codestar admin page   

}
  if (isset ( $_GET['page']) ){ 
  
			  $page = $_GET['page'];
			  if ($page == 'lares')
  
  add_action( 'admin_enqueue_scripts', 'cs_admin_enqueue_scripts' );


}

/* load google fonts codestar front end */

if ( ! function_exists( 'cs_wp_enqueue_scripts' ) ) {
  function cs_wp_enqueue_scripts() {
	
	
	
	/* paragraphs fonts */
	$google_fonts   = array();
	//get value from group fonts option field
    $google_fonts[] = cs_get_option( 'group_fonts' );
	$enqueue_paragraph_fonts  = array();
	$google_fonts_paragraphs[] = $google_fonts[0][1]['para_typo'];
	
	
	if ( ! empty( $google_fonts_paragraphs ) ) {
      foreach ( $google_fonts_paragraphs as $font ) {
        if( isset( $font['font'] ) && $font['font'] == 'google' ) {
          $variant = ( isset( $font['variant'] ) && $font['variant'] !== 'regular' ) ? ':'. $font['variant'] : '';
          $enqueue_paragraph_fonts[] = $font['family'] . $variant;
        }
      }
    }
	

    if ( ! empty( $enqueue_paragraph_fonts ) ) {
      wp_enqueue_style( 'fonts', esc_url( add_query_arg( 'family', urlencode( implode( '|',$enqueue_paragraph_fonts ) ) , '//fonts.googleapis.com/css' ) ), array(), null );
    }
	
	
	
	
	/* header fonts */
	$google_fonts   = array();
	//get value from group fonts option field
    $google_fonts[] = cs_get_option( 'group_fonts' );
	$enqueue_header_fonts  = array();
	$google_fonts_header[] = $google_fonts[0][1]['head_typo'];
	
	
	if ( ! empty( $google_fonts_header ) ) {
      foreach ( $google_fonts_header as $font ) {
        if( isset( $font['font'] ) && $font['font'] == 'google' ) {
          $variant = ( isset( $font['variant'] ) && $font['variant'] !== 'regular' ) ? ':'. $font['variant'] : '';
          $enqueue_header_fonts[] = $font['family'] . $variant;
        }
      }
    }

    if ( ! empty( $enqueue_header_fonts ) ) {
      wp_enqueue_style( 'cs-p', esc_url( add_query_arg( 'family', urlencode( implode( '|',$enqueue_header_fonts ) ) , '//fonts.googleapis.com/css' ) ), array(), null );
    }
	
}
  add_action( 'wp_enqueue_scripts', 'cs_wp_enqueue_scripts' );
}


