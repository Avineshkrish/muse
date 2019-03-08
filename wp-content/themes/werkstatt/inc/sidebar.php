<?php
function thb_register_sidebars() {
	if ( thb_wc_supported() ) {
		register_sidebar(array('name' => esc_html__('Shop Sidebar', 'werkstatt'), 'id' => 'shop', 'description' => esc_html__('Sidebar for the Shop page', 'werkstatt'), 'before_widget' => '<div id="%1$s" class="widget woo cf %2$s">', 'after_widget' => '</div></div>', 'before_title' => '<h6>', 'after_title' => '</h6><div class="widget_content">'));
	}
	register_sidebar(array('name' => esc_html__('Article Sidebar', 'werkstatt'), 'id' => 'single', 'description' => esc_html__('Articles', 'werkstatt'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 1', 'werkstatt'), 'id' => 'footer1', 'description' => esc_html__('Footer - first column', 'werkstatt'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 2', 'werkstatt'), 'id' => 'footer2', 'description' => esc_html__('Footer - second column', 'werkstatt'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 3', 'werkstatt'), 'id' => 'footer3', 'description' => esc_html__('Footer - third column', 'werkstatt'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 4', 'werkstatt'), 'id' => 'footer4', 'description' => esc_html__('Footer - forth column', 'werkstatt'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 5', 'werkstatt'), 'id' => 'footer5', 'description' => esc_html__('Footer - fifth column', 'werkstatt'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 6', 'werkstatt'), 'id' => 'footer6', 'description' => esc_html__('Footer - sixth column', 'werkstatt'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
}
add_action( 'widgets_init', 'thb_register_sidebars' );