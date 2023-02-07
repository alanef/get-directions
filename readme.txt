=== Get Directions Map  ===
Contributors: fullworks, alanfuller
Donate Link: https://www.paypal.com/donate/?hosted_button_id=UGRBY5CHSD53Q
Tags: MapQuest, Maps, Responsive Map, Directions, Get Directions, Map
Tested up to: 6.0
Stable tag: 2.16.1
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
Type: freemium

The original map plugin with directions to your business that is better looking than Google Maps. Make your site stand out from the crowd.
Support for this plugin has ended and will shortly be retired. Please find an alternative.

== Description ==

Support for this plugin has ended and will shortly be retired. Please find an alternative.

This is a map display and routing plugin that uses MapQuest. MapQuest is an alternative to Google that has a directions module allowing you to  display directions
to your business.

A fantastic way of showing your business location and for your users to get travel directions to you.

See a [demo site here](https://demo.fullworks.net/get-directions/free-plugin-features/)


= Features Include =
* Show or hide route direction ability
* Set initial zoom level
* Decide on full map controls or minimal
* Set the map height
* Developer friendly template layouts for shortcode / widget allowing overriding

= PHP 8.0 support =

Tested on PHP 8.0

= Go PRO =

The pro version has many additional features that help you get the best out of your MapQuest map.
One of the features allow you to easily create a multi map pin Geo-Directory style site.

* Ability to store lat/long on posts and custom post types
* Post-aware widget, using post location meta fields
* Multi map pins shortcode for post with locations, create a directory style map - [see an example here](https://demo.fullworks.net/get-directions/2018/07/17/demo-world-map-with-custom-pins/)
* Different colours by taxonomy on multi pin markers
* select styles default map, dark, light, hybrid, satellite

see [pro features demo here](https://demo.fullworks.net/get-directions/pro-plugin-features/)

== Screenshots ==
1. Display routes to your business

== Installation ==

**Through Dashboard**

1. Log in to your WordPress admin panel and go to Plugins -> Add New
1. Type widget for get-directions in the search box and click on search button.
1. Find Get Directions.
1. Then click on Install Now after that activate the plugin.

**Installing Via FTP**

1. Download the plugin to your hardisk.
2. Unzip.
3. Upload the **get-directions** folder into your plugins directory.
4. Log in to your WordPress admin panel and click the Plugins menu.
5. Then activate the plugin.

== Frequently asked questions ==
= Why is this plugin being retired? =
* not enough users - there was  a premium plugin but very few paid - unfortunately no viable to spend time keeping this up to date with Mapquest changes, PHP changes, WP changes

= What does retirement of this plugin mean to me? =
* the plugin will continue to work as it does now until something breaks, then you are on your own to fix it. The code is GPL so you can fix it yourself if you are a developer.

= Do I need to pay or provide a credit card to use this plugin? =
Unlike Google Maps, you do not need to lodge a credit card to get and API key.  You still need to getan APIkey and MapQuest does have limits, which you will have to pay for if
you exceed them, but you are unlikely too unless you have a missively popular site, even then the costs are cheaper than Google.

= How do I get the Free API key? =
Create a free account on MapQuest (https://developer.mapquest.com/)[https://developer.mapquest.com/plan_purchase/steps/business_edition/business_edition_free/register]
Login and go to (Add API Key)[https://developer.mapquest.com/user/118761/apps/add]
you just need a name, don't worry about Callback URL it is not used bythis plugin

= how do I use the shortcode? =
to display a map on the page use the short code
[get-directions] with the appropriate parameters

A destination is mandatory and is set as a latitude / longitude pair
e.g.    `[get-directions latlng="51.36887,-0.408999"]`


*Optional*

A route selection dialogue overlay will be shown, unless you turn it off with
*    `showroute="false"`

Specify the map image height ( default = 500px)
*    `height="400px"`

Specify the map width ( default full width - 100%)
*    `width="66%"`  you can use px too e.g. 320px but bear in mind fixed sizes on responsive sites

Specify the initial zoom level (1-16) (default 12)
 *   `zoom="10"`   :note the map will auto zoom if a route is displayed so this setting is only really relevant when hideroute='yes'

Specify the type of map controls
 *   `controls="true"` shows multi controls
 *  `controls="false"` shows only zoom controls

Specify the language for the directions ( note mapquest only translates the route directions, some text remains in English )
 *   `locale="en_US"` shows in Amercican English ( default )
 *   `locale="fr_FR"` shows in French
 *   `locale="hu_HU"` shows in Hungarian
 *   `locale="es_ES"` shows in Spanish
    many locale codes are supported, try them out, if it doesn't work you just get "Sorry e could not calculate directions ..." when you test directions. If you need further info on loacles contact mapquest.

Specify the units used in the directions
 *   `unit="m"` shows distances in miles ( default )
 *   `unit="k"` shows distances in kilometers ( default )

*Examples*

Map with directions overlay with icon at latitude 40.74802 longtitude -73.98512, minimal control
*    `[get-directions latlng="40.748021,-73.98512" controls="false"]`


= Can I display multiple maps (shortcodes or widgets) on one page? =
You can display one shortcode and as many widgets as you like on one page. Multiple shortcodes on one page is a Pro feature.
= Can I display multiple map markers? =
Multiple map marker is only available in the Pro version



== Changelog ==
= 2.16.1 =
* Notice this plugin is being retired - please find an alternative

= 2.16.0 =
* update mapquest library and css to mapquest-js-v1.3.2

= 2.15.10 =
* update freemius library

= 2.15.9 =
* Add free donation info


[Full Change History](https://plugins.trac.wordpress.org/browser/get-directions/trunk/changelog.txt)

== Upgrade notice ==

*  2.16.1 - Notice this plugin is being retired - please find an alternative