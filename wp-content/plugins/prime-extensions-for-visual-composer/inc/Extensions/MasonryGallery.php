<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;


use Inc\Base\ExtensionsController;

class MasonryGallery extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'masonry_gallery' ) ) {
			return;
		}
		add_shortcode( 'prime_cq_vc_gallery', array( $this, 'prime_cq_vc_gallery_func' ) );

		$this->masonrygallery();
	}

	public function masonrygallery() {
		// gallery part
		// gallery part
		vc_map( array(
			"name" => __("Masonry Gallery", 'vc_gallery_cq'),
			"base" => "prime_cq_vc_gallery",
			"class" => "prime_cq_vc_extension_masonry",
			"controls" => "full",
			"icon" => "prime_massonary_gallery",
			"category" => __('Prime VC Extensions', 'js_composer'),
			'description' => __( 'Responsive grid gallery', 'js_composer' ),
			// 'admin_enqueue_js' => array(plugins_url('prime_vc_admin.js', __FILE__)),
			// 'admin_enqueue_css' => array(plugins_url('css/vc_gallery_cq_admin.css', __FILE__)),
			"params" => array(
				array(
					"type" => "attach_images",
					"heading" => __("Images", "vc_gallery_cq"),
					"param_name" => "images",
					"value" => "",
					"description" => __("Select images from media library.", "vc_gallery_cq")
				),
				array(
					"type" => "dropdown",
					"holder" => "",
					"class" => "vc_gallery_cq",
					"heading" => __("On click", "vc_gallery_cq"),
					"param_name" => "onclick",
					"value" => array(__("open large image (lightbox)", "vc_gallery_cq") => "link_image", __("Do nothing", "vc_gallery_cq") => "link_no", __("Open custom link", "vc_gallery_cq") => "custom_link"),
					"description" => __("Define action for onclick event if needed.", "vc_gallery_cq")
				),
				array(
					"type" => "exploded_textarea",
					"heading" => __("Custom links", "vc_gallery_cq"),
					"param_name" => "custom_links",
					"description" => __('Enter links for each slide here. Divide links with linebreaks (Enter).', 'vc_gallery_cq'),
					"dependency" => Array('element' => "onclick", 'value' => array('custom_link'))
				),
				array(
					"type" => "dropdown",
					"heading" => __("Custom link target", "vc_gallery_cq"),
					"param_name" => "custom_links_target",
					"description" => __('Select where to open custom links.', 'vc_gallery_cq'),
					"dependency" => Array('element' => "onclick", 'value' => array('custom_link')),
					'value' => array(__("Same window", "vc_gallery_cq") => "_self", __("New window", "vc_gallery_cq") => "_blank")
				),
				array(
					'type'             => 'prime_slider',
					'heading'          => __( "Container width", "Prime_vc" ),
					'param_name'       => 'itemwidth',
					'tooltip'          => __( 'The width of the whole contaienr, default is 100%. You can specify it with a smaller value, like 80%', 'prime_vc' ),
					'min'              => 150,
					'max'              => 600,
					'step'             => 1,
					'value'            => 240,
					'unit'             => '',
					"description" => __("Width of each thumbnail in the masonry gallery.", "prime_vc"),
				),
				array(
					'type'             => 'prime_slider',
					'heading'          => __( "Thumbnail padding <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "Prime_vc" ),
					'param_name'       => 'offset',
					//'tooltip'          => __( 'The width of the whole contaienr, default is 100%. You can specify it with a smaller value, like 80%', 'prime_vc' ),
					'min'              => 1,
					'max'              => 15,
					'step'             => 1,
					'value'            => 4,
					'unit'             => 'px',
					"description" => __("Padding between each thumbnail.", "prime_vc"),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "vc_gallery_cq",
					"heading" => __("Container offset <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'vc_gallery_cq'),
					"param_name" => "outeroffset",
					"value" => __("0", 'vc_gallery_cq'),
					"description" => __("Offset of the whole gallery to it's container.", 'vc_gallery_cq'),
					"group" => __("PRO Features", 'prime_vc')
				),

				array(
					'type'             => 'prime_slider',
					'heading'          => __( "min Width <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "Prime_vc" ),
					'param_name'       => 'minwidth',
					//'tooltip'          => __( 'The width of the whole contaienr, default is 100%. You can specify it with a smaller value, like 80%', 'prime_vc' ),
					'min'              => 240,
					'max'              => 800,
					'step'             => 1,
					'value'            => 240,
					'unit'             => 'px',
					"description" => __("Minimal width of the lightbox image.", "prime_vc"),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "checkbox",
					"holder" => "",
					"class" => "vc_gallery_cq",
					"heading" => __("Make the thumbnails retina?", 'vc_gallery_cq'),
					"param_name" => "retina",
					"value" => array(__("Yes", "vc_gallery_cq") => 'on'),
					"description" => __("For example a 640x480 thumbnail will display as 320x240 in retina mode.", 'vc_gallery_cq')
				),
				array(
					"type" => "checkbox",
					"holder" => "",
					"class" => "vc_gallery_cq",
					"heading" => __("Layout before all images are loaded? <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'vc_gallery_cq'),
					"param_name" => "imagesload",
					"value" => array(__("Yes", "vc_gallery_cq") => 'on'),
					"description" => __("Defalut the masonry layout is generated after images are all loaded, you can check this if your theme support instant layout.<br />Note: this will break the layout and make the images stacked in some theme, so check it carefully.", 'vc_gallery_cq'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "prime_param_heading",
					"text" => "<span class='phyoutubeparam' '>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/G2DydP6KCKQ' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group" => "Video Tutorial"
				),
			)
		));
	}


	// the gallery shortcode
	function prime_cq_vc_gallery_func( $atts, $content=null, $tag) {
		global $post;
		extract( shortcode_atts( array(
			'images' => '',
			'itemwidth' => '240',
			//'minwidth' => '240',
			//'offset' => '4',
			'onclick' => 'link_image',
			'custom_links' => '',
			'custom_links_target' => '',
			//'outeroffset' => '0',
			'background' => '#fff',
			'retina' => 'off',
			//'imagesload' => 'off',
			'margintop' => '40'
		), $atts ) );

		wp_enqueue_style('cq_pinterest_style', plugins_url('css/jquery.pinterest.css', __FILE__));
		wp_register_script('imagesload', plugins_url('js/imagesloaded.pkgd.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('imagesload');
		wp_register_script('wookmark', plugins_url('js/jquery.wookmark.min.js', __FILE__), array('jquery', 'imagesload'));
		wp_enqueue_script('wookmark');
		if($onclick=='link_image'){
			wp_register_script('fs.boxer', plugins_url('js/jquery.fs.boxer.min.js', __FILE__), array('jquery'));
			wp_enqueue_script('fs.boxer');
			wp_register_style('fs.boxer', plugins_url('css/jquery.fs.boxer.css', __FILE__));
			wp_enqueue_style('fs.boxer');
		}else if($onclick=="custom_link"){
			$custom_links = explode( ',', $custom_links);
		}

		$imagesarr = explode(',', $images);
		$output = '';
		$output .= '<ul class="pinterest-container" data-onclick="'.$onclick.'" data-itemwidth="'.$itemwidth.'" data-minwidth="240" data-offset="4" data-outeroffset="0" data-id="'.$post->ID.rand(0, 100).'" data-imagesload="off">';
		$i = -1;
		foreach ($imagesarr as $key => $value) {
			$i++;
			$output .= "<li style='list-style:none;display:none'>";
			if(wp_get_attachment_image_src(trim($value), 'full')){
				$return_img_arr = wp_get_attachment_image_src(trim($value), 'full');

				$img = $thumbnail = $return_img_height = "";
				$fullimage = $return_img_arr[0];
				$thumbnail = $fullimage;
				if($itemwidth!=""){
					if(function_exists('wpb_resize')){
						$img = wpb_resize($value, null, $retina=="on"?$itemwidth*2:$itemwidth, null);
						$thumbnail = $img['url'];
						$return_img_height = $retina=="on"?$img['height']*0.5:$img['height'];
						if($thumbnail=="") $thumbnail = $fullimage;
					}
				}

				// $return_img_height = getimagesize(aq_resize($return_img_arr[0], $itemwidth));
				if($onclick=='link_image'){
					$output .= "<a href='".$return_img_arr[0]."' class='lightbox-link' rel='cq-pinterst-".$post->ID."'>";
					$output .= "<img src='".$thumbnail."' width='$itemwidth' height='".$return_img_height."' />";
					$output .= "</a>";
				}else if($onclick=='custom_link'){
					if($i<count($custom_links)){
						$output .= "<a href='".$custom_links[$i]."' target='".$custom_links_target."'>";
						$output .= "<img src='".$thumbnail."' width='$itemwidth' height='".$return_img_height."' />";
						$output .= "</a>";
					}else{
						$output .= "<img src='".$thumbnail."' width='$itemwidth' height='".$return_img_height."' />";
					}
				}else{
					$output .= "<img src='".$thumbnail."' width='$itemwidth' height='".$return_img_height."' />";
				}
			}
			$output .= "</li>";
		}
		$output .= '</ul>';

		return $output;

	}
}