<?php

/* Herzog Dupont Copyright (C) 2021 Thomas Weidlich GNU GPL v3 */

// If this file is not called by WordPress, die.
if ( !defined( 'WPINC' ) )
    die;

class Herzogdupont_Activator {

    // Check whether YOOtheme Pro is installed.
    public static function activate() {

        $minimumYOOthemeVersion = '2.5.0';
        $themeData = wp_get_theme('yootheme');
    
        if( !$themeData || !version_compare( $themeData->Version, $minimumYOOthemeVersion, '>=' ) ) {
            deactivate_plugins( plugin_basename( __FILE__ ) );
            wp_die( __( 'You need YOOtheme Pro ' . $minimumYOOthemeVersion . ' or later to activate this plugin.', 'textdomain' ) );
        }

    }

}
