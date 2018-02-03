=== Singl ===

Contributors: automattic
Requires at least: 3.4
Tested up to: 3.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Credits ==

* `img/default-header.jpg`: photo by Daniel Robert Dinu (http://www.concertphotography.ro/), licensed under [CC0](http://creativecommons.org/choose/zero/)

== Changelog ==

= 1 September 2017 =
* Fix subscribe form position on self-hosted sites.

= 6 July 2017 =
* Update Infinite Scroll configuration.

= 8 June 2017 =
* Add theme support for title tags. Bump version number.

= 7 June 2017 =
* Update JavaScript that toggles hidden widget area, to make sure new video and audio widgets are displaying correctly when opened.

= 31 March 2017 =
* Update copyright year
* Multiple changes.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 9 February 2017 =
* Add check for is_wp_error() in cases when using get_the_tag_list() to avoid potential fatal errors.

= 2 February 2017 =
* remove from CSS in wp-content/themes/pub

= 22 June 2016 =
* Fix Home menu position in annotation.

= 21 June 2016 =
* Correct annotation's page template setting.

= 18 May 2016 =
* Add Headstart annotations.

= 12 November 2015 =
* Remove debugging as it prints empty lines in the error log.

= 20 August 2015 =
* Add text domain and/or remove domain path. (O-S)

= 31 July 2015 =
* Remove `.screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 15 July 2015 =
* Always use https when loading Google Fonts.

= 2 June 2015 =
* fix `sprintf` placeholder.

= 30 December 2014 =
* selfishly add WordPress link to social link options

= 30 November 2014 =
* Don't display unprocessed shortcode text (on WP.org) if the Jetpack Subscriptions module isn't enabled.

= 29 November 2014 =
* Improve Customizer settings.

= 27 November 2014 =
* Add support for upcoming Eventbrite services.

= 30 October 2014 =
* Add a filter to the subscribe shortcode, allowing us to change it for WP.com's purposes in wpcom.php.

= 31 August 2014 =
* Multiple changes:

= 5 August 2014 =
* Trigger .resize on the widget toggle click such that galleries will display properly

= 1 August 2014 =
* Update readme

= 24 July 2014 =
* change theme/author URIs and footer links to `wordpress.com/themes`.

= 4 June 2014 =
* Remove use of flexbox for screens < 1024px (e.g. tablets and mobiles) to fix browser crash.

= 1 June 2014 =
* add/update pot files.

= 18 May 2014 =
* Multiple changes:

= 6 May 2014 =
* Change follow button z-index to avoid disappearing underneath IS footer.

= 14 April 2014 =
* Update Responsive video support

= 11 April 2014 =
* Change Video Post Format treatment so it looks similar on WordPress.com or WordPress.org.

= 6 April 2014 =
* Don't display category and tag text on single attachments.

= 17 March 2014 =
* Set flex-basis to auto to fix issues with footer displaying in the header area in IE 11.

= 27 February 2014 =
* Add credits to readme.txt

= 26 February 2014 =
* Revert the changeset r16835

= 25 February 2014 =
* Change text strings to reduce theme string proliferation.

= 19 February 2014 =
* Add readme and POT file
* Update RTL stylesheet for search submit and follow submit
* Update theme description
* Multiple
* Add new styles for:
* Add style for recent comments widget and fix input alignement/padding/height issue
* Rename homepage template to front page template and reorganize the folder

= 17 February 2014 =
* Update screenshot
* Change hr background-color
* Change wp-caption style
* Fix positioning issue of subscribe form's submit button
* Fix widget list and search submit issue
* New default background image
* Remove header wrapper on mobile devices if theme doesn't have a primary nav, fix social icons js append so it can work without any primary nav
* Change reply button's style so comments don't feel bunched up to much
* Add more margin-bottom to widgets so they don't feel too clse together
* Reorginzed stylesheet and add table of content
* Remove color on bypostauthor, not enough contrast
* Swap the position of the main menu and the social icons and move main menu closer to the edge of the screen on mobile devices
* Sanitization of the customizer

= 14 February 2014 =
* Reduce main-navigation link height to 40px
* Move content_width for video post format direclty in the content page
* Video Post format: new style with margin removed
* Reduce main navigation links padding-top on mobile devices
* Using % instead of px for the main navigation on mobile devices
* Add function to resize entry thumbnail on mobile devices so it fits nicely in the content area
* Remove extra padding on entry-meta if post is an aside or doesn't have a title
* Fix page-link margin and add padding above entry-meta so it's not too close to entry-title
* Add break-word to avoid long title overlapping the content area
* Add missing indent
* Remove widget trigger extra padding-top. Fix rtl navigation
* Add RTL stylesheet
* Fix padding and position on submit buttons for search and subscribe form
* Fix issues with color annotations on social links and subscribe form

= 13 February 2014 =
* Clean CSS files and update CSS to match color annotations

= 12 February 2014 =
* Add correct post thumbnail image size for single, page and homepage
* Multiple changes:
* Remove sticky post styling. Sticky footer using CSS flexbox
* Multiple CSS changes:

= 11 February 2014 =
* CSS
* Update tags
* Fix categories widget on error 404 page
* Add style for ratings/sharedaddy
* Overwrite wpcom comment form styling to match wporg
* Change body classes logic when theme has a primary menu or a social link to fix padding issue
* Add wpcom comment forms styles

= 6 February 2014 =
* Update blog_subscription_form shortcode so it works on WP.com
* Fix header top empty gap if nav and social links are empty
* Add default background image
* Customise Video Post Format, Fix IS paging-nav issue, Bump copyright date.
* Add WordPress.com-specific functions and stylesheet
* Infinite Scroll fix z-index issue with slideshow galleries
* Initial commit of the .org version
