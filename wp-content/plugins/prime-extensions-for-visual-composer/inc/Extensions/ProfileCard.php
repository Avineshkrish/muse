<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions {


	use Inc\Base\ExtensionsController;

	class ProfileCard extends ExtensionsController {
		private $button_str = "";

		public function extensions_register() {
			if ( ! $this->activated( 'profile_card' ) ) {
				return;
			}
			add_shortcode( 'prime_profilecard', array( $this, 'prime_profilecard_func' ) );
			add_shortcode( 'prime_profilecard_item', array( $this, 'prime_profilecard_item_func' ) );

			$this->profilecard();
		}

		public function profilecard() {
			vc_map( array(
				"name"                    => __( "Profile Card", 'prime_vc' ),
				"base"                    => "prime_profilecard",
				"class"                   => "prime_profilecard",
				"icon"                    => "primeicon-profilecard",
				"category"                => __( 'Prime VC Extensions', 'js_composer' ),
				"as_parent"               => array( 'only' => 'prime_profilecard_item' ),
				// "content_element" => false,
				// "is_container" => true,
				"js_view"                 => 'VcColumnView',
				"show_settings_on_create" => true,
				'description'             => __( 'Animate card with buttons', 'js_composer' ),
				"params"                  => array(
					array(
						"type"        => "attach_image",
						"heading"     => __( "Header image", "prime_vc" ),
						"param_name"  => "image",
						"value"       => "",
						"group"       => "Header Image",
						"description" => __( "", "prime_vc" ),
					),
					array(
						"type"             => "textfield",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"heading"          => __( 'Resize image to this width? <span style="color: blue;">(Pro Feature)</span> <a target="_blank" href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/">Get Pro Feature</a>', "prime_vc" ),
						"group"            => "Header Image",
						"param_name"       => "imagewidth",
						"value"            => "",
						"description"      => __( "Default we will use the original image, specify a width. For example, 200 will resize the image to width 200. ", "prime_vc" ),
					),
					array(
						"type"             => "textfield",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"heading"          => __( 'Header height <span style="color: blue;">(Pro Feature)</span> <a target="_blank" href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/"><br/>Get Pro Feature</a>', "prime_vc" ),
						"group"            => "Header Image",
						"param_name"       => "headerheight",
						"value"            => "",
						"description"      => __( "Default is 240 (in pixel), you can specify other value here. ", "prime_vc" ),
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Title", "prime_vc" ),
						"param_name"  => "title",
						"value"       => "",
						"group"       => "Text",
						"description" => __( "The title, can be a name or anything else.", "prime_vc" ),
					),
					array(
						"type"        => "textarea",
						"heading"     => __( "More description under the title", "prime_vc" ),
						"param_name"  => "carddesc",
						"value"       => "",
						"group"       => "Text",
						"description" => __( "You can put more description about current card.", "prime_vc" ),
					),

					//Custom Image Width
					array(
						'type'        => 'prime_slider',
						'heading'     => __( 'width of the card content <span style="color: blue;">(Pro Feature)</span> <a target="_blank" href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/"><br/>Get Pro Feature</a>', 'prime_vc' ),
						'param_name'  => 'elementwidth',
						'tooltip'     => __( 'Default is 100%, you can specify other value like <strong>80%</strong> etc here.', 'prime_vc' ),
						'min'         => 10,
						'max'         => 100,
						'step'        => 10,
						'value'       => 100,
						'unit'        => '%',
						"description" => __( "Default is 100%, you can specify other value like <strong>80%</strong> etc here.", "prime_vc" ),
					),

					array(
						"type"        => "dropdown",
						"holder"      => "",
						"class"       => "prime_vc",
						"heading"     => __( 'Auto delay animation <span style="color: blue;">(Pro Feature)</span> <a target="_blank" href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/"><br/>Get Pro Feature</a>', "prime_vc" ),
						"param_name"  => "autodelay",
						'value'       => array( 2, 3, 4, 5, 7, 10, __( 'Disable', 'prime_vc' ) => 0 ),
						'std'         => 0,
						"description" => __( "Auto animate the image in each X seconds.", "prime_vc" ),
					),
					array(
						"type"             => "dropdown",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"holder"           => "",
						"heading"          => __( "Hover transition", "prime_vc" ),
						"param_name"       => "transition",
						"value"            => array( "left to right" => "transition1", "right to left (pro only)" => "transition2" ),
						'std'              => 'transition1',
						"description"      => __( "Select the animation transition style.", "prime_vc" ),
					),
					array(
						"type"             => "dropdown",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"holder"           => "",
						"heading"          => __( "Trigger when user", "prime_vc" ),
						"param_name"       => "trigger",
						"value"            => array( "click" => "click", "mouse over (pro only)" => "mouseover" ),
						'std'              => 'click',
						"description"      => __( "Select how to display the buttons.", "prime_vc" ),
					),
					array(
						"type"        => "dropdown",
						// "edit_field_class" => "vc_col-xs-6 vc_column",
						"holder"      => "",
						"heading"     => __( 'Container shape <span style="color: blue;">(Pro Feature)</span> <a target="_blank" href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/"><br/>Get Pro Feature</a>', "prime_vc" ),
						"param_name"  => "containershape",
						"value"       => array( 'Rounded' => 'rounded', 'Square' => 'square', 'Round' => 'round' ),
						'std'         => 'square',
						"description" => __( "Select the built in shape for the container.", "prime_vc" ),
					),
					array(
						"type"             => "textfield",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"heading"          => __( "max width of the button", "prime_vc" ),
						"param_name"       => "maxbutton",
						"value"            => "",
						"description"      => __( "The max width of the button, default is 160 (in pixel).", "prime_vc" ),
					),
					array(
						"type"             => "textfield",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"heading"          => __( "Minimal height of the element", "prime_vc" ),
						"param_name"       => "minheight",
						"value"            => "",
						"description"      => __( "The minimal height of whole element, default is 270 (in pixel).", "prime_vc" ),
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Extra class name", "prime_vc" ),
						"param_name"  => "extraclass",
						"value"       => "",
						"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "prime_vc" ),
					),
					array(
						"type"        => "css_editor",
						"heading"     => __( "CSS", "prime_vc" ),
						"param_name"  => "css",
						"description" => __( "It's recommended to use this to customize the padding/margin only.", "prime_vc" ),
						"group"       => __( "Design options", "prime_vc" ),
					),
					array(
						"type"             => "prime_param_heading",
						"text"             => "<span class='phyoutubeparam'>
					<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
					src='https://www.youtube.com/embed/6V_uLz6Qbw8' frameborder='0' allowfullscreen>
					</iframe> 
				</span>",
						"param_name"       => "notification",
						'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
						"group"            => "Video Tutorial",
					),
				),
			) );
			// Profile Card Item MAPS
			vc_map( array(
					"name"                    => __( "Button", "prime_vc" ),
					"base"                    => "prime_profilecard_item",
					"class"                   => "prime_profilecard_item",
					"icon"                    => "child-primeicon-profilecard",
					"category"                => __( 'Prime VC Extensions', 'js_composer' ),
					"description"             => __( "Add icon and text", "prime_vc" ),
					"as_child"                => array( 'only' => 'prime_profilecard' ),
					"show_settings_on_create" => true,
					"content_element"         => true,
					"params"                  => array(
						array(
							"type"        => "textfield",
							"heading"     => __( "Button text", "prime_vc" ),
							"param_name"  => "buttontext",
							"value"       => "",
							'group'       => 'Button',
							"description" => __( "", "prime_vc" ),
						),
						array(
							"type"        => "checkbox",
							"holder"      => "",
							"heading"     => __( "Add icon", "prime_vc" ),
							"param_name"  => "addicon",
							"value"       => "",
							'group'       => 'Button',
							"description" => __( "", "prime_vc" ),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Icon library', 'js_composer' ),
							'value'       => array(
								__( 'Entypo', 'js_composer' )       => 'entypo',
								__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
								__( 'Open Iconic', 'js_composer' )  => 'openiconic',
								__( 'Typicons', 'js_composer' )     => 'typicons',
								__( 'Material', 'js_composer' )     => 'material',
								__( 'Linecons', 'js_composer' )     => 'linecons',
								// __( 'Mono Social', 'js_composer' ) => 'monosocial',
							),
							'admin_label' => true,
							'param_name'  => 'buttonicon',
							"group"       => "Button",
							'dependency'  => array(
								'element' => 'addicon',
								'value'   => 'true',
							),
							'description' => __( 'Select icon library.', 'js_composer' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'js_composer' ),
							'param_name'  => 'icon_fontawesome',
							'value'       => 'fa fa-user', // default value to backend editor admin_label
							'settings'    => array(
								'emptyIcon'    => true, // default true, display an "EMPTY" icon?
								'type'         => 'fontawesome',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
							),
							'dependency'  => array(
								'element' => 'buttonicon',
								'value'   => 'fontawesome',
							),
							"group"       => "Button",
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'js_composer' ),
							'param_name'  => 'icon_openiconic',
							'value'       => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
							'settings'    => array(
								'emptyIcon'    => false, // default true, display an "EMPTY" icon?
								'type'         => 'openiconic',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display
							),
							'dependency'  => array(
								'element' => 'buttonicon',
								'value'   => 'openiconic',
							),
							"group"       => "Button",
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'js_composer' ),
							'param_name'  => 'icon_typicons',
							'value'       => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
							'settings'    => array(
								'emptyIcon'    => false, // default true, display an "EMPTY" icon?
								'type'         => 'typicons',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display
							),
							'dependency'  => array(
								'element' => 'buttonicon',
								'value'   => 'typicons',
							),
							"group"       => "Button",
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							'type'       => 'iconpicker',
							'heading'    => __( 'Icon', 'js_composer' ),
							'param_name' => 'icon_entypo',
							'value'      => 'entypo-icon entypo-icon-user', // default value to backend editor admin_label
							'settings'   => array(
								'emptyIcon'    => false, // default true, display an "EMPTY" icon?
								'type'         => 'entypo',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display
							),
							"group"      => "Button",
							'dependency' => array(
								'element' => 'buttonicon',
								'value'   => 'entypo',
							),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'js_composer' ),
							'param_name'  => 'icon_linecons',
							'value'       => 'vc_li vc_li-heart', // default value to backend editor admin_label
							'settings'    => array(
								'emptyIcon'    => false, // default true, display an "EMPTY" icon?
								'type'         => 'linecons',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display
							),
							'dependency'  => array(
								'element' => 'buttonicon',
								'value'   => 'linecons',
							),
							"group"       => "Button",
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'js_composer' ),
							'param_name'  => 'icon_material',
							'value'       => 'vc-material vc-material-arrow_forward',
							// default value to backend editor admin_label
							'settings'    => array(
								'emptyIcon'    => false,
								// default true, display an "EMPTY" icon?
								'type'         => 'material',
								'iconsPerPage' => 4000,
								// default 100, how many icons per/page to display
							),
							'dependency'  => array(
								'element' => 'buttonicon',
								'value'   => 'material',
							),
							"group"       => "Button",
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							"type"             => "dropdown",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"holder"           => "",
							"heading"          => __( "Color", "prime_vc" ),
							"param_name"       => "buttoncolor",
							"value"            => array( 'Blue'        => 'blue',
							                             'Turquoise'   => 'turquoise',
							                             'Pink'        => 'pink',
							                             'Violet'      => 'violet',
							                             'Peacoc'      => 'peacoc',
							                             'Chino'       => 'chino',
							                             'Vista Blue'  => 'vista_blue',
							                             'Black'       => 'black',
							                             'Grey'        => 'grey',
							                             'Orange'      => 'orange',
							                             'Sky'         => 'sky',
							                             'Green'       => 'green',
							                             'Juicy pink'  => 'juicy_pink',
							                             'Sandy brown' => 'sandy_brown',
							                             'Purple'      => 'purple',
							                             'White'       => 'white',
							),
							'std'              => 'blue',
							'group'            => 'Button',
							"description"      => __( "", "prime_vc" ),
						),
						array(
							"type"             => "dropdown",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"holder"           => "",
							"heading"          => __( "Size", "prime_vc" ),
							"param_name"       => "buttonsize",
							"value"            => array( 'Mini' => 'xs', 'Small' => 'sm', ),
							'std'              => 'xs',
							'group'            => 'Button',
							"description"      => __( "", "prime_vc" ),
						),
						array(
							"type"             => "dropdown",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"holder"           => "",
							"heading"          => __( "Shape", "prime_vc" ),
							"param_name"       => "buttonshape",
							"value"            => array( 'Rounded' => 'rounded', 'Square' => 'square', 'Round' => 'round' ),
							'std'              => 'rounded',
							'group'            => 'Button',
							"description"      => __( "", "prime_vc" ),
						),
						array(
							"type"             => "vc_link",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"heading"          => __( "URL (Optional link for the button)", "prime_vc" ),
							"param_name"       => "buttonlink",
							"value"            => "",
							'group'            => 'Button',
							"description"      => __( "", "prime_vc" ),
						),

					),
				) );
		}


		function prime_profilecard_func($atts, $content=null) {
			$css_class = $css = $title = $image = $imagewidth = $headerheight = $isright = $transition = $containershape = $bgcolor = $minheight = $extraclass = $trigger = $autodelay = $maxbutton = $carddesc = $elementwidth = '';

			$this -> button_str = '';

			extract(shortcode_atts(array(
				"title" => "",
				"carddesc" => "",
				"image" => "",
				//"imagewidth" => "",
				//"headerheight" => "",
				"trigger" => "click",
				//"autodelay" => "0",
				"containershape" => "square",
				"isright" => "",
				"transition" => "transition1",
				"bgcolor" => "",
				"minheight" => "",
				"maxbutton" => "",
				//"elementwidth" => "100",
				"css" => "",
				"extraclass" => ""
			),$atts));

			$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ''), 'prime_profilecard', $atts);

			$path = plugin_dir_url( dirname( __FILE__, 2 ) );
			wp_register_script( 'profilecard_init_js', $path . 'assets/js/profile-card-init.js', array( "jquery" ) );
			wp_enqueue_script( 'profilecard_init_js' );

			$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
			$header_attachment = get_post($image);
			$headerimagearr = wp_get_attachment_image_src(trim($image), 'full');
			$header_image_temp = $header_image_url = "";
			$header_orgi_image = $headerimagearr[0];
			$header_image_url = $header_orgi_image;
			if( $imagewidth!="" ){
				if(function_exists('wpb_resize')){
					$header_image_temp = wpb_resize($image, null, $imagewidth, null);
					$header_image_url = $header_image_temp['url'];
					if($header_image_url=="") $header_image_url = $header_orgi_image;
				}
			}


			$output = '';
			$output .= '<div class="cq-profilecardv2 cq-profilecardv2-shape-square  cq-profilecardv2-transition1 '.$extraclass.' '.$css_class.'" data-bgcolor="'.$bgcolor.'" data-autodelay="0" data-minheight="'.$minheight.'" data-maxbutton="'.$maxbutton.'" data-trigger="click">';
			$output .= '<div class="cq-profilecardv2-container">';
			$output .= '<div class="cq-profilecardv2-panel">';
			$output .= do_shortcode($this -> button_str);
			$output .= '</div>';
			$output .= '<div class="cq-profilecardv2-content" style="width:100%">';
			if(240>0){
				$output .= '<div class="cq-profilecardv2-image" style="background:url('.$header_image_url.') center center no-repeat;background-size:cover;height:240px;"></div>';
			}else{
				$output .= '<div class="cq-profilecardv2-image" style="background:url('.$header_image_url.') center center no-repeat;background-size:cover;"></div>';
			}
			if($title!=""){
				$output .= '<div class="cq-profilecardv2-name">';
				$output .= '<h4 class="cq-profilecardv2-title">'.$title.'</h4 class="cq-profilecardv2-title">';
				$output .= '</div>';
			}
			if($carddesc!=""){
				$output .= '<p class="cq-profilecardv2-description">';
				$output .= $carddesc;
				$output .= '</p>';
			}
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			return $output;

		}


		function prime_profilecard_item_func($atts, $content=null, $tag) {
			$buttoncolor = $buttontext = $buttonshape = $buttonsize = $buttonlink = $addicon = "";
			$icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = $icon_pixelicons = $icon_material = '';
			$buttonicon = "entypo";
			$buttonstyle = "modern";

			extract(shortcode_atts(array(
				"buttontext" => "",
				"buttoncolor" => "blue",
				"buttonsize" => "xs",
				"buttonshape" => "rounded",
				"buttonstyle" => "modern",
				"buttonlink" => "",
				"addicon" => "",
				"buttonicon" => "entypo",
				"icon_fontawesome" => "fa fa-user",
				"icon_openiconic" => "vc-oi vc-oi-dial",
				"icon_typicons" => "typcn typcn-adjust-brightness",
				"icon_entypo" => "entypo-icon entypo-icon-user",
				"icon_linecons" => "vc_li vc_li-heart",
				"icon_material" => "vc-material vc-material-arrow_forward",
				"css" => ""
			), $atts));

			$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content

			vc_icon_element_fonts_enqueue($buttonicon);

			$button_str = $this -> button_str;

			$output = '';
			if($buttontext!=""||$addicon=="true"){
				$button_str .= '[vc_btn title="'.$buttontext.'" color="'.$buttoncolor.'" style="'.$buttonstyle.'" shape="'.$buttonshape.'" link="'.$buttonlink.'" size="'.$buttonsize.'" i_type="'.$buttonicon.'" i_icon_'.$buttonicon.'="'.esc_attr(${'icon_' . $buttonicon}).'" add_icon="'.$addicon.'" ]';
			}

			$this -> button_str = $button_str;

			return $output;

		}
	}
}
namespace {

	//Extend WPBakeryShortCodesContainer class to inherit all required functionality
	if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_prime_profilecard' ) ) {
		class WPBakeryShortCode_prime_profilecard extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'WPBakeryShortCode_prime_profilecard_item' ) ) {
		class WPBakeryShortCode_prime_profilecard_item extends WPBakeryShortCode {
		}
	}
}