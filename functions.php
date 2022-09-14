<?php
/**
 * websitebooster-IKHVS functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package websitebooster-IKHVS
 */
define( 'SHOPSTAR_THEME_VERSION' , '1.0.95' );

global $shopstar_demo_slides;

if ( empty( $shopstar_demo_slides ) ) {
	$shopstar_demo_slides = array(
		'slide1' => array(
			'image' => get_template_directory_uri() . '/library/images/demo/slider-default01.jpg',
 			'text' => sprintf( __( '<h2>Fashion is what you buy</h2><p>Style is what you do with it</p><p><a href="%1$s" target="_blank" rel="nofollow" class="button no-bottom-margin">%2$s</a></p>', 'shopstar' ), esc_url( 'https://www.outtheboxthemes.com/wordpress-themes/shopstar/' ), __( 'Shop Now', 'shopstar' ) )
		),
		'slide2' => array(
			'image' => get_template_directory_uri() . '/library/images/demo/slider-default02.jpg',
			'text' => sprintf( __( '<h2>Life isn\'t perfect</h2><p>But your outfit can be</p><p><a href="%1$s" target="_blank" rel="nofollow" class="button no-bottom-margin">%2$s</a></p>', 'shopstar' ), esc_url( 'https://www.outtheboxthemes.com/wordpress-themes/shopstar/' ), __( 'Shop Now', 'shopstar' ) )
		)
	);
}

if ( ! function_exists( 'shopstar_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shopstar_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 832; /* pixels */
	}

	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,600,600italic,700,700italic' );
	add_editor_style( $font_url );
	
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,800' );
	add_editor_style( $font_url );
	
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lora:400italic' );
	add_editor_style( $font_url );
	
	add_editor_style('editor-style.css');

	
	
	if ( !get_theme_mod( 'otb_shopstar_dot_org' ) ) set_theme_mod( 'otb_shopstar_dot_org', true );
	if ( !get_theme_mod( 'otb_shopstar_activated' ) ) set_theme_mod( 'otb_shopstar_activated', date('Y-m-d') );
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on shopstar, use a find and replace
	 * to change 'shopstar' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'shopstar', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	*
	* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'shopstar_blog_img_side', 352, 230, true );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'shopstar' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Setup Custom Logo Support for theme
	* Supported from WordPress version 4.5 onwards
	* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
	*/
	if ( function_exists( 'has_custom_logo' ) ) {
		add_theme_support( 'custom-logo' );
	}
	
	// The custom header is used for the logo
	add_theme_support( 'custom-header', array(
		'default-image' => esc_url( get_template_directory_uri() ) . '/library/images/headers/default.jpg',
		'width'         => 1680,
		'height'        => 600,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false,
	) );	

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shopstar_custom_background_args', array(
		'default-color' => 'FFFFFF',
		'default-image' => '',
	) ) );
	
	add_theme_support( 'title-tag' );
	
	// Gutenberg Support
    add_theme_support( 'align-wide' );
	
 	add_theme_support( 'woocommerce', array(
 		'gallery_thumbnail_image_width' => 300
 	) );
	
	if ( get_theme_mod( 'shopstar-woocommerce-product-image-zoom', true ) ) {	
		add_theme_support( 'wc-product-gallery-zoom' );
	}
		
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );	
}
endif; // shopstar_setup
add_action( 'after_setup_theme', 'shopstar_setup' );

/**
 * Enqueue admin scripts and styles.
 */
