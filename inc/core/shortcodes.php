<?php
class Sm_Shortcodes {
	static $tabs = array();
	static $tab_count = 0;

	function __construct() {}

}

new Sm_Shortcodes;

class Shortcodes_Master_Shortcodes extends Sm_Shortcodes {
	function __construct() {
		parent::__construct();
	}
}
