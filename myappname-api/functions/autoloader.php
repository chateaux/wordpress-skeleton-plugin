<?php

/**
 * Auto Loader for the classes namespace
 * @param $name
 * @throws Exception
 */
function classes_autoloader($name) {

    $classes_namespace = 'classes\\';

    if ( substr($name, 0, 8) == $classes_namespace ) {
        $filename = APP_CLASS_PATH . str_replace($classes_namespace, '', $name) . '.php';
        if ( file_exists ($filename) ) {
            require_once $filename;
        } else {
            throw new Exception("Unable to load $name.");
        }
    }

}
