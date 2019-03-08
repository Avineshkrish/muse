<?php
$thb_animation_array = array(
	"type" => "dropdown",
	"heading" => esc_html__("Animation", "werkstatt"),
	"param_name" => "animation",
	"value" => array(
		"None" => "",
		"Left" => "animation right-to-left",
		"Right" => "animation left-to-right",
		"Top" => "animation bottom-to-top",
		"Bottom" => "animation top-to-bottom",
		"Scale" => "animation scale",
		"Fade" => "animation fade-in"
	)
);
$thb_column_array = array(
	'1 Columns' => "large-12",
	'2 Columns' => "large-6",
	'3 Columns' => "large-4",
	'4 Columns' => "large-3",
	'5 Columns' => "thb-5",
	'6 Columns' => "large-2"
);
$thb_filter_array = array(
	'Style 1 - Default' => "style1",
	'Style 1 - Default (Static)' => "style1 alt",
	'Style 2 - Regular' => "style2",
	'Style 3 - With Counts' => "style3",
	'Style 4 - Menu Items' => "style4"
);
$thb_button_style_array = array(
	'Default' => "",
	'Border Button with Solid Fill' => 'thb-border-style',
	'Text with Border Fill' => "thb-text-style",
	'3d Effect' => "thb-3d-style",
	'Fill Effect' => "thb-fill-style",
	'Pill' => "thb-pill-style",
	'Pill Border' => "thb-pill-style thb-border"
);
$thb_offset_array = array(
	'-100%' => '-100%',
	'-95%' => '-95%',
	'-90%' => '-90%',
	'-85%' => '-85%',
	'-80%' => '-80%',
	'-75%' => '-75%',
	'-70%' => '-70%',
	'-65%' => '-65%',
	'-60%' => '-60%',
	'-55%' => '-55%',
	'-50%' => '-50%',
	'-45%' => '-45%',
	'-40%' => '-40%',
	'-35%' => '-35%',
	'-30%' => '-30%',
	'-25%' => '-25%',
	'-20%' => '-20%',
	'-15%' => '-15%',
	'-10%' => '-10%',
	'-5%'  => '-5%',
	'0%'  => '0%',
	'5%'  => '5%',
	'10%' => '10%',
	'15%' => '15%',	
	'20%' => '20%',
	'25%' => '25%',
	'30%' => '30%',
	'35%' => '35%',	
	'40%' => '40%',
	'45%' => '45%',	
	'50%' => '50%',
	'55%' => '55%',
	'60%' => '60%',
	'65%' => '65%',	
	'70%' => '70%',
	'75%' => '75%',	
	'80%' => '80%',
	'85%' => '85%',	
	'90%' => '90%',
	'95%' => '95%',	
	'100%' => '100%'
);
// Shortcodes 
$shortcodes = Thb_Theme_Admin::$thb_theme_directory. 'vc_templates/';
$files = glob($shortcodes.'thb_?*.php');
foreach ($files as $filename) {
	require get_theme_file_path('vc_templates/'.basename($filename));
}

// Visual Composer Row Changes
vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "gap" );
vc_remove_param( "vc_row", "equal_height" );
vc_remove_param( "vc_row", "css_animation" );
vc_remove_param( "vc_row", "video_bg" );
vc_remove_param( "vc_row", "video_bg_url" );
vc_remove_param( "vc_row", "video_bg_parallax" );
vc_remove_param( "vc_row", "parallax_speed_video" );
vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => esc_html__("Row Title", "werkstatt"),
	"param_name" => "thb_row_title",
	"description" => esc_html__("Used if you want to use the row pagination", "werkstatt")
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Full Width", "werkstatt"),
	"param_name" => "thb_full_width",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this row will fill the screen", "werkstatt")
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Disable Row Padding", "werkstatt"),
	"param_name" => "thb_row_padding",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this row won't leave padding on the sides", "werkstatt")
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Disable Column Padding", "werkstatt"),
	"param_name" => "thb_column_padding",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, the columns inside won't leave padding on the sides", "werkstatt")
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => esc_html__("Video Background", "werkstatt"),
	"param_name" => "thb_video_bg",
	'weight' => 1,
	"description" => esc_html__("You can specify a video background file here (mp4). Row Background Image will be used as Poster.", "werkstatt")
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"heading" => esc_html__("Video Overlay Color", "werkstatt"),
	"param_name" => "thb_video_overlay_color",
	'weight' => 1,
	"description" => esc_html__("If you want, you can select an overlay color.", "werkstatt")
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Display Scroll to Bottom Arrow?", "werkstatt"),
	"param_name" => "thb_scroll_bottom",
	"value" => array(
		"Yes" => "true"
	),
	"description" => esc_html__("If you enable this, this will show an arrow at the bottom of the row", "werkstatt")
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"heading" => esc_html__("Scroll to Bottom Arrow Style", "werkstatt"),
	"param_name" => "thb_scroll_bottom_style",
	"value" => array(
		"Line" => "style1",
		"Mouse" => "style2",
		"Arrow" => "style3"
	),
	"description" => esc_html__("This changes the shape of the arrow", "werkstatt"),
	"dependency" => Array('element' => "thb_scroll_bottom", 'value' => array('true'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"heading" => esc_html__("Scroll to Bottom Arrow Color", "werkstatt"),
	"param_name" => "thb_scroll_bottom_color",
	"value" => array(
		"Dark" => "dark",
		"Light" => "light"
	),
	"description" => esc_html__("Color of the scroll to bottom arrow", "werkstatt"),
	"dependency" => Array('element' => "thb_scroll_bottom", 'value' => array('true'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Header Logo Color", "werkstatt"),
	"param_name" => "thb_color",
	"value" => array(
		"Dark" => "dark-title",
		"Light" => "light-title"
	),
	"std" => "dark-title",
	'weight' => 1,
	"description" => esc_html__("This setting affects the color of the logo when header fill is deactivated or Midnight header is being used.", "werkstatt")
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"group" => esc_html__("Dividers", 'werkstatt'),
	"heading" => esc_html__("Enable Dividers?", 'werkstatt'),
	"param_name" => "thb_shape_divider",
	"value" => array(
		"Yes" => "true"
	),
	
));
vc_add_param("vc_row", array(
	"type" => "thb_radio_image",
	'save_always' => true,
	"heading" => esc_html__("Divider Shape", 'werkstatt'),
	"param_name" => "divider_shape",
	'save_always' => true,
	"group" => esc_html__("Dividers", 'werkstatt'),
	"options" => array(
		'curve' 				=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/curve.png",
		'tilt_v2' 				=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/tilt_v2.png",
		'tilt' 					=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/tilt.png",
		'triangle' 			=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/triangle.png",
		'waves_alt' 			=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/waves_alt.png",
		'waves_v2' 			=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/waves_v2.png",
		'waves' 				=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/waves.png",
		'waves_opacity'	=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/waves_opacity.png"
	),
	"dependency" => Array('element' => "thb_shape_divider", 'value' => array('true'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"heading" => esc_html__("Divider Color", 'werkstatt'),
	"param_name" => "thb_divider_color",
	"group" => esc_html__("Dividers", 'werkstatt'),
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	'save_always' => true,
	"heading" => esc_html__("Divider Position", 'werkstatt'),
	"param_name" => "thb_divider_position",
	"group" => esc_html__("Dividers", 'werkstatt'),
	"value" => array(
		"Bottom" => "bottom",
		"Top" => "top"
	),
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"group" => esc_html__("Dividers", 'werkstatt'),
	"heading" => esc_html__("Divider Height", 'werkstatt'),
	"param_name" => "thb_divider_height",
	"description" => esc_html__('Enter a custom height for your shape divider in pixels without the "px"', 'werkstatt')
));

// Inner Row
vc_remove_param( "vc_row_inner", "gap" );
vc_remove_param( "vc_row_inner", "equal_height" );
vc_remove_param( "vc_row_inner", "css_animation" );

vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Max Width", "werkstatt"),
	"param_name" => "thb_max_width",
	"value" => array(
		"Yes" => "max_width"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, the row won't exceed the max width, especially inside a full-width parent row.", "werkstatt")
));

vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"heading" => esc_html__("Disable Column Padding", "werkstatt"),
	"param_name" => "thb_column_padding",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, the columns inside won't leave padding on the sides", "werkstatt")
));

// Columns
vc_remove_param( "vc_column", "css_animation" );
vc_add_param("vc_column", array(
	"type" => "dropdown",
	"heading" => esc_html__("Column Content Color", "werkstatt"),
	"param_name" => "thb_color",
	"value" => array(
		"Dark" => "thb-dark-column",
		"Light" => "thb-light-column"
	),
	'weight' => 1,
	"description" => esc_html__("If you white-colored contents for this column, select Light.", "werkstatt")
));
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Fixed Content", "werkstatt"),
	"param_name" => "fixed",
	"value" => array(
		"Yes" => "thb-fixed"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this column will be fixed.", "werkstatt")
));
vc_add_param("vc_column_inner", array(
	"type" => "dropdown",
	"heading" => esc_html__("Column Content Color", "werkstatt"),
	"param_name" => "thb_color",
	"value" => array(
		"Dark" => "thb-dark-column",
		"Light" => "thb-light-column"
	),
	'weight' => 1,
	"description" => esc_html__("If you white-colored contents for this column, select Light.", "werkstatt")
));
vc_add_param("vc_column", $thb_animation_array);
vc_add_param("vc_column_inner", $thb_animation_array);

