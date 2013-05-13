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