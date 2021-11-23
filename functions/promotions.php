<?php 
function promo_item($promotype = '') {
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 1,
		'tax_query' => array(
			array(
				'taxonomy' => 'promotion_type',
				'field' => 'slug',
				'terms' => $promotype
			)
		)
	);
	
	$loop = new WP_Query($args);
	
	if ( $loop->have_posts() ) {
		while ( $loop->have_posts() ) {
				$loop->the_post();
				$title = get_the_title(get_the_ID());
				$price = get_field('price', get_the_ID());
				$showtitle = get_field('hide_product_post_title', get_the_ID());
				$bgcolor = get_field('background_colour', get_the_ID());
				$leadintitle = get_field('leadin_title', get_the_ID());
				$content = get_the_content(get_the_ID());
				$imgfield = get_field('product_image', get_the_ID());
				$size = 'featured-product';
				$featuredproduct = $imgfield['sizes'][ $size ];
			    $width = $imgfield['sizes'][ $size . '-width' ];
			    $height = $imgfield['sizes'][ $size . '-height' ];
			    $alt = $imgfield['alt'];
			    $altresult = ($alt) ? esc_attr($alt) : __('Passage Auto Parts');
				$img = '<img src="' . esc_url($featuredproduct) . '" alt="' . $altresult . '">';
				$dollarsign = '&#36;';
				$downloadflyer = 'Download flyer';
				$flyerpdf = get_field('flyer_pdf', get_the_ID());
				
				switch ($bgcolor) {
					case 'red':
						$bgcolor = ' red-bg';
						break;
					case 'black':
						$bgcolor = ' black-bg';
						break;
					case 'grey':
						$bgcolor = ' grey-bg';
						break;
					default:
						$bgcolor = '';
				}
				
				if ( $leadintitle ) {
				echo
				'<div class="flex-full text-align-center">
					<h1>' . $leadintitle . '</h1>
				</div>';
				} else {
				echo
				'<div class="flex-full text-align-center">
					<h1>' .  __('Featured Product') . '</h1>
				</div>';
				}
				if ( $title && !$showtitle ) {
					echo
					'<h2 style="font-weight: bold; color: #ff2323; padding-bottom: 0;">' .  $title . '</h2>';
				}
				if ( $price ) {
					echo
					'<div class="flex-full-reg">
						<h3 style="margin: 1em 0; font-weight: bold; padding-bottom: 0;">' .  __($dollarsign), $price . '</h3>
					</div>';
				}
				if ( $content ) {
				echo
				'<div class="featured-product-content">';
					echo $content;
					if ($flyerpdf) {
						echo 
						'<p><a class="et_pb_button" href="' . $flyerpdf['url'] . '" target="_blank" style="display: inline-block; margin-top: 1em;">' . __($downloadflyer) . '</a></p>';
					}
				echo
				'</div>';
				}
				if ( !empty($imgfield) ) {
				echo
				'<div class="featured-product-image'; if ($flyerpdf): echo ' view-pdf-container'; endif; echo '">;
					' . $img . '
				</div>';
				}
			}
	} wp_reset_query();
} ?>