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
