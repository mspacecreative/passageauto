<?php 
$args = array(
	'post_type' => 'product',
	'posts_per_page' => 1,
);

$loop = new WP_Query($args);

if ( $loop->have_posts() ) {
	echo
	'<div class="featured-product-container display-flex align-items-center max-width-1080 top-bottom-padding">';
	while ( $loop->have_posts() ) {
		$loop->the_post();
		$title = get_the_title(get_the_ID());
		$showtitle = get_field('hide_product_post_title', get_the_ID());
		$leadintitle = get_field('leadin_title', get_the_ID());
		$content = get_the_content(get_the_ID());
		$imgfield = get_field('product_image', get_the_ID());
		$size = 'featured-product';
		$featuredproduct = $imgfield['sizes'][ $size ];
	    $width = $imgfield['sizes'][ $size . '-width' ];
	    $height = $imgfield['sizes'][ $size . '-height' ];
		$img = '<img src="' . esc_url($featuredproduct) . '" alt="' . esc_attr($alt) . '">';
		
		if ( $leadintitle ) {
		echo
		'<div class="flex-full">
			<h1>' . $leadintitle . '</h1>
		</div>';
		} else {
		echo
		'<div class="flex-full">
			<h1>' .  __('Featured Product') . '</h1>
		</div>';
		}
		if ( $content ) {
		echo
		'<div class="featured-product-content">';
			if ( $title && !$showtitle ) {
			echo
			'<h2>' .  $title . '</h2>';
			}
			echo . $content .
		'</div>';
		}
		if ( !empty($imgfield) ) {
		echo
		'<div class="featured-product-image">
			' . $img . '
		</div>';
		}
	}
	echo
	'</div>';
} wp_reset_query();