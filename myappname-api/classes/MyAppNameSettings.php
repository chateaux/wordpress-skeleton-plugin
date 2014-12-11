<?php
/**
 * This outlines the applicaitons settings
 */
namespace classes;

/**
 * Class MyAppNameSettings
 * @package classes
 */
class MyAppNAmeSettings {

    /**
     * @var $installedVersion
     */
    public $installedVersion;

    /**
     *  If we need DB related info it can be setup here
     */
    function __construct()
    {
//        global $wpdb;
//        $this->db = $wpdb;
    }

    function clear()
    {
        $this->installedVersion     = "";
    }

    /**
     * Get the current version of the applicaiton
     */
    function getInstalledVersion() {
        $this->installedVersion = get_option('myappname_version_number');
    }

    /**
     * Set the current version of the application
     */
    function setInstalledVersion() {
        $this->installedVersion = add_option('myappname_version_number',APP_VERSION);
    }

    /**
     *  Setup the application, if we need DB tables we create them here
     */
    function setupApplication() {
        //Check if there is a version in the wp DB
        $this->getInstalledVersion();
        //$this->createDatabase();
    }

    /**
     * App Version control is important as it will help us update the DB tables between versions
     * If you want to use your own tables, you setit up here.
     */
    function createDatabase() {
        $sql = "";

        /**
         * Example of how we use the app version to build the tables
         * please note you will need to add the table names to the config...
         *
         */

//        if ( ($this->installedVersion == '' AND APP_VERSION == 1.0) OR ( $this->installedVersion == 1.0 AND APP_VERSION == 1.0 ) ) {
//            $sql = "
//            CREATE TABLE `".MYAPPNAME_API"` (
//              `id` INT(11) NOT NULL AUTO_INCREMENT,
//              `name` VARCHAR(255) NOT NULL,
//              `acc_code` VARCHAR(25) NOT NULL,
//              `is_active` TINYINT(1) NOT NULL DEFAULT '1',
//              `description` TEXT NOT NULL,
//              PRIMARY KEY (`product_id`)
//            );
//            CREATE TABLE `".MYAPPNAME_PRODUCTS_CATEGORIES."` (
//              `id` INT(11) NOT NULL,
//              `category_id` INT(11) NOT NULL
//            );
//            ";
//        }

//        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
//        dbDelta($sql);
//
//        //Update the wp table to the current version
//        $this->setInstalledVersion();
    }

}
