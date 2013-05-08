# WordPress Plugin Boilerplate

The WordPress Plugin Boilerplate serves as a foundation and aims to provide a clear and consistent guide for building your WordPress plugins. 

## Features

* The Plugin Boilerplate is fully-based on the WordPress [Plugin API](http://codex.wordpress.org/Plugin_API)
* Uses [PHPDoc](http://en.wikipedia.org/wiki/PHPDoc) conventions for easily following the code
* Liberal use of `TODO` to guide you through what you need to change
* Uses a strict file organization scheme to make sure the assets are easily maintainable

## Contents

The WordPress Plugin Boilerplate includes the following files:

* This `README`
* A subdirectory called `plugin-boilerplate`


1. Copy the `plugin-boilerplate` directory into your `wp-content/plugins` directory
2. Navigate to the *Plugins* dashboard page
3. Locate the menu item that reads *TODO*
4. Click on *Activate*

This will activate the WordPress Plugin Boilerplate. Because the Boilerplate has no real functionality, nothing will be added to WordPress; however, this demonstrates exactly how your plugin should behave as you're working with it.

If you opt to uncomment Line 77 which contains the following line:

`add_action( 'admin_menu', array( $this, 'plugin_admin_menu' ) );`

Then a new menu item will be added to the *Plugins* menu.

## License

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

> You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

## Changelog

### 2.0.1 (7 May 2013)

* Updating the year of the release of 2.0

### 2.0.0 (7 May 2013)

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

### 1.0 (29 November 2012)

* Official Release

## Author Information

The WordPress Plugin Boilerplate was originally started and is maintained by [Tom McFarlin](http://twitter.com/tommcfarlin/), but is constantly under development thanks to the contributions from the many WordPress developers throughout the world.
