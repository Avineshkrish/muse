<?php function thb_portfolio_grid( $atts, $content = null ) {
	$filter_style = 'style1';
	$style = 'style1';
  $atts = vc_map_get_attributes( 'thb_portfolio_grid', $atts );
  extract( $atts );
  $filter_categories_array = $filter_categories ? explode(',',$filter_categories) : false;

	$portfolio_source = $portfolio_source ? $portfolio_source : 'by_id';
	
	if ($portfolio_source === 'by_id') {
	  $portfolio_id_array = explode(',', $portfolio_ids);
		
		$args = array(
			'posts_per_page' => -1, 
			'post_type' =>'portfolio', 
			'post__in' => $portfolio_id_array,
			'orderby' => 'post__in'
		);
	 	$posts = new WP_Query( $args );
	} else {
		$posts = vc_build_loop_query($source);
		$posts = $posts[1];	
		
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) : $posts->the_post();
				$portfolio_id_array[] = get_the_ID();
			endwhile;
		}	
	}
 	$rand = rand(0,1000);
 	$i = 0;
 	ob_start();
	
	$classes[] = 'row expanded thb-portfolio masonry';
	$classes[] = 'thb-filter-'.$filter_style;
	$classes[] = $thb_margins == 'margins' ? 'thb-margins' : 'no-padding';
	
	if ( $posts->have_posts() ) { ?>
		<?php do_action('thb-render-filter', $filter_categories_array, $rand, $filter_style, $portfolio_id_array ); ?>
		<div class="<?php echo implode(' ', $classes); ?>" id="portfolio-section-<?php echo esc_attr($rand); ?>" data-thb-animation="<?php echo esc_attr($animation_style); ?>" data-filter="thb-filter-<?php echo esc_attr($rand); ?>" data-thb-animation-speed="<?php echo esc_attr($animation_speed); ?>">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); // start of the loop
				set_query_var( 'thb_hover_style', $hover_style);
				$column_size = thb_get_portfolio_size('grid', $i);
				set_query_var( 'thb_size', $columns .' '. $column_size );
				set_query_var( 'thb_title_position', $title_position);
				set_query_var( 'thb_animation', $animation_style );
				get_template_part( 'inc/templates/portfolio/'.$style );
			$i++; endwhile; // end of the loop. 
				set_query_var( 'thb_animation', false );
			?>
			<?php do_action('thb_portfolio_preloader'); ?>
		</div>
	<?php } else {
		get_template_part( 'inc/templates/not-found' );
	}

	$out = ob_get_contents();
	if (ob_get_contents()) ob_end_clean();
	
	wp_reset_query();
	wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio_grid', 'thb_portfolio_grid');