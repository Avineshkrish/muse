<div class="blog-container page-padding">
<?php $blog_pagination_style = is_home() ? ot_get_option('blog_pagination_style', 'style1') : 'style1'; ?>
<div class="row masonry-blog <?php echo esc_attr('pagination-'.$blog_pagination_style); ?>" data-count="<?php echo esc_attr(get_option('posts_per_page')); ?>">
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
	<?php get_template_part( 'inc/templates/postbit/style1'); ?>
<?php endwhile; else : ?>
  <?php get_template_part( 'inc/templates/not-found' ); ?>
<?php endif; ?>
</div>
<?php do_action('thb_blog_pagination'); ?>
</div>