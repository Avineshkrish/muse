<?php
	$id = get_the_ID();
	
	$main_color_title = get_post_meta($id, 'main_color_title', true);
	
	$terms = get_the_terms( $id, 'portfolio-category' );
	$cats = '';
	if (!empty($terms)) {
		foreach ($terms as $term) { $cats .= ' thb-cat-'.strtolower($term->slug); }
	} else {
		$cats = '';	
	}
	
	$class[] = $cats;
	$class[] = 'style6';
	$class[] = 'small-12 columns';
	
	$main_listing_type = get_post_meta($id, 'main_listing_type', true);
	$permalink = '';
	if ($main_listing_type == 'link') {
		$permalink = get_post_meta($id, 'main_listing_link', true);	
	} else {
		$permalink = get_the_permalink();	
	}
?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>" data-id="<?php the_ID(); ?>">
	<h2>
		<a class="portfolio-holder" href="<?php echo esc_url($permalink); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		<div class="style6-box" data-id="<?php the_ID(); ?>">
			<?php the_post_thumbnail('werkstatt-rectangle-2x'); ?>
			<?php if (has_excerpt()) { the_excerpt(); } ?>
			<?php do_action( 'thb_portfolio_attributes'); ?>
		</div>	
	</h2>
</div>