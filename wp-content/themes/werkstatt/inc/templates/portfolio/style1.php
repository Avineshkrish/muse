<?php
	$vars = $wp_query->query_vars;
	$thb_size = array_key_exists('thb_size', $vars) ? $vars['thb_size'] : false;
	$thb_title_position = array_key_exists('thb_title_position', $vars) ? $vars['thb_title_position'] : false;
	$thb_animation = array_key_exists('thb_animation', $vars) ? $vars['thb_animation'] : false;
	$thb_hover_style = array_key_exists('thb_hover_style', $vars) ? $vars['thb_hover_style'] : false;
	$id = get_the_ID();
	$image_id = get_post_thumbnail_id($id);
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	$hover_id = get_post_meta($id, 'main_hover_image', true);

	$main_color_title = get_post_meta($id, 'main_color_title', true);
	
	$categories = get_the_term_list( $id, 'portfolio-category', '', ', ', '' ); 
	if ($categories !== '' && !empty($categories)) {
		$categories = strip_tags($categories);
	}
	
	$terms = get_the_terms( $id, 'portfolio-category' );
	
	$cats = '';	
	if (!empty($terms)) {
		foreach ($terms as $term) { $cats .= ' thb-cat-'.strtolower($term->slug); }
	}
	
	$class[] = 'columns';
	$class[] = 'type-portfolio';
	$class[] = $thb_size;
	$class[] = $thb_title_position;
	$class[] = $thb_animation;
	$class[] = $main_color_title;
	$class[] = $cats;
	$class[] = $thb_hover_style;
	$class[] = 'style1';
	
	$main_listing_type = get_post_meta($id, 'main_listing_type', true);
	$permalink = '';
	$link_class[] = 'portfolio-link';
	if ($main_listing_type == 'lightbox') {
		$permalink = $image_url[0];
		$class[] = 'portfolio-image-links';
		$link_class[] = 'portfolio-image-link';
	} else if ($main_listing_type == 'link') {
		$permalink = get_post_meta($id, 'main_listing_link', true);	
	} else {
		$permalink = get_the_permalink();	
	}
?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>">
	<div class="portfolio-holder">
		<?php if ($thb_hover_style === 'thb-image-hover') { ?>
			<div class="thb-placeholder first"><?php the_post_thumbnail('werkstatt-masonry-3x'); ?></div>
			<div class="thb-placeholder second"><?php echo wp_get_attachment_image($hover_id, 'werkstatt-masonry-3x'); ?></div>
			<a href="<?php echo esc_url($permalink); ?>" title="<?php the_title_attribute(); ?>" class="<?php echo esc_attr(implode(' ', $link_class)); ?>" data-size="<?php echo esc_attr($image_url[1].'x'.$image_url[2]); ?>">
			</a>
		<?php } else { ?>
			<div class="thb-placeholder"><?php the_post_thumbnail('werkstatt-masonry-3x'); ?></div>
			<a href="<?php echo esc_url($permalink); ?>" title="<?php the_title_attribute(); ?>" class="<?php echo esc_attr(implode(' ', $link_class)); ?>" data-size="<?php echo esc_attr($image_url[1].'x'.$image_url[2]); ?>">
				<h2><span><?php the_title(); ?></span></h2>
				<aside class="thb-categories"><span><?php echo esc_html($categories); ?></span></aside>
			</a>
		<?php } ?>
	</div>
</div>