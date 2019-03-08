<?php function thb_counter( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_counter', $atts );
	extract( $atts );
	$speed = $speed === '' ? 2000 : $speed;
	$out = '';
	$element_id = 'thb-counter-' . mt_rand(10, 99);
	
	$class[] = 'thb-counter';
	$class[] = $extra_class;
	ob_start();
	?>
	<div class="<?php echo implode(' ', $class); ?>" id="<?php echo esc_attr($element_id); ?>">
		<style>
		#<?php echo esc_attr($element_id); ?> .odometer.odometer-auto-theme.odometer-animating-up .odometer-ribbon-inner, 
		#<?php echo esc_attr($element_id); ?> .odometer.odometer-theme-minimal.odometer-animating-up .odometer-ribbon-inner {
			transition: transform <?php echo esc_attr($speed / 1000); ?>s;
		}
		</style>
		<figure>
			<?php get_template_part( 'assets/svg/'.$icon ); ?>
		</figure>
		<div class="h1" data-count="<?php echo esc_attr($counter); ?>" data-speed="<?php echo esc_attr($speed); ?>">0</div>
		<h6><?php echo esc_attr($heading); ?></h6>
	</div>
	<?php
	
  $out = ob_get_contents();
  if (ob_get_contents()) ob_end_clean();
     
  return $out;
}
thb_add_short('thb_counter', 'thb_counter');