function shopstar_admin_scripts() {
	wp_enqueue_style( 'shopstar-admin-css', get_template_directory_uri() . '/library/css/admin.css', array(), SHOPSTAR_THEME_VERSION );
	wp_enqueue_script( 'shopstar-admin-js', get_template_directory_uri() . '/library/js/admin.js', SHOPSTAR_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'shopstar_admin_scripts' );






function shopstar_set_elementor_default_schemes( $config ) {

	// Primary
	$config['schemes']['items']['color']['items']['1']['value'] = get_theme_mod( 'shopstar-heading-font-color', customizer_library_get_default( 'shopstar-heading-font-color' ) );
	
	// Secondary
	$config['schemes']['items']['color']['items']['2']['value'] = get_theme_mod( 'shopstar-primary-color', customizer_library_get_default( 'shopstar-primary-color' ) );
	
	// Text
	$config['schemes']['items']['color']['items']['3']['value'] = get_theme_mod( 'shopstar-body-font-color', customizer_library_get_default( 'shopstar-body-font-color' ) );
	
	// Accent
	$config['schemes']['items']['color']['items']['4']['value'] = get_theme_mod( 'shopstar-primary-color', customizer_library_get_default( 'shopstar-primary-color' ) );

	// Primary Headline
	$config['schemes']['items']['typography']['items']['1']['value'] = [
		'font-family' => get_theme_mod( 'shopstar-heading-font', customizer_library_get_default( 'shopstar-heading-font' ) ),
		'font-weight' => get_theme_mod( 'shopstar-heading-font-weight', customizer_library_get_default( 'shopstar-heading-font-weight' ) )
	];
	
	// Secondary Headline
	$config['schemes']['items']['typography']['items']['2']['value'] = [
		'font-family' => get_theme_mod( 'shopstar-heading-font', customizer_library_get_default( 'shopstar-heading-font' ) ),
		'font-weight' => get_theme_mod( 'shopstar-heading-font-weight', customizer_library_get_default( 'shopstar-heading-font-weight' ) )
	];

	// Body Text
	$config['schemes']['items']['typography']['items']['3']['value'] = [
		'font-family' => get_theme_mod( 'shopstar-body-font', customizer_library_get_default( 'shopstar-body-font' ) ),
		'font-weight' => get_theme_mod( 'shopstar-body-font-weight', customizer_library_get_default( 'shopstar-body-font-weight' ) )
	];

	// Accent Text
	$config['schemes']['items']['typography']['items']['4']['value'] = [
		'font-family' => get_theme_mod( 'shopstar-heading-font', customizer_library_get_default( 'shopstar-heading-font' ) ),
		'font-weight' => get_theme_mod( 'shopstar-heading-font-weight', customizer_library_get_default( 'shopstar-heading-font-weight' ) )
	];

	$config['schemes']['items']['color-picker']['items']['1']['value'] = get_theme_mod( 'shopstar-primary-color', customizer_library_get_default( 'shopstar-primary-color' ) );
	$config['schemes']['items']['color-picker']['items']['2']['value'] = get_theme_mod( 'shopstar-button-color', customizer_library_get_default( 'shopstar-button-color' ) );
	$config['schemes']['items']['color-picker']['items']['3']['value'] = get_theme_mod( 'shopstar-body-font-color', customizer_library_get_default( 'shopstar-body-font-color' ) );
	$config['schemes']['items']['color-picker']['items']['4']['value'] = get_theme_mod( 'shopstar-footer-color', customizer_library_get_default( 'shopstar-footer-color' ) );
	$config['schemes']['items']['color-picker']['items']['5']['value'] = '';
	$config['schemes']['items']['color-picker']['items']['6']['value'] = '';
	$config['schemes']['items']['color-picker']['items']['7']['value'] = '';
	$config['schemes']['items']['color-picker']['items']['8']['value'] = '';
	
	return $config;
};
add_filter('elementor/editor/localize_settings', 'shopstar_set_elementor_default_schemes', 100);

// Adjust content_width for full width pages
function shopstar_adjust_content_width() {
	global $content_width;

	if ( shopstar_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}

    if ( is_page_template( 'template-full-width.php' ) ) {
    	$content_width = 1140;
	} else if ( ( is_page_template( 'template-left-sidebar.php' ) || basename( get_page_template() ) === 'page.php' ) && !is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1140;
	} else if ( shopstar_is_woocommerce_activated() && is_shop() && get_theme_mod( 'shopstar-layout-woocommerce-shop-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-shop-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( shopstar_is_woocommerce_activated() && is_product() && get_theme_mod( 'shopstar-layout-woocommerce-product-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-product-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( shopstar_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && get_theme_mod( 'shopstar-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( $is_woocommerce && !is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1140;
	}
}
add_action( 'template_redirect', 'shopstar_adjust_content_width' );

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
 /*
function shopstar_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'otb-dashboard-news', // Widget slug.
		__( 'Out the Box News', 'shopstar' ), // Title.
		'otb_dashboard_news' // Display function.
	);
	
	// Move the Out the Box widget to the top
	global $wp_meta_boxes;

	$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
	$ours      = array( 'otb-dashboard-news' => $dashboard['otb-dashboard-news'] );
	unset($dashboard['otb-dashboard-news']);

	$wp_meta_boxes['dashboard']['normal']['core'] = array_merge( $ours, $dashboard ); // WPCS: override ok.
}
add_action( 'wp_dashboard_setup', 'shopstar_add_dashboard_widgets', 20 );
*/
/**
 * Create the function to output the contents of your Dashboard Widget.
 */
function otb_dashboard_news() {
	$feed = array(
		array(
			'url'          => 'https://www.outtheboxthemes.com/feed/',
			'items'        => 4,
			'show_summary' => 0,
			'show_author'  => 0,
			'show_date'    => 1,
		),
	);

	wp_dashboard_primary_output( 'otb_dashboard_widget_news', $feed );

	if( function_exists( 'wp_print_community_events_markup' ) ) {
		?>
		<p class="community-events-footer">
			<?php
			printf(
				'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s <span class="screen-reader-text">%3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
				esc_url( 'https://www.outtheboxthemes.com/blog/' ),
				__( 'Blog', 'shopstar' ),
				/* translators: accessibility text */
				__( '(opens in a new window)', 'shopstar' )
			);
			echo ' | ';

			printf(
				'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s <span class="screen-reader-text">%3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
				esc_url( 'https://www.outtheboxthemes.com/documentation/shopstar/' ),
				__( 'Documentation', 'shopstar' ),
				/* translators: accessibility text */
				__( '(opens in a new window)', 'shopstar' )
			);
			echo ' | ';
			
			printf(
				'<a href="%1$s" target="_blank" rel="noopener noreferrer" style="color: #2ebd59">%2$s <span class="screen-reader-text">%3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
				/* translators: If a Rosetta site exists (e.g. https://es.wordpress.org/news/), then use that. Otherwise, leave untranslated. */
				esc_url( 'https://www.outtheboxthemes.com/wordpress-themes/shopstar/' ),
				__( 'Get Premium', 'shopstar' ),
				/* translators: accessibility text */
				__( '(opens in a new window)', 'shopstar' )
			);
			?>
		</p>
		<?php
	}	
}

function shopstar_review_notice() {
	$user_id = get_current_user_id();
	$message = 'Thank you for using Shopstar! We hope you\'re enjoying the theme, please consider <a href="https://wordpress.org/support/theme/shopstar/reviews/#new-post" target="_blank">rating it on wordpress.org</a> :)';
	
	if ( !get_user_meta( $user_id, 'shopstar_review_notice_dismissed' ) ) {
		$class = 'notice notice-success is-dismissible';
		printf( '<div class="%1$s"><p>%2$s</p><p><a href="?shopstar-review-notice-dismissed">Dismiss this notice</a></p></div>', esc_attr( $class ), $message );
	}
}
$today = new DateTime( date( 'Y-m-d' ) );
$activate  = new DateTime( date( get_theme_mod( 'otb_shopstar_activated' ) ) );
if ( $activate->diff($today)->d >= 14 ) {
	add_action( 'admin_notices', 'shopstar_review_notice' );
}

function shopstar_review_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['shopstar-review-notice-dismissed'] ) ) {
		add_user_meta( $user_id, 'shopstar_review_notice_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'shopstar_review_notice_dismissed' );

function shopstar_admin_notice() {
	$user_id = get_current_user_id();
	
	$message = array (
		'id' => 15,
		'heading' => 'Christmas Sale',
		'text' => '<a href="https://www.outtheboxthemes.com/go/theme-notification-christmas-2020-wordpress-themes/">Get 20% off any of our Premium WordPress Themes until Christmas Day</a>',
		'link' => 'https://www.outtheboxthemes.com/go/theme-notification-christmas-2020-wordpress-themes/'
	);
	
	if ( !empty( $message['text'] ) && !get_user_meta( $user_id, 'shopstar_admin_notice_' .$message['id']. '_dismissed' ) ) {
		$class = 'notice otb-notice notice-success is-dismissible';
		printf( '<div class="%1$s"><img src="https://www.outtheboxthemes.com/wp-content/uploads/2020/12/logo-red.png" class="logo" /><h3>%2$s</h3><p>%3$s</p><p style="margin:0;"><a class="button button-primary" href="%4$s" target="_blank">Read More</a> <a class="button button-dismiss" href="?shopstar-admin-notice-dismissed&shopstar-admin-notice-id=%5$s">Dismiss</a></p></div>', esc_attr( $class ), $message['heading'], $message['text'], $message['link'], $message['id'] );
	}
}

if ( date('Y-m-d') <= '2020-12-25' ) {
	add_action( 'admin_notices', 'shopstar_admin_notice' );
}

function shopstar_admin_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['shopstar-admin-notice-dismissed'] ) ) {
    	$shopstar_admin_notice_id = $_GET['shopstar-admin-notice-id'];
		add_user_meta( $user_id, 'shopstar_admin_notice_' .$shopstar_admin_notice_id. '_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'shopstar_admin_notice_dismissed' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shopstar_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shopstar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar(array(
		'name' => __( 'Footer', 'shopstar' ),
		'id' => 'footer',
		'description' => ''
	));
}
add_action( 'widgets_init', 'shopstar_widgets_init' );

function shopstar_set_variables() {}
add_action('init', 'shopstar_set_variables', 10);

/**
 * Enqueue scripts and styles.
 */
function shopstar_scripts() {
	wp_enqueue_style( 'shopstar-site-title-font-default', '//fonts.googleapis.com/css?family=Prata:400', array(), SHOPSTAR_THEME_VERSION );
	wp_enqueue_style( 'shopstar-body-font-default', '//fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,600,600italic,700,700italic', array(), SHOPSTAR_THEME_VERSION );
	wp_enqueue_style( 'shopstar-blockquote-quote-font', '//fonts.googleapis.com/css?family=Lora:400italic', array(), SHOPSTAR_THEME_VERSION );	
	wp_enqueue_style( 'shopstar-heading-font-default', '//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,800', array(), SHOPSTAR_THEME_VERSION );

	if ( get_theme_mod( 'shopstar-header-layout', customizer_library_get_default( 'shopstar-header-layout' ) ) == 'shopstar-header-layout-centered' ) {
		wp_enqueue_style( 'shopstar-header-centered', get_template_directory_uri().'/library/css/header-centered.css', array(), SHOPSTAR_THEME_VERSION );
	} else {
		wp_enqueue_style( 'shopstar-header-left-aligned', get_template_directory_uri().'/library/css/header-left-aligned.css', array(), SHOPSTAR_THEME_VERSION );
	}
	
	wp_enqueue_style( 
		'font-awesome-5', 
		'https://use.fontawesome.com/releases/v5.3.0/css/all.css', 
		array(), 
		'5.3.0' 
	);
	wp_enqueue_style( 'shopstar-style', get_stylesheet_uri(), array(), SHOPSTAR_THEME_VERSION );
	
	if ( shopstar_is_woocommerce_activated() ) {
		wp_enqueue_style( 'shopstar-woocommerce-custom', get_template_directory_uri().'/library/css/woocommerce-custom.css', array(), SHOPSTAR_THEME_VERSION );
	}
	
	wp_enqueue_script( 'shopstar-navigation-js', get_template_directory_uri() . '/library/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'shopstar-caroufredsel-js', get_template_directory_uri() . '/library/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	wp_enqueue_script( 'shopstar-touchswipe-js', get_template_directory_uri() . '/library/js/jquery.touchSwipe.min.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	wp_enqueue_script( 'shopstar-custom-js', get_template_directory_uri() . '/library/js/custom.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	// wp_enqueue_script( 'shopstar-magnifier-bup', get_template_directory_uri() . '/library/js/bup.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	
	wp_enqueue_script( 'shopstar-skip-link-focus-fix-js', get_template_directory_uri() . '/library/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shopstar_scripts' );

/**
 * Load Gutenberg stylesheet.
*/
function shopstar_gutenberg_assets() {
	wp_enqueue_style( 'shopstar-gutenberg-editor', get_theme_file_uri( '/library/css/gutenberg-editor-style.css' ), false, SHOPSTAR_THEME_VERSION );
	
	// Output inline styles based on theme customizer selections
	require get_template_directory() . '/library/includes/gutenberg-editor-styles.php';
}
add_action( 'enqueue_block_editor_assets', 'shopstar_gutenberg_assets' );

// Recommended plugins installer
require_once get_template_directory() . '/library/includes/class-tgm-plugin-activation.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/library/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/library/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/library/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/library/includes/jetpack.php';

// Helper library for the theme customizer.
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/customizer/customizer-options.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/customizer/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/customizer/mods.php';

// Include TRT Customize Pro library
require_once( get_template_directory() . '/trt-customize-pro/class-customize.php' );

/**
 * Premium Upgrade Page
 */
include get_template_directory() . '/upgrade/upgrade.php';

/**
 * Enqueue shopstar custom customizer styling.
 */
function shopstar_load_customizer_script() {
	wp_enqueue_script( 'shopstar-customizer-custom-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	wp_enqueue_style( 'shopstar-customizer', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css', array(), SHOPSTAR_THEME_VERSION );
}
add_action( 'customize_controls_enqueue_scripts', 'shopstar_load_customizer_script' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function shopstar_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'shopstar_pingback_header' );

if ( ! function_exists( 'shopstar_load_dynamic_css' ) ) :
	/**
	 * Add Dynamic CSS
	 */
	function shopstar_load_dynamic_css() {
		$shopstar_slider_has_min_width = get_theme_mod( 'shopstar-slider-has-min-width', customizer_library_get_default( 'shopstar-slider-has-min-width' ) );
		$shopstar_slider_min_width 	   = floatVal( get_theme_mod( 'shopstar-slider-min-width', customizer_library_get_default( 'shopstar-slider-min-width' ) ) );
	
		// Activate the mobile menu when on a mobile device
		//if ( wp_is_mobile() ) {
		//	$mobile_menu_breakpoint = 10000000;
		//} else {
			$mobile_menu_breakpoint = 960;
		//}
		
		require get_template_directory() . '/library/includes/dynamic-css.php';
	}
endif;
add_action( 'wp_head', 'shopstar_load_dynamic_css' );

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'shopstar_is_woocommerce_activated' ) ) :
	function shopstar_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) {
			return true;
		} else {
			return false;
		}
	}
