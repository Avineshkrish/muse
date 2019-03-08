<?php function thb_portfolio_list( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_portfolio_list', $atts );
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
		<div class="row expanded thb-portfolio thb-list-portfolio <?php echo esc_attr($thb_style); ?>" id="portfolio-section-<?php echo esc_attr($rand); ?>" data-zoom-effect="<?php echo esc_attr($zoom_effect); ?>">
			<div class="small-12 medium-6 columns thb-content-side">
				<div class="row align-center">
					<div class="small-12 large-6 columns">
						<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
							<?php
								$id = get_the_id();
								$image_id = get_post_thumbnail_id($id);
								$image_url = wp_get_attachment_image_src($image_id, 'full');
								
								$categories = get_the_term_list( $id, 'portfolio-category', '', ', ', '' ); 
								
								$cat_case = ($categories !== '' && !empty($categories) && !is_wp_error($categories));
								if ($cat_case) {
									$categories = strip_tags($categories);
								}
								
								$portfolios[] = array(
									'image_url' => $image_url
								);
							?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="type-portfolio <?php if($i == 0) { echo 'active'; } ?>" id="portfolio-<?php the_ID(); ?>">
								<h3><?php the_title(); ?> <span class="next"><?php get_template_part( 'assets/img/general-next.svg' ); ?></span></h3>
								<?php if ($cat_case) { ?><aside class="thb-categories"><?php echo esc_html($categories); ?></aside><?php } ?>
							</a>
							
						<?php $i++; endwhile; // end of the loop. ?>
					</div>
				</div>
			</div>
			<div class="small-12 medium-6 columns thb-image-side">
				<?php 
					 foreach ($portfolios as $portfolio) {
					 	$image_url = $portfolio["image_url"];
					 	echo '
					 	<div class="portfolio-image" style="background-image:url('. esc_attr($image_url[0]) .')"></div>';
					 }
				?>
			</div>
		</div>
	<?php } else {
		get_template_part( 'inc/templates/not-found' );
	}

	$out = ob_get_clean();
	
	wp_reset_query();
	wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio_list', 'thb_portfolio_list');