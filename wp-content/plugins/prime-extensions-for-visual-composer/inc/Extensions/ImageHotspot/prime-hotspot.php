<?php
class prime_extension_ihotspot {
	public function __construct() {
		require_once( 'hotspot-param.php' );

		vc_map( array(
				'name'              => esc_html__( 'Image Hotspot', 'ihwt' ),
				'base'              => 'ihwt_hotspot',
				'class'             => '',
				'icon'              => 'prime_image_hotspot',
				'admin_enqueue_js'  => array( plugins_url( '/admin/jquery.hotspot.js', __FILE__ ) ),
				'admin_enqueue_css' => array( plugins_url( '/admin/hotspot.css', __FILE__ ) ),
				"category"          => array( esc_attr__( 'Prime VC Extensions', 'ihwt' ), esc_attr__( 'Content', 'ihwt' ) ),
				'description'       => esc_html__( 'Display single image with markers and tooltips', 'ihwt' ),
				'params'            => array(
					array(
						'type'             => 'attach_image',
						'param_name'       => 'image',
						'heading'          => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="' . esc_html__( 'Select image from media library', 'ihwt' ) . '" data-balloon-pos="right"><span></span></span>' . esc_html__( 'Image', 'ihwt' ),
						'edit_field_class' => 'vc_column vc_col-sm-12',
					),
					array(
						'type'             => 'ihwt_hotspot_param',
						'heading'          => '',
						'param_name'       => 'hotspot_data',
						'edit_field_class' => 'vc_column vc_col-sm-12',
					),
					array(
						'type'                => 'dropdown',
						'heading'            => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Define the action at which the hotspot tooltip will be displayed on.', 'ihwt').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Tooltips display ', 'ihwt') .'<a href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/">Get Pro Version</a>',
						'param_name'        => 'hotspot_action',
						'edit_field_class'    => 'vc_column vc_col-sm-12',
						'default'                => 'hover',
						'value'            => array(

							esc_html__('On Hover','ihwt')    => 'hover',
							esc_html__('Allways (Pro Only)','ihwt')     => 'allways',
							esc_html__('On Click (Pro Only)','ihwt')    => 'click',
						),
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Custom CSS Class', 'ihwt' ),
						'param_name' => 'el_class',
					),
					array(
						'type'                => 'dropdown',
						'heading'            => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Select marker style. You can leave default style or upload your own image.', 'ihwt').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Marker style ', 'ihwt').'<a href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/">Get Pro Version</a>',
						'param_name'        => 'marker_style',
						'default'                => 'default',
						'value'            => array(
							esc_html__('Default', 'ihwt')            => 'default',
							esc_html__('Image (Pro Only)', 'ihwt')            => 'image',
						),
						'group'                => esc_html__('Markers settings', 'ihwt'),
					),
					array(
						'type'             => 'colorpicker',
						'param_name'       => 'marker_bg',
						'heading'          => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="' . esc_html__( 'Change the background of hotspot markers.', 'ihwt' ) . '" data-balloon-pos="right"><span></span></span>' . esc_html__( 'Marker background', 'ihwt' ),
						'edit_field_class' => 'vc_column vc_col-sm-6',
						'value'            => '#ff3368',
						'dependency'       => array( 'element' => 'marker_style', 'value_not_equal_to' => 'image' ),
						'group'            => esc_html__( 'Markers settings', 'ihwt' ),
					),
					array(
						'type'             => 'colorpicker',
						'param_name'       => 'marker_inner_bg',
						'heading'          => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="' . esc_html__( 'Change the background of the hotspot marker inner dot', 'ihwt' ) . '" data-balloon-pos="left"><span></span></span>' . esc_html__( 'Marker inner background', 'ihwt' ),
						'edit_field_class' => 'vc_column vc_col-sm-6',
						'value'            => '#ffffff',
						'dependency'       => array( 'element' => 'marker_style', 'value_not_equal_to' => 'image' ),
						'group'            => esc_html__( 'Markers settings', 'ihwt' ),
					),
					array(
						'type'             => 'attach_image',
						'heading'          => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="' . esc_html__( 'Choose the image to use as marker.', 'ihwt' ) . '" data-balloon-pos="right"><span></span></span>' . esc_html__( 'Image', 'ihwt' ),
						'param_name'       => 'marker_image',
						'dependency'       => array( 'element' => 'marker_style', 'value' => 'image' ),
						'edit_field_class' => 'vc_column vc_col-sm-12',
						'group'            => esc_html__( 'Markers settings', 'ihwt' ),
					),
					array(
						'type'             => 'dropdown',
						'heading'          => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="' . esc_html__( 'Select the tooltip position relative to the marker.', 'ihwt' ) . '" data-balloon-pos="right"><span></span></span>' . esc_html__( 'Tooltip position', 'ihwt' ),
						'param_name'       => 'tooltip_position',
						'default'          => 'top',
						'value'            => array(
							esc_html__( 'Top', 'ihwt' )          => 'top',
							esc_html__( 'Bottom', 'ihwt' )       => 'bottom',
							esc_html__( 'Left', 'ihwt' )         => 'left',
							esc_html__( 'Right', 'ihwt' )        => 'right',
							esc_html__( 'Top Left', 'ihwt' )     => 'top-left',
							esc_html__( 'Top Right', 'ihwt' )    => 'top-right',
							esc_html__( 'Bottom Left', 'ihwt' )  => 'bottom-left',
							esc_html__( 'Bottom Right', 'ihwt' ) => 'bottom-right',
						),
						'group'            => esc_html__( 'Tooltips settings', 'ihwt' ),
						'edit_field_class' => 'vc_column vc_col-sm-12',
					),
					array(
						'type'                => 'dropdown',
						'heading'            => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Set the tooltip text alignment.', 'ihwt').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Tooltip content alignment ', 'ihwt') .'<a href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/">Get Pro Version</a>' ,
						'param_name'        => 'tooltip_content_align',
						'default'                => 'left',
						'value'            => array(
							esc_html__('Left', 'ihwt')            => 'left',
							esc_html__('Right (Pro Only)', 'ihwt')            => 'right',
							esc_html__('Center (Pro Only)', 'ihwt')            => 'center',
						),
						'group'                => esc_html__('Tooltips settings', 'ihwt'),
						'edit_field_class'    => 'vc_column vc_col-sm-6',
					),
					array(
						'type'             => 'textfield',
						'heading'          => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="' . esc_html__( 'Set the minimal width of item tooltip.', 'ihwt' ) . '" data-balloon-pos="left"><span></span></span>' . esc_html__( 'Tooltip min width', 'ihwt' ),
						'param_name'       => 'tooltip_width',
						"value"            => 300,
						'edit_field_class' => 'vc_column vc_col-sm-6',
						'group'            => esc_html__( 'Tooltips settings', 'ihwt' ),
					),
					array(
						'type'             => 'colorpicker',
						'param_name'       => 'tooltip_bg_color',
						'heading'          => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="' . esc_html__( 'Choose the color for the tooltip\'s background. The default value is #fff.', 'ihwt' ) . '" data-balloon-pos="right"><span></span></span>' . esc_html__( 'Tooltip Background Color', 'ihwt' ),
						'default'          => '#fff',
						'edit_field_class' => 'vc_column vc_col-sm-6',
						'group'            => esc_html__( 'Tooltips settings', 'ihwt' ),
					),

					array(
						"type"             => "prime_param_heading",
						"text"             => "<span class='phyoutubeparam'>
					<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
					src='https://www.youtube.com/embed/gGSHrXcpKeE' frameborder='0' allowfullscreen>
					</iframe> 
				</span>",
						"param_name"       => "notification",
						'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
						"group"            => "Video Tutorial",
					),

					array(
						'type'             => 'colorpicker',
						'param_name'       => 'tooltip_text_color',
						'heading'          => '<span class="ihwt-vc-tip" data-balloon-length="medium" data-balloon="' . esc_html__( 'Choose the color for the tooltip\'s text. The default value is #555.', 'ihwt' ) . '" data-balloon-pos="left"><span></span></span>' . esc_html__( 'Tooltip Text Color', 'ihwt' ),
						'default'          => '#555',
						'edit_field_class' => 'vc_column vc_col-sm-6',
						'group'            => esc_html__( 'Tooltips settings', 'ihwt' ),
					),
				),
			) );


		add_shortcode( 'ihwt_hotspot', 'ihwt_hotspot_shortcode' );

		function ihwt_hotspot_shortcode( $atts, $content = null ) {

			$atts = vc_map_get_attributes( 'ihwt_hotspot', $atts );
			extract( $atts );

			$output = $id = $el_class = $custom_el_css = $data_atts = '';

			if(isset($image) && !empty($image)) {

				$id = uniqid('ihwt-hotspoted-image');

				/*Data attributes*/
				if(!empty($module_animation)) {
					$data_atts .= ' data-animate="1"  data-animate-type="'.esc_attr($module_animation).'" ';
				}

				if(!empty($hotspot_data)) {
					$data_atts .= ' data-hotspot-content="'.esc_attr($hotspot_data).'" ';
				}

				if(!empty($hotspot_action)) {
					$el_class .= ' ihwt-action-hover';
					$data_atts .= ' data-action="hover"';
				}
				$custom_el_css = '<div class="bruno-custom-inline-css">';

				/*Tooltip class*/
				if(isset($tooltip_position) && !empty($tooltip_position)) {
					$el_class .= ' ihwt-tooltip-position-'.$tooltip_position;
				}

				if(isset($tooltip_content_align) && !empty($tooltip_content_align)) {
					$el_class .= 'ihwt-tooltip-text-align-left';
				}

				/*Dynamic css*/
				if(isset($tooltip_width) && $tooltip_width != '') {
					$custom_el_css .= '<style>#'.esc_js($id).' .ihwt-hotspot-wrapper .HotspotPlugin_Hotspot > div { min-width: 300px;}</style>';
				}

				if(isset($tooltip_bg_color) && $tooltip_bg_color != '') {
					$custom_el_css .= '<style>#'.esc_js($id).' .ihwt-hotspot-wrapper .HotspotPlugin_Hotspot > div { background: #FFFFFF;}</style>';
				}
				if(isset($tooltip_text_color) && $tooltip_text_color != '') {
					$custom_el_css .= '<style>#'.esc_js($id).' .ihwt-hotspot-wrapper .HotspotPlugin_Hotspot > div, #'.esc_js($id).' .ihwt-hotspot-wrapper .HotspotPlugin_Hotspot > div > .Hotspot_Title, #'.esc_js($id).' .ihwt-hotspot-wrapper .HotspotPlugin_Hotspot > div > .Hotspot_Message { color: #555;}</style>';
				}
				if(isset($marker_bg) && $marker_bg != '') {
					$custom_el_css .= '<style>#'.esc_js($id).' .ihwt-hotspot-wrapper .HotspotPlugin_Hotspot:not(.ihwtHotspotImageMarker):before { background: #ff3368;}</style>';
				}

				if(isset($marker_inner_bg) && $marker_inner_bg != '') {
					$custom_el_css .= '<style>#'.esc_js($id).' .ihwt-hotspot-wrapper .HotspotPlugin_Hotspot:not(.ihwtHotspotImageMarker):after { background: #ffffff;}</style>';
				}
				$custom_el_css .= '</div>';



				$img_src = wp_get_attachment_image_src($image, 'full');



				$img_html = '<img src="'.esc_attr($img_src[0]).'" width="'.esc_attr($img_src[1]).'" height="'.esc_attr($img_src[2]).'"/>';

				$output .= '<div id="'.esc_attr($id).'" class="ihwt-hotspot-wrapper-wrapper">';
				$output .= '<div class="ihwt-hotspot-wrapper" '.$data_atts.'>';
				$output .= '<div class="ihwt-hotspot-image-cover '.esc_attr($el_class).'">';
				$output .= $img_html;
				$output .= '</div>';
				$output .= '</div>';

				$output .= '</div>';

			}

			return $custom_el_css.$output;

		}
	}
}

$prime_extension_ihotspot = new prime_extension_ihotspot();