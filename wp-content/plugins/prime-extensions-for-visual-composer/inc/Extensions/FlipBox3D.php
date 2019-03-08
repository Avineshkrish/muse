<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class FlipBox3D extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( '3d_flipbox' ) ) {
			return;
		}
		add_shortcode( 'prime_flipbox', array( $this, 'prime_flipbox_shortcode_function' ) );
		$this->flipBox3D();
	}

	public function flipBox3D() {
		vc_map( array(
			"name"     => __( "3D Flip Box", 'prime' ),
			"base"     => "prime_flipbox",
			"icon"     => "prime_flipbox",
			"category" => __( 'Prime VC Extensions', 'js_composer' ),
			//'description' => __('Info text box', 'js_composer'),
			"params"   => array(


				array(
					"type"        => "textfield",
					"class"       => "",
					"heading"     => __( "Title", 'prime' ),
					"param_name"  => "title",
					"admin_label" => true,
					"value"       => "",
					'dependency'  => array(
						'element' => 'display_as',
						'value'   => 'content',
					),
					"group"       => "Front Part",

				),
				array(
					"type"        => "textarea",
					"class"       => "",
					"heading"     => __( "Description", "prime" ),
					"param_name"  => "front_desc",
					"value"       => "",
					"description" => __( "Provide the description for the front.", "prime" ),
					'dependency'  => array(
						'element' => 'display_as',
						'value'   => 'content',
					),
					"group"       => "Front Part",
				),

				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Display as:', 'prime' ),
					'param_name' => 'display_as',
					"value"      => array(
						"Content" => "content",
						"Image"   => "image",
					),
					"std"        => "content",
					"group"      => "Front Part",
				),
				array(
					"type"        => "attach_image",
					"heading"     => __( "Image", "prime" ),
					"param_name"  => "front_image",
					"value"       => "",
					"dependency"  => array( 'element' => "display_as", 'value' => 'image' ),
					"description" => __( "Select image from media library.", "prime" ),
					"group"       => "Front Part",
				),


				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Display Icon:', 'prime' ),
					'param_name' => 'display_icon',
					"value"      => array(
						"Icon"    => "icon",
						"No Icon" => "noicon",
					),
					"std"        => "noicon",
					'dependency' => array(
						'element' => 'display_as',
						'value'   => 'content',
					),
					"group"      => "Front Part",
				),
				array(
					'type'        => 'iconpicker',
					'heading'     => __( 'Icon', 'js_composer' ),
					'param_name'  => 'icon_fontawesome',
					'value'       => '', // default value to backend editor admin_label
					'settings'    => array(
						'emptyIcon'    => false, // default true, display an "EMPTY" icon?
						'iconsPerPage' => 100, // default 100, how many icons per/page to display, we use (big prime_slider) to display all icons in single page
					),
					'dependency'  => array(
						'element' => 'display_icon',
						'value'   => 'icon',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
					"group"       => "Front Part",
				),

				array(
					"type"        => "prime_slider",
					"class"       => "",
					"heading"     => __( "Icon Size", "prime" ),
					"param_name"  => "icon_size",
					"value"       => 20,
					"min"         => 16,
					"max"         => 100,
					"step"        => 1,
					"unit"        => "px",
					"description" => __( "Provide icon size", "prime" ),
					'dependency'  => array(
						'element' => 'display_icon',
						'value'   => 'icon',
					),
					"group"       => "Front Part",
				),

				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Icon Color", "prime" ),
					"param_name"  => "icon_color",
					"value"       => "#343434",
					"description" => __( "Choose icon color", "prime" ),
					'dependency'  => array(
						'element' => 'display_icon',
						'value'   => 'icon',
					),
					"group"       => "Front Part",
				),
				array(
					'type'        => 'prime_slider',
					'heading'     => __( 'Title Font Size', 'prime' ),
					'param_name'  => 'title_f_size',
					"value"       => 18,
					"min"         => 10,
					"max"         => 50,
					"step"        => 1,
					"unit"        => "px",
					"description" => __( "Chose Title Font Size as Pixel. Default is 18px", "prime" ),
					'dependency'  => array(
						'element' => 'display_as',
						'value'   => 'content',
					),
					"group"       => "Front Part",
				),
				// Description Font Size Field
				array(
					'type'        => 'prime_slider',
					'heading'     => __( 'Description Font Size', 'prime' ),
					'param_name'  => 'desc_f_size',
					"value"       => 14,
					"min"         => 10,
					"max"         => 50,
					"step"        => 1,
					"unit"        => "px",
					"description" => __( "Chose Description Font Size as Pixel. Default is 14px", "prime" ),
					'dependency'  => array(
						'element' => 'display_as',
						'value'   => 'content',
					),
					"group"       => "Front Part",
				),

				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Box Background color", "prime" ),
					"param_name"  => "front_box_color",
					"description" => __( "Choose flipbox color", "prime" ),
					"group"       => "Front Part",
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Title color", "prime" ),
					"param_name"  => "title_color",
					"description" => __( "Choose text color", "prime" ),
					'dependency'  => array(
						'element' => 'display_as',
						'value'   => 'content',
					),
					"group"       => "Front Part",
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Description color", "prime" ),
					"param_name"  => "descr_color",
					"description" => __( "Choose text color", "prime" ),
					'dependency'  => array(
						'element' => 'display_as',
						'value'   => 'content',
					),
					"group"       => "Front Part",
				),

				/////////// BACK PART START ///////////
				/// ///////////////////////////////////


				array(
					"type"        => "textfield",
					"class"       => "",
					"heading"     => __( "Title", 'prime' ),
					"param_name"  => "back_title",
					"admin_label" => true,
					"value"       => "",
					"description" => __( "leave empty if you don't want.", "prime" ),
					'dependency'  => array(
						'element' => 'back_display_as',
						'value'   => 'content',
					),
					"group"       => "Back Part",
				),
				array(
					"type"        => "textarea",
					"class"       => "",
					"heading"     => __( "Description", "prime" ),
					"param_name"  => "back_desc",
					"value"       => "",
					"description" => __( "Provide the description for the back.", "prime" ),
					'dependency'  => array(
						'element' => 'back_display_as',
						'value'   => 'content',
					),
					"group"       => "Back Part",
				),

				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Display as:', 'prime' ),
					'param_name' => 'back_display_as',
					"value"      => array(
						"Content" => "content",
						"Image"   => "image",
					),
					"std"        => "content",
					"group"      => "Back Part",
				),
				array(
					"type"        => "attach_image",
					"heading"     => __( "Image", "prime" ),
					"param_name"  => "back_image",
					"value"       => "",
					"dependency"  => array( 'element' => "back_display_as", 'value' => 'image' ),
					"description" => __( "Select image from media library.", "prime" ),
					"group"       => "Back Part",
				),


				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Display Icon:', 'prime' ),
					'param_name' => 'display_back_icon',
					"value"      => array(
						"Icon"    => "icon",
						"No Icon" => "noicon",
					),
					"std"        => "noicon",
					'dependency' => array(
						'element' => 'display_as',
						'value'   => 'content',
					),
					"group"      => "Back Part",
				),
				array(
					'type'        => 'iconpicker',
					'heading'     => __( 'Icon', 'js_composer' ),
					'param_name'  => 'icon_fontawesome_back',
					'value'       => '', // default value to backend editor admin_label
					'settings'    => array(
						'emptyIcon'    => false, // default true, display an "EMPTY" icon?
						'iconsPerPage' => 100, // default 100, how many icons per/page to display, we use (big prime_slider) to display all icons in single page
					),
					'dependency'  => array(
						'element' => 'display_back_icon',
						'value'   => 'icon',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
					"group"       => "Back Part",
				),

				array(
					"type"        => "prime_slider",
					"class"       => "",
					"heading"     => __( "Icon Size", "prime" ),
					"param_name"  => "icon_size_back",
					"value"       => 20,
					"min"         => 16,
					"max"         => 100,
					"step"        => 1,
					"unit"        => "px",
					"description" => __( "Provide icon size", "prime" ),
					'dependency'  => array(
						'element' => 'display_back_icon',
						'value'   => 'icon',
					),
					"group"       => "Back Part",
				),

				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Icon Color", "prime" ),
					"param_name"  => "icon_color_back",
					"value"       => "#343434",
					"description" => __( "Choose icon color", "prime" ),
					'dependency'  => array(
						'element' => 'display_back_icon',
						'value'   => 'icon',
					),
					"group"       => "Back Part",
				),

				array(
					'type'        => 'prime_slider',
					'heading'     => __( 'Title Font Size', 'prime' ),
					'param_name'  => 'back_title_f_size',
					"value"       => 18,
					"min"         => 10,
					"max"         => 50,
					"step"        => 1,
					"unit"        => "px",
					"description" => __( "Chose Title Font Size as Pixel. Default is 18px", "prime" ),
					'dependency'  => array(
						'element' => 'back_display_as',
						'value'   => 'content',
					),
					"group"       => "Back Part",
				),
				// Description Font Size Field
				array(
					'type'        => 'prime_slider',
					'heading'     => __( 'Description Font Size', 'prime' ),
					'param_name'  => 'back_desc_f_size',
					"value"       => 14,
					"min"         => 10,
					"max"         => 50,
					"step"        => 1,
					"unit"        => "px",
					"description" => __( "Chose Description Font Size as Pixel. Default is 14px", "prime" ),
					'dependency'  => array(
						'element' => 'back_display_as',
						'value'   => 'content',
					),
					"group"       => "Back Part",
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Box Background color", "prime_vc" ),
					"param_name"  => "back_box_color",
					"description" => __( "Choose flipbox color", "prime_vc" ),
					'dependency'  => array(
						'element' => 'back_display_as',
						'value'   => 'content',
					),
					"group"       => "Back Part",
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Title color", "prime_vc" ),
					"param_name"  => "back_title_color",
					"description" => __( "Choose text color", "prime_vc" ),
					'dependency'  => array(
						'element' => 'back_display_as',
						'value'   => 'content',
					),
					"group"       => "Back Part",
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Description color", "prime_vc" ),
					"param_name"  => "back_descr_color",
					"description" => __( "Choose text color", "prime_vc" ),
					'dependency'  => array(
						'element' => 'back_display_as',
						'value'   => 'content',
					),
					"group"       => "Back Part",
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Direction: (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro To Unlock All Extensions Full Feature</a>", "prime"),
					"param_name" => "ddd_direction",
					"value" => array(
						__("Verticle","prime") => "flip-up",
						__("Horizontal","prime") => "alternative",
					),
					"group" => "Settings",
					"std" => "",
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("On Click: (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro To Unlock All Extensions Full Feature</a>", "prime"),
					"param_name" => "on_click",
					"value" => array(
						__("No Link","prime") => "none",
						__("External Link","prime") => "box",
					),
					"group" => "Settings"
				),

				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => __( "Add Link", "prime_vc" ),
					"param_name"  => "link",
					"value"       => "",
					"description" => __( "Add a custom link or select existing page. You can remove existing link as well.", "prime" ),
					'dependency'  => array(
						'element' => 'on_click',
						'value'   => 'box',
					),
					"group"       => "Settings",
				),


				array(
					"type"        => "textfield",
					"heading"     => __( "Extra class name", "prime" ),
					"param_name"  => "extraclass",
					"value"       => "",
					"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "prime" ),
					"group"       => "Settings",
				),
				array(
					"type"             => "prime_param_heading",
					"text"             => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/pML_R7SED8g' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name"       => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group"            => "Video Tutorial",
				),
			),
		) );
	}


	function prime_flipbox_shortcode_function( $atts, $content = null, $tag ) {
		extract( shortcode_atts( array(
			//'ddd_direction'         => 'flip-up',
			'display_as'            => '',
			'front_image'           => '',
			'display_icon'          => 'noicon',
			'display_back_icon'     => 'noicon',
			'icon_fontawesome'      => '',
			'icon_fontawesome_back' => '',
			'front_box_color'       => '#789e13',
			'back_box_color'        => '#9bcc18',
			'icon_size'             => '',
			'icon_size_back'        => '',
			'icon_color'            => '#fff',
			'icon_color_back'       => '#fff',
			'title'                 => '',
			'front_desc'            => '',
			'title_f_size'          => '',
			'desc_f_size'           => '',
			'title_color'           => '',
			'descr_color'           => '',
			'back_display_as'       => '',
			'back_image'            => '',
			'back_title'            => '',
			'back_desc'             => '',
			'back_title_f_size'     => '',
			'back_desc_f_size'      => '',
			'back_title_color'      => '',
			'back_descr_color'      => '',
			'on_click'              => '',
			//'link'                  => '',
			'css_flip_box'          => '',
			'extraclass'            => '',

		), $atts ) );


		$content     = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
		$front_image = wp_get_attachment_image_src( $front_image, 'full' );
		$back_image  = wp_get_attachment_image_src( $back_image, 'full' );

		$output = '';

		$front_icon = uniqid( 'ficon' );
		$back_icon  = uniqid( 'bicon' );


		if ( $on_click == 'box' ) {
			$output .= '<a class="href" href="#" title="" target="">';
		}

		$output .= '<div class="prime-flip-box flip-up ' . $extraclass . '">';

		$output .= '<div class="object">
                    <div class="front" style="background-color:' . $front_box_color . ' ">';

		if ( $display_as !== 'image' ) {

			$output .= '<div class="flip-content ' . $front_icon . '">
                                <h3 style="font-size:' . $title_f_size . 'px; color:' . $title_color . '; ">
                                <i class="' . $icon_fontawesome . '" style="font-size:' . $icon_size . 'px; color:' . $icon_color . '; padding-right: 5px;"></i>
                                ' . $title . '
                                </h3>
                                <p style="font-size:' . $desc_f_size . 'px; color:' . $descr_color . '; ">' . $front_desc . '</p>
                            </div>';
		} else {
			$output .= '<img width="300" height="200" src="' . $front_image[0] . '">';
		}


		$output .= '</div>';

		$output .= '<div class="back" style="background-color:' . $back_box_color . ' ">';


		if ( $back_display_as !== 'image' ) {
			$output .= '<div class="flip-content ' . $back_icon . '">
                                <h3 style="font-size:' . $back_title_f_size . 'px; color:' . $back_title_color . ';">
                                <i class="' . $icon_fontawesome_back . '" style="font-size:' . $icon_size_back . 'px; color:' . $icon_color_back . '; padding-right: 5px;"></i>
                                ' . $back_title . '
                                
                                </h3>
                                
                                <p style="font-size:' . $back_desc_f_size . 'px; color:' . $back_descr_color . ';">' . $back_desc . '</p>
                            </div>';
		} else {
			$output .= '<img width="300" height="200" src="' . $back_image[0] . '">';
		}

		$output .= '</div>';

		$output .= '<div class="flank" style="background-color:' . $front_box_color . ' "></div>';

		$output .= '</div>
                                </div>';

		if ( $on_click == 'box' ) {
			$output .= '</a>';
		}

		if ( $icon_fontawesome == '' ) {
			$output .= '<style>
                            .prime-flip-box .'.$front_icon.' h3 i {
                                display: none !important;
                            }
                        </style>';
		}
		if ( $icon_fontawesome_back == '' ) {
			$output .= '<style>
                            .prime-flip-box .'.$back_icon.' h3 i {
                                display: none !important;
                            }
                        </style>';
		}


		return $output;
	}
}