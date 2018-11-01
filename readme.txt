=== Responsive Content ===
Contributors: senlin
Tags: responsive, content, classes, tablet, smartphone, phone, mobile, desktop, laptop, ipad, iphone, android
Donate link: https://so-wp.com/donations
Requires at least: 4.0
Tested up to: 5.0
Stable tag: 20181.2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

With the Responsive Content plugin you can easily adjust the length of your content for different devices by making use of visibility classes.

== Description ==

For sites that have been built Responsive, this plugin will enable you to adjust your content too. On mobile devices like smart phones people are less likely to read very long pages of content and with the Responsive Content plugin you can easily adjust the text showing on these different devices.

The Responsive Content plugin adds a Formats drop down menu (pre WP 3.9 the menu is called "Styles") to the first line of the TinyMCE Editor. Once you have selected a visibility class, the plugin shows that in 3 locations:

1. as selected in the drop down menu
2. with a "button" in front of the selector (the only function of this "button" is to show you that the element behind it has one of the visibility classes)
3. in the path

There are 15 visibility classes in the Styles menu on the Visual Editor:

* 6 for paragraphs (3 to show and 3 to hide)
* 3 for links (only to show as hiding can be done with the inline classes below)
* 6 for spans (3 to show and 3 to hide)

Since version 0.3 I have added 6 buttons to the Text Editor as well. For flexibility purposes these buttons (3 for showing and 3 for hiding) only add a class, so you can add the element yourself.

The plugin already comes with all the styles necessary to show the elements on or hide them from the front end, so all you need to do is save your Post, Page or other Post Type and visit your site from a few different devices (or resize your browser) to see your content change depending on the width of the browser!

Under the [Other Notes](https://wordpress.org/plugins/so-visibility-classes/other_notes/)-tab I have added some information on Usage and Languages.

== Installation ==

Go to **Plugins > Add New** in your WordPress Dashboard, do a search for "Responsive Content" and install it.

 &hellip; OR &hellip;

Follow these steps:

1. Download zip file.
2. Upload the zip file via the Plugins > Add New > Upload page &hellip; OR &hellip; unpack and upload with your favorite FTP client to the /plugins/ folder.
3. Activate the plugin on the Plugins page.

Done!

Now visit the Instructions page to see what you need to know to use this plugin.

== Frequently Asked Questions ==

= Is this plugin compatible with Gutenberg? =

The plugin works on WP 5.0, but only by using the [Classic Editor](https://wordpress.org/plugins/classic-editor-addon/). The new WP Editor no longer uses TinyMCE and therefore this plugin does not function in the new (Gutenberg) editor.

= Is it possible to hide shortcodes with this plugin?

As reported [here](https://github.com/senlin/so-responsive-content/issues/2) it is not possible to hide shortcodes in the WP Editor. A workaround can be to add the code to your template (sample in the ticket), but that largely depends on what you want to show/hide.

= I have an issue with this plugin, where can I get support? =

Please open an issue over at [Github](https://github.com/senlin/so-responsive-content/issues/new), as **I will not use the support forums** here on WordPress.org

== Other Notes ==

= Usage =

You can use the Responsive Content plugin basically for any Post Type.

Although possible, **I strongly discourage** using the classes with images. The reason is that the Responsive Content plugin only uses media queries with `display: block;`, `display: inline-block;` and `display: none;`. If you were to add a large image to only show on large screens, a medium image to show on tablets and a small image to show on smart phones, then the person visiting your site using a phone has to download all 3 images, which can have a major impact on the data plan of the visitor!

== Screenshots ==
1. Responsive Content back end Visual Editor pre WP 3.9.
2. Responsive Content back end Visual Editor post WP 3.9.
3. Responsive Content back end Text Editor.
4. Responsive Content front end large (>1280px).
5. Responsive Content front end medium (>768px <1280px).
6. Responsive Content front end small (<768px).

== Changelog ==

= 20181.2.0 =

* add condition that checks for higher than WP 4.9.8 and then displays a warning notice that the Classic Editor plugin needs to be installed to continue using the Responsive Content plugin.
* add a condition that checks whether ClassicPress has been installed and if it is a sentence is shown that the Responsive Content plugin also works on ClassicPress.
* removed SO icon on Settings page

= 20171.1.0 =

* attempt to revert to Semantic Versioning

= 2017.5.11 =

* tested up to WP 4.8
* some CSS changes on Settings page

= 2016.11.29 =

* tested up to WP 4.7
* remove version check

= 2016.08.13 =

* tested up to WP 4.6

= 2015.08.12 =

* TWEAK: header settings page; only showed half logo after 2015.08.05 update

= 2015.08.05 =

* changed header settings page to h1 (https://make.wordpress.org/plugins/2015/08/03/4-3-change-to-plugin-dashboard-pages/)
* show 4.3 compatibility

= 2015.04.09 =

* changed logos
* new banner image for WP.org Repo by [Oliver Berghold](https://unsplash.com/oliverberghold)

= 2014.07.30 =

* bump minimum required WP version up to 3.8
* tested up to 4.0-beta-2

= 2014.04.10 =

* compatible with TinyMCE 4.x
* added different instructions/images for WP pre/post 3.9
* additional screenshot of Formats dropdown for WP post 3.9
* updated language files

= 2013.12.27 =

* change px for em in frontend stylesheet (css/style.css) and make it more precise
* change version number format
* change links to reflect new [SO WP website](http://so-wp.com)
* tested up to WP 3.9-alpha

= 0.3.3 =

* add Serbian translation files (thank you Borisa Djuraskovic)
* add settings stylesheet to replace inline styling settings page
* move stylesheets to separate directory (css)

= 0.3.2 =

* change text domain to prepare for language packs (via Otto - http://otto42.com/el)

= 0.3.1 =
* update language files

= 0.3 =
* make correction to version check function to actually output the correct plugin name
* enhance styling: when class is inside a paragraph `display: block;` should be `display: inline-block;`
* 3 additional styles for links
* 6 additional styles for inline text (in `<span>`s)
* 6 additional styles for the text editor

= 0.2 =
* name change to Responsive Content (from SO Visibility Classes)
* update readme files with new name
* update language files with new name
* tested up to 3.7

= 0.1.1 =
* Change color coding visual editor styles to button-like text before the selected content

= 0.1 =
* Initial release on Github.

== Upgrade Notice ==
= 0.3.1 =
* Additional Classes for Visual Editor and now also classes for Text Editor.

= 0.1 =
* Initial release.