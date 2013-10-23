=== SO Visibility Classes ===
Contributors: senlin
Tags: visual editor, tinymce, content, classes, responsive, browser, tablet, phone, mobile, desktop, laptop, ipad, iphone, android
Donate link: http://senl.in/PPd0na
Requires at least: 3.6
Tested up to: 3.7-RC2
Stable tag: 0.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

With the SO Visibility Classes plugin you can select classes from the Visual Editor to conditionally show/hide elements for/from set browser widths.

== Description ==
With these classes it becomes very simple to show or hide content for these specific browser widths! As an example you can make the text on your "About" page much longer for people that visit your site using a large screen, whereas you show people on small(er) screens just the main points. On the other end of the spectrum you can make a telephone number only clickable (i.e. with a link that goes to the phone app of the device) for small screens, whereas for large screens you won't be needing a link there.

The SO Visibility Classes plugin adds a Styles drop down menu to the first line of the TinyMCE Editor. Once you have selected a visibility class, the plugin shows that in 3 locations: 

1. as selected in the drop down menu
2. with a "button" in front of the selector (the only function of this "button" is to show you that the element behind it has one of the Visibility Classes)
3. in the path

The plugin already comes with all the styles necessary to show the elements on or hide them from the front end, so all you need to do is save your Post, Page or other Post Type and visit your site from a few different devices (or resize your browser) to see your content change depending on the width of the browser!

Under the [Other Notes](http://wordpress.org/plugins/so-visibility-classes/other_notes/)-tab I have added some information on Usage and Languages.

== Installation ==

= Wordpress =

Quick installation: [Install now](http://coveredwebservices.com/wp-plugin-install/?plugin=so-visibility-classes) !

 &hellip; OR &hellip;

Search for "SO Visibility Classes" and install with the **Plugins > Add New** back-end page.

 &hellip; OR &hellip;

Follow these steps:

1. Download zip file.
2. Upload the zip file via the Plugins > Add New > Upload page &hellip; OR &hellip; unpack and upload with your favorite FTP client to the /plugins/ folder.
3. Activate the plugin on the Plug-ins page.

Done!

Now visit the Instructions page to see what you need to know to use this plugin.

== Frequently Asked Questions ==
= I have an issue with this plugin, where can I get support? =

Please open an issue over at [Github](https://github.com/so-wp/so-visibility-classes/issues/new), as **I will not use the support forums** here on WordPress.org

== Other Notes ==
= Usage =

You can use the SO Visibility Classes plugin basically for any Post Type, but it is important to know that the Styles drop down menu is only visible in the Visual Editor. Therefore if you want to use it for Custom Post Types, it is important that you don't disable the Visual Editor.

It is possible to use the classes in the Text Editor, you can have a look for yourself which classes you need to be using then.

Although possible, **I strongly discourage** using the classes with images. The reason is that the SO Visibility Classes plugin only uses media queries with `display: block;` and `display: none;`. If you were to add a large image to only show on large screens, a medium image to show on tablets and a small image to show on smart phones, then the person visiting your site using a phone has to download all 3 images, which can have a major impact on the data plan of the visitor! 

To conditionally show images it is much, much better to implement the [MobileDetect script](http://mobiledetect.net) on your site.

= Languages =

Naturally the SO Visibility Classes plugin has been fully internationalized. In the languages directory you will find the .pot file and the .po file. I already have added the Dutch translation so in that same directory you will also find the sovc-nl_NL.po and sovc-nl_NL.mo files.

The plugin only contains 26 strings, it would be a awesome if you can help me translate it into other languages!

== Screenshots ==
1. SO Visibility Classes back end.
2. SO Visibility Classes front end large (>1280px).
3. SO Visibility Classes front end medium (>768px <1280px).
4. SO Visibility Classes front end small (<768px).

== Changelog ==
= 0.1.1 =
* Change color coding visual editor styles to button-like text before the selected content

= 0.1 =
* Initial release on Github.

== Upgrade Notice ==
= 0.1 =
* Initial release.