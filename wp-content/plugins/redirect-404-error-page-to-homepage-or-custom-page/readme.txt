=== Redirect 404 Error Page to Homepage or Custom Page with Logs ===
Contributors: Fullworks
Tags: 404 error, 404 page, redirect, redirect 404, redirection, 404, 301, 302, seo, permalink, page not found, homepage, server error
Requires at least: 4.6
Tested up to: 5.7
Stable tag: 1.7.8
Requires PHP: 5.6
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl.html

Redirect 404 error page to homepage or any other page, with logs. Supports permanent (301), temporary (302) redirects & not found (404). Super easy to set up & use.

== Description ==

**Easily redirect WordPress 404 error pages to the homepage or any another page.** Plugin supports both permanent redirects (HTTP response status code 301) and temporary redirects (HTTP response status code 302). Plugin will start redirecting 404 error pages to the homepage as soon as you activate it by using the 301 permanent redirect. To configure it open Dashboard -> Settings -> General Settings and scroll down to the bottom.

Please note that **permalinks have to be enabled** in Dashboard -> Settings -> Permalinks in order for the 404 Redirect to work properly.

New Feature: 404 errors can be logged with this plugin so you can examine what pages may be missing.

Redirect 404 Error Page is very useful for themes that have an ugly, uninformative 404 server error page that can't be changed without messing with code and set to still return 404. Simply create a new custom 404 error page and activate the plugin - problem solved!
It's also very useful in situations when a lot of content has been removed from the site. For those situations create a new page explaining what happened and simply configure Redirect 404 to use that page.

This is an ideal plugin for missing page redirection.

== Installation ==

Follow the standard procedure:

1. Upload the unzipped plugin folder to the `/wp-content/plugins/` directory or install the plugin from Dashboard -> Plugins -> Add New
2. Activate the plugin through the Plugins menu
3. Head to Dashboard -> Settings -> Redirect 404 Settings to configure it

== Screenshots ==

1. Redirect 404 Error Page Admin Page Screenshot

== Frequently Asked Questions ==

= 404 Error Pages are not being redirected =

Did you activate the plugin? And enable the permalinks? Still doesn't work? Sorry to hear that. Please head over to the <a href="https://wordpress.org/support/plugin/redirect-404-error-page-to-homepage-or-custom-page">support forum</a> and open a new thread. We'll help you out ASAP.


== Changelog ==
= 1.7.8 =
* Library update
* improved escaping
* test on 5.7

= 1.7.7 =
* Library update

= 1.7.6 =
* Remove link

= 1.7.4 =
* 2019/11/13
* 5.3 update
* settings update

= 1.7.4 =
* 2019/07/04
* Upgrade Freemius library to 2.3.0

= 1.7.3 =
* 2019/04/03
* Change to 404 option to ensure that 301 in not sent before 404

= 1.7.2 =
* 2019/02/28
* Minor improvement

= 1.7.1 =
* 2019/02/25
* Minor improvement

= 1.7 =
* 2018/12/07
* Minor tweak to admin to cater for 5.0 block editor


= 1.6 =
* 2018/09/06
* Added capturing template 404 redirects, where plugins like mailpoet handle redirsts directly to template.


= 1.4 =
* 2018/09/01
* Added logging capability


= 1.4 =
* 2018/06/01
* Changed to keep admin redirects e.g. admin / login etc


= 1.3 =
* 2018/08/01
* Transferred to Fullworks for future development
* Changed permalink warning to admin notice
* Made language translatable
* Made pages selectable
* Added reset to default to settings
* Added freemius opt in
* Added 404 redirect type for custom 404 pages

= 1.2 =
* 2018/07/20
* added 301/302 redirect type option
* reworked readme.txt

= 1.01 =
* 2018/05/09
* WebFactory took over development

= 1.0 =
* 2016/05/27
* Initial release
