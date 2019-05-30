=== FSM Custom Featured Image Caption ===
Contributors: fesomia
Tags: featured image, caption, legend, images
Requires at least: 4
Tested up to: 4.9
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Author URI: http://wp.fesomia.cat
Plugin URI: http://wp.fesomia.cat/plugins/fsm-custom-featured-image-caption
Donate link: http://wp.fesomia.cat/donate

Allows you to add a custom caption to the featured image of a post.

== Description ==

This plugin allows you to add a custom caption to the featured image of a post. It works as follows:

* If no caption is indicated, the plugin will display the generic caption defined in the Media Library.
* If a caption is indicated, the plugin will display this caption instead of the generic caption defined in the Media Library.
* If no caption is indicated and no legend exists in the Media Library, none will be displayed (obviously).

The plugin also allows to:

* Hide the caption, either the original from the Media Library or the custom one.
* Entirely hide the featured image in the public view, without having to de-attach it from the post.
* Several options to modify the styles used in the caption
* Output the text of the caption anywhere in your theme using a custom function
* Output the featured image with caption inside your content with a shortcode (experimental)

This plugin writes the caption in a `<figcaption>` label for the correct semantic code.

= Format =

The caption will adopt the format specified for the `<figcaption>` element and the `wp-caption-text` CSS class, which is common in WordPress themes.


= Usage =

By default the plugin just works. All you should need to do in order to begin using it is activate it and use the new added options in the featured image section of your edit page. However, there is a settings page for advanced users that allows you to customize it to your needs.
Visit *'Settings > FSM Custom Featured Image Caption'* to setup the CSS and HTML parameters:

* **CSS for caption text**: Choose one of the options to modify the class / styles that will be used in the caption container (by default is wp-caption-text). Note that you can indicate more than one class separating it with a space
* **Allow HTML code**: Check it if you want to parse the caption text as html if you need the browser to parse html tags instead of showing them (i.e. "Photo by <strong>John Doe</strong>"). Have in mind that incorrect html code or orphan tags can break your layout
* **Show image captions in lists**: Check if you want to show the caption when the featured image appears in a list, i.e. in a category page, in a widget showing the latests posts, etc. Disabled by default. Note that some themes may add containers around the image (i.e. a link tag) that can interfere with the correct presentation of the caption

= Shortcode =
We've added a shortcode that allows you to put the featured image (and it's caption) in your page. Just write
[FSM_featured_image] anywhere in the content edit box of your post or page and it will appear. You can also select the size of the image with the parameter "size". Note that defined image sizes may differ between wordpress themes, the defaults being: thumbnail, medium, medium_large, large and full.

When you use the shortcode, the plugin will try to remove the featured image from your theme's default position (so it doesn't appears twice, but as this is an experimental feature, results may vary. It also will not appear in lists

**Usage example**
[FSM_featured_image size=thumb]

= For developers =

The plugin comes with two public functions that allow you to get or output the featured image caption of the current post anywhere in your template.
Once the plugin is activated, use `<?php get_FSM_featured_image_caption()?>` to return a string containing the text that you can assign to a variable or `<?php the_FSM_featured_image_caption()?>` where you'd like the caption to be displayed.

Both functions accept parameters passed inside an array with the following keys:

* **tag**: The tag (without brackets) you want to use as a container. By default is `div`. If set to `false` it will remove it and just return the caption text
* **class**: The name of the class/classes you want to use for the container. Use space to separate them. Empty by default
* **style**: The css styles to be used in the container tag. Empty by default
* **force_visibility**: When set to true, it ignores the *hide caption* option set by the post editor. It can be useful when you want your caption in a different place but still show the featured image. Deafult: `false`
* **allow_html**: as in the settings page, if set to true, allows the browser to parse the html code inside the caption text, else shows it as plain text. Default: `false`

**Usage example:**
```php
the_FSM_featured_image_caption( array('tag' => 'p', 'class' => 'class1 class2', 'style' => 'color: red;', 'allow_html'=> true );
```

= Translations =

The plugin comes up with 3 complete translations:

* English (en)
* Spanish (es_ES)
* Catalan (ca)

= Coming soon =
* More options for selecting the text to be used as the caption, allowing you to choose amongst image Title / Caption / Alt Text / Description and custom text.
* Options to fine tune the shortcode.
* (Have more ideas? We are open to hearing them!)

== Installation ==
1. Upload `fsm-custom-featured-image-caption` to the `/wp-content/plugins/` directory
2. Activate the plugin through the \'Plugins\' menu in WordPress
3. Use the plugin in the edit post page

== Frequently Asked Questions ==
1. Does it work with any theme?
Yes, as long as the theme supports featured images / post thumbnails and uses get_the_post_thumbnail in the code.

2. I'm using the theme [X] and the caption does not appear / appears in a wrong place / has a different color / background, etc...
Note that the plugin only adds some tags to the image in order to show the caption, and other than the editable custom css for the caption text, it does not add styles to the theme. In most cases, the result would be acceptable and in others you are required to modify your theme or add custom CSS styles (usually in Appearance> Customize) to make the caption and the caption container look as you need.

== Screenshots ==
1. Plugin settings page.
2. Plugin in the Post edit page.

== Changelog ==

= 1.17 =
* Improved the detection of the post-id called by post_thumbnail_html to avoid wrong results on themes showing multiple featured images of different posts
* Additional condition to stop processing the featured image if there is no content
* Minor variable corrections

= 1.16 =
* Modified the way the plugin detects if called from a list for widgets and other plugins showing a list of posts from a single page
* Added option to show the caption when the featured image appears on a list

= 1.15 =
* Added a check to return an empty string if there is no caption text instead of an empty figcaption (or custom tag) to prevent weird spacing in some themes.

= 1.14 =
* Corrected identification of single pages where the caption was not appearing
* Renamed the public function names to a more specific ones in order to avoid conflicts with future versions of wordpress or other plugins. It also fixes the naming to follow wordpress conventions.
* Added shortcode to show the featured image and it's caption inside the post contents (experimental)

= 1.13 =
* Minor correction: added check to save_post hook to prevent Notices appearing in some cases while on debug mode

= 1.12 =
* Corrected: The plugin was using figure instead of figcaption in the default parameters
* Allow public functions to be used without parameters (fall back to the defaults)

= 1.11 =
* Corrected: Save the parameters on load to prevent losing them in some circumstances

= 1.10 =
* Settings page to customize styles and output
* Added public functions for advanced users to use inside the template files

= 1.01 =
* Minor text domain / localization changes
* Maintain the parameters after selecting another image

= 1.0 =
* Stable release.
