/*! CWP Theme - v0.1.0 - 2015-02-27
 * http://CalderaWP.com
 * Copyright (c) 2015; * Licensed GPLv2+ */
/** globals jQuery, cwp_theme**/
 ( function( window, undefined ) {
	'use strict';
    jQuery(document).ready(function($) {
        $( document ).ajaxComplete(function( event, xhr, settings ) {
           console.log( event );
        });
    });

 } )( this );
