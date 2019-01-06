<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// CUSTOMIZE SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================




$options              = array();

// -----------------------------------------
// Customize Core Fields                   -
// -----------------------------------------
$options[]            = array(
  'name'              => 'customizer_fields',
  'title'             => __('Customizer by Codestar Framework','larestaurante'),
  'settings'          => array(
// codestar heading
    array(
      'name'          => 'codestar_heading',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'heading',
          'content'   => __('Theme Customizer','larestaurante'),
        ),
      ),
    ),

 // codestar subheading
    array(
      'name'          => 'footer_subheading',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'subheading',
          'content'   => __('Footer Area','larestaurante'),
        ),
      ),
    ),
	// codestar notice:info
    array(
      'name'          => 'copyright_notice_info',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'notice',
          'class'     => 'info',
          'content'   => __('Put some copyright text','larestaurante'),
        ),
      ),
    ),
    // text
    array(
      'name'          => 'copyright',
      'control'       => array(
        'label'       => __('copyright','larestaurante'),
        'type'        => 'text',
      ),
    ),
	// codestar notice:info
    array(
      'name'          => 'opening_hours_notice_info',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'notice',
          'class'     => 'info',
          'content'   => __('Write down opening hours','larestaurante'),
        ),
      ),
    ),

	// text
    array(
      'name'          => 'monday',
	  'default' 	  => 'No opening hours has been saved yet.',
      'control'       => array(
        'label'       => __('Monday','larestaurante'),
        'type'        => 'text',
      ),
    ),
	
	// text
    array(
      'name'          => 'tuesday',
	  'default' 	  => 'No opening hours has been saved yet.',
      'control'       => array(
        'label'       => __('Tuesday','larestaurante'),
        'type'        => 'text',
      ),
    ),
	// text
    array(
      'name'          => 'wednesday',
	  'default' 	  => 'No opening hours has been saved yet.',
      'control'       => array(
        'label'       => __('Wednesday','larestaurante'),
        'type'        => 'text',
      ),
    ),

	// text
    array(
      'name'          => 'thursday',
	  'default' 	  => 'No opening hours has been saved yet.',
      'control'       => array(
        'label'       => __('Thursday','larestaurante'),
        'type'        => 'text',
      ),
    ),
	
	// text
    array(
      'name'          => 'friday',
	  'default' 	  => 'No opening hours has been saved yet.',
      'control'       => array(
        'label'       => __('Friday','larestaurante'),
        'type'        => 'text',
      ),
    ),

    array(
      'name'          => 'saturday',
	  'default' 	  => 'No opening hours has been saved yet.',
      'control'       => array(
        'label'       => __('Saturday','larestaurante'),
        'type'        => 'text',
      ),
    ),

	// text
    array(
      'name'          => 'sunday',
	  'default' 	  => 'No opening hours has been saved yet.',
      'control'       => array(
        'label'       => __('Sunday','larestaurante'),
        'type'        => 'text',
      ),
    ),
	// codestar notice:info
    array(
      'name'          => 'phone_number_notice_info',
	  'default' 	  => 'No opening hours has been saved yet.',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'notice',
          'class'     => 'info',
          'content'   => __('Write down phone number','larestaurante'),
        ),
      ),
    ),
	// text
    array(
      'name'          => 'phone_number',
	  'default' 	  => 'No phone number information has been saved yet.',
      'control'       => array(
        'label'       => __('phone number','larestaurante'),
        'type'        => 'text',
      ),
    ),
	
	
  )
);

CSFramework_Customize::instance( $options );