<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class IconAnimation extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'icon_animation' ) ) {
			return;
		}
		add_shortcode( 'pr_iconanimation', array( $this, 'prime_iconanimation_shortcode_function' ) );
		$this->iconAnimation();
	}

	public function iconAnimation() {
		vc_map( array(
			"name"        => __( "Icon Animation", 'RD_vc' ),
			"base"        => "pr_iconanimation",
			"icon"        => "prime_faanimation",
			"category"    => 'Prime VC Extensions',
			'description' => 'Icon animation with Text',
			// 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
			"params"      => array(
				array(
					'type'        => 'iconpicker',
					'heading'     => __( 'Icon', 'js_composer' ),
					'param_name'  => 'icon_fontawesome',
					'value'       => 'fa fa-angellist', // default value to backend editor admin_label
					'settings'    => array(
						'emptyIcon'    => false,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),

				// Description Font Size Field
				array(
					'type'        => 'prime_slider',
					'heading'     => __( "Icon size", "RD_vc" ),
					'param_name'  => 'size',
					'tooltip'     => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'         => 1,
					'max'         => 15,
					'step'        => 1,
					'value'       => 2,
					'unit'        => 'em',
					"description" => __( "Select the icon size.. Default is 14em", "prime_vc" ),
					"group"       => "Settings",
				),
				array(
					"type"        => "textarea_html",
					"heading"     => __( "Content Here", "my-text-domain" ),
					"param_name"  => "content",
					"admin_label" => true,
					"value"       => __( "<span style='font-weight:bold;font-size:17px'>Here is the title</span><br />And here is some other text information, you can put <a href='https://codecans.com/plugins'>a link</a> too.", "my-text-domain" ),
					"description" => __( "Content Goes Here", "my-text-domain" ),
				),
				array(
					"type"        => "dropdown",
					"heading"     => __( "Icon animation", "RD_vc" ),
					"param_name"  => "animation",
					"description" => __( 'Select the icon animation.', 'RD_vc' ),
					"value"       => array(
						__( "wrench", "RD_vc" )       => 'wrench',
						__( "ring", "RD_vc" )         => 'ring',
						__( "vertical", "RD_vc" )     => 'vertical',
						__( "horizontal", "RD_vc" )   => 'horizontal',
						__( "flash", "RD_vc" )        => 'flash',
						__( "bounce", "RD_vc" )       => 'bounce',
						__( "spin fast", "RD_vc" )    => 'spin',
						__( "spin slow", "RD_vc" )    => 'spinslow',
						__( "float", "RD_vc" )        => 'float',
						__( "pulse", "RD_vc" )        => 'pulse',
						__( "shake", "RD_vc" )        => 'shake',
						__( "swing", "RD_vc" )        => 'swing',
						__( "tada", "RD_vc" )         => 'tada',
						__( "rubberBand", "RD_vc" )   => 'rubberBand',
						__( "wobble", "RD_vc" )       => 'wobble',
						__( "flip", "RD_vc" )         => 'flip',
						__( "no animation", "RD_vc" ) => '',
					),
					"group"       => "Settings",
				),
				array(
					"type"        => "colorpicker",
					"heading"     => __( "Icon color", "RD_vc" ),
					"param_name"  => "ico_color",
					"value"       => "#00BFFF",
					"description" => __( "Select color for the icon", "RD_vc" ),
					"group"       => "Settings",
				),
				array(
					"type"        => "dropdown",
					"heading"     => __( "Icon float:", "RD_vc" ),
					"param_name"  => "float",
					"description" => __( '', 'RD_vc' ),
					"value"       => array(
						__( "left", "RD_vc" )  => 'pull-left',
						__( "right", "RD_vc" ) => 'pull-right',
					),
					"group"       => "Settings",
				),
				array(
					"type"        => "textfield",
					"heading"     => __( "Extra class name for the icon", "RD_vc" ),
					"param_name"  => "icon_class",
					"description" => __( "You can append extra class to the icon, for example <strong>fa-rotate-90</strong> will rotate the icon 90 degree in some animation. <a href='http://fortawesome.github.io/Font-Awesome/examples/' target='_blank'>for more information</a>", "RD_vc" ),
				),
				array(
					"type"        => "textfield",
					"heading"     => __( "Extra class name for the text", "RD_vc" ),
					"param_name"  => "el_class",
					"description" => __( "If you wish to style the text differently, then use this field to add a class name and then refer to it in your css file.", "RD_vc" ),

				),
				array(
					"type"             => "prime_param_heading",
					"text"             => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/aegL2LZ-xys' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name"       => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group"            => "Video Tutorial",
				),

			),
		) );
	}

	function prime_iconanimation_shortcode_function( $atts, $content = null, $tag ) {
		extract( shortcode_atts( array(
			'float'            => 'left',
			'ico_color'        => '#00BFFF',
			'size'             => '2',
			'icon_fontawesome' => 'fa fa-angellist',
			'el_class'         => '',
			'icon_class'       => '',
			'animation'        => 'wrench',
			'isanimate'        => 'on',
		), $atts ) );
		$content = wpb_js_remove_wpautop( $content );

		$size = $atts['size'] != '' ? (int) esc_attr( $atts['size'] ) : 3;
		if ( $el_class != "" ) {
			$output = '<i style="color:' . $ico_color . '; font-size:' . $size . 'em;" id="icon_anime" class="anime ' . esc_attr( $icon_fontawesome ) . ' faa-' . $animation . ' ' . $icon_class . '"></i><div class="' . $el_class . '">' . $content . '</div>';
		} else {
			$output = '<i style="color:' . $ico_color . '; font-size:' . $size . 'em;" id="icon_anime" class="anime ' . esc_attr( $icon_fontawesome ) . ' faa-' . $animation . ' ' . $icon_class . '"></i>' . $content . '';
		}

		return $output;
	}
}