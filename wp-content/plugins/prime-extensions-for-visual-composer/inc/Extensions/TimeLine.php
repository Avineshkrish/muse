<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions {

	use Inc\Base\ExtensionsController;

	class TimeLine extends ExtensionsController {

		public function extensions_register() {

			if ( ! $this->activated( 'timeline' ) ) {
				return;
			}

			$this->timeline();
			add_shortcode( 'primevc_timeline', array( $this, 'primevc_timeline_container' ) );
			add_shortcode( 'primevc_timeline_item', array( $this, 'prime_vc_timeline_item' ) );


		}

		public function timeline() {
			if ( function_exists( "vc_map" ) ) {
				vc_map( array(
					"name"                    => __( "TimeLine", 'prime_vc' ),
					"base"                    => "primevc_timeline",
					"class"                   => "primevc_timeline",
					"icon"                    => "primevc_timeline",
					"category"                => __( 'Prime VC Extensions', 'prime_vc' ),
					"as_parent"               => array( 'only' => 'primevc_timeline_item' ),
					// "content_element" => false,
					// "is_container" => true,
					"js_view"                 => 'VcColumnView',
					"show_settings_on_create" => true,
					'description'             => __( 'responsive timeline', 'prime_vc' ),
					"params"                  => array(

						array(
							"type"        => "dropdown",
							"holder"      => "",
							"heading"     => __( "Timeline content rounded radius", "prime_vc" ),
							"param_name"  => "roundradius",
							"value"       => array(
								"small (4px)"  => "small",
								"medium (8px)" => "medium",
								"large (16px)" => "large",
								"square (0px)" => "square",
							),
							'std'         => 'small',
							"description" => __( "Select the built in rounded radius for the timeline content.", "prime_vc" ),
						),

						array(
							"type"             => "dropdown",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"holder"           => "",
							"heading"          => __( "Timeline border color", "prime_vc" ),
							"param_name"       => "bordercolor",
							"value"            => array(
								"White"        => "white",
								"Aqua"         => "aqua",
								"Grape Fruit"  => "grapefruit",
								"Bitter Sweet" => "bittersweet",
								"Sunflower"    => "sunflower",
								"Grass"        => "grass",
								"Mint"         => "mint",
								"Blue Jeans"   => "bluejeans",
								"Lavender"     => "lavender",
								"Pink Rose"    => "pinkrose",
								"Light Gray"   => "lightgray",
								"Medium Gray"  => "mediumgray",
								"Dark Gray"    => "darkgray",
								"Transparent"  => "transparent",
							),
							'std'              => 'aqua',
							"description"      => __( "Select the built-in color for the border.", "prime_vc" ),
						),
						array(
							"type"             => "dropdown",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"holder"           => "",
							"heading"          => __( "Timeline border size", "prime_vc" ),
							"param_name"       => "bordersize",
							"value"            => array( "small (2px)" => "small", "large (4px)" => "large", "tiny (1px)" => "tiny" ),
							'std'              => 'small',
							"description"      => __( "Select the built in border size for the timeline.", "prime_vc" ),
						),
						array(
							"type"        => "colorpicker",
							"class"       => "",
							"heading"     => __( "customize background color for the border", 'prime_vc' ),
							"param_name"  => "bordercustomcolor",
							"value"       => "",
							'dependency'  => array(
								'element' => 'bordercolor',
								'value'   => 'customized',
							),
							"description" => __( "", 'prime_vc' ),
						),
						array(
							"type"        => "checkbox",
							"heading"     => __( "Move the timeline item when user hover?", "prime_vc" ),
							"param_name"  => "ismove",
							"value"       => "no",
							"description" => __( "", "prime_vc" ),
						),
						// array(
						//   "type" => "checkbox",
						//   "heading" => __("Display the timeline content on the right side only?", "prime_vc"),
						//   "param_name" => "isright",
						//   "value" => "no",
						//   "description" => __("", "prime_vc")
						// ),
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
					),
				) );

				vc_map( array(
					"name"                    => __( "TimeLine Item", "prime_vc" ),
					"base"                    => "primevc_timeline_item",
					"class"                   => "primevc_timeline_item",
					"icon"                    => "primevc_timeline",
					"category"                => __( 'Prime VC Extensions', 'prime_vc' ),
					"description"             => __( "Add timeline content", "prime_vc" ),
					"as_child"                => array( 'only' => 'primevc_timeline' ),
					"show_settings_on_create" => true,
					"content_element"         => true,
					"params"                  => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Icon library', 'prime_vc' ),
							'value'       => array(
								__( 'Entypo', 'prime_vc' )       => 'entypo',
								__( 'Font Awesome', 'prime_vc' ) => 'fontawesome',
								__( 'Open Iconic', 'prime_vc' )  => 'openiconic',
								__( 'Typicons', 'prime_vc' )     => 'typicons',
								__( 'Material', 'prime_vc' )     => 'material',
								__( 'Linecons', 'prime_vc' )     => 'linecons',
								// __( 'Mono Social', 'prime_vc' ) => 'monosocial',
							),
							'admin_label' => true,
							'param_name'  => 'timelineicon',
							"group"       => "Icon",
							'description' => __( 'Select icon library.', 'prime_vc' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'prime_vc' ),
							'param_name'  => 'icon_fontawesome',
							'value'       => 'fa fa-user', // default value to backend editor admin_label
							'settings'    => array(
								'emptyIcon'    => true, // default true, display an "EMPTY" icon?
								'type'         => 'fontawesome',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
							),
							'dependency'  => array(
								'element' => 'timelineicon',
								'value'   => 'fontawesome',
							),
							"group"       => "Icon",
							'description' => __( 'Select icon from library.', 'prime_vc' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'prime_vc' ),
							'param_name'  => 'icon_openiconic',
							'value'       => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
							'settings'    => array(
								'emptyIcon'    => false, // default true, display an "EMPTY" icon?
								'type'         => 'openiconic',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display
							),
							'dependency'  => array(
								'element' => 'timelineicon',
								'value'   => 'openiconic',
							),
							"group"       => "Icon",
							'description' => __( 'Select icon from library.', 'prime_vc' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'prime_vc' ),
							'param_name'  => 'icon_typicons',
							'value'       => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
							'settings'    => array(
								'emptyIcon'    => false, // default true, display an "EMPTY" icon?
								'type'         => 'typicons',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display
							),
							'dependency'  => array(
								'element' => 'timelineicon',
								'value'   => 'typicons',
							),
							"group"       => "Icon",
							'description' => __( 'Select icon from library.', 'prime_vc' ),
						),
						array(
							'type'       => 'iconpicker',
							'heading'    => __( 'Icon', 'prime_vc' ),
							'param_name' => 'icon_entypo',
							'value'      => 'entypo-icon entypo-icon-user', // default value to backend editor admin_label
							'settings'   => array(
								'emptyIcon'    => false, // default true, display an "EMPTY" icon?
								'type'         => 'entypo',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display
							),
							"group"      => "Icon",
							'dependency' => array(
								'element' => 'timelineicon',
								'value'   => 'entypo',
							),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'prime_vc' ),
							'param_name'  => 'icon_linecons',
							'value'       => 'vc_li vc_li-heart', // default value to backend editor admin_label
							'settings'    => array(
								'emptyIcon'    => false, // default true, display an "EMPTY" icon?
								'type'         => 'linecons',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display
							),
							'dependency'  => array(
								'element' => 'timelineicon',
								'value'   => 'linecons',
							),
							"group"       => "Icon",
							'description' => __( 'Select icon from library.', 'prime_vc' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'prime_vc' ),
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
								'element' => 'timelineicon',
								'value'   => 'material',
							),
							"group"       => "Icon",
							'description' => __( 'Select icon from library.', 'prime_vc' ),
						),
						array(
							"type"             => "dropdown",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"holder"           => "",
							"heading"          => __( "Icon background color", "prime_vc" ),
							"param_name"       => "iconbgstyle",
							"value"            => array(
								"White"        => "white",
								"Aqua"         => "aqua",
								"Grape Fruit"  => "grapefruit",
								"Bitter Sweet" => "bittersweet",
								"Sunflower"    => "sunflower",
								"Grass"        => "grass",
								"Mint"         => "mint",
								"Blue Jeans"   => "bluejeans",
								"Lavender"     => "lavender",
								"Pink Rose"    => "pinkrose",
								"Light Gray"   => "lightgray",
								"Medium Gray"  => "mediumgray",
								"Dark Gray"    => "darkgray",
								"Transparent"  => "transparent",
							),
							'std'              => 'mediumgray',
							'group'            => 'Icon',
							"description"      => __( "Select the built in background color for the icon.", "prime_vc" ),
						),
						array(
							"type"             => "colorpicker",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"class"            => "",
							"heading"          => __( "Icon color", 'prime_vc' ),
							"param_name"       => "iconcolor",
							"value"            => "",
							'group'            => 'Icon',
							"description"      => __( "Default is white.", 'prime_vc' ),
						),
						array(
							"type"        => "dropdown",
							"holder"      => "",
							"heading"     => __( "TimeLine Item Background Color", "prime_vc" ),
							"param_name"  => "itembackground",
							"value"       => array(
								"White"          => "white",
								"Aqua"           => "aqua",
								"Grape Fruit"    => "grapefruit",
								"Bitter Sweet"   => "bittersweet",
								"Sunflower"      => "sunflower",
								"Grass"          => "grass",
								"Mint"           => "mint",
								"Blue Jeans"     => "bluejeans",
								"Lavender"       => "lavender",
								"Pink Rose"      => "pinkrose",
								"Light Gray"     => "lightgray",
								"Medium Gray"    => "mediumgray",
								"Dark Gray"      => "darkgray",
								"Transparent"    => "transparent",
								//"or customize :" => "customized",
							),
							'std'         => 'aqua',
							"description" => __( "Select the built in background color for the timeline content.", "prime_vc" ),
						),
/*						array(
							"type"        => "colorpicker",
							"class"       => "",
							"heading"     => __( "TimeLine Item background color", 'prime_vc' ),
							"param_name"  => "itembackgroundcolor",
							'dependency'  => array(
								'element' => 'itembackground',
								'value'   => 'customized',
							),
							'std'         => '#FFFFFF',
							"description" => __( "Select the built in background color for the timeline content.", 'prime_vc' ),
						),*/
						array(
							"type"        => "textfield",
							"heading"     => __( "Main label around the icon (optional)", "prime_vc" ),
							"param_name"  => "itemdate",
							"value"       => "",
							"description" => __( "Main label around the icon, can be a date (like <strong>jan 15, 2018</strong>) or name.", "prime_vc" ),
						),
						array(
							"type"             => "textfield",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"heading"          => __( "Main label font size", "prime_vc" ),
							"param_name"       => "datesize",
							"value"            => "",
							"description"      => __( "", "prime_vc" ),
						),
						array(
							"type"             => "colorpicker",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"class"            => "",
							"heading"          => __( "Main label color", 'prime_vc' ),
							"param_name"       => "datecolor",
							"value"            => "",
							"description"      => __( "", 'prime_vc' ),
						),
						array(
							"type"        => "textfield",
							"heading"     => __( "Sub label (optional)", "prime_vc" ),
							"param_name"  => "itemlabel",
							"value"       => "",
							"description" => __( "Optional sub label under the main label. Can be a role like <strong>Web Developer</strong>.", "prime_vc" ),
						),

						array(
							"type"        => "textfield",
							"heading"     => __( "Title of the timeline (optional)", "prime_vc" ),
							"param_name"  => "itemtitle",
							"value"       => "",
							"description" => __( "", "prime_vc" ),
						),
						array(
							"type"             => "textfield",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"heading"          => __( "Title font size", "prime_vc" ),
							"param_name"       => "titlesize",
							"value"            => "",
							"description"      => __( "Optional title in the timeline content.", "prime_vc" ),
						),
						array(
							"type"             => "colorpicker",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"class"            => "",
							"heading"          => __( "Title color", 'prime_vc' ),
							"param_name"       => "titlecolor",
							"value"            => "",
							"description"      => __( "", 'prime_vc' ),
						),
						array(
							"type"        => "textarea_html",
							"heading"     => __( "Timeline content", "prime_vc" ),
							"param_name"  => "content",
							"value"       => "",
							"description" => __( "You can put more details about the title.", "prime_vc" ),
						),
						array(
							"type" => "prime_param_heading",
							"text" => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/G4SHaMROSPI' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
							"param_name" => "notification",
							'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
							"group" => "Video Tutorial"
						),
					),
				) );
			}
		}

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
		public function primevc_timeline_container( $atts, $content = null ) {
			$css_class = $css = $ismove = $isright = $bordercolor = $roundradius = $bordersize = $bordercustomcolor = $extraclass = '';
			extract( shortcode_atts( array(
				"roundradius"       => "small",
				"bordersize"        => "small",
				"ismove"            => "",
				"isright"           => "",
				"bordercolor"       => "aqua",
				"bordercustomcolor" => "",
				"css"               => "",
				"extraclass"        => "",
			), $atts ) );


			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), 'primevc_timeline', $atts );

			wp_register_style( 'vc-extensions-timeline-style', plugins_url( 'css/style.css', __FILE__ ) );
			wp_enqueue_style( 'vc-extensions-timeline-style' );


			$content = wpb_js_remove_wpautop( $content, true ); // fix unclosed/unwanted paragraph tags in $content

			$output = '';
			$output .= '<div style="" class="prime-timeline prime-timeline-border-' . $bordersize . ' prime-timeline-round-' . $roundradius . ' prime-timeline-move' . $ismove . ' prime-timeline-border' . $bordercolor . ' ' . $extraclass . ' ' . $css_class . '" data-bordercustomcolor="' . $bordercustomcolor . '">';
			$output .= '<ul class="prime-timeline-list">';
			$output .= do_shortcode( $content );
			$output .= '</ul>';
			$output .= '</div>';

			return $output;

		}


		function prime_vc_timeline_item( $atts, $content = null, $tag ) {
			$title       = $contentcolor = $itemtitle = $itemdate = $itemlabel = $itemlink = $itembackground = $itembackgroundcolor = $timelineicon = $titlesize = $titlecolor = $datesize = $datecolor = "";
			$iconbgstyle = $iconcolor = $iconbgcolor = $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = $icon_pixelicons = $icon_material = '';
			extract( shortcode_atts( array(
				"itembackground"      => "aqua",
				"itembackgroundcolor" => "",
				"title"               => "",
				"itemtitle"           => "",
				"itemdate"            => "",
				"itemlabel"           => "",
				"titlecolor"          => "",
				"titlesize"           => "",
				"datecolor"           => "",
				"datesize"            => "",
				"contentcolor"        => "",
				"itemlink"            => "",
				"iconcolor"           => "",
				"iconbgstyle"         => "mediumgray",
				"icon_fontawesome"    => "fa fa-user",
				"icon_openiconic"     => "vc-oi vc-oi-dial",
				"icon_typicons"       => "typcn typcn-adjust-brightness",
				"icon_entypo"         => "entypo-icon entypo-icon-user",
				"icon_linecons"       => "vc_li vc_li-heart",
				"icon_material"       => "vc-material vc-material-arrow_forward",
				"timelineicon"        => "entypo",
				"css"                 => "",
			), $atts ) );

			$content = wpb_js_remove_wpautop( $content, true );


			vc_icon_element_fonts_enqueue( $timelineicon );
			$output     = '';
/*			$itmbgcolor = '';
			if ( $itembackground == 'customized' ) {
				$itembackground = '';
				$itmbgcolor     = $itembackgroundcolor;
			}
			$itembackgroundcolor = "";*/
			$output              .= '<li " class="prime-timeline-row prime-timeline-style-' . $itembackground . '" data-contentcolor="' . $contentcolor . '">';
			$output              .= '<div class="prime-timeline-item">';
			$output              .= '<div class="prime-timeline-contentcontainer">';
			if ( isset( ${'icon_' . $timelineicon} ) ) {
				$output .= '<div class="prime-timeline-icon-' . $iconbgstyle . ' prime-timeline-iconcontainer">';
				$output .= '<i class="prime-timeline-icon ' . esc_attr( ${'icon_' . $timelineicon} ) . '" style="color:' . $iconcolor . ';background-color:' . $iconbgcolor . ';"></i>';
				$output .= '</div>';
			}

			$output .= '<div class="prime-timeline-content">';
			if ( $itemtitle != "" ) {
				$output .= '<h4 class="prime-timeline-title" style="color:' . $titlecolor . ';font-size:' . $titlesize . ';"> ' . $itemtitle . '</h4>';
			}
			if ( $content != "" ) {
				$output .= '<p class="prime-timeline-text"> ' . do_shortcode( $content ) . '</p>';
			}
			$output .= '</div>';

			$output .= '</div>';
			$output .= '<div class="prime-timeline-label">';
			$output .= '<p class="prime-timeline-text" style="color:' . $titlecolor . ';font-size:' . $titlesize . ';">';
			if ( $itemlabel != "" ) {
				$output .= $itemlabel;
				$output .= '<br />';
			}
			if ( $itemdate != "" ) {
				$output .= $itemdate;
			}
			$output .= '</p>';
			$output .= '</div>';

			$output .= '</div>';

			$output .= '</li>';

			return $output;

		}
	}

}
namespace {

	// initialize code For TimeLine
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_primevc_timeline extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_primevc_timeline_item extends WPBakeryShortCode {
		}
	}
}