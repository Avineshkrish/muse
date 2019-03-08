<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Base;

class ExtensionsController {
	public function activated( $key ) {
		$option = get_option( 'prime_vc' );

		return isset( $option[ $key ] ) ? $option[ $key ] : false;
	}
}