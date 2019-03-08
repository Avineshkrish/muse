<figure class="post-gallery parallax">
	<?php if ( has_post_thumbnail() ) { $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id, 'full'); } ?>
	<div class="parallax_bg" 
				data-top-bottom="transform: translate3d(0px, 40%, 0px);"
				data-top="transform: translate3d(0px, 0%, 0px);"
				style="<?php if ( has_post_thumbnail() ) { ?>background-image: url(<?php echo esc_html($image_url[0]); ?>); <?php } ?>"></div>
</figure>