endif; // shopstar_is_woocommerce_activated

if ( shopstar_is_woocommerce_activated() ) {
	require get_template_directory() . '/library/includes/woocommerce-inc.php';
}

// Add CSS class to body by filter
function shopstar_add_body_class( $classes ) {
	
	if( wp_is_mobile() ) {
		$classes[] = 'mobile-device';
	}
	
	if ( get_theme_mod( 'shopstar-media-crisp-images', customizer_library_get_default( 'shopstar-media-crisp-images' ) ) ) {
		$classes[] = 'crisp-images';
	}
	
	if ( get_theme_mod( 'shopstar-page-builders-use-theme-styles', customizer_library_get_default( 'shopstar-page-builders-use-theme-styles' ) ) ) {
		$classes[] = 'shopstar-page-builders-use-theme-styles';
	}
	
	if ( shopstar_is_woocommerce_activated() && is_shop() && get_theme_mod( 'shopstar-layout-woocommerce-shop-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-shop-full-width' ) ) ) {
		$classes[] = 'shopstar-shop-full-width';
	}

	if ( shopstar_is_woocommerce_activated() && is_product() && get_theme_mod( 'shopstar-layout-woocommerce-product-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-product-full-width' ) ) ) {
		$classes[] = 'shopstar-product-full-width';
	}
	
	if ( shopstar_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && get_theme_mod( 'shopstar-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$classes[] = 'shopstar-shop-full-width';
	}
		
	if ( shopstar_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}
	
	if ( $is_woocommerce && !is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'full-width';
	}	
	
	return $classes;
}
add_filter( 'body_class', 'shopstar_add_body_class' );

