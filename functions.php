<?php

/*
 * LaRestaurante functions and definitions
 *
 * @package LaRestaurante
 */
 
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
//CODESTAR FRAMEWORK OPTIONS lOADING
// -----------------------------------------------------------------------------------------------
// ===============================================================================================

//require_once dirname( __FILE__ ) .'/cs-framework/cs-framework.php';
// -(or)-
require_once get_template_directory() .'/cs-framework/cs-framework.php';
 
 define( 'CS_ACTIVE_LIGHT_THEME',  false  ); // default false
 define( 'CS_ACTIVE_METABOX',     false  );
 define( 'CS_ACTIVE_TAXONOMY',    false );
 define( 'CS_ACTIVE_SHORTCODE',   false );  
 // ===============================================================================================
// -----------------------------------------------------------------------------------------------
//  END CODESTAR FRAMEWORK OPTIONS lOADING
// -----------------------------------------------------------------------------------------------
// ===============================================================================================

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php'; 
 
/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';
/**
 * Load custom widget.
 */
require get_template_directory() . '/inc/custom-widget/custom-widget.php';
/**
 * Load Ajax Pagination.
 */
require get_template_directory() . '/inc/pagin-ajax.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';


/**
 * Metabox definition area.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_parent_theme_file_path ('/inc/customizer.php');

/**
 * Load plugin compatibility file(jetpack, woocomerce).
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';



/**
 * Load shortccodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'larestaurante_navwalker' )) {
    require_once(get_template_directory() . '/inc/larestaurante-navwalker.php');
}	

/**
 * Load hooks.
 */
require get_template_directory() . '/inc/hooks.php';
	
/**
 .
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 */
require_once get_template_directory() . '/inc/plugin-compatibility/class-tgm-plugin-activation.php';

/**
 * Register the required plugins for this theme.
 */	
add_action( 'tgmpa_register', 'la_restaurante_register_required_plugins' );

require get_template_directory() . '/inc/tgm-register-plugin.php';


/**
 * Show Welcome screen on activation
*/
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/larestaurante-welcome-screen.php';
}