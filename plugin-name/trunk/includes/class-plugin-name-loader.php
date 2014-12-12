<?php

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @since      1.0.0
 * @package    Wbb_Powerflower
 * @subpackage Wbb_Powerflower/includes
 * @author     Adrian <adrian@example.com>
 */
class Plugin_Name_Loader
{

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array $actions The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array $filters The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $filters;


	/**
	 * The array of shortcodes registered with WordPress.
	 *
	 * @access   protected
	 * @var      array $short_codes The shortcodes registered with WordPress to fire when the plugin loads.
	 */
	protected $short_codes;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct ()
	{

		$this->actions = array();

		$this->filters = array();

		$this->short_codes = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @var      string $hook      The name of the WordPress action that is being registered.
	 * @var      object $component A reference to the instance of the object on which the action is defined.
	 * @var      string $callback  The name of the function definition on the $component.
	 * @var      int      Optional    $priority         The priority at which the function should be fired.
	 * @var      int      Optional    $accepted_args    The number of arguments that should be passed to the $callback.
	 */
	public function add_action ( $hook , $component , $callback , $priority = 10 , $accepted_args = 1 )
	{
		$this->actions = $this->add ( $this->actions , $hook , $component , $callback , $priority , $accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array  $hooks     The collection of hooks that is being registered (that is, actions or filters).
	 * @var      string $hook      The name of the WordPress filter that is being registered.
	 * @var      object $component A reference to the instance of the object on which the filter is defined.
	 * @var      string $callback  The name of the function definition on the $component.
	 * @var      int      Optional    $priority         The priority at which the function should be fired.
	 * @var      int      Optional    $accepted_args    The number of arguments that should be passed to the $callback.
	 * @return   type                                   The collection of actions and filters registered with WordPress.
	 */
	private function add ( $hooks , $hook , $component , $callback , $priority , $accepted_args )
	{

		$hooks[ ] = array(
			'hook'          => $hook ,
			'component'     => $component ,
			'callback'      => $callback ,
			'priority'      => $priority ,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @var      string $hook      The name of the WordPress filter that is being registered.
	 * @var      object $component A reference to the instance of the object on which the filter is defined.
	 * @var      string $callback  The name of the function definition on the $component.
	 * @var      int      Optional    $priority         The priority at which the function should be fired.
	 * @var      int      Optional    $accepted_args    The number of arguments that should be passed to the $callback.
	 */
	public function add_filter ( $hook , $component , $callback , $priority = 10 , $accepted_args = 1 )
	{
		$this->filters = $this->add ( $this->filters , $hook , $component , $callback , $priority , $accepted_args );
	}

	/**
	 *  Add a short code to the collection to be registered with WordPress.
	 *
	 * @var string $shortcode_name the shortcode name (the string used in a post body)
	 * @var object $component      A reference to the instance of the object on which the filter is defined.
	 * @var string $callback       The name of the function definition on the $component.
	 */
	public function add_shortcode ( $shortcode_name , $component , $callback )
	{
		$this->short_codes = $this->add ( $this->short_codes , $shortcode_name , $component , $callback , NULL , NULL );
	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run ()
	{

		foreach ( $this->filters as $hook )
		{
			add_filter ( $hook[ 'hook' ] , array(
				$hook[ 'component' ] ,
				$hook[ 'callback' ]
			) , $hook[ 'priority' ] , $hook[ 'accepted_args' ] );
		}

		foreach ( $this->actions as $hook )
		{
			add_action ( $hook[ 'hook' ] , array(
				$hook[ 'component' ] ,
				$hook[ 'callback' ]
			) , $hook[ 'priority' ] , $hook[ 'accepted_args' ] );
		}

		foreach ( $this->short_codes as $hook )
		{
			add_shortcode ( $hook[ 'hook' ] , array(
				$hook[ 'component' ] ,
				$hook[ 'callback' ]
			) );
		}

	}

}
