<?php
	$id = get_the_id();
	$image_id = get_post_thumbnail_id($id);
	$image_url = wp_get_attachment_image_src($image_id, 'werkstatt-bloglarge');
	
	add_filter( 'excerpt_length', 'thb_supershort_excerpt_length' );
	

	$format = get_post_format();
	$permalink = get_the_permalink();
	if ($format === 'link') {
		$permalink = get_post_meta(get_the_ID(), 'post_link', true);	
	}
?>
<article itemscope itemtype="http://schema.org/Article" <?php post_class('post style7'); ?> role="article">
	<div class="row no-padding">
		<figure class="post-gallery small-12 large-8 columns" style="background-image:url('<?php echo esc_attr($image_url[0]); ?>')">
			<a href="<?php echo esc_url($permalink); ?>" rel="bookmark" title="<?php the_title(); ?>"></a>
		</figure>
		<div class="small-12 large-4 columns">
			<div class="blog-content">
				<div class="blog-top">
					<aside class="post-category">
						<?php thb_display_category(); ?>
					</aside>
					<header class="post-title entry-header">
						<?php the_title('<h3 class="entry-title" itemprop="name headline"><a href="'.esc_url($permalink).'" title="'.the_title_attribute("echo=0").'">', '</a></h3>'); ?>
					</header>
					<div class="post-content">
						<?php the_excerpt(); ?>
					</div>
				</div>
				<aside class="post-meta">
					<?php the_author_posts_link(); ?> <?php esc_html_e('on', 'werkstatt'); ?> <?php echo get_the_date(); ?>
				</aside>
			</div>
		</div>
	</div>
	<?php do_action( 'thb_PostMeta' ); ?>
</article>