Responsive Content
=====================

[![plugin version](https://img.shields.io/wordpress/plugin/v/so-visibility-classes.svg)](https://wordpress.org/plugins/so-visibility-classes)

###### Last updated on November 9, 2018
###### requires at least WordPress 4.0
###### tested up to WordPress 5.0
###### tested up to ClassicPress 1.0.0
###### Author: [Pieter Bos](https://github.com/senlin)
###### [Stable Version](https://wordpress.org/plugins/so-visibility-classes) (via WordPress Plugins Repository)
###### [Plugin homepage](https://so-wp.com/plugin/responsive-content)

This plugin enables you to show/hide content depending on the device the visitor is browsing from.

More information about Background, Implementation and Usage available via the [Wiki](https://github.com/senlin/so-responsive-content/wiki/_pages)

## Frequently Asked Questions

### Is this plugin compatible with the new editor of WP 5.0 (codenamed Gutenberg)?

The plugin works on WP 5.0, but only on a Classic Block. Alternatively we would like to suggest to either using the [Classic Editor](https://wordpress.org/plugins/classic-editor-addon/) or to install [ClassicPress](https://www.classicpress.net) once it is released.

### I have an issue with this plugin, where can I get support?

Please open an issue here on [Github](https://github.com/senlin/so-responsive-content/issues)

## Known Issues

As reported [here](https://github.com/senlin/so-responsive-content/issues/2) it is not possible to hide shortcodes with the plugin.

## Contributions

This repo is open to _any_ kind of contributions.

## License

* License: GNU Version 2 or Any Later Version
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Donations

* Donate link: https://so-wp.com/donations

## Connect with me through

[BHI Consulting for Websites](https://bohanintl.com)

[SO WP](https://so-wp.com)

[Github](https://github.com/senlin) 

[LinkedIn](https://www.linkedin.com/in/pieterbos83/) 

[WordPress](https://profiles.wordpress.org/senlin/) 

## Changelog

### 1.2.1

* November 9, 2018
* plugin actually works with WP 5.0, but only with Classic Block, change readme to reflect that
* re-code admin notices and make them dismissible
* rewrite/cleaning up/updates here and there
* WP.org version: 20181.2.1

### 1.2.0

* November 1, 2018
* add condition that checks for higher than WP 4.9.8 and then displays a warning notice that the Classic Editor plugin needs to be installed to continue using the Responsive Content plugin.
* add a condition that checks whether ClassicPress has been installed and if it is a sentence is shown that the Responsive Content plugin also works on ClassicPress.
* removed SO icon on Settings page
* WP.org version: 20181.2.0

### 1.1.0 (2017.5.11)

* attempt to revert WP.org plugin to Semantic Versioning
* WP.org version: 20171.1.0

### 1.0.10 (2017.5.11)

* tested up to WP 4.8
* some CSS changes on Settings page

### 1.0.9 (2016.11.29)

* tested up to WP 4.7
* remove version check

### 1.0.8 (2016.08.13)

* tested up to WP 4.6

### 1.0.7 (2015.08.12)

* TWEAK: header settings page; only showed half logo after 2015.08.05 update
* revert Github version to [semantic versioning](http://semver.org)

### 1.0.6 (015.08.05)

* changed header settings page to h1 (https://make.wordpress.org/plugins/2015/08/03/4-3-change-to-plugin-dashboard-pages/)
* show 4.3 compatibility

### 1.0.5 (2015.04.09)

* changed logos
* new banner image for WP.org Repo by [Oliver Berghold](https://unsplash.com/oliverberghold)

### 1.0.4 (2014.07.30)

* bump minimum required WP version up to 3.8
* tested up to 4.0-beta-2

### 1.0.3 (2014.04.10)

* compatible with TinyMCE 4.x
* added different instructions/images for WP pre/post 3.9
* additional screenshot of Formats dropdown for WP post 3.9
* updated language files

### 1.0.2 (2014.1.20)

* run test for WP 3.9 release due to upgrade to TinyMCE 4.x

### 1.0.1 (2013.12.27)

* change px for em in frontend stylesheet (css/style.css) and make it more precise
* change version number format
* change links to reflect new [SO WP website](http://so-wp.com)
* tested up to WP 3.9-alpha

### 1.0.0 (0.3.3)

* add Serbian translation files (thank you Borisa Djuraskovic)
* add settings stylesheet to replace inline styling settings page
* move stylesheets to separate directory (css)

### 0.3.2

* change text domain to prepare for language packs (via Otto - http://otto42.com/el)

### 0.3.1

* update language files

### 0.3

* make correction to version check function to actually output the correct plugin name
* enhance styling: when class is inside a paragraph `display: block;` should be `display: inline-block;`
* 3 additional styles for links
* 6 additional styles for inline text (in `<span>`s)
* 6 additional styles for the text editor

### 0.2

* name change to Responsive Content (from SO Visibility Classes)
* update readme files with new name
* update language files with new name
* tested up to 3.7

### 0.1.1

* Change color coding visual editor styles to button-like text before the selected content

### 0.1

* First stable release
