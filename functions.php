<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

// bootstrap the framework
require_once( 'framework/pxls.php' );
new PXLS();

/* -----------------------------------------------------------------------------------
 * load the theme files, including support for overriding in a child theme.
 * ----------------------------------------------------------------------------------- */
$includes = array(
	'theme/functions.php',
	'theme/options.php',			// theme options
	'theme/menus.php',				// register the theme menu areas
	'theme/sidebars.php',			// register the theme sidebars
	'theme/custom-meta-boxes.php'	// add custom meta boxes
);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'pxls_theme_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}



/**
 * outputs the required classes for the content column (#column-2), depending ont he configuration of the left and right sidebars.
 * @return [type] [description]
 */
function pxls_contentcolumn_width_classes() {
	if( pxls_active_sidebar( 'right' ) || pxls_active_sidebar( 'left' ) ) {
		if ( pxls_active_sidebar( 'right' ) && pxls_active_sidebar( 'left' ) ) {
			echo 'push-3 large-6 columns'; 
		}
		else{
			if ( pxls_active_sidebar( 'left' ) ) { echo 'push-3 '; }
			echo 'large-9 columns'; 
		}
	}
	else{
		echo 'small-12 columns'; 
	}
}


if ( ! function_exists( 'set_theme_name' ) ) {
	/**
	 * pxls_set_theme_name()
	 * 
	 * Sets the theme name as a global option setting
	 */
	function set_theme_name() {
		$pxls_theme_name = wp_get_theme();
		if ( get_option( 'pxls_themename' ) != $pxls_theme_name ) {
			update_option( 'pxls_themename', $pxls_theme_name );
		}
	}
}
add_action( 'init', 'set_theme_name', 10 );


/**
 * pxls_setup()
 * 
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function pxls_setup() {

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// add support for the html5 search form
	add_theme_support( 'html5', array( 'search-form' ) );

	// set the default content width 
	if ( !isset( $content_width ) )
		$content_width = 960;

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'pxls', get_stylesheet_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_stylesheet_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

}
add_action( 'after_setup_theme', 'pxls_setup' );


/**
 * remove the admin bar from the front end (not admin)
 */
add_filter('show_admin_bar', '__return_false');



if ( ! function_exists( 'pxls_enqueue_css' ) ) {
	/**
	 * pxls_enqueue_css()
	 * 
	 * Enqueue the sites css
	 */
	function pxls_enqueue_css() {
		wp_register_style( 'theme-style', get_stylesheet_directory_uri() . '/css/style.min.css' );	
		wp_enqueue_style( 'theme-style' );
	}
}
add_action( 'wp_enqueue_scripts', 'pxls_enqueue_css' );




if ( ! function_exists( 'pxls_enqueue_js' ) ) {
	/**
	 * pxls_enqueue_js()
	 * 
	 * Enqueue the sites javascripts
	 */
	function pxls_enqueue_js() {

		wp_register_script( 'pxls_libs', get_template_directory_uri() . '/js/libs/libs.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'pxls_foundation', get_template_directory_uri() . '/js/libs/foundation.min.js', array( 'pxls_libs' ), false, true );
		wp_register_script( 'pxls_video', '//vjs.zencdn.net/4.6/video.js', array( 'pxls_foundation' ), false, true );
		wp_register_script( 'pxls_app', get_stylesheet_directory_uri() . '/js/app.js', array( 'pxls_video' ), false, true );

		wp_register_script( 'pxls_modernizr', get_template_directory_uri() . '/js/libs/modernizr.min.js', array(), false, false );

		wp_enqueue_script( 'pxls_modernizr' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'pxls_libs' );
	    wp_enqueue_script( 'pxls_foundation' );
	    wp_enqueue_script( 'pxls_video' );
		wp_enqueue_script( 'pxls_app' );
	}
}
add_action( 'wp_enqueue_scripts', 'pxls_enqueue_js' );



/**
 * remove_dashboard_meta()
 * 
 * Removes all dashboard widgets.
 * Taken from https://wordpress.org/support/topic/programatically-remove-the-wordpress-news-widget-from-the-dashboard#post-5060314
 * 
 * @since 2.0.0
 */
function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'side');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );







class themeslug_walker_nav_menu extends Walker_Nav_Menu {
  
	// add classes to ul sub-menus
	function start_lvl( &$output, $depth = 0, $args = array() ) {
	    // depth dependent classes
	    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
	    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
	    $classes = array(
	        'sub-menu',
	        'dropdown',
	        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
	        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
	        'menu-depth-' . $display_depth
	        );
	    $class_names = implode( ' ', $classes );
	  
	    // build html
	    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}
	  
	// add main/sub classes to li's and links
	 function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    global $wp_query;
	    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	  
	    // depth dependent classes
	    $depth_classes = array(
	        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
	        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
	        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
	        'menu-item-depth-' . $depth
	    );
	    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
	  
	    // passed classes
	    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
	  
	    // build html
	    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
	  
	    // link attributes
	    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
	  
	    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
	        $args->before,
	        $attributes,
	        $args->link_before,
	        apply_filters( 'the_title', $item->title, $item->ID ),
	        $args->link_after,
	        $args->after
	    );
	  
	    // build html
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}






