<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class PricingTable extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'pricing_table' ) ) {
			return;
		}
		add_shortcode( 'pr_pricingtable', array( $this, 'prime_pricingtable_shortcode_fun' ));

		$this->pricing_table();
	}

	public function pricing_table() {
		vc_map( array(
			"name"        => __( "Pricing Table", 'RD_vc' ),
			"base"        => "pr_pricingtable",
			"icon"        => "prime_icon_pricing_table",
			"category"    => 'Prime VC Extensions',
			'description' => 'Icon animation with Text',
			// 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
			"params"      => array(
				array(
					"type"        => "textfield",
					/*"holder" => "div",*/
					"class"       => "",
					"heading"     => __( "Plan Name", 'rd_vc' ),
					"param_name"  => "king_planname",
					"admin_label" => true,
					"value"       => "Add You Plan Name",
				),
				array(
					"type"        => "textfield",
					"heading"     => __( "Plan Duration", 'rd_vc' ),
					"param_name"  => "king_plan_duration",
					"admin_label" => true,
					"value"       => "$10 / month",
				),
				// Button Font Size Field
				array(
					'type'        => 'prime_slider',
					'heading'     => __( "Head Font Size", "RD_vc" ),
					'param_name'  => 'hea_plansize',
					'tooltip'     => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'         => 2,
					'max'         => 30,
					'step'        => 1,
					'value'       => 16,
					'unit'        => 'px',
					"description" => __( "Use Custom plan Size, Default is 16px", "prime_vc" ),
					"group"       => "Typography"
				),
				// Button Font Size Field
				array(
					'type'        => 'prime_slider',
					'heading'     => __( "Duration Font Size", "RD_vc" ),
					'param_name'  => 'hea_durationsize',
					'tooltip'     => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'         => 5,
					'max'         => 60,
					'step'        => 1,
					'value'       => 30,
					'unit'        => 'px',
					"description" => __( "UUse Custom Duration Font Size, default is 30px", "prime_vc" ),
					"group"       => "Typography"
				),
				// plan Background Color
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "plan Background Color", "my-text-domain" ),
					"param_name"  => "head_planbg_color",
					"admin_label" => true,
					"value"       => '#1e73be',
					"description" => __( "Chose Plan background color", "my-text-domain" ),
					"group"       => "Typography"
				),
				// Duration Background Color
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Duration Area Background Color", "my-text-domain" ),
					"param_name"  => "text_durationbg_color",
					"admin_label" => true,
					"value"       => '#EF5A5C',
					"description" => __( "Chose Duration Area Background Color here", "my-text-domain" ),
					"group"       => "Typography"
				),
				//Button Background Color
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Button Background Color", "my-text-domain" ),
					"param_name"  => "king_button_color",
					"admin_label" => true,
					"value"       => '#C9302C',
					"description" => __( "Chose Duration Area Background Color here", "my-text-domain" ),
					"group"       => "Typography"
				),
				// Border Color
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Border Color", "my-text-domain" ),
					"param_name"  => "king_border_color",
					"admin_label" => true,
					"value"       => '#C9302C',
					"description" => __( "Chose Border Color here", "my-text-domain" ),
					"group"       => "Typography"
				),
				// Param Group Here
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Add pricing Feature', 'prime_vc' ),
					'param_name' => 'acoptions',
					'params'     => array(
						array(
							"type"        => "textfield",
							"heading"     => __( "Pricing Feature", 'rd_vc' ),
							"param_name"  => "pric_feature",
							"admin_label" => true,
							"value"       => "Add Pricing Feature Here",
						),
					),
					'callbacks'  => array(
						'after_add' => 'vcChartParamAfterAddCallback'
					)
				),
				array(
					"type"        => "textfield",
					"heading"     => __( "Button Name", 'rd_vc' ),
					"param_name"  => "king_buttonname",
					"admin_label" => true,
					"value"       => "BUY NOW!",
				),
				// Link Field
				array(
					"type"        => "vc_link",
					"heading"     => __( "Button Link", 'prime_vc' ),
					"param_name"  => "link",
					"description" => __( "Provide the Button link here.", 'kobra_vc' ),
				),
				array(
					"type" => "prime_param_heading",
					"text" => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/C5_NJz8se7g' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group" => "Video Tutorial"
				),
			)
		) );
	}


	function prime_pricingtable_shortcode_fun( $atts, $content = null, $tag ) {
		extract( shortcode_atts( array(
			'pric_feature'          => 'Pricing Feature Here',
			'acoptions'             => '',
			'king_planname'         => 'Add You Plan Name',
			'king_plan_duration'    => '$10 / month',
			'king_buttonname'       => 'BUY NOW!',
			'king_button_color'     => '#C9302C',
			'head_planbg_color'     => '#CE4D4F',
			'text_durationbg_color' => '#EF5A5C',
			'king_border_color'     => '#C9302C',
			'hea_plansize'          => '16',
			'hea_durationsize'      => '30',
			'king_buttonurl'        => '#',
			'link'                  => '#',
		), $atts ) );

		$output = '';
		$link             = vc_build_link( $link );
		$options          = json_decode( urldecode( $acoptions ) );
		$hea_plansize     = $atts['hea_plansize'] != '' ? (int) esc_attr( $atts['hea_plansize'] ) : 16;
		$hea_durationsize = $atts['hea_durationsize'] != '' ? (int) esc_attr( $atts['hea_durationsize'] ) : 30;

		$content          = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
		$output .= '<div class="king-pricing-items">
            <div class="panel price panel-red">
                <div style="background-color:' . $head_planbg_color . '; border-color: ' . $king_border_color . ';" class="panel-heading  text-center">
                    <h3 style="font-size:' . $hea_plansize . 'px; color:#ffffff;">' . strtoupper( $king_planname ) . '</h3>
                </div>

                <div style="background-color:' . $text_durationbg_color . '"; class="panel-body text-center">
                    <p class="lead" style="font-size:' . $hea_durationsize . 'px; color:#ffffff;"><strong>' . $king_plan_duration . '</strong></p>
                </div>

                <ul class="list-group list-group-flush text-center">';
		foreach ( $options as $option ) {
			$output .= '<li class="list-group-item" id="fea_pricing"><i class="icon-ok text-danger"></i>' . $option->pric_feature . '</li>';
		}
		$output .= ' </ul>
                <div class="panel-footer">
<a style="background:' . $king_button_color . '; color:#ffffff;" class="btn btn-lg btn-block btn-danger" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">' . $king_buttonname . '</a>
                </div>
            </div>
        </div>';

		return $output;
	}
}