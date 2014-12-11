<?php

/**
 * SHORT CODE ENGINE
 *
 */

/**
 * @param $atts
 * @return string
 */
function myappname_simple_search($atts) { // [myappname-simple-search]

    $nonce = wp_nonce_field('myappname_nonce_action','myappname_nonce');

    //GRAB THE SEARCH TEMPLATE
    $output = file_get_contents(APP_TEMPLATE_PATH."SearchTemplate.html");

    $output = str_replace( '$$NONCE$$' , $nonce , $output );

    /*
     * SEND FORM OUTPUT TO WORDPRESS
     */

    return $output;
}

/**
 * @param $atts
 * @return mixed
 */
function myappname_simple_search_results($atts) {  //[tmyappname-simple-search-results]

    global $publicPostWatcher;

    $output = "";

    if (isset($publicPostWatcher->postInfo['search']))
    {
        //Get the template
        $output = file_get_contents(APP_TEMPLATE_PATH."SearchResultTemplate.html");

        //Set the URL params
        $url_params = array( 'myappname_overview' => '123' );

        //Set the Image links
        $image  = "http://lin-to-your-great-image.com/image.png";

        //Reaplce image macro
        $output = str_replace( '$$MYAPPNAME_IMAGE$$' , $image , $output);

        //Reaplce url macro
        $output = str_replace( '$$MYAPPNAME_URL$$' , add_query_arg( $url_params ) , $output);

    }

    return $output;

}

/**
 * @param $atts
 * @return mixed
 */
function myappname_overview($atts) {  //[myappname-overview]

    global $publicPostWatcher;

    $output = "no overview";

    if (isset($publicPostWatcher->postInfo['myappname_overview']))
    {
        //Pull the feed from the api and build the search results
        $output = file_get_contents(APP_TEMPLATE_PATH."OverviewTemplate.html");



    }

    return $output;

}


