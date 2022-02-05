<div class="featured-product-container top-bottom-padding">
	<div class="max-width-1440 top-bottom-padding">
		<div class="display-flex gutter-space-2 align-middle">
			<?php 
			$result = get_posts(array(
				'post_type' => 'product', // post Type any even you can use custom post type
				'tax_query' => array(
					array(
					'taxonomy' => 'promotion_type', // Taxonomy name like genres
					'field' => 'slug',
					'terms' => array('featured-product')) // Taxonomy term 
					)
				)
			);
			if(!empty($result)) : ?>
			<div class="col display-flex">
				<div class="inner">
					<?php promo_item('featured-product'); ?>
				</div>
			</div>
			<?php endif;
			$result = get_posts(array(
				'post_type' => 'product', // post Type any even you can use custom post type
				'tax_query' => array(
					array(
					'taxonomy' => 'promotion_type', // Taxonomy name like genres
					'field' => 'slug',
					'terms' => array('flyer')) // Taxonomy term 
					)
				)
			);
			if(!empty($result)) : ?>
			<div class="col display-flex">
				<div class="inner">
					<?php promo_item('flyer'); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div id="flyer-container" class="max-width: 1440px flyer-container">
		<?php 
		$flyerpdf = get_field('flyer_pdf', 216);
		echo do_shortcode('[pdf-embedder url="' . $flyerpdf['url'] . '"]'); ?>
	</div>
</div>
	