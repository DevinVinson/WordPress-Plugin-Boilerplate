<?php

/**
 * Define a short description for what this class does (no period)
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 * @license    GPL-2.0+
 * @link       http://example.com
 * @copyright  2014 Your Name or Company Name
 * @since      1.0.0
 */

/**
 * Define a short description for what this class does.
 *
 * Define a longer description for the purpose of this class.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Loader {

	/**
	 * TODO
	 */
	protected $actions;

	/**
	 * TODO
	 */
	protected $filters;

	/**
	 * TODO
	 */
	public function __construct() {

		$this->actions = array();
		$this->filters = array();

	}

	/**
	 * TODO
	 */
	public function add_action( $hook, $component, $callback, $priority = 10 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority );
	}

	/**
	 * TODO
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback $priority );
	}

	/**
	 * TODO
	 */
	private function add( $hooks, $hook, $component, $callback, $priority ) {

		$hooks[] = array(
			'hook'      => $hook,
			'component' => $component,
			'callback'  => $callback,
			'priority'  => $priority
		);

		return $hooks;

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		/**
		 * This function is used to define the various hooks that are shared in the
		 * both the dashboard and the public-facing areas of the plugin. This is
		 * achieved via dependency injection by passing an instance of Plugin_Name
		 * into this class.
		 *
		 * TODO
		 */

		 foreach ( $this->filters as $hook ) {
			 add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'] );
		 }

		 foreach ( $this->actions as $hook ) {
			 add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'] );
		 }

	}

}
