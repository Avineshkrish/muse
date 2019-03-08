<?php function thb_portfolio_masonry( $atts, $content = null ) {
	$filter_style = 'style1';
	$animation_style = 'thb-animate-from-bottom';
  $atts = vc_map_get_attributes( 'thb_portfolio_masonry', $atts );
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
		$source_data = VcLoopSettings::parseData( $source );
		$query_builder = new ThbLoopQueryBuilder( $source_data );
		$posts = $query_builder->build();
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
	$layoutmode = $masonry_layout === 'masonry-style7' ? 'packery' : false;
	$classes[] = 'row expanded thb-portfolio masonry';
	$classes[] = $masonry_layout;
	$classes[] = 'thb-filter-'.$filter_style;
	$classes[] = $style;
	$classes[] = $thb_margins == 'margins' ? 'thb-margins' : false;
	
	$btn_classes[] = 'masonry_btn btn';
	$btn_classes[] = $loadmore_style;
	if ( $posts->have_posts() ) { ?>
		<?php do_action('thb-render-filter', $filter_categories_array, $rand, $filter_style, $portfolio_id_array ); ?>
		<div class="<?php echo implode(' ', $classes); ?>" id="portfolio-section-<?php echo esc_attr($rand); ?>" data-thb-animation="<?php echo esc_attr($animation_style); ?>" data-loadmore="#loadmore-<?php echo esc_attr($rand); ?>" data-filter="thb-filter-<?php echo esc_attr($rand); ?>" data-layoutmode="<?php echo esc_attr($layoutmode); ?>" data-thb-animation-speed="<?php echo esc_attr($animation_speed); ?>">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); // start of the loop
				set_query_var( 'thb_hover_style', $hover_style);
				if ($style == 'style1') {
					$column_size = thb_get_portfolio_size($masonry_layout, $i);
					set_query_var( 'thb_size', $column_size );
				} else {
					set_query_var( 'thb_size', $columns );
					set_query_var( 'thb_masonry', true );	
				}
				set_query_var( 'thb_title_position', $title_position);
				set_query_var( 'thb_animation', $animation_style );
				get_template_part( 'inc/templates/portfolio/'.$style );
			$i++; endwhile; // end of the loop. ?>
			<?php do_action('thb_portfolio_preloader'); ?>
		</div>	
		<?php if ($loadmore) { 
			wp_localize_script( 'thb-app', 'portfolioajax', array( 
				'i' => $i,
				'aspect' => false,
				'columns' => $columns,
				'style' => $style,
				'masonry_layout' => $masonry_layout,
				'count' => $source_data['size'],
				'loop' => $source,
				'hover_style' => $hover_style,
				'title_position' => $title_position,
				'animation_style' => $animation_style
			) );
		?>
		<div class="text-center">
			<a class="<?php echo implode(' ', $btn_classes); ?>" href="#" id="loadmore-<?php echo esc_attr($rand); ?>" title="<?php esc_attr_e( 'Load More', 'werkstatt' ); ?>"><span><?php esc_html_e( 'Load More', 'werkstatt' ); ?></span></a>
		</div>
		<?php } ?>
	<?php } else {
		get_template_part( 'inc/templates/not-found' );
	}

	$out = ob_get_clean();
	
	wp_reset_query();
	wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio_masonry', 'thb_portfolio_masonry');