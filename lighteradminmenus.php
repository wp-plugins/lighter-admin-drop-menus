<?php
/*
Plugin Name: Lighter Admin Drop Menus
Plugin URI: http://www.italyisfalling.com/lighter-admin-drop-menus-wordpress-plugin
Description: Creates Drop Down Menus for WordPress Admin Panels. Fast to load and adaptable to customizations. Comes with silk icons and a design that fits within the Wordpress 2.5 interface taking the less room possible.
Version: 2.5.4
Author: corpodibacco
Author URI: http://www.italyisfalling.com/coding/
WordPress Version: 2.5
*/

/*  Copyright 2005/2007 Andy Staines, also Copyright 2007 italyisfalling.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    For a copy of the GNU General Public License, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function lad_header() // Set the stylesheet to replace wp-admin.css
{
	global $is_winIE;
	global $plugin_uri;

	$dir = basename(dirname(__FILE__));
	$plugin_uri= trailingslashit(get_option('siteurl')) . 'wp-content/plugins/' . $dir;

	echo '<link rel="stylesheet" type="text/css" href="' . $plugin_uri . '/lam.css" />' . "\n";
	
	if ($is_winIE)
	{
		echo '<link rel="stylesheet" type="text/css" href="' . $plugin_uri . '/lam-ie.css" />' . "\n";
	}
}

function lad_adminmenu_build () // builds an array populated with all the infos needed for menu and submenu
{
	global $menu, $submenu, $plugin_page, $pagenow;
	global $ipath;

	$self = preg_replace('|^.*/wp-admin/|i', '', $_SERVER['PHP_SELF']);
	$self = preg_replace('|^.*/plugins/|i', '', $self);

	$altmenu = array();

	/* Step 1 : populate first level menu as per user rights */
	foreach ($menu as $item) 
 	{
		// 0 = name, 1 = capability, 2 = file
		if ( current_user_can($item[1]) ) 
		{
			$sys_menu_file = $item[2];

			if ( file_exists(ABSPATH . "wp-content/plugins/{$item[2]}") )
			{
				$altmenu[$sys_menu_file]['url'] = get_option('siteurl') . "/wp-admin/admin.php?page={$item[2]}";
			} else {
				$altmenu[$sys_menu_file]['url'] = get_option('siteurl') . "/wp-admin/{$item[2]}";
			}
			if (( strcmp($self, $item[2]) == 0 && empty($parent_file)) || ($parent_file && ($item[2] == $parent_file)))
			$altmenu[$sys_menu_file]['class'] = " class='current'";
			$altmenu[$sys_menu_file]['name'] = $item[0];
		}
	}

	/* Step 2 : populate second level menu */

	foreach ($submenu as $key=>$value)
	{
		foreach ($value as $item) 
		{
			if (array_key_exists($key,$altmenu) and current_user_can($item[1])) 
			{
				// What's the link ?
				$menu_hook = get_plugin_page_hook($item[2], $key);
				if (file_exists(ABSPATH . "wp-content/plugins/{$item[2]}") || ! empty($menu_hook)) 
				{
					$mtype = "<img src='" . $ipath . "plugin.png' height='16' width='16' alt=''/>&nbsp;";
					if(! lad_top_menu_plugin( $altmenu[$key]['name'] ))
					{
						$link = get_option('siteurl') . "/wp-admin/admin.php?page={$item[2]}";
					} else {
						$link = get_option('siteurl') . "/wp-admin/{$key}?page={$item[2]}";
					}
				} else {
					$icon = lad_add_icons($item[0]);
					$mtype = "<img src='" . $ipath . $icon . "' height='16' width='16' alt=''/>&nbsp;"; 
					$link = get_option('siteurl') . "/wp-admin/{$item[2]}";
				}
				$altmenu[$key]['sub'][$item[2]]['url'] = $link;
				
				// Is it current page ?
				$class = '';
				if ( (isset($plugin_page) && $plugin_page == $item[2] && $pagenow == $key) || (!isset($plugin_page) && $self == $item[2] ) ) $class=" class='current'";
				if ($class) 
				{
					$altmenu[$key]['sub'][$item[2]]['class'] = $class;
					$altmenu[$key]['class'] = $class;
				}
				// What's its name again ?
				$altmenu[$key]['sub'][$item[2]]['name'] = $item[0];
				$altmenu[$key]['sub'][$item[2]]['icon'] = $mtype;	
			}
		}
	}
	return ($altmenu);
}

function lad_check_orphans($menu) // obsolete: if any top level menus have no submenu then adds the single menu item as a sub (for IE table fix)
{
	global $ipath;
	
	foreach ($menu as $key=>$value)
	{
		if (!is_array($value['sub']))
		{
			$menu[$key]['sub'][$key]['url'] = $value['url'];
			$menu[$key]['sub'][$key]['name'] = $value['name'];
			$icon = lad_add_icons($value['name']);
			$menu[$key]['sub'][$key]['icon'] = "<img src='" . $ipath . $icon . "' height='16' width='16' alt=''/>&nbsp;";
		}
	}
	return $menu;
}


