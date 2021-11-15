<?php 
// FEATURED PRODUCT
function featured_product() {
	ob_start();
		get_template_part('templates/featured-product');
	return ob_get_clean();
}
add_shortcode( 'featured_product', 'featured_product' );