<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Base;

class BaseController {
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	public $shortcodes = array();


	//For PHP Lower Version - Get Path
	public function cstm_dirname( $path, $count = 1 ) {
		if ( $count > 1 ) {
			return dirname( $this->cstm_dirname( $path, -- $count ) );
		} else {
			return dirname( $path );
		}
	}

	public function __construct() {
		$this->plugin_path = plugin_dir_path( $this->cstm_dirname( __FILE__, 2 ) );
		$this->plugin_url  = plugin_dir_url( $this->cstm_dirname( __FILE__, 2 ) );
		$this->plugin      = plugin_basename( $this->cstm_dirname( __FILE__, 3 ) ) . '/prime-extensions-vc-pro.php';

		/*-----------------------------------------------------------------------------------*/
		/*	Initalising Shortcodes In Content and Widget
		/*-----------------------------------------------------------------------------------*/
		add_filter( 'widget_text', 'do_shortcode' );
		add_filter( 'the_content', 'do_shortcode' );
		add_filter( 'the_excerpt', 'do_shortcode' );


		$this->shortcodes = array(
			'icon_animation'      => 'Icon Animation',
			'animate_box'         => 'Animate Box',
			'info_box'            => 'Info Box',
			'separator'        => 'Separator',
			'3d_flipbox'          => '3D Flip Box',
			'modal'               => 'Modal',
			'accordion'           => 'Accordion ',
			'testimonial'         => 'Testimonial',
			'csstooltips'         => 'CSS3 Tooltips',
			'pricing_table'       => 'Pricing Table',
			'before_after'        => 'Before After',
			'content_block'       => 'Content Block',
			'hover_effects'       => 'Hover Effects',
			'page_transition'     => 'Page Transition',
			'prime_modal'         => 'Prime Modal',
			'scroll_notification' => 'Scroll notification ',
			'masonry_gallery'     => 'Masonry Gallery',
			'prime_tab'           => 'Prime TAB',
			'team_member'         => 'Team Member ',
			'zoom_magnifier'      => 'Zoom Magnifier',
			'video_gallery'       => 'Video Gallery',
			'shadow_box'          => 'Shadow Box ',
			'image_hotspot'       => 'Image Hotspot',
			'profile_card'        => 'Profile Card',
			'timeline'            => 'TimeLine',
			'undoredo'        => 'Undo & Redo',
		);
	}
}