// Set the number or products per page
function shopstar_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = get_theme_mod( 'shopstar-woocommerce-products-per-page' );
	
	return $cols;
}
add_filter( 'loop_shop_per_page', 'shopstar_loop_shop_per_page', 20 );

/**
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
endif;

// Disable WooCommerce Ajax Cart Fragments
function shopstar_disable_woocommerce_cart_fragments() { 
	if ( !get_theme_mod( 'shopstar-woocommerce-enable-ajax-cart-fragments', customizer_library_get_default( 'shopstar-woocommerce-enable-ajax-cart-fragments' ) ) ) {
		wp_dequeue_script( 'wc-cart-fragments' );
	} 
}
add_action( 'wp_enqueue_scripts', 'shopstar_disable_woocommerce_cart_fragments', 11 );



function ikhouvanshoppen_scripts() {
	wp_enqueue_script("jquery");
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '0.1', 'all');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js',array(), '0.1', false);
	wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/css/theme.min.css', array(), '0.1', 'all');
	wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/css/owl.carousel.css', array(), '0.1', 'all');
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.theme.min.css', array(), '0.1', 'all');
	wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/owl.carousel.js',array(), '0.1', false);
	}
add_action( 'wp_enqueue_scripts', 'ikhouvanshoppen_scripts' );


/*
// Set the number or products per row
if (!function_exists('shopstar_loop_shop_columns')) {

	function shopstar_loop_shop_columns() {
		if (
			( is_shop() && get_theme_mod( 'shopstar-layout-woocommerce-shop-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-shop-full-width' ) ) ) 
			|| ( ( is_product_category() || is_product_tag() ) && get_theme_mod( 'shopstar-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-category-tag-page-full-width' ) ) ) 
			|| ! is_active_sidebar( 'sidebar-1' ) 
		) {
			return 4;
		} else {
			return 3;
		}
	}
	
}
add_filter('loop_shop_columns', 'shopstar_loop_shop_columns');
*/

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	if ( get_theme_mod( 'shopstar-woocommerce-shop-display-thumbnail-loader-animation', customizer_library_get_default( 'shopstar-woocommerce-shop-display-thumbnail-loader-animation' ) ) ) {
		echo '<div class="hiddenUntilLoadedImageContainer loading">';
	}
}, 9 );

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	if ( get_theme_mod( 'shopstar-woocommerce-shop-display-thumbnail-loader-animation', customizer_library_get_default( 'shopstar-woocommerce-shop-display-thumbnail-loader-animation' ) ) ) {
		echo '</div>';
	}
}, 11 );

if (!function_exists('shopstar_woocommerce_product_thumbnails_columns')) {
	function shopstar_woocommerce_product_thumbnails_columns() {
		return 3;
	}
}
add_filter ( 'woocommerce_product_thumbnails_columns', 'shopstar_woocommerce_product_thumbnails_columns' );

/**
 * Replace Read more buttons for out of stock items
 */
// Display an Out of Stock label on out of stock products
add_action( 'woocommerce_after_shop_loop_item_title', 'shopstar_out_of_stock_notice', 10 );
function shopstar_out_of_stock_notice() {
    global $product;
    if ( !$product->is_in_stock() ) {
		echo '<p class="stock out-of-stock">';
		echo __( 'Out of Stock', 'shopstar' );
		echo '</p>';
    }
}

/*
if (!function_exists('woocommerce_template_loop_add_to_cart')) {
	function woocommerce_template_loop_add_to_cart( $args = array() ) {
		global $product;

		if (!$product->is_in_stock()) {
			echo '<p class="stock out-of-stock">';
			echo __( 'Out of Stock', 'shopstar' );
			echo '</p>';
		} else {
			$defaults = array(
				'quantity' => 1,
				'class' => implode( ' ', array_filter( array(
				'button',
				'product_type_' . $product->get_type(),
				$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
				$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
				) ) )
			);
			
			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
			wc_get_template( 'loop/add-to-cart.php', $args );
		}
	}
}
*/

