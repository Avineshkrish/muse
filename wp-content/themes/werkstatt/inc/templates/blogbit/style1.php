<article itemscope itemtype="http://schema.org/Article" <?php post_class('post post-detail style1-detail'); ?> role="article">
	<figure class="post-gallery parallax">
		<?php if ( has_post_thumbnail() ) { $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id, 'full'); } ?>
		<div class="parallax_bg" 
					data-top-bottom="transform: translate3d(0px, 40%, 0px);"
					data-top="transform: translate3d(0px, 0%, 0px);"
					style="<?php if ( has_post_thumbnail() ) { ?>background-image: url(<?php echo esc_html($image_url[0]); ?>); <?php } ?>"></div>
		<header class="post-title entry-header">
			<div class="row align-center">
				<div class="small-12 medium-10 large-7 columns">
					<aside class="post-category">
						<?php the_category(', '); ?>
					</aside>
					<?php the_title('<h1 class="entry-title" itemprop="name headline">', '</h1>'); ?>
					<aside class="post-meta">
						<?php the_author_posts_link(); ?> <?php esc_html_e('on', 'werkstatt'); ?> <?php echo get_the_date(); ?>
					</aside>
				</div>
			</div>
		</header>
	</figure>
	<div class="row align-center">
		<div class="small-12 medium-10 large-7 columns">
			<div class="post-content">
				<?php the_content(); ?>
				 <?php wp_link_pages(); ?> 
			</div>
			<?php get_template_part( 'inc/templates/blog/post-end'); ?>
		</div>
	</div>
	<?php do_action( 'thb_PostMeta' ); ?>
</article>