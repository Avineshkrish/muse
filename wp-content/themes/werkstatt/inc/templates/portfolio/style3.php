<?php
	$vars = $wp_query->query_vars;
	$thb_masonry = array_key_exists('thb_masonry', $vars) ? $vars['thb_masonry'] : false;
	$thb_size = array_key_exists('thb_size', $vars) ? $vars['thb_size'] : false;
	$thb_style = array_key_exists('thb_style', $vars) ? $vars['thb_style'] : false;
	$thb_animation = array_key_exists('thb_animation', $vars) ? $vars['thb_animation'] : false;
	$thb_title_position = array_key_exists('thb_title_position', $vars) ? $vars['thb_title_position'] : false;
	$id = get_the_ID();
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
	
	$class[] = 'columns';
	$class[] = 'type-portfolio';
	$class[] = $thb_size;
	$class[] = $thb_animation;
	$class[] = $main_color_title;
	$class[] = $thb_style;
	$class[] = $cats;
	$class[] = $thb_title_position;
	$class[] = 'style3';
	
	$main_color_title = get_post_meta($id, 'main_color_title', true);
	
	$class[] = $main_color_title;
	
	$main_listing_type = get_post_meta($id, 'main_listing_type', true);
	$permalink = '';
	if ($main_listing_type == 'lightbox') {
		$permalink = $image_url[0];
		$class[] = 'portfolio-image-links';
	} else if ($main_listing_type == 'link') {
		$permalink = get_post_meta($id, 'main_listing_link', true);	
	} else {
		$permalink = get_the_permalink();	
	}
?>
<a href="<?php echo esc_url($permalink); ?>" title="<?php the_title_attribute(); ?>" <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>" data-color="<?php echo esc_attr($main_color_title); ?>">
	<div class="portfolio-holder">
		<div class="portfolio-content">
			<h2><?php the_title(); ?></h2>
			<aside class="thb-categories"><?php echo esc_html($categories); ?></aside>
		</div>
	</div>
</a>