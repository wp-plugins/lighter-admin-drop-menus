=== Lighter Menus ===
Contributors: corpodibacco
Tags: menu, admin, css, drop down, light
Requires at least: 2.5
Tested up to: 2.5
Stable tag: 2.6.5

Creates Drop Down Menus instead of the regular Admin menus for WordPress, so that you can browse items with one click. Ready for Worpress 2.5.1+.

== Description ==

Lighter Menus creates Drop Down Menus instead of the regular Admin menus for WordPress, so that you can browse items with one click. Fast to load, adaptable to color schemes, Lighter Menus comes with silk icons, a option page, and a design that fits within the Wordpress 2.5 interface taking the less room possible.

== Screenshots ==

1. At work under Firefox 2.x.

2. At work under Internet Explorer 7 with the Classic color scheme.

3. Under Opera 9.x

4. With Safari for windows and the classic color scheme.

5. The option page.

== Installation ==

1. Upload the entire content of lighter\_admin\_menus.zip to your `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress (deactivate and reactivate if you're upgrading).
3. Review the option page in "Design" > "Lighter menus"
4. Done. Enjoy.

== Changelog ==

* 2.6.5 This version rewamped almost entirely the most part of the code... It already was in a way, but this plugin is basically now an adaptation of the current Ozh's [Admin Drop Down Menus](http://planetozh.com/blog/my-projects/wordpress-admin-menu-drop-down-css/) plugin. Back to version 2.2 I had created Lighter Menus out of a plugin which already was a derivation of Ozh's plugin, although back then I had no idea (it was my first attempt at making a plugin). Lately I was hoping to take a more original direction with it and find my own solutions to the code challenges, but truth is "the wizard of" Ozh comes always first to solve the problems and find solutions, so I guess I am back at taking from him. Anyway, my plugin required many hours of hard work and still adds a number of features to Ozh's, including an option page (now with more options), more consistent colors and adaptation to color schemes (also custom ones), an uninstaller ecc. This update also fixes a lot of bugs and potential bugs compared to version 2.6.1, and also imports from Ozh a number of great features like WPMU support, the ability to optionally display the original submenu, and the wrapping of the main menu within smaller windows. Useless to say how much I am grateful to the man.
* 2.6.1 This version adds an easy to use uninstaller to optionally remove every trace of Lighter Menus upon deactivation. This feature can be found in the Design > Lighter Menus page. You won't notice, but this version also moves all the options in only one record in the database to occupy less space. Okay, there were only two records before, but still. IMPORTANT: because of the modified options, you are advised to deactivate and reactivate the plugin upon upgrading. Also in this version there are few small fixes. I always find small things to fix, I can't say why.
* 2.6 Fixed a bug with Safari not adjusting the width of the menus correctly and other minor fixes.
* 2.5.9 This version prepared Lighter menus for localization. Do come forward if you're willing to translate this plugin in your language, there are very few lines to translate. Only italian and default english are available so far (please check the "Technical note for Translators"). Also, I slightly changed the name of the plugin, I hated the old name, I hope you'll understand.
* 2.5.8 Fixed a issue with other plugins adding extra long menu entries. Now menus widen and narrow at ease. Thanks to Karl for pointing out this.
* 2.5.7 Added a nifty option page where you can toggle a couple of customizations, like menu icons. For your convenience, the necessary files of the plugin now consist in just one file "lighteradminmenus.php", and the "images" folder. All the css files are now integrated and can be removed from the plugin folder after the upgrade.
* 2.5.6 Tried to distinguish chromatically the elements of the menu accordingly to Wordpress 2.5,  sliding them to the right in the main menu. Maybe a good idea, maybe not. Let me know.
* 2.5.5 I never realized Wordpress 2.5 had two color schemes (thanks tonchi!). Lighter admin menus now adapts to this, quite beautifully I must say. Also very important fix: the menu now gives feedback when editing posts and pages (it failed to before).
* 2.5.4 fixed the awaiting comments alert and other minor glitches. Cleaned the code a good deal. Recommended.
* 2.5.3 slight redesign to favor smooth corners in the menus. 
* 2.5.2 small fixes (thanks to Robert!) and a slight redesign favoring the "tab" effect. Also FF 2 and IE 7 look more alike now.
* 2.5.1 small fixes
* 2.5 redesigned to fit into wordpress 2.5.
* 2.3 trying to fix a function that breaks translations of wordpress. We'll see.
* 2.2 actually the first version of this plugin. It should be alpha something. But because I haven't changed a line of php code in it, it is only fair that the version number should depend on the plugin I used as the base for this.

== Technical Note for Translators ==

You probably already know this, but on the safe side: Despite what PoEdit wants you to do, you should translate only the items that are actually under the textdomain 'lighter-menus'. If no domain is indicated, in cases such as `__('Dashboard')` for example, leave the translation empty, because Wordpress locale will take care of that.
