<?php
function thb_get_portfolio_size($style = 'masonry-style1', $i = 0) {
	$size = '';
	if ($style == 'masonry-style1') {
		switch($i) {
			default:
				$size = 'small-12 medium-6 large-3 padding-1';
				break;
			case 2:
			case 4:
			case 6:
			case 8:
			case 13:
			case 18:
				$size = 'small-12 medium-6 large-3 padding-2';
				break;
		}
	} else if ($style == 'masonry-style2') {
		switch($i) {
			default:
				$size =	'small-12 medium-6 large-4 padding-1';
				break;
			case 0:
			case 2:
			case 3:
			case 4:
			case 8:
				$size = 'small-12 medium-6 large-4 padding-2';
				break;
		}
	} else if ($style == 'masonry-style3') {
		switch($i) {
			default:
				$size =	'small-12 medium-6 large-3 padding-1';
				break;
			case 2:
			case 5:
			case 12:
			case 15:
				$size = 'small-12 large-6 padding-1';
				break;
		}
	} else if ($style == 'masonry-style4') {
		switch($i) {
			default:
				$size =	'small-12 medium-6 large-3 padding-1';
				break;
			case 4:
			case 14:
				$size =	'small-12 medium-6 large-6 padding-half';
				break;
			case 0:
			case 5:
			case 9:
			case 13:
				$size = 'small-12 medium-6 large-3 padding-2';
				break;
		}
	} else if ($style == 'masonry-style5') {
		switch($i) {
			default:
				$size =	'small-12 medium-6 large-6 padding-1';
				break;
			case 1:
			case 2:
			case 3:
			case 5:
			case 7:
			case 8:
			case 9:
			case 11:
			case 13:
			case 14:
			case 15:
			case 17:
			case 19:
			case 20:
			case 21:
				$size =	'small-12 medium-6 large-6 padding-half';
				break;
		}
	} else if ($style == 'masonry-style6') {
		switch($i) {
			default:
				$size =	'small-12 medium-4 thb-5 padding-1';
				break;
			case 6:
			case 10:
			case 14:
			case 18:
				$size =	'small-12 medium-8 thb-5-2 padding-1';
				break;
		}
	} else if ($style == 'masonry-style7') {
		switch($i) {
			default:
				$size =	'small-12 medium-4 large-4 padding-1';
				break;
			case 0:
				$size =	'small-12 medium-8 large-8 padding-1';
				break;
			case 1:
			case 5:
				$size =	'small-12 medium-4 large-4 padding-2';
				break;
			case 2:
			case 3:
				$size =	'small-12 medium-6 large-6 padding-1';
				break;
		}
	} else if ($style == 'grid') {
		$size =	'small-12 medium-6 padding-1';
	}
	return $size;
}

/* Portfolio Categories Array */
function thb_portfolioCategories(){
	$portfolio_categories = get_terms('portfolio-category', array('hide_empty' => false));
	$out = array();
	if (empty($portfolio_categories->errors)) {
		foreach($portfolio_categories as $portfolio_category) {
			$out[$portfolio_category->name] = $portfolio_category->term_id;
		}
	}
	return $out;
}

/* Header Filter */
function thb_portfolio_categories($categories, $id, $style, $portfolio_id_array = false) {
	
	if (!empty($categories) || $categories) { 
		$portfolio_id_array = $portfolio_id_array ? $portfolio_id_array : array();
		
		if ($style !== 'style4') {
	?>
	<nav class="thb-portfolio-filter <?php echo esc_attr($style); ?>" id="thb-filter-<?php echo esc_attr($id); ?>">
		<strong>
		<?php if ($style == 'style1') { ?>
			<?php esc_html_e('Filters', 'werkstatt'); ?> <span><?php get_template_part( 'assets/img/general-next.svg' ); ?></span>
		<?php } ?>
			<ul>
				<li><a href="#" data-filter="*" class="active" data-count="<?php echo count($portfolio_id_array); ?>"><?php esc_html_e('All', 'werkstatt'); ?></a></li>
			<?php 
				 foreach ($categories as $cat) {
				 	$term = get_term($cat);

				 	$args = array(
				 		'include' => implode(",", $portfolio_id_array),
				 		'post_type' => 'portfolio',
				 		'tax_query' => array(
				 				array(
				 					'taxonomy' => 'portfolio-category',
				 					'field' => 'slug',
				 					'terms' => array($term->slug),
				 					        'operator' => 'IN'
				 				)
				 			)
				 	);
				 	$posts = get_posts($args);
				 	echo '<li><a href="#" data-filter=".thb-cat-' . esc_attr($term->slug) . '" data-count="'.esc_attr(count($posts)).'">' . esc_attr($term->name) . '</a></li>';
				 }
			?>
			</ul>
		</strong>
	</nav>
	<?php }
	}
}
add_action( 'thb-render-filter', 'thb_portfolio_categories', 1, 4 );

