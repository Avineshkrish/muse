<?php
/**
 * Plugin Name: WerkStatt - Required Plugin
 * Description: This contains the custom post types needed for the theme functionality
 * Version: 1.0.6
 * Author: fuelthemes
 * Author URI: http://themeforest.net/user/fuelthemes
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

function thb_create_post_type_portfolios() {
	$slug = function_exists('ot_get_option') ? sanitize_title(ot_get_option('portfolio_slug','portfolio')) : 'portfolio';
	$labels = array(
		'name' => esc_html__( 'Portfolio','werkstatt'),
		'singular_name' => esc_html__( 'Portfolio','werkstatt' ),
		'rewrite' => array('slug' => esc_html__( 'portfolios','werkstatt' )),
		'add_new' => _x('Add New', 'portfolio', 'werkstatt'),
		'add_new_item' => esc_html__('Add New Portfolio','werkstatt'),
		'edit_item' => esc_html__('Edit Portfolio','werkstatt'),
		'new_item' => esc_html__('New Portfolio','werkstatt'),
		'view_item' => esc_html__('View Portfolio','werkstatt'),
		'search_items' => esc_html__('Search Portfolio','werkstatt'),
		'not_found' =>  esc_html__('No portfolios found','werkstatt'),
		'not_found_in_trash' => esc_html__('No portfolios found in Trash','werkstatt'), 
		'parent_item_colon' => ''
  );
  
  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'menu_icon' => 'dashicons-schedule',
		'query_var' => true,
		'taxonomies' => array( 'post_tag' ),
		'rewrite' => array('slug' => $slug, 'with_front' => false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor', 'excerpt', 'thumbnail', 'comments', 'revisions')
  ); 
  
  register_post_type('portfolio',$args);
  flush_rewrite_rules();
  
  $category_labels = array(
  	'name' => esc_html__( 'Portfolio Categories', 'werkstatt'),
  	'singular_name' => esc_html__( 'Portfolio Category', 'werkstatt'),
  	'search_items' =>  esc_html__( 'Search Portfolio Categories', 'werkstatt'),
  	'all_items' => esc_html__( 'All Portfolio Categories', 'werkstatt'),
  	'parent_item' => esc_html__( 'Parent Portfolio Category', 'werkstatt'),
  	'edit_item' => esc_html__( 'Edit Portfolio Category', 'werkstatt'),
  	'update_item' => esc_html__( 'Update Portfolio Category', 'werkstatt'),
  	'add_new_item' => esc_html__( 'Add New Portfolio Category', 'werkstatt'),
    'menu_name' => esc_html__( 'Portfolio Categories', 'werkstatt')
  ); 	
  
  register_taxonomy("portfolio-category", 
  		array("portfolio"), 
  		array("hierarchical" => true, 
  				'labels' => $category_labels,
  				'show_ui' => true,
      		'query_var' => true,
  				'rewrite' => array( 'slug' => 'portfolio-category' )
  ));

	/* Add Custom Columns */
  function thb_column_value($column_name, $id) {
  	if ($column_name == 'thbpid') { echo esc_attr($id); }
  }
  function thb_column_add_clean($cols) {
  	$cols['thbpid'] = esc_html__('ID', 'werkstatt');
  	return $cols;
  }

  add_filter("manage_portfolio_posts_custom_column", 'thb_column_value', 10, 2);
  add_filter("manage_portfolio_posts_columns", 'thb_column_add_clean', 10 );
}
/* Initialize post types */
add_action( 'init', 'thb_create_post_type_portfolios', 10 );