// Text Area
vc_remove_param("vc_column_text", "css_animation");
vc_add_param("vc_column_text", $thb_animation_array);

// AutoType
vc_map( array(
	'base'  => 'thb_autotype',
	'name' => esc_html__('Auto Type', 'werkstatt'),
	"description" => esc_html__("Animated text typing", "werkstatt"),
	'category' => esc_html__('by Fuel Themes', 'werkstatt'),
	"icon" => "thb_vc_ico_autotype",
	"class" => "thb_vc_sc_autotype",
	'params' => array(
		array(
			'type'       => 'textarea_safe',
			'heading'    => esc_html__( 'Content', 'werkstatt' ),
			'param_name' => 'typed_text',
			'value'		 => '<h2>Unleash creativity with the powerful tools of *Werkstatt;Developed by Fuel Themes*</h2>',
			'description'=> '
			Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. <br />
			Text separator is <b>;</b> for example: <strong>*Werkstatt; Developed by Fuel Themes*</strong>',
			"admin_label" => true,
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Animated Text Color", "werkstatt"),
			"param_name" => "thb_animated_color",
			"description" => esc_html__("Uses the accent color by default", "werkstatt")
		),
		array(
	    "type" => "textfield",
	    "heading" => esc_html__("Type Speed", "werkstatt"),
	    "param_name" => "typed_speed",
	    "description" => esc_html__("Speed of the type animation. Default is 50", "werkstatt")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Loop?", "werkstatt"),
			"param_name" => "loop",
			"value" => array(
				"Yes" => "1"
			),
			"description" => esc_html__("If enabled, the text will always animate, looping through the sentences used.", "werkstatt"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "werkstatt"),
			"param_name" => "extra_class",
		),
	)
) );

// Awards Parent
vc_map( array(
	"name" => esc_html__("Awards", 'werkstatt'),
	"base" => "thb_awards_parent",
	"icon" => "thb_vc_ico_awards",
	"class" => "thb_vc_sc_awards",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_parent" => array('only' => 'thb_awards'),
	"show_settings_on_create" => false,
	"description" => esc_html__("Display Awards you have received", "werkstatt"),
	"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => esc_html__("Single Award", 'werkstatt'),
	"base" => "thb_awards",
	"icon" => "thb_vc_ico_awards",
	"class" => "thb_vc_sc_awards",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_child" => array('only' => 'thb_awards_parent'),
	"params"	=> array(
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Date', 'werkstatt' ),
			'admin_label'	 => true,
			'param_name'     => 'date'
		),
		array(
		'type'           => 'textfield',
			'heading'        => esc_html__( 'Name', 'werkstatt' ),
			'param_name'     => 'name',
			'admin_label'	 => true,
			'description'    => esc_html__( 'Name of the award', 'werkstatt' ),
		),
		array(
			'type'           => 'textarea_safe',
			'heading'        => esc_html__( 'Description', 'werkstatt' ),
			'param_name'     => 'description',
			'description'    => esc_html__( 'Award description, you can use html here.', 'werkstatt' ),
		)
	),
	"description" => esc_html__("Single Award", "werkstatt")
) );
class WPBakeryShortCode_thb_awards_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_awards extends WPBakeryShortCode {}

// Blog Posts
vc_map( array(
	"name" => esc_html__("Blog Posts", 'werkstatt'),
	"base" => "thb_post",
	"icon" => "thb_vc_ico_post",
	"class" => "thb_vc_sc_post",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Post Source", "werkstatt"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your post source here", "werkstatt")
	  ),
	  array(
	  	"type" => "dropdown",
	  	"heading" => esc_html__("Style", "werkstatt"),
	  	"param_name" => "style",
	  	"admin_label" => true,
	  	"value" => array(
	  		'Style 1' => "style1",
	  		'Style 2' => "style2",
	  		'Style 3' => "style3",
	  		'Style 4' => "style4",
	  		'Style 5' => "style5",
	  		'Style 6' => "style6-alt",
	  		'Style 7' => "style7",
	  		'Style 8' => "style8",
	  	),
	  ),
	  array(
      "type" => "dropdown",
      "heading" => esc_html__("Columns", "werkstatt"),
      "param_name" => "columns",
      "admin_label" => true,
      "value" => $thb_column_array,
      "description" => esc_html__("Select the layout of the posts.", "werkstatt"),
      "dependency" => Array('element' => "style", 'value' => array('style1', 'style6-alt'))
	  ),
	  array(
      "type" => "dropdown",
      "heading" => esc_html__("Style-8 Columns", "werkstatt"),
      "param_name" => "style8_columns",
      "admin_label" => true,
      "value" => array(
      	'3 Columns' => "3",
      	'4 Columns' => "4"
      ),
      "description" => esc_html__("Select the layout of the posts.", "werkstatt"),
      "dependency" => Array('element' => "style", 'value' => array('style8'))
	  ),
	),
	"description" => esc_html__("Display Blog Posts from your blog", "werkstatt")
) );

// Button shortcode
vc_map( array(
	"name" => esc_html__( "Button", 'werkstatt'),
	"base" => "thb_button",
	"icon" => "thb_vc_ico_button",
	"class" => "thb_vc_sc_button",
	"category" => esc_html__('by Fuel Themes', 'werkstatt'),
	"params" => array(
		array(
		  "type" => "vc_link",
		  "heading" => esc_html__("Link", "werkstatt"),
		  "param_name" => "link",
		  "description" => esc_html__("Enter url for link", "werkstatt"),
		  "admin_label" => true,
		),
		array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Style", "werkstatt"),
	    "param_name" => "style",
	    "value" => $thb_button_style_array,
	    "description" => esc_html__("This changes the look of the button", "werkstatt")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Color", "werkstatt"),
		  "param_name" => "color",
		  "value" => array(
		  	'Black' => '',
		  	'White' => 'white',
		  	'Accent' => 'accent'
		  ),
		  "description" => esc_html__("This changes the color of the button", "werkstatt")
		),
		$thb_animation_array,
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Full Width", "werkstatt"),
			"param_name" => "full_width",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, this will make the button fill it's container", "werkstatt"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "werkstatt"),
			"param_name" => "extra_class",
		),
	),
	"description" => esc_html__("Add an animated button", "werkstatt")
) );

