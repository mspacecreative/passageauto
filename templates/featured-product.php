<div class="featured-product-container top-bottom-padding">
	<div class="max-width-1440 top-bottom-padding">
		<div class="display-flex gutter-space-2 align-middle">
			<?php 
			if (function_exists(promo_item('featured-product') || promo_item('flyer'))):
				promo_item('featured-product');
				promo_item('flyer');
			else : ?>
				<h3 style="text-align: center;"><?php echo esc_html_e('Sorry, there are currently no promotions or featured products.'); ?><br /><?php echo esc_html_e('Please check back soon!'); ?></h3>
			<?php endif; ?>
		</div>
	</div>
</div>
	