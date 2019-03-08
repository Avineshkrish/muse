<?php
///**
// * @package  PrimeExtVc
// */
//namespace Inc\Extensions\Params;
//
//class SliderParam {
//	public $plugin_url;
//
//	public function __construct() {
//
//		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 3 ) );
//
//		vc_add_shortcode_param( 'prime_slider', array( $this, 'prime_slider_range_settings' ) );
//
//		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
//	}
//
//
//	public function prime_slider_range_settings( $settings, $value ) {
//		$defaults = array(
//			'min'        => 0,
//			'max'        => 100,
//			'step'       => 1,
//			'value'      => 0,
//			'unit'       => '',
//			'fill'       => true,
//			'hide_input' => false,
//		);
//		$settings = wp_parse_args( $settings, $defaults );
//		$value    = $value == null ? $settings['value'] : $value;
//
//		$slider = '<div class="prime-vc-slider' . ( $settings['hide_input'] ? ' prime-hide-input' : '' ) . ( $settings['fill'] ? ' prime-fill' : '' ) . '">';
//		$slider .= '<div class="prime-slider" data-min="' . esc_attr( $settings['min'] ) . '" data-max="' . esc_attr( $settings['max'] ) . '" data-step="' . esc_attr( $settings['step'] ) . '" data-value="' . esc_attr( $value ) . '"></div>';
//		$slider .= '</div>';
//
//		$input = '<input class="prime-value wpb_vc_param_value wpb-input ' . esc_attr( $settings['param_name'] ) . '" name="' . esc_attr( $settings['param_name'] ) . '" value="' . esc_attr( $value ) . '" type="text" />';
//
//		$unit = $settings['unit'] != '' ? '<span class="prime-unit">' . $settings['unit'] . '</span>' : '';
//
//		return '<div class="prime-slider-wrap">' . $slider . $unit . $input . '</div>';
//	}
//
//
//	public function admin_enqueue() {
//		//admin enqueue scripts
//		wp_enqueue_script( 'param-slider-js', $this->plugin_url . 'assets/js/sliderparam.js', array( 'jquery' ), '', false );
//
//	}
//}