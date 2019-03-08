<?php
	$post_gallery_photos = get_post_meta($id, 'post-gallery-photos', true);
	if ($post_gallery_photos) {
		$post_gallery_photos_arr = explode(',', $post_gallery_photos);
		$count = sizeof($post_gallery_photos_arr);
	}
	$vars = $wp_query->query_vars;
	$thb_image_size = array_key_exists('thb_image_size', $vars) ? $vars['thb_image_size'] : false;
	
?>
<div class="slick post-gallery <?php echo esc_attr($thb_image_size); ?>" data-pagination="false" data-navigation="true" data-center="0" data-columns="1">
<?php 
	if ($post_gallery_photos) { foreach ($post_gallery_photos_arr as $image_id) {
		$image_caption = get_post($image_id)->post_excerpt;
		$image_url = wp_get_attachment_image_src($image_id, 'full');
?>
	<figure style="background-image: url('<?php echo esc_attr($image_url[0]); ?>');">
		<?php if ($image_caption) { ?>
			<figcaption><?php echo esc_attr($image_caption); ?></figcaption>
		<?php } ?>
	</figure>
<?php } } ?>
</div>