function shopstar_excerpt_length( $length ) {
	return get_theme_mod( 'shopstar-blog-excerpt-length', customizer_library_get_default( 'shopstar-blog-excerpt-length' ) );
}
add_filter( 'excerpt_length', 'shopstar_excerpt_length', 999 );

function shopstar_excerpt_more( $more ) {
	return ' <a class="read-more" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . wp_kses_post( pll__( get_theme_mod( 'shopstar-blog-read-more-text', customizer_library_get_default( 'shopstar-blog-read-more-text' ) ) ), 'shopstar' ) . '</a>';
}
add_filter( 'excerpt_more', 'shopstar_excerpt_more' );

/**
 * Adjust is_home query if shopstar-slider-categories is set
 */
function shopstar_set_blog_queries( $query ) {

	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
    $slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
	
	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
	
		$is_front_page = ( $query->get('page_id') == get_option('page_on_front') || is_front_page() );
	
		if ( count($slider_categories) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			if ( !is_admin() && !$is_front_page  && $query->get('id') != 'slider' || !is_admin() && $is_front_page && $query->get('id') != 'slider' ){
				$query->set( 'category__not_in', $slider_categories );
			}
		}
	}

}
add_action( 'pre_get_posts', 'shopstar_set_blog_queries' );

function shopstar_filter_recent_posts_widget_parameters( $params ) {
	
	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
	$slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
	
	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
		if ( count($slider_categories) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			$params['category__not_in'] = $slider_categories;
		}
	}
	
	return $params;
}
add_filter('widget_posts_args','shopstar_filter_recent_posts_widget_parameters');

/**
 * Adjust the widget categories query if shopstar-slider-categories is set
*/
function shopstar_set_widget_categories_args($args){
	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
    $slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
	
	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
		if ( count($slider_categories) > 0) {
			$exclude = implode(',', $slider_categories);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter('widget_categories_args', 'shopstar_set_widget_categories_args');

function shopstar_set_widget_categories_dropdown_arg($args){
	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
	$slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );

	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
		if ( count($slider_categories) > 0) {
			$exclude = implode(',', $slider_categories);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter('widget_categories_dropdown_args', 'shopstar_set_widget_categories_dropdown_arg');

function shopstar_update_allowed_tags( $tags ) {
	$tags["h1"] = array();
	$tags["h2"] = array();
	$tags["h3"] = array();
	$tags["h4"] = array();
	$tags["h5"] = array();
	$tags["h6"] = array();
	$tags["p"] 	= array();
	$tags["br"] = array();
	
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'shopstar_update_allowed_tags' );

function shopstar_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => __( 'Super Simple Slider', 'shopstar' ),
			'slug'      => 'super-simple-slider',
			'required'  => false
		),
		array(
			'name'      => __( 'Elementor Page Builder', 'shopstar' ),
			'slug'      => 'elementor',
			'required'  => false
		),
		array(
			'name'      => __( 'SiteOrigin Widgets Bundle', 'shopstar' ),
			'slug'      => 'so-widgets-bundle',
			'required'  => false
		),
		array(
			'name'      => __( 'Beam me up Scotty', 'shopstar' ),
			'slug'      => 'beam-me-up-scotty',
			'required'  => false
		),
		array(
			'name'      => __( 'WPForms', 'shopstar' ),
			'slug'      => 'wpforms-lite',
			'required'  => false
		),
		array(
			'name'      => __( 'WooCommerce', 'shopstar' ),
			'slug'      => 'woocommerce',
			'required'  => false
		),
		array(
			'name'      => __( 'MailChimp for WordPress', 'shopstar' ),
			'slug'      => 'mailchimp-for-wp',
			'required'  => false
		),
		array(
			'name'      => __( 'Anti-Spam', 'shopstar' ),
			'slug'      => 'anti-spam',
			'required'  => false
		),
		array(
			'name'      => __( 'Yoast SEO', 'shopstar' ),
			'slug'      => 'wordpress-seo',
			'required'  => false
		),
		array(
			'name'      => __( 'Yoast SEO', 'shopstar' ),
			'slug'      => 'wordpress-seo',
			'required'  => false
		)
	);

	$config = array(
		'id'           => 'shopstar',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => ''                       // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'shopstar_register_required_plugins' );

/**
 * Determine if Custom Post Type
 * usage: if ( is_this_a_custom_post_type() )
 *
 * References/Modified from:
 * @link https://codex.wordpress.org/Function_Reference/get_post_types
 * @link http://wordpress.stackexchange.com/users/73/toscho <== love this person!
 * @link http://wordpress.stackexchange.com/a/95906/64742
 */
function shopstar_is_this_a_custom_post_type( $post = NULL ) {

    $all_custom_post_types = get_post_types( array ( '_builtin' => false ) );

    //* there are no custom post types
    if ( empty ( $all_custom_post_types ) ) return false;

    $custom_types      = array_keys( $all_custom_post_types );
    $current_post_type = get_post_type( $post );

    //* could not detect current type
    if ( ! $current_post_type )
        return false;

    return in_array( $current_post_type, $custom_types );
}

/**
 * Remove blog menu link class 'current_page_parent' when on an unrelated CPT
 * or search results page
 * or 404 page
 * dep: is_this_a_custom_post_type() function
 * modified from: https://gist.github.com/ajithrn/1f059b2201d66f647b69
 */
function shopstar_if_cpt_or_search_or_404_remove_current_page_parent_on_blog_page_link( $classes, $item, $args ) {
    if ( shopstar_is_this_a_custom_post_type() || is_search() || is_404() ) {
        $blog_page_id = intval( get_option('page_for_posts') );

        if ( $blog_page_id != 0 && $item->object_id == $blog_page_id ) {
			unset( $classes[array_search( 'current_page_parent', $classes )] );
        }

	}

    return $classes;
}
add_filter( 'nav_menu_css_class', 'shopstar_if_cpt_or_search_or_404_remove_current_page_parent_on_blog_page_link', 10, 3 );

if ( function_exists( 'pll_register_string' ) ) {
	/**
	* Register some string from the customizer to be translated with Polylang
	*/
	function shopstar_pll_register_string() {
		// Header
		pll_register_string( 'shopstar-header-info-text', get_theme_mod( 'shopstar-header-info-text', customizer_library_get_default( 'shopstar-header-info-text' ) ), 'shopstar', false );
		
		// Search
		pll_register_string( 'shopstar-search-placeholder-text', get_theme_mod( 'shopstar-search-placeholder-text', customizer_library_get_default( 'shopstar-search-placeholder-text' ) ), 'shopstar', false );
		pll_register_string( 'shopstar-website-text-no-search-results-heading', get_theme_mod( 'shopstar-website-text-no-search-results-heading', customizer_library_get_default( 'shopstar-website-text-no-search-results-heading' ) ), 'shopstar', false );
		pll_register_string( 'shopstar-website-text-no-search-results-text', get_theme_mod( 'shopstar-website-text-no-search-results-text', customizer_library_get_default( 'shopstar-website-text-no-search-results-text' ) ), 'shopstar', true );
		
		// Header media
		pll_register_string( 'shopstar-header-image-text', get_theme_mod( 'shopstar-header-image-text', customizer_library_get_default( 'shopstar-header-image-text' ) ), 'shopstar', true );
		
		// Blog read more
		pll_register_string( 'shopstar-blog-read-more-text', get_theme_mod( 'shopstar-blog-read-more-text', customizer_library_get_default( 'shopstar-blog-read-more-text' ) ), 'shopstar', true );
		
		// 404
		pll_register_string( 'shopstar-website-text-404-page-heading', get_theme_mod( 'shopstar-website-text-404-page-heading', customizer_library_get_default( 'shopstar-website-text-404-page-heading' ) ), 'shopstar', true );
		pll_register_string( 'shopstar-website-text-404-page-text', get_theme_mod( 'shopstar-website-text-404-page-text', customizer_library_get_default( 'shopstar-website-text-404-page-text' ) ), 'shopstar', true );
	}
	add_action( 'admin_init', 'shopstar_pll_register_string' );
}

/**
 * A fallback function that outputs a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return  void
 */
if ( !function_exists( 'pll_e' ) ) {
	function pll_e( $str ) {
		echo $str;
	}
}

/**
 * A fallback function that returns a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return string
 */
if ( !function_exists( 'pll__' ) ) {
	function pll__( $str ) {
		return $str;
	}
}

/**
 * Add placeholder in my-account fields
 *
 */
// add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
// function override_billing_checkout_fields( $fields ) {
//     $fields['billing']['billing_phone']['placeholder'] = 'Telefon';
//     $fields['billing']['billing_email']['placeholder'] = 'Email';
//     return $fields;
// }



if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_get_items_count' ) ) {
 function yith_wcwl_get_items_count() {
  ob_start();
  ?>
  <span class="yith-wcwl-items-count">
      <i class="yith-wcwl-icon fa">
    <?php echo esc_html( yith_wcwl_count_all_products() ); ?>
      </i>
  </span>
  <?php
  return ob_get_clean();
 }
 add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_get_items_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ) {
 function yith_wcwl_ajax_update_count() {
  wp_send_json( array(
      'count' => yith_wcwl_count_all_products()
  ) );
 }
 add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
 add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
 function yith_wcwl_enqueue_custom_script() {
  wp_add_inline_script(
      'jquery-yith-wcwl',
      "
        jQuery( function( $ ) {
          $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
            $.get( yith_wcwl_l10n.ajax_url, {
              action: 'yith_wcwl_update_wishlist_count'
            }, function( data ) {
              $('.yith-wcwl-items-count').html( data.count );
            } );
          } );
        } );
      "
  );
 }
 add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
}




