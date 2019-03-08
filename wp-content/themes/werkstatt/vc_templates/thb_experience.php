<?php function thb_experience( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_experience', $atts );
	extract( $atts );
	$position_safe = vc_value_from_safe($position);
	$description_safe = vc_value_from_safe($description);
	
	$el_class[] = 'thb-experience';
	
	$out ='';
	ob_start();

	?>
	<div class="<?php echo implode(' ', $el_class); ?>">
		<div class="row">
			<div class="small-12 large-3 columns">
				<span class="experience-date"><?php echo esc_html($date); ?></span>
			</div>
			<div class="columns">
				<div class="row">
					<div class="small-6 large-5 columns thb-experience-position">
						<?php echo $position_safe; ?>
					</div>
					<div class="small-6 large-7 columns small-text-left medium-text-right thb-experience-description">
						<?php echo $description_safe; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_experience', 'thb_experience');