<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions {

	use Inc\Base\ExtensionsController;

	class PrimeTab extends ExtensionsController {
		public function extensions_register() {
			if ( ! $this->activated( 'prime_tab' ) ) {
				return;
			}

			add_shortcode( 'prime_vc_tabs', array( $this, 'prime_tabs_function' ) );
			add_shortcode( 'prime_vc_tab_item', array( $this, 'prime_tab_item_function' ) );

			$this->primetab();
		}

		public function primetab() {
			vc_map( array(
				"name"        => __( "Prime Tabs", 'prime_vc_tab_td' ),
				"base"        => "prime_vc_tabs",
				"class"       => "prime_vc_extension_tab",
				"controls"    => "full",
				"icon"        => "prime_tab",
				"category"    => __( 'Prime VC Extensions', 'js_composer' ),
				"as_parent"   => array( 'only' => 'prime_vc_tab_item' ),
				"js_view"     => 'VcColumnView',
				'description' => __( 'Tabbed content', 'js_composer' ),
				"params"      => array(
					array(
						"type"        => "dropdown",
						"holder"      => "",
						"class"       => "prime_vc_tab_td",
						"heading"     => __( "Select tabs style", "prime_vc_tab_td" ),
						"param_name"  => "tabsstyle",
						"value"       => array(
							__( "style 1", "prime_vc_tab_td" )            => "style1",
							__( "style 2 (Pro Only)", "prime_vc_tab_td" ) => "",
							__( "style 3 (Pro Only)", "prime_vc_tab_td" ) => "",
						),
						"description" => __( "", "prime_vc_tab_td" ),
					),

					array(
						'type'        => 'prime_slider',
						'heading'     => __( "Container width", "Prime_vc" ),
						'param_name'  => 'con_width',
						'tooltip'     => __( 'The width of the whole contaienr, default is 100%. You can specify it with a smaller value, like 80%', 'prime_vc' ),
						'min'         => 30,
						'max'         => 100,
						'step'        => 10,
						'value'       => 100,
						'unit'        => '%',
						"description" => __( "The width of the whole contaienr, default is 100%. You can specify it with a smaller value, like 80%, and it will align center automatically.", "prime_vc" ),
					),
					array(
						"type"             => "colorpicker",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"holder"           => "div",
						"class"            => "",
						"heading"          => __( "Content font color <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc_tab_td' ),
						"param_name"       => "contentcolor2",
						"value"            => '',
						"description"      => __( "The color of tabs content.", 'prime_vc_tab_td' ),
					),
					array(
						"type"             => "colorpicker",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"holder"           => "div",
						"class"            => "",
						"heading"          => __( "Content background color <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc_tab_td' ),
						"param_name"       => "contentbg2",
						"value"            => '',
						"description"      => __( "The background color of tabs content.", 'prime_vc_tab_td' ),
					),
					array(
						"type"             => "colorpicker",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"holder"           => "div",
						"class"            => "",
						"heading"          => __( "Tab menu color <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc_tab_td' ),
						"param_name"       => "titlecolor",
						"value"            => '',
						"description"      => __( "The font color of tab in normal mode.", 'prime_vc_tab_td' ),
					),
					array(
						"type"             => "colorpicker",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"holder"           => "div",
						"class"            => "",
						"heading"          => __( "Tab menu background color <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc_tab_td' ),
						"param_name"       => "titlebg",
						"value"            => '',
						"description"      => __( "The background color of tab in normal mode.", 'prime_vc_tab_td' ),
					),
					array(
						"type"             => "colorpicker",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"holder"           => "div",
						"class"            => "",
						"heading"          => __( "Tab menu hover font color <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc_tab_td' ),
						"param_name"       => "titlehovercolor",
						// "dependency" => Array('element' => "tabsstyle", 'value' => array('style2')),
						"value"            => '',
						"description"      => __( "The font color of tab when user hover or in current mode.", 'prime_vc_tab_td' ),
					),
					array(
						"type"             => "colorpicker",
						"edit_field_class" => "vc_col-xs-6 vc_column",
						"holder"           => "div",
						"class"            => "",
						"heading"          => __( "Tab menu background hover color <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc_tab_td' ),
						"param_name"       => "titlehoverbg",
						// "dependency" => Array('element' => "tabsstyle", 'value' => array('style2')),
						"value"            => '',
						"description"      => __( "The background color of tab when user hover or in current mode.", 'prime_vc_tab_td' ),
					),

					array(
						"type"        => "prime_switch",
						"heading"     => __( "Auto Rotate Tabs? <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc" ),
						"param_name"  => "rorate_tabs",
						'value'       => array( __( 'Link', 'prime_vc' ) => 'off' ),
						"options"     => array(
							"on" => array(
								"label" => __( "", "prime_vc" ),
								"on"    => "Yes",
								"off"   => "No",
							),
						),
						"default_set" => false,
						"description" => "Switch Yes If you want Auto Rorate On TABS items. Default Is Off",
					),


					array(
						'type'        => 'prime_slider',
						'heading'     => __( "Auto Rotate Tabs <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "RD_vc" ),
						'param_name'  => 'rotatetabs',
						'tooltip'     => __( 'Choose Auto rotate tabs each X seconds. dafault is 3', 'prime_vc' ),
						'min'         => 1,
						'max'         => 20,
						'step'        => 1,
						'value'       => 3,
						'unit'        => '',
						"description" => __( "Auto rotate tabs each X seconds.", "prime_vc" ),
						"dependency"  => array( 'element' => 'rorate_tabs', 'value' => 'on' ),
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Extra class name for the container", "prime_vc_tab_td" ),
						"param_name"  => "extra_class",
						"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "prime_vc_tab_td" ),
					),
					array(
						"type"             => "prime_param_heading",
						"text"             => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/Jees08xrBmA' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
						"param_name"       => "notification",
						'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
						"group"            => "Video Tutorial",
					),

				),
			) );


			// TAB Item MAPS

			vc_map( array(
					"name"                    => __( "Tab Item", "prime_vc" ),
					"base"                    => "prime_vc_tab_item",
					"class"                   => "prime_vc_tab_item",
					"icon"                    => "prime_tab",
					"category"                => __( 'Prime VC Extensions', 'js_composer' ),
					"description"             => __( "Add the title and content", "prime_vc" ),
					"as_child"                => array( 'only' => 'prime_vc_tabs' ),
					"show_settings_on_create" => true,
					"content_element"         => true,
					"params"                  => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Icon library', 'js_composer' ),
							'value'       => array(
								__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
								__( 'Entypo', 'js_composer' )       => 'entypo',
								__( 'Open Iconic', 'js_composer' )  => 'openiconic',
								__( 'Typicons', 'js_composer' )     => 'typicons',
								__( 'Linecons', 'js_composer' )     => 'linecons',
								// __( 'Mono Social', 'js_composer' ) => 'monosocial',
							),
							'admin_label' => true,
							'param_name'  => 'tabicon',
							'description' => __( 'Select icon library.', 'js_composer' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => __( 'Icon', 'js_composer' ),
							'param_name'  => 'icon_fontawesome',
							'value'       => '', // default value to backend editor admin_label
							'settings'    => array(
								'emptyIcon'    => true, // default true, display an "EMPTY" icon?
								'type'         => 'fontawesome',
								'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
							),
							'dependency'  => array(
								'element' => 'tabicon',
								'value'   => 'fontawesome',
							),
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
								'element' => 'tabicon',
								'value'   => 'openiconic',
							),
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
								'element' => 'tabicon',
								'value'   => 'typicons',
							),
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
							'dependency' => array(
								'element' => 'tabicon',
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
								'element' => 'tabicon',
								'value'   => 'linecons',
							),
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							"type"        => "textfield",
							"holder"      => "",
							"class"       => "vc_tab_cq",
							"heading"     => __( "Tab title", 'vc_tab_cq' ),
							"param_name"  => "tabtitle",
							"value"       => __( "", 'vc_tab_cq' ),
							"description" => __( "", 'vc_tab_cq' ),
						),
						array(
							"type"        => "textarea_html",
							"holder"      => "div",
							"heading"     => __( "Tab content", "vc_tab_cq" ),
							"param_name"  => "content",
							"value"       => __( "", "vc_tab_cq" ),
							"description" => __( "", "vc_tab_cq" ),
						),


					),
				) );
		}


		function prime_tabs_function( $atts, $content = null, $tag ) {
			$tabsstyle = $titlebg = $titlecolor = $titlehoverbg = $contentbg = $contentcolor = "";
			extract( shortcode_atts( array(
				//'tabsstyle' => 'style1',
				//  'titlecolor' => '',
				//'titlebg' => '',
				'titlehoverbg'   => '',
				// 'titlehovercolor' => '',
				'tabstitlesize2' => '',
				'contentcolor1'  => '',
				'contentbg1'     => '',
				'contentcolor2'  => '',
				'contentbg2'     => '',
				'con_width'      => '',
				//'rotatetabs' => '0',
				'iconsupport'    => 'yes',
				'extra_class'    => '',
			), $atts ) );


			if ( $tabsstyle == "style2" ) {
				$contentcolor = $contentcolor2;
				$contentbg    = $contentbg2;
			} else {
				$contentcolor = $contentcolor1;
				$contentbg    = $contentbg1;
			}


			$this->tabsstyle = $tabsstyle;
			$this->titlebg   = $titlebg;
			//$this -> titlecolor = $titlecolor;
			$this->titlehoverbg = $titlehoverbg;
			$this->contentbg    = $contentbg;
			$this->contentcolor = $contentcolor;
			$this->menu_str     = '';

			$path = plugin_dir_url( dirname( __FILE__, 2 ) );

			wp_register_script( 'prime_vc_tab_td_script', $path . 'assets/js/prime-tab.js', array( "jquery" ) );
			wp_enqueue_script( 'prime_vc_tab_td_script' );

			$i = - 1;

			$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
			$output  = '';
			// $all_start = $all_end = '';
			// $menu_start = $menu_content = $menu_end = '';
			//$container_start = $container_content = $container_end = '';
			//$rotatetabs  = $atts[ 'rotatetabs' ] != '' ? (int) esc_attr( $atts[ 'rotatetabs' ] ) : 3;
			$con_width = $atts['con_width'] != '' ? (int) esc_attr( $atts['con_width'] ) : 100;

			$output .= '<div class="cq-tabs ' . $extra_class . '" style="width:' . $con_width . '%" data-tabsstyle="style1" data-titlebg="" data-titlecolor="#fff;" data-titlehoverbg="" data-titlehovercolor="" data-rotatetabs="0">';


			if ( $style1 == "style1" ) {
				$output .= '<ul class="cq-tabmenu style1" style="background-color:' . $titlebg . ';border-bottom-color:;">';
			} else {
				$output .= '<ul class="cq-tabmenu style1">';
			}
			$output .= $this->menu_str;
			$output .= '</ul>';

			$output .= '<div class="cq-tabcontent style1" style="background:' . $contentbg . ';">';
			$output .= do_shortcode( $content );
			$output .= '</div>';
			$output .= '</div>';

			return $output;

		}

		function prime_tab_item_function( $atts, $content = null, $tag ) {
			$tabicon = $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = $icon_pixelicons = $icon_monosocial = "";
			extract( shortcode_atts( array(
				"tabicon"          => "fontawesome",
				"icon_fontawesome" => "",
				"icon_openiconic"  => "vc-oi vc-oi-dial",
				"icon_typicons"    => "typcn typcn-adjust-brightness",
				"icon_entypo"      => "entypo-icon entypo-icon-user",
				"icon_linecons"    => "vc_li vc_li-heart",
				"icon_pixelicons"  => "",
				"icon_monosocial"  => "",
				"tabtitle"         => "",
			), $atts ) );

			vc_icon_element_fonts_enqueue( $tabicon );

			$output = '';

			$menu_str = $this->menu_str;

			if ( ! isset( $tabtitle ) || $tabtitle == "" ) {
				$tabtitle = 'Tab';
			}
			if ( $this->tabsstyle == "style3" ) {
				$menu_str .= '<li style="background-color:' . $this->titlebg . ';">';
				$menu_str .= '<a href="#" style="color:' . $this->titlecolor . ';">';
				$menu_str .= '<span>';
				// if($tabsicon[$i]!="")$menu_str .= '<i class="fa pull-left fa-1x '.$tabsicon[$i].'"></i>';
				if ( version_compare( WPB_VC_VERSION, "4.4" ) >= 0 && isset( ${'icon_' . $tabicon} ) && esc_attr( ${'icon_' . $tabicon} ) != "" ) {
					$menu_str .= '<i class="cq-tab-icon ' . esc_attr( ${'icon_' . $tabicon} ) . '"></i> ';
				}
				$menu_str .= $tabtitle;
				$menu_str .= '</span>';
				$menu_str .= '</a>';
				$menu_str .= '</li>';
			} else if ( $this->tabsstyle == "style2" ) {
				$menu_str .= '<li>';
				$menu_str .= '<a href="#" style="background-color:' . $this->titlebg . ';color:' . $this->titlecolor . ';">';
				if ( version_compare( WPB_VC_VERSION, "4.4" ) >= 0 && isset( ${'icon_' . $tabicon} ) && esc_attr( ${'icon_' . $tabicon} ) != "" ) {
					$menu_str .= '<i class="cq-tab-icon ' . esc_attr( ${'icon_' . $tabicon} ) . '"></i> ';
				}
				$menu_str .= $tabtitle;
				$menu_str .= '</a>';
				$menu_str .= '</li>';
			} else {
				$menu_str .= '<li style="background-color:' . $this->titlebg . ';">';
				$menu_str .= '<a href="#" style="color:' . $this->titlecolor . ';">';
				if ( version_compare( WPB_VC_VERSION, "4.4" ) >= 0 && isset( ${'icon_' . $tabicon} ) && esc_attr( ${'icon_' . $tabicon} ) != "" ) {
					$menu_str .= '<i class="cq-tab-icon ' . esc_attr( ${'icon_' . $tabicon} ) . '"></i> ';
				}
				$menu_str .= $tabtitle;
				$menu_str .= '</a>';
				$menu_str .= '</li>';

			}
			$this->menu_str = $menu_str;

			$output .= '<div class="cq-tabitem" style="color:' . $this->contentcolor . ';">';
			$output .= $content;
			$output .= '</div>';

			return $output;

		}
	}
}
namespace {

	if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_prime_vc_tabs' ) ) {
		class WPBakeryShortCode_prime_vc_tabs extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'WPBakeryShortCode_prime_vc_tab_item' ) ) {
		class WPBakeryShortCode_prime_vc_tab_item extends WPBakeryShortCode {
		}
	}
}