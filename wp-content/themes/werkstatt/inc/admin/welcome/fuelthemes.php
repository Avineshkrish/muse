<?php 
class Thb_Theme_Admin {
	/**
	 *	Main instance
	 */
	private static $_instance;
	
	/**
	 *	Theme Name
	 */
	public static $thb_theme_name;
	
	/**
	 *	Theme Version
	 */
	public static $thb_theme_version;
	
	/**
	 *	Theme Slug
	 */
	public static $thb_theme_slug;
	
	/**
	 *	Theme Directory
	 */
	public static $thb_theme_directory;
	
	/**
	 *	Theme Directory URL
	 */
	public static $thb_theme_directory_uri;
	
	/**
	 *	Product Key
	 */
	public static $thb_product_key;
	
	/**
	 *	Product Key Expiration
	 */
	public static $thb_product_key_expired;
	
	/**
	 * Envato Hosted
	 */
	public static $thb_envato_hosted;
	
	/**
	 *	Theme Constructor executed only once per request
	 */
	public function __construct() {
		if ( self::$_instance ) {
			_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
		}
	}
	
	/**
	 * You cannot clone this class
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
	}

	/**
	 * You cannot unserialize instances of this class
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
	}
	
	public static function instance() {
		global $thb_Theme_Admin;
		if ( ! self::$_instance ) {
			self::$_instance = new self();
			$thb_Theme_Admin = self::$_instance;
			
			// Theme Variables
			$theme = wp_get_theme();
			self::$thb_theme_name = $theme->get( 'Name' );
			self::$thb_theme_version = $theme->parent() ? $theme->parent()->get( 'Version' ) : $theme->get( 'Version' );
			self::$thb_theme_slug = $theme->template;
			self::$thb_theme_directory = get_template_directory() . '/';
			self::$thb_theme_directory_uri = get_template_directory_uri() . '/';

			/* nulled */
			update_option( "thb_".self::$thb_theme_slug."_key", 'nulled' );
			update_option( "thb_".self::$thb_theme_slug."_key_expired", 0 );

			self::$thb_product_key = get_option("thb_".self::$thb_theme_slug."_key");
			self::$thb_product_key_expired = get_option("thb_".self::$thb_theme_slug."_key_expired");
			
			// Envato Hosted
			self::$thb_envato_hosted = defined('ENVATO_HOSTED_SITE');
			
			// After Setup Theme
			add_action( 'after_setup_theme', array( self::$_instance, 'afterSetupTheme' ) );
			
