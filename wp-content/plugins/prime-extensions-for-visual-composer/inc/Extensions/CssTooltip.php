<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class CssTooltip extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'csstooltips' ) ) {
			return;
		}

		add_shortcode('pr_tooltips', array($this , 'prime_tooltips_shortcode_function'));

		$this->csstooltip();
	}

	public function csstooltip() {
		vc_map( array(
			"name"        => __( "Tooltips", 'RD_vc' ),
			"base"        => "pr_tooltips",
			"icon"        => "prime_icontooltips",
			"category"    => 'Prime VC Extensions',
			'description' => 'Icon animation with Text',
			// 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
			"params"      => array(

				array(
					"type"        => "textarea_html",
					/*"holder" => "div",*/
					"class"       => "",
					"heading"     => __( "Please Add tooltip text within red Color:</br> < a href='http://wpexpert24.com' class='prime-tooltip prime-topLeft' data-tooltip='<span style='color:red;'>Description Goes Here If you want</span>'><span style='color:red;'>Hover Me</span>'> < /a>:</br>  please edit in text mode."),
					"param_name"  => "content",
					"admin_label" => true,
					"description" => __("" ),

					"value"  => "adipiscing elit, sed diam nonummy <a href='http://wpexpert24.com' class='prime-tooltip prime-topLeft' data-tooltip='I am Tooltip - Top Left Animation'> Hover Me (top Left)</a> nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat <a href='http://wpexpert24.com' class='prime-tooltip prime-topRight' data-tooltip='Description Goes Here If you want'> Hover Me (top right)</a> ut wisi enim ad minim veniam, Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie <a href='http://wpexpert24.com' class='prime-tooltip prime-bottomLeft' data-tooltip='Description Goes Here If you want'> Hover Me (Bottom Left)</a> consequat Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat ut wisi enim ad minim veniam, Duis autem vel eum iriure dolor in hendrerit <a href='http://wpexpert24.com' class='prime-tooltip prime-BottomRight' data-tooltip='Description Goes Here If you want'> Hover Me (Bottom Right)</a> in vulputate velit esse molestie consequat",
				),
				array(
					"type" => "prime_param_heading",
					"text" => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/-jNT1moPGR0' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group" => "Video Tutorial"
				),
			)
		) );
	}


	function prime_tooltips_shortcode_function( $atts, $content = null, $tag ) {

		extract( shortcode_atts( array(
			'b_text'          => 'Open tooltips Click Here',
			'b_f_size'        => '',
			'button_f_color'  => '',
			'b_bg_color'      => '#1e73be',
			'mod_title'       => '',
			'tooltips_descr'       => "adipiscing elit, sed diam nonummy <a href='http://wpexpert24.com' class='prime-tooltip prime-topLeft' data-tooltip='I am Tooltip - Top Left Animation'> Hover Me (top Left)</a> nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat <a href='http://wpexpert24.com' class='prime-tooltip prime-topRight' data-tooltip='Description Goes Here If you want'> Hover Me (top right)</a> ut wisi enim ad minim veniam, Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie <a href='http://wpexpert24.com' class='prime-tooltip prime-bottomLeft' data-tooltip='Description Goes Here If you want'> Hover Me (Bottom Left)</a> consequat Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat ut wisi enim ad minim veniam, Duis autem vel eum iriure dolor in hendrerit <a href='http://wpexpert24.com' class='prime-tooltip prime-BottomRight' data-tooltip='Description Goes Here If you want'> Hover Me (Bottom Right)</a> in vulputate velit esse molestie consequat",
			'box_bg_color'    => '',
			'box_tl_color'    => '',
			'box_dsc_color'   => '',
			'tooltips_animation' => '',
			'box_tit_size'    => '',
			'box_descr_size'  => '',
		), $atts ) );
		wp_register_style( 'pr-tooltips-css', plugins_url( 'css/style.css', __FILE__ ) );
		wp_enqueue_style( 'pr-tooltips-css' );


		$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
		$output  = '<div class="prime-tooltips">
				'.$content.'
			</div>';

		return $output;
	}
}