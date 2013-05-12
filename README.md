# WordPress Plugin Boilerplate

The WordPress Plugin Boilerplate serves as a foundation and aims to provide a clear and consistent guide for building your WordPress plugins.

## Features

* The Plugin Boilerplate is fully-based on the WordPress [Plugin API](http://codex.wordpress.org/Plugin_API)
* Uses [PHPDoc](http://en.wikipedia.org/wiki/PHPDoc) conventions for easily following the code
* Liberal use of `TODO` to guide you through what you need to change
* Uses a strict file organization scheme to make sure the assets are easily maintainable
* Note that this boilerplate uses `plugin.po` to provide a translation file. This is compatible with [POEdit](http://www.poedit.net/)

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

## A Note About Licensing

The WordPress Plugin Boilerplate is licensed under the GPL2+ or later; however, if you opt to use third-party frameworks
such as [Bootstrap](http://twitter.github.io/bootstrap/) in your work, then you should be aware of this:

> The most likely occurrence of this issue is with Themes developed using Twitter Bootstrap. When reviewing such Themes, please be sure to check that, if the Theme is licensed under GPL, that the license specifies either unversioned GPL, or GPLv3.0.

For reference, [here's the full conversation](http://make.wordpress.org/themes/2013/03/04/licensing-note-apache-and-gpl/).
