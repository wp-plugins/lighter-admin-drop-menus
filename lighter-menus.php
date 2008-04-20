<?php
/*
Plugin Name: Lighter Menus
Plugin URI: http://www.italyisfalling.com/lighter-menus
Description: Creates Drop Down Menus for WordPress Admin Panels. Fast to load, adaptable to color schemes, comes with silk icons, a option page,  and a design that fits within the Wordpress 2.5 interface taking the less room possible.
Version: 2.6.1
Author: corpodibacco
Author URI: http://www.italyisfalling.com/coding/
WordPress Version: 2.5
*/

//few definitions
$dir = basename(dirname(__FILE__));
if ($dir == 'plugins') $dir = '';
else $dir = $dir . '/';	
define("LIGHTER_PATH", get_option("siteurl") . "/".PLUGINDIR."/" . $dir);

//prepare for local
$currentLocale = get_locale();
if(!empty($currentLocale)) {
	$moFile = ABSPATH . PLUGINDIR ."/" . $dir . 'lighter-menus-' . $currentLocale . ".mo";
	//check if it is a window server and changes path accordingly
	if ( strpos($moFile, '\\')) $moFile = str_replace('/','\\',$moFile); 
	if(@file_exists($moFile) && is_readable($moFile)) load_textdomain('lighter-menus', $moFile);
}

// Set the stylesheets and scripts
function lad_header(){ 

	global $is_winIE;
	global $plugin_uri;
	
	$options = get_option('lighter_options');
	$displayicons = $options['display_icons'];
	$separatemenus = $options['separate_menus']; 
	$remove_lm = $options['uninstall'];

	if ($displayicons == "1") {
//preloading icons ?>    
<!--Lighter Menus-->
<SCRIPT LANGUAGE="JavaScript">
Image1=new Image(16,16)
Image1.src="<?php echo LIGHTER_PATH.'images/'; ?>information.png"			
Image2=new Image(16,16)
Image2.src="<?php echo LIGHTER_PATH.'images/'; ?>email_edit.png"			
Image3=new Image(16,16)
Image3.src="<?php echo LIGHTER_PATH.'images/'; ?>page_edit.png"			
Image4=new Image(16,16)
Image4.src="<?php echo LIGHTER_PATH.'images/'; ?>link_add.png"			
Image5=new Image(16,16)
Image5.src="<?php echo LIGHTER_PATH.'images/'; ?>folder_table.png"			
Image6=new Image(16,16)
Image6.src="<?php echo LIGHTER_PATH.'images/'; ?>folder_page.png"			
Image7=new Image(16,16)
Image7.src="<?php echo LIGHTER_PATH.'images/'; ?>application_link.png"			
Image8=new Image(16,16)
Image8.src="<?php echo LIGHTER_PATH.'images/'; ?>tag_blue_edit.png"			
Image9=new Image(16,16)
Image9.src="<?php echo LIGHTER_PATH.'images/'; ?>newspaper_link.png"			
Image10=new Image(16,16)
Image10.src="<?php echo LIGHTER_PATH.'images/'; ?>application_view_gallery.png"			
Image11=new Image(16,16)
Image11.src="<?php echo LIGHTER_PATH.'images/'; ?>layout.png"			
Image12=new Image(16,16)
Image12.src="<?php echo LIGHTER_PATH.'images/'; ?>brick.png"			
Image13=new Image(16,16)
Image13.src="<?php echo LIGHTER_PATH.'images/'; ?>layout_edit.png"			
Image14=new Image(16,16)
Image14.src="<?php echo LIGHTER_PATH.'images/'; ?>layout_header.png"			
Image15=new Image(16,16)
Image15.src="<?php echo LIGHTER_PATH.'images/'; ?>attach.png"			
Image16=new Image(16,16)
Image16.src="<?php echo LIGHTER_PATH.'images/'; ?>basket_edit.png"			
Image17=new Image(16,16)
Image17.src="<?php echo LIGHTER_PATH.'images/'; ?>comments.png"			
Image18=new Image(16,16)
Image18.src="<?php echo LIGHTER_PATH.'images/'; ?>comment_add.png"			
Image19=new Image(16,16)
Image19.src="<?php echo LIGHTER_PATH.'images/'; ?>brick_edit.png"			
Image20=new Image(16,16)
Image20.src="<?php echo LIGHTER_PATH.'images/'; ?>report_add.png"			
Image21=new Image(16,16)
Image21.src="<?php echo LIGHTER_PATH.'images/'; ?>report_go.png"			
Image22=new Image(16,16)
Image22.src="<?php echo LIGHTER_PATH.'images/'; ?>folder_link.png"			
Image23=new Image(16,16)
Image23.src="<?php echo LIGHTER_PATH.'images/'; ?>plugin_add.png"			
Image24=new Image(16,16)
Image24.src="<?php echo LIGHTER_PATH.'images/'; ?>plugin_edit.png"			
Image25=new Image(16,16)
Image25.src="<?php echo LIGHTER_PATH.'images/'; ?>user.png"			
Image26=new Image(16,16)
Image26.src="<?php echo LIGHTER_PATH.'images/'; ?>group_key.png"			
Image27=new Image(16,16)
Image27.src="<?php echo LIGHTER_PATH.'images/'; ?>application_view_list.png"			
Image28=new Image(16,16)
Image28.src="<?php echo LIGHTER_PATH.'images/'; ?>pencil.png"			
Image29=new Image(16,16)
Image29.src="<?php echo LIGHTER_PATH.'images/'; ?>zoom.png"			
Image30=new Image(16,16)
Image30.src="<?php echo LIGHTER_PATH.'images/'; ?>group_link.png"			
Image31=new Image(16,16)
Image31.src="<?php echo LIGHTER_PATH.'images/'; ?>lock.png"			
Image32=new Image(16,16)
Image32.src="<?php echo LIGHTER_PATH.'images/'; ?>book_link.png"			
Image33=new Image(16,16)
Image33.src="<?php echo LIGHTER_PATH.'images/'; ?>bullet_wrench.png"	
Image34=new Image(16,16)
Image34.src="<?php echo LIGHTER_PATH.'images/'; ?>group_key.png"	
</SCRIPT><?php } ?>
	
<style type="text/css">	
@charset "utf-8";
/* CSS Document */
<?php /*general CSS*/ 	
if (!$displayicons) { /*in case you want no icons*/ ?>
#adminmenu img {display:none}
<?php } ?>	
#sidemenu, #dashmenu {display: none}	
#media-upload-header #sidemenu {display: block;}
#wphead {
    margin-bottom:10px;
    border-bottom-style:solid;
    border-bottom-width:1px;
    }	
