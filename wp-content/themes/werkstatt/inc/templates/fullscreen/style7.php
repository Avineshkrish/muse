<?php 
	$id = get_the_ID();
	$fs_footer = get_post_meta($id, 'fs_footer', true);
	$fs_slides = get_post_meta($id, 'fs_slides', true);
	$fs_autoplay_speed = get_post_meta($id, 'fs_autoplay_speed', true) ? get_post_meta($id, 'fs_autoplay_speed', true) : 5000;
	$fs_autoplay = get_post_meta($id, 'fs_autoplay', true) == 'on' ? $fs_autoplay_speed : false;
	$total = sizeof($fs_slides);
	$portfolios = array();
?>
<div class="swiper-container full-page style7 thb-portfolio <?php echo esc_attr($fs_footer); ?>" data-autoplay="<?php echo esc_attr($fs_autoplay); ?>" data-footer-style="<?php echo esc_attr($fs_footer); ?>">
   <div class="swiper-wrapper">
		<?php $i = 1; 
		if (!$fs_slides) {
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
			
			$categories = get_the_term_list( $id, 'portfolio-category', '', ', ', '' ); 
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
			
			$portfolio_secondary = $slide['portfolio_secondary'];
			$portfolio_secondary_retina = $slide['portfolio_secondary_retina'];
			$secondary_image = '';
			if (!empty($portfolio_secondary)) {
				$secondary_image = wp_get_attachment_image_src($portfolio_secondary, 'full');
				$w = $portfolio_secondary_retina === 'on' ? round($secondary_image[1] / 2) : $secondary_image[1];
			}
		?>
			<div class="swiper-slide center-contents type-portfolio <?php echo esc_attr($main_color_title); ?> <?php echo esc_attr($bg_position); ?>" data-color="<?php echo esc_attr($main_color_title); ?>" data-main-color="<?php echo esc_attr($main_color); ?>" id="portfolio-<?php echo esc_attr($id); ?>">
				<?php echo get_the_post_thumbnail($id, 'werkstatt-slider'); ?>
				<a href="<?php echo esc_attr($permalink); ?>" title="<?php echo esc_attr($title); ?>">
					<div class="row full-width-row">
						<div class="style3-columns columns">
						<?php 
							if (!empty($portfolio_secondary)) {
								echo '<div class="thb_secondary_image_container"><img src="'.esc_attr($secondary_image[0]).'" width="'.esc_attr($w).'" alt="'.esc_attr($title).'" class="thb_secondary_image" data-swiper-parallax="-50%" /></div>';
							}
						?>
							<h1 data-swiper-parallax="-70%"><?php echo esc_attr($title); ?></h1>
						</div>
					</div>
				</a>
			</div>
		<?php $i++; } } ?>
	</div>
	<?php do_action('thb-swiper-navigation', $fs_footer); ?>
	<?php do_action('thb-all-projects', $fs_footer, $portfolios); ?>
	<div class="swiper-pagination <?php echo esc_attr($fs_footer); ?>"></div>
</div>