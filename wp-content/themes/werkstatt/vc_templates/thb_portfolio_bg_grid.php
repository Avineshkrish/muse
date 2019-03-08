<?php function thb_portfolio_bg_grid( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_portfolio_bg_grid', $atts );
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
 	ob_start();
	
	if ( $posts->have_posts() ) { ?>
		<div class="thb-portfolio thb-list-portfolio thb-bg-grid thb-bg-grid-full" id="portfolio-section-<?php echo esc_attr($rand); ?>">
			<div class="thb-content-side">
				<div class="row max_width">
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
					
					<?php
						$id = get_the_id();
						$image_id = get_post_thumbnail_id($id);
						$image_url = wp_get_attachment_image_src($image_id, 'full');

						$portfolios[] = array(
							'image_url' => $image_url
						);
						
						$column_size = thb_get_portfolio_size('grid', $i);
						set_query_var( 'thb_size', $columns .' '. $column_size );
						set_query_var( 'thb_title_position', $title_position);
						get_template_part( 'inc/templates/portfolio/style3' );
					?>
					
				<?php $i++; endwhile; // end of the loop. ?>
				</div>
			</div>
			<div class="thb-image-side">
				<?php 
					 foreach ($portfolios as $portfolio) {
					 	$image_url = $portfolio["image_url"];
					 	echo '
					 	<div class="portfolio-image" style="background-image:url('. esc_attr($image_url[0]) .')"></div>';
					 }
				?>
			</div>
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
thb_add_short('thb_portfolio_bg_grid', 'thb_portfolio_bg_grid');