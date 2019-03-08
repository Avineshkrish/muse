<?php function thb_portfolio_text( $atts, $content = null ) {
	$filter_style = 'style1';
	$style = 'style1';
	$add_previews = 'true';
  $atts = vc_map_get_attributes( 'thb_portfolio_text', $atts );
  extract( $atts );
  $filter_categories_array = $filter_categories ? explode(',',$filter_categories) : false;

	$portfolio_source = $portfolio_source ? $portfolio_source : 'by_id';
	$portfolio_id_array = array();
	
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
	
	if ( $posts->have_posts() ) { ?>
		<?php do_action('thb-render-filter', $filter_categories_array, $rand, $filter_style, $portfolio_id_array ); ?>
		<div class="row expanded thb-portfolio masonry thb-portfolio-text" id="portfolio-section-<?php echo esc_attr($rand); ?>" data-filter="thb-filter-<?php echo esc_attr($rand); ?>" data-layoutmode="packery" data-thb-animation="thb-fade" data-preload="nobg">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); // start of the loop
				get_template_part( 'inc/templates/portfolio/style6' );
			$i++; endwhile; // end of the loop. ?>
			<?php 
				if ($add_previews == 'true') {
					add_action('wp_footer', function () {
						echo '<aside class="portfolio-hover-content"><div class="container"><div class="thb-replace"></div>';
						do_action('thb_portfolio_preloader');
						echo '</div></aside>';
					}); 
				}
			?>
			<?php do_action('thb_portfolio_preloader'); ?>
		</div>
	<?php } else {
		get_template_part( 'inc/templates/not-found' );
	}

	$out = ob_get_clean();
	
	wp_reset_query();
	wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio_text', 'thb_portfolio_text');