<?php
/**
 * South African Covid-19 Banner
 *
 * @package           SouthAfricaCovid19Banner
 * @author            Seagyn Davis
 * @copyright         2019 Seagyn Davis
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       South African Covid-19 Banner
 * Plugin URI:        https://github.com/seagyn/south-africa-covid-19-banner/
 * Description:       This plugin makes it easy for South African WordPress sites to add the Covid-19 banner as required by the South African government.
 * Version:           0.1.0
 * Requires at least: 5.0
 * Requires PHP:      7.1
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Author:            Seagyn Davis
 * Author URI:        https://www.seagyndavis.com
 * Text Domain:       south-africa-covid-19-banner
 *
 * South African Covid-19 Banner is free software: you can redistribute
 * it and/or modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, either version 2 of the
 * License, or any later version.
 *
 * South African Covid-19 Banner is distributed in the hope that it will
 * be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See
 * the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with South African Covid-19 Banner. If not, see
 * https://www.gnu.org/licenses/gpl-2.0.html.
 */

namespace SeagynDavis\SouthAfricaCovid19Banner;

require_once 'src/boot.php';

/**
 * Initialise the plugin.
 */
function init() {

	define( 'SOUTH_AFRICA_COVID_19_BANNER_VERSION', '0.1.0' );
	define( 'SOUTH_AFRICA_COVID_19_BANNER_DIR', plugin_dir_path( __FILE__ ) );
	define( 'SOUTH_AFRICA_COVID_19_BANNER_URL', plugin_dir_url( __FILE__ ) );

	boot();
}
add_action( 'plugins_loaded', 'SeagynDavis\SouthAfricaCovid19Banner\init' );