add_filter( 'woocommerce_add_to_cart_fragments', 'misha_add_to_cart_fragment' );
 
function misha_add_to_cart_fragment( $fragments ) {
 
	global $woocommerce;
 
	$fragments['.misha-cart'] = '<span class="misha-cart"> ' . $woocommerce->cart->cart_contents_count . '</span>';
 	return $fragments;
 
 }
 
 
 
//  add_filter( 'wp_nav_menu_items', 'wti_loginout_menu_link', 10, 2 );

// function wti_loginout_menu_link( $items, $args ) {
//    if ($args->theme_location == 'primary') {
//       if (is_user_logged_in()) {
//          $items .= '<li class="right"><a href="'. wp_logout_url() .'">'. __("Log Out") .'</a></li>';
//       } else {
//          $items .= '<li class="right"><a href="'. wp_login_url(get_permalink()) .'">'. __("Log In") .'</a></li>';
//       }
//    }
//    return $items;
// }




// Display the product thumbnail in order received page
add_filter( 'woocommerce_order_item_name', 'order_received_item_thumbnail_image', 10, 3 );
function order_received_item_thumbnail_image( $item_name, $item, $is_visible ) {
    // Targeting order received page only
    if( ! is_wc_endpoint_url('order-received') ) return $item_name;

    // Get the WC_Product object (from order item)
    $product = $item->get_product();

    if( $product->get_image_id() > 0 ){
        $product_image = '<span style="float:left;display:block;width:56px;">' . $product->get_image(array(48, 48)) . '</span>';
        $item_name = $product_image . $item_name;
    }

    return $item_name;
}

function checkMobile(){
    $useragent=$_SERVER['HTTP_USER_AGENT'];

    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|iPad|iPod|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
        return true;
    }
    else{
        return false;
    }
    
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );




// / Create Buy Now Button dynamically after Add To Cart button /
function add_content_after_addtocart() {
// get the current post/product ID
$current_product_id = get_the_ID();

// get the product based on the ID
$product = wc_get_product( $current_product_id );

// get the "Checkout Page" URL
$checkout_url = wc_get_checkout_url();
// run only on simple products
if( $product->is_type( 'simple' ) ){
//echo '<a href="'.$checkout_url.'?add-to-cart='.$current_product_id.'" class="buy-now button">Buy Now</a>';
//echo '<a href="'.$checkout_url.'" class="buy-now button">Buy Now</a>';
}
}
add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart' );


