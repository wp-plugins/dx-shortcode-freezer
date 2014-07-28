=== DX Shortcode Freezer ===
Contributors: nofearinc, devrix
Tags: shortcode, generate, static, content, page
Requires at least: 3.1
Tested up to: 3.9.1
Stable tag: 1.0
License: GPLv2 or later

Converting all static shortcodes to their static representation at the moment of generation. This plugin could alter your database posts.

== Description ==

**WARNING: This script alters the database content so use at your own responsibility! Backup your database first.**

Shortcode Freezer. If you have a website with content based on shortcodes 
and this content generates some static data (i.e. authors, pricing, buttons
 and other listing that just provides html markup with a 'short code'), 
then feel free to convert that to the static values before switching themes. This would evaluate the shortcodes and generate the HTML markup and replace the database posts with the evaluated content. 

Keep in mind that it would not work with dynamic listings that generate dynamic content - they would 'freeze' and will not be dynamic anymore. 

You can switch themes without worrying about shortcode compatibility. Once the markup is generated and embedded into posts, your data would be visible and you can style the markup in the new theme.



== Installation ==

Upload the DX Shortcode Freezer plugin to your blog (or install through the WP Plugin installer) and activate it.

Navigate to Tools -> DX Shortcode Freezer and click the "Freeze Shortcodes" link.

Your content would be regenerated and the shortcodes would 'freeze' so that you can use their data in other themes.
