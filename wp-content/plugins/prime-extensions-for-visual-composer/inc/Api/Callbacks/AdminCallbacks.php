<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}


	public function alecadddOptionsGroup( $input )
	{
		return $input;
	}
}