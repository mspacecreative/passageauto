<div class="featured-product-container top-bottom-padding">
	<div class="max-width-1440 top-bottom-padding">
		<div class="display-flex gutter-space-2">
			<div class="col display-flex">
				<div class="inner display-flex">
					<?php promo_item('featured-product'); ?>
				</div>
			</div>
			<div class="col display-flex">
				<div class="inner display-flex">
					<?php promo_item('flyer'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="flyer-container">
		<?php 
		$flyerpdf = get_field('flyer_pdf', get_the_ID());
		echo do_shortcode('[pdf-embedder url="' . $flyerpdf['url'] . '"]'); ?>
	</div>
</div>
	