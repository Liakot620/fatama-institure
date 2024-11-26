<?php
/**
 * Orions functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package orions
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function orions_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on orions, use a find and replace
		* to change 'orions' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'orions', get_template_directory() . '/inc/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'default-menu' => esc_html__( 'Default Menu', 'orions' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_image_size( 'orions-post-thumbnail-size', 370, 296, true );
	add_image_size( 'orions-recent-post-thumbnail-size', 70, 70, true );
	add_image_size( 'orions-post-detail-thumbnail-size', 1195, 750, true );
	add_image_size( 'orions-project-thumbnail-size', 561, 456, true );
	add_image_size( 'orions-slider-1', 970, 478, true );

	remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'orions_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function orions_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'orions_content_width', 640 );
}
add_action( 'after_setup_theme', 'orions_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function orions_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'orions' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Widgets added here will be displayed on the blogs page.', 'orions' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Search Sidebar', 'orions' ),
			'id'            => 'search_sidebar',
			'description'   => esc_html__( 'Widgets added here will be displayed on the search page.', 'orions' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Archives Sidebar', 'orions' ),
			'id'            => 'archive_sidebar',
			'description'   => esc_html__( 'Widgets added here will be displayed on the archives page.', 'orions' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'orions_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function orions_scripts() {
	wp_enqueue_style( 'orions-fonts', orions_fonts_url(), array(), '6.2', 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css', array(), '5.0.1' );
	wp_enqueue_style( 'glightboxc', get_template_directory_uri() . '/inc/assets/css/glightbox.min.css', array(), '6.1.1' );
	wp_enqueue_style( 'all', get_template_directory_uri() . '/inc/assets/css/all.min.css', array(), '5.15.1' );
	wp_enqueue_style( 'line-awesome', get_template_directory_uri() . '/inc/assets/css/line-awesome.min.css', array(), '6.2.1' );
	wp_enqueue_style( 'overlay-scrollbars', get_template_directory_uri() . '/inc/assets/css/overlay-scrollbars.min.css', array(), '1.13.0' );
	wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/inc/assets/css/swiper-bundle.min.css', array(), '6.7.0' );
	if ( ! class_exists( 'Redux' ) ) {
		$orions_opt = [];
		$orions_opt['demo_design_select'] = 'pbp_color';	
	} else {
		global $orions_opt;
	}
	
	$css_change = $orions_opt['demo_design_select'];
	$gbp_color  = 'gbp_color';
	$rpo_color  = 'rpo_color';
	if ( $orions_opt['demo_design_select'] === 'gbp_color' ) {
		wp_enqueue_style( 'orions', get_template_directory_uri() . '/inc/assets/css/style2.css', array(), '6.7.0' );
	} elseif ( $css_change === 'rpo_color' ) {
		wp_enqueue_style( 'orions', get_template_directory_uri() . '/inc/assets/css/style3.css', array(), '6.7.0' );
	} else {
		wp_enqueue_style( 'orions', get_template_directory_uri() . '/inc/assets/css/style.css', array(), '6.7.0' );
	}
	wp_enqueue_style( 'orions-style', get_stylesheet_uri(), array( 'bootstrap' ), _S_VERSION );
	wp_enqueue_script( 'glightbox', get_template_directory_uri() . '/inc/assets/js/glightbox.min.js', array(), '3.2.0', true );
	wp_enqueue_script( 'bgsap', get_template_directory_uri() . '/inc/assets/js/gsap.min.js', array(), '3.9.1', false );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/inc/assets/js/bootstrap.bundle.min.js', array(), '5.0.1', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/inc/assets/js/swiper-bundle.min.js', array(), '8.0.3', false );
	wp_enqueue_script( 'overlay-scrollbars', get_template_directory_uri() . '/inc/assets/js/overlay-scrollbars.min.js', array(), '1.13.0', false );
	wp_enqueue_script( 'orions-main', get_template_directory_uri() . '/inc/assets/js/main.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'orions_scripts' );

if ( ! function_exists( 'orions_fonts_url' ) ) {
	/**
	 * Get the url for the theme font
	 *
	 * @return string
	 */
	function orions_fonts_url() {
		$fonts_url = '';
		$font      = '';
		$subsets   = 'latin,latin-ext';
		/* translators: If there are characters in your language that are not supported by Spartan, translate this to 'off'. Do not translate into your own language. */
		$font = 'Spartan:wght@500;600;700&display=swap';
		if ( $font ) {
			$fonts_url = add_query_arg(
				array(
					'family' => $font,
					'subset' => $subsets,
				),
				'//fonts.googleapis.com/css2'
			);
		}
		return esc_url_raw( $fonts_url );
	}
}

