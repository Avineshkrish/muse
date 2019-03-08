<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class ScrollNotification extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'scroll_notification' ) ) {
			return;
		}
		add_shortcode( 'prime_cq_vc_notify', array( $this, 'prime_cq_vc_notify_func' ));

		$this->scrollnotification();
	}

	public function scrollnotification() {
		vc_map( array(
			"name" => __("Scrolling Notification", 'prime_vc'),
			"base" => "prime_cq_vc_notify",
			"class" => "prime_cq_vc_extension_scrollnotification   ",
			"controls" => "full",
			"icon" => "prime_scroll_notification",
			"category" => __('Prime VC Extensions', 'js_composer'),
			'description' => __( 'Popup notification', 'js_composer' ),
			"params" => array(
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __("Notification content", 'prime_vc'),
					"param_name" => "content",
					"value" => __("<p>I am test text block. Click edit button to change this text.</p>", 'prime_vc'),
					"description" => __("", 'prime_vc')
				),
				array(
					"type" => "prime_param_heading",
					"text" => "<span style='display: block;'><a href='https://youtu.be/bUSK-wFFX00' target='_blank'>".__("Watch Video Tutorial","prime_vc")." &nbsp; <span class='dashicons dashicons-video-alt3' style='font-size:30px;vertical-align: middle;color: #e52d27;'></span></a></span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("opacity <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "opacity",
					"value" => __("0.8", 'prime_vc'),
					"description" => __("", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "dropdown",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("easein <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc"),
					"param_name" => "easein",
					"value" => array(__("random", "prime_vc") => 'random', __("fadeIn", "prime_vc") => "fadeIn", __("wobble", "prime_vc") => "wobble", __("tada", "prime_vc") => "tada", __("shake", "prime_vc") => "shake", __("swing", "prime_vc") => "swing", __("pulse", "prime_vc") => "pulse", __("fadeInLeft", "prime_vc") => "fadeInLeft", __("fadeInRight", "prime_vc") => "fadeInRight", __("fadeInUp", "prime_vc") => "fadeInUp", __("fadeInDown", "prime_vc") => "fadeInDown", __("fadeInLeftBig", "prime_vc") => "fadeInLeftBig", __("fadeInRightBig", "prime_vc") => "fadeInRightBig", __("fadeInUpBig", "prime_vc") => "fadeInUpBig", __("fadeInDownBig", "prime_vc") => "fadeInDownBig", __("bounceInLeft", "prime_vc") => "bounceInLeft", __("bounceInRight", "prime_vc") => "bounceInRight", __("bounce", "prime_vc") => "bounce", __("bounceInUp", "prime_vc") => "bounceInUp", __("bounceInDown", "prime_vc") => "bounceInDown", __("rollIn", "prime_vc") => "rollIn", __("rotateIn", "prime_vc") => "rotateIn", __("rotateInDownLeft", "prime_vc") => "rotateInDownLeft", __("rotateInDownRight", "prime_vc") => "rotateInDownRight", __("rotateInUpLeft", "prime_vc") => "rotateInUpLeft", __("rotateInUpRight", "prime_vc") => "rotateInUpRight", __("flipInX", "prime_vc") => "flipInX", __("flipInY", "prime_vc") => "flipInY", __("lightSpeedIn", "prime_vc") => "lightSpeedIn"),
					"description" => __("Select easin in animation type. Note: Works only in modern browsers.", "prime_vc"),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "dropdown",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("easeout <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc"),
					"param_name" => "easeout",
					"value" => array(__("random", "prime_vc") => 'random', __("fadeOut", "prime_vc") => "fadeOut", __("fadeOutLeft", "prime_vc") => "fadeOutLeft", __("fadeOutRight", "prime_vc") => "fadeOutRight", __("fadeOutUp", "prime_vc") => "fadeOutUp", __("fadeOutDown", "prime_vc") => "fadeOutDown", __("fadeOutLeftBig", "prime_vc") => "fadeOutLeftBig", __("fadeOutRightBig", "prime_vc") => "fadeOutRightBig", __("fadeOutUpBig", "prime_vc") => "fadeOutUpBig", __("fadeOutDownBig", "prime_vc") => "fadeOutDownBig", __("bounceOutLeft", "prime_vc") => "bounceOutLeft", __("bounceOutRight", "prime_vc") => "bounceOutRight", __("bounceOutUp", "prime_vc") => "bounceOutUp", __("bounceOutDown", "prime_vc") => "bounceOutDown", __("rollOut", "prime_vc") => "rollOut", __("rotateOut", "prime_vc") => "rotateOut", __("rotateOutDownLeft", "prime_vc") => "rotateOutDownLeft", __("rotateOutDownRight", "prime_vc") => "rotateOutDownRight", __("rotateOutUpLeft", "prime_vc") => "rotateOutUpLeft", __("rotateOutUpRight", "prime_vc") => "rotateOutUpRight", __("flipOutX", "prime_vc") => "flipOutX", __("flipOutY", "prime_vc") => "flipOutY", __("lightSpeedOut", "prime_vc") => "lightSpeedOut"),
					"description" => __("Select easout in animation type. Note: Works only in modern browsers.", "prime_vc"),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "dropdown",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("Display the notification <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc"),
					"param_name" => "displaywhen",
					"value" => array( __("hidden by default, visible only when user scrolling", "prime_vc") => "scrolling", __("always visible", "prime_vc") => "loaded", __("visible by default, hidden when user scrolling", "prime_vc") => "scrollhidden"),
					"description" => __("Choose when to display the notification.", "prime_vc"),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "dropdown",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("Put the close button on the <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc"),
					"param_name" => "closeposition",
					"value" => array(__("left", "prime_vc") => "left", __("right", "prime_vc") => "right"),
					"description" => __("", "prime_vc"),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("width <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "width",
					"value" => __("240", 'prime_vc'),
					"description" => __("A fixed value like 640, or a percent value like 60%, or leave it to be blank equal to auto.", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("height <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "height",
					"value" => __("auto", 'prime_vc'),
					"description" => __("A fixed value like 640, or a percent value like 60%, or leave it to be blank equal to auto.", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __("Notification text color <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'vc_extend'),
					"param_name" => "textcolor",
					"value" => '#333',
					"description" => __("", 'vc_extend'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __("Notification background <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'vc_extend'),
					"param_name" => "background",
					"value" => '#fff',
					"description" => __("", 'vc_extend'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("top <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "top",
					"value" => __("", 'prime_vc'),
					"description" => __("", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("right <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "right",
					"value" => __("10", 'prime_vc'),
					"description" => __("", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("bottom <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "bottom",
					"value" => __("10", 'prime_vc'),
					"description" => __("", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("left <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "left",
					"value" => __("", 'prime_vc'),
					"description" => __("", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("Auto hide delay <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "autohidedelay",
					"value" => __("", 'prime_vc'),
					"description" => __("For example, 5000 stand for 5 seconds, leave it to blank if you do not want it", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "checkbox",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("After close, store it in cookie <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "cookie",
					"value" => array(__("yes", "prime_vc") => 'on'),
					"description" => __("", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),

				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("After close, do not show the notification again for days <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "days",
					"value" => __("10", 'prime_vc'),
					"description" => __("You have to enable the store in cookie", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "prime_param_heading",
					"text" => "<span class='phyoutubeparam'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/bUSK-wFFX00' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group" => "Video Tutorial"
				),

			)
		) );
	}


	function prime_cq_vc_notify_func( $atts, $content=null, $tag) {
		extract( shortcode_atts( array(
//			'width' => '240',
//			'height' => '140',
//			'textcolor' => '#333',
//			'background' => '#fff',
//			'easein' => 'fadeInLeft',
//			'easeout' => 'fadeOutRight',
//			'cookie' => 'false',
//			'autohidedelay' => '',
//			'days' => '10',
//			'top' => '',
//			'right' => '10',
//			'bottom' => '10',
//			'left' => '',
//			'opacity' => '0.8',
//			'displaywhen' => 'scrolling',
//			// 'displaybydefault' => '',
//			'closeposition' => 'left'
//			// 'displayglobally' => 'no'
		), $atts ) );

		$path = plugin_dir_url( dirname(__FILE__ , 2 ));

		wp_register_script('modernizr_css3', $path . 'assets/js/modernizr.custom.js', array("jquery"));
		wp_enqueue_script('modernizr_css3');

		wp_enqueue_script('jquery-cookie', $path .'assets/js/jquery.cookie.js', array('jquery'));

		wp_enqueue_script( 'vc_notify_cq_js', $path .'assets/js/jquery.scroll-notify.min.js', array('jquery') );

		$content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
		$output = '';
		if(is_single()||is_page()){
			if( $scrolling == "scrollhidden"){
				return "<div id='cq-scroll-notification' data-width='240' data-height='140' data-textcolor='#333' data-background='#fff' data-easein='fadeInLeft' data-easeout='fadeOutRight' data-positiontop='' data-positionright='10' data-positionbottom='10' data-positionleft='' data-cookie='false' data-days='10' data-autohidedelay='' data-displaywhen='loaded' data-opacity='0.8' data-from='0' data-to='all' data-closebutton='true' data-displaybydefault='on' data-closeposition='left' class='cq-scroll-notification'> {$content} </div>";
			}else{
				return "<div id='cq-scroll-notification' data-width='240' data-height='140' data-textcolor='#333' data-background='#fff' data-easein='fadeInLeft' data-easeout='fadeOutRight' data-positiontop='' data-positionright='10' data-positionbottom='10' data-positionleft='' data-cookie='false' data-days='10' data-autohidedelay='' data-displaywhen='scrolling' data-opacity='0.8' data-from='0' data-to='all' data-closebutton='true' data-closeposition='left' class='cq-scroll-notification' style='display:none'> {$content} </div>";

			}
		}
	}
}