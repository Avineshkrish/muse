<?php
/*
Template Name: Standard Page Layout
*/
?>
<?php get_header(); ?>
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
	<div <?php post_class('page-padding'); ?>>
		<div class="row">
			<div class="small-12 columns">
				<header class="post-title page-title">
					<?php the_title('<h1 class="entry-title" itemprop="name headline">', '</h1>' ); ?>
				</header>
				<div class="post-content no-vc">
					<?php the_content();?>
				</div>
			</div>
		</div>
	</div>
	<?php if ( comments_open() || get_comments_number() ) : ?>
	<!-- Start #comments -->
	<?php comments_template('', true); ?>
	<!-- End #comments -->
	<?php endif; ?>
<?php endwhile; else : endif; ?>
<?php get_footer(); ?>