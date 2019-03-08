<?php
/* De-register Contact Form 7 styles */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

// Main Styles
function thb_main_styles() {	
	global $post;
	$i = 0;
	$self_hosted_fonts = ot_get_option('self_hosted_fonts');
	// Enqueue
	wp_enqueue_style("thb-fa", Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/css/font-awesome.min.css', null, null);
	wp_enqueue_style("thb-app", Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/css/app.css', null, esc_attr(Thb_Theme_Admin::$thb_theme_version));
	
	if ( $_SERVER['HTTP_HOST'] !== 'werkstatt.fuelthemes.net') {
		wp_enqueue_style('thb-style', get_stylesheet_uri(), null, null);	
	}
	wp_enqueue_style( 'thb-google-fonts', thb_google_webfont(), array(), null );
	wp_add_inline_style( 'thb-app', thb_selection() );
	
	if ($self_hosted_fonts) {
		foreach ($self_hosted_fonts as $font) {
			$i++;
			wp_enqueue_style("thb-self-hosted-".$i, $font['font_url'], null, esc_attr(Thb_Theme_Admin::$thb_theme_version));
		}
	}
	
	if ( $post ) {
		if ( has_shortcode($post->post_content, 'contact-form-7') && function_exists( 'wpcf7_enqueue_styles' ) ) {
			wpcf7_enqueue_styles();
		}
	}
}
add_action('wp_enqueue_scripts', 'thb_main_styles');

// Main Scripts
function thb_register_js() {
	if (!is_admin()) {
		global $post;
		$thb_api_key = ot_get_option('map_api_key');
		
		// Register 
		wp_enqueue_script('thb-vendor', Thb_Theme_Admin::$thb_theme_directory_uri. 'assets/js/vendor.min.js', array('jquery'), esc_attr(Thb_Theme_Admin::$thb_theme_version), TRUE);
		wp_enqueue_script('underscore');
		wp_enqueue_script('thb-app', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/js/app.min.js', array('jquery', 'thb-vendor', 'underscore'), esc_attr(Thb_Theme_Admin::$thb_theme_version), TRUE);
		
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1) ) {
			wp_enqueue_script('comment-reply');
		}
		
		if ( $post ) {
			if ( has_shortcode($post->post_content, 'thb_map_parent') ) {
				wp_enqueue_script('gmapdep', 'https://maps.google.com/maps/api/js?key='.esc_attr($thb_api_key).'', false, null, false);
			}
			
			if ( has_shortcode($post->post_content, 'contact-form-7') && function_exists( 'wpcf7_enqueue_scripts' ) ) {
				wpcf7_enqueue_scripts();
			}
		}
		// Typekit 
		if ($typekit_id = ot_get_option('typekit_id')) {
			wp_enqueue_script('thb-typekit', 'https://use.typekit.net/'.$typekit_id.'.js', array(), NULL, FALSE );
			wp_add_inline_script( 'thb-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
		}
		
		wp_localize_script( 'thb-app', 'themeajax', array( 
			'url' => admin_url( 'admin-ajax.php' ),
			'l10n' => array (
				'loading' => esc_html__("Loading ...", 'werkstatt'),
				'nomore' => esc_html__("No More Posts", 'werkstatt'),
				'nomore_products' => esc_html__("All Products Loaded", 'werkstatt'),
				'loadmore' => esc_html__("Load More", 'werkstatt'),
				'added' => esc_html__("Added To Cart", 'werkstatt'),
				'added_svg' => thb_load_template_part('assets/svg/arrows_check.svg')
			),
			'settings' => array (
				'current_url' => get_permalink(),
				'portfolio_title_animation' => ot_get_option('portfolio_title_animation', 'on'),
				'page_transition' => ot_get_option('page_transition', 'on'),
				'page_transition_style' => ot_get_option('page_transition_style', 'thb-fade'),
				'page_transition_in_speed' => ot_get_option('page_transition_in_speed', 1000),
				'page_transition_out_speed' => ot_get_option('page_transition_out_speed', 500),
				'shop_product_listing_pagination' => ot_get_option('shop_product_listing_pagination', 'style1'),
				'right_click' => ot_get_option('right_click','on'),
				'mobile_menu_speed' => ot_get_option('mobile_menu_speed', '0.5')
			),
			'sounds' => array (
				'music_sound' => ot_get_option('music_sound', 'off'),
				'music_sound_toggle_home' => ot_get_option('music_sound_toggle_home', 'off'),
				'music_sound_file' => ot_get_option('music_sound_file', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/sounds/music_sound.mp3'),
				'menu_item_hover_sound' => ot_get_option('menu_item_hover_sound', 'off'),
				'menu_item_hover_sound_file' => ot_get_option('menu_item_hover_sound_file', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/sounds/hover.mp3'),
				'menu_open_sound' => ot_get_option('menu_open_sound', 'off'),
				'menu_open_sound_file' => ot_get_option('menu_open_sound_file', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/sounds/open.mp3'),
				'menu_close_sound' => ot_get_option('menu_close_sound', 'off'),
				'menu_close_sound_file' => ot_get_option('menu_close_sound_file', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/sounds/close.mp3'),
				'click_sound' => ot_get_option('click_sound', 'off'),
				'click_sound_file' => ot_get_option('click_sound_file', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/sounds/click.mp3'),
			)
		) );
	}
}
add_action('wp_enqueue_scripts', 'thb_register_js');

/* WooCommerce */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );