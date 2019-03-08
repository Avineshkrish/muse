<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class TeamMember extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'team_member' ) ) {
			return;
		}
		add_shortcode( 'pr_team_member', array( $this, 'Prime_Team_Member_shortcode_function' ) );

		$this->teammember();
	}

	public function teammember() {
		vc_map( array(
			"name"        => __( "Team Member", 'RD_vc' ),
			"base"        => "pr_team_member",
			"icon"        => "pr_team_member",
			"category"    => 'Prime VC Extensions',
			'description' => 'Team Member For Prime Extensions',
			// 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
			"params"      => array(

				// Select Square Field
				array(
					"type"        => "dropdown",
					"heading"     => __( "Select Team Member Style" ),
					"param_name"  => "select_style",
					"admin_label" => true,
					"value"       => array(
						'Style 1' => 'theme-1',
						'Style 2' => 'theme-2',
						'Style 3 (Pro Only)' => 'theme-5',
					),
					"description" => __( "<a target='_blank' href='http://demo.codecans.com/prime-extensions-vc-team-member/'>View All Team Member Style Live Demo Here</a>", "prime_vc" )
				),
				// Attached Image Field
				array(
					"type"        => "attach_image",
					"heading"     => __( "Upload Mamber Image", "prime_vc" ),
					"param_name"  => "ptm_member_img",
					"value"       => "",
					"description" => __( "Select img from media library.", "prime_vc" )
				),
				array(
					"type"        => "textfield",
					"heading"     => __( "Member Name", 'prime_vc' ),
					"param_name"  => "ptm_name",
					"admin_label" => true,
					"value"       => "Mickle Bond",
					"description" => __( "Team Member Name Here", 'prime_vc' ),
					//  "group"=> "Add Items"
				),
				array(
					"type"        => "textfield",
					"heading"     => __( "Member Job/Role", 'prime_vc' ),
					"param_name"  => "ptm_label",
					"admin_label" => true,
					"value"       => "Designer",
					"description" => __( "Team Member Job/Role Here", 'prime_vc' ),
					//  "group"=> "Add Items"
				),

				// Member Description
				array(
					"type"        => "textarea",
					"heading"     => __( "Member Description/Bio", 'prime_vc' ),
					"param_name"  => "team_description",
					"admin_label" => true,
					"value"       => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
					"description" => __( "Team Member Description/Bio Goes Here", 'prime_vc' ),
				),


				// Member Information Group Switch Param Here
				array(
					"type"        => "prime_switch",
					"class"       => "",
					"heading"     => __( "Member More Information (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro To Unlock All Extensions Full Feature</a>", "prime_vc" ),
					"param_name"  => "ac_member_info",
					"value"       => "off",
					"options"     => array(
						"on" => array(
							"label" => __( "", "prime_vc" ),
							"on"    => "Yes",
							"off"   => "No",
						),
					),
					"default_set" => true,
					"description" => "Switch Yes If you want to Add More Information Like Email, Phone, Adress Etc",
					'group' => 'More Information',
				),

				// Member Information Group Here
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Add Member Information', 'prime_vc' ),
					'param_name' => 'iconoptions',
					"dependency" => array('element' => 'ac_member_info', 'value'   => array('on')),
					'group' => 'More Information',
					'params'     => array(

						// Member Information Label Field
						array(
							"type"        => "textfield",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"heading"     => __( "Member Information Label", 'prime_vc' ),
							"param_name"  => "minfo_label",
							"admin_label" => true,
							"value"       => "Email: support@codecans.com",
							"description" => __( "Member Information Label Write Here", 'rd_team_vc' ),
						),

						// Member Link Field
						array(
							"type"        => "vc_link",
							"edit_field_class" => "vc_col-xs-6 vc_column",
							"class"       => "",
							"heading"     => __( "Link", 'prime_vc' ),
							"param_name"  => "minfo_link",
							"description" => __( "Leave it Blank If you Don't Want Link", 'prime_vc' ),
						),

					),
					'callbacks'  => array('after_add' => 'vcChartParamAfterAddCallback')
				),

				// Social Icon Group Here
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Add Member Social Icon', 'prime_vc' ),
					'param_name' => 'tmoptions',
					"group"      => "Social Icons",
					'params'     => array(
						array(
							"type"        => "dropdown",
							"heading"     => __( "Select Social Icon" ),
							"param_name"  => "social_icon",
							"admin_label" => true,
							"value"       => array(
								'Facebook' => 'fa fa-facebook',
								'Twitter' => 'fa fa-twitter',
								'Linkedin' => 'fa fa-linkedin',
								'Google' => 'fa fa-google',
								'YouTube' => 'fa fa-youtube',
								'Pinterest' => 'fa fa-pinterest',
								'Instagram' => 'fa fa-instagram',
								'Tumblr' => 'fa fa-tumblr',
								'Flickr' => 'fa fa-flickr',
								'Reddit' => 'fa fa-reddit',
							),
						),
						// Link Field
						array(
							"type"        => "vc_link",
							"class"       => "",
							"heading"     => __( "Social URL (Link)", 'prime_vc' ),
							"param_name"  => "social_link",
							"description" => __( "Provide Social link here.", 'prime_vc' ),
						),
						array(
							"type"       => "colorpicker",
							"heading"    => __( "Icon Color (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro To Unlock All Extensions Full Feature</a>", "my-text-domain" ),
							"param_name" => "icon_color",
							"value"      => '',
							"description" => __( "Choose Color For Icon.", 'prime_vc' ),
						),

					),
					'callbacks'  => array('after_add' => 'vcChartParamAfterAddCallback')
				),


				// Team MemBer Settings
				array(
					'type'        => "prime_slider",
					'heading'     => __( "Member Name Font Size (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro To Unlock All Extensions Full Feature</a>", 'team_vc' ),
					//'edit_field_class' => 'vc_col-xs-6 vc_column',
					'param_name'  => 'mnfsize',
					'tooltip'     => __( 'Choose Member Name FontSize Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
					'min'         => 1,
					'max'         => 30,
					'step'        => 1,
					'value'       => 14,
					'unit'        => 'px',
					"description" => __( "Use Custom Member Name Fontsize, default is 14px", "my-text-domain" ),
					"group"       => "Settings",
				),

				array(
					"type"       => "colorpicker",
					"heading"    => __( "Member Name Font Color (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "my-text-domain" ),
					'edit_field_class' => 'vc_col-xs-6 vc_column',
					'group' => 'Settings',
					"param_name" => "mnf_color",
					"value"      => '',
					"description" => __( "Member Name Font Color Here", 'prime_vc' ),
					'group' => 'Settings',
				),
				array(
					"type"       => "colorpicker",
					'edit_field_class' => 'vc_col-xs-6 vc_column',
					"heading"    => __( "Member Name Background Color (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "my-text-domain" ),
					'group' => 'Settings',
					"param_name" => "mnb_color",
					"value"      => '',
					"description" => __( "Member Name Background Color Here", 'prime_vc' ),
					'group' => 'Settings',
				),

				// Team MemBer Settings
				array(
					'type'        => 'prime_slider',
					'heading'     => __( "Member Label Font Size (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro To Unlock All Extensions Full Feature</a>", 'team_vc' ),
					//'edit_field_class' => 'vc_col-xs-6 vc_column',
					'param_name'  => 'mlfsize',
					'tooltip'     => __( 'Choose Member Label FontSize Here. For large numbers it\'s better use 13px Font Size.', 'team_vc' ),
					'min'         => 1,
					'max'         => 30,
					'step'        => 1,
					'value'       => 13,
					'unit'        => 'px',
					"description" => __( "Use Custom Member Label Fontsize, default is 13px", "my-text-domain" ),
					"group"       => "Settings",
				),

				array(
					"type"       => "colorpicker",
					"heading"    => __( "Member Label Font Color (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "my-text-domain" ),
					'edit_field_class' => 'vc_col-xs-6 vc_column',
					'group' => 'Settings',
					"param_name" => "mlf_color",
					"value"      => '',
					"description" => __( "Member Label Font Color Here", 'prime_vc' ),
					'group' => 'Settings',
				),
				array(
					"type"       => "colorpicker",
					'edit_field_class' => 'vc_col-xs-6 vc_column',
					"heading"    => __( "Member Label Background Color (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "my-text-domain" ),
					'group' => 'Settings',
					"param_name" => "mlb_color",
					"value"      => '',
					"description" => __( "Member Label Background Color Here, Default is #C40000", 'prime_vc' ),
					'group' => 'Settings',
				),

				// Team MemBer Settings
				array(
					'type'        => 'prime_slider',
					'heading'     => __( "Member Description/Bio Font Size (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro To Unlock All Extensions Full Feature</a>", 'team_vc' ),
					//'edit_field_class' => 'vc_col-xs-6 vc_column',
					'param_name'  => 'mdfsize',
					'tooltip'     => __( 'Choose Member Description/Bio FontSize Here. For large numbers it\'s better use 13px Font Size.', 'team_vc' ),
					'min'         => 1,
					'max'         => 30,
					'step'        => 1,
					'value'       => 13,
					'unit'        => 'px',
					"description" => __( "Use Custom Member Description/Bio Fontsize, default is 13px", "my-text-domain" ),
					"group"       => "Settings",
				),

				array(
					"type"       => "colorpicker",
					//'edit_field_class' => 'vc_col-xs-6 vc_column',
					"heading"    => __( "Member Description/Bio Font Color (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro To Unlock All Extensions Full Feature</a>", "my-text-domain" ),
					'group' => 'Settings',
					"param_name" => "mdbf_color",
					"value"      => '',
					"description" => __( "Member Description/Bio Font Color Here, Default is #888", 'prime_vc' ),
					'group' => 'Settings',
				),
				/* STYLE 1 Responsize Image Field */
				array(
					"type" => "checkbox",
					//"edit_field_class" => "vc_col-xs-6 vc_column",
					"heading" => __("Member Image Resize? (Pro Feature) <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro To Unlock All Extensions Full Feature</a>", "prime_vc"),
					"param_name" => "miresize",
					"value" => "no",
					"description" => __("If you want to resize member Image, Just check this.", "prime_vc"),
					"group"       => "Settings",
				),
				array(
					'type'        => 'prime_slider',
					'heading'     => __( 'Member Image Height 960px-1500px screen', 'team_vc' ),
					//'edit_field_class' => 'vc_col-xs-6 vc_column',
					'param_name'  => 'miheight960',
					'min'         => 1,
					'max'         => 1000,
					'step'        => 1,
					'value'       => 250,
					'unit'        => 'px',
					"dependency" => array('element' => 'miresize', 'value'   => array('true')),
					"description" => __( "Choose Member Image Height Here. Height Is Show For 960px to 1500px screen", "prime_vc" ),
					"group"       => "Settings",
				),
				array(
					'type'        => 'prime_slider',
					'heading'     => __( 'Member Image Height 768px-959px screen', 'team_vc' ),
					//'edit_field_class' => 'vc_col-xs-6 vc_column',
					'param_name'  => 'miheight768',
					'min'         => 1,
					'max'         => 800,
					'step'        => 1,
					'value'       => 200,
					"dependency" => array('element' => 'miresize', 'value'   => array('true')),
					'unit'        => 'px',
					"description" => __( "Choose Member Image Height. Height Is Show For 768px to 959px screen", "prime_vc" ),
					"group"       => "Settings",
				),


				array(
					"type" => "prime_param_heading",
					"text" => "<span class='phyoutubeparam'>
					<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
					src='https://www.youtube.com/embed/OQDc5WjU2ls' frameborder='0' allowfullscreen>
					</iframe> 
				</span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					"group" => "Video Tutorial"
				),

			)
		) );
	}



	function Prime_Team_Member_shortcode_function( $atts, $content = null, $tag ) {
		extract( shortcode_atts( array(
			'select_style'     => 'theme-1',
			'ptm_member_img'    => '',
			'ptm_name'    => 'Mickle Bond',
			'ptm_label'    => 'Designer',
			'team_description'    => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
			'tmoptions'    => '',
			'social_icon'    => 'facebook',
			//'icon_color'    => '',
			'social_link'    => '',
			//'iconoptions'    => '',
			//'minfo_label'    => '',
			//'minfo_link'    => '',
			'label_border_color'    => '',
			'mnfsize'    => '14',
			//'mnf_color'    => '',
			//'mnb_color'    => '',
			//'mlfsize'    => '13',
			//'mlf_color'    => '',
			//'mlb_color'    => '',
			//'mdfsize'    => '13',
			//'mdbf_color'    => '',

		), $atts ) );

		$link           = '';
		$link           = vc_build_link( $link );
		$ptm_member_img = wp_get_attachment_image_src( $ptm_member_img, 'full' );
		$options        = json_decode( urldecode( $tmoptions ) );
		$mem_info       = json_decode( urldecode( $iconoptions ) );
		$content        = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
		$mnfsize        = $atts['mnfsize'] != '' ? (int) esc_attr( $atts['mnfsize'] ) : 14;
		$miheight9603   = isset( $atts['miheight9603'] ) != '' ? (int) esc_attr( $atts['miheight9603'] ) : 250;


		// Custom CSS
		if ( $select_style == 'theme-1' ) {
			$output = '
			<style type="text/css">
			@media screen and (max-width: 1600px) and (min-width: 960px) {
					.jag-tm-theme-1 li .member-img-wrap img {
					  height: ' . $miheight9601 . 'px;
					}
									}
			@media screen and (max-width: 959px) and (min-width: 768px) {
					.jag-tm-theme-1 li .member-img-wrap img {
					  height: ' . $miheight7681 . 'px;
					}
				}
				</style>
			';
		}
		if ( $select_style == 'theme-2' ) {
			$output = '
			<style type="text/css">
			@media screen and (max-width: 1600px) and (min-width: 960px) {
					.jag-tm-theme-2 li .member-img-wrap img {
					  height: ' . $miheight9602 . 'px;
					}
									}
			@media screen and (max-width: 959px) and (min-width: 768px) {
					.jag-tm-theme-2 li .member-img-wrap img {
					  height: ' . $miheight7682 . 'px;
					}
				}
				</style>
			';
		}
		if ( $select_style == 'theme-5' ) {
			$output = '
			<style type="text/css">
			@media screen and (max-width: 1600px) and (min-width: 960px) {
					.jag-tm-theme-5 li .member-img-wrap img {
					  height: ' . $miheight9603 . 'px;
					}
									}
			@media screen and (max-width: 959px) and (min-width: 768px) {
					.jag-tm-theme-5 li .member-img-wrap img {
					  height: ' . $miheight7683 . 'px;
					}
				}
				</style>
			';
		}


		$output .= '<ul class="jag-tm-'.$select_style.' grayscale-hover jag-team-wrapper theme-red">';
		if ( $select_style == 'theme-1' ) {
			$output .= '<li>
					<div class="member-img-wrap">
						<a>
							<img src="'.$ptm_member_img[0].'" class="" alt="team_member">
						</a>
						<div style="font-size: 14px; color:'.$mnf_color.'; background:'.$mnb_color.';" class="member-name">'.$ptm_name.'<span style="font-size:'.$mlfsize.'px; color:'.$mlf_color.'; background:'.$mlb_color.';">'.$ptm_label.'</span></div>
					</div>
					<div class="member-detail">
						<div class="member-social">
						';

			foreach ( $options as $option ) {
				$option->social_link = vc_build_link( $option->social_link );
				$output .= '<a href="' . $option->social_link['url'] . '" title="' . $option->social_link['title'] . '" target="' . $option->social_link['target'] . '"><i style=" background-color: #C40000;" class="'. esc_attr( $option->social_icon ).'"></i></a>';
			}
			$output .= '
						</div>
						<div style="font-size:'.$mdfsize.'px; color:'.$mdbf_color.'; " class="jag-tm-member-desc">'.$team_description.'</div>
						<div class="basic-info style_text">
						';
			if($mem_info){
				foreach ($mem_info as $minfo){
					$minfo->minfo_link = vc_build_link( $minfo->minfo_link );
					$output .='<a  class="member-email" onmouseover="this.style.color=\''.$mlb_color.'\'; this.style.borderColor=\''.$mlb_color.'\'" onMouseOut="this.style.color=\'#888\'; this.style.borderColor=\'#efefef\'" href="'.$minfo->minfo_link['url'].'" title="' . $minfo->minfo_link['title'] . '" target="' . $minfo->minfo_link['target'] . '">'.$minfo->minfo_label.'</a>';
				}
			}

			$output .= '<style type="text/css">
					/*
					.theme-red.jag-tm-theme-1 .member-tel:hover,.theme-red.jag-tm-theme-1 .member-website:hover,.theme-red.jag-tm-theme-1 .member-email:hover {
						border-color: ' . $mlb_color . ';
						color: ' . $mlb_color . ';
					}
					*/
					</style>';

			$output .= '</div></div></li>';
		}
		if ( $select_style == 'theme-2' ) {
			$output .= '<li>
					<div class="member-img-wrap">
						<a>
							<img src="'.$ptm_member_img[0].'" class="" alt="team_member">
						</a>
						<div style="font-size: '.$mnfsize.'px; color:'.$mnf_color.'; background:'.$mnb_color.';" class="member-name">'.$ptm_name.'<span style="font-size:'.$mlfsize.'px; color:'.$mlf_color.'; background:'.$mlb_color.';">'.$ptm_label.'</span></div>
					</div>
					<div class="member-detail">
						<div class="member-social">
						';
			foreach ( $options as $option ) {
				$option->social_link = vc_build_link( $option->social_link );
				$output .= '<a href="' . $option->social_link['url'] . '" title="' . $option->social_link['title'] . '" target="' . $option->social_link['target'] . '"><i style=" background-color: #C40000;" class="'. esc_attr( $option->social_icon ).'"></i></a>';
			}
			$output .= '</div><div style="font-size:'.$mdfsize.'px; color:'.$mdbf_color.'; " class="jag-tm-member-desc">'.$team_description.'</div>
						<div class="basic-info style_text">';
			if($mem_info){
				foreach ($mem_info as $minfo){
					$minfo->minfo_link = vc_build_link( $minfo->minfo_link );
					$output .='<a  class="member-email" onmouseover="this.style.color=\''.$mlb_color.'\'; this.style.borderColor=\''.$mlb_color.'\'" onMouseOut="this.style.color=\'#888\'; this.style.borderColor=\'#efefef\'" href="'.$minfo->minfo_link['url'].'" title="' . $minfo->minfo_link['title'] . '" target="' . $minfo->minfo_link['target'] . '">'.$minfo->minfo_label.'</a>';
				}
			}

			$output .= '<style type="text/css">
					/*
					.theme-red.jag-tm-theme-1 .member-tel:hover,.theme-red.jag-tm-theme-1 .member-website:hover,.theme-red.jag-tm-theme-1 .member-email:hover {
						border-color: '.$mlb_color.';
						color: '.$mlb_color.';
					}
					*/
					</style>';

			$output .= '</div></div></li>';
		}
		if ( $select_style == 'theme-5' ) {
			$output .= '<h1>This Style Only For Pro Version</h1>';
		}
		$output .= '</ul>';

		return $output;
	}
}