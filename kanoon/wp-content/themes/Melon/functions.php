<?php
/**
 * functions and definitions
 *
 */


require_once('class-tgm-plugin-activation.php');
include ( 'aq_resizer.php' );
include ( 'getplugins.php' );



/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since web2feel 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'web2feel_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since web2feel 1.0
 */
function web2feel_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/* Add post formats */
	add_theme_support( 'post-formats', array( 'video','gallery','audio','link','quote','chat','status' ) );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => 'منوی اصلی',
		'secondary' => 'منوی دوم',
	) );

	function fallbackfmenu(){ ?>
				<div id="fmenu">
					<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
				</div>
	<?php }	

	function fallbacksmenu(){ ?>
				<div id="smenu">
					<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
				</div>
	<?php }	

}
endif; // web2feel_setup
add_action( 'after_setup_theme', 'web2feel_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since web2feel 1.0
 */
function web2feel_widgets_init() {

	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'description' => 'نوار کناری در تمامی صفحات نمایش داده می شود',
		'before_widget' => '<aside id="%1$s" class="widget papr %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2> <div class="stripe"></div>',
	) );
	
		register_sidebar( array(
		'name' => 'Footer',
		'id' => 'Footer',
		'description' => 'نوار پایینی در تمامی صفحات قابل نمایش است. بهتر است از 3 کادر استفاده شود.',
		'before_widget' => '<aside id="%1$s" class="footer-widget  %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3><div class="stripe"></div>',
	) );
	
	
}
add_action( 'widgets_init', 'web2feel_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function web2feel_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	//wp_enqueue_script( 'easyticker', get_template_directory_uri() . '/js/jquery.easy-ticker.js', array( 'jquery' ), '20120206', true );
	//wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20120206', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'web2feel_scripts' );


/* CUSTOM EXCERPTS */
	
function wpe_excerptlength_aside($length) {
    return 15;
}
	
function wpe_excerptlength_archive($length) {
    return 50;
}
function wpe_excerptlength_index($length) {
    return 30;
}


function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

// show theme information on dashboard
function wpc_dashboard_widget_function() {
	echo "<ul>
	<li>زمان انتشار: اردیبهشت ماه 1392</li>
	<li>نام طرح: <a href='http://www.Mixa.ir/melon' title='Melon'>Melon | مِلون</a></li>
	<li>طراح پوسته: <a href='http://www.Mixa.ir' title='Mixa Team'>تیم میکسا</a></li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'اطلاعات فنی پوسته', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );