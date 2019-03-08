<?php get_header(); ?>
<div class="blog-container page-padding">
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
<?php
	$article_style = ot_get_option('article_style', 'style1');
	if (get_post_meta(get_the_ID(), 'article_style_override', TRUE) == 'on') {
		$article_style = get_post_meta(get_the_ID(), 'article_style', TRUE);
	}
	get_template_part( 'inc/templates/blogbit/'.$article_style);
?>
<?php if ( comments_open() || get_comments_number() ) : ?>
<!-- Start #comments -->
<?php comments_template('', true); ?>
<!-- End #comments -->
<?php endif; ?>
<?php endwhile; else : endif; ?>
<?php do_action( 'thb_portfolio_nav' ); ?>
</div>
<?php get_footer(); ?>