#adminmenu {
    top:0;
    left:0;
    position:absolute;
    height: 24px;
    list-style: none;
    list-style-type: none;
    margin: 0;
    padding: 0;
    padding-top:3px;
    border:none;
    z-index: 3;	
    }	
#adminmenu a {text-decoration: none}		
#adminmenu a.current {
    -moz-border-radius-topleft: 2px;
    -moz-border-radius-topright: 2px;
    border-top-left-radius: 2px;
    border-top-right-radius: 2px;
    -webkit-border-top-right-radius: 2px;
    -webkit-border-top-left-radius: 2px;		
    z-index: 5;
    }		
#adminmenu li {	
    float:left;
    position:relative;
    text-align: left;
    }		
#adminmenu li a {
    display:block;
    text-decoration:none;
    padding: 0px 10px 0px 11px;
    font-weight: normal;
    font-size:small;
    }	
#adminmenu li a #awaiting-mod {
    margin-left: -0.1em;
    margin-top: 0.6em;
    z-index: 6;
    }	
#adminmenu li ul {
    display: none;
    list-style-type: none;
    border-style:solid;
    border-width:1px;
    border-top:none; /* comment this to have smooth opposite corners at the top of the menus */
    -moz-border-radius-bottomleft:4px;
    -moz-border-radius-bottomright:4px;
    border-bottom-right-radius:4px;
    border-bottom-left-radius:4px;
    -webkit-border-bottom-right-radius:4px;
    -webkit-border-bottom-left-radius:4px;		
    padding:0px;
    padding-bottom:10px;
    padding-top:8px;
    min-width:160px;
    z-index: 4;
    }
#adminmenu li ul li {float:none;}			
#adminmenu a.current,#adminmenu li:hover a.current {border:0px;}
#adminmenu li:hover a{height: 27px;}	
#adminmenu li:hover ul {
    display:block;
    position:absolute;
    left:-1px;
    top:27px;
    }	
#adminmenu li:hover ul li a {
    font-size:small;
    line-height: 110%;	
    margin-top: 0px;
    margin-bottom:0px;	
    padding-top:3px;
    padding-bottom:3px;
    padding-right:10px;
    padding-left:10px;	
    min-width:140px;
    height:auto;	
    }
