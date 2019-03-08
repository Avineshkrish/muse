<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions;


use Inc\Base\ExtensionsController;

class UndoRedo extends ExtensionsController {
	public function extensions_register() {
		if ( ! $this->activated( 'undoredo' ) ) {
			return;
		}
		add_action( 'admin_enqueue_scripts', array( $this, 'undoRedo' ) );
	}

	public function undoRedo() {
		$path = plugin_dir_url( dirname( __FILE__, 2 ) );

		wp_enqueue_script( 'prime-undo-redo', $path . 'assets/js/undo.redo.min.js', array( 'jquery' ), '', true );

	}


}