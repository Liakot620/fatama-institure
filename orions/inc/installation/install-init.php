<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once( get_template_directory() . '/inc/installation/class-tgm-plugin-activation.php' );

$plugins = array(
    array(
        'name'         => esc_html__('Orions core', 'orions'),
        'slug'         => 'orions-core',
        'required'     => true,
        'source'       => esc_url( 'https://itnursery.com/product-plugins/orions-core.zip' ),
        'version'      => '1.0.2',
    ),  
    array(
        'name'         => esc_html__('Elementor', 'orions'),
        'slug'         => 'elementor',
        'required'     => true,
    ),
    array(
        'name'         => esc_html__('Contact Form 7', 'orions'),
        'slug'         => 'contact-form-7',
    ),
    array(
        'name'         => esc_html__('One Click Demo Import', 'orions'),
        'slug'         => 'one-click-demo-import',
    ),
    array(
        'name'         => esc_html__('Advanced Custom Fields', "orions"),
        'slug'         => 'advanced-custom-fields',
        'required'     => true
    ),
    array(
        'name'         => esc_html__('Custom Fonts', "orions"),
        'slug'         => 'custom-fonts',
        'required'     => true
    ),    
);

/****************************************
TGM
****************************************/
function orions_register_required_plugins() {
    global $plugins;
	$config = array(
		'id' => 'tgmpa',
		'default_path' => '',
		'menu' => 'tgmpa-install-plugins',
		'has_notices' => true,
		'dismissable' => true,
		'dismiss_msg' => '',
		'is_automatic' => false,
		'message' => '',
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'orions_register_required_plugins' );


/****************************************
One click demo import
****************************************/
function orions_ocdi_import_files() {
    $redundant_data = array(
        'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/installation/demo-data/data.wiedata.wie',
    );

	return array(
		array_merge(
            array(
                'import_preview_image_url'   => get_template_directory_uri() . '/inc/installation/demo-data/demo-1/preview.jpg',
                'preview_url'                => 'https://demo-orions.itnursery.com/',
                'import_file_name'             => 'Demo 1',
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/installation/demo-data/demo-1/data.xml',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/installation/demo-data/demo-1/data-customizer.dat',
                'local_import_redux'           => array(
                    array(
                        'file_path'   => 
                        trailingslashit( get_template_directory() ) . 'inc/installation/demo-data/demo-1/redux.json',
                        'option_name' => 'orions_opt',
                    ),
                ),
            ),
            $redundant_data
        ),
        array_merge(
            array(
                'import_preview_image_url'   => get_template_directory_uri() . '/inc/installation/demo-data/demo-2/preview.jpg',
                'preview_url'                => 'https://demo2-orions.itnursery.com/',
                'import_file_name'             => 'Demo 2',
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/installation/demo-data/demo-2/data.xml',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/installation/demo-data/demo-2/data-customizer.dat',
                'local_import_redux'           => array(
                    array(
                        'file_path'   => 
                        trailingslashit( get_template_directory() ) . 'inc/installation/demo-data/demo-2/redux.json',
                        'option_name' => 'orions_opt',
                    ),
                ),
            ),
            $redundant_data
        ),
        array_merge(
            array(
                'import_preview_image_url'   => get_template_directory_uri() . '/inc/installation/demo-data/demo-3/preview.jpg',
                'preview_url'                => 'https://demo3-orions.itnursery.com/',
                'import_file_name'             => 'Demo 3',
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/installation/demo-data/demo-3/data.xml',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/installation/demo-data/demo-3/data-customizer.dat',
                'local_import_redux'           => array(
                    array(
                        'file_path'   => 
                        trailingslashit( get_template_directory() ) . 'inc/installation/demo-data/demo-3/redux.json',
                        'option_name' => 'orions_opt',
                    ),
                ),
            ),
            $redundant_data
        )
	);
}
add_filter( 'pt-ocdi/import_files', 'orions_ocdi_import_files' );

function orions_ocdi_after_import_setup() {
	// Assign menus to their locations.
    $top_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
            'default-menu' => $top_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'orions_ocdi_after_import_setup' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function ocdi_register_plugins( $arg_plugins ) {
    global $plugins;
    return $plugins;
}
add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );