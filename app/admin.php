<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/**
 * ACF Options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Bountiful Markets General Settings',
		'menu_title'	=> 'Bountiful Settings',
		'menu_slug' 	=> 'bountiful-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Example Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'bountiful-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Example Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'bountiful-general-settings',
	));
	
}