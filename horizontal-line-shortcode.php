<?php

/*
Plugin Name: Horizontal Line Shortcode
Description: Tired of using <hr> tags in the Text Editor? Now you can simply add shortcode [hr] to your content in the Visual Editor to insert a horizontal line.
Plugin URI: http://rocapress.com
Author: RocaPress
Author URI: http://rocapress.com
Version: 1.0
License: GPL2
*/

/*
    Copyright (C) 2015 RocaPress | mika@rocapress.dk

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_shortcode( 'hr', 'rp_hr_shortcode' );
function rp_hr_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'margin-top'        => '',
        'margin-bottom'     => ''
    ), $atts, 'hr' );

    /* Removes 'px' if the user has added it, so the code continues to work */
    $atts[ 'margin-top' ] = str_replace('px', '', $atts[ 'margin-top' ] );
    $atts[ 'margin-bottom' ] = str_replace('px', '', $atts[ 'margin-bottom' ] );

    /* Only add margin-top inline style to the <hr> tag */
    if( $atts[ 'margin-top' ] && ! $atts['margin-bottom'] ) {
        $output = '<hr style="margin-top: ' . $atts[ 'margin-top' ] . 'px;" />';
    }

    /* Only add margin-bottom inline style to the <hr> tag */
    if( $atts[ 'margin-bottom' ] && ! $atts[ 'margin-top' ] ) {
        $output = '<hr style="margin-bottom: ' . $atts[ 'margin-bottom' ] . 'px;" />';
    }

    /* Add margin-top and margin-bottom inline style to the <hr> tag */
    if( $atts[ 'margin-top' ] && $atts[ 'margin-bottom'] ) {
        $output = '<hr style="margin-top: ' . $atts[ 'margin-top' ] . 'px; margin-bottom: ' . $atts[ 'margin-bottom'] . 'px;" />';
    }

    /* Add the <hr> tag without any inline style */
    if( ! $atts[ 'margin-top' ] && ! $atts[ 'margin-bottom' ] ) {
        $output = '<hr />';
    }

    return apply_filters( 'rp_hr_shortcode', $output );
}