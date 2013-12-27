=== SO Responsive Content ===
Contributors: senlin
Tags: responsive, content, visual editor, tinymce, text editor, content, classes, browser, tablet, phone, mobile, desktop, laptop, ipad, iphone, android
Donate link: http://so-wp.com/donations
Requires at least: 3.6
Tested up to: 3.9-alpha
Stable tag: 2013.12.27
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

With the SO Responsive Content plugin you can easily adjust the length of your content for different devices by making use of visibility classes.

== Description ==

For sites that have been built Responsive, this plugin will enable you to adjust your content too. On mobile devices like smart phones people are less likely to read very long pages of content and with the Responsive Content plugin you can easily adjust the text showing on these different devices.

The SO Responsive Content plugin adds a Styles drop down menu to the first line of the TinyMCE Editor. Once you have selected a visibility class, the plugin shows that in 3 locations: 

1. as selected in the drop down menu
2. with a "button" in front of the selector (the only function of this "button" is to show you that the element behind it has one of the visibility classes)
3. in the path

There are 15 visibility classes in the Styles menu on the Visual Editor:

* 6 for paragraphs (3 to show and 3 to hide)
* 3 for links (only to show as hiding can be done with the inline classes below)
* 6 for spans (3 to show and 3 to hide)

Since version 0.3 I have added 6 buttons to the Text Editor as well. For flexibility purposes these buttons (3 for showing and 3 for hiding) only add a class, so you can add the element yourself. 

The plugin already comes with all the styles necessary to show the elements on or hide them from the front end, so all you need to do is save your Post, Page or other Post Type and visit your site from a few different devices (or resize your browser) to see your content change depending on the width of the browser!

Under the [Other Notes](http://wordpress.org/plugins/so-visibility-classes/other_notes/)-tab I have added some information on Usage and Languages.

== Installation ==

= Wordpress =

Quick installation: [Install now](http://coveredwebservices.com/wp-plugin-install/?plugin=so-visibility-classes) !

 &hellip; OR &hellip;

Search for "SO Responsive Content" and install with the **Plugins > Add New** back-end page.

 &hellip; OR &hellip;

Follow these steps:

1. Download zip file.
2. Upload the zip file via the Plugins > Add New > Upload page &hellip; OR &hellip; unpack and upload with your favorite FTP client to the /plugins/ folder.
3. Activate the plugin on the Plug-ins page.

Done!

Now visit the Instructions page to see what you need to know to use this plugin.

== Frequently Asked Questions ==
= I have an issue with this plugin, where can I get support? =

Please open an issue over at [Github](https://github.com/senlin/so-responsive-content/issues/new), as **I will not use the support forums** here on WordPress.org

== Other Notes ==
= Usage =

You can use the SO Responsive Content plugin basically for any Post Type.

Although possible, **I strongly discourage** using the classes with images. The reason is that the SO Responsive Content plugin only uses media queries with `display: block;`, `display: inline-block;` and `display: none;`. If you were to add a large image to only show on large screens, a medium image to show on tablets and a small image to show on smart phones, then the person visiting your site using a phone has to download all 3 images, which can have a major impact on the data plan of the visitor! 

To conditionally show images it is much, much better to implement the [MobileDetect script](http://mobiledetect.net) on your site.

= Languages =

Naturally the SO Responsive Content plugin has been fully internationalized. In the languages directory you will find the .pot file and the .po file. I already have added the Dutch translation files.

The plugin only contains 38 strings (of which many only 1 word); it would be a awesome if you can help me translate it into other languages!

* Dutch translation (nl_NL) by [Piet Bos](http://profiles.wordpress.org/senlin/) (last updated November 28, 2013 - 0.3.3)
* Serbian translation (sr_RS) by Borisa Djuraskovic (last updated November 28, 2013 - 0.3.3)

== Screenshots ==
1. SO Responsive Content back end Visual Editor.
2. SO Responsive Content back end Text Editor.
3. SO Responsive Content front end large (>1280px).
4. SO Responsive Content front end medium (>768px <1280px).
5. SO Responsive Content front end small (<768px).

== Changelog ==

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
* name change to SO Responsive Content (from SO Visibility Classes)
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