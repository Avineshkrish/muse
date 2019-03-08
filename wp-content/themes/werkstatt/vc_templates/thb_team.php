<?php function thb_team( $atts, $content = null ) {
	global $thb_columns,$thb_style, $thb_member_style;
	$atts = vc_map_get_attributes( 'thb_team', $atts );
	extract( $atts );
	
	if( ! $image){
		return;
	}
	$link = ( $link == '||' ) ? '' : $link;
	$link = vc_build_link( $link  );
	
	$link_to = $link['url'];
	$a_title = $link['title'];
	$a_target = $link['target'];	
	
	$description = vc_value_from_safe( $description );
	$description = nl2br( $description );
	
	$el_class[] = 'thb-team-member';
	if ($thb_style !== 'slick') {
		$el_class[] = 'small-12';
		$el_class[] = $thb_columns;
	}
	$el_class[] = 'columns';
	$el_class[] = $thb_member_style;
	$el_class[] = $link_to !== '' ? 'has-link' : '';
	
	
	$out ='';
	ob_start();
	
	
	?>
	<div class="<?php echo implode(' ', $el_class); ?>">
		<?php echo wp_get_attachment_image($image, 'full'); ?>
		<?php if($description || $name ): ?>
			<div class="team-information">
				<h6><?php echo esc_html($name); ?></h6>
				<p class="job-title"><?php echo esc_html($sub_title); ?></p>
				<?php if($description){ ?>
				<div class="thb-description"><?php echo wp_kses_post($description); ?></div>
				<?php } ?>
			</div>
		<?php endif; ?>
		<?php if ($link_to) { ?>
			<a href="<?php echo esc_attr($link_to); ?>" class="team-member-link" target="<?php echo esc_attr( $a_target ); ?>" title="<?php echo esc_attr( $a_title ); ?>"></a>
		<?php } ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_team', 'thb_team');