// Cascading Images
vc_map( array(
	"name" => esc_html__("Cascading Images", 'werkstatt'),
	"base" => "thb_cascading_parent",
	"icon" => "thb_vc_ico_cascading",
	"class" => "thb_vc_sc_cascading",
	"content_element"	=> true,
	"show_settings_on_create" => false,
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_parent" => array('only' => 'thb_cascading'),
	"description" => esc_html__("Insert a cascading Image", 'werkstatt' ),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Single Image", 'werkstatt'),
	"base" => "thb_cascading",
	"icon" => "thb_vc_ico_cascading",
	"class" => "thb_vc_sc_cascading",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_child"         => array('only' => 'thb_cascading_parent'),
	"params"           => array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Select Image', 'werkstatt' ),
			'param_name'     => 'image',
			'description'    => esc_html__( 'Select Image for the layer', 'werkstatt' )
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Offset X", "werkstatt"),
		  "param_name" => "image_x",
		  "value" => $thb_offset_array,
		  "std" => "0%"
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Offset Y", "werkstatt"),
		  "param_name" => "image_y",
		  "value" => $thb_offset_array,
		  "std" => "0%"
		),
		$thb_animation_array,
		array(
	    "type" => "textfield",
	    "heading" => esc_html__("Add Border Radius?", "werkstatt"),
	    "param_name" => "radius",
	    "description" => esc_html__("You can add Border Radius in px value.", "werkstatt")
		),
		array(
		  "type" => "checkbox",
		  "heading" => esc_html__("Add Box Shadow?", "werkstatt"),
		  "param_name" => "thb_box_shadow",
		  "value" => array(
		  	"Yes" => "thb_box_shadow"
		  ),
		  "description" => esc_html__("You can add a Box Shadow to your image.", "werkstatt")
		),
	)
) );

class WPBakeryShortCode_thb_cascading_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_cascading extends WPBakeryShortCode {}

// Clients Parent
vc_map( array(
	"name" => esc_html__("Clients", 'werkstatt'),
	"base" => "thb_clients_parent",
	"icon" => "thb_vc_ico_clients",
	"class" => "thb_vc_sc_clients",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_parent" => array('only' => 'thb_clients'),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "werkstatt"),
		    "param_name" => "thb_style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1 (Grid)' => "style1",
		    	'Style 2 (Carousel)' => "slick"
		    ),
		    "description" => esc_html__("This changes the layout style of the client logos", "werkstatt")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", "werkstatt"),
			"param_name" => "thb_columns",
			"admin_label" => true,
			"value" => array(
				'2 Columns' => "small-6 large-6",
				'3 Columns' => "small-6 large-4",
				'4 Columns' => "small-6 large-3",
				'5 Columns' => "small-6 thb-5",
				'6 Columns' => "small-6 large-2"
			)
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Image Borders", "werkstatt"),
			"param_name" => "thb_image_borders",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, the logos will have border", "werkstatt")
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Border Color", "werkstatt"),
			"param_name" => "thb_border_color",
			"admin_label" => true,
			"value" => "#f0f0f0",
			"dependency" => Array('element' => "thb_image_borders", 'value' => array('true'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Hover Effect", "werkstatt"),
			"param_name" => "thb_hover_effect",
			"admin_label" => true,
			"value" => array(
				'None' => "",
				'Opacity' => "thb-opacity",
				'Grayscale' => "thb-grayscale",
				'Opacity with Accent hover' => "thb-opacity with-accent"
			),
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Auto Play", "werkstatt"),
			"param_name" => "autoplay",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, the carousel will autoplay.", "werkstatt"),
			"dependency" => Array('element' => "thb_style", 'value' => array('slick'))
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the AutoPlay", "werkstatt"),
			"param_name" => "autoplay_speed",
			"value" => "4000",
			"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "werkstatt"),
			"dependency" => Array('element' => "autoplay", 'value' => array('true'))
		),
	),
	"description" => esc_html__("Partner/Client logos", "werkstatt"),
	"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => esc_html__("Client", 'werkstatt'),
	"base" => "thb_clients",
	"icon" => "thb_vc_ico_clients",
	"class" => "thb_vc_sc_clients",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_child" => array('only' => 'thb_clients_parent'),
	"params"	=> array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image', 'werkstatt' ),
			'param_name'     => 'image',
			'description'    => esc_html__( 'Add logo image here.', 'werkstatt' )
		),
		array(
			'type'           => 'vc_link',
			'heading'        => esc_html__( 'Link', 'werkstatt' ),
			'param_name'     => 'link',
			"admin_label" => true,
			'description'    => esc_html__( 'Add a link to client website if desired.', 'werkstatt' ),
		),
	),
	"description" => esc_html__("Single Client", "werkstatt")
) );
class WPBakeryShortCode_thb_clients_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_clients extends WPBakeryShortCode {}

// Contact Map
vc_map( array(
	"name" => esc_html__("Contact Map Parent", 'werkstatt'),
	"base" => "thb_map_parent",
	"icon" => "thb_vc_ico_contactmap",
	"class" => "thb_vc_sc_contactmap",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_parent" => array('only' => 'thb_map'),
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Map Height", "werkstatt"),
		  "param_name" => "height",
		  "admin_label" => true,
		  "value" => 50,
		  "description" => esc_html__("Enter height of the map in vh (0-100). For example, 50 will be 50% of viewport height and 100 will be full height. <small>Make sure you have filled in your Google Maps API inside Appearance > Theme Options.</small>", "werkstatt")
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Map Zoom', 'werkstatt' ),
			'param_name'     => 'zoom',
			'value'			 => '0',
			'description'    => esc_html__( 'Set map zoom level. Leave 0 to automatically fit to bounds.', 'werkstatt' )
		),
		array(
			'type'           => 'checkbox',
			'heading'        => esc_html__( 'Map Controls', 'werkstatt' ),
			'param_name'     => 'map_controls',
			'std'            => 'panControl, zoomControl, mapTypeControl, scaleControl',
			'value'          => array(
				__('Pan Control', 'werkstatt')             => 'panControl',
				__('Zoom Control', 'werkstatt')            => 'zoomControl',
				__('Map Type Control', 'werkstatt')        => 'mapTypeControl',
				__('Scale Control', 'werkstatt')           => 'scaleControl',
				__('Street View Control', 'werkstatt')     => 'streetViewControl'
			),
			'description'    => esc_html__( 'Toggle map options.', 'werkstatt' )
		),
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'Map Type', 'werkstatt' ),
			'param_name'     => 'map_type',
			'std'            => 'roadmap',
			'value'          => array(
				__('Roadmap', 'werkstatt')   => 'roadmap',
				__('Satellite', 'werkstatt') => 'satellite',
				__('Hybrid', 'werkstatt')    => 'hybrid',
			),
			'description' => esc_html__( 'Choose map style.', 'werkstatt' )
		),
		array(
			'type' => 'textarea_raw_html',
			'heading' => esc_html__( 'Map Style', 'werkstatt' ),
			'param_name' => 'map_style',
			'value' => '',
			'description' => esc_html__( 'Paste the style code here. Browse map styles in <a href="https://snazzymaps.com/" target="_blank">SnazzyMaps</a>', 'werkstatt' )
		),
	),
	"description" => esc_html__("Insert your Contact Map", 'werkstatt' ),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Contact Map Location", 'werkstatt'),
	"base" => "thb_map",
	"icon" => "thb_vc_ico_contactmap",
	"class" => "thb_vc_sc_contactmap",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_child"         => array('only' => 'thb_map_parent'),
	"params"           => array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Marker Image', 'werkstatt' ),
			'param_name'     => 'marker_image',
			'description'    => esc_html__( 'Add your Custom marker image or use default one.', 'werkstatt' )
		),
		array(
			'type'           => 'checkbox',
			'heading'        => esc_html__( 'Retina Marker', 'werkstatt' ),
			'param_name'     => 'retina_marker',
			'value'          => array(
				__('Yes', 'werkstatt') => 'yes',
			),
			'description'    => esc_html__( 'Enabling this option will reduce the size of marker for 50%, example if marker is 32x32 it will be 16x16.', 'werkstatt' )
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Latitude', 'werkstatt' ),
			'admin_label' 	 => true,
			'param_name'     => 'latitude',
			'description'    => esc_html__( 'Enter latitude coordinate. To select map coordinates <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">click here</a>.', 'werkstatt' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Longitude', 'werkstatt' ),
			'admin_label' 	 => true,
			'param_name'     => 'longitude',
			'description'    => esc_html__( 'Enter longitude coordinate.', 'werkstatt' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Marker Title', 'werkstatt' ),
			'param_name'     => 'marker_title',
		),
		array(
			'type'           => 'textarea',
			'heading'        => esc_html__( 'Marker Description', 'werkstatt' ),
			'param_name'     => 'marker_description',
		)
	)
) );

class WPBakeryShortCode_thb_map_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_map extends WPBakeryShortCode {}

