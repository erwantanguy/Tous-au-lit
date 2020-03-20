<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();

$posts = tribe_get_list_widget_events();
//print_r($posts);
// Retrieve the next 5 upcoming events
/*$posts = tribe_get_events( array(
    'posts_per_page' => 5,
    'start_date' => '2010-10-01 00:01',//new DateTime()
) );*/
if (!$posts){
	$posts = tribe_get_events( array(
	    'posts_per_page' => 5,
	    'start_date' => '2010-10-01 00:01',//new DateTime()
	    'order' => 'DESC',
	) );
}
// Check if any event posts are found.
if ( $posts ) : ?>

	<ol class="hfeed vcalendar">
		<?php
		// Setup the post data for each event.
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>
			<li class="tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">

				<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>
				<!-- Event Title -->
				<h4 class="entry-title summary">
					<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h4>

				<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>
				<!-- Event Time -->

				<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

				<div class="duration">
					<?php //echo tribe_events_event_schedule_details(); ?>
					<?php
						$start_datetime = tribe_get_start_date();
						$end_datetime = tribe_get_end_date();
					?>
					<?php
						do_action( 'tribe_events_single_meta_details_section_start' );
						if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
					?>
					du <?php esc_html_e( $start_date ) ?><?php esc_html_e( $start_datetime ) ?> au <?php esc_html_e( $end_datetime ) ?>
					<?php endif ?>
				</div>

				<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>
			</li>
		<?php
		endforeach;
		?>
	</ol><!-- .hfeed -->

	<p class="tribe-events-widget-link">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>" rel="bookmark"><?php printf( __( 'Voir tous les %s', 'tribe-events-calendar' ), $events_label_plural ); ?></a>
	</p>

<?php
// No events were found.
else : ?>
	<p><?php printf( __( 'Il n\'y a pas d\'%s pour le moment.', 'tribe-events-calendar' ), strtolower( $events_label_plural ) ); ?></p>
<?php
endif;
