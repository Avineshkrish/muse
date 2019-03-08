<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', 'thb_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function thb_custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'sections'        => array(
      array(
        'title'       => esc_html__('Blog', 'werkstatt'),
        'id'          => 'blog'
      ),
      array(
        'title'       => esc_html__('Header & Menu', 'werkstatt'),
        'id'          => 'header'
      ),
      array(
        'title'       => esc_html__('Portfolio', 'werkstatt'),
        'id'          => 'portfolio'
      ),
      array(
        'title'       => esc_html__('Shop', 'werkstatt'),
        'id'          => 'shop'
      ),
      array(
        'title'       => esc_html__('Footer', 'werkstatt'),
        'id'          => 'footer'
      ),
      array(
        'title'       => esc_html__('Typography', 'werkstatt'),
        'id'          => 'typography'
      ),
      array(
        'title'       => esc_html__('Customization', 'werkstatt'),
        'id'          => 'customization'
      ),
      array(
        'title'       => esc_html__('Sound & Music', 'werkstatt'),
        'id'          => 'sounds'
      ),
      array(
        'title'       => esc_html__('Misc', 'werkstatt'),
        'id'          => 'misc'
      )
    ),
    'settings'        => array(
    	array(
    	  'id'          => 'blog_tab0',
    	  'label'       => esc_html__('Blog Listing', 'werkstatt'),
    	  'type'        => 'tab',
    	  'section'     => 'blog'
    	),
    	array(
    	  'label'       => esc_html__('Blog Style', 'werkstatt'),
    	  'id'          => 'blog_style',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('You can choose different blog styles here', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Style 1 - Grid', 'werkstatt'),
    	      'value'       => 'style1'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 2 - Vertical', 'werkstatt'),
    	      'value'       => 'style2'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 3 - Left Thumbnail', 'werkstatt'),
    	      'value'       => 'style3'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 4 - Hover List', 'werkstatt'),
    	      'value'       => 'style4'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 5 - Masonry', 'werkstatt'),
    	      'value'       => 'style5'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 6 - Hover Grid', 'werkstatt'),
    	      'value'       => 'style6'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 7 - Large Left Thumbnail', 'werkstatt'),
    	      'value'       => 'style7'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 8 - Border Grid', 'werkstatt'),
    	      'value'       => 'style8'
    	    ),
    	  ),
    	  'std'         => 'style1',
    	  'section'     => 'blog'
    	),
    	array(
    	  'label'       => esc_html__('Blog Pagination Style', 'werkstatt'),
    	  'id'          => 'blog_pagination_style',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('You can choose different blog pagination styles here. The regular pagination will be used for archive pages.', 'werkstatt'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Regular Pagination', 'werkstatt'),
    	      'value'       => 'style1'
    	    ),
    	    array(
    	      'label'       => esc_html__('Load More Button', 'werkstatt'),
    	      'value'       => 'style2'
    	    ),
    	    array(
    	      'label'       => esc_html__('Infinite Scroll', 'werkstatt'),
    	      'value'       => 'style3'
    	    )
    	  ),
    	  'std'         => 'style1',
    	  'section'     => 'blog'
    	),
      array(
        'id'          => 'blog_tab1',
        'label'       => esc_html__('Article Settings', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Article Style', 'werkstatt'),
        'id'          => 'article_style',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose a default Article Style here.', 'werkstatt'),
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
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Use Header Animation?', 'werkstatt'),
        'id'          => 'blog_header_animation',
        'type'        => 'on_off',
        'desc'        => esc_html__('When scrolling down, the header will transform to display the sharing icons.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Display Tags?', 'werkstatt'),
        'id'          => 'article_tags',
        'type'        => 'on_off',
        'desc'        => esc_html__('Displays article tags at the bottom', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Display Author Info?', 'werkstatt'),
        'id'          => 'article_author',
        'type'        => 'on_off',
        'desc'        => esc_html__('Displays author information at the bottom. Will only be displayed if the author description is filled.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Display Related Posts?', 'werkstatt'),
        'id'          => 'article_related',
        'type'        => 'on_off',
        'desc'        => esc_html__('Displays related posts at the bottom.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Number of Related Posts', 'werkstatt'),
        'id'          => 'article_related_count',
        'type'        => 'text',
        'desc'        => esc_html__('Number of related posts to show', 'werkstatt'),
        'condition'   => 'article_related:is(on)',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Display Article Navigation?', 'werkstatt'),
        'id'          => 'blog_nav',
        'type'        => 'on_off',
        'desc'        => esc_html__('Displays article navigation at the bottom', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'id'          => 'blog_tab2',
        'label'       => esc_html__('Sharing Settings', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'blog'
      ),
      array(
        'label'       => 'Sharing buttons',
        'id'          => 'sharing_buttons',
        'type'        => 'checkbox',
        'desc'        => 'You can choose which social networks to display and get counts from. Please visit <strong>Theme Options > Misc</strong> to fill out application details for the social media sites you choose. This also affects the Portfolio Pages.',
        'choices'     => array(
          array(
            'label'       => 'Facebook',
            'value'       => 'facebook'
          ),
          array(
            'label'       => 'Twitter',
            'value'       => 'twitter'
          ),
          array(
            'label'       => 'Pinterest',
            'value'       => 'pinterest'
          ),
          array(
            'label'       => 'Google Plus',
            'value'       => 'google-plus'
          ),
          array(
            'label'       => 'Linkedin',
            'value'       => 'linkedin'
          ),
          array(
            'label'       => 'Vkontakte',
            'value'       => 'vkontakte'
          ),
          array(
            'label'       => 'WhatsApp',
            'value'       => 'whatsapp'
          ),
          array(
            'label'       => 'Facebook Messenger',
            'value'       => 'facebook-messenger'
          ),
          array(
            'label'       => 'E-Mail',
            'value'       => 'email'
          )
        ),
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Facebook App ID', 'werkstatt'),
        'id'          => 'facebook_app_id',
        'type'        => 'text',
        'desc'        => esc_html__('Facebook Application ID for Facebook Messenger, available <a href="https://developers.facebook.com/apps/" target="_blank">here</a>', 'werkstatt'),
        'section'     => 'blog'
      ),
      array(
        'id'          => 'portfolio_tab0',
        'label'       => esc_html__('General', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'portfolio'
      ),
      array(
        'label'       => esc_html__('Portfolio Slug', 'werkstatt'),
        'id'          => 'portfolio_slug',
        'type'        => 'text',
        'desc'        => esc_html__('The portfolio slug used for the portfolio permalinks', 'werkstatt'),
        'section'     => 'portfolio'
      ),
      array(
        'label'       => esc_html__('Portfolio Main Page Selection', 'werkstatt'),
        'id'          => 'portfolio_main',
        'type'        => 'page-select',
        'desc'        => esc_html__('The page that the portfolio navigation links back to. This can be overridden inside individual portfolio items.', 'werkstatt'),
        'section'     => 'portfolio'
      ),
      array(
        'id'          => 'portfolio_tab1',
        'label'       => esc_html__('Detail', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'portfolio'
      ),
      array(
        'label'       => esc_html__('Use Header Animation?', 'werkstatt'),
        'id'          => 'portfolio_header_animation',
        'type'        => 'on_off',
        'desc'        => esc_html__('When scrolling down, the header will transform to display the sharing icons.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'portfolio'
      ),
      array(
        'label'       => esc_html__('Portfolio Title / Description Animation', 'werkstatt'),
        'id'          => 'portfolio_title_animation',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can toggle the title animations for the portfolio pages here.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'portfolio'
      ),
      array(
        'label'       => esc_html__('Display Portfolio Navigation?', 'werkstatt'),
        'id'          => 'portfolio_nav',
        'type'        => 'on_off',
        'desc'        => esc_html__('Displays portfolio navigation at the bottom', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'portfolio'
      ),
      array(
        'label'       => esc_html__('Limit Navigation to Same Categories?', 'werkstatt'),
        'id'          => 'portfolio_nav_cat',
        'type'        => 'on_off',
        'desc'        => esc_html__('When enabled, the portfolio navigation will be limited within same categories', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'portfolio',
        'condition'   => 'portfolio_nav:is(on)'
      ),
      array(
        'id'          => 'shop_tab0',
        'label'       => esc_html__('General', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'shop'
      ),
      array(
        'label'       => esc_html__('Product Pagination Style', 'werkstatt'),
        'id'          => 'shop_product_listing_pagination',
        'type'        => 'radio',
        'desc'        => esc_html__('Which pagination syle would you like to use on shop page?', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Regular Pagination', 'werkstatt'),
            'value'       => 'style1'
          ),
          array(
            'label'       => esc_html__('Load More Button', 'werkstatt'),
            'value'       => 'style2'
          ),
          array(
            'label'       => esc_html__('Infinite Load', 'werkstatt'),
            'value'       => 'style3'
          )
        ),
        'std'         => 'style1',
        'section'     => 'shop'
      ),
      array(
        'label'       => esc_html__('Product Listing Style', 'werkstatt'),
        'id'          => 'shop_product_listing',
        'type'        => 'radio',
        'desc'        => esc_html__('Which style would you like to use on listing pages?', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Style 1', 'werkstatt'),
            'value'       => 'style1'
          ),
          array(
            'label'       => esc_html__('Style 2', 'werkstatt'),
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'shop'
      ),
      array(
        'label'       => esc_html__('Product Title Color', 'werkstatt'),
        'id'          => 'product_style1_color',
        'type'        => 'radio',
        'desc'        => esc_html__('If you have dark product images, you can use the Light option.', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light', 'werkstatt'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Dark', 'werkstatt'),
            'value'       => 'dark'
          )
        ),
        'std'         => 'dark',
        'section'     => 'shop',
        'condition'   => 'shop_product_listing:is(style1)'
      ),
      array(
        'label'       => esc_html__('Shop Sidebar', 'werkstatt' ),
        'id'          => 'shop_sidebar',
        'type'        => 'radio',
        'desc'        => esc_html__('Would you like to display sidebar on shop main and category pages?', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('No Sidebar', 'werkstatt'),
            'value'       => 'no'
          ),
          array(
            'label'       => esc_html__('Right Sidebar', 'werkstatt'),
            'value'       => 'right'
          ),
          array(
            'label'       => esc_html__('Left Sidebar', 'werkstatt'),
            'value'       => 'left'
          )
        ),
        'std'         => 'no',
        'section'     => 'shop'
      ),
      array(
        'label'       => esc_html__('Products Per Page', 'werkstatt' ),
        'id'          => 'products_per_page',
        'type'        => 'text',
        'section'     => 'shop',
        'std' 				=> '12'
      ),
      array(
      	'label'       => esc_html__('Products Per Row', 'werkstatt' ),
        'id'          => 'products_per_row',
        'std'         => '4',
        'type'        => 'numeric-slider',
        'section'     => 'shop',
        'min_max_step'=> '2,6,1'
      ),
      array(
        'id'          => 'shop_tab1',
        'label'       => esc_html__('Product Page', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'shop'
      ),
      array(
        'label'       => esc_html__('Product Style', 'werkstatt' ),
        'id'          => 'product_style',
        'type'        => 'radio',
        'desc'        => esc_html__('This changes the layout of the product pages.', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Style 1', 'werkstatt'),
            'value'       => 'style1'
          ),
          array(
            'label'       => esc_html__('Style 2', 'werkstatt'),
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'shop'
      ),
      array(
        'label'       => esc_html__('Product Image Position Style', 'werkstatt' ),
        'id'          => 'product_image_position',
        'type'        => 'radio',
        'desc'        => esc_html__('This changes the position of the image', 'werkstatt'),
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
        'std'         => 'left',
        'section'     => 'shop'
      ),
      array(
        'label'       => esc_html__('Product Image Size', 'werkstatt' ),
        'id'          => 'product_image_size',
        'type'        => 'radio',
        'desc'        => esc_html__('This changes the space image takes up', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Small', 'werkstatt'),
            'value'       => '4'
          ),
          array(
            'label'       => esc_html__('Medium', 'werkstatt'),
            'value'       => '6'
          ),
          array(
            'label'       => esc_html__('Large', 'werkstatt'),
            'value'       => '8'
          )
        ),
        'std'         => '6',
        'section'     => 'shop'
      ),
      array(
        'id'          => 'header_tab1',
        'label'       => esc_html__('Menu Settings', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Style', 'werkstatt'),
        'id'          => 'header_style',
        'type'        => 'radio',
        'desc'        => esc_html__('Which header style would you like to use?', 'werkstatt'),
        'choices'     => array(
      		array(
      			'label'       => esc_html__('Style 1 (Left Logo)', 'werkstatt'),
      			'value'       => 'style1'
      		),
      		array(
      			'label'       => esc_html__('Style 2 (Center Logo)', 'werkstatt'),
      			'value'       => 'style2'
      		),
      		array(
      			'label'       => esc_html__('Style 3 (Lateral)', 'werkstatt'),
      			'value'       => 'style3'
      		),
      		array(
      			'label'       => esc_html__('Style 4 (Left Logo - Center Full Menu)', 'werkstatt'),
      			'value'       => 'style4'
      		)
        ),
        'std'         => 'style1',
        'section'	  => 'header'
      ),
      array(
        'label'       => esc_html__('Lateral header Color', 'werkstatt'),
        'id'          => 'header_lateral_color',
        'type'        => 'radio',
        'desc'        => esc_html__('Color of the lateral header', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light', 'werkstatt'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Dark', 'werkstatt'),
            'value'       => 'dark'
          )
        ),
        'std'         => 'light',
        'section'     => 'header',
        'condition'   => 'header_style:is(style3)'
      ),
      array(
        'label'       => esc_html__('Menu Style', 'werkstatt'),
        'id'          => 'menu_style',
        'type'        => 'radio',
        'desc'        => esc_html__('Which menu style would you like to use?', 'werkstatt'),
        'choices'     => array(
      		array(
      			'label'       => esc_html__('Style 1 (Mobile Menu)', 'werkstatt'),
      			'value'       => 'menu_style1'
      		),
      		array(
      			'label'       => esc_html__('Style 2 (Full Menu)', 'werkstatt'),
      			'value'       => 'menu_style2'
      		)
        ),
        'std'         => 'menu_style1',
        'section'	  => 'header'
      ),
      array(
        'label'       => esc_html__('Scroll Spy', 'werkstatt'),
        'id'          => 'thb_ss',
        'type'        => 'on_off',
        'desc'        => esc_html__('This will add underlines to full menu links if you hover over their section. Works on pages.', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'header',
        'operator' 		=> 'or',
        'condition'   => 'menu_style:is(menu_style2),header_style:is(style4)'
      ),
      array(
        'label'       => esc_html__('Full Menu Social Links', 'werkstatt' ),
        'id'          => 'fullmenu_social_link',
        'type'        => 'social-links',
        'desc'        => esc_html__('Add your desired Social Links next to the full menu here', 'werkstatt' ),
        'section'     => 'header',
        'operator' 		=> 'or',
        'condition'   => 'menu_style:is(menu_style2),header_style:is(style4)'
      ),
      array(
        'label'       => esc_html__('Header Fill', 'werkstatt'),
        'id'          => 'thb_header_fill',
        'type'        => 'on_off',
        'desc'        => esc_html__('By default, the header background only works on hover or scroll. By enabling this, the header always displays a background. You can disable this on individual pages.', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Grid', 'werkstatt'),
        'id'          => 'thb_header_grid',
        'type'        => 'on_off',
        'desc'        => esc_html__('By default, the header on WerkStatt is full width, you can restrict it to the grid by enabling this option. You can adjust your grid size from Customizaiton > Measurements.', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Language Switcher', 'werkstatt'),
        'id'          => 'thb_ls',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can toggle the language switcher here. Requires that you have WPML or PolyLang installed.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Search', 'werkstatt'),
        'id'          => 'header_search',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can toggle the search icon here.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Cart', 'werkstatt'),
        'id'          => 'header_cart',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can toggle the cart icon here.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Button', 'werkstatt'),
        'id'          => 'header_button',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can add a Call to Action button to your header.', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Button Text', 'werkstatt' ),
        'id'          => 'header_button_text',
        'type'        => 'text',
        'desc'        => esc_html__('Call-to-Action Button Text', 'werkstatt' ),
        'section'     => 'header',
        'std' 				=> esc_html__('Get the App', 'werkstatt'),
        'condition'   => 'header_button:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Link', 'werkstatt' ),
        'id'          => 'header_action_button_link',
        'type'        => 'text',
        'desc'        => esc_html__('Call-to-Action Button link', 'werkstatt' ),
        'section'     => 'header',
        'std' 				=> esc_html__('https://themeforest.net/item/werkstatt-creative-portfolio-theme/17870799?ref=fuelthemes', 'werkstatt'),
        'condition'   => 'header_button:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Style', 'werkstatt' ),
        'id'          => 'header_button_style',
        'type'        => 'radio',
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('Default', 'werkstatt'),
        	  'value'       => ''
        	),
          array(
            'label'       => esc_html__('Border Button with Solid Fill', 'werkstatt'),
            'value'       => 'thb-border-style'
          ),
          array(
            'label'       => esc_html__('Text with Border Fill', 'werkstatt'),
            'value'       => 'thb-text-style'
          ),
          array(
            'label'       => esc_html__('3d Effect', 'werkstatt'),
            'value'       => 'thb-3d-style'
          ),
          array(
            'label'       => esc_html__('Fill Effect', 'werkstatt'),
            'value'       => 'thb-fill-style'
          ),
          array(
            'label'       => esc_html__('Pill Style', 'werkstatt'),
            'value'       => 'thb-pill-style'
          )
        ),
        'std'         => '',
        'desc'        => esc_html__('Call-to-Action Button Style', 'werkstatt' ),
        'section'     => 'header',
        'condition'   => 'header_button:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Color', 'werkstatt' ),
        'id'          => 'header_button_color',
        'type'        => 'radio',
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('Black', 'werkstatt'),
        	  'value'       => ''
        	),
          array(
            'label'       => esc_html__('White', 'werkstatt'),
            'value'       => 'white'
          ),
          array(
            'label'       => esc_html__('Accent', 'werkstatt'),
            'value'       => 'accent'
          )
        ),
        'std'         => 'white',
        'desc'        => esc_html__('Call-to-Action Button Color', 'werkstatt' ),
        'section'     => 'header',
        'condition'   => 'header_button:is(on)'
      ),
      array(
        'id'          => 'header_tab2',
        'label'       => esc_html__('Mobile Menu Settings', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu "MENU" label', 'werkstatt'),
        'id'          => 'mobile_menu_text',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display "Menu" Text next to mobile menu icon?', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Animation Speed','werkstatt'),
        'id'          => 'mobile_menu_speed',
        'type'        => 'numeric-slider',
        'desc'       => esc_html__('This is the speed of the mobile menu appearing in seconds. A larger value means a slower animation. For example.','werkstatt'),
       	'min_max_step'=> '0.1,5.00,0.1',
        'std'         => '0.5',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Text Animation', 'werkstatt'),
        'id'          => 'mobile_menu_text_animation',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your mobile menu text animation here', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('No Animation', 'werkstatt'),
            'value'       => 'none'
          ),
          array(
            'label'       => esc_html__('Reveal from Bottom', 'werkstatt'),
            'value'       => 'style1'
          )
        ),
        'std'         => 'style1',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Style', 'werkstatt'),
        'id'          => 'mobile_menu_style',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your mobile menu style here', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Style 1 (Half-page)', 'werkstatt'),
            'value'       => 'style1'
          ),
          array(
            'label'       => esc_html__('Style 2 (Full Screen)', 'werkstatt'),
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Submenu Behaviour', 'werkstatt'),
        'id'          => 'submenu_behaviour',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose how your arrows signs work', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Default - Clickable parent links', 'werkstatt'),
            'value'       => 'thb-default'
          ),
          array(
            'label'       => esc_html__('Open Submenu - Parent links open submenus', 'werkstatt'),
            'value'       => 'thb-submenu'
          )
        ),
        'std'         => 'thb-default',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Secondary Menu Style', 'werkstatt'),
        'id'          => 'secondary_menu_style',
        'type'        => 'radio',
        'desc'        => esc_html__('This will change the secondary menu that is under the main menu. You can choose to have 1 or 2 columns.', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('2 columns', 'werkstatt'),
            'value'       => '2'
          ),
          array(
            'label'       => esc_html__('1 column', 'werkstatt'),
            'value'       => '1'
          )
        ),
        'std'         => '2',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Color', 'werkstatt'),
        'id'          => 'mobile_menu_color',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your mobile menu color here.', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light', 'werkstatt'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Dark', 'werkstatt'),
            'value'       => 'dark'
          )
        ),
        'std'         => 'dark',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Link Animation', 'werkstatt'),
        'id'          => 'mobile_menu_link_animation',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your mobile menu link animation here. If Background Fill is selected, the mobile menu background will change according to image defined for each menu item in Appearance > Menus.', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Link Fill', 'werkstatt'),
            'value'       => 'link-fill'
          ),
          array(
            'label'       => esc_html__('Background Fill', 'werkstatt'),
            'value'       => 'bg-fill'
          )
        ),
        'std'         => 'link-fill',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Link Fill Color', 'werkstatt'),
        'id'          => 'mobile_menu_link_fill',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('Hover color for the Link Fill setting', 'werkstatt'),
        'section'     => 'header',
        'condition'   => 'mobile_menu_link_animation:is(link-fill)'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Footer', 'werkstatt'),
        'id'          => 'menu_footer',
        'type'        => 'textarea',
        'desc'        => esc_html__('This content appears at the bottom of the menu. You can use your shortcodes here.', 'werkstatt'),
        'rows'        => '4',
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab3',
        'label'       => esc_html__('Logo Settings', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Logo Height', 'werkstatt'),
        'id'          => 'logo_height',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify the logo height from here. This is maximum height, so your logo may get smaller depending on spacing inside header', 'werkstatt'),
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Logo Height Mobile', 'werkstatt'),
        'id'          => 'logo_height_mobile',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify the logo height for mobile screens here.', 'werkstatt'),
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Dark Logo Upload (black)', 'werkstatt'),
        'id'          => 'logo',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double the size you set above.</strong>', 'werkstatt'),
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Light Logo Upload (white)', 'werkstatt'),
        'id'          => 'logo_light',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double the size you set above.</strong>', 'werkstatt'),
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab4',
        'label'       => esc_html__('Measurements', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Icon Size', 'werkstatt'),
        'id'          => 'mobile_menu_icon_size',
        'type'        => 'numeric-slider',
        'desc'        => esc_html__('This changes the size of the mobile menu icon', 'werkstatt'),
       	'min_max_step'=> '1,10,1',
        'std'         => '1',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Padding', 'werkstatt'),
        'id'          => 'header_padding',
        'type'        => 'spacing',
        'desc'        => esc_html__('This affects header on large screens. The values are in px.', 'werkstatt'),
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Half Page Mobile Menu Width', 'werkstatt'),
        'id'          => 'mobile_menu_width',
        'type'        => 'numeric-slider',
        'desc'        => esc_html__('This changes the width of the mobile menu on desktop screens', 'werkstatt'),
       	'min_max_step'=> '30,100,5',
        'std'         => '50',
        'section'     => 'header'
      ),
      array(
        'id'          => 'footer_tab0',
        'label'       => esc_html__('Footer Settings', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Display Footer', 'werkstatt'),
        'id'          => 'footer',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the Footer?', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Effect', 'werkstatt'),
        'id'          => 'footer_effect',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to use the fold effect? This also affects the sub-footer', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Grid', 'werkstatt'),
        'id'          => 'footer_max_width',
        'type'        => 'on_off',
        'desc'        => esc_html__('By default, the footer on WerkStatt is full width, you can restrict it to the grid by enabling this option. You can adjust your grid size from Customizaiton > Measurements.', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'footer',
        'condition'   => 'footer:is(on)'
      ),
      array(
        'label'       => esc_html__('Footer Columns', 'werkstatt'),
        'id'          => 'footer_columns',
        'type'        => 'radio-image',
        'desc'        => esc_html__('You can change the layout of footer columns here', 'werkstatt'),
        'std'         => 'threecolumns',
        'section'     => 'footer',
        'condition'   => 'footer:is(on)'
      ),
      array(
        'label'       => esc_html__('Footer Color', 'werkstatt'),
        'id'          => 'footer_color',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your footer color here. You can also change your footer background from "Customization"', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light', 'werkstatt'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Dark', 'werkstatt'),
            'value'       => 'dark'
          )
        ),
        'std'         => 'light',
        'section'     => 'footer',
        'condition'   => 'footer:is(on)'
      ),
      array(
        'label'       => esc_html__('Footer Shadow', 'werkstatt'),
        'id'          => 'footer_shadow',
        'type'        => 'radio',
        'desc'        => esc_html__('You can change the footer shadow here', 'werkstatt'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('None', 'werkstatt'),
        	  'value'       => 'none'
        	),
          array(
            'label'       => esc_html__('Light', 'werkstatt'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Heavy', 'werkstatt'),
            'value'       => 'heavy'
          )
        ),
        'std'         => 'heavy',
        'section'     => 'footer',
        'condition'   => 'footer:is(on)'
      ),
      array(
        'id'          => 'footer_tab1',
        'label'       => esc_html__('Call-to-Action', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Display Call-to-Action', 'werkstatt'),
        'id'          => 'call_to_action',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the Call-to-Action? <small>You can customize the colors on "Customization"</small>', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Change Direction? ', 'werkstatt'),
        'id'          => 'call_to_action_rtl',
        'type'        => 'on_off',
        'desc'        => esc_html__('This will place the button on the left and the text on the right.', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Text', 'werkstatt' ),
        'id'          => 'call_to_action_text',
        'type'        => 'textarea',
        'desc'        => esc_html__('Content to be displayed on the Call-to-Action', 'werkstatt' ),
        'section'     => 'footer',
        'std' 				=> sprintf(esc_html__('
        	%1$sReady to take your WordPress site to the next level?%2$s', 'werkstatt'),
        	'<h3 style="color:#fff">',
        	'</h3>'
        ),
        'condition'   => 'call_to_action:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Style', 'werkstatt' ),
        'id'          => 'call_to_action_button_style',
        'type'        => 'radio',
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('Default', 'werkstatt'),
        	  'value'       => ''
        	),
          array(
            'label'       => esc_html__('Border Button with Solid Fill', 'werkstatt'),
            'value'       => 'thb-border-style'
          ),
          array(
            'label'       => esc_html__('Text with Border Fill', 'werkstatt'),
            'value'       => 'thb-text-style'
          ),
          array(
            'label'       => esc_html__('3d Effect', 'werkstatt'),
            'value'       => 'thb-3d-style'
          ),
          array(
            'label'       => esc_html__('Fill Effect', 'werkstatt'),
            'value'       => 'thb-fill-style'
          ),
          array(
            'label'       => esc_html__('Pill Style', 'werkstatt'),
            'value'       => 'thb-pill-style'
          )
        ),
        'std'         => '',
        'desc'        => esc_html__('Call-to-Action Button Style', 'werkstatt' ),
        'section'     => 'footer',
        'condition'   => 'call_to_action:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Color', 'werkstatt' ),
        'id'          => 'call_to_action_button_color',
        'type'        => 'radio',
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('Black', 'werkstatt'),
        	  'value'       => ''
        	),
          array(
            'label'       => esc_html__('White', 'werkstatt'),
            'value'       => 'white'
          ),
          array(
            'label'       => esc_html__('Accent', 'werkstatt'),
            'value'       => 'accent'
          )
        ),
        'std'         => 'white',
        'desc'        => esc_html__('Call-to-Action Button Color', 'werkstatt' ),
        'section'     => 'footer',
        'condition'   => 'call_to_action:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Text', 'werkstatt' ),
        'id'          => 'call_to_action_button_text',
        'type'        => 'text',
        'desc'        => esc_html__('Call-to-Action Button Text', 'werkstatt' ),
        'section'     => 'footer',
        'std' 				=> esc_html__('Purchase Now', 'werkstatt'),
        'condition'   => 'call_to_action:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Link', 'werkstatt' ),
        'id'          => 'call_to_action_button_link',
        'type'        => 'text',
        'desc'        => esc_html__('Call-to-Action Button link', 'werkstatt' ),
        'section'     => 'footer',
        'std' 				=> esc_html__('https://themeforest.net/item/werkstatt-creative-portfolio-theme/17870799?ref=fuelthemes', 'werkstatt'),
        'condition'   => 'call_to_action:is(on)'
      ),
      array(
        'id'          => 'footer_tab2',
        'label'       => esc_html__('Sub-Footer Settings', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Display Sub-Footer', 'werkstatt'),
        'id'          => 'subfooter',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the Sub-Footer?', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Style', 'werkstatt'),
        'id'          => 'subfooter_style',
        'type'        => 'radio-image',
        'desc'        => esc_html__('Which subfooter style would you like to use?', 'werkstatt'),
        'std'         => 'style1',
        'section'	  	=> 'footer',
        'condition'   => 'subfooter:is(on)'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Max-Width', 'werkstatt'),
        'id'          => 'subfooter_max_width',
        'type'        => 'on_off',
        'desc'        => esc_html__('Disabling this will make the sub-footer full-width on large screens', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'footer',
        'condition'   => 'subfooter:is(on)'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Color', 'werkstatt'),
        'id'          => 'subfooter_color',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your sub-footer color here. You can also change your sub-footer background from "Customization"', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light', 'werkstatt'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Dark', 'werkstatt'),
            'value'       => 'dark'
          )
        ),
        'std'         => 'light',
        'section'     => 'footer',
        'condition'   => 'subfooter:is(on)'
      ),
      array(
        'label'       => esc_html__('Subfooter Text', 'werkstatt' ),
        'id'          => 'subfooter_text',
        'type'        => 'textarea',
        'desc'        => esc_html__('Content to be displayed on the subfooter', 'werkstatt' ),
        'section'     => 'footer',
        'std' 				=> esc_html__('&copy; 2016 Werkstatt', 'werkstatt'),
        'condition'   => 'subfooter:is(on)'
      ),
      array(
        'label'       => esc_html__('Social Links', 'werkstatt' ),
        'id'          => 'subfooter_social_link',
        'type'        => 'social-links',
        'desc'        => esc_html__('Add your desired Social Links for the subfooter here', 'werkstatt' ),
        'section'     => 'footer',
        'condition'   => 'subfooter:is(on)'
      ),
      array(
        'id'          => 'misc_tab0',
        'label'       => esc_html__('General', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Google Maps API Key', 'werkstatt'),
        'id'          => 'map_api_key',
        'type'        => 'text',
        'desc'        => esc_html__('Please enter the Google Maps Api Key. <small>You need to create a browser API key. For more information, please visit: <a href="https://developers.google.com/maps/documentation/javascript/get-api-key">https://developers.google.com/maps/documentation/javascript/get-api-key</a></small>', 'werkstatt'),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Scroll To Top?', 'werkstatt'),
        'id'          => 'scroll_to_top',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can enable the Scroll To Top button here', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Extra CSS', 'werkstatt'),
        'id'          => 'extra_css',
        'type'        => 'css',
        'desc'        => esc_html__('Any CSS that you would like to add to the theme.', 'werkstatt'),
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab1',
        'label'       => esc_html__('Instagram Settings', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Instagram ID', 'werkstatt' ),
        'id'          => 'instagram_id',
        'type'        => 'text',
        'desc'        => sprintf(esc_html__('Your Instagram ID, you can find your ID from here: %1$shttp://www.otzberg.net/iguserid/%2$s', 'werkstatt' ),
        	'<a href="http://www.otzberg.net/iguserid/">',
        	'</a>'
        	),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Instagram Username', 'werkstatt' ),
        'id'          => 'instagram_username',
        'type'        => 'text',
        'desc'        => esc_html__('Your Instagram Username', 'werkstatt' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Access Token', 'werkstatt' ),
        'id'          => 'instagram_accesstoken',
        'type'        => 'text',
        'desc'        => sprintf(esc_html__('Visit %1$sthis link%2$s in a new tab, sign in with your Instagram account, click on Create a new application and create your own keys in case you dont have already. After that, you can get your Access Token using %3$shttp://instagram.pixelunion.net/%4$s', 'werkstatt' ),
        	'<a href="http://instagr.am/developer/register/" target="_blank">',
        	'</a>',
        	'<a href="http://instagram.pixelunion.net/" target="_blank">',
        	'</a>'
        	),
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab2',
        'label'       => esc_html__('Twitter Settings', 'werkstatt' ),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'twitter_text',
        'label'       => esc_html__('About the Twitter Settings', 'werkstatt' ),
        'desc'        => esc_html__('You should fill out these settings if you want to use the Twitter related widgets or Visual Composer Elements', 'werkstatt' ),
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Twitter Sharing Cache', 'werkstatt'),
        'id'          => 'twitter_cache',
        'type'        => 'select',
        'desc'        => esc_html__('Amount of time before the new tweets are fetched.', 'werkstatt'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('1 Hour', 'werkstatt'),
        	  'value'       => '1h'
        	),
          array(
            'label'       => esc_html__('1 Day', 'werkstatt'),
            'value'       => '1'
          ),
          array(
            'label'       => esc_html__('7 Days', 'werkstatt'),
            'value'       => '7'
          ),
          array(
            'label'       => esc_html__('30 Days', 'werkstatt'),
            'value'       => '30'
          )
        ),
        'std'         => '1',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Twitter Username', 'werkstatt' ),
        'id'          => 'twitter_bar_username',
        'type'        => 'text',
        'desc'        => esc_html__('Username to pull tweets for', 'werkstatt' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Consumer Key', 'werkstatt' ),
        'id'          => 'twitter_bar_consumerkey',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps" target="_blank">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'werkstatt' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Consumer Secret', 'werkstatt' ),
        'id'          => 'twitter_bar_consumersecret',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps" target="_blank">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'werkstatt' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Access Token', 'werkstatt' ),
        'id'          => 'twitter_bar_accesstoken',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps" target="_blank">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'werkstatt' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Access Token Secret', 'werkstatt' ),
        'id'          => 'twitter_bar_accesstokensecret',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps" target="_blank">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'werkstatt' ),
        'section'     => 'misc'
      ),
      array(
        'id'          => 'typography_tab1',
        'label'       => esc_html__('Typography', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Google Font Subsets', 'werkstatt'),
        'id'          => 'font_subsets',
        'type'        => 'radio',
        'desc'        => esc_html__('You can add additional character subset specific to your language.', 'werkstatt'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('No Subset', 'werkstatt'),
        	  'value'       => 'no-subset'
        	),
        	array(
        	  'label'       => esc_html__('Latin Extended', 'werkstatt'),
        	  'value'       => 'latin-ext'
        	),
          array(
            'label'       => esc_html__('Greek', 'werkstatt'),
            'value'       => 'greek'
          ),
          array(
            'label'       => esc_html__('Cyrillic', 'werkstatt'),
            'value'       => 'cyrillic'
          ),
          array(
            'label'       => esc_html__('Vietnamese', 'werkstatt'),
            'value'       => 'vietnamese'
          )
        ),
        'std'         => 'no-subset',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Primary Font', 'werkstatt'),
        'id'          => 'primary_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the primary font. Affects all headings.', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Secondary Font', 'werkstatt'),
        'id'          => 'secondary_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the secondary font', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('<EM> Font', 'werkstatt'),
        'id'          => 'em_type',
        'type'        => 'typography',
        'desc'        => esc_html__('This adds a separate font for styling of EM tags so you can add stylish typographic elements.', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Button Font', 'werkstatt'),
        'id'          => 'button_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the button. Uses the Secondary Font by default', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Menu Font', 'werkstatt'),
        'id'          => 'menu_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the menu. This also overrides the header font. Uses the Secondary Font by default', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Body Typography', 'werkstatt'),
        'id'          => 'body_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the body.', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Typography', 'werkstatt'),
        'id'          => 'mobilemenu_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the mobile menu.', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Full Menu Typography', 'werkstatt'),
        'id'          => 'fullmenu_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the full menu style', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Footer Widget Title Typography', 'werkstatt'),
        'id'          => 'footer_widget_title_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the footer widget titles', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typography_tab2',
        'label'       => esc_html__('Heading Typography', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'id'          => 'heading_text',
        'label'       => esc_html__('About Heading Typography', 'werkstatt'),
        'desc'        => esc_html__('These affect all h* tags inside the theme, so use wisely. Some particular headings may need additional css to target.', 'werkstatt'),
        'type'        => 'textblock',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 1', 'werkstatt'),
        'id'          => 'h1_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H1 tag', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 2', 'werkstatt'),
        'id'          => 'h2_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H2 tag', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 3', 'werkstatt'),
        'id'          => 'h3_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H3 tag', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 4', 'werkstatt'),
        'id'          => 'h4_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H4 tag', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 5', 'werkstatt'),
        'id'          => 'h5_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H5 tag', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 6', 'werkstatt'),
        'id'          => 'h6_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H6 tag', 'werkstatt'),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typography_tab3',
        'label'       => esc_html__('Typekit Support', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typekit_text',
        'label'       => esc_html__('About Typekit Support', 'werkstatt'),
        'desc'        => esc_html__('Please make sure that you enter your Typekit ID or the fonts wont work. After adding Typekit Font Names, these names will appear on the font selection dropdown on the Typography tab.', 'werkstatt'),
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Typekit Kit ID', 'werkstatt'),
        'id'          => 'typekit_id',
        'type'        => 'text',
        'desc'        => esc_html__('Paste the provided Typekit Kit ID. <small>Usually 6-7 random letters</small>', 'werkstatt'),
        'section'     => 'typography',
      ),
      array(
        'label'       => esc_html__('Typekit Font Names', 'werkstatt'),
        'id'          => 'typekit_fonts',
        'type'        => 'text',
        'desc'        => esc_html__('Enter your Typekit Font Name, seperated by comma. For example: futura-pt,aktiv-grotesk <strong>Do not leave spaces between commas</strong>', 'werkstatt'),
        'section'     => 'typography',
      ),
      array(
        'id'          => 'typography_tab4',
        'label'       => esc_html__('Self Hosted Font Support', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Self Hosted Fonts', 'werkstatt'),
        'id'          => 'self_hosted_fonts',
        'type'        => 'list-item',
        'settings'    => array(
        	array(
        	  'label'       => esc_html__('Font Stylesheet URL', 'werkstatt'),
        	  'id'          => 'font_url',
        	  'type'        => 'text',
        	  'desc'        => esc_html__('URL of the font stylesheet (.css file) you want to use.', 'werkstatt'),
        	  'section'     => 'typography',
        	),
        	array(
        	  'label'       => esc_html__('Font Family Names', 'werkstatt'),
        	  'id'          => 'font_name',
        	  'type'        => 'text',
        	  'desc'        => esc_html__('Enter your Font Family Name, use the name that will be used in css. For example: futura-pt, aktiv-grotesk. After saving, you will be able to use this name in the typography settings.', 'werkstatt'),
        	  'section'     => 'typography',
        	),
        ),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'customization_tab1',
        'label'       => esc_html__('Backgrounds', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Header Background', 'werkstatt'),
        'id'          => 'header_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the header.', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Footer Background', 'werkstatt'),
        'id'          => 'footer_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the footer', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Sub - Footer Background', 'werkstatt'),
        'id'          => 'subfooter_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the subfooter', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Background', 'werkstatt'),
        'id'          => 'mobilemenu_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the Mobile Menu', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Call-to-Action Background', 'werkstatt'),
        'id'          => 'call_to_action_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the Call-to-Action inside Footer', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('404 Page Background', 'werkstatt'),
        'id'          => 'notfound_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the 404 Page', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab2',
        'label'       => esc_html__('Colors', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Accent Color', 'werkstatt'),
        'id'          => 'accent_color',
        'type'        => 'colorpicker',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('You can modify the accent color here, default red you see in some areas.', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Icon Color', 'werkstatt'),
        'id'          => 'mobile_menu_icon_color',
        'type'        => 'colorpicker',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('You can modify the hamburger menu icon color here.', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Footer Widget Title Color', 'werkstatt'),
        'id'          => 'footer_widget_title_color',
        'type'        => 'colorpicker',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('You can modify the footer widget title color here', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Footer Text Color', 'werkstatt'),
        'id'          => 'footer_text_color',
        'type'        => 'colorpicker',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('You can modify the footer text color here', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab3',
        'label'       => esc_html__('Link Colors', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('General Link Color', 'werkstatt'),
        'id'          => 'general_link_color',
        'type'        => 'link_color',
        'desc'        => esc_html__('You can modify the general link color here', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Full Menu Link Color', 'werkstatt'),
        'id'          => 'fullmenu_link_color_dark',
        'type'        => 'link_color',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('You can modify the link color of the full menu.', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Footer Link Color', 'werkstatt'),
        'id'          => 'footer_link_color',
        'type'        => 'link_color',
        'desc'        => esc_html__('You can modify the footer link color here', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab4',
        'label'       => esc_html__('Measurements', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Site Grid Size', 'werkstatt' ),
        'id'          => 'thb_grid_size',
        'type'        => 'text',
        'desc'        => esc_html__('If you would like to make your site width smaller, you can enter your value in pixels here. WerkStatt, by defauly, has a large width: 1800px. Rows also have 35px padding + 15px margin on each side. ', 'werkstatt' ),
        'section'     => 'customization',
      ),
      array(
        'label'       => esc_html__('Footer Padding', 'werkstatt'),
        'id'          => 'footer_padding',
        'type'        => 'spacing',
        'desc'        => esc_html__('You can modify the footer padding here', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Padding', 'werkstatt'),
        'id'          => 'subfooter_padding',
        'type'        => 'spacing',
        'desc'        => esc_html__('You can modify the subfooter padding here', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab5',
        'label'       => esc_html__('Page Transition', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Page Transition', 'werkstatt'),
        'id'          => 'page_transition',
        'type'        => 'on_off',
        'desc'        => esc_html__('This will enable an animation between loading your pages.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Page Transition Style', 'werkstatt'),
        'id'          => 'page_transition_style',
        'type'        => 'select',
        'desc'        => esc_html__('Select the effect you want to use for page transition', 'werkstatt'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('Fade', 'werkstatt'),
        	  'value'       => 'thb-fade'
        	),
          array(
            'label'       => esc_html__('Fade Up', 'werkstatt'),
            'value'       => 'thb-fade-up'
          ),
          array(
            'label'       => esc_html__('Fade Down', 'werkstatt'),
            'value'       => 'thb-fade-down'
          )
        ),
        'std'         => 'thb-fade',
        'section'     => 'customization'
      ),
      array(
      	'label'       => esc_html__('Fade In Speed', 'werkstatt' ),
        'id'          => 'page_transition_in_speed',
        'std'         => '1000',
        'type'        => 'numeric-slider',
        'section'     => 'customization',
        'min_max_step'=> '100,3000,50',
        'desc'        => esc_html__('The speed of the animation in milisecconds.', 'werkstatt'),
      ),
      array(
      	'label'       => esc_html__('Fade Out Speed', 'werkstatt' ),
        'id'          => 'page_transition_out_speed',
        'std'         => '500',
        'type'        => 'numeric-slider',
        'section'     => 'customization',
        'min_max_step'=> '100,3000,50',
        'desc'        => esc_html__('The speed of the animation in milisecconds.', 'werkstatt'),
      ),
      array(
        'id'          => 'customization_tab5',
        'label'       => esc_html__('Preloaders / Lazy Load', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Preloader', 'werkstatt' ),
        'id'          => 'thb_preloader',
        'type'        => 'radio',
        'desc'        => esc_html__('This is the hexagon preloader you see on some areas.', 'werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Hexagon', 'werkstatt'),
            'value'       => 'hexagon'
          ),
          array(
            'label'       => esc_html__('Circle', 'werkstatt'),
            'value'       => 'circle'
          ),
          array(
            'label'       => esc_html__('No Preloader', 'werkstatt'),
            'value'       => 'no'
          )
        ),
        'std'         => 'hexagon',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Lazy Load Images', 'werkstatt'),
        'id'          => 'lazy_load',
        'type'        => 'on_off',
        'desc'        => esc_html__('Enable lazy loading of images.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab6',
        'label'       => esc_html__('Other', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Lightbox Color Theme','werkstatt'),
        'id'          => 'lightbox_theme',
        'type'        => 'radio',
        'desc'       => esc_html__('You can change the lightbox color theme here','werkstatt'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light','werkstatt'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Dark','werkstatt'),
            'value'       => 'dark'
          )
        ),
        'std'         => 'dark',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Right Click Protection','werkstatt'),
        'id'          => 'right_click',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can disable right click here.','werkstatt'),
        'section'     => 'customization',
        'std'         => 'on'
      ),
      array(
        'label'       => esc_html__('Right Click Text Content','werkstatt'),
        'id'          => 'right_click_content',
        'type'        => 'textarea',
        'desc'        => esc_html__('This content appears inside the right click protection overlay.','werkstatt'),
        'rows'        => '4',
        'section'     => 'customization',
        'cond'				=> 'right_click:is(on)'
      ),
      array(
        'label'       => esc_html__('Use Custom Scrollbar?', 'werkstatt'),
        'id'          => 'custom_scrollbar',
        'type'        => 'on_off',
        'desc'        => esc_html__('This only works for Webkit (Chrome, Safari).', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Google Theme Color', 'werkstatt'),
        'id'          => 'thb_google_theme_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('Applied only on Android mobile devices, click <a href="https://developers.google.com/web/updates/2014/11/Support-for-theme-color-in-Chrome-39-for-Android" target="_blank">here</a> to learn more about this', 'werkstatt'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Site Border', 'werkstatt'),
        'id'          => 'site_borders',
        'type'        => 'on_off',
        'desc'        => esc_html__('This will add borders around the viewport.', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Border Width', 'werkstatt'),
        'id'          => 'site_borders_width',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify border width here', 'werkstatt'),
        'section'     => 'customization',
        'condition'   => 'site_borders:is(on)'
      ),
      array(
        'label'       => esc_html__('Border Color', 'werkstatt'),
        'id'          => 'site_borders_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('You can modify the border color here', 'werkstatt'),
        'section'     => 'customization',
        'condition'   => 'site_borders:is(on)'
      ),
      array(
        'id'          => 'sounds_tab0',
        'label'       => esc_html__('Website Music', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'sounds'
      ),
      array(
        'label'       => esc_html__('Enable Background Music?', 'werkstatt'),
        'id'          => 'music_sound',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can enable the Background Music Here', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'sounds'
      ),
      array(
        'label'       => esc_html__('Restrict Background Music to Homepage', 'werkstatt'),
        'id'          => 'music_sound_toggle_home',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can restrict background music to homepage if desired.', 'werkstatt'),
        'std'         => 'on',
        'section'     => 'sounds',
        'condition'   => 'music_sound:is(on)'
      ),
      array(
        'label'       => esc_html__('Display Background Music Toggle?', 'werkstatt'),
        'id'          => 'music_sound_toggle',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can enable the Background Music Here', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'sounds',
        'condition'   => 'music_sound:is(on)'
      ),
      array(
        'label'       => esc_html__('Background Music Upload', 'werkstatt'),
        'id'          => 'music_sound_file',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own MP3 file here.', 'werkstatt'),
        'section'     => 'sounds',
        'condition'   => 'music_sound:is(on)'
      ),
      array(
        'id'          => 'sounds_tab1',
        'label'       => esc_html__('General Sounds', 'werkstatt'),
        'type'        => 'tab',
        'section'     => 'sounds'
      ),
      array(
        'label'       => esc_html__('Click Sound', 'werkstatt'),
        'id'          => 'click_sound',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can enable the Click Sound here', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'sounds'
      ),
      array(
        'label'       => esc_html__('Click Sound Upload', 'werkstatt'),
        'id'          => 'click_sound_file',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own MP3 file here.', 'werkstatt'),
        'section'     => 'sounds',
        'condition'   => 'click_sound:is(on)'
      ),
      array(
        'label'       => esc_html__('Menu Item Hover Sound', 'werkstatt'),
        'id'          => 'menu_item_hover_sound',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can enable the Menu Item Hover Sound here', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'sounds'
      ),
      array(
        'label'       => esc_html__('Menu Item Hover Sound Upload', 'werkstatt'),
        'id'          => 'menu_item_hover_sound_file',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own MP3 file here.', 'werkstatt'),
        'section'     => 'sounds',
        'condition'   => 'menu_item_hover_sound:is(on)'
      ),
      array(
        'label'       => esc_html__('Menu Open Sound', 'werkstatt'),
        'id'          => 'menu_open_sound',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can enable the Menu Open Sound here', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'sounds'
      ),
      array(
        'label'       => esc_html__('Menu Open Sound Upload', 'werkstatt'),
        'id'          => 'menu_open_sound_file',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own MP3 file here.', 'werkstatt'),
        'section'     => 'sounds',
        'condition'   => 'menu_open_sound:is(on)'
      ),
      array(
        'label'       => esc_html__('Menu Close Sound', 'werkstatt'),
        'id'          => 'menu_close_sound',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can enable the Menu Close Sound here', 'werkstatt'),
        'std'         => 'off',
        'section'     => 'sounds'
      ),
      array(
        'label'       => esc_html__('Menu Close Sound Upload', 'werkstatt'),
        'id'          => 'menu_close_sound_file',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own MP3 file here.', 'werkstatt'),
        'section'     => 'sounds',
        'condition'   => 'menu_close_sound:is(on)'
      )
    )
  );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
}