// Counter shortcode
vc_map( array(
	"name" => esc_html__("Counter", 'werkstatt'),
	"base" => "thb_counter",
	"icon" => "thb_vc_ico_counter",
	"class" => "thb_vc_sc_counter",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon", "werkstatt"),
			"param_name" => "icon",
			"value" => thb_getIconArray()
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Number to Count", "werkstatt"),
			"param_name" => "counter",
			"admin_label" => true
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the counter animation", "werkstatt"),
			"param_name" => "speed",
			"value" => "2000",
			"description" => esc_html__("Speed of the counter animation, default 1500", "werkstatt"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Heading", "werkstatt"),
			"param_name" => "heading",
			"admin_label" => true
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "werkstatt"),
			"param_name" => "extra_class",
		),
	),
	"description" => esc_html__("Counters with icons", "werkstatt")
) );

// Experience
vc_map( array(
	"name" => esc_html__("Experience", 'werkstatt'),
	"base" => "thb_experience",
	"icon" => "thb_vc_ico_experience",
	"class" => "thb_vc_sc_experience",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Date', 'werkstatt' ),
			'admin_label'	 => true,
			'param_name'     => 'date'
		),
		array(
		'type'           => 'textarea_safe',
			'heading'        => esc_html__( 'Position & Place', 'werkstatt' ),
			'param_name'     => 'position',
			'admin_label'	 => true,
			'description'    => esc_html__( 'You can use html here.', 'werkstatt' )
		),
		array(
			'type'           => 'textarea_safe',
			'heading'        => esc_html__( 'Location or Description', 'werkstatt' ),
			'param_name'     => 'description',
			'description'    => esc_html__( 'You can use html here.', 'werkstatt' )
		)
	),
	"description" => esc_html__("Single Experience", "werkstatt")
) );

// Fade Type
vc_map( array(
	'base'  => 'thb_fadetype',
	'name' => esc_html__('Fade Type', 'werkstatt'),
	"description" => esc_html__("Faded letter typing", "werkstatt"),
	'category' => esc_html__('by Fuel Themes', 'werkstatt'),
	"icon" => "thb_vc_ico_fadetype",
	"class" => "thb_vc_sc_fadetype",
	'params' => array(
		array(
			'type'       => 'textarea_safe',
			'heading'    => esc_html__( 'Content', 'werkstatt' ),
			'param_name' => 'fade_text',
			'value'		 => '<h2>*Unleash creativity with the powerful tools of Werkstatt, Developed by Fuel Themes*</h2>',
			'description'=> 'Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. ',
			"admin_label" => true
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "werkstatt"),
			"param_name" => "extra_class",
		),
	)
) );

// Iconbox shortcode
vc_map( array(
	"name" => esc_html__("Iconbox", 'werkstatt'),
	"base" => "thb_iconbox",
	"icon" => "thb_vc_ico_iconbox",
	"class" => "thb_vc_sc_iconbox",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Type", "werkstatt"),
			"param_name" => "type",
			"value" => array(
				"Top Icon - Style 1" => "top type1",
				"Top Icon - Style 2" => "top type2",
				"Top Icon - Style 3" => "top type3",
				"Left Icon - Style 1" => "left type1",
				"Right Icon - Style 1" => "right type1"
			)
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Alignment", "werkstatt"),
			"param_name" => "alignment",
			"value" => array(
				"Left" => "text-left",
				"Center" => "text-center",
				"Right" => "text-right"
			),
			"std" => "text-center",
			"dependency" => Array('element' => "type", 'value' => array('top type1'))
			
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Add Background Image', 'werkstatt' ),
			'param_name'     => 'bg_image',
			"dependency" => Array('element' => "type", 'value' => array('top type3'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon", "werkstatt"),
			"param_name" => "icon",
			"value" => thb_getIconArray()
		),
		
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image As Icon', 'werkstatt' ),
			'param_name'     => 'icon_image',
			'description'    => esc_html__( 'You can set an image instead of an icon.', 'werkstatt' )
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Image Width", "werkstatt"),
			"param_name" => "icon_image_width",
			'description'    => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'werkstatt' )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Animation", "werkstatt"),
			"param_name" => "animation",
			"value" => array(
				"Yes" => "true"
			),
			'weight' => 1,
			'std' => 'true',
			"description" => esc_html__("You can disable animation if you like.", "werkstatt")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Speed", "werkstatt"),
			"param_name" => "animation_speed",
			"value" => "1.5",
			'description'    => esc_html__( 'Speed of the animation in seconds', 'werkstatt' ),
			"dependency" => Array('element' => "animation", 'value' => array('true')),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "werkstatt"),
			"param_name" => "extra_class",
		),
		array(
			'type'           => 'vc_link',
			'heading'        => esc_html__( 'Link', 'werkstatt' ),
			'param_name'     => 'link',
			"group" => esc_html__("Content", "werkstatt"),
			'description'    => esc_html__( 'Add a link to the iconbox if desired.', 'werkstatt' ),
		),
		array(
			"type" => "textfield",
			"group" => esc_html__("Content", "werkstatt"),
			"heading" => esc_html__("Heading", "werkstatt"),
			"param_name" => "heading",
			"admin_label" => true
		),
		array(
			"type" => "textarea_safe",
			"group" => esc_html__("Content", "werkstatt"),
			"heading" => esc_html__("Content", "werkstatt"),
			"param_name" => "description",
		),
		array(
			"type" => "colorpicker",
			"group" => esc_html__("Styling", "werkstatt"),
			"heading" => esc_html__("SVG Icon Color", "werkstatt"),
			"param_name" => "thb_icon_color"
		),
		array(
			"type" => "colorpicker",
			"group" => esc_html__("Styling", "werkstatt"),
			"heading" => esc_html__("Accent Color", "werkstatt"),
			"param_name" => "thb_accent_color",
			'description'    => esc_html__( 'Overrides the accent color.', 'werkstatt' ),
		),
	),
	"description" => esc_html__("Iconboxes with different animations", "werkstatt")
) );

// Image shortcode
vc_map( array(
	"name" => "Image",
	"base" => "thb_image",
	"icon" => "thb_vc_ico_image",
	"class" => "thb_vc_sc_image",
	"category" => esc_html__('by Fuel Themes', 'werkstatt'),
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"heading" => esc_html__("Select Image", "werkstatt"),
			"param_name" => "image"
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Retina Size?", "werkstatt"),
			"param_name" => "retina",
			"value" => array(
				"Yes" => "retina_size"
			),
			"description" => esc_html__("If selected, the image will be display half-size, so it looks crisps on retina screens. Full Width setting will override this.", "werkstatt")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Full Width?", "werkstatt"),
			"param_name" => "full_width",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If selected, the image will always fill its container", "werkstatt")
		),
		$thb_animation_array,
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Image size", "werkstatt"),
		  "param_name" => "img_size",
		  "description" => esc_html__("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "werkstatt")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Image alignment", "werkstatt"),
		  "param_name" => "alignment",
		  "value" => array("Align left" => "left", "Align right" => "right", "Align center" => "center"),
		  "description" => esc_html__("Select image alignment.", "werkstatt")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Link to Full-Width Image?", "werkstatt"),
			"param_name" => "lightbox",
			"value" => array(
				"Yes" => "true"
			)
		),
		array(
		  "type" => "vc_link",
		  "heading" => esc_html__("Image link", "werkstatt"),
		  "param_name" => "img_link",
		  "description" => esc_html__("Enter url if you want this image to have link.", "werkstatt"),
		  "dependency" => Array('element' => "lightbox", 'is_empty' => true)
		)
	),
	"description" => esc_html__("Add an animated image", "werkstatt")
) );

