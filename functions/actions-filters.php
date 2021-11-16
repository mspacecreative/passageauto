<?php 
add_action('et_header_top', 'custom_navigation');
function custom_navigation() {
	$nav = '<a class="et_pb_button header_button" href="#">New Button</a>';
	return $nav;
}