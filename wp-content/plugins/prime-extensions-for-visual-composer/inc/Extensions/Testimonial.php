<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions {

	use Inc\Base\ExtensionsController;

	class Testimonial extends ExtensionsController {

		public function extensions_register() {

			if ( ! $this->activated( 'testimonial' ) ) {
				return;
			}

			$this->tensimonial();
			add_shortcode( 'pr_testimonial_item', array( $this, 'pr_testimonial_item_callback' ) );
			add_shortcode( 'pr_testimonial', array( $this, 'pr_testimonial_callback' ) );

		}

		public function tensimonial() {
			if ( function_exists( "vc_map" ) ) {
				// Before SETTING
				vc_map( array(
					"name"                    => __( "testimonial", "RD_vc" ),
					"base"                    => "pr_testimonial",
					"as_parent"               => array( 'only' => 'pr_testimonial_item' ),
					// Use only|except attributes to limit child shortcodes (separate multiple values with comma)
					"content_element"         => true,
					"show_settings_on_create" => true,
					"category"                => 'Prime VC Extensions',
					"icon"                    => "prime_icontestimonial",
					"class"                   => "pr_testimonial",
					"description"             => __( "Image hover effects with information.", "RD_vc" ),
					//'admin_enqueue_js' => array( plugins_url('../assets/js/kobra hover.js',__FILE__)), // This will load js file in the VC backend editor
					//"admin_enqueue_css" => array( plugins_url('../assets/css/kobra hover.css',__FILE__)), // This will load css file in the VC backend editor
					//"is_container"    => true,
					"params"                  => array(
						array(
							"type"        => "textfield",
							"heading"     => __( "Testimonial Width", "my-text-domain" ),
							"param_name"  => "test_width",
							// Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
							"value"       => __( "800", "my-text-domain" ),
							"description" => __( "Use Custom Testimonial Slide Width, default is 800px", "my-text-domain" ),
						),
						array(
							"type"        => "textfield",
							"heading"     => __( "Testimonial Margin", "my-text-domain" ),
							"param_name"  => "test_margin",
							// Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
							"value"       => __( "32", "my-text-domain" ),
							"description" => __( "Use Custom Testimonial Slide Margin, default is 32px", "my-text-domain" ),
						),
						array(
							"type"        => "prime_switch",
							"class"       => "",
							"heading"     => __( "Autoplay", "prime_vc" ),
							"param_name"  => "auto_testi",
							"value"       => "off",
							"options"     => array(
								"on" => array(
									"label" => __( "", "prime_vc" ),
									"on"    => "Yes",
									"off"   => "No",
								),
							),
							"default_set" => true,
							"description" => "Switch Yes If you want to active This Item first. Remember You should active only 1 item",
						),
						array(
							"type"        => "textfield",
							"heading"     => __( "Extra Class For Main Wrapper", 'prime_vc' ),
							"param_name"  => "ex_class",
							"admin_label" => true,
							"description" => __( "If you want to set Css Class for Main Rapper you can put Class here Then Click Save Changes, Otherwise leave it blank then click Close", 'ultimate' )
						),
					),
					"js_view"                 => 'VcColumnView'
				) );
				// After Setting here
				// AFTER SETTING
				vc_map( array(
					"name"            => __( "testimonial Item", "RD_vc" ),
					"base"            => "pr_testimonial_item",
					"content_element" => true,
					"icon"            => "prime_icontestimonial",
					"as_child"        => array( 'only' => 'pr_testimonial' ),
					// Use only|except attributes to limit parent (separate multiple values with comma)
					"is_container"    => false,
					"params"          => array(
						// Param Group Here
						array(
							'type'       => 'param_group',
							'heading'    => __( 'Add testimonial Items', 'prime_vc' ),
							'param_name' => 'acoptions',
							"group"      => "Testimonial Items",
							//'group'  => __( 'Social Links', 'prime_vc' ),
							// 'value' => urlencode( json_encode ( array(
							// 	array(
							// 		"social_link_title" => "",
							// 	)
							// ) ) ),
							'params'     => array(
								// Image Field
								array(
									"type"        => "attach_image",
									"heading"     => __( "Upload Client Image", "RD_vc" ),
									"param_name"  => "client_image",
									"value"       => "",
									"description" => __( "Select images from media library.", "RD_vc" ),
									//"group"=> "Add Items"
								),
								array(
									"type"        => "textfield",
									"heading"     => __( "Client Name", 'prime_vc' ),
									"param_name"  => "cl_name",
									"admin_label" => true,
									"value"       => "Mickle Bond",
									"description" => __( "Client Name Here", 'ultimate' ),
									//  "group"=> "Add Items"
								),
								array(
									"type"        => "textfield",
									"heading"     => __( "Client Label", 'prime_vc' ),
									"param_name"  => "cl_label",
									"admin_label" => true,
									"value"       => "Programmer",
									"description" => __( "Client Label here", 'ultimate' ),
									//  "group"=> "Add Items"
								),
								array(
									"type"        => "textarea",
									"heading"     => __( "Testimonial Description", "my-text-domain" ),
									"param_name"  => "testi_descr",
									// Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
									"value"       => __( "Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.", "my-text-domain" ),
									"description" => __( "Enter your testimonial Description Here.", "my-text-domain" ),
									//"group"=> "Add Items"
								),
							),
							'callbacks'  => array(
								'after_add' => 'vcChartParamAfterAddCallback'
							)
						),

						// Title Font Size Field
						array(
							'type'             => 'prime_slider',
							'heading'          => __( "Name Font Size", "RD_vc" ),
							'param_name'       => 'name_font_size',
							'tooltip'          => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
							'min'              => 1,
							'max'              => 100,
							'step'             => 1,
							'value'            => 18,
							'unit'             => 'px',
							"description" => __("use custom Client name fontsize, default is 18px", "prime_vc"),
							"group" => "Typography"
						),

						// Title Font Size Field
						array(
							'type'             => 'prime_slider',
							'heading'          => __( "Description Font Size", "RD_vc" ),
							'param_name'       => 'descr_font_size',
							'tooltip'          => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
							'min'              => 1,
							'max'              => 100,
							'step'             => 1,
							'value'            => 14,
							'unit'             => 'px',
							"description" => __("use custom Description fontsize, default is 14px", "prime_vc"),
							"group" => "Typography"
						),
						array(
							"type"       => "colorpicker",
							"heading"    => __( "Client Name Color", "my-text-domain" ),
							"param_name" => "c_name_col",
							"value"      => '#000',
							"group"      => "Typography"
						),
						array(
							"type"       => "colorpicker",
							"heading"    => __( "Description Color", "my-text-domain" ),
							"param_name" => "c_descr_color",
							"value"      => '#444444',
							"group"      => "Typography"
						),
						array(
							"type"       => "colorpicker",
							"heading"    => __( "Label Color", "my-text-domain" ),
							"param_name" => "c_label_color",
							"value"      => '#aaa',
							"group"      => "Typography"
						),
						array(
							"type" => "prime_param_heading",
							"text" => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/T5P7o_WTIoY' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
							"param_name" => "notification",
							'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
							"group" => "Video Tutorial"
						),

					)
				) );
			}
		}

		// Container Shortcode START
		function pr_testimonial_callback( $atts, $content = null ) {
			$output = $ex_class = $test_width = $test_margin = $auto_testi = '';
			extract( shortcode_atts( array(
				'ex_class'    => '',
				'test_width'  => '800',
				'test_margin' => '32',
				'auto_testi'  => '',
			), $atts ) );
			$auto_testi = ( $auto_testi != 'off' ) ? 'true' : 'false';
			$content    = wpb_js_remove_wpautop( $content, true );
			$output .= '<div class="king-testimonial ' . $ex_class . '">';
			$output .= do_shortcode( $content );
			$output .= '</div>';
			$output .= '<script type="text/javascript">
		jQuery(".king-testimonial").bxSlider({
			   slideWidth: ' . $test_width . ',
			   minSlides: 1,
			   maxSlides: 1,
			   slideMargin: ' . $test_margin . ',
			   auto: ' . $auto_testi . ',
			   autoControls: true,
			 });
		</script>';

			return $output;
		}

		// Items Shortcode START
		function pr_testimonial_item_callback( $atts, $content = null ) {
			$style = $title = $descript = $acoptions = $images = $link = $button_choser = $bg_color = $title_size = $title_color = $desc_size = $desc_color = $button_size = $button_color = $showing_item = $auto_testi = $output = '';
			extract( shortcode_atts( array(
				'acoptions'       => '',
				'descr_font_size' => '14',
				'name_font_size'  => '18',
				'c_descr_color'   => '',
				'c_label_color'   => '',
				'c_name_col'      => '',
				'client_image'    => '',
				'cl_name'         => 'Maxdew',
				'cl_label'        => 'google.com',
				'testi_descr'     => '',
				'test_margin'     => '',
				'test_width'      => '',
				'auto_testi'      => 'true'
			), $atts ) );
			$options = json_decode( urldecode( $acoptions ) );
			$content = wpb_js_remove_wpautop( $content, true );
			$name_font_size  = $atts[ 'name_font_size' ] != '' ? (int) esc_attr( $atts[ 'name_font_size' ] ) : 18;
			$descr_font_size  = $atts[ 'descr_font_size' ] != '' ? (int) esc_attr( $atts[ 'descr_font_size' ] ) : 14;
			foreach ( $options as $option ) {
				$option->client_image = wp_get_attachment_image_src( $option->client_image, 'thumbnail', 'full' );
				$output .= '<div class="slide">
						<div class="king-testimonials-carousel-thumbnail"><img alt="" src="' . $option->client_image[0] . '"></div>
							<div class="king-testimonials-carousel-context">
							<div style="font-color:' . $c_name_col . '; font-size:' . $name_font_size . 'px;" class="king-testimonials-name">' . $option->cl_name . ' <span style="color:' . $c_label_color . ';">' . $option->cl_label . '</span></div>
							<div class="king-testimonials-carousel-content"><p style="color:' . $c_descr_color . '; font-size:' . $descr_font_size . 'px;">' . $option->testi_descr . '</p></div>
						</div>
				  </div>';
			}

			return $output;
		}
	}

}
namespace {

	// Finally initialize code For Accordion
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_pr_testimonial extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_pr_testimonial_item extends WPBakeryShortCode {
		}
	}
}