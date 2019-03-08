<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;


use Inc\Base\ExtensionsController;

class Modal extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'modal' ) ) {
			return;
		}
		add_shortcode( 'pr_modal', array( $this, 'prime_model_shortcode_function' ));

		$this->modal();
	}

	public function modal() {
		vc_map( array(
			"name"        => __( "Modal", 'RD_vc' ),
			"base"        => "pr_modal",
			"icon"        => "prime_icondepthmodal",
			"category"    => 'Prime VC Extensions',
			'description' => 'Icon animation with Text',
			// 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
			"params"      => array(

				array(
					"type"        => "textfield",
					/*"holder" => "div",*/
					"class"       => "",
					"heading"     => __( "Modal Button Name", 'ultimate_vc' ),
					"param_name"  => "b_text",
					"admin_label" => true,
					"value"       => "Open Modal Click Here",
					"description" => __( "This is Button name of Modal.", 'prime_extension' )
				),

				array(
					"type"        => "textfield",
					/*"holder" => "div",*/
					"class"       => "",
					"heading"     => __( "Modal Box Title", 'ultimate_vc' ),
					"param_name"  => "mod_title",
					"admin_label" => true,
					"value"       => "Title Here",
					"description" => __( "write Title For Modal Box.", 'prime_extension' )
				),

				array(
					"type"        => "textarea_html",
					/*"holder" => "div",*/
					"class"       => "",
					"heading"     => __( "Modal Box Description", 'ultimate_vc' ),
					"param_name"  => "content",
					"admin_label" => true,
					"description" => __( "Description of the Modal Box.", 'ultimate' ),
					"value"       => "<span style='font-weight:bold;font-size:17px'>Here is the title</span><br />And here is some other text information, you can put <a href='http://codecans.com/items'>a link</a> too.",
				),

				array(
					"type"        => "dropdown",
					"heading"     => __( "Animation" ),
					"param_name"  => "modal_animation",
					"admin_label" => true,
					"value"       => array(
						'Flip'  => 'flip',
						'Left'  => 'slide-left',
						'Right' => 'slide-right',
						'Scale' => 'scale',
						'Fade'  => 'fade',
					),
					'description' => 'Select Modal Box Animation here, Default animation is Flip '
				),
				array(
					"type"        => "dropdown",
					"heading"     => __( "Button Position" ),
					"param_name"  => "modal_position",
					"admin_label" => true,
					"value"       => array(
						'Centre' => 'center',
						'Left'  => 'left',
						'Right'  => 'right',

					),
					'description' => 'Select Modal Box Animation here, Default animation is Flip '
				),

				array(
					"type" => "prime_param_heading",
					"text" => "<span style='display: block;'><a href='https://youtu.be/W9dOrkzF6G4' target='_blank'>".__("Watch Video Tutorial","prime_vc")." &nbsp; <span class='dashicons dashicons-video-alt3' style='font-size:30px;vertical-align: middle;color: #e52d27;'></span></a></span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
				),
				// Button Font Size Field
				array(
					'type'             => 'prime_slider',
					'heading'          => __( "Button font size", "RD_vc" ),
					'param_name'       => 'b_f_size',
					'tooltip'          => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'              => 1,
					'max'              => 100,
					'step'             => 1,
					'value'            => 14,
					'unit'             => 'px',
					"description" => __("Chose Button Font Size here, Default is 14px", "prime_vc"),
					"group" => "Typography"
				),

				// Title Font Size Field
				array(
					'type'             => 'prime_slider',
					'heading'          => __( "Box font size", "RD_vc" ),
					'param_name'       => 'box_tit_size',
					'tooltip'          => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'              => 1,
					'max'              => 100,
					'step'             => 1,
					'value'            => 18,
					'unit'             => 'px',
					"description" => __("Modal Popup Box Title Size. Default is 18px", "prime_vc"),
					"dependency" => array('element' => 'circle_button', 'value' => 'on'),
					"group" => "Typography"
				),

				// Description Font Size Field
				array(
					'type'             => 'prime_slider',
					'heading'          => __( "Box Description size", "RD_vc" ),
					'param_name'       => 'box_descr_size',
					'tooltip'          => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'              => 1,
					'max'              => 100,
					'step'             => 1,
					'value'            => 14,
					'unit'             => 'px',
					"description" => __("Modal Popup Box Description Size. Default is 14px", "prime_vc"),
					"group" => "Typography"
				),
				// Background Color
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Button Background Color", "my-text-domain" ),
					"param_name"  => "b_bg_color",
					"admin_label" => true,
					"value"       => '#1e73be',
					"description" => __( "Chose background color For Button", "my-text-domain" ),
					"group" => "Typography"
				),

				array(
					"type"        => "colorpicker",
					"heading"     => __( "Button Font Color", "my-text-domain" ),
					"param_name"  => "button_f_color",
					"value"       => '#FFFFFF',
					"admin_label" => true,
					"group" => "Typography"
				),
				array(
					"type"        => "colorpicker",
					"heading"     => __( "Box Background Color", "my-text-domain" ),
					"param_name"  => "box_bg_color",
					"admin_label" => true,
					"value"       => '#FFFFFF',
					"group" => "Typography"
				),
				array(
					"type"        => "colorpicker",
					"heading"     => __( "Box Title Color", "my-text-domain" ),
					"param_name"  => "box_tl_color",
					"admin_label" => true,
					"value"       => '#000000',
					"group" => "Typography"
				),
				array(
					"type"        => "colorpicker",
					"heading"     => __( "Box Description Color", "my-text-domain" ),
					"param_name"  => "box_dsc_color",
					"admin_label" => true,
					"group" => "Typography",
					"value"       => '#000000',
				),
				array(
					"type" => "prime_param_heading",
					"text" => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/W9dOrkzF6G4' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group" => "Video Tutorial"
				),

			)
		) );
	}


	function prime_model_shortcode_function( $atts, $content = null, $tag ) {

		extract( shortcode_atts( array(
			'b_text'          => 'Open Modal Click Here',
			'b_f_size'        => '14',
			'button_f_color'  => '',
			'b_bg_color'      => '#1e73be',
			'mod_title'       => 'Title Here',
			'mod_descr'       => '',
			'box_bg_color'    => '#FFFFFF',
			'box_tl_color'    => '#000000',
			'box_dsc_color'   => '#000000',
			'modal_animation' => 'flip',
			'modal_position' => 'center',
			'box_tit_size'    => '18',
			'box_descr_size'  => '14',
		), $atts ) );


		$b_f_size  = $atts[ 'b_f_size' ] != '' ? (int) esc_attr( $atts[ 'b_f_size' ] ) : 14;
		$box_tit_size  = $atts[ 'box_tit_size' ] != '' ? (int) esc_attr( $atts[ 'box_tit_size' ] ) : 18;
		$box_descr_size  = $atts[ 'box_descr_size' ] != '' ? (int) esc_attr( $atts[ 'box_descr_size' ] ) : 14;
		$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
		$modid   = rand( 1, 100000 );
		$output  = '<div class="dt-modal-button" style="text-align:'.$modal_position.';">
								 <a style="font-size:' . $b_f_size . 'px; background:' . $b_bg_color . '; color:' . $button_f_color . ';" href="#dt-modal' . $modid . '" class="dt-button dt-button-large dt-button-blue">' . $b_text . '</a>
						 </div>';
		$output .= '
				<div class="dt-modal-box-container">	
					<a href="#" class="dt-overlay" id="dt-modal' . $modid . '"></a>
					<div class="dt-modal-box dt-' . $modal_animation . '">
						<div style="background:' . $box_bg_color . ';" class="dt-modal-box-header">
							<h4 style="color:' . $box_tl_color . '; font-size:' . $box_tit_size . 'px;">' . $mod_title . '</h4>
						</div>
						<div style="background:' . $box_bg_color . ';" class="dt-modal-box-section">
							<p style="color:' . $box_dsc_color . '; font-size:' . $box_descr_size . 'px;">' . $content . '</p>
						</div>	
						<div style="background:' . $box_bg_color . ';" class="dt-modal-box-footer">						
							<a href="#dt-close" class="dt-close-button">Close</a>
						</div>     
					</div>
				</div>
				';

		return $output;
	}
}