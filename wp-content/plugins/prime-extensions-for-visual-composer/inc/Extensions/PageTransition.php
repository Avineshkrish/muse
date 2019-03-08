<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class PageTransition extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'page_transition' ) ) {
			return;
		}
		add_shortcode( 'prime_vc_pagetransition', array( $this, 'primeex_pagetransition_func' ) );

		$this->pagetransition();
	}

	public function pagetransition() {
		vc_map( array(
			"name"        => __( "Page Transition", 'vc_pagetransition_cq' ),
			"base"        => "prime_vc_pagetransition",
			"class"       => "wpb_cq_vc_extension_pagetransition",
			// "as_parent" => array('only' => 'cq_vc_pagetransition_item'),
			"icon"        => "prime_icon_pagetransaction",
			"category"    => __( 'Prime VC Extensions', 'js_composer' ),
			// "content_element" => false,
			// "show_settings_on_create" => false,
			'description' => __( 'Loading page with animation', 'js_composer' ),
			"params"      => array(

				array(
					"type"        => "textfield",
					"heading"     => __( "Specify the div class of the site wrapper:", "vc_pagetransition_cq" ),
					"param_name"  => "sitewrapper",
					"value"       => "",
					"description" => __( "Defautl we will consider first div of the page as site wrapper and hide it. But you can specify it here too.", "vc_pagetransition_cq" ),
				),

				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "vc_pagetransition_cq",
					"heading"     => __( "Display the animation in:", "vc_pagetransition_cq" ),
					"param_name"  => "animationmode",
					"value"       => array(
						__( "normal mode (animate the page only)", "vc_pagetransition_cq" )                           => "normal",
						__( "overlay mode (animate a solid background overlay of the page)", "vc_pagetransition_cq" ) => "overlay",
					),
					"description" => __( "", "vc_pagetransition_cq" ),
				),
				array(
					"type"        => "colorpicker",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __( "Overlay color", 'vc_pagetransition_cq' ),
					"param_name"  => "overlaycolor",
					"value"       => '',
					"dependency"  => Array( 'element' => "animationmode", 'value' => array( 'overlay' ) ),
					"description" => __( "", 'vc_pagetransition_cq' ),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "vc_pagetransition_cq",
					"heading"     => __( "Page in animation:", "vc_pagetransition_cq" ),
					"param_name"  => "pagein",
					"value"       => array(
						"fade-in",
						"fade-in-up-sm",
						"fade-in-up",
						"fade-in-up-lg",
						"fade-in-down-sm",
						"fade-in-down",
						"fade-in-down-lg",
						"fade-in-left-sm",
						"fade-in-left",
						"fade-in-left-lg",
						"fade-in-right-sm",
						"fade-in-right",
						"fade-in-right-lg",
						"rotate-in-sm",
						"rotate-in",
						"rotate-in-lg",
						"flip-in-x-fr",
						"flip-in-x",
						"flip-in-x-nr",
						"flip-in-y-fr",
						"flip-in-y",
						"flip-in-y-nr",
						"zoom-in-sm",
						"zoom-in",
						"zoom-in-lg",
					),
					"dependency"  => Array( 'element' => "animationmode", 'value' => array( 'normal' ) ),
					"description" => __( "", "vc_pagetransition_cq" ),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "vc_pagetransition_cq",
					"heading"     => __( "Page out animation:", "vc_pagetransition_cq" ),
					"param_name"  => "pageout",
					"value"       => array(
						"fade-out",
						"fade-out-up-sm",
						"fade-out-up",
						"fade-out-up-lg",
						"fade-out-down-sm",
						"fade-out-down",
						"fade-out-down-lg",
						"fade-out-left-sm",
						"fade-out-left",
						"fade-out-left-lg",
						"fade-out-right-sm",
						"fade-out-right",
						"fade-out-right-lg",
						"rotate-out-sm",
						"rotate-out",
						"rotate-out-lg",
						"flip-out-x-fr",
						"flip-out-x",
						"flip-out-x-nr",
						"flip-out-y-fr",
						"flip-out-y",
						"flip-out-y-nr",
						"zoom-out-sm",
						"zoom-out",
						"zoom-out-lg",
					),
					"dependency"  => Array( 'element' => "animationmode", 'value' => array( 'normal' ) ),
					"description" => __( "", "vc_pagetransition_cq" ),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "vc_pagetransition_cq",
					"heading"     => __( "Page in animation:", "vc_pagetransition_cq" ),
					"param_name"  => "overlayin",
					"value"       => array( "overlay-slide-in-top", "overlay-slide-in-bottom", "overlay-slide-in-left", "overlay-slide-in-right" ),
					"dependency"  => Array( 'element' => "animationmode", 'value' => array( 'overlay' ) ),
					"description" => __( "", "vc_pagetransition_cq" ),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "vc_pagetransition_cq",
					"heading"     => __( "Page out animation:", "vc_pagetransition_cq" ),
					"param_name"  => "overlayout",
					"value"       => array( "overlay-slide-out-top", "overlay-slide-out-bottom", "overlay-slide-out-left", "overlay-slide-out-right" ),
					"dependency"  => Array( 'element' => "animationmode", 'value' => array( 'overlay' ) ),
					"description" => __( "", "vc_pagetransition_cq" ),
				),

				array(
					'type'       => 'prime_slider',
					'heading'    => __( "Page in speed", "RD_vc" ),
					'param_name' => 'page_speed',
					'tooltip'    => __( 'Choose Page in Speed Here. For large numbers it\'s better use 1500.', 'team_vc' ),
					'min'        => 1000,
					'max'        => 10000,
					'step'       => 1,
					'value'      => 1500,
					//'unit'        => 'px',
				),

				array(
					'type'       => 'prime_slider',
					'heading'    => __( "Page speed out", "RD_vc" ),
					'param_name' => 'page_out_speed',
					'tooltip'    => __( 'Choose Page out Speed Here. For large numbers it\'s better use 800.', 'team_vc' ),
					'min'        => 700,
					'max'        => 3000,
					'step'       => 1,
					'value'      => 800,
					//'unit'        => 'px',
				),
				/*
				array(
				  "type" => "textarea",
				  "heading" => __("Apply page out animation to these links:", "vc_pagetransition_cq"),
				  "param_name" => "linkelement",
				  "value" => "",
				  "description" => __("The jQuery selector of the links, you can use tool like <a href='http://getfirebug.com/html' target='_blank'>FireBug</a> to inspect the element. Default is all links except the new window link and anchor link in current page. For example, <strong>li.menu-item > a</strong> will enable the page out animation only with the link in menu-item, <strong>a:not(.fluidbox):not(.lightbox-link)</strong> will will disable the page out animation in the lightbox image link.", "vc_pagetransition_cq")
				),
			  */
				array(
					"type"        => "prime_switch",
					"class"       => "",
					"heading"     => __( "Do not display the page transition temporarily?", "prime_vc" ),
					"param_name"  => "isdisplay",
					"value"       => "yes",
					"options"     => array(
						"on" => array(
							"label" => __( "", "prime_vc" ),
							"on"    => "Yes",
							"off"   => "No",
						),
					),
					"default_set" => true,
					"description" => "The page transition is available by default, you can check this to disable it temporarily.",
				),

				array(
					"type"             => "prime_param_heading",
					"text"             => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/vjM4s4G501g' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name"       => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group"            => "Video Tutorial",
				),

			),
		) );

	}


	function primeex_pagetransition_func( $atts, $content = null, $tag ) {
		if ( version_compare( WPB_VC_VERSION, "4.6" ) >= 0 ) {
			$atts = vc_map_get_attributes( $tag, $atts );
			extract( $atts );
		} else {
			extract( shortcode_atts( array(
				'animationmode'  => 'normal',
				'pagein'         => 'fade-in',
				'pageout'        => 'fade-out',
				'overlayin'      => 'overlay-slide-in-top',
				'overlayout'     => 'overlay-slide-out-top',
				'page_speed'     => '1500',
				'page_out_speed' => '800',
				'linkelement'    => '',
				'isdisplay'      => '',
				'sitewrapper'    => '',
				'overlaycolor'   => '',
			), $atts ) );
		}


		$i              = - 1;
		$content        = wpb_js_remove_wpautop( $content );
		$page_speed     = $atts['page_speed'] != '' ? (int) esc_attr( $atts['page_speed'] ) : 1500;
		$page_out_speed = $atts['page_out_speed'] != '' ? (int) esc_attr( $atts['page_out_speed'] ) : 800;
		!empty($linkelement) ? $linkelement : $linkelement = '';
		$output         = '';
		$isdisplay      = ( $isdisplay != 'on' ) ? 'yes' : 'no';
		if ( $isdisplay != "no" ) {

			$path = plugin_dir_url( dirname(__FILE__ , 2 ));

			//echo $path . 'assets/css/animsition.min.css'; exit();

			//wp_register_style( 'page-animation', $path . 'assets/css/animsition.min.css'  );
			//wp_enqueue_style( 'page-animation' );

			wp_register_script('page-animation-script', $path . 'assets/js/jquery.animsition.min.js', array("jquery"));
			wp_enqueue_script('page-animation-script');

			wp_register_script('prime-extensions-pagetransition-script', $path .'assets/js/init.min.js', array("jquery"));
			wp_enqueue_script('prime-extensions-pagetransition-script');

			$output .= '<div class="cq-animsition" data-animationmode="' . $animationmode . '" data-pagein="' . $pagein . '" data-pageout="' . $pageout . '" data-overlayin="' . $overlayin . '" data-overlayout="' . $overlayout . '" data-pageinspeed="' . $page_speed . '" data-pageoutspeed="' . $page_out_speed . '" data-linkelement="' . $linkelement . '" data-overlaycolor="' . $overlaycolor . '" data-sitewrapper="' . $sitewrapper . '">';
			$output .= '</div>';
		}

		return $output;

	}
}