if (!function_exists('orions_kses_allowed_html')) {	
	/**
	 * get the allowed tags for a certain context
	 *
	 * @param  mixed $tags
	 * @param  mixed $context
	 * @return mixed
	 */
	function orions_kses_allowed_html($tags, $context) {
	  switch($context) {
		case 'general': 
		  $tags = wp_kses_allowed_html('post');
		  return $tags;
		case 'elementor-general': 
			$tags = wp_kses_allowed_html('post');
			unset( $tags['p'] );
			$tags = array_merge( $tags, [
				'input' => [
					'type'	=> [],
					'name'	=> [],
					'value'	=> [],
					'checked'	=> [],
				]
			] );
			return $tags;
		case 'elementor-template': 
				$tags = wp_kses_allowed_html('post');
				$tags = array_merge( $tags, [
					'style' => [],
					'form' => [
						'name' => true,
						'class' => true,
						'id' => true,
						'rel' => true,
						'action' => true,
						'enctype' => true,
						'method' => true,
						'novalidate' => true,
						'target' => true
					],
					'button' => [
						'autofocus' => true,
						'autocomplete' => true,
						'disabled' => true,
						'form' => true,
						'formaction' => true,
						'formenctype' => true,
						'formmethod' => true,
						'formnovalidate' => true,
						'formtarget' => true,
						'name' => true,
						'type' => true,
						'value' => true,
						'class' => true,
						'id' => true
					],
					'input' => [
						'class' => true,
						'id' => true,
						'name' => true,
						'value' => true,
						'type' => true,
						'placeholder' => true,
						'required' => true,
						'width' => true,
						'title' => true,
						'tabindex' => true,
						'step' => true,
						'src' => true,
						'size' => true,
						'readonly' => true,
						'pattern' => true,
						'multiple' => true,
						'minlength' => true,
						'maxlength' => true,
						'min' => true,
						'max' => true,
						'list' => true,
						'inputmod' => true,
						'height' => true,
						'formtarget' => true,
						'formnovalidate' => true,
						'formmethod' => true,
						'formenctype' => true,
						'formaction' => true,
						'form' => true,
						'disabled' => true,
						'dirname' => true,
						'checked' => true,
						'capture' => true,
						'autofocus' => true,
						'autocomplete' => true,
						'alt' => true,
						'accept' => true
					],
					'textarea' => [
						'class' => true,
						'id' => true,
						'name' => true,
						'placeholder' => true,
						'required' => true,
						'autocomplete' => true,
						'autocorrect' => true,
						'autofocus' => true,
						'cols' => true,
						'disabled' => true,
						'form' => true,
						'maxlength' => true,
						'minlength' => true						
					],
					'label' => [
						'for' => true
					],
					'svg'   => [
						'class' => true,
						'aria-hidden' => true,
						'aria-labelledby' => true,
						'role' => true,
						'xmlns' => true,
						'width' => true,
						'height' => true,
						'viewbox' => true,
					],
					'g'     => [ 'fill' => true ],
					'title' => [ 'title' => true ],
					'path'  => [ 'd' => true, 'fill' => true,  ],

				] );
				return $tags;
		case 'wysiwyg-heading-removal':
			$tags = wp_kses_allowed_html('post');
			unset( $tags['h1'] );
			unset( $tags['h2'] );
			unset( $tags['h3'] );
			unset( $tags['h4'] );
			unset( $tags['h5'] );
			unset( $tags['h6'] );
			return $tags;
		case 'br-allowed':
		  $tags = array(
			'br' => array()
		  );
		  return $tags;
		case 'anchor-allowed':
		  $tags = array(
			'a' => array(
			  'href' => array(),
			  'class' => array(),
			  'id' => array()
			)
		  );
		  return $tags;
		default: 
		  return $tags;
	  }
	}
}
add_filter( 'wp_kses_allowed_html', 'orions_kses_allowed_html', 10, 2);
/**
* Add Class in nav parameter $classes, $item, $args, $depth
*/
function orions_channel_nav_class( $classes, $item, $args, $depth ) {

	$is_swiper_container = in_array( 'swiper-container', explode( ' ', $args->container_class ) );

	if ( ! $is_swiper_container ) {
		return $classes;
	}
	$depth_size = 0;
	if ( $depth === $depth_size ) {
		$classes[] = 'swiper-slide';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'orions_channel_nav_class', 10, 4 );


/**
* Add class to anchors in WordPress Menus 
*/
function orions_add_link_atts($atts) {
	if ( is_home() || is_front_page() ) {
		$atts['class'] = "link-underline link-underline-1";
	} else {
		$atts['class'] = "link-underline";
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'orions_add_link_atts');

// Add Div Tag Before sub Meu
function prefix_add_button_after_menu_item_children( $item_output, $item, $depth, $args ) {

    if ( $args->theme_location == 'default-menu' ) {

        if ( in_array( 'menu-item-has-children', $item->classes ) || in_array( 'page_item_has_children', $item->classes ) ) {
            $item_output = str_replace( $args->link_after . '</a>', $args->link_after . '</a><div class="child">', $item_output );
        }
    }

    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_add_button_after_menu_item_children', 10, 4 );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/misc/template-functions.php';

/**
 * Comments utilities
 */
require get_template_directory() . '/inc/misc/comments-util.php';

/**
 * Elementor widgets.
 */
require get_template_directory() . '/inc/elementor-widgets/elementor-init.php';

/**
 * Installation
 */
require get_template_directory() . '/inc/installation/install-init.php';

/**
 * Project Ajax
 */
require get_template_directory() . '/inc/misc/project-ajax.php';

/**
 * ACF select population
 */
require get_template_directory() . '/inc/misc/acf.php';


/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_editor_style();

/**
 * Register our custom block style
 *
 * @return void
 */
function onions_register_block_style() {

	register_block_style(
		'core/list',
		array(
			'name'  => 'check', // .is-style-check
			'label' => 'Check',
		)
	);
}
add_action( 'init', 'onions_register_block_style' );

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'onions',
		array( 'label' => esc_html__( 'Onions', 'orions' ) )
	);
}