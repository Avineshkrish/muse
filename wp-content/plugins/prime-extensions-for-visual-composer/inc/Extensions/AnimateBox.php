<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class AnimateBox extends ExtensionsController {

	public function extensions_register() {

		if ( ! $this->activated( 'animate_box' ) ) {
			return;
		}
		add_shortcode( 'pr_animatebox', array( $this, 'AnimateBox_ShortCode' ) );
		$this->animateBox();
	}

	public function animateBox() {
		vc_map( array(
			"name"        => __( "Animate Box", 'RD_vc' ),
			"base"        => "pr_animatebox",
			"icon"        => "prime_iconimageaccordion",
			"category"    => 'Prime VC Extensions',
			'description' => 'Icon animation with Text',
			"params"      => array(
				// Image Field
				array(
					"type"        => "attach_image",
					"heading"     => __( "Upload Image", "RD_vc" ),
					"param_name"  => "images",
					"value"       => "",
					"description" => __( "Select image from media library.", "RD_vc" ),
				),
				array(
					"type"        => "textfield",
					/*"holder" => "div",*/
					"class"       => "",
					"heading"     => __( "Title", 'RD_vc' ),
					"param_name"  => "title",
					"admin_label" => true,
					"value"       => "Title Goes Here",
					"description" => __( "Provide the title for the Animate Box.", 'prime' ),
				),
				array(
					"type"        => "textarea",
					/*"holder" => "div",*/
					"class"       => "",
					"heading"     => __( "Description", 'RD_vc' ),
					"param_name"  => "descript",
					"admin_label" => true,
					"value"       => "Description Goes Here",
					"description" => __( "Provide the Description for the Animate Box.", 'prime' ),
				),
				array(
					"type"        => "prime_switch",
					"heading"     => __( "External Link?  <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'> PRO Feature</a>", "prime_vc" ),
					"param_name"  => "ext_link",
					'value'       => array( __( 'Link', 'prime_vc' ) => 'off' ),
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
					"dependency"  => array( 'element' => 'ext_link', 'value' => 'on' ),
				),

				// TItle Font Size Field
				array(
					'type'        => 'prime_slider',
					'heading'     => __( 'Title Font Size', 'prime_vc' ),
					'param_name'  => 'title_f_size',
					'tooltip'     => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'         => 1,
					'max'         => 100,
					'step'        => 1,
					'value'       => 18,
					'unit'        => 'px',
					"description" => __( "Chose Title Font Size as Pixel. Default is 18px", "prime_vc" ),
					"group"       => "Typography",
				),
				// Description Font Size Field
				array(
					'type'        => 'prime_slider',
					'heading'     => __( 'Description Font Size', 'prime_vc' ),
					'param_name'  => 'descr_f_size',
					'tooltip'     => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'         => 1,
					'max'         => 100,
					'step'        => 1,
					'value'       => 14,
					'unit'        => 'px',
					"description" => __( "Chose Description Font Size as Pixel. Default is 14px", "prime_vc" ),
					"group"       => "Typography",
				),
				// Background Hover Color
				array(
					"type"             => "colorpicker",
					"edit_field_class" => "vc_col-xs-6 vc_column",
					"class"            => "",
					"heading"          => __( "Background color", "prime_vc" ),
					"param_name"       => "bg_color",
					"value"            => '#bdc3c7', //Default Red color
					"description"      => __( "Choose Background color", "prime_vc" ),
					"group"            => "Typography",
				),
				// Background Hover Color
				array(
					"type"             => "colorpicker",
					"edit_field_class" => "vc_col-xs-6 vc_column",
					"class"            => "",
					"heading"          => __( "Background Hover color", "prime_vc" ),
					"param_name"       => "bg_hov_color",
					"value"            => '#bdc3c7', //Default Red color
					"description"      => __( "Choose Background Hover color", "prime_vc" ),
					"group"            => "Typography",
				),
				array(
					"type"             => "colorpicker",
					"edit_field_class" => "vc_col-xs-6 vc_column",
					"heading"          => __( "Title color", "prime_vc" ),
					"param_name"       => "title_color",
					"description"      => __( "Choose text color", "prime_vc" ),
					"group"            => "Typography",
					"value"            => '#000000',
				),
				array(
					"type"             => "colorpicker",
					"edit_field_class" => "vc_col-xs-6 vc_column",
					"heading"          => __( "Title Hover color", "prime_vc" ),
					"param_name"       => "title_hover_color",
					"description"      => __( "Choose text color", "prime_vc" ),
					"group"            => "Typography",
					"value"            => '#000000',
				),
				array(
					"type"             => "colorpicker",
					"edit_field_class" => "vc_col-xs-6 vc_column",
					"heading"          => __( "Description color", "prime_vc" ),
					"param_name"       => "descr_color",
					"description"      => __( "Choose text color", "prime_vc" ),
					"group"            => "Typography",
				),
				array(
					"type"             => "colorpicker",
					"edit_field_class" => "vc_col-xs-6 vc_column",
					"heading"          => __( "Description Hover color", "prime_vc" ),
					"param_name"       => "descr_hover_color",
					"description"      => __( "Choose text color", "prime_vc" ),
					"group"            => "Typography",
				),

				array(
					"type"             => "prime_param_heading",
					"text"             => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/DozAaEKNVII' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name"       => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group"            => "Video Tutorial",
				),

			),
		) );
	}

	public function AnimateBox_ShortCode( $atts, $content = null, $tag ) {
		extract( shortcode_atts( array(
			'images'       => '',
			'title'        => 'Title Goes Here',
			'descript'     => 'Description Goes Here',
			'bg_color'     => '#F5F6F7',
			'bg_hov_color'       => '#bdc3c7',
			'title_f_size' => '18',
			'descr_f_size' => '14',
			'title_color'        => '#000000',
			'title_hover_color'  => '#FFFFFF',
			'descr_color'        => '#000000',
			'descr_hover_color'  => '#FFFFFF',


		), $atts ) );
		//$link         = vc_build_link( $link );
		$content      = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
		$images       = wp_get_attachment_image_src( $images, 'full' );
		$title_f_size = isset( $atts['title_f_size'] ) != '' ? (int) esc_attr( $atts['title_f_size'] ) : 18;
		$descr_f_size = isset( $atts['descr_f_size'] ) != '' ? (int) esc_attr( $atts['descr_f_size'] ) : 14;

		// StoreAnimateID
		$animatebox_id     = uniqid( 'abid' );
		$anbox_title_color = uniqid( 'abtc' );
		$anbox_desc_color  = uniqid( 'abdc' );
		$output            = "";

		$output = "";

		$output .= '<style type="text/css">
			.homeBox #' . $anbox_title_color . '{
				color:' . $title_color . ';
			}
			.homeBox:hover #' . $anbox_title_color . '{
				color:' . $title_hover_color . ';
			}
			
			.homeBox #' . $anbox_desc_color . '{
				color:' . $descr_color . ';
			}
			.homeBox:hover #' . $anbox_desc_color . '{
				color:' . $descr_hover_color . ';
			}
			
            .homeBox .' . $animatebox_id . '{
                background:' . $bg_color . ';
            }
            .homeBox .' . $animatebox_id . ':hover{
                background:' . $bg_hov_color . ';
            }
            </style>';

		$output .= '<div class="homeBox">
			<div class="one_fourth ' . $animatebox_id . '">
            <div class = "boxImage"><img style="border-radius:0;" src = "' . $images[0] . '"></div>
            <h2 id="' . $anbox_title_color . '" style="font-size:' . $title_f_size . 'px;">' . strtoupper( $title ) . '</h2>	
            <div class = "boxDescription">
            <p id="' . $anbox_desc_color . '" style="font-size:' . $descr_f_size . 'px;">' . $descript . '</p>
            </div>	
        </div> 
    </div>';

		return $output;
	}

}