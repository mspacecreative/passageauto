<?php
// BRANDS GRID
function brands_grid($post_type = '') {
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
	);
	
	$loop = new WP_Query($args);
	if ( $loop->have_posts() ) {
	echo 
	'<div class="logo-grid brands display-flex align-items-center justify-content-space-between">';
	
		while ( $loop->have_posts() ) {
		$loop->the_post();
		// VARIABLES
		$logo = get_the_post_thumbnail_url($loop->ID, 'medium');
		$alt = get_post_meta($loop->ID, '_wp_attachment_image_alt', TRUE);
		$alt = ($alt) ? $alt : get_the_title($loop->ID);
		$sizing = get_field('square_logo', $loop->ID);
		$sizing = ($sizing) ? ' square-logo' : '';
		echo 
		'<div class="et_pb_column_1_4 et_pb_column">
			<span class="et_pb_image_wrap' . $sizing . '">
				<img src="' . $logo . '" alt="' . $alt . '">
			</span>
		
		</div>';
		}
	echo 
	'</div>';
	} wp_reset_query();
}