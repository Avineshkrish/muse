<div class="blog-container page-padding">
<?php $blog_pagination_style = is_home() ? ot_get_option('blog_pagination_style', 'style1') : 'style1'; ?>
<div class="row masonry-blog style8 <?php echo esc_attr('pagination-'.$blog_pagination_style); ?>" data-count="<?php echo esc_attr(get_option('posts_per_page')); ?>">
<?php  $i = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php if ($i == 0) { 
		get_template_part( 'inc/templates/postbit/style8-first'); 
	} else {
		get_template_part( 'inc/templates/postbit/style8'); 
	} ?>
<?php $i++; endwhile; else : ?>
  <?php get_template_part( 'inc/templates/not-found' ); ?>
<?php endif; ?>
</div>
<?php do_action('thb_blog_pagination'); ?>
</div>