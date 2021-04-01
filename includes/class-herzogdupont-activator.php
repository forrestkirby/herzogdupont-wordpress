<?php

/**
 * Herzog Dupont
 *
 * @package           Herzog Dupont
 * @author            Thomas Weidlich https://herzog-dupont.de
 * @copyright         Copyright (C) Thomas Weidlich
 * @license           GNU General Public License version 3, see LICENSE.txt
 *
 */

// If this file is not called by WordPress, die.
if ( !defined( 'WPINC' ) )
    die;

class Herzogdupont_Activator {

    // Check whether YOOtheme Pro is installed.
    public static function activate() {

        $minimumYOOthemeVersion = '2.4.0';
        $themeData = wp_get_theme('yootheme');
    
        if( !$themeData || !version_compare( $themeData->Version, $minimumYOOthemeVersion, '>=' ) ) {
            deactivate_plugins( plugin_basename( __FILE__ ) );
            wp_die( __( 'You need YOOtheme Pro ' . $minimumYOOthemeVersion . ' or later to activate this plugin.', 'textdomain' ) );
        }

    }

}