/* Swiper Navigation */
function thb_swiper_navigation($fs_footer) {
	?>
	<div class="swiper-navigation <?php echo esc_attr($fs_footer); ?>">
		<?php if ($fs_footer === 'footer_style2') { echo ' <strong class="swiper-button-prev">'.esc_attr('Previous', 'werkstatt').'</strong>'; } else { get_template_part( 'assets/img/full-screen-up-arrow.svg' ); }?>
		<?php if ($fs_footer === 'footer_style2') { echo ' <strong class="swiper-button-next">'.esc_attr('Next', 'werkstatt').'</strong>'; } else { get_template_part( 'assets/img/full-screen-down-arrow.svg'); }?>
	</div>
	<?php
}
add_action( 'thb-swiper-navigation', 'thb_swiper_navigation', 1, 1 );

/* Show All */
function thb_show_all($portfolios) {

	if (!empty($portfolios) || $portfolios) { ?>
	<nav class="thb-show-all">
		<div class="thb-close"></div>
		<div class="items" id="thb-show-all">
			<ul class="row small-up-1 medium-up-3 large-up-5">
			<?php 
				 foreach ($portfolios as $portfolio) {
				 	$image_url = wp_get_attachment_image_src($portfolio["image_id"], 'full');
				 	echo '<li class="columns"><div>
				 		<figure style="background-image: url('.esc_attr($image_url[0]).')"></figure>
				 		<h6>' . $portfolio["title"] . '</h6>
				 		<aside class="cats">'.$portfolio["cats"] .'</aside>
				 		</div>
				 	</li>';
				 }
			?>
			</ul>
		</div>
	</nav>
	
	<?php }
}
add_action( 'thb_show_all', 'thb_show_all', 1, 1 );

/* All Projects */
function thb_all_projects($fs_footer, $portfolios) {
	$id = get_the_ID();

	$fs_all = get_post_meta($id, 'fs_all', true);
	$fs_all_type = get_post_meta($id, 'fs_all_type', true) ? get_post_meta($id, 'fs_all_type', true) : 'style1'; 
	$fs_all_link = get_post_meta($id, 'fs_all_link', true) ? get_post_meta($id, 'fs_all_link', true) : '#';
	
	if ($fs_all !== 'off') { 
	?>
		<a href="<?php echo esc_url($fs_all_link); ?>" title="<?php esc_attr('All Projects','werkstatt'); ?>" class="show-all fixed <?php echo esc_attr( $fs_all_type . ' ' . $fs_footer ); ?>">
			<?php esc_html_e('All Projects','werkstatt'); ?>
		</a>
		<?php 
		do_action('thb_show_all', $portfolios); 
	}
}
add_action( 'thb-all-projects', 'thb_all_projects', 1, 2 );

/* Swiper Navigation */
function thb_swiper_nav($class) {
	$class = $class ? $class : 'arrow-style1';
	?>
	<div class="swiper-button-prev swiper-nav <?php echo esc_attr($class); ?>">
		<span>
			<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="thb-arrow" x="0" y="0" width="16.7" height="11.3" viewBox="0 0 16.7 11.3" enable-background="new 0 0 16.664 11.289" xml:space="preserve"><polygon fill-rule="evenodd" clip-rule="evenodd" points="0 5.6 1.4 4.2 1.4 4.2 5.7 0 7.1 1.4 3.8 4.7 16.7 4.7 16.7 6.7 3.9 6.7 7.1 9.9 5.7 11.3 1.4 7.1 1.4 7.1 0 5.7 0 5.6 "/></svg>
		</span>
	</div>
	<div class="swiper-button-next swiper-nav <?php echo esc_attr($class); ?>">
		<span>
			<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="thb-arrow" x="0" y="0" width="16.7" height="11.3" viewBox="0 0 16.7 11.3" enable-background="new 0 0 16.664 11.289" xml:space="preserve"><polygon fill-rule="evenodd" clip-rule="evenodd" points="16.7 5.6 15.3 4.2 15.2 4.2 11 0 9.6 1.4 12.9 4.7 0 4.7 0 6.7 12.8 6.7 9.6 9.9 11 11.3 15.2 7.1 15.3 7.1 16.7 5.7 16.7 5.6 "/></svg>
		</span>
	</div>
	
	<?php
}
add_action( 'thb_swiper_nav', 'thb_swiper_nav', 3, 3 );

