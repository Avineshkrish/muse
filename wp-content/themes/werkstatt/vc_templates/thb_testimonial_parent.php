<?php function thb_testimonial_parent( $atts, $content = null ) {
	global $thb_testimonial_columns, $thb_style;
	
	$thb_columns = 'large-4';
	$autoplay = $autoplay_speed = false;
	$atts = vc_map_get_attributes( 'thb_testimonial_parent', $atts );
	extract( $atts );
	
	$element_id = 'thb-testimonials-' . mt_rand(10, 99);
	$el_class[] = 'thb-testimonials';
	$el_class[] = 'slick';
	$el_class[] = $thb_style;
	$el_class[] = $thb_style === 'style3' ? 'row' : '';
	
	$thb_testimonial_columns = ($thb_style === 'style3' ? $thb_columns : '1');
	
	$out ='';
	ob_start();
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo implode(' ', $el_class); ?>" data-columns="<?php echo esc_attr($thb_testimonial_columns); ?>" data-pagination="<?php echo esc_attr($thb_pagination); ?>"<?php if ($thb_style !== 'style3') { ?> data-fade="true"<?php } ?> data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-speed="<?php echo esc_attr($autoplay_speed); ?>">
		<?php echo wpb_js_remove_wpautop($content, false); ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_testimonial_parent', 'thb_testimonial_parent');