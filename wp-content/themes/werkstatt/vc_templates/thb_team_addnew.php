<?php function thb_team_addnew( $atts, $content = null ) {
	global $thb_columns,$thb_style;
	$atts = vc_map_get_attributes( 'thb_team_addnew', $atts );
	extract( $atts );
	
	$link = ( $link == '||' ) ? '' : $link;
	$link = vc_build_link( $link  );
	
	$link_to = $link['url'];
	$a_title = $link['title'];
	$a_target = $link['target'];	
	
	$el_class[] = 'thb-team-member thb-add-new';
	if ($thb_style !== 'slick') {
		$el_class[] = 'small-12';
		$el_class[] = $thb_columns;
	}
	$el_class[] = 'columns';
	$out ='';
	ob_start();
	
	
	?>
	<div class="<?php echo implode(' ', $el_class); ?>">
		<a href="<?php echo esc_attr($link_to); ?>" target="<?php echo esc_attr( $a_target ); ?>" role="button" title="<?php echo esc_attr( $a_title ); ?>">
			<?php get_template_part( 'assets/svg/arrows_plus.svg'); ?>
		</a>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_team_addnew', 'thb_team_addnew');