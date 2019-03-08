<?php
	$id = get_the_id();
	$image_id = get_post_thumbnail_id($id);
	$image_url = wp_get_attachment_image_src($image_id, 'werkstatt-blog');
	
	$format = get_post_format();
	$permalink = get_the_permalink();
	if ($format === 'link') {
		$permalink = get_post_meta(get_the_ID(), 'post_link', true);	
	}
?>
<article itemscope itemtype="http://schema.org/Article" <?php post_class('post style6 small-12 medium-6 large-3 columns'); ?> role="article">
	<figure class="post-gallery"><div style="background-image:url('<?php echo esc_attr($image_url[0]); ?>')"></div></figure>
	<div class="blog-top">
		<aside class="post-category">
			<?php thb_display_category(); ?>
		</aside>
		<header class="post-title entry-header">
			<?php the_title('<h3 class="entry-title" itemprop="name headline"><a href="'.esc_url($permalink).'" title="'.the_title_attribute("echo=0").'">', '</a></h3>'); ?>
		</header>
	</div>
	<aside class="post-meta">
		<?php the_author_posts_link(); ?> <?php esc_html_e('on', 'werkstatt'); ?> <?php echo get_the_date(); ?>
	</aside>
	<?php do_action( 'thb_PostMeta' ); ?>
</article>