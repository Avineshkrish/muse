<?php add_filter( 'excerpt_length', 'thb_short_excerpt_length' ); ?>
<?php
	$format = get_post_format();
	$permalink = get_the_permalink();
	if ($format === 'link') {
		$permalink = get_post_meta(get_the_ID(), 'post_link', true);	
	}
?>
<article itemscope itemtype="http://schema.org/Article" <?php post_class('post style3'); ?> role="article">
	<div class="row">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="small-12 large-5 columns">
			<figure class="post-gallery">
				<a href="<?php echo esc_url($permalink); ?>" rel="bookmark" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('werkstatt-blog'); ?>
				</a>
			</figure>
		</div>
		<?php } ?>
		<div class="small-12 large-7 columns">
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
	</div>
	<?php do_action( 'thb_PostMeta' ); ?>
</article>