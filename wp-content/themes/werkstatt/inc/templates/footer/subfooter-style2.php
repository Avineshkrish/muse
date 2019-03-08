<?php
	$subfooter_max_width = ot_get_option('subfooter_max_width', 'off');
	$subfooter_social_link = ot_get_option('subfooter_social_link');
	
	$subfooter_classes[] = 'subfooter';
	$subfooter_classes[] = ot_get_option('subfooter_style', 'style1');
	$subfooter_classes[] = ot_get_option('subfooter_color', 'light');
	$subfooter_classes[] = $subfooter_max_width == 'off' ? 'full-width-footer' : false;
?>
<div id="subfooter" class="<?php echo implode(' ', $subfooter_classes); ?>">
	<div class="row">
		<div class="small-12 columns">
			<div class="subfooter-container">
				<div class="thb-copyright">
					<?php echo wp_kses_post(ot_get_option('subfooter_text')); ?>
				</div>
				<div class="thb-social">
					<?php do_action('thb_social_links', $subfooter_social_link); ?>
				</div>
			</div>
		</div>
	</div>
</div>