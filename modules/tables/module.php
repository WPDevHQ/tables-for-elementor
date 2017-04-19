<?php
namespace ElementorTables\Modules\Tables;

use Elementor\Plugin;
use ElementorTables\Base\Module_Base;

class Module extends Module_Base {

	public function __construct() {
		parent::__construct();

		//$this->add_actions();
	}
	
	public function get_name() {
		return 'elementor-tables';
	}

	public function get_widgets() {
		return [
			'Table_Standard', // What is it goes here.
		];
	}
	
}