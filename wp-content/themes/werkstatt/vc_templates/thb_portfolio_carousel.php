<?php function thb_portfolio_carousel( $atts, $content = null ) {
	$autoplay = $autoplay_speed = '';
  $atts = vc_map_get_attributes( 'thb_portfolio_carousel', $atts );
  extract( $atts );
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
  }
 	$rand = rand(0,1000);
 	$i = 0;
 	
 	$el_class[] = "swiper-container full-page thb-portfolio carousel";
 	
 	ob_start();

	if ( $posts->have_posts() ) { ?>
		<div class="<?php echo implode(' ', $el_class); ?>" id="portfolio-section-<?php echo esc_attr($rand); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-speed="<?php echo esc_attr($autoplay_speed); ?>">
		   <div class="swiper-wrapper">
				<?php while ( $posts->have_posts() ) : $posts->the_post(); // start of the loop
					set_query_var( 'thb_size', 'small-12 medium-6 '. $columns );
					set_query_var( 'thb_title_position', 'title-center');
					set_query_var( 'thb_hover_style', $hover_style);
					get_template_part( 'inc/templates/portfolio/'.$style );
				$i++; endwhile; // end of the loop. ?>
			</div>
			<?php if ($thb_navigation) { do_action('thb_swiper_nav'); } ?>
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
thb_add_short('thb_portfolio_carousel', 'thb_portfolio_carousel');