// Image Slider
vc_map( array(
	"name" => esc_html__("Image Slider", 'werkstatt'),
	"base" => "thb_image_slider",
	"icon" => "thb_vc_ico_image_slider",
	"class" => "thb_vc_sc_image_slider",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
		array(
			"type" => "attach_images", //attach_images
			"heading" => esc_html__("Select Images", "werkstatt"),
			"param_name" => "images"
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Style", "werkstatt"),
			"param_name" => "thb_style",
			"admin_label" => true,
			"value" => array(
				'Regular' => "style1",
				'Regular with Title & Captions' => "style4",
				'Browser View' => "style2",
				'iPhone View' => "style3"
			),
			"description" => esc_html__("Title & Captions are retrieved from Image Settings. Recommended image size for iPhone view is 750x1334 pixels.", "werkstatt")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Use lightbox?", "werkstatt"),
			"param_name" => "lightbox",
			"value" => array(
				"Yes" => "thb_gallery"
			)
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Show Previous/Next Slides?", "werkstatt"),
			"param_name" => "thb_overflow",
			"value" => array(
				"Yes" => "overflow"
			)
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Use Full Height?", "werkstatt"),
			"param_name" => "thb_full_height",
			"value" => array(
				"Yes" => "thb_full_height"
			),
			"dependency" => Array('element' => "thb_style", 'value' => array('style1'))
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Margins between slides?", "werkstatt"),
			"param_name" => "thb_margins",
			"value" => array(
				"Yes" => "margins"
			),
			"dependency" => Array('element' => "thb_style", 'value' => array('style1'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Align iPhone View", "werkstatt"),
			"param_name" => "thb_align",
			"value" => array(
				'Left' => "align-left",
				'Center' => "align-center",
				'Right' => "align-right"
			),
			"dependency" => Array('element' => "thb_style", 'value' => array('style3'))
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Use Pagination", "werkstatt"),
			"param_name" => "thb_pagination",
			"value" => array(
				"Yes" => "true"
			),
			"std" => "true"
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Use Arrows", "werkstatt"),
			"param_name" => "thb_navigation",
			"value" => array(
				"Yes" => "true"
			),
			"std" => false,
			"dependency" => Array('element' => "thb_style", 'value' => array('style1', 'style4'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Arrow Color", "werkstatt"),
			"param_name" => "thb_arrow_color",
			"value" => array(
				'Dark' => "dark-arrow",
				'Light' => "light-arrow"
			),
			"dependency" => Array('element' => "thb_style", 'value' => array('style1'))
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Auto Play", "werkstatt"),
			"param_name" => "autoplay",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, the carousel will autoplay.", "werkstatt"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the AutoPlay", "werkstatt"),
			"param_name" => "autoplay_speed",
			"value" => "4000",
			"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "werkstatt"),
			"dependency" => Array('element' => "autoplay", 'value' => array('true'))
		),
	),
	"description" => esc_html__("Add Slider with your images", "werkstatt")
) );

// Instagram
vc_map( array(
	"name" => esc_html__("Instagram", 'werkstatt'),
	"base" => "thb_instagram",
	"icon" => "thb_vc_ico_instagram",
	"class" => "thb_vc_sc_instagram",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
	  array(
      "type" => "textfield",
      "heading" => esc_html__("Number of Photos", "werkstatt"),
      "param_name" => "number",
      "description" => esc_html__("Number of Instagram Photos to retrieve.", "werkstatt")
	  ),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", "werkstatt"),
			"param_name" => "columns",
			"admin_label" => true,
			"value" => $thb_column_array,
		),
		array(
	    "type" => "checkbox",
	    "heading" => esc_html__("Add Padding between photos?", "werkstatt"),
	    "param_name" => "padding",
	    "value" => array(
				"Yes" => "true"
			),
	    "description" => esc_html__("You can add spaces between photos", "werkstatt")
		),
	  array(
      "type" => "checkbox",
      "heading" => esc_html__("Link Photos to Instagram?", "werkstatt"),
      "param_name" => "link",
      "value" => array(
				"Yes" => "true"
			),
      "description" => esc_html__("Do you want to link the Instagram photos to instagram.com website?", "werkstatt")
	  )
	),
	"description" => esc_html__("Add Instagram Photos", "werkstatt")
) );


// Portfolio Attributes
vc_map( array(
	"name" => esc_html__( "Portfolio Attributes", 'werkstatt'),
	"base" => "thb_portfolio_attribute",
	"icon" => "thb_vc_ico_portfolio_attribute",
	"class" => "thb_vc_sc_portfolio_attribute",
	"category" => esc_html__('by Fuel Themes', 'werkstatt'),
	"params" => array(
		array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Style", "werkstatt"),
	    "param_name" => "style",
	    "admin_label" => true,
	    "value" => array(
	    	'Style 1' => 'style1',
	    	'Style 2' => 'style2',
	    	'Style 3' => 'style3'
	    ),
	    "description" => esc_html__("This changes the layout of the attributes", "werkstatt")
		)
	),
	"description" => esc_html__("Add your Portfolio Attributes to the page", "werkstatt")
) );

