<?php
    define( "PLUGIN_FILE_LOCATION" , __FILE__ );    //The name of the plugin file, must be before config.php
    define( "PLUGIN_BASE_URL",plugins_url('/', PLUGIN_FILE_LOCATION) ); //Plugin image wont work without this

    require_once 'config/config.php';
    spl_autoload_register('classes_autoloader');                        //Configurations (mainly constants)
    require_once APP_CLASS_PATH.'MyAppNameShortCodes.php';              //Shortcodes used in the website
    require_once APP_CLASS_PATH.'PostFormWatcherPublic.php';            //Used to monitor public posts
    require_once APP_CLASS_PATH.'MyAppNameSearch.php';

    require_once APP_FUNCTIONS_PATH.'shortcodes.php';

    //Initiate our post form watcher to keep an eye on our plugins posts
    $publicPostWatcher = new classes\PostFormWatcherPublic();
    $publicPostWatcher->plublicPostWatcher();



