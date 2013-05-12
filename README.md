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

## Important Notes

### Licensing

The WordPress Plugin Boilerplate is licensed under the GPL2+ or later; however, if you opt to use third-party frameworks
such as [Bootstrap](http://twitter.github.io/bootstrap/) in your work, then you should be aware of this:

> The most likely occurrence of this issue is with Themes developed using Twitter Bootstrap. When reviewing such Themes, please be sure to check that, if the Theme is licensed under GPL, that the license specifies either unversioned GPL, or GPLv3.0.

For reference, [here's the full conversation](http://make.wordpress.org/themes/2013/03/04/licensing-note-apache-and-gpl/).

## Assets

The assets directory provides two files that are used to represent plugin header images.

When committing your work to the WordPress Plugin Repository, these files should reside in their own `assets` directory, not in the root of the plugin. The initaly repository will contain three directories:

1. `branches`
2. `tags`
3. `trunk`

You'll need to add an `assets` directory into the root of the repository. So the final directory structure should include *four* directories:

1. `assets`
2. `branches`
3. `tags`
4. `trunk`

Next, copy the contents of the `assets` directory that are bundled with the Boilerplate into the root of the repository. This is how the WordPress Plugin Repository will retrieving the plugin header image.

Of course, you'll want to customize the header images from the place holders that are provided with the boilerplate.

For more, in-depth information about this, read [this post](http://make.wordpress.org/plugins/2012/09/13/last-december-we-added-header-images-to-the/) by Otto.