// Portfolio Masonry
vc_map( array(
	"name" => esc_html__("Portfolio Masonry", 'werkstatt'),
	"base" => "thb_portfolio_masonry",
	"icon" => "thb_vc_ico_portfolio_masonry",
	"class" => "thb_vc_sc_portfolio_masonry",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "werkstatt"),
		    "param_name" => "style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1' => "style1",
		    	'Style 2' => "style2"
		    ),
		    "description" => esc_html__("This changes the style of the portfolios", "werkstatt")
		),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Layout", "werkstatt"),
	      "param_name" => "masonry_layout",
	      "value" => array(
	      	'Masonry Layout 1' => "masonry-style1",
	      	'Masonry Layout 2' => "masonry-style2",
	      	'Masonry Layout 3' => "masonry-style3",
	      	'Masonry Layout 4' => "masonry-style4",
	      	'Masonry Layout 5' => "masonry-style5",
	      	'Masonry Layout 6' => "masonry-style6",
	      	'Masonry Layout 7' => "masonry-style7"
	      ),
	      "description" => esc_html__("This changes the layout of the masonry for Style 1", "werkstatt"),
	      "dependency" => Array('element' => "style", 'value' => array('style1'))
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Margins between items?", "werkstatt"),
	  	"param_name" => "thb_margins",
	  	"value" => array(
	  		"Yes" => "margins"
	  	),
	  	"dependency" => Array('element' => "style", 'value' => array('style1'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Columns", "werkstatt"),
	      "param_name" => "columns",
	      "value" => $thb_column_array,
	      "description" => esc_html__("This changes the column counts of the Style 2", "werkstatt"),
	      "dependency" => Array('element' => "style", 'value' => array('style2'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Portfolio Source", "werkstatt"),
	      "param_name" => "portfolio_source",
	      "value" => array(
	      	'By ID (default)' => "by_id",
	      	'Advanced' => "advanced",
	      )
	  ),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Advanced Portfolio Source", "werkstatt"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('advanced'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Portfolio IDs", "werkstatt"),
	      "param_name" => "portfolio_ids",
	      "admin_label" => true,
	      "description" => esc_html__("Enter the portfolio IDs you would like to display seperated by comma", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('by_id'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Title Position", "werkstatt"),
	      "param_name" => "title_position",
	      "value" => array(
	      	'Center' => "title-center",
	      	'Top Left' => "title-topleft",
	      	'Bottom Left' => "title-bottomleft"
	      ),
	      "description" => esc_html__("This changes the position of the title", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Hover Style", "werkstatt"),
	      "param_name" => "hover_style",
	      "value" => array(
	      	'Default' => "",
	      	'Default with Small Heading' => "thb-default-small",
	      	'Show Hover Image' => "thb-image-hover",
	      	'With Border' => "thb-border-hover",
	      	'Push Top' => "thb-push-top",
	      	'Push Bottom' => "thb-push-bottom",
	      	'Gradient' => "thb-gradient-hover",
	      	'Corner Cut' => "thb-corner-hover",
	      ),
	      "description" => esc_html__("You can change the hover styles here. Hover styles are dependent on which portfolio styles you are using so they might not work for every style.", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Animation Style", "werkstatt"),
	      "param_name" => "animation_style",
	      "value" => array(
	      	'Slide From Bottom' => "thb-animate-from-bottom",
	      	'Fade' => "thb-fade",
	      	'Scale' => "thb-scale",
	      	'No Animation' => "thb-none"
	      ),
	      "description" => esc_html__("You can change how the portfolio elements appear on the screen.", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Animation Speed", "werkstatt"),
	      "param_name" => "animation_speed",
	      "value" => array(
	      	'Slow' => "0.7",
	      	'Regular' => "0.5",
	      	'Fast' => "0.3",
	      	'Faster' => "0.2",
	      ),
	      "std" => '0.5',
	      "description" => esc_html__("You can change the animation speed of the filtering.", "werkstatt"),
	      "dependency" => Array('element' => "animation_style", 'value' => array('thb-animate-from-bottom', 'thb-scale', 'thb-fade'))
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Filters?", "werkstatt"),
	      "param_name" => "add_filters",
	      "value" => array(
      		"Yes" => "true"
      	),
	      "description" => esc_html__("This will display filters on the top", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Filter Style", "werkstatt"),
	      "param_name" => "filter_style",
	      "admin_label" => true,
	      "value" => $thb_filter_array,
	      "description" => esc_html__("This changes the style of the portfolios", "werkstatt"),
	      "dependency" => Array('element' => "add_filters", 'value' => array('true'))
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Filter Categories", "werkstatt"),
	      "param_name" => "filter_categories",
	      "value" => thb_portfolioCategories(),
	      "description" => esc_html__("Select which categories you want to filter", "werkstatt"),
	      "dependency" => Array('element' => "add_filters", 'value' => array('true'))
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Load More Button?", "werkstatt"),
	      "param_name" => "loadmore",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("Add Load More button at the bottom. Works only with Advanced Portfolio source.", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('advanced'))
	  ),
	  array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Load More Button Style", "werkstatt"),
	    "param_name" => "loadmore_style",
	    "value" => $thb_button_style_array,
	    "description" => esc_html__("This changes the look of the button", "werkstatt"),
	    "dependency" => Array('element' => "loadmore", 'value' => array('true'))
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in Masonry style", "werkstatt")
) );

// Portfolio Grid
vc_map( array(
	"name" => esc_html__("Portfolio Grid", 'werkstatt'),
	"base" => "thb_portfolio_grid",
	"icon" => "thb_vc_ico_portfolio_grid",
	"class" => "thb_vc_sc_portfolio_grid",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "werkstatt"),
		    "param_name" => "style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1' => "style1",
		    	'Style 2' => "style2"
		    ),
		    "description" => esc_html__("This changes the style of the portfolios", "werkstatt")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Margins between items?", "werkstatt"),
			"param_name" => "thb_margins",
			"value" => array(
				"Yes" => "margins"
			)
		),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Columns", "werkstatt"),
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => $thb_column_array,
	      "description" => esc_html__("This changes the number of columns", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Portfolio Source", "werkstatt"),
	      "param_name" => "portfolio_source",
	      "value" => array(
	      	'By ID (default)' => "by_id",
	      	'Advanced' => "advanced",
	      )
	  ),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Advanced Portfolio Source", "werkstatt"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('advanced'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Portfolio IDs", "werkstatt"),
	      "param_name" => "portfolio_ids",
	      "admin_label" => true,
	      "description" => esc_html__("Enter the portfolio IDs you would like to display seperated by comma", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('by_id'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Title Position", "werkstatt"),
	      "param_name" => "title_position",
	      "value" => array(
	      	'Center' => "title-center",
	      	'Top Left' => "title-topleft",
	      	'Bottom Left' => "title-bottomleft"
	      ),
	      "description" => esc_html__("This changes the position of the title", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Animation Style", "werkstatt"),
	      "param_name" => "animation_style",
	      "value" => array(
	      	'Slide From Bottom' => "thb-animate-from-bottom",
	      	'Fade' => "thb-fade",
	      	'Scale' => "thb-scale",
	      	'No Animation' => "thb-none"
	      ),
	      "description" => esc_html__("You can change how the portfolio elements appear on the screen.", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Animation Speed", "werkstatt"),
	      "param_name" => "animation_speed",
	      "value" => array(
	      	'Slow' => "0.7",
	      	'Regular' => "0.5",
	      	'Fast' => "0.3",
	      	'Faster' => "0.2",
	      ),
	      "std" => '0.5',
	      "description" => esc_html__("You can change the animation speed of the filtering.", "werkstatt"),
	      "dependency" => Array('element' => "animation_style", 'value' => array('thb-animate-from-bottom', 'thb-scale', 'thb-fade'))
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Filters?", "werkstatt"),
	      "param_name" => "add_filters",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("This will display filters on the top", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Filter Style", "werkstatt"),
	      "param_name" => "filter_style",
	      "admin_label" => true,
	      "value" => $thb_filter_array,
	      "description" => esc_html__("This changes the style of the portfolios", "werkstatt"),
	      "dependency" => Array('element' => "add_filters", 'value' => array('true'))
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Filter Categories", "werkstatt"),
	      "param_name" => "filter_categories",
	      "value" => thb_portfolioCategories(),
	      "description" => esc_html__("Select which categories you want to filter", "werkstatt"),
	      "dependency" => Array('element' => "add_filters", 'value' => array('true'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Hover Style", "werkstatt"),
	      "param_name" => "hover_style",
	      "value" => array(
	      	'Default' => "",
	      	'Default with Small Heading' => "thb-default-small",
	      	'Show Hover Image' => "thb-image-hover",
	      	'With Border' => "thb-border-hover",
	      	'Push Top' => "thb-push-top",
	      	'Push Bottom' => "thb-push-bottom",
	      	'Gradient' => "thb-gradient-hover",
	      	'Corner Cut' => "thb-corner-hover",
	      ),
	      "description" => esc_html__("You can change the hover styles here. Hover styles are dependent on which portfolio styles you are using so they might not work for every style.", "werkstatt")
	  )
	),
	"description" => esc_html__("Display Your Portfolio in a Grid Layout", "werkstatt")
) );

// Portfolio BG Grid
vc_map( array(
	"name" => esc_html__("Portfolio Background Grid", 'werkstatt'),
	"base" => "thb_portfolio_bg_grid",
	"icon" => "thb_vc_ico_portfolio_bg_grid",
	"class" => "thb_vc_sc_portfolio_bg_grid",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Columns", "werkstatt"),
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => $thb_column_array,
	      "description" => esc_html__("This changes the number of columns", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Portfolio Source", "werkstatt"),
	      "param_name" => "portfolio_source",
	      "value" => array(
	      	'By ID (default)' => "by_id",
	      	'Advanced' => "advanced",
	      )
	  ),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Advanced Portfolio Source", "werkstatt"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('advanced'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Portfolio IDs", "werkstatt"),
	      "param_name" => "portfolio_ids",
	      "admin_label" => true,
	      "description" => esc_html__("Enter the portfolio IDs you would like to display seperated by comma", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('by_id'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Title Position", "werkstatt"),
	      "param_name" => "title_position",
	      "value" => array(
	      	'Center' => "title-center",
	      	'Top Left' => "title-topleft",
	      	'Bottom Left' => "title-bottomleft"
	      ),
	      "description" => esc_html__("This changes the position of the title", "werkstatt")
	  )
	),
	"description" => esc_html__("Display Your Portfolio in a Grid Layout with Background Change", "werkstatt")
) );

// Portfolio Carousel
vc_map( array(
	"name" => esc_html__("Portfolio Carousel", 'werkstatt'),
	"base" => "thb_portfolio_carousel",
	"icon" => "thb_vc_ico_portfolio_carousel",
	"class" => "thb_vc_sc_portfolio_carousel",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Portfolio Source", "werkstatt"),
	      "param_name" => "portfolio_source",
	      "value" => array(
	      	'By ID (default)' => "by_id",
	      	'Advanced' => "advanced",
	      )
	  ),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Advanced Portfolio Source", "werkstatt"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('advanced'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Portfolio IDs", "werkstatt"),
	      "param_name" => "portfolio_ids",
	      "admin_label" => true,
	      "description" => esc_html__("Enter the portfolio IDs you would like to display seperated by comma", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('by_id'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Portfolio Style", "werkstatt"),
	      "param_name" => "style",
	      "value" => array(
	      	'Style 1' => "style1",
	      	'Style 2' => "style2",
	      ),
	      "description" => esc_html__("Portfolio Style", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Columns", "werkstatt"),
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => $thb_column_array,
	      "description" => esc_html__("This changes the column count of the carousel", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Hover Style", "werkstatt"),
	      "param_name" => "hover_style",
	      "value" => array(
	      	'Default' => "",
	      	'Show Hover Image' => "thb-image-hover",
	      )
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Use Arrows", "werkstatt"),
	  	"param_name" => "thb_navigation",
	  	"value" => array(
	  		"Yes" => "true"
	  	),
	  	"std" => "true"
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Auto Play", "werkstatt"),
	  	"param_name" => "autoplay",
	  	"value" => array(
	  		"Yes" => "1"
	  	),
	  	"description" => esc_html__("If enabled, the carousel will autoplay.", "werkstatt"),
	  ),
	  array(
	  	"type" => "textfield",
	  	"heading" => esc_html__("Speed of the AutoPlay", "werkstatt"),
	  	"param_name" => "autoplay_speed",
	  	"value" => "5000",
	  	"description" => esc_html__("Speed of the autoplay, default 5000 (5 seconds)", "werkstatt"),
	  	"dependency" => Array('element' => "autoplay", 'value' => array('1'))
	  ),
	  
	),
	"description" => esc_html__("Display Your Portfolio in a Carousel Layout", "werkstatt")
) );

// Portfolio Slider
vc_map( array(
	"name" => esc_html__("Portfolio Slider", 'werkstatt'),
	"base" => "thb_portfolio_slider",
	"icon" => "thb_vc_ico_portfolio_slider",
	"class" => "thb_vc_sc_portfolio_slider",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "werkstatt"),
		    "param_name" => "slider_style",
		    "value" => array(
		    	'Style 1' => "slider_style1",
		    	'Style 2' => "slider_style2",
		    )
		),
		array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Portfolio Source", "werkstatt"),
	    "param_name" => "portfolio_source",
	    "value" => array(
	    	'By ID (default)' => "by_id",
	    	'Advanced' => "advanced",
	    )
		),
		array(
		    "type" => "loop",
		    "heading" => esc_html__("Advanced Portfolio Source", "werkstatt"),
		    "param_name" => "source",
		    "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "werkstatt"),
		    "dependency" => Array('element' => "portfolio_source", 'value' => array('advanced'))
		),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Portfolio IDs", "werkstatt"),
	      "param_name" => "portfolio_ids",
	      "admin_label" => true,
	      "description" => esc_html__("Enter the portfolio IDs you would like to display seperated by comma", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('by_id'))
	  ),
	  array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Button Style", "werkstatt"),
	    "param_name" => "button_style",
	    "value" => $thb_button_style_array,
	    "description" => esc_html__("This changes the look of the button", "werkstatt")
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Hide View Project Button?", "werkstatt"),
	  	"param_name" => "button_hide",
	  	"value" => array(
	  		"Yes" => "1"
	  	),
	  	"description" => esc_html__("If enabled, view project link will be hidden.", "werkstatt"),
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Use Portfolio Sub-Titles instead of Titles?", "werkstatt"),
	  	"param_name" => "thb_subtitles",
	  	"value" => array(
	  		"Yes" => "subtitles"
	  	),
	  	"description" => esc_html__("If enabled, slides will show portfolio sub-titles (defined inside portfolio pages) instead of titles.", "werkstatt")
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Affect Header Colors?", "werkstatt"),
	  	"param_name" => "thb_header_colors",
	  	"value" => array(
	  		"Yes" => "thb_change_header"
	  	),
	  	"description" => esc_html__("If enabled, slide color changes will affect the header colors as well. Recommended only if the slider is under the header at the first load of the page.", "werkstatt")
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Auto Play", "werkstatt"),
	  	"param_name" => "autoplay",
	  	"value" => array(
	  		"Yes" => "1"
	  	),
	  	"description" => esc_html__("If enabled, the carousel will autoplay.", "werkstatt"),
	  ),
	  array(
	  	"type" => "textfield",
	  	"heading" => esc_html__("Speed of the AutoPlay", "werkstatt"),
	  	"param_name" => "autoplay_speed",
	  	"value" => "5000",
	  	"description" => esc_html__("Speed of the autoplay, default 5000 (5 seconds)", "werkstatt"),
	  	"dependency" => Array('element' => "autoplay", 'value' => array('1'))
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in a Slider Layout", "werkstatt")
) );

// Portfolio List
vc_map( array(
	"name" => esc_html__("Portfolio List", 'werkstatt'),
	"base" => "thb_portfolio_list",
	"icon" => "thb_vc_ico_portfolio_list",
	"class" => "thb_vc_sc_portfolio_list",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Portfolio Source", "werkstatt"),
	      "param_name" => "portfolio_source",
	      "value" => array(
	      	'By ID (default)' => "by_id",
	      	'Advanced' => "advanced",
	      )
	  ),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Advanced Portfolio Source", "werkstatt"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('advanced'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Portfolio IDs", "werkstatt"),
	      "param_name" => "portfolio_ids",
	      "admin_label" => true,
	      "description" => esc_html__("Enter the portfolio IDs you would like to display seperated by comma", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('by_id'))
	  ),
	  array(
	  	"type" => "dropdown",
	  	"heading" => esc_html__("Style", "werkstatt"),
	  	"param_name" => "thb_style",
	  	"value" => array(
	  		"Dark" => "thb-dark",
	  		"Light" => "thb-light"
	  	),
	  	"description" => esc_html__("This changes the color of the titles, if you have a dark background, select Light."	, "werkstatt")
	  ),
	  array(
      "type" => "checkbox",
      "heading" => esc_html__("Use Zoom Effect?", "werkstatt"),
      "param_name" => "zoom_effect",
      "value" => array(
    		"Yes" => "true"
    	),
    	"std" => "true",
      "description" => esc_html__("This will add zoom effect to the images.", "werkstatt")
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in a List Layout", "werkstatt")
) );