function lad_adminmenu() // creates the new set of <ul> and <li> for the admin menus
{
	global $is_winIE;
	global $plugin_uri;
	global $ipath;

	$ipath = trailingslashit($plugin_uri . '/images/');

	$menu = lad_adminmenu_build();
	/*$menu = lad_check_orphans($menu);*/ //uselesssss

	$ladaut_menu = '';
	$printsub = 1;
	$iecode='';
	
	foreach ($menu as $key=>$value) 
	{
		$url 	= $value['url'];
		$anchor = str_replace('"', '\"', $value['name']);
		$class	= $value['class'];

		$iecode = '';
		$ladaut_menu .= '<li><a' . $iecode . " href='$url'$class>$anchor";
		
		if ($is_winIE)
		{
			$ladaut_menu .= '<table><tr><td>'; //folks ask why I hate IE
		} else {
			$ladaut_menu .= '</a>';
		}

		if (is_array($value['sub'])) 
		{
			$ulclass='';
			if ($class) $ulclass = " class='ulcurrent'";
			$ladaut_menu .= "<ul$ulclass>";

			foreach ($value['sub'] as $subkey=>$subvalue) 
			{
				$suburl = $subvalue['url'];
				$subanchor = str_replace('"', '\"', $subvalue['icon'] . '' . $subvalue['name']);
				$subclass='';
				if (array_key_exists('class',$subvalue)) $subclass=$subvalue['class'];
				$ladaut_menu .= "<li><a href='$suburl'".$subclass.">".$subanchor."</a></li>";
			}
			$ladaut_menu .= "</ul>";
		} else {
			$ladaut_menu .= "";//"<ul><li></li></ul>"; //useless we don't want empty/repeat menus
			if ($class) $printsub = 0;
		}
		
		if ($is_winIE)
		{
			$ladaut_menu .= "</td></tr></table></a></li>";
		}
		
		$ladaut_menu .="</li> ";			
	}
	
	lad_adminmenu_printjs($ladaut_menu, $printsub);
}

function lad_adminmenu_printjs ($admin = '', $sub = 1) //The javascript bits that replace the existing menu by our new one 
{
	print "<script>
	document.getElementById('adminmenu').innerHTML=\"$admin\";";
	if ($sub) print "document.getElementById('submenu').innerHTML=\"<li>&nbsp;</li>\"";
	print "</script>";
}

function lad_top_menu_plugin($menuname)
{
	if(strpos(' Dashboard Write Manage Design Comments Settings Plugins Users', $menuname))
	{
		return true;
	}
	return false;
}



function lad_add_icons($menuitem) // add the icons to the sub menu items
{
	switch(substr($menuitem, 0, 21))
	{
		case __('Dashboard'):
			$i = "information.png";
			break;
			
		case __('Post'):
			$i = "email_edit.png";
			break;
		case __('Page'):
			$i = "page_edit.png";
			break;
		case __('Link'):
			$i = "link_add.png";
			break;
			
		case __('Posts'):
			$i = "folder_table.png";
			break;
		case __('Pages'):
			$i = "folder_page.png";
			break;
		case __('Links'):
			$i = "application_link.png";
			break;
		case __('Tags'):
			$i = "tag_blue_edit.png";
			break;
		case __('Link Categories'):
			$i = "newspaper_link.png";
			break;
		case __('Media Library'):
			$i = "application_view_gallery.png";
			break;
			
		case __('Themes'):
			$i = "layout.png";
			break;
		case __('Widgets'):
			$i = "brick.png";
			break;
		case __('Theme Editor'):
			$i = "layout_edit.png";
			break;
		case __('Header Image and Color'):
			$i = "layout_header.png";
			break;			
			
		case __('Uploads'):
			$i = "attach.png";
			break;
		case __('Categories'):
			$i = "basket_edit.png";
			break;
		case __('Comments'):
			$i = "comments.png";
			break;
		case substr(__('Awaiting Moderation (%s)'),0,21):
			$i = "comment_add.png";
			break;
		case __('Files'):
			$i = "brick_edit.png";
			break;
		case __('Import'):
			$i = "report_add.png";
			break;
		case __('Export'):
			$i = "report_go.png";
			break;
		case __('Import Links'):
			$i = "folder_link.png";
			break;
		case __('Plugins'):
			$i = "plugin_add.png";
			break;
		case __('Plugin Editor'):
			$i = "plugin_edit.png";
			break;
		case __('Your Profile'):
			$i = "user.png";
			break;
		case __('Authors &amp; Users'):
			$i = "group_key.png";
			break;
		case __('General'):
			$i = "application_view_list.png";
			break;
		case __('Writing'):
			$i = "pencil.png";
			break;
		case __('Reading'):
			$i = "zoom.png";
			break;
		case __('Discussion'):
			$i = "group_link.png";
			break;
		case __('Privacy'):
			$i = "lock.png";
			break;
		case __('Permalinks'):
			$i = "book_link.png";
			break;
		case __('Miscellaneous'):
			$i = "bullet_wrench.png";
			break;
	}
	if (substr($menuitem,0,7) == substr(__('Authors &amp; Users'),0,7)) 
	{
		$i = "group_key.png";
	}
	return $i;
}

// wp action hooks
add_action('admin_head', 'lad_header');
add_action('admin_footer', 'lad_adminmenu');

?>