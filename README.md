# WordPress Plugin Boilerplate

A standardized, organized, object-oriented foundation for building high-quality
WordPress plugins.

---

## Contents

The WordPress Plugin Boilerplate includes the following files:

- `.gitignore`  
  Used to exclude certain files from the repository.

- `CHANGELOG.md`  
  Contains the list of changes made to the core project.

- `README.md`  
  The file you are currently reading.

- `plugin-name/`  
  A directory that contains the source code for a fully executable WordPress plugin.

---

## Features

The Boilerplate is based on WordPress Plugin API, Coding Standards, and
Documentation Standards.

- All classes, functions, and variables are documented to make customization easier.
- Uses a strict file organization scheme that aligns with the WordPress Plugin
  Repository structure.
- Includes a `.pot` file as a starting point for plugin internationalization.

---

## Installation

The Boilerplate can be installed directly into your plugins folder **as-is**.
Before using it in a real project, you should rename the files and classes to
match your plugin’s name.

For example, if your plugin is named `example-me`, update the following:

- Rename files from `plugin-name` to `example-me`
- Change `plugin_name` to `example_me`
- Change `plugin-name` to `example-me`
- Change `Plugin_Name` to `Example_Me`
- Change `PLUGIN_NAME_` to `EXAMPLE_ME_`

At this point, it is safe to activate the plugin. Since the Boilerplate does not
include functionality by default, no menu items, meta boxes, or custom post types
will appear until code is added.

---

## WordPress.org Preparation

The original launch of this version of the Boilerplate included the folder
structure required for WordPress.org plugins. That structure has since been
moved to a separate repository:

https://github.com/DevinVinson/Plugin-Directory-Boilerplate

---

## Recommended Tools

### Internationalization (i18n) Tools

The Boilerplate uses a variable to store the text domain for internationalizing
strings. The following tools are recommended for generating translatable files:

- Poedit
- makepot
- i18n

Any of these tools can be used to properly internationalize the plugin.

---

## License

The WordPress Plugin Boilerplate is licensed under **GPL v2 or later**.

This program is free software; you can redistribute it and/or modify it under
the terms of the GNU General Public License, version 2, as published by the Free
Software Foundation.

This program is distributed in the hope that it will be useful, but **WITHOUT
ANY WARRANTY**; without even the implied warranty of MERCHANTABILITY or FITNESS
FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this
program. If not, write to the Free Software Foundation, Inc.,  
51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.

A copy of the license is included in the root of the plugin’s directory as
`LICENSE`.

---

## Important Notes

### Licensing

If you include third-party code that is not compatible with GPL v2, you may need
to use GPL v3 compatible alternatives. Refer to relevant license documentation
before including external libraries.

---

## Includes

When adding your own classes or third-party libraries, files should be placed in
one of the following locations:

- `plugin-name/includes`  
  Shared functionality between admin and public-facing areas.

- `plugin-name/admin`  
  Admin-specific functionality.

- `plugin-name/public`  
  Public-facing functionality.

Note: Earlier versions of the Boilerplate did not include `Plugin_Name_Loader`.
This class is now used to register all filters and actions with WordPress.

---

## What About Other Features?

Previous versions of the Boilerplate included support for tools such as GitHub
Updater, Grunt, and Composer.

These tools are intentionally excluded from the core to keep the Boilerplate
lightweight. Additional features may be introduced in separate editions and
maintained on the project homepage.

---

## Credits

The WordPress Plugin Boilerplate was started in 2011 by **Tom McFarlin** and was
handed over to **Devin Vinson** in 2015.

The current version was developed with contributions from:

- Josh Eaton
- Ulrich Pogson
- Brad Vincent

Design credits:
- Homepage design by HTML5Up
- Boilerplate logo by Rob McCaskill (BungaWeb)
- Favicon by Mickey Kay

---

## Documentation, FAQs, and More

If you are interested in contributing documentation or writing tutorials,
feel free to reach out or open a pull request.
