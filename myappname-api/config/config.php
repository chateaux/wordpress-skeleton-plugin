<?php
/**
 * Setup the applicaiton version
 */
define("APP_VERSION",'1.0');

/**
 * Define the correct paths to use in the applications
 */
define("APP_CLASS_PATH", plugin_dir_path( PLUGIN_FILE_LOCATION ) . "classes/");
define("APP_CSS_PATH", plugin_dir_path( PLUGIN_FILE_LOCATION ) . "css/");
define("APP_FUNCTIONS_PATH", plugin_dir_path( PLUGIN_FILE_LOCATION ) . "functions/");
define("APP_TEMPLATE_PATH", plugin_dir_path( PLUGIN_FILE_LOCATION ) . "template/");
define("APP_IMAGES_PATH", plugin_dir_path( PLUGIN_FILE_LOCATION ) . "images/");
define("APP_IMAGES_URL", PLUGIN_BASE_URL . "images/");
define("APP_INCLUDES_PATH", plugin_dir_path( PLUGIN_FILE_LOCATION ) . "includes/");
define("APP_JS_LOCATION_PATH", plugin_dir_path( PLUGIN_FILE_LOCATION ) ."js/");
define("APP_JS_LOCATION_URL", PLUGIN_BASE_URL ."js/");

/**
 * Define our URL paths
 */
define("URL_HOME", home_url());
define("URL_SITE", site_url());

/**
 * If we decide to use a DB table we setup the DB name constants here (makes life easier)
 */
//DEFINE DB TABLES
//Note we use the $wpdb global object which would be setup in the pre.admin.php file
//    global $wpdb;  //This is defined by worrdpress
//    define("MYAPPNAME_CATEGORIES", $wpdb->prefix."myappname_categories");
//    define("MYAPPNAME_PRODUCTS", $wpdb->prefix."myappname_api");
//    define("MYAPPNAME_PRODUCT_CATEGORIES", $wpdb->prefix."myappname_apiCategories");

/**
* The site_url() and home_url() functions are similar and can lead to confusion in how they work.
* The site_url() function retrieves the value as set in the wp_options table value for siteurl in
* your database. This is the URL to the WordPress core files. If your core files exist in a
* subdirectory /wordpress on your web server, the value would be http://example.com/wordpress.
*
* The home_url() function retrieves the value for home in the wp_options table. This is the address
* you want people to visit to view your WordPress web site. If your WordPress core files exist in /wordpress,
* but you want your web site URL to be http://example.com the home value should be http://example.com.
*/

define("APP_URL_ADMIN", admin_url());
define("APP_URL_CONTENT", content_url());
define("APP_URL_INCLUDES", includes_url());
define("APP_URL_PLUGINS", plugins_url());

/**
 * NONCE FIELD NAMES TO SECURE OUR FORMS
 */
define("MYAPPNAME_NONCE_FIELD_NAME", 'JustWriteAnyOldRandomStringHere');

/**
 * This class helps load our class files on the fly...
 */
require_once APP_FUNCTIONS_PATH.'autoloader.php';


	
	