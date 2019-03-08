<?php
/**
 * @package  PrimeExtVc
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController {
	public function checkboxSanitize( $input ) {
		$output = array();
		foreach ( $this->shortcodes as $key => $value ) {
			$output[ $key ] = isset( $input[ $key ] ) ? true : false;
		}

		return $output;
	}

	public function adminSectionManager() {
		echo "";
		//echo 'Manage the Addons of this Plugin by activating the checkboxes from the following list.';
	}

	public function checkboxField( $args ) {
		$name        = $args['label_for'];
		$classes     = $args['class'];
		$option_name = $args['option_name'];
		$checkbox    = get_option( $option_name );

		$checked     = isset( $checkbox[ $name ] ) ? ( $checkbox[ $name ] ? true : false ) : false;

		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="checkbox" ' . ( $checked ? 'checked' : '' ) . '>
		<label for="' . $name . '"><div></div></label></div>';
	}
}