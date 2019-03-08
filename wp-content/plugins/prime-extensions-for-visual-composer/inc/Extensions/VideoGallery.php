<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;

use Inc\Base\ExtensionsController;

class VideoGallery extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'video_gallery' ) ) {
			return;
		}
		add_shortcode( 'prime_videoGallery', array( $this, 'Prime_videoGallery_shortcode_function' ) );

		$this->videogallery();
	}

	public function videogallery() {
		vc_map( array(
			"name"        => __( "Video Gallery", 'RD_vc' ),
			"base"        => "prime_videoGallery",
			"icon"        => "prime_video_gallery",
			"category"    => 'Prime VC Extensions',
			'description' => 'Icon animation with Text',
			// 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
			"params"      => array(

				// Param Group Here
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Add Video', 'prime_vc' ),
					'param_name' => 'voptions',
					'params'     => array(

						array(
							"type"        => "dropdown",
							"heading"     => __( "Video Sorce" ),
							"param_name"  => "vsorce",
							"admin_label" => true,
							"value"       => array(
								'YouTube'     => 'youtube',
								'Vimeo (Pro Only)'       => 'vimeo',
								'DailyMotion (Pro Only)' => 'dailymotion',
								'HTML5 (Pro Only)'       => 'html5',
							),
							'description' => 'Select video sorce from dropdown, Default is YouTube',
							'tooltip'     => 'You must Select Video Sorce To add Videos in Gallery',
						),
						//Youtube Video Field
						array(
							"type"        => "textfield",
							"heading"     => __( "YouTube Video Link", "prime_vc" ),
							"param_name"  => "yvid",
							"dependency"  => array( 'element' => "vsorce", 'value' => 'youtube' ),
							//"admin_label" => true,
							"value"       => "https://www.youtube.com/watch?v=RVYU9Be2RtA",
							"description" => __( "Enter your Video URL Here. Example: https://www.youtube.com/watch?v=RVYU9Be2RtA or https://youtu.be/RVYU9Be2RtA ", "prime_vc" ),
						),

						//Vimeo Video Field
						array(
							"type"        => "textfield",
							"heading"     => __( "Vimeo Video Link <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro Version</a>", "prime_vc" ),
							"param_name"  => "vvid",
							"dependency"  => array( 'element' => "vsorce", 'value' => 'vimeo' ),
							//"admin_label" => true,
							"value"       => "https://vimeo.com/180762758",
							"description" => __( "Enter your Video URL Here. Example: https://vimeo.com/180762758", "prime_vc" ),
						),

						//DailyMotion Video Field
						array(
							"type"        => "textfield",
							"heading"     => __( "DailyMotion Video Link <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro Version</a>", "prime_vc" ),
							"param_name"  => "dvid",
							"dependency"  => array( 'element' => "vsorce", 'value' => 'dailymotion' ),
							//"admin_label" => true,
							"value"       => "http://www.dailymotion.com/video/x531pkv_operation-titan",
							"description" => __( "Enter your Video URL Here. Example: http://www.dailymotion.com/video/x531pkv_operation-titan-kourou-17-novembre-2016_news", "prime_vc" ),
						),
						//HTML 5 Video Field
						array(
							"type"        => "textfield",
							"heading"     => __( "HTML5 Video Link <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro Version</a>", "prime_vc" ),
							"param_name"  => "hvid",
							"dependency"  => array( 'element' => "vsorce", 'value' => 'html5' ),
							//"admin_label" => true,
							"value"       => "https://media.w3.org/2010/05/sintel/trailer.mp4",
							"description" => __( "Enter Video URL Here. Example: https://media.w3.org/2010/05/sintel/trailer.mp4, support Format: mp4, WebM, OGG", "prime_vc" ),
						),

						array(
							"type"        => "textfield",
							"heading"     => __( "Video Title", "prime_vc" ),
							"param_name"  => "vtitle",
							"description" => __( "Enter your Video Title Here. if you don't need Title please leave this Blank", "prime_vc" ),
							"admin_label" => true,
						),
						array(
							"type"        => "textarea",
							"heading"     => __( "Description", "prime_vc" ),
							"param_name"  => "vdescr",
							"description" => __( "Enter your Video Description Here. if you don't need Description please leave this Blank", "prime_vc" ),
						),
					),
					'callbacks'  => array(
						'after_add' => 'vcChartParamAfterAddCallback',
					),
				),


			),
		) );
	}


	function Prime_videoGallery_shortcode_function( $atts, $content = null, $tag ) {
		extract( shortcode_atts( array(
			'voptions' => '',
			'yvid'     => '',
			'vvid'     => '',
			'dvid'     => '',
			'hvid'     => '',
			'vtitle'   => '',
			'vdescr'   => '',
			'vsorce'   => '',
		), $atts ) );

		$path = plugin_dir_url( dirname( __FILE__, 2 ) );

		wp_register_script( 'speedvault', $path . 'assets/js/speedvault.min.js', array( 'jquery' ), '1.1', true );
		wp_enqueue_script( 'speedvault' );

		$options = json_decode( urldecode( $voptions ) );
		$output  = '';
		$output  .= '<ul id="primeList">';
		foreach ( $options as $item ) {

			$title  = ( isset( $item->vtitle ) ? $item->vtitle : "" );
			$descr  = ( isset( $item->vdescr ) ? $item->vdescr : "" );
			$vsorce = ( isset( $item->vsorce ) ? $item->vsorce : "" );

			//Video ID
			switch ( $vsorce ) {
				case "youtube":
					$link = $item->yvid;
					break;
				case "vimeo":
					$link = $item->vvid;
					break;
				case "dailymotion":
					$link = $item->dvid;

					break;
				default:
					$link = $item->yvid;
			}
			// Youtube ID
			if ( $vsorce == "youtube" ) {
				preg_match( "#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)(\w+)#", $link, $match );
				$yid = $match[2];
			}
			// Vimeo ID
			if ( $vsorce == "vimeo" ) {
				preg_match( "/https?:\/\/(?:www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $link, $match );
				$vid = $match[3];

			}

			//Daily ID
			if ( $vsorce == "dailymotion" ) {
				preg_match( '!^.+dailymotion\.com/(video|hub)/([^_]+)[^#]*(#video=([^_&]+))?|(dai\.ly/([^_]+))!', $link, $match );


				if ( ! empty( $match[6] ) ) {
					$did = $match[6];
				}
				if ( ! empty( $match[4] ) ) {
					$did = $match[4];
					echo "number 4";
					exit();
				}
				if ( ! empty( $match[2] ) ) {
					$did = $match[2];
				}
			}

			// HTML5 Videmo URL
			$hvurl = $item->hvid;


			// Get Title From DailyMotion
			/*$hash = json_decode(file_get_contents("http://www.dailymotion.com/services/oembed?format=json&url=http://www.dailymotion.com/embed/video/$did"), true);
			$hash['title'];
			$dtitle = $hash['title'];*/


			if ( $vsorce == "youtube" ) {
				$output .= '<li class="primeThumb prime-youtube" data-videoID="' . $yid . '">
			<div class="primepre-title">' . $title . '</div>
			<div class="primepre-desc">
			' . $descr . '
			</div>
			</li>';
			} elseif ( $vsorce == "vimeo" ) {
				$output .= '<h2>Vimeo Video - <a target="_blank" href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/">Pro Version Only</a></h2>';
			} elseif ( $vsorce == "dailymotion" ) {
				$output .= '<h2>Dailymotion Video - <a target="_blank" href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/">Pro Version Only</a></h2>';
			} elseif ( $vsorce == "html5" ) {
				$output .= '<h2>Html5 Video - <a target="_blank" href="https://codecans.com/items/prime-extensions-for-visual-composer-pro/">Pro Version Only</a></h2>';
			}
		}

		$output .= '</ul>';

		return $output;
	}
}