<?php
$args = array(
	'post_type' => 'team',
	'posts_per_page' => -1,
);

$loop = new WP_Query($args);

if ( $loop->have_posts() ): ?>
<div class="bio-container">
	<?php while ( $loop->have_posts() ): $loop->the_post();
	$title = get_the_title($loop->ID);
	$position = get_field('position__title');
	$content = get_the_content($loop->ID); ?>
	
	<div id="<?php echo esc_html_e('bio-'); echo the_ID(); ?>" class="bio-container-table">
		<div class="bio-container-table-cell">
			<div class="bio-container-inner">
				<span class="close-bio-container">
					<button></button>
				</span>
				<?php
				if ($title) {
				echo
				'<h2>';
					echo $title; 
					if ($position) {
						echo esc_html_e(', '); echo $position;
					}
				echo
				'</h2>';
				}
					
				if ($content) {
				echo $content;
				} ?>

			</div>
		</div>
	</div>
		
	<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); ?>