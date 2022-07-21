<?php 
function promo_item($promotype) {
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
			$product_image = get_field('product_image', get_the_ID());
			$promo_flyer_cover = get_field('promo_flyer_cover', get_the_ID());
			$product_image_size = 'featured-product';
			$flyer_size = 'promo-flyer';
			$featuredproduct = $product_image['sizes'][ $product_image_size ];
			$promoflyer = $promo_flyer_cover['sizes'][$flyer_size];
			$productwidth = $product_image['sizes'][ $product_image_size . '-width' ];
			$productheight = $product_image['sizes'][ $product_image_size . '-height' ];
			$flyerwidth = $promo_flyer_cover['sizes'][ $flyer_size . '-width' ];
			$flyerheight = $promo_flyer_cover['sizes'][ $flyer_size . '-height' ];
			$product_alt = $product_image['alt'];
			$flyer_alt = $promo_flyer_cover['alt'];
			$product_alt = ($product_alt) ? esc_attr($product_alt) : __('Passage Auto Parts');
			$flyer_alt = ($flyer_alt) ? esc_attr($flyer_alt) : __('Passage Auto Parts');
			$product_img = '<img src="' . esc_url($featuredproduct) . '" alt="' . $product_alt . '">';
			$flyer_img = '<img src="' . esc_url($promoflyer) . '" alt="' . $flyer_alt . '">';
			$dollarsign = '&#36;';
			$downloadflyer = 'View flyer';
			$flyerpdf = get_field('flyer_pdf', get_the_ID());
			$flyerlink = get_field('flyer_link_url', get_the_ID());
				
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

			echo
			'<div class="col display-flex">
				<div class="inner">';
				
					if ( $leadintitle ) {
					echo
					'<div class="flex-full text-align-center">
						<h1>' . $leadintitle . '</h1>
					</div>';
					} elseif ($promotype == 'flyer') {
					echo
					'<div class="flex-full text-align-center">
						<h1>' .  __('Promo Flyer') . '</h1>
					</div>';
					} elseif ($promotype == 'featured-product') {
					echo
					'<div class="flex-full text-align-center">
						<h1>' .  __('Featured Product') . '</h1>
					</div>';
					} else {
					echo
					'<div class="flex-full text-align-center">
						<h1>' .  __('Featured Product') . '</h1>
					</div>';
					}
					if ( $title && !$showtitle ) {
					echo
					'<h2 style="font-weight: bold; color: #ff2323; padding-bottom: 0; margin-bottom: 1em;">' .  $title . '</h2>';
					}
					if ( $price ) {
					echo
					'<div class="flex-full-reg">
						<h3 style="margin: 0 0 1em; font-weight: bold; padding-bottom: 0;">' .  __($dollarsign), $price . '</h3>
					</div>';
					}
					if ($content) {
						echo $content; 
					}
					if ( $flyerpdf || $flyerlink ) {
					echo
					'<div class="display-flex justify-content-space-between">
						<div class="featured-product-content">';
							echo 
							'<p><a class="et_pb_button" href="'; if ($flyerpdf): echo $flyerpdf['url']; elseif ($flyerlink): echo $flyerlink; endif; echo '" target="_blank" style="display: inline-block; margin-top: 1em;">' . __($downloadflyer) . '</a></p>';
						echo
						'</div>';
						if ( !empty($product_image) || !empty($promo_flyer_cover) ) {
						echo
						'<div class="featured-product-image'; if ($flyerpdf || $flyerlink): echo ' box-shadow'; endif; echo '">';
							if ($flyerpdf || $flyerlink): 
							echo 
							'<a href="'; if ($flyerpdf): echo $flyerpdf['url']; elseif ($flyerlink): echo $flyerlink; endif; echo '" class="view-pdf-container" target="_blank">'; 
							endif;
											
							if ($flyerpdf || $flyerlink): echo $flyer_img;
							else : echo $product_img; 
							endif;

							if ($flyerpdf || $flyerlink): echo 
							'</a>'; 
							endif;
						echo 
						'</div>';
						}
					echo
					'</div>';
					}
				echo
				'</div>
			</div>';
		}
	} wp_reset_query();
} ?>