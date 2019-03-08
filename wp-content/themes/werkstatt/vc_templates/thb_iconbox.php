<?php function thb_iconbox( $atts, $content = null ) {
	$animation = 'true';
	$thb_icon_color = '';
	$alignment = 'text-center';
  $atts = vc_map_get_attributes( 'thb_iconbox', $atts );
  extract( $atts );
    
 	$out ='';
	ob_start();
	$element_id = uniqid("thb-iconbox-");
	$link = vc_build_link($link);
	$el = 'div';
	if($link['url']) {
		$el = 'a';
		$el_class[] = 'has-link';
	}
	$el_class[] = 'thb-iconbox';
	$el_class[] = $type;
	$el_class[] = $type === 'top type1' ? $alignment : '';
	$el_class[] = $animation ? 'animation-'.$animation : 'animation-off';
	$el_class[] = $extra_class;
	$description = vc_value_from_safe( $description );
	$description = nl2br( $description );
	
	$image = '';
	if ($bg_image) {
		$image = wp_get_attachment_image_src( $bg_image, 'full' );
	}
	if ($icon_image) {
		$img = wpb_getImageBySize( array( 'attach_id' => $icon_image, 'thumb_size' => 'full', 'class' => 'thb_image' ) );
	}
	?>
	<<?php echo esc_attr($el); ?> id="<?php echo esc_attr($element_id); ?>" class="<?php echo implode(' ', $el_class); ?>" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" data-animation_speed="<?php echo esc_attr($animation_speed); ?>">
		<?php if ($type == 'top type3') { ?>
		<span class="thb-iconbox-bg" style="background-image:url(<?php if ($image) { echo esc_attr($image[0]); } ?>)"></span>
		<?php } ?>
		<?php if ($icon_image || $icon) { ?>
		<figure>
			<?php if ($icon_image) {
				echo $img['thumbnail'];
			} else {
				get_template_part( 'assets/svg/'.$icon ); 
			} ?>
		</figure>
		<?php } ?>
		<div class="iconbox-content">
			<?php if ($heading) { ?><h5><?php echo esc_html($heading); ?></h5><?php } ?>
			<?php echo wp_kses_post(wpautop($description)); ?>
		</div>
		<?php if ($thb_icon_color || $icon_image_width || $thb_accent_color) { ?>
		<style>
			<?php if ($thb_icon_color) { ?>
			#<?php echo esc_attr($element_id); ?>.thb-iconbox figure svg path, 
			#<?php echo esc_attr($element_id); ?>.thb-iconbox figure svg circle, 
			#<?php echo esc_attr($element_id); ?>.thb-iconbox figure svg rect, 
			#<?php echo esc_attr($element_id); ?>.thb-iconbox figure svg ellipse {
				stroke: <?php echo esc_attr($thb_icon_color); ?>;
			}
			<?php } ?>
			<?php if ($icon_image_width && $icon_image) { ?>
				#<?php echo esc_attr($element_id); ?>.thb-iconbox figure {
					width: <?php echo esc_attr($icon_image_width); ?>px;
					height: auto;
				}
			<?php } ?>
			<?php if ($thb_accent_color) { ?>
				#<?php echo esc_attr($element_id); ?>.thb-iconbox.type2:hover {
					background-color: <?php echo esc_attr($thb_accent_color); ?>;
					border-color: <?php echo esc_attr($thb_accent_color); ?>;
				}
				#<?php echo esc_attr($element_id); ?>.thb-iconbox.type3:after {
					box-shadow: inset 0 -75px 60px -35px <?php echo esc_attr($thb_accent_color); ?>;
				}
			<?php } ?>
		</style>
		<?php } ?>
	</<?php echo esc_attr($el); ?>>
	<?php
	
	$out = ob_get_clean();
	   
	return $out;
}
thb_add_short('thb_iconbox', 'thb_iconbox');