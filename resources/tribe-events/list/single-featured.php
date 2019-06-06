<?php
/**
 * List View Single Featured Event
 * This file contains one featured event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-featured.php
 *
 * @version 4.6.19
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

//Start Date & Time
$start_month = tribe_get_start_date(null,false,'F');
$start_date = tribe_get_start_date(null,false,'j');
$start_time = tribe_get_start_date(null,false,'g:i a');
$end_date = tribe_get_display_end_date(null,false,'j');
$end_time = tribe_get_display_end_date(null,false,'g:i a');


?>
<div class="row full-width justify-content-center no-gutters">
	<div class="col-10">
		<div class="row no-gutters">
			<div class="col-3">
				<!-- Schedule & Recurrence Details -->
				<div class="tribe-event-schedule-details">
					<span class="month"><?php echo $start_month ?></span>
					<span class="date"><?php echo $start_date ?>-<?php echo $end_date ?></span>
					<span class="time"><?php echo $start_time ?> - <?php echo $end_time ?></span>
					<span class="caption">Featured Event</span>
				</div>
			</div>
			<div class="col-9 event-details">
				<!-- Event Title -->
				<?php do_action( 'tribe_events_before_the_event_title' ) ?>
				<h3 class="tribe-events-list-event-title">
					<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
						<?php the_title() ?>
					</a>
				</h3>
				<?php do_action( 'tribe_events_after_the_event_title' ) ?>


				<!-- Event Cost -->
				<?php if ( tribe_get_cost() ) : ?>
					<div class="tribe-events-event-cost featured-event">
						<span class="ticket-cost"><?php echo esc_html( tribe_get_cost( null, true ) ); ?></span>
						<?php
						/** This action is documented in the-events-calendar/src/views/list/single-event.php */
						do_action( 'tribe_events_inside_cost' )
						?>
					</div>
				<?php endif; ?>

				<!-- Event Content -->
				<?php do_action( 'tribe_events_before_the_content' ) ?>
				<div class="tribe-events-list-event-description tribe-events-content">
					<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
					<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'More details', 'the-events-calendar' ) ?></a>
				</div><!-- .tribe-events-list-event-description -->
				<?php
				do_action( 'tribe_events_after_the_content' ); ?>
			</div>
		</div>
	</div>
</div>