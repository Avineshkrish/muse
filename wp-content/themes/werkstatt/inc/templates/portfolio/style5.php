<?php
	$id = get_the_ID();
	
	$vars = $wp_query->query_vars;
	$thb_button_hide = array_key_exists('thb_button_hide', $vars) ? $vars['thb_button_hide'] : false;
	
	$image_id = get_post_thumbnail_id($id);
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	
	$main_color_title = get_post_meta($id, 'main_color_title', true);
	
	$categories = get_the_term_list( $id, 'portfolio-category', '', ', ', '' ); 
	if ($categories !== '' && !empty($categories)) {
		$categories = strip_tags($categories);
	}
	
	$terms = get_the_terms( $id, 'portfolio-category' );
	$cats = '';
	if (!empty($terms)) {
		foreach ($terms as $term) { $cats .= ' thb-cat-'.strtolower($term->slug); }
	} else {
		$cats = '';	
	}
	
	$class[] = $main_color_title;
	$class[] = $cats;
	$class[] = 'style5';
	$class[] = 'type-portfolio';
	$class[] = 'small-12 columns';
	
	$main_listing_type = get_post_meta($id, 'main_listing_type', true);
	$permalink = '';
	if ($main_listing_type == 'link') {
		$permalink = get_post_meta($id, 'main_listing_link', true);	
	} else {
		$permalink = get_the_permalink();	
	}
?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>" data-title="<?php the_title(); ?>">
	<div class="portfolio-holder">
		<div class="thb-placeholder">
			<?php the_post_thumbnail('werkstatt-slider'); ?>
		</div>
		<div class="portfolio-link transparent row max_width">
			<div class="small-12 medium-10 large-push-2 large-4 columns style3-columns">
				<aside class="thb-categories"><?php echo esc_html($categories); ?></aside>
			</div>
			<div class="small-12 medium-12 large-push-1 large-10 columns style3-columns">
			<h1><?php 
				if ($thb_subtitles == 'subtitles') {
					$portfolio_subtitle = get_post_meta($id, 'portfolio_subtitle', true);
					
					echo wp_kses_post($portfolio_subtitle);
				} else {
					the_title(); 
				}
			?></h1>
			</div>
			<div class="small-12 medium-10 large-push-2 large-4 columns style3-columns">
			<?php if (has_excerpt()) { the_excerpt(); } ?>
			<?php if ($thb_button_hide !== '1') { ?>
			<a href="<?php echo esc_url($permalink); ?>" title="<?php esc_html_e('View Project', 'werkstatt'); ?>"><?php esc_html_e('View Project', 'werkstatt'); ?></a>
			<?php } ?>
			</div>
		</div>
	</div>
</div>