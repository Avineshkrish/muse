<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class InfoBox extends ExtensionsController {


	public function extensions_register() {
		if ( ! $this->activated( 'info_box' ) ) {
			return;
		}
		add_shortcode( 'pr_infobox', array( $this, 'prime_infobox_shortcode_function' ) );

		$this->infoBox();
	}

	public function infoBox() {
		vc_map( array(
			"name"        => __( "info Box", 'RD_vc' ),
			"base"        => "pr_infobox",
			"icon"        => "prime_iconflipbox",
			"category"    => 'Prime VC Extensions',
			'description' => 'Icon animation with Text',
			// 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
			"params"      => array(
				array(
					'type'        => 'iconpicker',
					'heading'     => __( 'Icon', 'js_composer' ),
					'param_name'  => 'icon_fontawesome',
					'value'       => 'fa fa-adjust', // default value to backend editor admin_label
					'settings'    => array(
						'emptyIcon'    => false,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					"type"        => "textfield",
					/*"holder" => "div",*/
					"class"       => "",
					"heading"     => __( "Title", 'ultimate_vc' ),
					"param_name"  => "title",
					"admin_label" => true,
					"value"       => "Title Here",
					/*"description" => __("Provide the title for the iHover.", 'ultimate')*/
				),
				array(
					"type"        => "textarea",
					/*"holder" => "div",*/
					"class"       => "",
					"heading"     => __( "Description", 'ultimate_vc' ),
					"param_name"  => "descr",
					"admin_label" => true,
					"value"       => "Description Goes Here",
					/*"description" => __("Provide the title for the iHover.", 'ultimate')*/
				),
				array(
					"type"        => "prime_switch",
					"heading"     => __( "External Link?  <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'> PRO Feature</a>", "prime_vc" ),
					"param_name"  => "ext_link",
					'value' => array(__('Link', 'prime_vc') => 'off'),
					"options"     => array(
						"on" => array(
							"label" => __( "", "prime_vc" ),
							"on"    => "Yes",
							"off"   => "No",
						),
					),
					"default_set" => false,
					"description" => "Switch Yes If you want Add A External Link In Infobox items.",
				),
				// Link Field
				array(
					"type"        => "vc_link",
					"heading"     => __( "External Link <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'> PRO Feature</a>", 'prime_vc' ),
					"param_name"  => "link",
					"description" => __( "Provide the Info Box link here.", 'prime_vc' ),
					"dependency" => array('element' => 'ext_link', 'value' => 'on'),
				),
				array(
					"type" => "prime_param_heading",
					"text" => "<span style='display: block;'><a href='https://youtu.be/3AbuIWYvjBo' target='_blank'>".__("Watch Video Tutorial","prime_vc")." &nbsp; <span class='dashicons dashicons-video-alt3' style='font-size:30px;vertical-align: middle;color: #e52d27;'></span></a></span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
				),

				// TItle Font Size Field
				array(
					'type'             => 'prime_slider',
					'heading'          => __( 'Title Font Size', 'prime_vc' ),
					'param_name'       => 'title_f_size',
					'tooltip'          => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'              => 1,
					'max'              => 100,
					'step'             => 1,
					'value'            => 18,
					'unit'             => 'px',
					"description" => __("Chose Title Font Size as Pixel. Default is 18px", "prime_vc"),
					"group" => "Typography"
				),
				// Description Font Size Field
				array(
					'type'             => 'prime_slider',
					'heading'          => __( 'Description Font Size', 'prime_vc' ),
					'param_name'       => 'descr_f_size',
					'tooltip'          => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'              => 1,
					'max'              => 100,
					'step'             => 1,
					'value'            => 14,
					'unit'             => 'px',
					"description" => __("Chose Description Font Size as Pixel. Default is 14px", "prime_vc"),
					"group" => "Typography"
				),
				// Background Color
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Icon color", "my-text-domain" ),
					"param_name"  => "icon_color",
					"value"       => '#FFFFFF', //Default White color
					"description" => __( "Choose text color", "my-text-domain" ),
					"group"       => "Typography"
				),
				// Background Color
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Icon Background color", "my-text-domain" ),
					"param_name"  => "icon_bg_color",
					"value"       => '#16a085', //Default Red color
					"description" => __( "Choose text color", "my-text-domain" ),
					"group"       => "Typography"
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Title Background color", "my-text-domain" ),
					"param_name"  => "title_color",
					"description" => __( "Choose text color", "my-text-domain" ),
					"group"       => "Typography"
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Description color", "my-text-domain" ),
					"param_name"  => "descr_color",
					"description" => __( "Choose text color", "my-text-domain" ),
					"group"       => "Typography"
				),
				array(
					"type" => "prime_param_heading",
					"text" => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/3AbuIWYvjBo' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group" => "Video Tutorial"
				),

			)
		) );
	}


	function prime_infobox_shortcode_function( $atts, $content = null, $tag ) {
		extract( shortcode_atts( array(
			'icon_bg_color'    => '#16a085',
			'icon_color'       => '',
			'icon'             => '',
			'title'           => 'Title Here',
			'descr'            => 'Description Goes Here',
			'icon_fontawesome' => 'fa fa-heart',
			'bg_color'         => '',
			'title_f_size'     => '18',
			'descr_f_size'     => '14',
			'title_color'      => '',
			'descr_color'      => ''
		), $atts ) );

		$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
		$title_f_size   = $atts[ 'title_f_size' ] != '' ? (int) esc_attr( $atts[ 'title_f_size' ] ) : 18;
		$descr_f_size   = $atts[ 'descr_f_size' ] != '' ? (int) esc_attr( $atts[ 'descr_f_size' ] ) : 14;
		// $output = 'This is Info box '.esc_attr($icon_fontawesome).'';
		$output = '<div class="infobox">
					<div class="four nospace-left">
					    <div id="infobox-1" class="infobox-1">
							<div class="infobox-holder">
                                <div class="dt-zoom-animation">							
									<i style="background-color:' . $icon_bg_color . ';color:' . $icon_color . ';" class="' . esc_attr( $icon_fontawesome ) . '"></i>
									<h4 style="color:' . $title_color . ';  font-size:' . $title_f_size . 'px;">' . $title . '</h4>
									<p style="color:' . $descr_color . '; font-size:' . $descr_f_size . 'px;">' . $descr . '</p>
								</div>
							</div>
						</div>
					</div>
				</div>';
		$output .= '<style type="text/css">         
					.infobox .infobox-holder .dt-zoom-animation i:after {
						box-shadow:0 0 0 4px ' . $icon_bg_color . ';
					}
			</style>';

		return $output;
	}
}