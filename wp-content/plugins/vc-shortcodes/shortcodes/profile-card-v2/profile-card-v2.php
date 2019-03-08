<?php

require_once('google-fonts.php');

vc_map( 

array(
    "name" => __( "Profile Card v2", "pcvc" ),
    "base" => "pcvc_profile_card",
    "class" => "",
    "icon"        => "asvc_profile_card_two_icon",
    "category" => __( "VC Addons", "pcvc"),
    "description" => __( "", "pcvc"),
    "params" => array(
    
    array(
        "type"              => "dropdown",
        "heading"           => __( "Select Style", "pcvc" ),
        "param_name"        => "style",
        "value"             => array(
            __( 'Style 1', "pcvc" )        => "style1",
            __( 'Style 2', "pcvc" )        => "style2",
            __( 'Style 3', "pcvc" )        => "style3",
            __( 'Style 4', "pcvc" )        => "style4",
            __( 'Style 5', "pcvc" )        => "style5",
            __( 'Style 6', "pcvc" )        => "style6",
            //__( 'Style 7', "pcvc" )        => "style7",
            __( 'Style 8', "pcvc" )        => "style8",
            __( 'Style 9', "pcvc" )        => "style9",
            __( 'Style 10', "pcvc" )        => "style10",


        ),
        "admin_label"        => true,
    ),                      
    
    array(
        "type" => "attach_image",
        "heading" => __("Profile Image", "pcvc"),
        "param_name" => "image",
        "value" => "",
        "description" => __("select image for your profile", "pcvc")
    ),            
    array(
        "type" => "textfield",
        "heading" => __("Profile Name", "pcvc"),
        "param_name" => "name",
        "value" => "John Doe",
    ),
    array(
        "type" => "textfield",
        "heading" => __("Profile Address", "pcvc"),
        "param_name" => "profile_address",
        "value" => "@johndoewp",
    ),    
    array(
        "type"          => "textarea_html",
        "heading"       => __("Description", "pcvc"),
        "param_name"    => "content",
        "value"         => "<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style3','style4','style5','style9','style10') ),
    ), 
    array(
        "type" => "attach_image",
        "heading" => __("Background Image", "pcvc"),
        "param_name" => "bg_image",
        "value" => "",
        "description" => __("select image for background", "pcvc"),
        "dependency"    => array( 'element' => "style", 'value' => array('style1','style7') ),
    ),   
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Background Color", "pcvc" ),
        "param_name"        => "style5_bg_color",
        "value"             => '#4fb96e',
        "dependency"    => array( 'element' => "style", 'value' => array('style5') ),
    ),    
    
       
    
    array(
        "type"       => "textfield",
        "heading"    => __("Facebook URL", "pcvc"),
        "param_name" => "facebook",
        "value"      => "",
        "group"      => "Social Links",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style2','style3','style5','style8','style10') ),
    ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Facebook Icon Color", "pcvc" ),
        "param_name"        => "facebook_color",
        "value"             => '',
        "group"             => "Social Links",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style2','style3','style5','style8','style10') ),
    ),         
    array(
        "type"       => "textfield",
        "heading"    => __("Twitter URL", "pcvc"),
        "param_name" => "twitter",
        "value"      => "",
        "group"      => "Social Links",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style2','style3','style5','style8','style10') ),
    ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Twitter Icon Color", "pcvc" ),
        "param_name"        => "twitter_color",
        "value"             => '',
        "group"             => "Social Links",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style2','style3','style5','style8','style10') ),
    ),        
    array(
        "type"       => "textfield",
        "heading"    => __("LinkedIn URL", "pcvc"),
        "param_name" => "linkedin",
        "value"      => "",
        "group"      => "Social Links",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style2','style3','style5','style8','style10') ),
    ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "LinkedIn Icon Color", "pcvc" ),
        "param_name"        => "linkedin_color",
        "value"             => '',
        "group"             => "Social Links",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style2','style3','style5','style8','style10') ),
    ),        
    array(
        "type"       => "textfield",
        "heading"    => __("Google Plus URL", "pcvc"),
        "param_name" => "gplus",
        "value"      => "",
        "group"      => "Social Links",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style2','style3','style5','style8','style10') ),
    ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Google+ Icon Color", "pcvc" ),
        "param_name"        => "gplus_color",
        "value"             => '',
        "group"             => "Social Links",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style2','style3','style5','style8','style10') ),
    ),        
    array(
        "type"       => "textfield",
        "heading"    => __("Instagram URL", "pcvc"),
        "param_name" => "instagram",
        "value"      => "",
        "group"      => "Social Links",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style2','style3','style5','style8','style10') ),
    ),    
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Instagram Icon Color", "pcvc" ),
        "param_name"        => "instagram_color",
        "value"             => '',
        "group"             => "Social Links",
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style2','style3','style5','style8','style10') ),
    ),    
    // Count Group
    array(
        "type"       => "textfield",
        "heading"    => __("Name 1", "pcvc"),
        "param_name" => "c_name_1",
        "value"      => "Tweets",
        "group"      => "Count",
        "dependency"    => array( 'element' => "style", 'value' => array('style4', 'style5','style6') ),
    ),
    array(
        "type"       => "textfield",
        "heading"    => __("Number 1", "pcvc"),
        "param_name" => "c_number_1",
        "value"      => "1300",
        "group"      => "Count",
        "dependency"    => array( 'element' => "style", 'value' => array('style4', 'style5','style6') ),
    ),
    array(
        "type"       => "textfield",
        "heading"    => __("Name 2", "pcvc"),
        "param_name" => "c_name_2",
        "value"      => "Followers",
        "group"      => "Count",
        "dependency"    => array( 'element' => "style", 'value' => array('style4', 'style5','style6') ),
    ),
    array(
        "type"       => "textfield",
        "heading"    => __("Number 2", "pcvc"),
        "param_name" => "c_number_2",
        "value"      => "450",
        "group"      => "Count",
        "dependency"    => array( 'element' => "style", 'value' => array('style4', 'style5','style6') ),
    ),    
    array(
        "type"       => "textfield",
        "heading"    => __("Name 3", "pcvc"),
        "param_name" => "c_name_3",
        "value"      => "Following",
        "group"      => "Count",
        "dependency"    => array( 'element' => "style", 'value' => array('style4', 'style5','style6') ),
    ),
    array(
        "type"       => "textfield",
        "heading"    => __("Number 3", "pcvc"),
        "param_name" => "c_number_3",
        "value"      => "83",
        "group"      => "Count",
        "dependency"    => array( 'element' => "style", 'value' => array('style4', 'style5','style6') ),
    ),
    
    // Group Settings
    array(
        "type" => "prime_slider",
        "class" => "",
        "heading" => __("Profile Image Width", "pcvc"),
        "param_name" => "p_img_width",
        "value" => 100,
        "min" => 50,
        "max" => 300,
        "step" => 1,
        "unit" => "px",
        "description" => __("Set profile image width (in pixel). Deafult is 100px ", "pcvc"),
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style3', 'style5', 'style9', 'style10', ) ),
        "group" => "Settings"
    ),
    array(
        "type" => "prime_slider",
        "class" => "",
        "heading" => __("Profile Image Height", "pcvc"),
        "param_name" => "p_img_height",
        "value" => 100,
        "min" => 50,
        "max" => 300,
        "step" => 1,
        "unit" => "px",
        "description" => __("Set profile image height (in pixel). Deafult is 100px ", "pcvc"),
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style3', 'style5', 'style9', 'style10', ) ),
        "group" => "Settings"
    ),
    array(
        "type" => "prime_slider",
        "class" => "",
        "heading" => __("Profile Image Position", "pcvc"),
        "param_name" => "p_img_pos",
        "value" => -50,
        "min" => -200,
        "max" => 200,
        "step" => 1,
        "unit" => "px",
        "description" => __("Set profile image position Top and Bottom (in pixel). Deafult is -50px (-top, +bottom)", "pcvc"),
        "dependency"    => array( 'element' => "style", 'value' => array('style1') ),
        "group" => "Settings"
    ),
    
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Background Color", "pcvc" ),
        "param_name"        => "bg_color",
        "value"             => '',
        //"description" => __("default color is #ffffff", "pcvc"),
        "dependency"    => array( 'element' => "style", 'value' => array('style1', 'style3', 'style8', 'style9', 'style10', ) ),
        "group"             => "Settings",
    ),                
    array(
        "type"              => "dropdown",
        "heading"           => __( "Custom Font", "pcvc" ),
        "param_name"        => "font",
        "value"             => $google_fonts,
        "group"             => "Settings",
    ),
    array(
        "type"              => "textfield",
        "heading"           => __( "Name Font Size", "pcvc" ),
        "param_name"        => "name_font_size",
        "value"             => '16',
        "description" => __("default value is 16px", "pcvc"),
        "group"             => "Settings",
    ), 
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Name Color", "pcvc" ),
        "param_name"        => "name_color",
        "value"             => '',
        //"description" => __("default color is #ffffff", "pcvc"),
        "group"             => "Settings",
    ), 
    array(
        "type"              => "dropdown",
        "heading"           => __( "Name to be <em>italic</em>", "pcvc" ),
        "param_name"        => "name_italic",
        "value"             => array(
            __( 'No', "pcvc" )   => "no",
            __( 'Yes', "pcvc" )  => "italic",

        ),
        "group"             => "Settings",
    ),
    array(
        "type"              => "textfield",
        "heading"           => __( "Profile Address Font Size", "pcvc" ),
        "param_name"        => "profile_font_size",
        "value"             => '13',
        "description" => __("default value is 16px", "pcvc"),
        "group"             => "Settings",
    ), 
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Profile Address Color", "pcvc" ),
        "param_name"        => "profile_color",
        "value"             => '',
        //"description" => __("default color is #ffffff", "pcvc"),
        "group"             => "Settings",
    ), 
    array(
        "type"              => "dropdown",
        "heading"           => __( "Profile Address to be <em>italic</em>", "pcvc" ),
        "param_name"        => "profile_italic",
        "value"             => array(
            __( 'No', "pcvc" )   => "no",
            __( 'Yes', "pcvc" )  => "italic",

        ),
        "group"             => "Settings",
    ),    
                   
    
    array(
        "type"              => "textfield",
        "heading"           => __( "Custom CSS Class", "pcvc" ),
        "param_name"        => "css_class",
        "value"             => '',
        "description" => __("using custom class you can customize styles.", "pcvc"),
        "group"             => "Settings",
    ),            
    
    
                    
        
    )
) 

);


