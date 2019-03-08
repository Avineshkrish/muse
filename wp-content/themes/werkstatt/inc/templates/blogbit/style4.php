<article itemscope itemtype="http://schema.org/Article" <?php post_class('post post-detail style4-detail'); ?> role="article">
	<div class="row align-center">
		<div class="small-12 medium-11 columns">
			<div class="row">
				<div class="small-12 columns">
					<?php
					  // The following determines what the post format is and shows the correct file accordingly
					  $format = get_post_format();
					  set_query_var( 'thb_image_size', 'thb-medium');
					  if (in_array($format, array('gallery', 'video'))) {
					  	get_template_part( 'inc/templates/blogformats/'.$format );
					  } else {
					  	get_template_part( 'inc/templates/blogformats/standard' );
					  }
					?>
				</div>
				<div class="small-12 large-9 columns post-content-container">
					<header class="post-title entry-header">
						<aside class="post-category">
							<?php the_category(', '); ?>
						</aside>
						<?php the_title('<h1 class="entry-title" itemprop="name headline">', '</h1>'); ?>
						<aside class="post-meta">
							<?php the_author_posts_link(); ?> <?php esc_html_e('on', 'werkstatt'); ?> <?php echo get_the_date(); ?>
						</aside>
					</header>
					<div class="post-content">
						<?php the_content(); ?>
						 <?php wp_link_pages(); ?> 
					</div>
					<?php get_template_part( 'inc/templates/blog/post-end'); ?>
				</div>
				<?php get_sidebar('single'); ?>
			</div>
		</div>
	</div>
	<?php do_action( 'thb_PostMeta' ); ?>
</article>