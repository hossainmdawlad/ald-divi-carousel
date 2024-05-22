<?php
/*
Plugin Name: Ald Divi Carousel
Plugin URI:  https://www.inspiredmelissa.com/
Description: Adds a carousel module in divi builder
Version:     1.0.0
Author:      Hossain Md Awlad
Author URI:  https://www.technoviable.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: aldc-ald-divi-carousel
Domain Path: /languages

Ald Divi Carousel is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Ald Divi Carousel is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Ald Divi Carousel. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

define( "ALDC_MAIN_DIR", __DIR__ );

if ( ! function_exists( 'aldc_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function aldc_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/AldDiviCarousel.php';
}
add_action( 'divi_extensions_init', 'aldc_initialize_extension' );
endif;

function aldc_scripts() {
    wp_enqueue_style('splide-style', trailingslashit(plugin_dir_url(__FILE__)) .  'styles/splide.min.css');
    wp_enqueue_script('splide-script', trailingslashit(plugin_dir_url(__FILE__)) . 'scripts/splide.min.js' , array('jquery'), '1.0.0', true );

    wp_enqueue_style('aldc-styles-min', trailingslashit(plugin_dir_url(__FILE__)) .  'styles/style.min.css');
    // wp_enqueue_style('aldc-styles', trailingslashit(plugin_dir_url(__FILE__)) .  'styles/main.css');
    wp_enqueue_script('frontend-bundle-script', trailingslashit(plugin_dir_url(__FILE__)) . 'scripts/frontend-bundle.min.js' ,['splide-script'], '1.0.0', true );
    // $hot_bundle_url = "{$this->plugin_dir_url}/scripts/frontend-bundle.min.js";
    // wp_enqueue_script( "{$this->name}-frontend-bundle", $hot_bundle_url, $this->_bundle_dependencies['frontend'], $this->version, true );

    if ( et_core_is_fb_enabled()) {
        wp_enqueue_style('backend-style', trailingslashit(plugin_dir_url(__FILE__)) .  'styles/backend-style.min.css');
        wp_enqueue_script('builder-bundle-script', trailingslashit(plugin_dir_url(__FILE__)) . 'scripts/builder-bundle.min.js' ,['splide-script'], '1.0.0', true );
    }
    

    wp_enqueue_script('aldc-script', trailingslashit(plugin_dir_url(__FILE__)) . 'scripts/frontend.js' , array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'aldc_scripts' );