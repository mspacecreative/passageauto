<?php 
$args = array(
	'post_type' => 'product',
	'posts_per_page' => 1,
);

$loop = new WP_Query($args);

if ( $loop->have_posts() ) {
	echo "
	<div class'featured-product-container display-flex'>";
	while ( $loop->have_posts() ) {
		$loop->the_post();
		$content = get_the_content(get_the_ID());
		$imgfield = get_field('product_image', get_the_ID());
		$img = '<img src=' . esc_url($imgfield['url']) . '" alt="' . esc_attr($imgfield['alt']) . '">';
		if ( !empty($content) {
		echo "
		<div class'featured-product-content'>
			$content
		</div>";
		}
		if ( !empty($imgfield) {
		echo"
		<div class'featured-product-image'>
			$img
		</div>
		";
		}
	}
	echo "
	</div>";
} wp_reset_query();