/* Swiper Pagination*/
function thb_swiper_pagination() {
	
	echo '<div class="thb-swiper-pagination"></div>';
}
add_action( 'thb_swiper_pagination', 'thb_swiper_pagination', 3, 3 );

/* Portfolio Preloader */
function thb_portfolio_preloader($style = false) {
	$preloader = ot_get_option('thb_preloader', 'hexagon');
	if ($preloader !== 'no') {
		if ($preloader == 'hexagon') {
			?>
			<div class="thb-preloader <?php echo esc_attr($style); ?>"><?php get_template_part( 'assets/img/preloader-hexagon.svg' ); ?></div>
			<?php
		} else if ($preloader == 'circle') {
			?>
			<div class="thb-preloader <?php echo esc_attr($style); ?>"><?php get_template_part( 'assets/img/preloader-circle.svg' ); ?></div>
			<?php
		}
	}
}
add_action( 'thb_portfolio_preloader', 'thb_portfolio_preloader');

/* Portfolio Prev/Next */
function thb_portfolio_nav() {
	$portfolio_nav_cat = ot_get_option('portfolio_nav_cat', 'off');
	$portfolio_main_theme = ot_get_option('portfolio_main');
	$portfolio_main = get_post_meta(get_the_ID(), 'portfolio_main', TRUE);
	$portfolio_link = $portfolio_main ? get_permalink($portfolio_main) : ( $portfolio_main_theme ? get_permalink($portfolio_main_theme) : get_home_url());
	
	if (is_singular('post')) {
		$portfolio_link = get_permalink( get_option( 'page_for_posts' ) );	
		$prev = get_previous_post();
		$next = get_next_post();	
	} else if (is_singular('portfolio')) {
		$in_same_term = $portfolio_nav_cat == 'on' ? true : false;
		$prev = get_adjacent_post( $in_same_term, false, true, 'portfolio-category' );
		$next = get_adjacent_post( $in_same_term, false, false, 'portfolio-category' );	
	}
	if (
		(is_singular('portfolio') && 'on' === ot_get_option('portfolio_nav', 'on')) || 
		(is_singular('post') && 'on' === ot_get_option('blog_nav', 'on'))
	) {
	?>
	<div class="portfolio_nav">
		<div class="row full-width-row">
			<div class="small-5 columns">
				<?php
					if ($prev) {
						$image_id = get_post_thumbnail_id($prev->ID);
						$image_link = wp_get_attachment_image_src($image_id, 'werkstatt-rectangle');
					?>
					<a href="<?php echo esc_url(get_permalink($prev->ID)); ?>" class="post_nav_link prev">
						<?php if ($image_id) { ?><div class="inner"><img src="<?php echo esc_attr($image_link[0]); ?>" alt="<?php echo esc_attr($prev->post_title); ?>" /></div><?php } ?>
						<?php get_template_part( 'assets/img/portfolio-prev-arrow.svg' ); ?>
						<strong>
							<?php if (is_singular('portfolio')) { ?>
								<?php esc_html_e('Previous Project (p)', 'werkstatt'); ?>
							<?php } else { ?>
								<?php esc_html_e('Previous Post (p)', 'werkstatt'); ?>
							<?php } ?>
						</strong>
						<span><?php echo esc_html($prev->post_title); ?></span>
					</a>
				<?php
				}
				?>
			</div>
			<div class="small-2 columns center_link">
				<a href="<?php echo esc_attr($portfolio_link); ?>" title="<?php esc_attr_e('Back', 'werkstatt'); ?>">
					<?php get_template_part( 'assets/img/back_to_thumbnail.svg' ); ?>
				</a>
			</div>
			<div class="small-5 columns">
				<?php
				if ($next) {
					$image_id = get_post_thumbnail_id($next->ID);
					$image_link = wp_get_attachment_image_src($image_id,'werkstatt-rectangle');
				?>
					<a href="<?php echo esc_url(get_permalink($next->ID)); ?>" class="post_nav_link next">
						<?php if ($image_id) { ?><div class="inner"><img src="<?php echo esc_attr($image_link[0]); ?>" alt="<?php echo esc_attr($next->post_title); ?>" /></div><?php } ?>
						<?php get_template_part( 'assets/img/portfolio-next-arrow.svg' ); ?>
						<strong>
							<?php if (is_singular('portfolio')) { ?>
								<?php esc_html_e('Next Project (n)', 'werkstatt'); ?>
							<?php } else { ?>
								<?php esc_html_e('Next Post (n)', 'werkstatt'); ?>
							<?php } ?>
						</strong>
						<span><?php echo esc_html($next->post_title); ?></span>
						
					</a>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
	}
}
add_action( 'thb_portfolio_nav', 'thb_portfolio_nav', 3, 3 );

/* Portfolio Attributes */
function thb_portfolio_attributes($style) {
	$id = get_the_ID();
	$client_name = get_post_meta($id, 'client_name', true);
	$client_website = get_post_meta($id, 'client_website', true);
	$client_date = get_post_meta($id, 'client_date', true);
	$client_services = get_post_meta($id, 'client_services', true);
	$client_more = get_post_meta($id, 'client_more', true);
	?>
	<?php if ($client_name !== '' || $client_website !== '' || $client_date !== '' || $client_services !== '' || !empty($client_more)) { ?>
		<div class="portfolio-attributes <?php if(isset($style)) { echo esc_attr($style); } ?>">
			<?php if ($client_name !== '') { ?>
			<div class="attribute"><strong><?php esc_html_e('Client:', 'werkstatt'); ?></strong> <?php echo esc_html($client_name); ?></div>
			<?php } ?>
			<?php if ($client_website !== '') { ?>
			<div class="attribute"><strong><?php esc_html_e('Website:', 'werkstatt'); ?></strong> <a href="<?php echo esc_url($client_website); ?>" title="<?php if ($client_name !== '') { echo esc_html($client_name); } ?>" target="_blank"><?php echo esc_html(thb_get_domain($client_website)); ?></a></div>
			<?php } ?>
			<?php if ($client_date !== '') { ?>
			<div class="attribute"><strong><?php esc_html_e('Date:', 'werkstatt'); ?></strong> <?php echo esc_html($client_date); ?></div>
			<?php } ?>
			<?php if ($client_services !== '') { ?>
			<div class="attribute"><strong><?php esc_html_e('Services:', 'werkstatt'); ?></strong> <?php echo esc_html($client_services); ?></div>
			<?php } ?>
			<?php if (!empty($client_more)) { ?>
				<?php foreach ($client_more as $more ) { ?>
					<div class="attribute">
						<strong><?php echo esc_attr($more['title']); ?>: </strong>
						<?php if ($more['client_custom_link'] !=='') { ?>
							<a href="<?php echo esc_html($more['client_custom_link']); ?>" title="<?php echo esc_attr($more['client_custom_value']); ?>" target="_blank">
						<?php } ?>
							<?php echo $more['client_custom_value']; ?>
						<?php if ($more['client_custom_link'] !=='') { ?>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	<?php
	}
}
add_action( 'thb_portfolio_attributes', 'thb_portfolio_attributes', 3, 3 );

/* Portfolio Share */
function thb_portfolio_share() {
	$id = get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = wp_get_attachment_image_src($image_id,'full');
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');
	$sharing_type = ot_get_option('sharing_buttons', array());
	?>
	<?php if (!empty($sharing_type)) { ?>
	<div class="thb-portfolio-share">
		<strong>
			<?php esc_html_e('Share', 'werkstatt'); ?>
			<ul>
				<li><span><?php get_template_part( 'assets/img/general-next.svg' ); ?></span></li>
				<?php if (in_array('facebook',$sharing_type)) { ?>
				<li><a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="social facebook"><i class="fa fa-facebook"></i></a></li>
				<?php } ?>
				<?php if (in_array('twitter',$sharing_type)) { ?>
				<li><a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . ''; ?>" class="social twitter"><i class="fa fa-twitter"></i></a></li>
				<?php } ?>
				<?php if (in_array('pinterest',$sharing_type)) { ?>
				<li><a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image[0] ) ? esc_attr($image[0]) : '' ) . '&description='.htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" class="social pinterest" nopin="nopin" data-pin-no-hover="true"><i class="fa fa-pinterest"></i></a></li>
				<?php } ?>
				<?php if (in_array('google-plus',$sharing_type)) { ?>
				<li><a href="<?php echo 'http://plus.google.com/share?url=' . esc_url( $permalink ) . ''; ?>" class="social google-plus"><i class="fa fa-google-plus"></i></a></li>
				<?php } ?>
				<?php if (in_array('linkedin',$sharing_type)) { ?>
				<li><a href="<?php echo 'https://www.linkedin.com/cws/share?url=' . esc_url( $permalink ) . ''; ?>" class="social linkedin"><i class="fa fa-linkedin"></i></a></li>
				<?php } ?>
				<?php if (in_array('whatsapp',$sharing_type)) { ?>
				<li><a href="<?php echo 'whatsapp://send?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . ' '. esc_url( $permalink ); ?>" class="whatsapp social" data-href="<?php echo esc_url( $permalink ); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a></li>
				<?php } ?>
				<?php if (in_array('facebook-messenger',$sharing_type)) { ?>
					<?php $fb_app_id = ot_get_option('facebook_app_id'); ?>
				<li><a href="<?php echo 'fb-messenger://share/?link=' . esc_url( $permalink ) . '&app_id='.esc_url($fb_app_id); ?>" class="facebook-messenger social"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="96 93 322 324"><path d="M257 93c-88.918 0-161 67.157-161 150 0 47.205 23.412 89.311 60 116.807V417l54.819-30.273C225.449 390.801 240.948 393 257 393c88.918 0 161-67.157 161-150S345.918 93 257 93zm16 202l-41-44-80 44 88-94 42 44 79-44-88 94z" /></svg></a></li>
				<?php } ?>
				<?php if (in_array('vkontakte',$sharing_type)) { ?>
				<li><a href="<?php echo 'http://vk.com/share.php?url=' . esc_url( $permalink ) . ''; ?>" class="social vk"><i class="fa fa-vk"></i></a></li>
				<?php } ?>
				<?php if (in_array('email',$sharing_type)) { ?>
				<li><a href="<?php echo 'mailto:?subject=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&body='.urlencode( esc_url( $permalink ) ); ?>" class="email social"><i class="fa fa-envelope"></i></a></li>
				<?php } ?>
			</ul>
		</strong>
	</div>
	<?php
	}
}
add_action( 'thb_portfolio_share', 'thb_portfolio_share', 3, 3 );

/* Portfolio Video Header */
function thb_portfolio_video() {
	$id = get_the_ID();
	$portfolio_header_video = get_post_meta($id, 'portfolio_header_video', true);
	$portfolio_header_video_url = wp_get_attachment_url($portfolio_header_video);
	if ($portfolio_header_video_url) {
		$portfolio_header_video_poster = get_post_meta($id, 'portfolio_header_video_poster', true);
		$portfolio_header_video_poster_url = wp_get_attachment_url($portfolio_header_video_poster);
		$video_type = wp_check_filetype( $portfolio_header_video_url, wp_get_mime_types() );
		$poster_type = wp_check_filetype( $portfolio_header_video_poster_url, wp_get_mime_types() );
		$portfolio_header_video_loop = get_post_meta($id, 'portfolio_header_video_loop', true) !== 'off' ? 'true' : 'false';
	
		$attributes[] = 'data-vide-bg="'.$video_type['ext'].': '. esc_attr($portfolio_header_video_url) . ($portfolio_header_video_poster_url ? ', poster: '.esc_attr($portfolio_header_video_poster_url) : '').'"';
		
		$attributes[] = 'data-vide-options="posterType: ' . ( $poster_type['ext'] ? esc_attr($poster_type['ext']) : 'none' ) . ', loop: '.$portfolio_header_video_loop.', muted: true, position: 50% 50%, resizing: true"';
	} else {
		$attributes[] = '';
	}
	return $attributes;
}