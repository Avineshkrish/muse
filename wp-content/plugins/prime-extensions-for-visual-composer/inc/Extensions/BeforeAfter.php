<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class BeforeAfter extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'before_after' ) ) {
			return;
		}
		add_shortcode( 'prime_beforeafter', array( $this, 'prime_vc_beforeafter_func' ) );

		$this->beforeafter();
	}

	public function beforeafter() {
		vc_map( array(
			"name"        => __( "Before & After", 'RD_vc' ),
			"base"        => "prime_beforeafter",
			"icon"        => "prime_icon_beforeafter",
			"category"    => 'Prime VC Extensions',
			'description' => __( 'Image comparison slider', 'js_composer' ),
			"params"      => array(
				array(
					"type"        => "attach_image",
					"heading"     => __( "Before image", "RD_vc" ),
					"param_name"  => "before_image",
					"value"       => "",
					"description" => __( "Select image from media library.", "RD_vc" ),
				),
				array(
					"type"        => "attach_image",
					"heading"     => __( "After image", "RD_vc" ),
					"param_name"  => "after_image",
					"value"       => "",
					"description" => __( "Select image from media library.", "RD_vc" ),
				),
				array(
					"type"             => "prime_param_heading",
					"text"             => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/Ed-h8qT21CQ' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name"       => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group"            => "Video Tutorial",
				),
			),
		) );
	}


	function prime_vc_beforeafter_func( $atts, $content = null, $tag ) {
		extract( shortcode_atts( array(
			"before_image" => '',
			"after_image"  => '',
		), $atts ) );

		$autoslide    = isset( $atts['autoslide'] ) != '' ? (int) esc_attr( $atts['autoslide'] ) : 0;
		$id           = rand( 1, 10000000 );
		$before_image = wp_get_attachment_image_src( $before_image, 'full' );
		$after_image  = wp_get_attachment_image_src( $after_image, 'full' );
		$output       = ' <div class="' . esc_attr( isset( $atts['css'] ) ) . '" id="container_' . $id . '">
						  <img src="' . $before_image[0] . '">
						  <img src="' . $after_image[0] . '">
						</div>';

		$output .= '<script>
						jQuery(window).load(function() {
						  jQuery("#container_' . $id . '").twentytwenty();
						});
					</script>';

		return $output;
	}
}