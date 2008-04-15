=== Lighter Menus ===
Contributors: corpodibacco
Tags: menu, admin, css, light
Requires at least: 2.5
Tested up to: 2.5
Stable tag: 2.5.9

Creates Drop Down Menus instead of the regular Admin menus for WordPress, so that you can browse items with one click. Ready for Worpress 2.5+.

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
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Review the option page in "Design" > "Admin menus options"
4. Done. Enjoy.

== Changelog ==

* 2.5.9 Prepares Lighter menus for translation. Do come forward if you're willing to translate this plugin in your language, there are very few lines to translate. Only italian and default english are available so far (please check the "Technical note for Translators"). Also, I slightly changed the name of the plugin, I hated the old name, I hope you'll understand.
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
* 2.2 actually the first version of this plugin. It should be alpha something. But because I haven't changed a line of php code in it, it is only fair that the version number should depend on the plugin I used as the base for this

== Technical Note for Translators ==

You probably already know this, but on the safe side: Despite what PoEdit wants you to do, you should translate only the items that are actually under the textdomain 'lighter-menus'. If no domain is indicated, in cases such as `__('Dashboard')` for example, leave the translation empty, because Wordpress locale will take care of that.
