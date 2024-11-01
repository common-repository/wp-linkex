=== Plugin Name ===
Contributors: Juanjo Fernandez
Donate link: http://juanjoefe.wordpress.com/
Tags: link exchange, linkex, links, blogroll, widget, linkex widget, wp-linkex
Requires at least: 2.8
Tested up to: 2.8
Stable tag: 1.0

This plugin allows you to easily display the links included in your LinkEX installation directly in a WordPress widget.

== Description ==

This plugin allows you to easily display the links included in your [LinkEX](http://linkex.dk/ "LinkEX") installation directly in a WordPress widget.
You can separate your links in different categories and display them on multiple widgets with different titles and designs.

== Installation ==

1. Install [LinkEX](http://linkex.dk/ "LinkEX") in your webserver (in the `WordPress root/linkex/` directory)
1. Upload WP-LinkEX to the `/wp-content/plugins/wp-linkex/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to your widgets page in WordPress and drag some WP-LinkEX widgets to your sidebar!

== Frequently Asked Questions ==

= Where can I find the category ID? =

In your LinkEX control panel, in the *Categories* section.

= How can I configure my LinkEX to show my links between li tags? =

Go to your LinkEX administration and *edit* the category where are the links that you would like to show in your blog.

In the *Template* section enter something like:

    <li><a href="{$URL}" title="{$ANCHOR}">{$ANCHOR}</a></li>

== Screenshots ==

1. WP-LinkEX configuration form

== Changelog ==

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.0 =
* Allow multiple widgets.
