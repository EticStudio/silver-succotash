<?php 
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/**
 * Planning cron
 * If the task is not programmed, it is automatically triggered
 *
 * @since 1.4.2
 */
add_action( 'init', '_imagify_rating_scheduled' );
function _imagify_rating_scheduled() {
	if ( ! wp_next_scheduled( 'imagify_rating_event' ) && ! get_site_transient( 'do_imagify_rating_cron' ) ) {
		wp_schedule_event( time(), 'daily', 'imagify_rating_event' );
	}
}

/**
 * Saved the user images count to display it later
 * in a notice message to ask him to rate Imagify on WordPress.org
 *
 * @since 1.4.2
 */
add_action( 'imagify_rating_event', '_do_imagify_rating_cron' );
function _do_imagify_rating_cron() {	
	// Stop the process if the plugin isn't installed since 3 days
	if ( get_site_transient( 'imagify_seen_rating_notice' ) ) {
		return;
	}

	// Check if the Imagify servers & the API are accessible
	if ( ! is_imagify_servers_up() ) {
		return;
	}
	
	$user = get_imagify_user();
	
	if ( isset( $user ) && (int) $user->image_count > 100 ) {
		set_site_transient( 'imagify_user_images_count', $user->image_count );
	}
}

/**
 * Adds weekly interval for cron jobs
 *
 * @since 1.6
 * @author Remy Perona
 *
 * @param Array $schedules An array of intervals used by cron jobs
 * @return Array Updated array of intervals
 */
add_filter( 'cron_schedules', 'imagify_purge_cron_schedule' );
function imagify_purge_cron_schedule( $schedules ) {
    if ( array_key_exists( 'weekly', $schedules ) ) {
        return $schedules;
    }

    $schedules['weekly'] = array(
        'interval' => 604800,
        'display'  => __( 'weekly', 'imagify' )
    );

	return $schedules;
}

/**
 * Planning cron task to update weekly the size of the images and the size of images uploaded by month
 * If the task is not programmed, it is automatically triggered
 *
 * @since 1.6
 * @author Remy Perona
 */
add_action( 'init', '_imagify_update_library_size_calculations_scheduled' );
function _imagify_update_library_size_calculations_scheduled() {
    if ( ! wp_next_scheduled( 'imagify_update_library_size_calculations_event' ) ) {
        wp_schedule_event( time(), 'weekly', 'imagify_update_library_size_calculations_event' );
    }
}

/**
 * Cron task to update weekly the size of the images and the size of images uploaded by month
 *
 * @since 1.6
 * @author Remy Perona
 */
add_action( 'imagify_update_library_size_calculations_event', '_do_imagify_update_library_size_calculations' );
function _do_imagify_update_library_size_calculations() {
    imagify_do_async_job( array( 
        'action' => 'imagify_update_estimate_sizes',
        '_ajax_nonce' => wp_create_nonce( 'update_estimate_sizes' ),
    ) );
}