<?php
/**
 * This is where we declare our shortcodes
 */
namespace classes;

/**
 * Class MyAppNameShortCodes
 * @package classes
 */
class MyAppNameShortCodes {

    /**
     * This is the search function
     */
    public static function myappnameSimpleSearch() {
        add_shortcode( 'myappname-simple-search', 'myappname_simple_search' );
    }

    /**
     * This is the results function
     */
    public static function myappnameimpleSearchResults() {
        add_shortcode( 'myappname-simple-search-results', 'myappname_simple_search_results' );
    }

    /**
     * This is the overview function
     */
    public static function myappnameSimplOverview() {
        add_shortcode( 'myappname-simple-overview', 'myappname_simple_overview' );
    }


}