<?php
/**
 * Filter View Template
 * This contains the hooks to generate a filter sidebar.
 *
 * Override this template in your own theme by creating a file at:
 *
 *     [your-theme]/tribe-events/filter-bar/filter-view-horizontal.php
 *
 * @package TribeEventsCalendar
 * @since  1.0
 * @author Modern Tribe Inc.
 * @version 4.8.0
 *
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }

do_action( 'tribe_events_filter_view_before_template' );
?>

<?php
do_action( 'tribe_events_filter_view_after_template' );

