<?php function thb_image_slider( $atts, $content = null ) {
	$thb_margins = $thb_arrow_color = $autoplay = $autoplay_speed = false;
	$thb_pagination = 'true';
  $atts = vc_map_get_attributes( 'thb_image_slider', $atts );
  extract( $atts );

  $element_id = 'thb-image-slider-' . mt_rand(10, 99);
  $el_class[] = 'thb-image-slider';
  $el_class[] = 'slick';
  $el_class[] = 'thb-image-slider-'.$thb_style;
  $el_class[] = $thb_overflow;
  $el_class[] = $thb_margins;
  $el_class[] = $lightbox;
  $el_class[] = $thb_arrow_color;
  $el_class[] = $thb_style === 'style1' ? $thb_full_height : '';
 	$out ='';
	ob_start();
	$images = explode(',',$images);
	
	?>
	<?php if ($thb_style === 'style3') { ?>
	<div class="thb-device <?php echo esc_attr($thb_align); ?>">
		<div class="thb-iphone">
			<div class="device"></div>
			<div class="screen">
	<?php } ?>
				<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo implode(' ', $el_class); ?>" data-pagination="<?php echo esc_attr($thb_pagination); ?>" data-navigation="<?php echo esc_attr($thb_navigation); ?>" data-center="0" data-columns="1" data-infinite="<?php echo esc_attr($lightbox ? 'false' : 'true'); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-speed="<?php echo esc_attr($autoplay_speed); ?>">
					<?php
						foreach ($images as $image) {
							$image_link = wp_get_attachment_image_src($image, 'full');
							$image_title = get_the_title($image);
							
							if ($thb_full_height && $thb_style === 'style1') {
							?>
								<figure style="background-image: url(<?php echo esc_attr($image_link[0]); ?>);">
									<?php if($lightbox) { ?>
										<a href="<?php echo esc_attr($image_link[0]); ?>" class="thb-full-link" data-size="<?php echo esc_attr($image_link[1].'x'.$image_link[2]); ?>"></a>
									<?php } ?>
								</figure>
							<?php
							} else {
							?>
								<figure>
									<?php if($lightbox) { ?>
										<a href="<?php echo esc_attr($image_link[0]); ?>" data-size="<?php echo esc_attr($image_link[1].'x'.$image_link[2]); ?>">
									<?php } ?>
									<img src="<?php echo esc_attr($image_link[0]); ?>" class="lazyload" alt="<?php echo esc_attr($image_title); ?>" />
									<?php if ($thb_style === 'style4') { ?>
										<figcaption>
											<h2><?php echo esc_attr($image_title); ?></h2>
											<?php echo wpautop(get_post($image)->post_excerpt); ?>
										</figcaption>
									<?php } ?>
									<?php if($lightbox) { ?>
										</a>
									<?php } ?>
								</figure>
							<?php
							}
						}
					?>
				</div>
	<?php if ($thb_style === 'style3') { ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_image_slider', 'thb_image_slider');