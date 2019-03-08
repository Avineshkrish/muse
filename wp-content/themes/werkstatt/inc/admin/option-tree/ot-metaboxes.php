<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'thb_custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */


function thb_custom_meta_boxes() {

  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $page_metabox = array(  
    'id'          => 'page_settings',
    'title'       => 'Page Settings',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
    	array(
    	  'id'          => 'tab1',
    	  'label'       => esc_html__('Header Settings', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'label'       => esc_html__('Midnight Header', 'werkstatt'),
    	  'id'          => 'midnight',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, the header will change colors with row settings.', 'werkstatt'),
    	  'std'         => 'off',
    	),
    	array(
    	  'label'       => esc_html__('Main Header Color', 'werkstatt'),
    	  'id'          => 'header_color',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('Overrides the main header color of the theme. Changes the logo and menu colors', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Light', 'werkstatt'),
    	      'value'       => 'light-title'
    	    ),
    	    array(
    	      'label'       => esc_html__('Dark', 'werkstatt'),
    	      'value'       => 'dark-title'
    	    )
    	  ),
    	  'std'         => 'dark-title',
    	  'condition'   => 'midnight:is(off)'
    	),
    	array(
    	  'label'       => esc_html__('Disable Fixed Header Fill', 'werkstatt'),
    	  'id'          => 'disable_header_fill',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, the header wont be filled with color when scrolled down or on hover.', 'werkstatt'),
    	  'std'         => 'off',
    	  'condition'   => 'midnight:is(off)'
    	),
    	array(
    	  'id'          => 'tab2',
    	  'label'       => esc_html__('Page Settings', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'label'       => esc_html__('Page Background', 'werkstatt'),
    	  'id'          => 'page_bg',
    	  'type'        => 'background',
    	  'desc'        => esc_html__('Background settings for the page.', 'werkstatt')
    	),
    	array(
    	  'label'       => esc_html__('Disable Footer', 'werkstatt'),
    	  'id'          => 'disable_footer',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, footer will not be shown on this page. Footer is disabled by default on Fullscreen template.', 'werkstatt'),
    	  'std'         => 'off',
    	),
    	array(
    	  'label'       => esc_html__('Enable Page Padding', 'werkstatt'),
    	  'id'          => 'enable_pagepadding',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, page will leave a space for the header on top.', 'werkstatt'),
    	  'std'         => 'off',
    	),
    	array(
    	  'id'          => 'tab3',
    	  'label'       => esc_html__('Listing Settings', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'id'          => 'listing_text',
    	  'label'       => esc_html__('About Listing Settings', 'werkstatt'),
    	  'desc'        => esc_html__('These settings are used when this page is used as a slide for Fullscreen layouts.', 'werkstatt'),
    	  'type'        => 'textblock'
    	),
    	array(
    	  'label'       => esc_html__('Main Color', 'werkstatt'),
    	  'id'          => 'main_color',
    	  'type'        => 'colorpicker_opacity',
    	  'desc'        => esc_html__('Used for hover colors and certain sliders', 'werkstatt')
    	),
    	array(
    	  'label'       => esc_html__('Main Title Color', 'werkstatt'),
    	  'id'          => 'main_color_title',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('Used for hover colors and certain sliders. Also used for overall colors in Full Screen template.', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Light', 'werkstatt'),
    	      'value'       => 'light-title'
    	    ),
    	    array(
    	      'label'       => esc_html__('Dark', 'werkstatt'),
    	      'value'       => 'dark-title'
    	    )
    	  ),
    	  'std'         => 'dark-title'
    	),
    	array(
    	  'id'          => 'tab4',
    	  'label'       => esc_html__('Row Settings', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'label'       => esc_html__('Row Pagination', 'werkstatt'),
    	  'id'          => 'row_pagination',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, this will show a vertical navigation to scroll between rows.', 'werkstatt'),
    	  'std'         => 'off'
    	),
    	array(
    	  'label'       => esc_html__('Row Pagination Position', 'werkstatt'),
    	  'id'          => 'row_pagination_position',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('This changes where the row pagination is displayed', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Left', 'werkstatt'),
    	      'value'       => 'left'
    	    ),
    	    array(
    	      'label'       => esc_html__('Right', 'werkstatt'),
    	      'value'       => 'right'
    	    )
    	  ),
    	  'std'         => 'left'
    	),
    	array(
    	  'label'       => esc_html__('Snap To Rows?', 'werkstatt'),
    	  'id'          => 'snap_rows',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, the page will snap(scroll smoothly) to parent rows. Requires that the footer is disabled on this page.', 'werkstatt'),
    	  'std'         => 'off',
    	),
    	array(
    	  'label'       => esc_html__('Disable Header Offset for Pagination & Snap Feature', 'werkstatt'),
    	  'id'          => 'row_header_offset',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('This toggles calculation of header height for the snap / scroll features.', 'werkstatt'),
    	  'std'         => 'off'
    	),
    	array(
    	  'id'          => 'tab5',
    	  'label'       => esc_html__('Full Screen Settings', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'id'          => 'fullscreen_text',
    	  'label'       => esc_html__('About Full Screen Settings', 'werkstatt'),
    	  'desc'        => esc_html__('Below settings are used when you choose the Full Screen Page template.', 'werkstatt'),
    	  'type'        => 'textblock'
    	),
    	array(
    	  'label'       => esc_html__('Full Screen Style', 'werkstatt'),
    	  'id'          => 'fs_layout',
    	  'type'        => 'radio-image',
    	  'std'         => 'style1'
    	),
    	array(
    	  'label'       => esc_html__('Full Screen Footer Style', 'werkstatt'),
    	  'id'          => 'fs_footer',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('Shows different information based on style. Depends on which Full Screen style is being used.', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Style 1', 'werkstatt'),
    	      'value'       => 'footer_style1'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 2', 'werkstatt'),
    	      'value'       => 'footer_style2'
    	    )
    	  ),
    	  'std'         => 'footer_style1',
    	  'operator' 		=> 'or',
    	  'condition'   => 'fs_layout:is(style1),fs_layout:is(style3),fs_layout:is(style4),fs_layout:is(style5),fs_layout:is(style6),fs_layout:is(style7)'
    	),
    	array(
    	  'label'       => esc_html__('Show All Projects Link?', 'werkstatt'),
    	  'id'          => 'fs_all',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('You can remove the Show All Projects link if you want. Used inside Footer Style 1.', 'werkstatt'),
    	  'std'         => 'on'
    	),
    	array(
    	  'label'       => esc_html__('All Projects Link Behaviour', 'werkstatt'),
    	  'id'          => 'fs_all_type',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('Changes the behaviour of the All Projects link', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Shows Portfolio Selection', 'werkstatt'),
    	      'value'       => 'style1'
    	    ),
    	    array(
    	      'label'       => esc_html__('Links to URL', 'werkstatt'),
    	      'value'       => 'style2'
    	    )
    	  ),
    	  'std'         => 'style1',
    	  'condition'   => 'fs_all:is(on)'
    	),
    	array(
    	  'label'       => esc_html__('Enter All Projects Link', 'werkstatt'),
    	  'id'          => 'fs_all_link',
    	  'type'        => 'text',
    	  'desc'        => esc_html__('Enter the url of the page you want the link the All Projects to.', 'werkstatt'),
    	  'operator' 		=> 'and',
    	  'condition'   => 'fs_all_type:is(style2),fs_all:is(on)'
    	),
    	array(
    	  'label'       => esc_html__('Auto Play', 'werkstatt'),
    	  'id'          => 'fs_autoplay',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('You can enable Auto Play', 'werkstatt'),
    	  'std'         => 'off',
    	  'operator' 		=> 'or',
    	  'condition'   => 'fs_layout:is(style1),fs_layout:is(style3),fs_layout:is(style4),fs_layout:is(style5),fs_layout:is(style6),fs_layout:is(style7)'
    	),
    	array(
    		'id'          => 'fs_autoplay_speed',
    	  'label'       => esc_html__('Auto Play Duration', 'werkstatt'),
    	  'desc'        => esc_html__('How long it should pass before the slides change. The numbers are in miliseconds (ms)', 'werkstatt'),
    	  'std'         => '5000',
    	  'type'        => 'numeric-slider',
    	  'min_max_step'=> '500,10000,100',
    	  'condition'   => 'fs_autoplay:is(on)'
    	),
    	array(
    	  'id'          => 'tab6',
    	  'label'       => esc_html__('Full Screen Slides', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'label'       => esc_html__('Full Screen Slides', 'werkstatt'),
    	  'id'          => 'fs_slides',
    	  'type'        => 'list-item',
    	  'settings'    => array(
    	  	array(
    	  	  'label'       => esc_html__('Use Slide Title?', 'werkstatt'),
    	  	  'id'          => 'slide_title',
    	  	  'type'        => 'on_off',
    	  	  'desc'        => esc_html__('This will force the slide to use the slide title defined top instead of the portfolio/page title.', 'werkstatt'),
    	  	  'std'         => 'off'
    	  	),
    	  	array(
    	  	  'label'       => esc_html__('Slide Source', 'werkstatt'),
    	  	  'id'          => 'slide_source',
    	  	  'type'        => 'radio',
    	  	  'desc'        => esc_html__('This changes the source of the slides.', 'werkstatt'),
    	  	  'choices'     => array(
    	  	    array(
    	  	      'label'       => esc_html__('Portfolio', 'werkstatt'),
    	  	      'value'       => 'portfolio'
    	  	    ),
    	  	    array(
    	  	      'label'       => esc_html__('Page', 'werkstatt'),
    	  	      'value'       => 'page'
    	  	    )
    	  	  ),
    	  	  'std'         => 'portfolio'
    	  	),
    	  	array(
    	  	  'label'       => esc_html__('Page', 'werkstatt'),
    	  	  'id'          => 'page',
    	  	  'type'        => 'page_select',
    	  	  'desc'        => esc_html__('Select which page to display', 'werkstatt'),
    	  	  'condition'   => 'slide_source:is(page)'
    	  	),
    	  	array(
    	  	  'label'       => esc_html__('Portfolio Item', 'werkstatt'),
    	  	  'id'          => 'portfolio',
    	  	  'type'        => 'custom_post_type_select',
    	  	  'post_type' 	=> 'portfolio',
    	  	  'desc'        => esc_html__('Select which portfolio to display', 'werkstatt'),
    	  	  'condition'   => 'slide_source:is(portfolio)'
    	  	),
    	  	array(
    	  	  'label'       => esc_html__('Background Position', 'werkstatt'),
    	  	  'id'          => 'bg_position',
    	  	  'type'        => 'radio',
    	  	  'desc'        => esc_html__('This changes how the background position change when the screen is resized.', 'werkstatt'),
    	  	  'choices'     => array(
    	  	    array(
    	  	      'label'       => esc_html__('Left', 'werkstatt'),
    	  	      'value'       => 'bg-left'
    	  	    ),
    	  	    array(
    	  	      'label'       => esc_html__('Center', 'werkstatt'),
    	  	      'value'       => 'bg-center'
    	  	    ),
    	  	    array(
    	  	      'label'       => esc_html__('Right', 'werkstatt'),
    	  	      'value'       => 'bg-right'
    	  	    )
    	  	  ),
    	  	  'std'         => 'bg-center'
    	  	),
    	  	array(
    	  	  'label'       => esc_html__('Secondary Image', 'werkstatt'),
    	  	  'id'          => 'portfolio_secondary',
    	  	  'type'        => 'upload',
    	  	  'class'       => 'ot-upload-attachment-id',
    	  	  'desc'        => esc_html__('This is used when Parallax Objects style is used. Please upload', 'werkstatt')
    	  	),
    	  	array(
    	  	  'label'       => esc_html__('Enable Retina for Secondary Image?', 'werkstatt'),
    	  	  'id'          => 'portfolio_secondary_retina',
    	  	  'type'        => 'on_off',
    	  	  'desc'        => esc_html__('This will cause the secondary image to be shown half size so it looks good on retina devices. Make sure you upload 2x image.', 'werkstatt'),
    	  	  'std'         => 'on'
    	  	),
    	  )
    	),
    	array(
    	  'id'          => 'tab7',
    	  'label'       => esc_html__('One Page Settings', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'id'          => 'onepage_text',
    	  'label'       => esc_html__('About One Page Settings', 'werkstatt'),
    	  'desc'        => esc_html__('Below settings are used when you choose the One Page template.', 'werkstatt'),
    	  'type'        => 'textblock'
    	),
    	array(
    	  'label'       => esc_html__('Disable Scroll on Desktop', 'werkstatt'),
    	  'id'          => 'disable_scroll',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('Your slides wont scroll on desktop screens when enabled.', 'werkstatt'),
    	  'std'         => 'on'
    	),
    )
  );
  
  $portfolio_metabox = array(  
    'id'          => 'portfolio_meta_style',
    'title'       => 'Portfolio Settings',
    'pages'       => array( 'portfolio' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
    	array(
    	  'id'          => 'tab1',
    	  'label'       => esc_html__('Listing Settings', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'label'       => esc_html__('Main Color', 'werkstatt'),
    	  'id'          => 'main_color',
    	  'type'        => 'colorpicker_opacity',
    	  'desc'        => esc_html__('Used for hover colors and certain sliders', 'werkstatt')
    	),
    	array(
    	  'label'       => esc_html__('Main Title Color', 'werkstatt'),
    	  'id'          => 'main_color_title',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('Used for hover colors and certain sliders. Also used for overall colors in Full Screen template.', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Light', 'werkstatt'),
    	      'value'       => 'light-title'
    	    ),
    	    array(
    	      'label'       => esc_html__('Dark', 'werkstatt'),
    	      'value'       => 'dark-title'
    	    )
    	  ),
    	  'std'         => 'dark-title'
    	),
    	array(
    	  'label'       => esc_html__('Hover Image', 'werkstatt'),
    	  'id'          => 'main_hover_image',
    	  'type'        => 'upload',
    	  'class'       => 'ot-upload-attachment-id',
    	  'desc'        => esc_html__('This is used when the hover style is set to "Show Hover Image" inside VC element settings', 'werkstatt')
    	),
    	array(
    	  'label'       => esc_html__('Listing Type', 'werkstatt'),
    	  'id'          => 'main_listing_type',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('By default, portfolio image links to the portfolio page. You can change it here, however, it is currently only available on Masonry and Grid type listings.', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Regular', 'werkstatt'),
    	      'value'       => 'regular'
    	    ),
    	    array(
    	      'label'       => esc_html__('Lightbox', 'werkstatt'),
    	      'value'       => 'lightbox'
    	    ),
    	    array(
    	      'label'       => esc_html__('Link', 'werkstatt'),
    	      'value'       => 'link'
    	    )
    	  ),
    	  'std'         => 'regular'
    	),
    	array(
    	  'label'       => esc_html__('Enter Link', 'werkstatt'),
    	  'id'          => 'main_listing_link',
    	  'type'        => 'text',
    	  'desc'        => esc_html__('Enter the url of the page you want the portfolio item to link to.', 'werkstatt'),
    	  'condition'   => 'main_listing_type:is(link)'
    	),
    	array(
    	  'id'          => 'tab2',
    	  'label'       => esc_html__('Header', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'label'       => esc_html__('Portfolio Header Style', 'werkstatt'),
    	  'id'          => 'portfolio_header_style',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('Changes the portfolio header. <br/><br/><small><strong>Special note for Style6:</strong> VC options are limited, you can still use VC elements, but they will be limited to half of the screen.</small>', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Style 1', 'werkstatt'),
    	      'value'       => 'style1'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 2', 'werkstatt'),
    	      'value'       => 'style2'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 3', 'werkstatt'),
    	      'value'       => 'style3'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 4', 'werkstatt'),
    	      'value'       => 'style4'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 5 - (Floating Button)', 'werkstatt'),
    	      'value'       => 'style5'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 6 - (Left or Right Header)', 'werkstatt'),
    	      'value'       => 'style6'
    	    ),
    	    array(
    	      'label'       => esc_html__('No Header', 'werkstatt'),
    	      'value'       => 'style99'
    	    ),
    	  ),
    	  'std'         => 'style1'
    	),
    	array(
    	  'label'       => esc_html__('Style 6 Header Alignment', 'werkstatt'),
    	  'id'          => 'style6_header_alignment',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('You can switch between left and right', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Right', 'werkstatt'),
    	      'value'       => 'right'
    	    ),
    	    array(
    	      'label'       => esc_html__('Left', 'werkstatt'),
    	      'value'       => 'left'
    	    )
    	  ),
    	  'std'         => 'right',
    	  'condition'   => 'portfolio_header_style:is(style6)'
    	),
    	array(
    	  'label'       => esc_html__('Style 6 Header Fixed Position', 'werkstatt'),
    	  'id'          => 'style6_header_fixed',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('You can toggle the fixed content here.', 'werkstatt'),
    	  'std'         => 'on',
    	  'condition'   => 'portfolio_header_style:is(style6)'
    	),
    	array(
    	  'label'       => esc_html__('Main Header Color', 'werkstatt'),
    	  'id'          => 'header_color',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('Overrides the main header color of the theme. Changes the logo and menu colors', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Light', 'werkstatt'),
    	      'value'       => 'light-title'
    	    ),
    	    array(
    	      'label'       => esc_html__('Dark', 'werkstatt'),
    	      'value'       => 'dark-title'
    	    )
    	  ),
    	  'std'         => 'dark-title'
    	),
    	array(
    	  'label'       => esc_html__('Header Background Type', 'werkstatt'),
    	  'id'          => 'portfolio_header_bg_type',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('By default, a color / image is display, you can also use a self hosted video. You can upload your video from the Video tab.', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Image', 'werkstatt'),
    	      'value'       => 'image'
    	    ),
    	    array(
    	      'label'       => esc_html__('Video', 'werkstatt'),
    	      'value'       => 'video'
    	    )
    	  ),
    	  'std'         => 'image',
    	  'operator' 		=> 'or',
    	  'condition'   => 'portfolio_header_style:is(style1),portfolio_header_style:is(style2),portfolio_header_style:is(style3),portfolio_header_style:is(style4)'
    	),
    	array(
    	  'label'       => esc_html__('Header Image', 'werkstatt'),
    	  'id'          => 'portfolio_header_bg',
    	  'type'        => 'background',
    	  'desc'        => esc_html__('Background setting for the header. This will override the featured image you have set.', 'werkstatt'),
    	  'condition'   => 'portfolio_header_bg_type:is(image)'
    	),
    	array(
    	  'label'       => esc_html__('Display Attributes inside Header?', 'werkstatt'),
    	  'id'          => 'portfolio_header_attributes',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('If you want, you can turn off display of attributes inside the header. You can always add them using the Portfolio Attributes VC element.', 'werkstatt'),
    	  'std'         => 'on'
    	),
    	array(
    	  'label'       => esc_html__('Header Height', 'werkstatt'),
    	  'id'          => 'header_height',
    	  'type'        => 'numeric-slider',
    	  'desc'        => esc_html__('This changes the height of the portfolio header. The values is percent of the screen height. 100 is 100% screen height. <small>If your content is larger than the header, it will expand</small>', 'werkstatt'),
    	 	'min_max_step'=> '0,100,10',
    	  'std'         => '50'
    	),
    	array(
    	  'label'       => esc_html__('Header Title Background', 'werkstatt'),
    	  'id'          => 'portfolio_header_bg_2',
    	  'type'        => 'background',
    	  'desc'        => esc_html__('Background setting when the header is below the image.', 'werkstatt'),
    	  'operator' 		=> 'or',
    	  'condition'   => 'portfolio_header_style:is(style2),portfolio_header_style:is(style3)'
    	),
    	array(
    	  'label'       => esc_html__('Display Scroll To Bottom Arrow?', 'werkstatt'),
    	  'id'          => 'portfolio_header_arrow',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, this will show a clickable arrow that scrolls to bottom of the portfolio header image.', 'werkstatt'),
    	  'std'         => 'on',
    	),
    	array(
    	  'label'       => esc_html__('Scroll To Bottom Arrow Style', 'werkstatt'),
    	  'id'          => 'portfolio_header_arrow_style',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('You can choose from 2 styles.', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Line', 'werkstatt'),
    	      'value'       => 'style1'
    	    ),
    	    array(
    	      'label'       => esc_html__('Mouse', 'werkstatt'),
    	      'value'       => 'style2'
    	    )
    	  ),
    	  'std'         => 'style1',
    	  'condition'   => 'portfolio_header_arrow:is(on)'
    	),
    	array(
    	  'id'          => 'tab3',
    	  'label'       => esc_html__('Header Video', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'label'       => esc_html__('Video Upload', 'werkstatt'),
    	  'id'          => 'portfolio_header_video',
    	  'type'        => 'upload',
    	  'class'       => 'ot-upload-attachment-id',
    	  'desc'        => esc_html__('This is used when the "Header Background Type" is set to "Video"', 'werkstatt')
    	),
    	array(
    	  'label'       => esc_html__('Video Loop', 'werkstatt'),
    	  'id'          => 'portfolio_header_video_loop',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, the video will loop continuously.', 'werkstatt'),
    	  'std'         => 'on',
    	),
    	array(
    	  'label'       => esc_html__('Video Poster', 'werkstatt'),
    	  'id'          => 'portfolio_header_video_poster',
    	  'type'        => 'upload',
    	  'class'       => 'ot-upload-attachment-id',
    	  'desc'        => esc_html__('This is used for mobile devices.', 'werkstatt')
    	),
    	array(
    	  'id'          => 'tab4',
    	  'label'       => esc_html__('Subtitle & Attributes', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'label'       => esc_html__('Portfolio Sub-Title', 'werkstatt'),
    	  'id'          => 'portfolio_subtitle',
    	  'type'        => 'textarea-simple',
    	  'desc'        => esc_html__('If you want, you can add a subtitle below the main title. You can also use the Portfolio Excerpt to add some text.', 'werkstatt'),
    	  'rows'        => '4'
    	),
    	array(
    	  'label'       => esc_html__('Client Name', 'werkstatt'),
    	  'id'          => 'client_name',
    	  'type'        => 'text',
    	  'desc'        => esc_html__('Name of client', 'werkstatt')
    	),
    	array(
    	  'label'       => esc_html__('Client Website', 'werkstatt'),
    	  'id'          => 'client_website',
    	  'type'        => 'text',
    	  'desc'        => esc_html__('Client website address', 'werkstatt')
    	),
    	array(
    	  'label'       => esc_html__('Client Delivery Date', 'werkstatt'),
    	  'id'          => 'client_date',
    	  'type'        => 'date_picker',
    	  'desc'        => esc_html__('The date the project is delivered', 'werkstatt')
    	),
    	array(
    	  'label'       => esc_html__('Client Services', 'werkstatt'),
    	  'id'          => 'client_services',
    	  'type'        => 'text',
    	  'desc'        => esc_html__('Services delivered for the client', 'werkstatt')
    	),
    	array(
    	  'label'       => esc_html__('Add Custom Attributes', 'werkstatt'),
    	  'id'          => 'client_more',
    	  'type'        => 'list-item',
    	  'settings'    => array(
    	  	array(
    	  	  'label'       => esc_html__('Value', 'werkstatt'),
    	  	  'id'          => 'client_custom_value',
    	  	  'type'        => 'text',
    	  	  'desc'        => esc_html__('The value of the attribute', 'werkstatt')
    	  	),
    	  	array(
    	  	  'label'       => esc_html__('Link', 'werkstatt'),
    	  	  'id'          => 'client_custom_link',
    	  	  'type'        => 'text',
    	  	  'desc'        => esc_html__('The above link value will be linked to this address.', 'werkstatt')
    	  	)
    	  )
    	),
    	array(
    	  'id'          => 'tab5',
    	  'label'       => esc_html__('Other', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'label'       => esc_html__('Portfolio Background', 'werkstatt'),
    	  'id'          => 'portfolio_bg',
    	  'type'        => 'background',
    	  'desc'        => esc_html__('Background settings for the portfolio.', 'werkstatt')
    	),
    	array(
    	  'label'       => esc_html__('Portfolio Main Page Selection', 'werkstatt'),
    	  'id'          => 'portfolio_main',
    	  'type'        => 'page-select',
    	  'desc'        => esc_html__('Overrides the main page selection inside theme options', 'werkstatt'),
    	  'section'     => 'portfolio'
    	),
    	array(
    	  'label'       => esc_html__('Disable Footer', 'werkstatt'),
    	  'id'          => 'disable_footer',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, footer will not be shown on this page. Footer is disabled by default on Fullscreen template.', 'werkstatt'),
    	  'std'         => 'off',
    	),
    	array(
    	  'label'       => esc_html__('Row Pagination', 'werkstatt'),
    	  'id'          => 'row_pagination',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, this will show a vertical navigation to scroll between rows.', 'werkstatt'),
    	  'std'         => 'off',
    	),
    	array(
    	  'label'       => esc_html__('Row Pagination Position', 'werkstatt'),
    	  'id'          => 'row_pagination_position',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('This changes where the row pagination is displayed', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Left', 'werkstatt'),
    	      'value'       => 'left'
    	    ),
    	    array(
    	      'label'       => esc_html__('Right', 'werkstatt'),
    	      'value'       => 'right'
    	    )
    	  ),
    	  'std'         => 'left'
    	),
    	array(
    	  'label'       => esc_html__('Snap To Rows?', 'werkstatt'),
    	  'id'          => 'snap_rows',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('When enabled, the page will snap(scroll smoothly) to parent rows. Requires that the footer is disabled on this page.', 'werkstatt'),
    	  'std'         => 'off',
    	),
    	array(
    	  'label'       => esc_html__('Disable Header Offset for Pagination & Snap Feature', 'werkstatt'),
    	  'id'          => 'row_header_offset',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('This toggles calculation of header height for the snap / scroll features.', 'werkstatt'),
    	  'std'         => 'off'
    	),
    )
  );
  $post_metabox = array(  
    'id'          => 'post_meta_style',
    'title'       => esc_html__('Post Settings', 'werkstatt'),
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
    	array(
    	  'id'          => 'tab1',
    	  'label'       => esc_html__('Style', 'werkstatt'),
    	  'type'        => 'tab'
    	),
    	array(
    	  'label'       => esc_html__('Override Default Article Style?', 'werkstatt'),
    	  'id'          => 'article_style_override',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('You can change the article style here', 'werkstatt'),
    	  'std'         => 'off'
    	),
    	array(
    	  'label'       => esc_html__('Article Style', 'werkstatt'),
    	  'id'          => 'article_style',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('You can choose your Article Style here.', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Title Overlay - No Post Formats', 'werkstatt'),
    	      'value'       => 'style1'
    	    ),
    	    array(
    	      'label'       => esc_html__('Full Image', 'werkstatt'),
    	      'value'       => 'style2'
    	    ),
    	    array(
    	      'label'       => esc_html__('Full Image with Sidebar', 'werkstatt'),
    	      'value'       => 'style3'
    	    ),
    	    array(
    	      'label'       => esc_html__('Medium Image with Sidebar', 'werkstatt'),
    	      'value'       => 'style4'
    	    ),
    	    array(
    	      'label'       => esc_html__('Small Image with Sidebar', 'werkstatt'),
    	      'value'       => 'style5'
    	    ),
    	  ),
    	  'std'         => 'style1',
    	  'condition'   => 'article_style_override:is(on)'
    	),
      array(
        'id'          => 'tab2',
        'label'       => esc_html__('Gallery Format Settings', 'werkstatt'),
        'type'        => 'tab'
      ),
      array(
        'id'          => 'video_post_layout_text',
        'label'       => esc_html__('About Gallery Settings', 'werkstatt'),
        'desc'        => esc_html__('These layouts are used for "Gallery" post format.', 'werkstatt'),
        'type'        => 'textblock'
      ),
      array(
        'label'       => esc_html__('Gallery Photos', 'werkstatt'),
        'id'          => 'post-gallery-photos',
        'type'        => 'gallery'
      ),
      array(
        'id'          => 'tab3',
        'label'       => esc_html__('Video Format Settings', 'werkstatt'),
        'type'        => 'tab'
      ),
      array(
        'id'          => 'video_post_layout_text',
        'label'       => esc_html__('About Video Settings', 'werkstatt'),
        'desc'        => esc_html__('These layouts are used for "Video" post format.', 'werkstatt'),
        'type'        => 'textblock'
      ),
      array(
        'label'       => esc_html__('Video URL', 'werkstatt'),
        'id'          => 'post_video',
        'type'        => 'text',
        'desc'        => esc_html__('Video URL. You can find a list of websites you can embed here: <a href="http://codex.wordpress.org/Embeds">Wordpress Embeds</a>', 'werkstatt'),
        'std'         => ''
      ),
      array(
        'id'          => 'tab4',
        'label'       => esc_html__('Link Format Settings', 'werkstatt'),
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__('Link URL', 'werkstatt'),
        'id'          => 'post_link',
        'type'        => 'text',
        'desc'        => esc_html__('This will make the post link to the URL you have specified, so if an external link is given, your actual post wont be reachable.', 'werkstatt'),
        'std'         => ''
      ),
    )
  );
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
	ot_register_meta_box( $page_metabox );
	ot_register_meta_box( $portfolio_metabox );
	ot_register_meta_box( $post_metabox );
}