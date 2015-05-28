<?php
/**
 * nursery functions and definitions
 *
 * @package nursery
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'nursery_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nursery_setup() {

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// wp_nav_menu()
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'nursery' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nursery_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // nursery_setup
add_action( 'after_setup_theme', 'nursery_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function nursery_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'nursery' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
        'name' => __( 'Latest news', 'nursery' ),
        'id' => 'sidebar-2',
        'description' => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Documents', 'nursery' ),
        'id' => 'sidebar-3',
        'description' => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ) );

     register_sidebar( array(
        'name' => __( 'Social media', 'nursery' ),
        'id' => 'sidebar-5',
        'description' => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'nursery_widgets_init' );


//Theme Customization API
function nursery_customize_register( $wp_customize ) {

	//COLORS
  	$colors = array();
	$colors[] = array(
	  'slug'=>'content_text_color', 
	  'default' => '#333',
	  'label' => __('Content Text Color', 'nursery')
	);
	$colors[] = array(
	  'slug'=>'content_link_color', 
	  'default' => '#88C34B',
	  'label' => __('Content Link Color', 'nursery')
	);
	foreach( $colors as $color ) {
	  // SETTINGS
	  $wp_customize->add_setting(
	    $color['slug'], array(
	      'default' => $color['default'],
	      'type' => 'option', 
	      'capability' => 
	      'edit_theme_options'
	    )
	  );
	  // CONTROLS
	  $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	      $wp_customize,
	      $color['slug'], 
	      array('label' => $color['label'], 
	      'section' => 'colors',
	      'settings' => $color['slug'])
	    )
	  );
	}


	//LOGO
	$wp_customize->add_section( 
		'nursery_logo_section' , array(
	    'title'       => __( 'Logo', 'nursery' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to replace the default site name in the header'
		) 
	);

	$wp_customize->add_setting( 'nursery_logo' );

	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 'nursery_logo', array(
	    'label'    => __( 'Logo', 'nursery' ),
	    'section'  => 'nursery_logo_section',
	    'settings' => 'nursery_logo') 
	    ) 
    );


}
add_action( 'customize_register', 'nursery_customize_register' );



/**
 * Enqueue scripts and styles.
 */
function nursery_scripts() {
	wp_enqueue_style( 'nursery-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'nursery_scripts' );

