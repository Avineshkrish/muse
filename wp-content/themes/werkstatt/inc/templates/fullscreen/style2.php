<?php 
	$id = get_the_ID();
	$fs_footer = get_post_meta($id, 'fs_footer', true);
	$fs_slides = get_post_meta($id, 'fs_slides', true);
	$total = sizeof($fs_slides);

	$portfolios = array();
?>
<ol class="curtains vertical-deck thb-portfolio">
		<?php $i = 1; if (!$fs_slides) {
			?>
				<div class="swiper-slide center-contents type-portfolio">
					<h2><?php esc_html_e('Please assign slides inside Page Settings', 'werkstatt'); ?></h2>
				</div>
			<?php
		} else {
		foreach ($fs_slides as $slide) { 
			$slide_source = $slide['slide_source'] ? $slide['slide_source'] : 'portfolio';
			$id = $slide['portfolio'];
			
			if ($slide_source === 'page') {
				$id = $slide['page'];
			}
			if (get_post_status($id) !== 'publish') { 
				continue;
			}
			$image_id = get_post_thumbnail_id($id);
			$image_url = wp_get_attachment_image_src($image_id, 'full');
			
			$main_color = get_post_meta($id, 'main_color', true);
			$main_color_title = get_post_meta($id, 'main_color_title', true);
			
			$categories = get_the_term_list($id, 'portfolio-category', '', ', ', '' ); 
			if ($categories !== '' && !empty($categories)) {
				$categories = strip_tags($categories);
			}
			
			$title = get_the_title($id);
			if (isset($slide['slide_title']) && $slide['slide_title'] === 'on') {
			 $title = 	$slide['title'];
			}
			$main_listing_type = get_post_meta($id, 'main_listing_type', true);
			$permalink = '';
			if ($main_listing_type == 'link') {
				$permalink = get_post_meta($id, 'main_listing_link', true);	
			} else {
				$permalink = get_the_permalink($id);	
			}
			$bg_position = $slide['bg_position'] ? $slide['bg_position'] : 'bg-center';
			
			$portfolios[] = array(
				'title' => $title,
				'image_id' => $image_id,
				'cats' => $categories
			);
		?>
			<li class="vertical-page cover type-portfolio <?php echo esc_attr($main_color_title); ?>" data-color="<?php echo esc_attr($main_color_title); ?>">
				<div class="thb-bg <?php echo esc_attr($bg_position); ?>"><?php echo get_the_post_thumbnail($id, 'werkstatt-slider'); ?></div>
				<div class="thb-container">					
					<h1><a href="<?php echo esc_attr($permalink); ?>"><?php echo esc_attr($title); ?></a></h1>
					<aside class="thb-categories"><?php echo esc_html($categories); ?></aside>
				</div>
			</li>
		<?php $i++; } } ?>
</ol>
<div class="swiper-pagination swiper-pagination-fraction <?php echo esc_attr($fs_footer); ?>">
	<span class="swiper-pagination-current">1</span>
	-
	<span class="swiper-pagination-total"><?php echo esc_attr(sizeof($fs_slides)); ?></span>
</div>
<?php do_action('thb-all-projects', $fs_footer, $portfolios); ?>
<div class="thb-shadow"></div>