// Portfolio BG List
vc_map( array(
	"name" => esc_html__("Portfolio Background List", 'werkstatt'),
	"base" => "thb_portfolio_bg_list",
	"icon" => "thb_vc_ico_portfolio_bg_list",
	"class" => "thb_vc_sc_portfolio_bg_list",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Portfolio Source", "werkstatt"),
	      "param_name" => "portfolio_source",
	      "value" => array(
	      	'By ID (default)' => "by_id",
	      	'Advanced' => "advanced",
	      )
	  ),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Advanced Portfolio Source", "werkstatt"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('advanced'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Portfolio IDs", "werkstatt"),
	      "param_name" => "portfolio_ids",
	      "admin_label" => true,
	      "description" => esc_html__("Enter the portfolio IDs you would like to display seperated by comma", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('by_id'))
	  ),
	  array(
	  	"type" => "dropdown",
	  	"heading" => esc_html__("Style", "werkstatt"),
	  	"param_name" => "thb_style",
	  	"value" => array(
	  		"Dark" => "thb-dark",
	  		"Light" => "thb-light"
	  	),
	  	"description" => esc_html__("This changes the color of the titles, if you have a dark background, select Light.", "werkstatt")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Full Screen Images?", "werkstatt"),
	      "param_name" => "full_screen_enabled",
	      "value" => array(
	      		"Yes" => "full_screen_enabled"
	      	),
	      "description" => esc_html__("This will make the background images full screen.", "werkstatt")
	  ),
	  array(
	    "type" => "checkbox",
	    "heading" => esc_html__("Use Zoom Effect?", "werkstatt"),
	    "param_name" => "zoom_effect",
	    "value" => array(
	  		"Yes" => "true"
	  	),
	  	"std" => "true",
	    "description" => esc_html__("This will add zoom effect to the images.", "werkstatt")
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in a List Layout with Background Change", "werkstatt")
) );

// Portfolio Text
vc_map( array(
	"name" => esc_html__("Portfolio Text", 'werkstatt'),
	"base" => "thb_portfolio_text",
	"icon" => "thb_vc_ico_portfolio_text",
	"class" => "thb_vc_sc_portfolio_text",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Portfolio Source", "werkstatt"),
	      "param_name" => "portfolio_source",
	      "value" => array(
	      	'By ID (default)' => "by_id",
	      	'Advanced' => "advanced",
	      )
	  ),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Advanced Portfolio Source", "werkstatt"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('advanced'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Portfolio IDs", "werkstatt"),
	      "param_name" => "portfolio_ids",
	      "admin_label" => true,
	      "description" => esc_html__("Enter the portfolio IDs you would like to display seperated by comma", "werkstatt"),
	      "dependency" => Array('element' => "portfolio_source", 'value' => array('by_id'))
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Filters?", "werkstatt"),
	      "param_name" => "add_filters",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("This will display filters on the top", "werkstatt")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Filter Style", "werkstatt"),
	      "param_name" => "filter_style",
	      "admin_label" => true,
	      "value" => $thb_filter_array,
	      "description" => esc_html__("This changes the style of the portfolios", "werkstatt"),
	      "dependency" => Array('element' => "add_filters", 'value' => array('true'))
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Filter Categories", "werkstatt"),
	      "param_name" => "filter_categories",
	      "value" => thb_portfolioCategories(),
	      "description" => esc_html__("Select which categories you want to filter", "werkstatt"),
	      "dependency" => Array('element' => "add_filters", 'value' => array('true'))
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Hover Previews?", "werkstatt"),
	      "param_name" => "add_previews",
	      "value" => array(
      		"Yes" => "true"
      	),
      	"std" => "true",
	      "description" => esc_html__("This will display filters on the top", "werkstatt")
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in a Text Layout", "werkstatt")
) );


