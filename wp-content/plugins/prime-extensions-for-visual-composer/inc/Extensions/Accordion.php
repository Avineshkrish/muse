<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions {

	use Inc\Base\ExtensionsController;

	class Accordion extends ExtensionsController {

		public function extensions_register() {

			if ( ! $this->activated( 'accordion' ) ) {
				return;
			}

			$this->accordion();
			add_shortcode( 'pr_accordion_item', array( $this, 'pr_accordion_item_callback' ) );
			add_shortcode( 'pr_accordion', array( $this, 'pr_accordion_callback' ) );

		}

		public function accordion() {
			if ( function_exists( "vc_map" ) ) {
				// Before SETTING
				vc_map( array(
					"name"                    => __( "Accordion", "RD_vc" ),
					"base"                    => "pr_accordion",
					"as_parent"               => array( 'only' => 'pr_accordion_item' ),
					// Use only|except attributes to limit child shortcodes (separate multiple values with comma)
					"content_element"         => true,
					"show_settings_on_create" => true,
					"category"                => 'Prime VC Extensions',
					"icon"                    => "prime_iconaccordion",
					"class"                   => "pr_accordion",
					"description"             => __( "Image hover effects with information.", "RD_vc" ),
					//'admin_enqueue_js' => array( plugins_url('../assets/js/kobra hover.js',__FILE__)), // This will load js file in the VC backend editor
					//"admin_enqueue_css" => array( plugins_url('../assets/css/kobra hover.css',__FILE__)), // This will load css file in the VC backend editor
					//"is_container"    => true,
					"params"                  => array(
						array(
							"type"        => "textfield",
							"heading"     => __( "Extra Class For Main Wrapper", 'prime_vc' ),
							"param_name"  => "ex_class",
							"admin_label" => true,
							"description" => __( "If you want to set Css Class for Main Rapper you can put Class here Then Click Save Changes, Otherwise leave it blank then click Close", 'ultimate' ),
							"value"       => "accordion_wrapper",
						),
					),
					"js_view"                 => 'VcColumnView',
				) );
				// After Setting here
				// AFTER SETTING
				vc_map( array(
					"name"            => __( "Accordion Item", "RD_vc" ),
					"base"            => "pr_accordion_item",
					"content_element" => true,
					"icon"            => "prime_iconaccordion",
					"as_child"        => array( 'only' => 'pr_accordion' ),
					// Use only|except attributes to limit parent (separate multiple values with comma)
					"is_container"    => false,
					"params"          => array(

						// Param Group Here
						array(
							'type'       => 'param_group',
							'heading'    => __( 'Add Accordion Items', 'prime_vc' ),
							'param_name' => 'acoptions',
							'params'     => array(
								array(
									"type"        => "textfield",
									"heading"     => __( "Title", "my-text-domain" ),
									"param_name"  => "title",
									"admin_label" => true,
									"value"       => "Title Goes Here",
								),
								array(
									"type"        => "textarea",
									"heading"     => __( "Accordion Content", "my-text-domain" ),
									"param_name"  => "acc_descr",
									// Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
									"value"       => __( "I am test text block. Click edit button to change this text.", "my-text-domain" ),
									"description" => __( "Enter your Accordion Content Here.", "my-text-domain" ),
								),
								array(
									"type"        => "prime_switch",
									"class"       => "",
									"heading"     => __( "Active This Item", "prime_vc" ),
									"param_name"  => "act_accordion",
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
							),
							'callbacks'  => array(
								'after_add' => 'vcChartParamAfterAddCallback',
							),
						),

						// Title Font Size Field
						array(
							'type'        => 'prime_slider',
							'heading'     => __( 'Title Font Size', 'prime_vc' ),
							'param_name'  => 't_f_size',
							'tooltip'     => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
							'min'         => 1,
							'max'         => 100,
							'step'        => 1,
							'value'       => 16,
							'unit'        => 'px',
							"description" => __( "Chose Title Font Size as Pixel. Default is 16px", "prime_vc" ),
							"group"       => "Typography",
						),
						// Description Font Size Field
						array(
							'type'        => 'prime_slider',
							'heading'     => __( 'Description Font Size', 'prime_vc' ),
							'param_name'  => 'd_f_size',
							'tooltip'     => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
							'min'         => 1,
							'max'         => 100,
							'step'        => 1,
							'value'       => 14,
							'unit'        => 'px',
							"description" => __( "Chose Description Font Size as Pixel. Default is 14px", "prime_vc" ),
							"group"       => "Typography",
						),

						array(
							"type"       => "colorpicker",
							"heading"    => __( "Title Color", "my-text-domain" ),
							"param_name" => "title_color",
							"value"      => '#FFFFFF',
							"group"      => "Typography",
						),
						array(

							"type"       => "colorpicker",
							"heading"    => __( "Title Background Color", "my-text-domain" ),
							"param_name" => "title_bg_color",
							"value"      => '#27AE60',
							"group"      => "Typography",
						),
						array(
							"type"       => "colorpicker",
							"heading"    => __( "Description Color", "my-text-domain" ),
							"param_name" => "descr_color",
							"value"      => '#383838',
							"group"      => "Typography",
						),
						array(
							"type"       => "colorpicker",
							"heading"    => __( "Description Background Color", "my-text-domain" ),
							"param_name" => "descr_bg_color",
							"value"      => '#ffffff',
							"group"      => "Typography",
						),
						array(
							"type"             => "prime_param_heading",
							"text"             => "<span class='phyoutubeparam'>
					<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
					src='https://www.youtube.com/embed/4df5HPA6s48' frameborder='0' allowfullscreen>
					</iframe>
				</span>",
							"param_name"       => "notification",
							'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
							"group"            => "Video Tutorial",
						),

					),
				) );
			}
		}

		//Container Shortcode
		// Container Shortcode START
		public function pr_accordion_callback( $atts, $content = null ) {
			$output = $ex_class = '';
			extract( shortcode_atts( array(
				'ex_class' => 'accordion_wrapper',
			), $atts ) );
			$content = wpb_js_remove_wpautop( $content, true );
			$output  .= '<div class="accordion-wrapper ' . $ex_class . '">';
			$output  .= do_shortcode( $content );
			$output  .= '</div>';

			return $output;
		}

		// Items Shortcode START

	public function pr_accordion_item_callback( $atts, $content = null ) {
			$style = $title = $descript = $acoptions = $images = $link = $button_choser = $bg_color = $title_size = $title_color = $desc_size = $desc_color = $button_size = $button_color = $showing_item = $act_accordion = $output = '';
			extract( shortcode_atts( array(
				'title'          => '',
				'act_accordion'  => '',
				'acc_descr'      => '',
				'acoptions'      => '',
				'acc_bg_color'   => '',
				't_f_size'       => '16',
				'd_f_size'       => '14',
				'title_bg_color' => '',
				'title_color'    => '',
				'descr_bg_color' => '',
				'descr_color'    => '',
			), $atts ) );
			wp_enqueue_style( 'prime_accordion_ba_css', plugins_url( 'css/style.css', __FILE__ ) );
			wp_enqueue_script( "jquery" );
			wp_enqueue_script( 'prime_accordion_prime_event_move', plugins_url( 'js/paccordion.js', __FILE__ ), array( 'jquery' ), '', false );
			wp_enqueue_script( 'prime_accordion_move', plugins_url( 'js/ultimate-vc-backend.min.js', __FILE__ ), array( 'jquery' ), '', false );

			$options = json_decode( urldecode( $acoptions ) );

			$content  = wpb_js_remove_wpautop( $content, true );
			$d_f_size = $atts['d_f_size'] != '' ? (int) esc_attr( $atts['d_f_size'] ) : 14;
			$t_f_size = $atts['t_f_size'] != '' ? (int) esc_attr( $atts['t_f_size'] ) : 16;
			foreach ( $options as $option ) {
				$option->act_accordion = ( $option->act_accordion != 'off' ) ? 'active' : '';
				$output                .= '<div class="ac-pane ' . $option->act_accordion . '">
		<a style="background-color:' . $title_bg_color . '; text-decoration:none; " href="#" class="ac-title" data-accordion="true">
			<span style="font-size:' . $t_f_size . 'px; color:' . $title_color . ';">' . $option->title . '</span>
			<i class="fa"></i>
		</a>
		<div style="background:' . $descr_bg_color . ';" class="ac-content">
		   <p style="font-size:' . $d_f_size . 'px; color:' . $descr_color . ';"> ' . $option->acc_descr . ' </p>
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
		class WPBakeryShortCode_pr_accordion extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_pr_accordion_item extends WPBakeryShortCode {
		}
	}
}