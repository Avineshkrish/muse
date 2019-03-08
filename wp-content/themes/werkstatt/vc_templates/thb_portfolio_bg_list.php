<?php function thb_portfolio_bg_list( $atts, $content = null ) {
	$full_screen_enabled = '';
  $atts = vc_map_get_attributes( 'thb_portfolio_bg_list', $atts );
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
		<div class="thb-portfolio thb-list-portfolio thb-bg-grid thb-bg-list <?php echo esc_attr($thb_style . ' ' . $full_screen_enabled); ?>" id="portfolio-section-<?php echo esc_attr($rand); ?>" data-zoom-effect="<?php echo esc_attr($zoom_effect); ?>">
			<div class="thb-content-side">
				<div class="row align-center">
					<div class="small-12 medium-8 large-6 columns">
					<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
						
						<?php
							$id = get_the_id();
							$image_id = get_post_thumbnail_id($id);
							$image_url = wp_get_attachment_image_src($image_id, 'full');
							
							$categories = get_the_term_list( $id, 'portfolio-category', '', ', ', '' ); 
							if ($categories !== '' && !empty($categories)) {
								$categories = strip_tags($categories);
							}
							$main_listing_type = get_post_meta($id, 'main_listing_type', true);
							$permalink = '';
							if ($main_listing_type == 'link') {
								$permalink = get_post_meta($id, 'main_listing_link', true);	
							} else {
								$permalink = get_the_permalink($id);	
							}
							$portfolios[] = array(
								'image_url' => $image_url
							);
						?>
						<a href="<?php echo esc_url($permalink); ?>" title="<?php the_title_attribute(); ?>" class="type-portfolio <?php if($i == 0) { echo 'active'; } ?>">
							<h1><?php the_title(); ?> <span class="next"><?php get_template_part( 'assets/img/general-next.svg' ); ?></span></h1>
							<aside class="thb-categories"><?php echo esc_html($categories); ?></aside>
						</a>
					<?php $i++; endwhile; // end of the loop. ?>
					</div>
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
thb_add_short('thb_portfolio_bg_list', 'thb_portfolio_bg_list');