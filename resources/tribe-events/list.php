<?php
/**
 * List View Template
 * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views
 * as well as those same views filtered to a specific category.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

do_action( 'tribe_events_before_template' );
?>
<section class="row calendar justify-content-center">
	<div class="col-10 calendar-filters">
			<!-- Tribe Bar -->
			<?php tribe_get_template_part( 'modules/bar' ); ?>
	<?php do_action( 'tribe_events_filter_view_after_filters' ); ?>
	</div>
</section>

	<!-- Main Events Content -->
	<section class="calendar-list row">
    <div class="col-sm-10 col-md-10 offset-md-1">
			<?php tribe_get_template_part( 'list/content' ); ?>
		</div>
	</section>
	<div class="tribe-clear"></div>

<?php
do_action( 'tribe_events_after_template' );
