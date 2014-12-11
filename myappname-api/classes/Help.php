<?php
/**
 * This is the help function, it delivers help content to the admin page
 * functions/help-content.php contains the information
 */
namespace classes;

/**
 * Class Help
 * @package classes
 */
class Help {

    /**
     * @param $menu_name
     */
    function load($menu_name) {
        add_action( 'load-' . $menu_name , array($this,'get_help_faq_content' ) );
    }

    /**
     *
     */
    function get_help_faq_content()
    {
        $screen = get_current_screen();
        //echo $screen->base;
        /*
         *   Help instructions for the overview section
         */
        if ($screen->base == 'toplevel_page_myappname_api') {

            $screen->add_help_tab( array(
                'id'       => 'function_myappname_help_overview',
                'title'    => 'Overview page',
                'callback' => 'function_myappname_help_overview'
            ) );

            /**
             * Keep adding your tabs here i.e.
             *
             *
                 $screen->add_help_tab( array(
                    'id'       => 'function_myappname_help_xxx',
                    'title'    => 'XXX Help page',
                    'callback' => 'function_myappname_help_xxx'
                ) );

             *
             */

            $screen->set_help_sidebar( '<p></p>' );


        }
    }
}