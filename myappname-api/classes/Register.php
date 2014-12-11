<?php
/**
 * This registers the application
 */
namespace classes;

/**
 * Class Register
 * @package classes
 */
class Register {

    public static function app($file) {
        register_activation_hook( $file , 'activate_myappname' );
    }
}