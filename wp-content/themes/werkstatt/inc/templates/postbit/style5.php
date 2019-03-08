<?php add_filter( 'excerpt_length', 'thb_supershort_excerpt_length' ); ?>
<?php
	$format = get_post_format();
	$permalink = get_the_permalink();
	if ($format === 'link') {
		$permalink = get_post_meta(get_the_ID(), 'post_link', true);	
	}
?>
<div class="small-12 medium-6 large-3 columns">
	<article itemscope itemtype="http://schema.org/Article" <?php post_class('post style5'); ?> role="article">
		<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-gallery">
			<a href="<?php echo esc_url($permalink); ?>" rel="bookmark" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('werkstatt-masonry'); ?>
				<div>
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="16.7" height="11.3" viewBox="0 0 16.7 11.3" enable-background="new 0 0 16.664 11.289" xml:space="preserve"><polygon fill-rule="evenodd" clip-rule="evenodd" points="16.7 5.6 15.3 4.2 15.2 4.2 11 0 9.6 1.4 12.9 4.7 0 4.7 0 6.7 12.8 6.7 9.6 9.9 11 11.3 15.2 7.1 15.3 7.1 16.7 5.7 16.7 5.6 "/></svg>
				</div>
			</a>
		</figure>
		<?php } ?>
		<div class="blog-content">
			<aside class="post-category">
				<?php thb_display_category(); ?>
			</aside>
			<header class="post-title entry-header">
				<?php the_title('<h4 class="entry-title" itemprop="name headline"><a href="'.esc_url($permalink).'" title="'.the_title_attribute("echo=0").'">', '</a></h4>'); ?>
			</header>
			<div class="post-content">
				<?php the_excerpt(); ?>
			</div>
			<aside class="post-meta">
				<?php the_author_posts_link(); ?> <?php esc_html_e('on', 'werkstatt'); ?> <?php echo get_the_date(); ?>
			</aside>
		</div>
		<?php do_action( 'thb_PostMeta' ); ?>
	</article>
</div>