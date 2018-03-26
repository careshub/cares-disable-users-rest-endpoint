<?php
/**
 * @package CARES_Content_Toggle
 * @wordpress-plugin
 * Plugin Name:       CARES Disable Users REST Endpoint
 * Version:           1.0.0
 * Description:       A tiny plugin that disables the /wp/v2/users WP REST endpoint.
 * Author:            dcavins
 * Text Domain:       cares-disable-users-rest-endpoint
 * Domain Path:       /languages
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/careshub/cares-disable-users-rest-endpoint
 * @copyright 2018 CARES, University of Missouri
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// From https://github.com/WP-API/WP-API/issues/2338#issuecomment-193887183
add_filter( 'rest_endpoints', function( $endpoints ){
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    return $endpoints;
});
