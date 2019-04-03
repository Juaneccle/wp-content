=== Coherent ===

Contributors: automattic
Tags: blue, white, light, one-column, fixed-layout, responsive-layout, accessibility-ready, custom-background, custom-header, custom-menu, editor-style, featured-images, flexible-header, infinite-scroll, rtl-language-support, site-logo, sticky-post, translation-ready, blog, design, journal, news, photoblogging, photography, travel, clean, contemporary, elegant, light, minimal, modern, professional, simple

Requires at least: 4.1
Tested up to: 4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Coherent Theme, Copyright 2015 Automattic
Coherent is distributed under the terms of the GNU GPL

A simple theme with a lot of structure.

== Description ==

Coherent is a simple, structured theme with full screen featured images and a sliding panel sidebar.

* Responsive layout.
* Custom Header
* Social Links
* Jetpack compatibility for Infinite Scroll, Responsive Videos, Site Logo.
* The GPL v2.0 or later license. :) Use it to make something cool.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Where can I add widgets? =

Coherent includes one optional widget area located in the sliding panel.

= How do I add the Social Links to the sidebar? =

Coherent allows you display links to your social media profiles in the sliding panel, like Twitter and Facebook, with icons.

1. Create a new Custom Menu, and assign it to the Social Links Menu location.
2. Add links to each of your social services using the Links panel.
3. Icons for your social links will automatically appear if it's available.

Available icons: (Linking to any of the following sites will automatically display its icon in your social menu).

* Codepen
* Digg
* Dribbble
* Dropbox
* Facebook
* Flickr
* Foursquare
* GitHub
* Google+
* Instagram
* LinkedIn
* Email (mailto: links)
* Pinterest
* Pocket
* PollDaddy
* Reddit
* RSS Feed (URLs with /feed/)
* Spotify
* StumbleUpon
* Tumblr
* Twitch
* Twitter
* Vimeo
* WordPress
* YouTube

Social networks that aren't currently supported will be indicated by a generic share icon.

== Quick Specs ==

1. The main column width is 680px.
2. The sidebar width is 280px.
3. Featured Images are 2000px wide by 1500px high.
4. Custom Header Image is 2000px wide by 1500px high.

== Changelog ==

= 8 June 2017 =
* Fix visual issues with lists in text widget. Bump version number.

= 7 June 2017 =
* Update JavaScript that toggles hidden widget area, to make sure new video and audio widgets are displaying correctly when opened.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 2 February 2017 =
* remove from CSS in wp-content/themes/pub
* Add forgotten context and gettext function around comma separators for translators.

= 1 February 2017 =
* Replace get_the_tag_list() with the_tags() for a more straightforward approach that prevents potential fatal errors.

= 16 June 2016 =
* Add a class of .widgets-hidden to the body tag when the sidebar is active; allows the widgets to be targeted by Direct Manipulation.

= 27 May 2016 =
* Fix a PHP warning.

= 18 May 2016 =
* Add Headstart annotations.

= 18 April 2016 =
* Make sure dropdown toggle uses Genericons even when user uses a Custom Font.

= 25 February 2016 =
* Add blog-excerpts tag.

= 30 October 2015 =
* Adding function that retrieves background color and applies it to post meta items;  See 3361;

= 3 September 2015 =
* Make strings in JavaScript translatable

= 31 July 2015 =
* Remove .`screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 15 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 20 June 2015 =
* Update readme to bump version to be inline with org

= 17 June 2015 =
* spelling mistake in logo
* org theme review

= 12 May 2015 =
* Do not display post date on pages

= 24 April 2015 =
* clean up after js refactoring
* when custom background add padding to posted
* org changes
* Only show seperator on larger screens
* Reviewed line widths

= 23 April 2015 =
* switch bold font
* Capitalise in footer correctly
* header fix

= 22 April 2015 =
* fix for blockquotes getting larger with nesting
* customizer tweak
* fix page links
* fix for galleries
* Avoid headers bleeding into edge on right
* better padding on alignments for images
* fix for aligned images
* remove margins on figure
* lowercase a
* remove tag for now
* Various final passes
* Style adjustments whilst doing custom colors

= 21 April 2015 =
* rtl
* Archive header width
* remove post format titles in archive
* fix textdomain in functions.php
* query cleanrup
* only add image increase on larger screen
* less margins on mid devices
* ipad blockquote issues
* compressed screenshot.png

= 20 April 2015 =
* screenshot.png
* Adds editor styles
* increase scroll bar color
* variable catch
* Remove the loop
* Increase refresh time
* make sliding more snappy
* remove seperator from meta
* Larger infinite scroll button
* Change menu name in header.php
* update js comments
* unused file cleanup
* Wpcom
* iPad
* fix men issues on iPad Safari

= 19 April 2015 =
* style tags and description
* Adds in padding to admin bar sliding panel
* Featured post markings
* CSS tidy
* fix for mobile menus
* logged out admin bar
* action button padding
* Author widget
* adjusting of widgets
* Calendar widget
* Explicit declaration of slie panel widgets.
* Author widget display
* darker widget search input
* nicer search widget styling
* widget search input styling
* increase widget font size
* name menu change in functions.php
* right menu name in header
* Navigation menu name
* Sub navigation toggle top padding
* Social menu padding
* Better spacing on sliding panels

= 17 April 2015 =
* Increase the padding on mobile devices between toggle and menu
* single view mobile menu fix
* mobile menu fix
* Adds in primary color to navigation hover
* modification to script to simply set a margin at the top. Solves frame issues seeing on Chrome. Could be Chrome being grumpy, but solves it.
* Account for admin bar at top
* remove animation on related posts when in content
* Page link styling in posts
* Blockquote variations
* Comment avatars to one side when on large devices
* Better panel styling for navigation and also widgets
* infinite scroll loader indicator placement
* less padding on panel button
* better infinite scroll
* Better placing of sliding panel button

= 16 April 2015 =
* Try blue rather than red for a calmer primary set.
* Reduces site logo wrapper width
* round all avatars and also bring in site logo rounded
* site logo styling
* site logo
* Adds in aside post format
* Adds in better spacing for larger devices on menu
* Better smaller devices menu
* Better handling of panel padding
* better accessible menus
* Change menu to say main not primary
* Decrease line height on posted on
* Tweak the line height and padding on posted on
* Desktop spacing refinements
* Clean up 404 page
* Better spacing on smaller device menu

= 15 April 2015 =
* reduce padding on buttons
* 404 page
* remove large margin on page header

= 14 April 2015 =
* Better display on smaller devices
* Link styling
* Navigation padding on sub navigation
* Panel padding

= 13 April 2015 =
* Update style.css

= 10 April 2015 =
* style.css cleanup
* First commit

== Credits ==

* Genericons: font by Automattic (http://automattic.com/), licensed under [GPL2](https://www.gnu.org/licenses/gpl-2.0.html)
* Images: image by Unsplash (https://unsplash.com), licensed under [CC0](http://creativecommons.org/choose/zero/)