<?php
	// If uninstall not called from WordPress exit 
	if ( !defined("WP_UNINSTALL_PLUGIN") )
		exit ();
	
	// Delete option from options table
    if ( get_option( 'myappname_api' ) != false ) {
        delete_option( 'myappname_api' );
    }