<?php
/**
 * @package  PrimeExtVc
 */

namespace Inc\Base;
use Inc\Extensions\Params\SwitchParam;
use Inc\Extensions\Params\NoticeParam;
use Inc\Extensions\Params\RadioParam;

class Params {
	public $switchparams;

	public function register() {
		 new SwitchParam();
		 new NoticeParam();
		 new RadioParam();
		 //new SliderParam();
	}
}