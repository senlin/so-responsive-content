== SO Visibility Classes ==
Contributors: senlin
Tags: visual editor, tinymce, content, classes, responsive, browser, tablet, phone, mobile, desktop, laptop, ipad, iphone, android
Donate link: http://senl.in/PPd0na
Requires at least: 3.6
Tested up to: 3.7-RC1
Stable tag: 0.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

With the SO Visibility Classes plugin you can select classes from the Visual Editor to conditionally show elements for, or hide them from, certain browser widths.

== Description ==
Long description of this great plugin. No characters limit, and you can use markdown.

= Background Info =
The other day I was reading [an article over at wpmu.org](http://wpmu.org/is-responsive-design-holding-wordpress-back/) that asked the question whether the responsive design hype is perhaps killing the innovation in WordPress themes development.

To some extent I definitely agree that responsive should not be used as a one-size-fits-all solution. Personally I find it nice that a tablet version and a desktop version look more or less similar, but I wholeheartedly disagree that it should also look similar on smart phones and/or small tablets.

Currently theme developers still tend to work from big to small instead of embracing the [Mobile First](http://www.lukew.com/ff/entry.asp?933) approach.

On [my own website](http://senlinonline.com), which I built with [Foundation 4](http://foundation.zurb.com), I show a lot less content on small screens than I do on "the big screen". Foundation 4 has very useful classes built in to "conditionally" show content depending on the width of the browser window.

Naturally not everyone can build his or her website on Foundation, so that is the reason that I have developed the SO Visibility Classes plugin. I have taken similar classes as Foundation 4 has, but simplified things a little bit:

* show/hide for small
* show/hide for medium
* show/hide for large

*(Foundation actually uses show/hide for small, medium down, medium, medium up, large down, large, large up, xlarge)*

At first I was thinking to use shortcodes that the user can then add to the content, but a comment on the article [Dealing with shortcode madness](http://justintadlock.com/archives/2011/05/02/dealing-with-shortcode-madness#comment-335205) changed my mind. Although written more than two years ago, the solution that [Jan Fabry](http://wordpress.stackexchange.com/users/8/jan-fabry) offers in his comment fortunately still works. 

For backwards compatibility, if this section is missing, the full length of the short description will be used, and
markdown parsed.

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Link to [WordPress](http://wordpress.org/ \"Your favorite software\") and one to [Markdown\'s Syntax Documentation][markdown syntax].

Titles are optional, naturally.

Asterisks for *emphasis*.

Double it up  for **strong**.

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

== Screenshots ==
1. SO Visibility Classes back end.
2. SO Visibility Classes front end large (>1280px).
3. SO Visibility Classes front end medium (>768px <1280px).
4. SO Visibility Classes front end small (<768px).

== Changelog ==
= 0.1.1 =
* Change color coding visual editor styles to button-like text before the selected content

= 0.1 =
* Initial release.

== Upgrade Notice ==
= 0.1 =
* Initial release.