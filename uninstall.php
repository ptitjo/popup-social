<?php

// If uninstall not called from WordPress exit
defined( 'WP_UNINSTALL_PLUGIN' ) or die( 'Cheatin&#8217; uh?' );

/**
 * Delete options popup from option table
 *
 * @since 1.0
 */
delete_option( 'popup' );