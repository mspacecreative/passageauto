<div class="featured-product-container top-bottom-padding">
	<div class="max-width-1440 top-bottom-padding">
		<div class="display-flex gutter-space-2 align-middle">
			<?php promo_item('featured-product'); ?>
			<?php promo_item('flyer'); ?>
		</div>
	</div>
	<div id="flyer-container" class="max-width: 1440px flyer-container">
		<?php 
		$flyerpdf = get_field('flyer_pdf', 216);
		echo do_shortcode('[pdf-embedder url="' . $flyerpdf['url'] . '"]'); ?>
	</div>
</div>
	