<?php
    define( "PLUGIN_FILE_LOCATION" , __FILE__ );    //The name of the plugin file, must be before config.php
    define( "PLUGIN_BASE_URL",plugins_url('/', PLUGIN_FILE_LOCATION) ); //Plugin image wont work without this

    require_once 'config/config.php';
    spl_autoload_register('classes_autoloader');
    require_once APP_FUNCTIONS_PATH.'MainFunction.php';
    require_once APP_FUNCTIONS_PATH.'help-content.php';
   // require_once APP_FUNCTIONS_PATH.'shortcodes.php';
    require_once APP_FUNCTIONS_PATH.'GeneralFunctions.php';

    $pluginPostWatcher = new classes\PostFormWatcher();
    $pluginPostWatcher->pluginPostWatcher();