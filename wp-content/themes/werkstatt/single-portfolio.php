<?php get_header(); ?>
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
<?php if ( post_password_required() ) { get_template_part( 'inc/templates/password-protected' ); } else { ?>
	<article itemscope itemtype="http://schema.org/Article" <?php post_class('post portfolio-detail'); ?> role="article">
		<?php 
			$id = get_the_ID();
			
			$portfolio_header_style = get_post_meta($id, 'portfolio_header_style', true) ? get_post_meta($id, 'portfolio_header_style', true) : 'style1';
			$style6_header_alignment = get_post_meta($id, 'style6_header_alignment', true) ? get_post_meta($id, 'style6_header_alignment', true) : 'right';
			
		if ($portfolio_header_style !== 'style6') {
		?>
			<?php get_template_part( 'inc/templates/portfolio-header/'.$portfolio_header_style); ?>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
		<?php } else { ?>
			<div class="post-content">
				<div class="row no-padding full-width-row no-column-padding no-row-padding">
					<div class="small-12 large-6 small-order-2 <?php if ($style6_header_alignment == 'left') { ?>large-order-3<?php } ?>">
						<?php the_content(); ?>
					</div>
					<div class="small-12 large-6 small-order-1 large-order-2">
						<?php get_template_part( 'inc/templates/portfolio-header/'.$portfolio_header_style); ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</article>
	
	<?php if ( comments_open() || get_comments_number() ) { comments_template('', true); } ?>
	<?php do_action( 'thb_portfolio_nav' ); ?>
<?php } ?>
<?php endwhile; else : endif; ?>
<?php get_footer(); ?>