<?php
/*
Template Name: Fullscreen
*/
?>
<?php get_header(); ?>
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
<?php 
	$id = get_the_ID();
	$fs_layout = get_post_meta($id, 'fs_layout', true) ? get_post_meta($id, 'fs_layout', true) : 'style1';
	get_template_part( 'inc/templates/fullscreen/'.$fs_layout );
?>
<?php endwhile; else : endif; ?>
<?php get_footer(); ?>