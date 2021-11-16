<?php
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
	));
	
}

function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyCujOyGnJ51jbeqAjKcABVDhE_n1WVzuWA';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');