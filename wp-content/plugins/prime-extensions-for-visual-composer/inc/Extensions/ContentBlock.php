<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class ContentBlock extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'content_block' ) ) {
			return;
		}
		add_shortcode( 'prime_vc_contentblock', array( $this, 'prime_vc_contentblock_func' ));

		$this->contentblock();
	}

	public function contentblock() {
		vc_map(array(
			"name" => __("Content Block", 'prime_vc'),
			"base" => "prime_vc_contentblock",
			"icon" => "prime_icon_contentblock",
			"category" => __('Prime VC Extensions', 'rd_vc'),
			'description' => __('Place any content inside it', 'rd_vc'),
			"params" => array(
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"heading" => __("content Block", "prime_vc"),
					"param_name" => "content",
					"value" => __("", "prime_vc"), "description" => __("", "prime_vc") ),
				array(
					"type" => "dropdown",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("background color", "prime_vc"),
					"param_name" => "panelbackground",
					"value" => array("White" => "white", "Gray" => "gray", "Orange" => "orange", "Red" => "red", "Green" => "green", "Mint" => "mint", "Aqua" => "aqua", "Blue" => "blue", "Lavender" => "lavender", "Pink" => "pink", "Yellow" => "yellow"),
					'std' => 'white',
					"description" => __("", "prime_vc")
				),
				array(
					"type" => "dropdown",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("Text align", "prime_vc"),
					"param_name" => "textalign",
					"value" => array("left", "center", "right"),
					"description" => __("", "prime_vc")
				),
				array(
					"type"        => "prime_switch",
					"class"       => "",
					"heading"     => __( "Use External Link?", "prime_vc" ),
					"param_name"  => "url_show",
					"value"       => "off",
					"options"     => array(
						"on" => array(
							"label" => __( "", "prime_vc" ),
							"on"    => "Yes",
							"off"   => "No",
						),
					),
					"default_set" => true,
					"description" => "Switch Yes If you want to use link for whole content.",
				),
				array(
					"type" => "vc_link",
					"heading" => __("Link for the whole stack (optional)", "prime_vc"),
					"param_name" => "link",
					"value" => "",
					"description" => __("", "prime_vc"),
					"dependency" => array('element' => 'url_show', 'value' => 'on'),
				),
				array(
					"type" => "textfield",
					"heading" => __("Extra class name", "prime_vc"),
					"param_name" => "extraclass",
					"value" => "",
					"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "prime_vc")
				),
				array(
					"type" => "prime_param_heading",
					"text" => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/lX5QfpT92_8' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group" => "Video Tutorial"
				),

			)
		));
	}


	function prime_vc_contentblock_func($atts, $content=null, $tag) {
		extract(shortcode_atts(array(
			"panelbackground" => "gray",
			"textalign" => "left",
			"elementheight" => "",
			"contentwidth" => "",
			// "fontsize" => "",
			"tooltip" => "",
			"link" => "",
			"extraclass" => ""
		), $atts));
		$content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
		$output = '';

		$link = vc_build_link($link);

		$i = -1;
		$output = '';
		$output .= '<div class="prime-contentblock" data-elementheight="auto" data-contentwidth="100%" data-textalign="'.$textalign.'" data-tooltip="'.$tooltip.'">';
		if($link["url"]!=="") $output .= '<a href="'.$link["url"].'" title="'.$link["title"].'" target="'.$link["target"].'" class="prime-contentblock-link">';
		$output .= '<div class="prime-contentblock-card card-'.$panelbackground.'">';
		$output .= '<div class="prime-contentblock-content">';
		$output .= $content;
		$output .= '</div>';
		$output .= '</div>';
		if($link["url"]!=="") $output .= '</a>';
		$output .= '</div>';
		return $output;

	}
}