//changing position of items like price, reviews in product single page

// add_action( 'woocommerce_single_product_summary', 'change_stars_rating_location', 4 );
// function change_stars_rating_location() {
//     global $product;

//     remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
//     add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
// }

//removing policies tab from product single page
add_filter( 'wcfm_is_allow_product_policies', '__return_false' );


// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Winkelwagen', 'woocommerce' ); 
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Winkelwagen', 'woocommerce' );
}


/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );

function woo_rename_tabs( $tabs ) {
    $tabs['description']['title'] = __( 'Beschrijving' );            // Rename the description tab
	$tabs['wcfm_location_tab']['title'] = __( 'Retourvoorwaarden' );         // Rename the location tab
    $tabs['wcfm_product_multivendor_tab']['title'] = __( 'Meer producten' );         // Rename the product tab

    return $tabs;
}

add_filter( 'gettext', 'bbloomer_translate_woocommerce_strings', 999, 3 );
  
function bbloomer_translate_woocommerce_strings( $translated, $untranslated, $domain ) {
 
   if ( ! is_admin() && 'woocommerce' === $domain ) {
 
      switch ( $untranslated ) {
 
         case 'Related products' :
 
            $translated = 'Door andere ikhouvanshoppers gekocht!';
            break;
 
         case 'Description' :
 
            $translated = 'Beschrijving';
            break;
			  
	   case 'Price' :
			$translated = 'Prijs';
	    break;

		case 'Quantity' :
			$translated = 'Aantal';
		break;

		case 'Subtotal' :
			$translated = 'Subtotaal';
	    break;

		case 'Total' :
			$translated = 'Totaal';
		break;

		case 'Proceed to checkout' :
			$translated = 'Afrekenen';
	    break;

		case 'Apply coupon' :
			$translated = 'Pas kortingscode toe';
		break;

		case 'Cart totals' :
			$translated = 'Samenvatting';
		break;

		case 'Coupon code' :
			$translated = 'Voer kortingscode hier in';
		break;

		case 'Undo?' :
			$translated = 'ongedaan maken?';
		break;
		  
		case 'Your order' :
			$translated = 'Jouw bestelling';
		break;
			 
		case 'Billing details' :
			$translated = 'Gegevens';
		break;
			  
		case 'First name' :
			$translated = 'Voornaam';
		break;

		case 'Last name' :
			$translated = 'Achternaam';
		break;

		case 'Company name' :
			$translated = 'Bedrijf';
		break;

		case 'Country / Region' :
			$translated = 'Land';
		break;

		case 'Postcode / ZIP' :
			$translated = 'Postcode';
		break;

		case 'Phone' :
			$translated = 'Telefoonnummer';
		break;

		case 'Email address' :
			$translated = 'E-mail adres';
		break;
			  
		case 'VAT number' :
			$translated = 'BTW nummer';
		break;
		
		case 'Remove Iteam' :
			$translated = 'Verwijder item';
		break;

		case 'Town / City' :
			$translated = 'Stad';
		break;		
		case 'Dashboard' :
			$translated = 'Mijn account';
		break;	
		case 'No user hasreviewed this store' :
			$translated = 'Er zijn nog geen reviews over deze winkel';
		break;
		case 'Articles' :
			$translated = 'Artikelen';
		break;
		case 'Retourprocedure' :
			$translated = 'Voorwaarden';
		break;
		
	
         // ETC
       
      }
 
   }   
  
   return $translated;
 
}
add_filter('gettext', 'translate_reply');
function translate_reply($translated) {
$translated = str_ireplace('Shipping', 'Verzendkosten', $translated);
return $translated;
}
add_filter('gettext', 'translate_reply2');
function translate_reply2($translated) {
$translated = str_ireplace('write a review', 'Schrijf een review', $translated);
return $translated;
}
add_filter('gettext', 'translate_reply3');
function translate_reply3($translated) {
$translated = str_ireplace('your review', 'Jouw review', $translated);
return $translated;
}
// add_filter('gettext', 'translate_reply4');
// function translate_reply4($translated) {
// $translated = str_ireplace('Add', 'Voeg', $translated);
// return $translated;
// }
add_filter('gettext', 'translate_reply5');
function translate_reply5($translated) {
// $translated = str_ireplace('My Store', 'Mijn Winkel', $translated);
$translated = str_ireplace("Articles", "Artikelen", $translated);
$translated = str_ireplace("Customers", "Klanten", $translated);
$translated = str_ireplace("Refund", "Terugbetaling", $translated);
$translated = str_ireplace("Last Login:", "Laatst ingelogd op:", $translated);
$translated = str_ireplace("Refund Policy:", "Retourprocedure", $translated);
// $translated = str_ireplace("Voorwaarden", "Retourprocedure", $translated);
$translated = str_ireplace("QUANTITY", "Aantal", $translated);
$translated = str_ireplace("Price", "PRIJS PER STUK", $translated);
$translated = str_ireplace("Vind locatie", "Vul in online/offline locatie", $translated);
return $translated;
}

//adding custom tab in product detail page
// function my_simple_custom_product_tab( $tabs ) {

//     $tabs['my_custom_tab'] = array(
//         'title'    => __( 'Levertijd', 'textdomain' ),
//         'callback' => 'my_custom_tab_content',
//     );

//     return $tabs;

// }
// add_filter( 'woocommerce_product_tabs', 'my_simple_custom_product_tab' );



