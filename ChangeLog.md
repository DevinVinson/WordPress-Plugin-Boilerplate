## 2.6.0 (TBD)

* Merging changes from the previous, untagged version, into this version
* Removing left over files from the plguin root
* Moving all public-specific functionality into the public subdirectory
* Moving all admin-specific functionality into the admin subdirectory
* Loading the admin class only if the dashboard is being loaded
* Added a TODO for Plugin_Name::Version (grappler)
* Replacine plugin-name with plugin_slug and removed a TODO (grappler)
* Added a 'TODO' to prmpt the user to change the plugin name (haleeben)
* Updating the class-plugin-name.admin.php (will83)
* Updating references to the languages directory
* Update plugin-name.post (grappler)
* Including more information about the GitHub Upater
* Updating the read me to include the new features of the boilerplate
* Adding whitespace between the header and the markup of the views
* Removing a lot of whitespace, updating function comments, and comment blocks within a function, and making sure no comments exceed 80 characters
* Adding a 'TODO' so users can more easily find where all they need to supply the name of their plugin
* Update README.txt (grappler)
* Defining a section to provide links for recommended tools
* Adding a 'GitHub Plugin URI' to the wordpress-plugin header
* Updating the javascript to include more whitespace as per the WordPress JavaScript Coding Standards
* Update inline documentation (grappler)
* Add admin class (grappler)
* Update $plugin_slug comment (barryceelen)
* Place options page under 'Settings' in stead of 'Plugins' menu (barryceelen)
* Replace plugin-name with $this->plugin_slug in add_action_links (barryceelen)
* Removes 'Change 'plugin-name' to the name of your plugin' from DocBlock (barryceelen)
* Mention uninstall.php in code comment (barryceelen)
* Removes reference to register_uninstall_hook from code comment (barryceelen)
* Initialize plugin on plugins_loaded hook (barryceelen)
* Change default capability to 'manage_options' (nextgenthemes)
* Make WP_LANG_DIR constant safer (GaryJones)
* Replacing `$this->version` by the new class constant (GeertDD)
* Update activate_new_site did_action to become Yoda condition (thuijssoon)
* Fix typo and move add_filter under menu add_action (Grappler)
* Storing plugin version in a class constant (GeertDD)
* Removing useless closing php tags (GeertDD)
* Fix loading textdomain when the plugin is symlinked (andrejcremoznik)
* Fix typo (grappler)
* Add action link to plugin page (grappler)
* Replacing all instances of PluginName with PluginName as per the WordPress Coding Standards
* Added multisite activation/deactivation functionality. (thuijssoon)
* Adding index.php with silence is golden security method (danielantunes)
* Added empty array for dependency to fix version number. (tokkonopapa)
* Updating `PluginName` to `Plugin_Name` to follow the WordPress Coding Standards
* Removing some whitespace in the first line of the README file
* Removing an unnecessary apostrophe from the Boilerplate README.txt

## 2.5.1 (17 May 2013)

* Updating a reference to the plugin slug

## 2.5.0 (16 May 2013)

* Updating `readme.txt` to be up to standard with the current WordPress Plugin Repository demo
* Updating page-level DocBlocks for consistency

## 2.4.0 (15 May 2013)

* Renaming and updating references in the pot file to match the new file names
* Renaming all `display` files to `public` (i.e., `display.js` to `public.js`)
* Updating references in comments and in code to the plugin class files and plugin files
* Updating the way the plugin terminates execution if accessed directly
* Updating code comments, clearing extraneous whitespace
* Renaming files to be more consistent with the example name of the plugin
* Renaming 'plugin-boilerplate' to 'plugin-name' to be more consistent with the naming conventions of the class file
* Adding a sample screenshot to match the example WordPress Plugin Repository `readme.txt`
* Removing the plugin version constant in favor of a property in the plugin class
* Adding proper page-level DocBlocks

## 2.3.0 (13 May 2013)

* Moving the activation hooks outside of the class and marking the methods as static
* Removing the @version tag from everything but the core plugin class
* Removing deprecating @subpackage tags
* Renaming the changelog filename to follow the canonical convention
* Including an `assets` directory with sample images and instructions for how to use it
* Finalized page-level documentation to the PHP files
* Moving to the plugin boilerplate to its own class
* Adding DocBlocks to the views
* Generalizing the name, language, and email address in the `.pot` file
* Updating the DocBlock in the uninstall file
* Adding the 'Domain Path' to the header of the plugin file
* Moving the changelog into its own file
* Updating GPL licensing and adding a note about licensing with the GPL and the Apache license
* Removing terminating code comments from the admin view
* Removing the localization functions from plugin page parameters
* Adding 'Text Domain' to the plugin header
* Adding gettext and plural forms to the `.pot` file
* Replacing all midline tabs and replacing them with tabs
* Removing tabs and spaces from empty lines
* Adding a security check to prevent the plugin file from being accessed directly
* Improving spacing to better comply with coding conventions
* Adding LICENSE.txt and removing it from the plugin's header

## 2.2.1 (10 May 2013)

* Updating the `.pot` file as it was resulting in a minor error in one of the translation tools.

## 2.2.0 (10 May 2013)

* Updating the README so the demo changelog is more accurate
* Renaming the core plugin file to match the name of the plugin (specifically `plugin-boilerplate.php` from `plugin.php`)
* Removing the default `.po` file and introducing the `plugin-boilerplate.pot` catalog
* Removing all terminating code block comments
* Adding braces around the `uninstall.php` conditional
* Changing access modifiers from `private` to `protected`. See [this discussion](https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/issues/36) for more details.
* Removing redundant headers since properties, constructors, and methods are clearly defined and segmented throughout the code.

## 2.1.0 (9 May 2013)

* Refactoring the ternary operator in the constructor to make the code more readable for developers and to avoid returning an orphaned object
* Updating certain function names to use verbs to be clearer in their purpose
* Updating versioning in the plugin and in the `README` to use the `x.y.z` convention rather than the `x.y` convention
* Adding class property DocBlocks
* Adding `@since` tags to each of the DocBlocks for methods
* Cleaning up the PHP code formatting for easier readability
* Adding a note about POEdit and it being used as my preferred translations
* Automatically displaying the name of the plugin admin page
* Changing 'directives' to 'tags'
* Updating page-level DocBlocks for `plugin.php` and for `uninstall.php`

## 2.0.1 (7 May 2013)

* Updating the year of the release of 2.0

## 2.0.0 (7 May 2013)

* Disabling the admin menu by default
* Initializing the attributes
* Combining the `admin_open` and `admin_close` into a single `admin` view
* Bringing some of the code up to the WordPress coding standards
* Added access modifiers for functions
* Implemented the single pattern
* **japh**. Merged upstream changes, maintained separation of uninstall functionality
* **mikkelbreum**. Restricted scripts and styles to load only on plugin settings page if it is enabled.
* **mikkelbreum**. Added the option for a plugin settings page
* **mikkelbreum**. Removed the need to customize the URL for `wp_enqueue_style` and `wp_enqueue_scripts`
* **mikkelbreum**. Corrected action book for `register_admin_styles`
* **tbwiii**. Listed jQuery as a dependency for both JavaScript sources
* **japh**. Added an `uninstall.php` placeholder
* **leewillis77**. Improved the way language files are loaded
* **wesbos**. Updated the year to 2013

## 1.0 (29 November 2012)

* Official Release

## Author Information

The WordPress Plugin Boilerplate was originally started and is maintained by [Tom McFarlin](http://twitter.com/tommcfarlin/), but is constantly under development thanks to the contributions from the many WordPress developers throughout the world.
