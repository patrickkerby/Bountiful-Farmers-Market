<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/Bar.php
 *
 * Override this template in your own theme by creating a file at:
 *
 *     [your-theme]/tribe-events/modules/bar.php
 *
 * @package  TribeEventsCalendar
 * @version 4.6.26
 */
?>

<?php

$filters     = tribe_events_get_filters();
$views       = tribe_events_get_views();
$current_url = tribe_events_get_current_filter_url();
$classes     = array( 'tribe-clearfix' );

if ( ! empty( $filters ) ) {
	$classes[] = 'tribe-events-bar--has-filters';
}

if ( count( $views ) > 1 ) {
	$classes[] = 'tribe-events-bar--has-views';
}

?>

<?php do_action( 'tribe_events_bar_before_template' ) ?>
<div class="row">
	<h2 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Search and Views Navigation', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?></h2>
	<?php do_action( 'tribe_events_filter_view_before_filters' ); ?>
	<div class="tribe-events-filters-content tribe-clearfix col-5">
		<?php do_action( 'tribe_events_ajax_accessibility_check' ); ?>
		<form id="tribe_events_filters_form" method="post" action="">
			<?php do_action( 'tribe_events_filter_view_do_display_filters' ); ?>
			<input type="submit" value="<?php esc_attr_e( 'Submit', 'tribe-events-filter-view' ) ?>" />
		</form>
	</div>

	<div class="calendar-search col-5">
	<?php do_action( 'tribe_events_filter_view_after_filters' ); ?>
	<form id="tribe-bar-form" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" name="tribe-bar-form" method="post" action="<?php echo esc_attr( $current_url ); ?>">
		<?php if ( ! empty( $filters ) ) : ?>
						<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Search', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?></h3>
						<?php foreach ( $filters as $filter ) : ?>
							<div class="<?php echo esc_attr( $filter['name'] ) ?>-filter">
								<label class="label-<?php echo esc_attr( $filter['name'] ) ?>" for="<?php echo esc_attr( $filter['name'] ) ?>"><?php echo $filter['caption'] ?></label>
								<?php echo $filter['html'] ?>
							</div>
						<?php endforeach; ?>
						<div class="tribe-bar-submit">
							<input
								class="tribe-events-button tribe-no-param"
								type="submit"
								name="submit-bar"
								aria-label="<?php printf( esc_attr__( 'Submit %s search', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>"
								value="<?php printf( esc_attr__( 'Find %s', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>"
							/>
						</div>


		<?php endif; ?>

		<?php if ( count( $views ) > 1 ) : ?>
			<div id="tribe-bar-views" class="tribe-bar-views">
				<div class="tribe-bar-views-inner tribe-clearfix">
					<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Views Navigation', 'the-events-calendar' ), tribe_get_event_label_singular() ); ?></h3>
					<label id="tribe-bar-views-label" aria-label="<?php printf( esc_html__( 'View %s As', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>">
						<?php esc_html_e( 'View As', 'the-events-calendar' ); ?>
					</label>
					<select
						class="tribe-bar-views-select tribe-no-param"
						name="tribe-bar-view"
						aria-label="<?php printf( esc_attr__( 'View %s As', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>"
					>
						<?php
						foreach ( $views as $view ) {
							printf(
								'<option value="%1$s" data-view="%2$s"%3$s>%4$s</option>',
								esc_attr( $view['url'] ),
								esc_attr( $view['displaying'] ),
								tribe_is_view( $view['displaying'] ) ? ' selected' : '',
								esc_html( $view['anchor'] )
							);
						}
						?>
					</select>
				</div>
			</div>
		<?php endif; ?>

	</form>
	</div>
</div>
<?php
do_action( 'tribe_events_bar_after_template' );
