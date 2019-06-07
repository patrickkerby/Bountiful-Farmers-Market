<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">

	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'the-events-calendar' ), $events_label_plural ); ?></a>
	</p>

	<!-- Notices -->
	<?php tribe_the_notices() ?>
	
		<?php while ( have_posts() ) :  the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="row justify-content-center">
				<div class="col-sm-10">
					<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-sm-5">
					<!-- Event featured image, but exclude link -->
					<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
				</div>
				<div class="col-sm-5">
					<?php echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' ); ?>
					<div class="tribe-events-schedule tribe-clearfix">
						<?php if ( tribe_get_cost() ) : ?>
							<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
						<?php endif; ?>		
					</div>

					<!-- Event content -->
					<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
					<div class="tribe-events-single-event-description tribe-events-content">
						<?php the_content(); ?>
					</div>
					<!-- .tribe-events-single-event-description -->
					<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
				</div>
			</div>
			<div class="row justify-content-center full-width">
				<div class="col-11">
					<!-- Event meta -->
					<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
					<?php tribe_get_template_part( 'modules/meta' ); ?>
					<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
				</div>
			</div>
			</div>
 <!-- #post-x -->
			<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
		<?php endwhile; ?>
</div><!-- #tribe-events-content -->