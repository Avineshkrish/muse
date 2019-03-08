<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions\ImageHotspot;


use Inc\Base\ExtensionsController;

class ImageHotspot extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'image_hotspot' ) ) {
			return;
		}
		require_once "prime-hotspot.php";

	}
}