#adminmenu li:hover ul li {width:100%}
#adminmenu li:hover ul li a.current {
    -moz-border-radius-bottomleft:0px;
    -moz-border-radius-bottomright:0px;
    -moz-border-radius-topright:0px;
    -moz-border-radius-topleft:0px;
    border-top-right-radius:0px;
    border-bottom-right-radius:0px;
    border-bottom-left-radius:0px;
    border-top-left-radius:0px;
    -webkit-border-top-right-radius:0px;
    -webkit-border-top-left-radius:0px;
    -webkit-border-bottom-left-radius:0px;
    -webkit-border-bottom-right-radius:0px;
    }
#submenu, #submenu .current, #submenu a, #submenu a:hover, #submenu li {display:none}
.current {font-weight: normal !important;}
#lighter_options fieldset {
    border: none;/* 1px solid #ccc;*/
    padding: 10px;
}	

<?php /*IE specific CSS */
if ($is_winIE) { ?>	
#adminmenu {height: 35px; }		
#wphead{border-top-width: 38px;}
#adminmenu li a:hover {
	border:0px;
	padding-bottom:2px;
	}	
#adminmenu li a, #adminmenu li a:visited {
	padding: 1px 10px;
	line-height: 200%;
	}		
#adminmenu li:hover a{height:auto;}	
#adminmenu li a #awaiting-mod {
	margin-left: -0.2em;
	margin-top: 0.1em;
	}
#adminmenu a.current {height: 35px;}	
#adminmenu li:hover ul {top:35px;}	
#adminmenu li a:hover ul {
	display: block; 
	position: absolute; 
	left: -41px;
	margin-top:0px;
	}
#adminmenu li a:hover ul li{padding-top:0px}
#adminmenu li a:hover ul li a {
	display: block;
	height: auto;
	}		
<?php } 
	
/*Safari specific CSS */
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'safari') !== false) {}
	
$color = get_user_option('admin_color');
/* scheme fresh CSS */
if ( empty($color) || $color == 'fresh' ) {		
if ($separatemenus == '1') { ?>
#adminmenu .speciall {color:#999}
<?php } ?>
#wphead {border-bottom-color:#C6D9E9;}		
#adminmenu {background-color:#464646;}			
#adminmenu li a {color: #D7D7D7;}			
#adminmenu li ul {
	border-top-color:#464646;
	border-left-color:#FFF;
	border-right-color:#FFF;
	border-bottom-color:#FFF;
	background-color:#464646;
	}			
#adminmenu a.current {
	color:#2c2c2c;
	background-color:#E4F2FD;
	}			
#adminmenu li:hover a.current {
	color:#FFF;
	background-color:#464646;	
	}			
#adminmenu li:hover a{
	color:#fff;
	background-color:#464646;
	}		
#adminmenu li:hover ul li a {
	background-color:#464646;
	color:#D7D7D7;	
	}			
#adminmenu li:hover ul li a:hover {
	background-color:#E4F2FD;
	color:#993300;
	}			
#adminmenu li:hover ul li a.current {
	background-color:#E4F2FD;
	color:#555;
	}		
#adminmenu li:hover ul li a.current:hover{
	background-color:#E4F2FD;
	color:#993300;
	}          	
		
<?php /*scheme classic CSS*/  	
} else {  
if ($separatemenus == '1') { ?>
#adminmenu .speciall {color:#ccc}
<?php } ?>
#wphead {border-bottom-color:#07273E;}	
#adminmenu {background-color:#07273E;}		
#adminmenu li a {color: #88B4D7;}	
#adminmenu li ul {	
	border-top-color:#07273E;
	border-left-color:#14568A;
	border-right-color:#14568A;
	border-bottom-color:#14568A;
	background-color:#07273E;
	}		
#adminmenu a.current {
	color:#CFEBF6;
	background-color:#14568A;
	}		
#adminmenu li:hover a.current {
	background-color:#07273E;
	color:#FFF		
	}		
#adminmenu li:hover a{
	color:#fff;
	background-color:#07273E;
	}	
#adminmenu li:hover ul li a {
	background-color:#07273E;
	color:#D7D7D7;	
	}		
#adminmenu li:hover ul li a:hover {
	background-color:#14568A;
	color:#FFF;
	}		