// Team Member Parent
vc_map( array(
	"name" => esc_html__("Team Members", 'werkstatt'),
	"base" => "thb_team_parent",
	"icon" => "thb_vc_ico_team",
	"class" => "thb_vc_sc_team",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_parent" => array('only' => 'thb_team, thb_team_addnew'),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Layout", "werkstatt"),
		    "param_name" => "thb_style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1 (Grid)' => "style1",
		    	'Style 2 (Carousel)' => "slick"
		    ),
		    "description" => esc_html__("This changes the layout style of the team members", "werkstatt")
		),
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Team Member Style", "werkstatt"),
		    "param_name" => "thb_member_style",
		    "value" => array(
		    	'Style 1 (Text over Image)' => "member_style1",
		    	'Style 2 (Text under Image)' => "member_style2"
		    ),
		    "description" => esc_html__("This changes the style of the members", "werkstatt")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", "werkstatt"),
			"param_name" => "thb_columns",
			"admin_label" => true,
			"value" => array(
				'2 Columns' => "large-6",
				'3 Columns' => "large-4",
				'4 Columns' => "medium-4 large-3",
				'5 Columns' => "medium-6 thb-5",
				'6 Columns' => "medium-4 large-2"
			)
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "werkstatt"),
			"param_name" => "extra_class",
		),
	),
	"description" => esc_html__("Team Members", "werkstatt"),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Add Team Member Link", 'werkstatt'),
	"base" => "thb_team_addnew",
	"icon" => "thb_vc_ico_team",
	"class" => "thb_vc_sc_team",
	"as_child" => array('only' => 'thb_team_parent'),
	"params"	=> array(
		array(
			'type'           => 'vc_link',
			'heading'        => esc_html__( 'Link', 'werkstatt' ),
			'param_name'     => 'link',
			'description'    => esc_html__( 'Link to the Contact Us Page', 'werkstatt' ),
		)
	),
	"description" => esc_html__("Add New Team Member Link", "werkstatt")
) );

vc_map( array(
	"name" => esc_html__("Team Member", 'werkstatt'),
	"base" => "thb_team",
	"icon" => "thb_vc_ico_team",
	"class" => "thb_vc_sc_team",
	"as_child" => array('only' => 'thb_team_parent'),
	"params"	=> array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image', 'werkstatt' ),
			'param_name'     => 'image',
			'description'    => esc_html__( 'Add Team Member image here.', 'werkstatt' )
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Name', 'werkstatt' ),
			'param_name'     => 'name',
			'admin_label'	 => true,
			'description'    => esc_html__( 'Name of the member.', 'werkstatt' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Sub Title', 'werkstatt' ),
			'param_name'     => 'sub_title',
			'description'    => esc_html__( 'Position or title of the member.', 'werkstatt' ),
		),
		array(
			'type'           => 'textarea_safe',
			'heading'        => esc_html__( 'Description', 'werkstatt' ),
			'param_name'     => 'description',
			'description'    => esc_html__( 'Include a small description for this member, this text area supports HTML too.', 'werkstatt' ),
		),
		array(
		  "type" => "vc_link",
		  "heading" => esc_html__("Link", "werkstatt"),
		  "param_name" => "link",
		  "description" => esc_html__("If you want to link the team member to a separate page.", "werkstatt")
		),
	),
	"description" => esc_html__("Single Team Member", "werkstatt")
) );


class WPBakeryShortCode_thb_team_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_team_addnew extends WPBakeryShortCode {}
class WPBakeryShortCode_thb_team extends WPBakeryShortCode {}


// Testimonial Parent
vc_map( array(
	"name" => esc_html__("Testimonial Slider", 'werkstatt'),
	"base" => "thb_testimonial_parent",
	"icon" => "thb_vc_ico_testimonial",
	"class" => "thb_vc_sc_testimonial",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_parent" => array('only' => 'thb_testimonial'),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "werkstatt"),
		    "param_name" => "thb_style",
		    "admin_label" => true,
		    "value" => array(
		    	'Center Aligned' => "style1",
		    	'Left Aligned' => "style2",
		    	'Center Aligned - Style 2' => "style3",
		    ),
		    "description" => esc_html__("This changes the layout style of the testimonials", "werkstatt")
		),
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Columns", "werkstatt"),
		    "param_name" => "columns",
		    "value" => $thb_column_array,
		    "description" => esc_html__("This changes the column counts of the Center Aligned - Style 2", "werkstatt"),
		    "dependency" => Array('element' => "thb_style", 'value' => array('style3'))
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Auto Play", "werkstatt"),
			"param_name" => "autoplay",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, the carousel will autoplay.", "werkstatt"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the AutoPlay", "werkstatt"),
			"param_name" => "autoplay_speed",
			"value" => "4000",
			"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "werkstatt"),
			"dependency" => Array('element' => "autoplay", 'value' => array('true'))
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Display Pagination", "werkstatt"),
			"param_name" => "thb_pagination",
			"value" => array(
				"Yes" => "true"
			),
			"std" => "true"
		),
	),
	"description" => esc_html__("Testimonials Slider", "werkstatt"),
	"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => esc_html__("Testimonial", 'werkstatt'),
	"base" => "thb_testimonial",
	"icon" => "thb_vc_ico_testimonial",
	"class" => "thb_vc_sc_testimonial",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"as_child" => array('only' => 'thb_testimonial_parent'),
	"params"	=> array(
		array(
			'type'           => 'textarea',
			'heading'        => esc_html__( 'Quote', 'werkstatt' ),
			'param_name'     => 'quote',
			'description'    => esc_html__( 'Quote you want to show', 'werkstatt' ),
		),
		array(
		'type'           => 'textfield',
			'heading'        => esc_html__( 'Author', 'werkstatt' ),
			'param_name'     => 'author_name',
			'admin_label'	 => true,
			'description'    => esc_html__( 'Name of the member.', 'werkstatt' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Author Title', 'werkstatt' ),
			'param_name'     => 'author_title',
			'description'    => esc_html__( 'Title that will appear below author name.', 'werkstatt' ),
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Author Image', 'werkstatt' ),
			'param_name'     => 'author_image',
			'description'    => esc_html__( 'Add Author image here.', 'werkstatt' )
		)
	),
	"description" => esc_html__("Single Testimonial", "werkstatt")
) );
class WPBakeryShortCode_thb_testimonial_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_testimonial extends WPBakeryShortCode {}

// Twitter shortcode
vc_map( array(
	"name" => __('Twitter', 'werkstatt'),
	"base" => "thb_twitter",
	"icon" => "thb_vc_ico_twitter",
	"class" => "thb_vc_sc_twitter",
	"category" => esc_html__("by Fuel Themes", "werkstatt"),
	"params" => array(
		array(
		    "type" => "dropdown",
		    "heading" => __('Style', 'werkstatt'),
		    "param_name" => "style",
		    "value" => array(
		    	__('Style 1 - List', 'werkstatt') => "style1",
		    	__('Style 2 - Slider', 'werkstatt') => "style2",
		    ),
		    "description" => __('This changes the layout of tweets. Please Fill out Twitter Settings inside WerkStatt Theme Options > Misc.', 'werkstatt')
		),
		array(
		  "type" => "textfield",
		  "heading" => __('Number of Tweets', 'werkstatt'),
		  "param_name" => "count",
		  "admin_label" => true
		)
	),
	"description" => esc_html__( 'Display your Tweets', 'werkstatt')
) );