<?php
/**
 * This initializes the top menu of the admin
 *
 */
namespace classes;

/**
 * Class Menu
 * @package classes
 */
class Menu {
    public static function build() {
        add_action( 'admin_menu', 'make_myappname_menu' );
    }
}