			// Setup Admin Menus
			if ( is_admin() ) {
				self::$_instance->initAdminPages();
			}
		}
		
		return self::$_instance;
	}
	/**
	 *	After Theme Setup
	 */
	public function afterSetupTheme() {
		/* WooCommerce Support */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		
		/* WooCommerce Products per Page */
		if( $products_per_page = ot_get_option('products_per_page')) {
			add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $products_per_page . ';' ), 20 );
		}
		
		/* Post Formats */
		add_theme_support('post-formats', array('image', 'gallery', 'video', 'link'));
		
		/* Text Domain */
		load_theme_textdomain('werkstatt', Thb_Theme_Admin::$thb_theme_directory . 'inc/languages');
		
		/* Background Support */
		add_theme_support( 'custom-background', array( 'default-color' => 'ffffff', 'wp-head-callback' => 'thb_change_custom_background_cb' ) );
		
		/* Title Support */
		add_theme_support( 'title-tag' );
		
		/* Required Settings */
		global $content_width;
		if(!isset($content_width)) $content_width = 1170;
		add_theme_support( 'automatic-feed-links' );
		
		/* Editor Styling */
		add_editor_style( array('assets/css/editor-style.css') );
		
		/* Image Settings */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 80, 75, true );
		
		$thb_image_sizes = self::$_instance->thb_image_sizes();
		
		// Register image size
		foreach ( $thb_image_sizes as $image_size ) {
			add_image_size( $image_size['slug'], $image_size['width'], $image_size['height'], $image_size['crop'] );
		}
		
		if (false === get_option("medium_crop")) {
		    add_option("medium_crop", "1");
		} else {
		    update_option("medium_crop", "1");
		}
		  
		/* HTML5 Galleries */
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );
		
		/* Register Menus */
		add_theme_support('nav-menus');
		register_nav_menus(
			array(
				'nav-menu' => esc_html__( 'Navigation Menu', 'werkstatt' ),
				'secondary-menu' => esc_html__( 'Secondary Menu', 'werkstatt' )
			)
		);
		
		$sidebars = ot_get_option('sidebars');
		if(!empty($sidebars)) {
			foreach($sidebars as $sidebar) {
				register_sidebar( array(
					'name' => $sidebar['title'],
					'id' => $sidebar['id'],
					'description' => '',
					'before_widget' => '<div id="%1$s" class="widget cf %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h6>',
					'after_title' => '</h6>',
				));
			}
		}
	}
	public function thb_image_sizes() {
		$thb_image_sizes = array(
			array(
				'slug'   => 'werkstatt-square',
				'width'  => 160,
				'height' => 150,
				'crop'   => true,
			),
			array(
				'slug'   => 'werkstatt-slider',
				'width'  => 1600,
				'height' => 900,
				'crop'   => true,
			),
			array(
				'slug'   => 'werkstatt-bloglarge',
				'width'  => 1280,
				'height' => 640,
				'crop'   => true,
			),
			array(
				'slug'   => 'werkstatt-masonry',
				'width'  => 640,
				'height' => 9999,
				'crop'   => false,
			),
			array(
				'slug'   => 'werkstatt-rectangle',
				'width'  => 320,
				'height' => 240,
				'crop'   => true,
			),
		);
		
		function thb_calculate_image_orientation( $thb_image_sizes ) {
			if ( ! is_array( $thb_image_sizes ) ) {
				return;
			}
			$new_sizes = array();
			foreach ( $thb_image_sizes as $image_size ) {
				$new_sizes[] = array(
					'slug' 	 => $image_size['slug'].'-small',
					'width'  => absint($image_size['width'] / 2),
					'height' => $image_size['height'] === 9999 ? 9999 : absint($image_size['height'] * 2),
					'crop'   => $image_size['crop'],
				);
				$new_sizes[] = array(
					'slug' 	 => $image_size['slug'].'-2x',
					'width'  => $image_size['width'] * 2,
					'height' => $image_size['height'] === 9999 ? 9999 : $image_size['height'] * 2,
					'crop'   => $image_size['crop'],
				);
				$new_sizes[] = array(
					'slug' 	 => $image_size['slug'].'-3x',
					'width'  => $image_size['width'] * 3,
					'height' => $image_size['height'] === 9999 ? 9999: $image_size['height'] * 3,
					'crop'   => $image_size['crop'],
				);
				$new_sizes[] = array(
					'slug' 	 => $image_size['slug'].'-mini',
					'width'  => 20,
					'height' => $image_size['height'] === 9999 ? 9999  : absint(($image_size['height'] * 20) / $image_size['width']),
					'crop'   => $image_size['crop'],
				);
			}
			return $new_sizes;
		}
		$new_sizes = thb_calculate_image_orientation($thb_image_sizes);
		foreach($new_sizes as $new_size) {
			$thb_image_sizes[] = $new_size;
		}
		return $thb_image_sizes;
	}
	public function thbDemos() {
		return array(
		    array(
		        'import_file_name'       => 'Main Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/main/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/main/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/main/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/masonry1.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/"
		    ),
		    array(
		        'import_file_name'       => 'Masonry Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/masonry/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/masonry/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/masonry/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/masonry2.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-masonry/"
		    ),
		    array(
		        'import_file_name'       => 'Agency Simple Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency-simple/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency-simple/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency-simple/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/agency_simple.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-agency-simple/"
		    ),
		    array(
		        'import_file_name'       => 'Simple Portfolio Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/masonry/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/masonry/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/masonry/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/simple_portfolio.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-masonry/3-columns/"
		    ),
		    array(
		        'import_file_name'       => 'Grid Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/main/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/main/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/main/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/grid.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/grid-4-columns/"
		    ),
		    array(
		        'import_file_name'       => 'Agency Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/agency.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-agency/"
		    ),
		    array(
		        'import_file_name'       => 'Background Grid Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/text-style/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/text-style/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/text-style/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/bg_grid.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-text-style/background-grid/"
		    ),
		    array(
		        'import_file_name'       => 'Carousel Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/carousel/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/carousel/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/carousel/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/carousel.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-carousel/"
		    ),
		    array(
		        'import_file_name'       => 'Designer Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/designer/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/designer/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/designer/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/designer.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-designer/"
		    ),
		    array(
		        'import_file_name'       => 'Freelancer Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/freelancer/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/freelancer/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/freelancer/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/freelancer.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-freelancer/"
		    ),
		    array(
		        'import_file_name'       => 'Personal Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/personal/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/personal/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/personal/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/personal.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-personal/"
		    ),
		    array(
		        'import_file_name'       => 'Modern Agency Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency-modern/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency-modern/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency-modern/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/agency_modern.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-agency-modern/"
		    ),
		    array(
		        'import_file_name'       => 'Text Style Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/text-style/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/text-style/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/text-style/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/text_style.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-text-style/"
		    ),
		    array(
		        'import_file_name'       => 'Full Screen Vertical Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/vertical/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/vertical/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/vertical/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/full_screen_vertical.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-fullscreen/"
		    ),
		    array(
		        'import_file_name'       => 'Full Screen Segments Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/segments/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/segments/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/segments/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/full_screen_segments.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-fullscreen-segments/"
		    ),
		    array(
		        'import_file_name'       => 'Full Screen Parallax Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/parallax/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/parallax/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/parallax/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/full_screen_parallax.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-fullscreen-parallax/"
		    ),
		    array(
		        'import_file_name'       => 'Full Screen Creative Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/creative/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/creative/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/creative/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/full_screen_creative.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-fullscreen-creative/"
		    ),
		    array(
		        'import_file_name'       => 'Full Screen Split Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/split/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/split/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/split/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/full_screen_split.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-fullscreen-split/"
		    ),
		    array(
		        'import_file_name'       => 'Photography Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/photography/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/photography/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/photography/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/photographer.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-photography/"
		    ),
		    array(
		        'import_file_name'       => 'Digital Agency Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency-digital/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency-digital/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/agency-digital/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/digital_agency.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-agency-digital/"
		    ),
		    array(
		        'import_file_name'       => 'Architecture Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/architecture/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/architecture/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/architecture/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/architecture.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-architecture/"
		    ),
		    array(
		        'import_file_name'       => 'Full Screen Glitch Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/glitch/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/glitch/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/glitch/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/glitch.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-fullscreen-glitch/"
		    ),
		    array(
		        'import_file_name'       => 'Full Screen Objects Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/objects/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/objects/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/objects/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/full_screen_objects.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-fullscreen-objects/"
		    ),
		    array(
		        'import_file_name'       => 'Developer Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/developer/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/developer/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/developer/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/developer.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-developer/"
		    ),
		    array(
		        'import_file_name'       => 'Lateral Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/lateral/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/lateral/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/lateral/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/left_menu.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-lateral/"
		    ),
		    array(
		        'import_file_name'       => 'Lateral Dark Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/lateral-dark/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/lateral-dark/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/lateral-dark/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/left_menu_dark.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-lateral-dark/"
		    ),
		    array(
		        'import_file_name'       => 'Tasty Landing Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/landing-tasty/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/landing-tasty/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/landing-tasty/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/tasty.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-landing-tasty/"
		    ),
		    array(
		        'import_file_name'       => 'Sphere Landing Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/landing-sphere/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/landing-sphere/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/landing-sphere/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/sphere.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-landing-sphere/"
		    ),
		    array(
		        'import_file_name'       => 'Boxed Demo',
		        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/boxed/democontent.xml",
		        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/boxed/widget_data.json",
		        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/werkstatt/boxed/theme-options.txt",
		        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/boxed.jpg",
		        'import_demo_url' => "http://werkstatt.fuelthemes.net/werkstatt-boxed/"
		    )
		);
	}
	/**
	 *	Inintialize Admin Pages
	 */
	public function initAdminPages() {
		global $pagenow;
		
		// Script and styles
		add_action( 'admin_enqueue_scripts', array( & $this, 'adminPageEnqueue' ) );
		
		// Menu Pages
		add_action( 'admin_menu', array( & $this, 'adminSetupMenu' ), 1 );
		
		// Theme Options Redirect
		if ( 'admin.php' == $pagenow && 'thb-theme-options' == wp_unslash($_GET['page']) ) {
			if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
				wp_redirect( admin_url( "themes.php?page=ot-theme-options" ) );
				die();
			}
		}
		
		// Redirect to Main Page
		add_action( 'after_switch_theme', array( & $this, 'thb_activation_redirect' ) );
		
		// Ajax Option Update
		add_action("wp_ajax_thb_update_options", array( & $this, 'thb_update_options' ));
		add_action("wp_ajax_nopriv_thb_update_options", array( & $this, 'thb_update_options' ));
		
		// Admin Notices
		add_action( 'admin_notices', array( & $this, 'thb_admin_notices' ) );
		
		// Theme Updates
		add_action( 'admin_init', array( & $this, 'thb_theme_update') );
		
		// Plugin Update Nonce
		add_action( 'register_sidebar', array( & $this, 'thb_theme_admin_init' ) );
		
	}
	function thb_admin_notices() {
		$remote_ver = get_option("thb_".self::$thb_theme_slug."_remote_ver") ? get_option("thb_".self::$thb_theme_slug."_remote_ver") : self::$thb_theme_version;
		$local_ver = self::$thb_theme_version;

		if(version_compare($local_ver, $remote_ver, '<')) {
			if ( 
				( !self::$thb_product_key && ( self::$thb_product_key_expired == 0 ) && !self::$thb_envato_hosted ) || 
				( self::$thb_product_key && ( self::$thb_product_key_expired == 1 ) && !self::$thb_envato_hosted ) 
			) {
				echo '<div class="notice is-dismissible error thb_admin_notices">
				<p>There is an update available for the <strong>' . self::$thb_theme_name . '</strong> theme. Go to <a href="' . admin_url( 'admin.php?page=thb-product-registration' ) . '">Product Registration</a> to enable theme updates.</p>
				</div>';
			}
	
			if ( ( self::$thb_product_key && ( self::$thb_product_key_expired == 0 ) ) || self::$thb_envato_hosted ) {
				echo '<div class="notice is-dismissible error thb_admin_notices">
				<p>There is an update available for the <strong>' . self::$thb_theme_name . '</strong> theme. <a href="' . admin_url() . 'update-core.php">Update now</a>.</p>
				</div>';
			}
    }
	}
	public function thb_update_options() {
		$key = $_POST['key'];
		$expired = $_POST['expired'];  
		update_option("thb_".self::$thb_theme_slug."_key", $key);
		update_option("thb_".self::$thb_theme_slug."_key_expired", $expired);
		wp_die();
	}
	public function thb_theme_update() {
		global $wp_filesystem;
		// add_filter( 'pre_set_site_transient_update_plugins', array(&$this, 'thb_check_for_update_plugin' ) );
		add_filter( 'pre_set_site_transient_update_themes', array( & $this, 'thb_check_for_update_theme' ) );
		add_filter( 'upgrader_pre_download', array( $this, 'thb_upgradeFilter' ), 10, 4 );
	}
	public function thb_check_for_update_plugins() {
		$args = array(
			'timeout' => 30,
			'body' => array( 
				"item_ids" => '242431',
				"product_key" => self::$thb_product_key,
				"envato_hosted" => self::$thb_envato_hosted
			)
		);
		$request = wp_remote_get( self::$_instance->dashboardUrl('plugin/version'), $args);
		
		$data = '';
		if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
			$data = json_decode( wp_remote_retrieve_body($request));
		}
		return $data;
	}
	public function thb_check_for_update_theme( $transient ) {
		global $wp_filesystem;
		$args = array(
			'timeout' => 30,
			'body' => array( 
				"theme_name" => self::$thb_theme_name,
				"product_key" => self::$thb_product_key,
				"envato_hosted" => self::$thb_envato_hosted
			)
		);
		
		$request = wp_remote_get( self::$_instance->dashboardUrl('version'), $args);

    if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
    	$data = json_decode( wp_remote_retrieve_body($request));
			update_option("thb_".self::$thb_theme_slug."_key_expired", 0);	
			
			if (isset($data->success) && $data->success == false) {
				self::$thb_product_key_expired = 1;
				update_option("thb_".self::$thb_theme_slug."_key_expired", 1);	
			} else {
				if(version_compare(self::$thb_theme_version, $data->version, '<')) {
					$transient->response[self::$thb_theme_slug] = array(
						"new_version"	=> 		$data->version,
						"package"		=>	    $data->download_url,
						"url"			=>		'http://fuelthemes.net'		
					);
	
					update_option("thb_".self::$thb_theme_slug."_remote_ver", $data->version);
				}
			}
		}
		return $transient;
	}
	public function thb_upgradeFilter( $reply, $package, $updater ) {
		global $wp_filesystem;
		$cond = ( !self::$thb_product_key || ( self::$thb_product_key_expired == 1 ) ) && !self::$thb_envato_hosted;
		
		if ( isset( $updater->skin->theme_info ) && $updater->skin->theme_info['Name'] == self::$thb_theme_name ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'werkstatt' ), admin_url( 'admin.php?page=thb-product-registration' ) ) );
			}
		}
		
		// VisualComposer
		if ( (isset( $updater->skin->plugin )) && ( $updater->skin->plugin == 'js_composer/js_composer.php') ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'werkstatt' ), admin_url( 'admin.php?page=thb-product-registration' ) ) );
			}
		}
		return $reply;
	}
	public function thb_plugins_install( $item ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		$installed_plugins = get_plugins();

		$item['sanitized_plugin'] = $item['name'];

		// WordPress Repository
		if ( ! $item['version'] ) {
			$item['version'] = TGM_Plugin_Activation::$instance->does_plugin_have_update( $item['slug'] );
		}

		// Install Link
		if ( ! isset( $installed_plugins[$item['file_path']] ) ) {
			$actions = array(
				'install' => sprintf(
					'<a href="%1$s" class="button" title="Install %2$s">Install Now</a>',
					esc_url( wp_nonce_url(
						add_query_arg(
							array(
								'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
								'plugin'        => urlencode( $item['slug'] ),
								'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
								'tgmpa-install' => 'install-plugin',
								'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' )
							),
							TGM_Plugin_Activation::$instance->get_tgmpa_url()
						),
						'tgmpa-install',
						'tgmpa-nonce'
					) ),
					$item['sanitized_plugin']
				),
			);
		}
		// Activate Link
		else if ( is_plugin_inactive( $item['file_path'] ) ) {
			$actions = array(
				'activate' => sprintf(
					'<a href="%1$s" class="button button-primary" title="Activate %2$s">Activate</a>',
					esc_url( add_query_arg(
						array(
							'plugin'               => urlencode( $item['slug'] ),
							'plugin_name'          => urlencode( $item['sanitized_plugin'] ),
							'thb-activate'       => 'activate-plugin',
							'thb-activate-nonce' => wp_create_nonce( 'thb-activate' ),
							'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' )
						),
						admin_url( 'admin.php?page=thb-plugins' )
					) ),
					$item['sanitized_plugin']
				),
			);
		}
		// Update Link
		
		else if ( version_compare( $installed_plugins[$item['file_path']]['Version'], $item['version'], '<' ) ) {
			$actions = array(
				'update' => sprintf(
					'<a href="%1$s" class="button button-update" title="Install %2$s"><span class="dashicons dashicons-update"></span> Update</a>',
					wp_nonce_url(
						add_query_arg(
							array(
								'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
								'plugin'        => urlencode( $item['slug'] ),
								'tgmpa-update'  => 'update-plugin',
								'version'       => urlencode( $item['version'] ),
								'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' )
							),
							TGM_Plugin_Activation::$instance->get_tgmpa_url()
						),
						'tgmpa-update',
						'tgmpa-nonce'
					),
					$item['sanitized_plugin']
				),
			);
		} else if ( is_plugin_active( $item['file_path'] ) ) {
			$actions = array(
				'deactivate' => sprintf(
					'<a href="%1$s" class="button" title="Deactivate %2$s">Deactivate</a>',
					esc_url( add_query_arg(
						array(
							'plugin'                 => urlencode( $item['slug'] ),
							'plugin_name'            => urlencode( $item['sanitized_plugin'] ),
							// 'plugin_source'          => urlencode( $item['source'] ),
							'thb-deactivate'       => 'deactivate-plugin',
							'thb-deactivate-nonce' => wp_create_nonce( 'thb-deactivate' ),
						),
						admin_url( 'admin.php?page=thb-plugins' )
					) ),
					$item['sanitized_plugin']
				),
			);
		}

		return $actions;
	}
	public function thb_theme_admin_init() {
	
		if ( isset( $_GET['thb-deactivate'] ) && $_GET['thb-deactivate'] == 'deactivate-plugin' ) {
			
			check_admin_referer( 'thb-deactivate', 'thb-deactivate-nonce' );

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugins = get_plugins();

			foreach ( $plugins as $plugin_name => $plugin ) {
				if ( $plugin['Name'] == $_GET['plugin_name'] ) {
						deactivate_plugins( $plugin_name );
				}
			}

		} 

		if ( isset( $_GET['thb-activate'] ) && $_GET['thb-activate'] == 'activate-plugin' ) {
			
			check_admin_referer( 'thb-activate', 'thb-activate-nonce' );

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugins = get_plugins();

			foreach ( $plugins as $plugin_name => $plugin ) {
				if ( $plugin['Name'] == $_GET['plugin_name'] ) {
					activate_plugin( $plugin_name );
				}
			}

		}

	}
	public function thb_activation_redirect() {
		if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			$werkstatt_installed = 'werkstatt_installed';
			
			if ( false == get_option( $werkstatt_installed, false ) ) {		
				update_option( $werkstatt_installed, true );
				wp_redirect( admin_url( 'admin.php?page=thb-product-registration' ) );
				die();
			} 
			
			delete_option( $werkstatt_installed );
		}
	}
	public function adminPageEnqueue() {
		wp_enqueue_script( 'thb-admin-meta', Thb_Theme_Admin::$thb_theme_directory_uri .'assets/js/admin-meta.min.js', array('jquery'), esc_attr(self::$thb_theme_version));
		wp_enqueue_style("thb-admin-css", Thb_Theme_Admin::$thb_theme_directory_uri . "assets/css/admin.css", null, esc_attr(self::$thb_theme_version));
		wp_enqueue_style( 'thb-admin-vs-css', Thb_Theme_Admin::$thb_theme_directory_uri . "assets/css/admin_vc.css", null, esc_attr(self::$thb_theme_version));
		
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_style( 'vc_extra_css', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/css/vc_extra.css' );
			wp_enqueue_script( 'thb-admin-vc', Thb_Theme_Admin::$thb_theme_directory_uri .'assets/js/admin-vc.min.js', array('jquery'), esc_attr(self::$thb_theme_version));
		}
	}
	public function adminSetupMenu() {
		
		// Product Registration
		add_menu_page( Thb_Theme_Admin::$thb_theme_name, Thb_Theme_Admin::$thb_theme_name, 'edit_theme_options', 'thb-product-registration', array( & $this, 'thb_Product_Registration' ), '', 3 );
		
		// Product Registration
		add_submenu_page( 'thb-product-registration', 'Registration', 'Registration', 'edit_theme_options', 'thb-product-registration', array( & $this, 'thb_Product_Registration' ) );
		
		// Main Menu Item
		add_submenu_page( 'thb-product-registration', 'Plugins', 'Plugins', 'edit_theme_options', 'thb-plugins', array( & $this, 'thb_Plugins' ) );

		// Demo Import
		add_submenu_page( 'thb-product-registration', 'Demo Import', 'Demo Import', 'edit_theme_options', 'thb-demo-import', array( & $this, 'thb_Demo_Import' ) );
		
		// Theme Options
		add_submenu_page( 'thb-product-registration', 'Theme Options', 'Theme Options', 'edit_theme_options', 'thb-theme-options', '__return_false' ); 
		
	}
	public function thb_Plugins() {
		get_template_part( 'inc/admin/welcome/pages/plugins' );
	}
	public function thb_Product_Registration() {
		get_template_part( 'inc/admin/welcome/pages/registration' );
	}
	public function thb_Demo_Import() {
		get_template_part( 'inc/admin/welcome/pages/demo-import' );
	}
	/**
	 *	Inintialize API
	 */
	public function dashboardUrl($type = null) {
		$url = 'https://my.fuelthemes.net';
		switch ( $type ) {
			case 'verify':
				$url .= '/api/verify';
				break;
			case 'version':
				$url .= '/api/version';
				break;
			case 'plugin/version':
				$url .= '/api/plugin/version';
				break;
		}
		return $url;
	}
}
// Main instance shortcut
function thb_Theme_Admin() {
	global $thb_Theme_Admin;
	return $thb_Theme_Admin;
}
Thb_Theme_Admin::instance();