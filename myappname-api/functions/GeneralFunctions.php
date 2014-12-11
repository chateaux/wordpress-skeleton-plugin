<?php
/**
 *  Create our top level menu item -> add_menu_page( $page_title, $menu_title, $capability, $menu_slug,$function, $icon_url, $position );
 */
function make_myappname_menu() {
    $menu_overview = add_menu_page( 'Api administration','MyAppName', 'manage_options','myappname_api', 'myappname_overview',APP_IMAGES_URL.'app_icon.png' );

    /**
     * Add the page helper items
     */
    $helper_object = new classes\Help();

    if ($menu_overview) {
        $helper_object->load($menu_overview);
    }

}

/**
 * Function to setup the application, again note, IF we decide to use DB we setup the names in the config.
 */
function activate_myappname() {
    $activate = new classes\MyAppNameSettings();
    $activate->setupApplication();
}
