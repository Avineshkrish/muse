<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;


use Inc\Base\ExtensionsController;

class ShadowBox extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'shadow_box' ) ) {
			return;
		}
		add_shortcode( 'prime_shadowbox', array( $this, 'prime_shadowbox_func' ));

		$this->shadowbox();
	}

	public function shadowbox() {
		vc_map(array(
			"name" => __("Shadow Box", 'prime_vc'),
			"base" => "prime_shadowbox",
			"class" => "prime_shadowbox",
			"controls" => "full",
			"icon" => "prime_shadow_box",
			"category" => __('Prime VC Extensions', 'js_composer'),
			"show_settings_on_create" => true,
			'description' => __('Hover image with tilt', 'js_composer'),
			"params" => array(
				array(
					"type" => "attach_image",
					"heading" => __("Image", "prime_vc"),
					"param_name" => "image",
					"value" => "",
					"description" => __("Select from media library.", "prime_vc")
				),
				array(
					"type" => "dropdown",
					"holder" => "",
					"heading" => __("Resize the image?", "prime_vc"),
					"param_name" => "isresize",
					"value" => array("no", "yes"),
					"std" => "no",
					"description" => __("", "prime_vc")
				),
				array(
					"type" => "vc_link",
					"heading" => __("Link for the Item (optional)", "prime_vc"),
					"param_name" => "link",
					"value" => "",
					"description" => __("", "prime_vc")
				),
				array(
					"type" => "textfield",
					"heading" => __("Resize image to this size: ", "prime_vc"),
					"param_name" => "imagesize",
					"value" => "",
					"dependency" => Array('element' => "isresize", 'value' => array('yes')),
					"description" => __("Width in pixel.", "prime_vc")
				),
				array(
					"type" => "textfield",
					"heading" => __("Titile under the image (optional).", "prime_vc"),
					"param_name" => "title",
					"value" => "",
					"description" => __("", "prime_vc")
				),
				array(
					"type" => "textfield",
					"edit_field_class" => "vc_col-xs-6 vc_column",
					"heading" => __("font size of the title", "prime_vc"),
					"param_name" => "titlesize",
					"value" => "",
					"description" => __("Default is 14px, support other value like 1.2em etc.", "prime_vc")
				),
				array(
					"type" => "colorpicker",
					"edit_field_class" => "vc_col-xs-6 vc_column",
					"heading" => __("Title color", "prime_vc"),
					"param_name" => "titlecolor",
					"value" => "",
					"description" => __("Default is dark gray.", "prime_vc")
				),
				array(
					"type" => "dropdown",
					"holder" => "",
					"heading" => __("Tile tolerance of the hover transition", "prime_vc"),
					"param_name" => "tolerance",
					"value" => array("4", "8", "12", "14", "18", "24"),
					"std" => "14",
					"description" => __("", "prime_vc")
				),
				array(
					"type" => "textfield",
					"heading" => __("Item Height", "prime_vc"),
					"param_name" => "itemheight",
					"value" => "",
					"description" => __("The height of the image (in pixel), default is <strong>240</strong>(px) (leave it to be blank). ", "prime_vc")
				),
				/*
				array(
				  "type" => "textfield",
				  "heading" => __("Extra class name", "prime_vc"),
				  "param_name" => "extraclass",
				  "value" => "",
				  "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "prime_vc")
				),

				array(
				  "type" => "css_editor",
				  "heading" => __( "CSS", "prime_vc" ),
				  "param_name" => "css",
				  "description" => __("It's recommended to use this to customize the background only.", "prime_vc"),
				  "group" => __( "Design options", "prime_vc" ),
			   )
				*/
			)
		));
	}


	function prime_shadowbox_func($atts, $content=null) {
		$titlesize = $labelsize = $itemheight = $title = $titlecolor = $link = $tolerance = $css_class = $css = $extraclass = '';
		$covernum = 0;
		extract(shortcode_atts(array(
			"image" => "",
			"isresize" => "",
			"imagesize" => "",
			"title" => "",
			"titlesize" => "",
			"titlecolor" => "",
			"labelsize" => "",
			"itemheight" => "",
			"tolerance" => "14",
			"link" => "",
			"css" => "",
			"extraclass" => ""
		),$atts));

		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ''), 'prime_shadowbox', $atts);

		$path = plugin_dir_url( dirname( __FILE__, 2 ) );
		wp_register_script('vc-extensions-shadowcard-script', $path . 'assets/js/shadow-box.js',  array("jquery"));
		wp_enqueue_script('vc-extensions-shadowcard-script');

		$link = vc_build_link($link);
		if($link["url"]=="") $link["url"] = "#";

		$img1 = $thumb_image = "";

		$full_image = wp_get_attachment_image_src($image, 'full');
		$thumb_image = $full_image[0];
		if($isresize=="yes"&&$imagesize!=""){
			if(function_exists('wpb_resize')){
				$img1 = wpb_resize($image, null, $imagesize, null);
				$thumb_image = $img1['url'];
				if($thumb_image=="") $thumb_image = $full_image[0];
			}
		}


		$this -> covernum = $covernum;
		$output = "";
		$output .= '<div class="cq-shadowcard '.$extraclass.' '.$css_class.'" data-tolerance="'.$tolerance.'" data-itemheight="'.$itemheight.'" data-titlesize="'.$titlesize.'" data-labelsize="'.$labelsize.'" data-titlecolor="'.$titlecolor.'">';
		$output .= '<div class="cq-shadowcard-item">';
		$output .= '<a href="'.$link["url"].'" title="'.$link["title"].'" rel="'.$link["rel"].'" target="'.$link["target"].'" class="cq-shadowcard-link">';
		// if($thumb_image!=""){
		//     $output .= '<img src="'.$thumb_image.'" alt="" class="cq-shadowcard-image" />';
		// }
		$output .= '<div style="width:100%;height:100%;background-position:center center;background-size:cover;background-image:url('.$thumb_image.')" class="cq-shadowcard-imageblock"></div>';
		$output .= '</a>';
		if($title!=""){
			$output .= '<h2 class="cq-shadowcard-title">'.$title.'</h2>';
		}
		$output .= '</div>';
		$output .= '</div>';
		return $output;

	}
}