<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @version 4.4
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
?>

<div class="tribe-events-loop">
<?php
		$events = tribe_get_events( [ 
			'posts_per_page' => 1, 
			'featured'       => true,
	 ] );

		foreach ( $events as $post ) {
			setup_postdata( $post );
		?>
<div class="tribe-event-featured-custom">
		<?php
			tribe_get_template_part( 'list/single-featured' );
		?>	
			</div>
		<?php	
		}	
?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>

		<!-- Event  -->
		<?php
		$post_parent = '';
		if ( $post->post_parent ) {
			$post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
		}
		?>
		<div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>" <?php echo $post_parent; ?>>
					<!-- Month / Year Headers -->
		<?php tribe_events_list_the_date_headers(); ?>

		<?php
			tribe_get_template_part( 'list/single-event' );
			?>
		</div>


		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>

</div><!-- .tribe-events-loop -->