#adminmenu li:hover ul li a.current {
	background-color:#14568A;
	color:#CCC;
	}
#adminmenu li:hover ul li a.current:hover{
	background-color:#14568A;
	color:#FFF;
	}  	
<?php } ?>	
</style>
<!--end Lighter Menus-->
    
<?php }

// builds an array populated with all the infos needed for menu and submenu
function lad_adminmenu_build (){ 

	global $menu, $submenu, $plugin_page, $pagenow;

	$self = preg_replace('|^.*/wp-admin/|i', '', $_SERVER['PHP_SELF']);
	$self = preg_replace('|^.*/plugins/|i', '', $self);
	
	/* Make sure that "Manage" always stays the same. I have no idea what's this is for. */
	$menu[5][0] = __("Write");
	$menu[5][1] = "edit_posts";
	$menu[5][2] = "post-new.php";
	$menu[10][0] = __("Manage");
	$menu[10][1] = "edit_posts";
	$menu[10][2] = "edit.php";

	$altmenu = array();

	/* Step 1 : populate first level menu as per user rights */
	foreach ($menu as $key => $item) 
 	{
	
	//select main menu
	if ($separatemenus = "1"){
	if ( $key > 29 && $key < 41 )continue;
	}
		
		// 0 = name, 1 = capability, 2 = file
		if ( current_user_can($item[1]) ) 
		{
			$sys_menu_file = $item[2];

			if ( file_exists(ABSPATH .  PLUGINDIR ."/{$item[2]}") )
			{
				$altmenu[$sys_menu_file]['url'] = get_option('siteurl') . "/wp-admin/admin.php?page={$item[2]}";
			} else {
				$altmenu[$sys_menu_file]['url'] = get_option('siteurl') . "/wp-admin/{$item[2]}";
			}
			if (( strcmp($self, $item[2]) == 0 && empty($parent_file)) || ($parent_file && ($item[2] == $parent_file)))
				$altmenu[$sys_menu_file]['class'] = " class='current'";
			else {
				
				if ($item[0] == "Dashboard"){$altmenu[$sys_menu_file]['class'] = " class='speciall'";/*$item[0] = "Dashboard |";*/}
				
				//it took me a while to figure out this NOT neat way to feedback when editing existing posts or pages. please give credit! :P				
				elseif ( strpos($_SERVER['REQUEST_URI'], 'post.php?action') !== false && $item[2] == 'edit.php') 
				$altmenu['edit.php']['class'] = " class='current'";
				elseif ( strpos($_SERVER['REQUEST_URI'], 'page.php?action') !== false && $item[2] == 'edit.php') 
				$altmenu['edit.php']['class'] = " class='current'";				
				elseif ( strpos($_SERVER['REQUEST_URI'], 'link.php?link_id') !== false && $item[2] == 'edit.php') 
				$altmenu['edit.php']['class'] = " class='current'";	
				elseif ( strpos($_SERVER['REQUEST_URI'], 'comment.php?action') !== false && $item[2] == 'edit.php') 
				$altmenu['edit-comments.php']['class'] = " class='current'";
				elseif ( strpos($_SERVER['REQUEST_URI'], 'admin.php?page='.$item[2]) !== false) 
				$altmenu[$item[2]]['class'] = " class='current'";
				
				}				
			
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
				if (file_exists(ABSPATH .  PLUGINDIR ."/{$item[2]}") || ! empty($menu_hook)) 
				{
					$mtype = "<img src='" . LIGHTER_PATH . "plugin.png' height='16' width='16' alt=''/>&nbsp;";
					if(! lad_top_menu_plugin( $altmenu[$key]['name'] ))
					{
						$link = get_option('siteurl') . "/wp-admin/admin.php?page={$item[2]}";
					} else {
						$link = get_option('siteurl') . "/wp-admin/{$key}?page={$item[2]}";
					}
				} else {
					$icon = lad_add_icons($item[0]);
					$mtype = "<img src='" . LIGHTER_PATH . $icon . "' height='16' width='16' alt=''/>&nbsp;"; 
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
	
	/* Step 3 : populate first level menu as per user rights for settings,plugins an users */
	if ($separatemenus = "1"){ //doing this only if you actually want to separate the two menus
		foreach ($menu as $key => $item) 
		{
		if ( $key < 30 && $key > 40 ) // get each menu item before 3
			continue;
			
			// 0 = name, 1 = capability, 2 = file
			if ( current_user_can($item[1]) ) 
			{
				$sys_menu_file = $item[2];
	
				if ( file_exists(ABSPATH .  PLUGINDIR ."/{$item[2]}") )
				{
					$altmenu[$sys_menu_file]['url'] = get_option('siteurl') . "/wp-admin/admin.php?page={$item[2]}";
				} else {
					$altmenu[$sys_menu_file]['url'] = get_option('siteurl') . "/wp-admin/{$item[2]}";
				}
				if (( strcmp($self, $item[2]) == 0 && empty($parent_file)) || ($parent_file && ($item[2] == $parent_file)))
					$altmenu[$sys_menu_file]['class'] = " class='current'";
				else {
	
					if ($item[0] == "Settings"){$altmenu[$sys_menu_file]['class'] = " class='speciall'";/*$item[0] = " Settings";*/}	
					if ($item[0] == "Plugins")$altmenu[$sys_menu_file]['class'] = " class='speciall'";	
					if ($item[0] == "Users")$altmenu[$sys_menu_file]['class'] = " class='speciall'";				
					}				
				
				$altmenu[$sys_menu_file]['name'] = $item[0];
			}
		}

		/* Step 4 : populate second level menu for settings,plugins an users  */	
		foreach ($submenu as $key=>$value)
		{
			foreach ($value as $item) 
			{
				if (array_key_exists($key,$altmenu) and current_user_can($item[1])) 
				{
					// What's the link ?
					$menu_hook = get_plugin_page_hook($item[2], $key);
					if (file_exists(ABSPATH .  PLUGINDIR ."/{$item[2]}") || ! empty($menu_hook)) 
					{
						$mtype = "<img src='" . LIGHTER_PATH . "images/plugin.png' height='16' width='16' alt=''/>&nbsp;";
						if(! lad_top_menu_plugin( $altmenu[$key]['name'] ))
						{
							$link = get_option('siteurl') . "/wp-admin/admin.php?page={$item[2]}";
						} else {
							$link = get_option('siteurl') . "/wp-admin/{$key}?page={$item[2]}";
						}
					} else {
						$icon = lad_add_icons($item[0]);
						$mtype = "<img src='" . LIGHTER_PATH . $icon . "' height='16' width='16' alt=''/>&nbsp;"; 
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
	}
	
	return ($altmenu);
}

// creates the new set of <ul> and <li> for the admin menus
function lad_adminmenu(){ 

	global $is_winIE;

	$menu = lad_adminmenu_build();

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
			$ladaut_menu .= "";
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

//The javascript bits that replace the existing menu by our new one 
function lad_adminmenu_printjs ($admin = '', $sub = 1) 
{
	print "<script>
	document.getElementById('adminmenu').innerHTML=\"$admin\";";
	if ($sub) print "document.getElementById('submenu').innerHTML=\"<li>&nbsp;</li>\"";
	print "</script>";
}

function lad_top_menu_plugin($menuname){

	if(strpos(' Dashboard Write Manage Design Comments Settings Plugins Users', $menuname))
	{
		return true;
	}
	return false;
}

// add the icons to the sub menu items
function lad_add_icons($menuitem){ 

	$options = get_option('lighter_options');
	$displayicons = $options['display_icons'];

	if ($displayicons == "1") {
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
		return 'images/'.$i;
	}
}

function lad_option_page(){

	// Check Whether User Can Manage Options
	if(!current_user_can('manage_options'))die('Access Denied'); 
	
	$mode = trim($_GET['mode']);
	
	//handle the post event
	if(!empty($_POST['do'])) {
		switch($_POST['do']) {
			case 'Update' :
				$lmoptions = array('display_icons' => $_POST['disp_ico'],'separate_menus' => $_POST['sep_menu'],'uninstall' => '', 'folder' => '');
				$update_lighter_options = update_option('lighter_options', $lmoptions);		
				if ($update_lighter_options) { ?>
                <div id="message" class="updated fade"><p><strong><?php echo _e('Options saved.', 'lighter-menus') ?></strong></p></div><?php }	
			break;
			
			case 'Deactivate' :
				$lmoptions = get_option('lighter_options');
				$lmoptions = array('display_icons' => $lmoptions['display_icons'],'separate_menus' => $lmoptions['separate_menus'],'uninstall' => $_POST['remove'],'folder' => $_POST['folder']);
				$update_lighter_options = update_option('lighter_options', $lmoptions);		
				$mode = 'end-UNINSTALL';			
			break;				
		}
		
	}	
	
	switch($mode) {
		//  Deactivating
		case 'end-UNINSTALL':
				$deactivate_url = get_option("siteurl"). '/wp-admin/plugins.php?action=deactivate&plugin=lighter_menus/lighter-menus.php';
				if(function_exists('wp_nonce_url'))	$deactivate_url = wp_nonce_url($deactivate_url, 'deactivate-plugin_lighter_menus/lighter-menus.php');			       
	 
				//feedback the deletion option
				$message1 = ''; $message2 = '';
				$lmoptions = get_option('lighter_options'); 
				if( is_array($lmoptions) && ($lmoptions['uninstall'] == 1) ) $message1 = _e('The plugin options will be removed.', 'lighter-menus');
				if( is_array($lmoptions) && ($lmoptions['folder'] == 1) ) $message2 = _e('The plugin folder will be removed.', 'lighter-menus');	

				?><div class="wrap"><h2><?php echo _e('Uninstall Lighter Menus', 'lighter-menus') ?></h2>
				<p><?php if ($message1 != '') { echo '<font color="#990000">'.$message1.'</font>' ?> <br /><?php } ?>
                <?php if ($message2 != '') { echo '<font color="#990000">'.$message2.'</font>' ?> <br /><?php } ?>
                <strong><a href=" <?php echo $deactivate_url ?>">
				<?php echo _e('Click Here</a> to uninstall Lighter Menus.', 'lighter-menus'); ?>
				</strong></p></div><?php
			break;
			
	// Main Page
	default:
	
	$lmoptions = array();
	$lmoptions = get_option('lighter_options');
	
	$displayicons = $lmoptions['display_icons'];
	$separatemenus = $lmoptions['separate_menus']; 
	$removelm = $lmoptions['uninstall'];
	$folderlm = $lmoptions['folder'];

	if ( $displayicons) $displayicons_selected = 'checked';
	if ( $separatemenus) $separatemenus_selected = 'checked';
	if ( $removelm) $remove_lm_selected = 'checked';
	if ( $folderlm) $folder_lm_selected = 'checked';	
	
	?>		

	<?php /*options*/ ?>
	<div id="lighter_options"><div class="wrap"><br/><h2>Lighter Menus - <?php echo _e('Customization Options','lighter-menus') ?></h2><br/>
	<?php echo _e('These options can be used to customize the appearance of the menus. Refresh to appreciate the results.','lighter-menus') ?><br/><br/>
    
	<form method="post" action="<?php $_SERVER['REQUEST_URI'] ?>">	
	<fieldset><legend>Icons</legend>
    <img src="<?php echo LIGHTER_PATH; ?>/images/icons.png" style="border:none; margin-right:10px; vertical-align:middle"/>
    <input type="checkbox" name="disp_ico" value="1" <?php echo $displayicons_selected ?> />
    <?php echo _e('Display icons in the menus.','lighter-menus') ?>
    </fieldset>
	
	<fieldset><legend>Menus</legend>
    <img src="<?php echo LIGHTER_PATH; ?>/images/menus.png" style="border:none; margin-right:10px; vertical-align:middle"/>
    <input type="checkbox" name="sep_menu" value="1" <?php echo $separatemenus_selected ?> />
	<?php echo _e('Differentiate and keep the "Settings" "Plugin" and "Users" menus to the right side of the main menu.','lighter-menus') ?></p>	
	</fieldset>
    <input type="hidden" name="do" value="Update" />
	<div class="submit"><input type="submit" value="<?php echo _e('Update Options &raquo;', 'lighter-menus') ?>" /></div>
    </form></div><br/>
    
    <?php /*uninstall*/ ?>
    <div class="wrap"><br/><h2>Lighter Menus - <?php echo _e('Deactivation','lighter-menus') ?></h2><br/>
    <?php echo _e('Use this to deactivate Lighter Menus and optionally remove it completely.','lighter-menus') ?><br/><br/>   
       
	<form method="post" action="<?php $_SERVER['REQUEST_URI'] ?>">
    <fieldset>
    <input type="checkbox" name="remove" value="1" <?php echo $remove_lm_selected ?> />
    <?php echo _e('Remove the above options from the database.','lighter-menus') ?>
    </fieldset>
    
    <fieldset>
    <input type="checkbox" name="folder" value="1" <?php echo $folder_lm_selected ?> />
    <?php echo _e('Remove the plugin folder.','lighter-menus') ?>
    </fieldset>
        
    <input type="hidden" name="do" value="Deactivate" />
	<div class="submit"><input type="submit" value="<?php echo _e('Deactivate Lighter Menus &raquo;','lighter-menus') ?>" /></div>
    </form></div>    


    <?php /*link footer*/ ?>    
    <div style="text-align:center;" class="wrap" >
    <ul><li style="display:inline;list-style:none;">
    <a href="http://www.italyisfalling.com/http://www.italyisfalling.com/lighter-admin-drop-menus-wordpress-plugin/">
	<?php echo _e('Plugin\'s Homepage','lighter-menus') ?></a> | </li>
    <!--<li style="line-height:1em;display:inline;list-style:none;letter-spacing:0.5%;">Donate | </li>-->
    <li style="display:inline;list-style:none;"><a href="http://www.italyisfalling.com/coding"><?php echo _e('Other plugins','lighter-menus') ?></a></li>
    </ul></div></div>
    
	
	<?php } //end switch mode
}

function lad_add_pages() {

	add_theme_page( __('Lighter Menus Options','lighter-menus'),'Lighter Menus', 9, basename(__FILE__), 'lad_option_page');
}

//upon activation
function lighter_activation() {

	//must see if old options exist even if empty
	global $wpdb;
	$sql1 = "SELECT option_name FROM $wpdb->options WHERE option_name = 'lad_display_icons'";
	$opt1 = $wpdb->get_var($sql1);
	$sql2 = "SELECT option_name FROM $wpdb->options WHERE option_name = 'lad_separate_menus'";
	$opt2 = $wpdb->get_var($sql2);
   
	//convert pre-2.6.1 options
	if ($opt1) {
		$temp_1 = get_option('lad_display_icons');
		delete_option('lad_display_icons');
	} else $temp_1 =  1;
	
	if ($opt2) {
		$temp_2 = get_option('lad_separate_menus');
		delete_option('lad_separate_menus');
	} else $temp_2 =  1;

	//creates new array option
	$lmoptions = get_option('lighter_options');
    if( false === $lmoptions ) {
	
        $lmoptions = array();
        $lmoptions['display_icons'] = $temp_1;
        $lmoptions['separate_menus'] = $temp_2;
		$lmoptions['uninstall'] = '';
		$lmoptions['folder'] = '';
		
        add_option('lighter_options', $lmoptions);
    }
}

//upon deactivation
function lighter_deactivation() {

	global $wp_filesystem;
    $lmoptions = get_option('lighter_options');    

	//delete the folder
	if ($lmoptions['folder'] == 1) {
		
		//few things stolen from wp_includes/update.php
		// Is a filesystem accessor setup?
		if ( ! $wp_filesystem || !is_object($wp_filesystem) ) WP_Filesystem();	
		
		if ( ! is_object($wp_filesystem) ) return new WP_Error('fs_unavailable', __('Could not access filesystem.'));
		if ( $wp_filesystem->errors->get_error_code() ) return new WP_Error('fs_error', __('Filesystem error'), $wp_filesystem->errors);

		// Remove the existing plugin.
		$dir = realpath(dirname(__FILE__));	
		
		//could something like this actually happen?
		if ( substr($dir,strlen($dir)-7) == 'plugins' || substr($dir,strlen($dir)-8) == 'wp-admin' || substr($dir,strlen($dir)-11) == 'wp-includes')
		return new WP_Error('delete_failed', __('Failure. The plugin is not in its own folder, or there is something else going on.'));
	
		//check if it is a window server and changes path accordingly (so that it works on your xampp too.)
		$dir = $dir . '/';		
		if ( strpos($dir, '\\')) $dir = str_replace('/','\\',$dir);
		//cross your fingers, it is going to delete. This actually deleted my wp-admin folder once.

		$deleted = $wp_filesystem->delete($dir, true);		
		if ( !$deleted ) return new WP_Error('delete_failed', __('Could not remove the plugin folder'));		
	}	
	 
	//delete the options
	if($lmoptions['uninstall'] == 1) delete_option('lighter_options');	
	
}

//hook into WP
register_activation_hook(__FILE__, 'lighter_activation');
register_deactivation_hook(__FILE__, 'lighter_deactivation');
add_action('admin_head', 'lad_header',0,99);
add_action('admin_footer', 'lad_adminmenu');
add_action('admin_menu', 'lad_add_pages');

?>