/**
 * Reordering product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {



	$tabs['description']['priority'] = 95;	
	$tabs['additional_information']['priority'] = 100;	
		

	return $tabs;
}


remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
add_action( 'woocommerce_cart_is_empty', 'custom_empty_cart_message', 10 );

function custom_empty_cart_message() { ?>
   <div class="cartempty_msg">
       <p class="cart_resmsg"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oeps! Jouw winkelwagen is leeg.</font></font></p>
        <div class="empty_carfimg"><img src="https://ikhouvanshoppen.nl/wp-content/uploads/2021/06/cart_emtyimg.gif" class="img-responsive"></div>
        <p class="green_msg"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Voeg een product toe en Go Greener! </font></font></p>
    
      
		</p>-->
     </div>
<?php
}
function store_mall_wc_empty_cart_redirect_url() {
        $url = 'https://ikhouvanshoppen.nl/'; // change this link to your need
        return esc_url( $url );
}
add_filter( 'woocommerce_return_to_shop_redirect', 'store_mall_wc_empty_cart_redirect_url' );



// adding thank you test in ordered recieved page
add_filter( 'the_title', 'woo_title_order_received', 10, 2 );

function woo_title_order_received( $title, $id ) {
	if ( function_exists( 'is_order_received_page' ) && 
	     is_order_received_page() && get_the_ID() === $id ) {
		echo '<strong class="thankyou-custom-text">We hebben je bestelling ontvangen en gaan deze inpakken. :)</strong>';
	}
	return $title;

}



//removing notes from checkout page
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );


//disabling plugin notices
 function hide_update_msg_non_admins(){
     if (!current_user_can( 'manage_options' ) && current_user_can( 'manage_options' ) ) { // non-admin users
            echo '<style>#setting-error-tgmpa>.updated settings-error notice is-dismissible, .update-nag, .notice, .updated { display: none; }</style>';
        }
    }
    add_action( 'admin_head', 'hide_update_msg_non_admins');



// removing tab from product page
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['wcfm_location_tab'] );          // Remove the description tab
	unset($tabs['reviews']); 
    return $tabs;
}





// Add sidebar for shop loop header  


	function customText(){
		global $product;
		dynamic_sidebar('product-sidebar');
	  }
	  add_action( 'woocommerce_single_product_summary','customText',25);

	  
	//   function get_user_geo_country(){
	// 	$geo      = new WC_Geolocation(); // Get WC_Geolocation instance object
	// 	$user_ip  = $geo->get_ip_address(); // Get user IP
	// 	$user_geo = $geo->geolocate_ip( $user_ip ); // Get geolocated user data.
	// 	$country  = $user_geo['country']; // Get the country code
	// 	var_dump($country);
	// 	return WC()->countries->countries[ $country ]; // return the country name
	
	// }

	// add_action( 'woocommerce_single_product_summary','get_user_geo_country',30);


/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Product page sidebar',
		'id'            => 'product-sidebar',
		'before_widget' => '<div class="desc">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

// hide update notifications
// function remove_core_updates(){
// global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
// }
// add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
// add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
// add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes

// Wishlist page title editable remove
if( ! function_exists( 'yith_wcwl_disable_title_editing' ) ){
	function yith_wcwl_disable_title_editing( $params ) {
		$params['can_user_edit_title'] = false;

		return $params;
	}
	add_filter( 'yith_wcwl_wishlist_params', 'yith_wcwl_disable_title_editing' );
}

//dashboard plugin updates remove
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .update-message, .notice, .wp-menu-name span.update-plugins {
      display:none !important;
    } 
  </style>';
}





//shortcode for post slider

		add_shortcode( 'show_posts', 'post_query' );

	

			function post_query(){

    ob_start();
    
    $args = array(
       'post_type' => array('recent', 'post'),
       'posts_per_page' => 3,
    );

    $posts_args  = new WP_Query($args);
    
    ?> <div class="row"> <?php

    if($posts_args->have_posts()):
       while($posts_args->have_posts()):
          $posts_args->the_post();
          
          $date = get_the_date();


    	echo '<div class="owl-item active">';
		echo '<div class="Nh_productBg">';
		echo '<a href="'.the_permalink().'"><img src="'.the_permalink().'" class="img-responsive"/></a>';
		echo '<span class="#"></span>';
		echo '<a href="'.the_permalink().'"><h5>'.esc_html(get_the_title()).'<br></h5></a>';
		echo '</div>';
		echo '</div>';
		


endwhile;
endif;
wp_reset_postdata();
$result=ob_get_clean(); //capture the buffer into $result
return $result; //return it, instead of echoing

?> </div> <?php

}



// removinng tab from woocommerce backend in product edit
function hide_tab() {
    if(is_admin()){
    echo '<style type="text/css">
             li.wcfmmp-store-tab_options, li.wcfmmp-store-commission-tab_options{
				display: none !important;
			}

          </style>';
    }
}
add_action('admin_head', 'hide_tab');

/**
 * @snippet       Close Ship to Different Address @ Checkout Page
 * 
 * */
 
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );


/**
 * Intercepts a shipping rate added by WooCommerce, to perform the following operations:
 * - Recalculates the shipping cost before tax.
 * - Recalculate the tax.
 * The targe is to ensure that the final cost, inclusive of tax, remains the same no matter
 * what VAT rate applies to it.
 * 
 * @param array $rate
 * @param array $args
 * @param WC_Shipping_Method $shipping_method
 * @return array
 */
add_filter('woocommerce_shipping_method_add_rate', function($rate, $args, $shipping_method) {
  $original_taxes = array_sum($rate->get_taxes());
  // No need to perform a recalculation if either taxes or costs are zero (or negative, in
  // which case they are not valid)
  if(($original_taxes <= 0) || ($rate->get_cost() <= 0)) {
    return $rate;
  }
  $recalc_ratio = $rate->get_cost() / ($rate->get_cost() + $original_taxes);
  $rate->set_cost(round($rate->get_cost() * $recalc_ratio, 2));

  $taxes = ($args['calc_tax'] === 'per_item') ? $shipping_method->get_taxes_per_item($rate->get_cost()) : WC_Tax::calc_shipping_tax($rate->get_cost(), WC_Tax::get_shipping_tax_rates());
  $rate->set_taxes($taxes);
  return $rate;
}, 999, 3);

/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );


remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );





function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
 background-image: url(https://bestforyourbody.shop/wp-content/uploads/2022/06/BFYB_Faficon.png);
padding-bottom: 30px; 
} 
</style>
 <?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );