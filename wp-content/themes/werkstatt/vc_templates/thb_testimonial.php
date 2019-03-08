<?php function thb_testimonial( $atts, $content = null ) {
	global $thb_testimonial_columns, $thb_style;
	$atts = vc_map_get_attributes( 'thb_testimonial', $atts );
	extract( $atts );

	$image = wpb_getImageBySize( array( 'attach_id' => $author_image, 'class' => 'author_image', 'thumb_size' => array('128','128') ) );

	$el_class[] = 'thb-testimonial';
	$out ='';
	ob_start();

	if ($thb_style === 'style3') {
		echo '<div class="small-12 '.$thb_testimonial_columns.' columns">';
	}
	?>
	<div class="thb-testimonial">
		<blockquote><?php echo wpautop($quote); ?></blockquote>
		<?php if($author_name) { ?>
			<?php echo $image['thumbnail']; ?>
			<div>
				<cite><?php echo esc_html($author_name); ?></cite>
			<span class="title"><?php echo esc_html($author_title); ?></span>
			</div>
		<?php } ?>
	</div>
	<?php
	
	if ($thb_style === 'style3') {
		echo '</div>';
	}
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_testimonial', 'thb_testimonial');