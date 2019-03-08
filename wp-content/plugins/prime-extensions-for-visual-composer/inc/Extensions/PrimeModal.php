<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;
use Inc\Base\ExtensionsController;

class PrimeModal extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'prime_modal' ) ) {
			return;
		}
		add_shortcode( 'prime_cq_vc_modal', array( $this, 'prime_cq_vc_modal_func' ) );

		$this->primemodal();
	}

	public function primemodal() {
		vc_map( array(
			"name" => __("Prime Modal", 'prime_vc'),
			"base" => "prime_cq_vc_modal",
			"class" => "prime_cq_vc_extension_depthmodal",
			"controls" => "full",
			"icon" => "prime_icon_pr_modal",
			"category" => __('Prime VC Extensions', 'js_composer'),
			'description' => __( 'Popup modal', 'js_composer' ),
			// 'admin_enqueue_js' => array(plugins_url('prime_vc_admin.js', __FILE__)),
			// 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
			"params" => array(

				array(
					"type"        => "textfield",
					"heading"     => __( "Link label", 'prime_vc' ),
					"param_name"  => "buttontext",
					"admin_label" => true,
					"value"       => "Click Me",
					"description" => __( "The link user click to open the modal", 'prime_vc' ),

				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __("Popup content", 'prime_vc'),
					"param_name" => "content",
					"value" => __("<p>I am test text block. Click edit button to change this text.</p>", 'prime_vc'),
					"description" => __("", 'prime_vc')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __("Popup text color <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "textcolor",
					"value" => '#333',
					"description" => __("", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __("Popup background <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "background",
					"value" => '#fff',
					"description" => __("", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc_tiny_text",
					"heading" => __("Popup width <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "width",
					"value" => __("640", 'prime_vc'),
					"description" => __("A fixed value like 640, or a (responsive) percent value like 60%.", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "prime_vc_tiny_text",
					"heading" => __("Popup margin top <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "margintop",
					"value" => __("40", 'prime_vc'),
					"description" => __("", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "dropdown",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("Display the Popup in: <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc"),
					"param_name" => "popupposition",
					"value" => array("fixed" => "fixed", "absolute (work better for long contnet)" => "absolute"),
					"description" => __("CSS position value for the Popup.", "prime_vc"),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "checkbox",
					"holder" => "",
					"class" => "prime_vc",
					"heading" => __("Do not hide the popup content when page is loaded <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
					"param_name" => "loadedvisible",
					"value" => array(__("Yes, set the popup content visible by default", "prime_vc") => 'on'),
					"description" => __("Sometime you have to display the popup content when page is loaded, for example my hotspot plugin need it's container to be visible when loaded.", 'prime_vc'),
					"group" => __("PRO Features", 'prime_vc')
				),
				array(
					"type" => "prime_param_heading",
					"text" => "<span class='phyoutubeparam'>
                        <iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
                        src='https://www.youtube.com/embed/ix4bj7_9ubg' frameborder='0' allowfullscreen>
                        </iframe> 
                    </span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group" => "Video Tutorial"
				),

			)
		) );

	}



	function prime_cq_vc_modal_func( $atts, $content=null, $tag) {
		extract( shortcode_atts( array(
			'buttontext' => 'Click Me',
			//'width' => '640',
			//'textcolor' => '#333',
			//'background' => '#fff',
			//'margintop' => '40',
			'padding' => '0',
			//'popupposition' => 'fixed',
			// 'loadedvisible' => 'off'
		), $atts ) );

		$path = plugin_dir_url( dirname(__FILE__ , 2 ));
		wp_enqueue_script( 'vc_modal_cq_js', $path .  'assets/js/jquery.avgrund.min.js', array( 'jquery' ) );

		$content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
		return "<div class='avgrund-container' data-width='640' data-textcolor='#333' data-background='#fff' data-loadedvisible='off' data-margintop='40' data-popupposition='fixed'><div class='avgrund-popup'>
              <div class='avgrund-content'>
                {$content}
              </div>
              <a href='#' class='avgrund-close'><img width='24' height='24' src='".$path .'assets/img/close.png'."' alt='close' /></a>
            </div><div class='avgrund-cover'></div><a href='#' class='avgrund-btn'>".$buttontext."</a></div>";
	}
}