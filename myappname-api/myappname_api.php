<?php
	/*
		Plugin Name: Wordpress Skeleton Plugin
		Plugin URI: http://www.southeasterdesign.com
		Description: To get you started with plugin development
		Version: 1.0
		Author: Southeaster Design
		Author URI: http://www.southeasterdesign.com
		License: FREE TO THOSE THAT OCNTRIBUTE :)

		READ THIS: http://wp.smashingmagazine.com/2011/03/08/ten-things-every-wordpress-plugin-developer-should-know/
	*/

/**
 * If you are in the admin, then we only load the admin files
 */
if ( is_admin() )
    {
        require_once 'pre.admin.php';
        classes\Register::app(__FILE__);      //Register the app using a static function
        classes\Menu::build();                //We use this to build the administration menu
    }

/**
 *  If you are not in the admin, then you are in the public... so we load public files
 */
else

    {
        require_once 'pre.public.php';
        classes\MyAppNameShortCodes::myappnameSimpleSearch();  //Registers shortcodes required by the site
        classes\MyAppNameShortCodes::myappnameSimpleSearchResults();
        classes\MyAppNameShortCodes::myappnameSimpleStoneOverview();

    }