function pcvc_profile_card_shortcode( $atts, $content = null, $tag ) {
    extract(shortcode_atts(array(
    
            "style"     => 'style1',
            "image"     => '',
            "name"      => 'John Doe',
            "profile_address" => '',
            "bg_image" => '',
            "style5_bg_color" => '#4fb96e',
            "facebook" => '',
            "facebook_color" => '#fff',
            "twitter" => '',
            "twitter_color" => '#fff',
            "linkedin" => '',
            "linkedin_color" => '#fff',
            "gplus" => '',
            "gplus_color" => '#fff',
            "instagram" => '',
            "instagram_color" => '#fff',
            "c_name_1" => '',
            "c_number_1" => '',
            "c_name_2" => '',
            "c_number_2" => '',
            "c_name_3" => '',
            "c_number_3" => '',
            "p_img_width" => '',
            "p_img_height" => '',
            "p_img_pos" => '',
            "bg_color" => '',
            "font" => 'Open+Sans',
            "name_font_size" => '',
            "name_color" => '',
            "name_italic" => '',
            "profile_font_size" => '',
            "profile_color" => '',
            "profile_italic" => '',
            "css_class" => '',
            
    ), $atts));
        
        
        
    wp_register_style('pcvc_bootstrap', plugins_url( 'css/bootstrap.min.css' , __FILE__ ) );
    wp_enqueue_style( 'pcvc_bootstrap' );

    wp_register_style( 'profile-card-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
    wp_enqueue_style( 'profile-card-font-awesome' );
        
    wp_register_style('pcvc_profile_card', plugins_url( 'css/profile-card-v2.css' , __FILE__ ) );
    wp_enqueue_style( 'pcvc_profile_card' );    
                 
    
    $image = wp_get_attachment_image_src( $image, 'full' ); 
    $bg_image = wp_get_attachment_image_src( $bg_image, 'full' ); 
    
    $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
    $output ='';
    $output .= '<style>@import url(https://fonts.googleapis.com/css?family='.$font.');</style>';
    
    $social_links = '';
    if ( !empty($facebook) ){
        $social_links .='<a href="'.$facebook.'"><i style="color:'.$facebook_color.'" class="fa fa-facebook"></i></a>';
    }
    if ( !empty($twitter) ){
        $social_links .='<a href="'.$twitter.'"><i style="color:'.$twitter_color.'" class="fa fa-twitter"></i></a>';
    }    
    if ( !empty($linkedin) ){
        $social_links .='<a href="'.$linkedin.'"><i style="color:'.$linkedin_color.'" class="fa fa-linkedin"></i></a>';
    } 
    if ( !empty($gplus) ){
        $social_links .='<a href="'.$gplus.'"><i style="color:'.$gplus_color.'" class="fa fa-google-plus"></i></a>';
    }    
    if ( !empty($instagram) ){
        $social_links .='<a href="'.$instagram.'"><i style="color:'.$instagram_color.'" class="fa fa-instagram"></i></a>';
    }
        
        
    if ( $style=='style1' ){  
                          
        $output .='<div class="profile-card-1 '.$css_class.'" style="background-image:url('.$bg_image[0].');">
                        <div class="profile-content" style="background-color: '.$bg_color.'">
                            <div class="profile-img" style="top: '.$p_img_pos.'px"><img src="'.$image[0].'" style="width: '.$p_img_width.'px; height: '.$p_img_height.'px" class="img img-responsive"></div>
                            <div class="profile-name" style="font-family: '.$font.'; font-size: '.$name_font_size.'px; color:'.$name_color.';font-style: '.$name_italic.';">'.$name.'</div>
                            <div class="profile-address" style="font-family: '.$font.'; font-size: '.$profile_font_size.'px; color:'.$profile_color.';font-style: '.$profile_italic.';">'.$profile_address.'</div>
                            <p class="profile-description">'.$content.'</p>
                            <div class="profile-icons">';
                            
                            $output .= $social_links;    
                                
                    $output .='</div></div></div>';                
    }

    if ( $style=='style2' ){  
                          
        $output .='<div class="profile-card-2 '.$css_class.'">
                        <img src="'.$image[0].'" style="width: '.$p_img_width.'px; height: '.$p_img_height.'px" class="img img-responsive">
                        <div class="profile-name" style="font-family: '.$font.'; font-size: '.$name_font_size.'px; color:'.$name_color.';font-style: '.$name_italic.';">'.$name.'</div>
                        <div class="profile-username" style="font-family: '.$font.'; font-size: '.$profile_font_size.'px; color:'.$profile_color.';font-style: '.$profile_italic.';">'.$profile_address.'</div>
                        <div class="profile-icons">';
                        
                        $output .= $social_links;
                        
                    $output .='</div></div>';                
    }
    
    if ( $style=='style3' ){  
                          
        $output .='<div class="profile-card-3 text-center '.$css_class.'" style="background-color: '.$bg_color.'">
                        <div class="profile-name" style="font-family: '.$font.'; font-size: '.$name_font_size.'px; color:'.$name_color.';font-style: '.$name_italic.';">'.$name.'</div>
                        <div class="profile-location" style="font-family: '.$font.'; font-size: '.$profile_font_size.'px; color:'.$profile_color.';font-style: '.$profile_italic.';">'.$profile_address.'</div>
                        <img src="'.$image[0].'" style="width: '.$p_img_width.'px; height: '.$p_img_height.'px" class="img img-responsive">
                        <p class="profile-description">'.$content.'</p>
                        <div class="profile-icons">';
                        
                        $output .= $social_links;
                        
                    $output .='</div></div>';                
    }
    
    if ( $style=='style4' ){  
                          
        $output .='<div class="profile-card-4 text-center '.$css_class.'"><img src="'.$image[0].'" style="width: '.$p_img_width.'px; height: '.$p_img_height.'px" class="img img-responsive">
                        <div class="profile-content">
                            <div class="profile-name" style="font-family: '.$font.'; font-size: '.$name_font_size.'px; color:'.$name_color.';font-style: '.$name_italic.';">'.$name.'
                                <p style="font-family: '.$font.'; font-size: '.$profile_font_size.'px; color:'.$profile_color.';font-style: '.$profile_italic.';">'.$profile_address.'</p>
                            </div>
                            <div class="profile-description">'.$content.'</div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="profile-overview">
                                        <p>'.$c_name_1.'</p>
                                        <h4>'.$c_number_1.'</h4></div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="profile-overview">
                                        <p>'.$c_name_2.'</p>
                                        <h4>'.$c_number_2.'</h4></div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="profile-overview">
                                        <p>'.$c_name_3.'</p>
                                        <h4>'.$c_number_3.'</h4></div>
                                </div>
                            </div>
                        </div>
                    </div>';                
    }    


    if ( $style=='style5' ){  
                          
        $output .='<div class="profile-card-5 text-center '.$css_class.'"><img src="'.$image[0].'" style="width: '.$p_img_width.'px; height: '.$p_img_height.'px" class="img img-responsive">
                        <div class="profile-name" style="font-family: '.$font.'; font-size: '.$name_font_size.'px; color:'.$name_color.';font-style: '.$name_italic.';">'.$name.'</div>
                        <div class="profile-designation" style="font-family: '.$font.'; font-size: '.$profile_font_size.'px; color:'.$profile_color.';font-style: '.$profile_italic.';">'.$profile_address.'</div>
                        <p class="profile-description">'.$content.'</p>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="profile-overview">
                                    <p>'.$c_name_1.'</p>
                                    <h3>'.$c_number_1.'</h3></div>
                            </div>
                            <div class="col-xs-4">
                                <div class="profile-overview">
                                    <p>'.$c_name_2.'</p>
                                    <h3>'.$c_number_2.'</h3></div>
                            </div>
                            <div class="col-xs-4">
                                <div class="profile-overview">
                                    <p>'.$c_name_3.'</p>
                                    <h3>'.$c_number_3.'</h3></div>
                            </div>
                        </div>
                        <div class="profile-icons">';
                        
                        $output .= $social_links;
                        
                    $output .='</div></div>';                 
                    $output .='<style>.profile-card-5:before {
                                    background-color: '.$style5_bg_color.' !important;
                            }</style>';                 
    }
    
    if ( $style=='style6' ){  
                          
        $output .='<div class="profile-card-6 '.$css_class.'"><img src="'.$image[0].'" style="width: '.$p_img_width.'px; height: '.$p_img_height.'px" class="img img-responsive">
                        <div class="profile-name" style="font-family: '.$font.'; font-size: '.$name_font_size.'px; color:'.$name_color.';font-style: '.$name_italic.';">'.$name.'</div>
                        <div class="profile-position" style="font-family: '.$font.'; font-size: '.$profile_font_size.'px; color:'.$profile_color.';font-style: '.$profile_italic.';">'.$profile_address.'</div>
                        <div class="profile-overview">
                            <div class="profile-overview">
                                <div class="row text-center">
                                    <div class="col-xs-4">
                                        <h3>'.$c_number_1.'</h3>
                                        <p>'.$c_name_1.'</p>
                                    </div>
                                    <div class="col-xs-4">
                                        <h3>'.$c_number_2.'</h3>
                                        <p>'.$c_name_2.'</p>
                                    </div>
                                    <div class="col-xs-4">
                                        <h3>'.$c_number_3.'</h3>
                                        <p>'.$c_name_3.'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';                
    }
    
    if ( $style=='style8' ){  
                          
        $output .='<div class="profile-card-8 text-center '.$css_class.'" style="background: linear-gradient('.$bg_color.' ,#36445a);">
                <img src="'.$image[0].'" style="width: '.$p_img_width.'px; height: '.$p_img_height.'px" class="img img-responsive">
                        <div class="profile-name" style="font-family: '.$font.'; font-size: '.$name_font_size.'px; color:'.$name_color.';font-style: '.$name_italic.';">'.$name.'</div>
                        <div class="profile-designation" style="font-family: '.$font.'; font-size: '.$profile_font_size.'px; color:'.$profile_color.';font-style: '.$profile_italic.';">'.$profile_address.'</div>
                            <div class="profile-icons">';
                            
                            $output .= $social_links;    
                                
                    $output .='</div></div>';                
    }    

    if ( $style=='style9' ){  
                          
        $output .='<div class="profile-card-9 text-center '.$css_class.'" style="background-color: '.$bg_color.'">
            <img src="'.$image[0].'" style="width: '.$p_img_width.'px; height: '.$p_img_height.'px" class="img img-responsive">
                        <div class="profile-name">'.$name.'</div>
                        <div class="profile-designation" style="font-family: '.$font.'; font-size: '.$profile_font_size.'px; color:'.$profile_color.';font-style: '.$profile_italic.';">'.$profile_address.'</div>
                        <p class="profile-description">'.$content.'</p>
                            <div class="profile-icons">';
                            
                            $output .= $social_links;    
                                
                    $output .='</div></div>';                
    }

    if ( $style=='style10' ){  
                          
        $output .='<div class="profile-card-10 text-center '.$css_class.'" style="background-color: '.$bg_color.'">
            <img src="'.$image[0].'" style="width: '.$p_img_width.'px; height: '.$p_img_height.'px" class="img img-responsive">
                        <div class="profile-name" style="font-family: '.$font.'; font-size: '.$name_font_size.'px; color:'.$name_color.';font-style: '.$name_italic.';">'.$name.'</div>
                        <div class="profile-location" style="font-family: '.$font.'; font-size: '.$profile_font_size.'px; color:'.$profile_color.';font-style: '.$profile_italic.';">'.$profile_address.'</div>
                        <p class="profile-description">'.$content.'</p>
                            <div class="profile-icons">';
                            
                            $output .= $social_links;    
                                
                    $output .='</div></div>';                
    }                
    
    return $output;
}

add_shortcode('pcvc_profile_card', 'pcvc_profile_card_shortcode');
