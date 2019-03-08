<?php get_header(); ?>
<?php 
	$blog_style = ot_get_option('blog_style', 'style3');
	get_template_part( 'inc/templates/blog/'.$blog_style);
?>
<?php get_footer(); ?>