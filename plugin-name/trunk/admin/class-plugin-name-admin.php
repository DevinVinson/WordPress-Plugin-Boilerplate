<?php

/**
 * @TODO
 * Define a short description for what this class does.
 *
 * @since   x.x.x
 * @package TODO
 */

/**
 * @TODO
 * Define a short description for what this class does.
 *
 * Define a longer description for the purpose of this class.
 *
 * @package   TODO
 * @author    Your Name <your@email.com>
 * @license   GPL-2.0+
 * @link      URL
 * @copyright 2014 Your Name of Your Company Name
 */
class Plugin_Name_Admin {

	/**
	 * @TODO
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @link     URL
	 * @param    integer    $post_id    The ID of the post that will be saved.
	 */
	public function save_post( $post_id ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	}

	/**
	 * @TODO
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @link     URL
	 * @param    string    $content    The content for the post type that's being filtered.
	 * @return   string                The modified version of the post content.
	 */
	public function update_the_content( $content ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		return $content;

	}

}
