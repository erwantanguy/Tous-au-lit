<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>

<div class="row">
	<nav class="col-lg-9 text-right">
		<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>
	</nav>
</div>
<div class="row">
<?php if(is_single()) :?>
<section id="content" class="col-lg-9 col-md-9">
	<picture id="picture" class="col-lg-4 col-md-4">
				<?php 
					$srcfull = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					$srclarge = wp_get_attachment_image_src( get_post_thumbnail_id(), 'tablette' );
					$srcmedium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'mobile' );
				 //echo $test[0]; ?>
			    <source srcset="<?php echo $srcmedium[0]; ?>" media="(max-width: 768px)">
			    <source srcset="<?php echo $srclarge[0]; ?>" media="(max-width: 1000px)">
			    <source srcset="<?php echo $srcfull[0]; ?>">
			    <img srcset="<?php echo $srcfull[0]; ?>" alt="My default image">
	</picture>
	<header id="col_gauche" class="col-lg-8 col-md-8 pull-right">
			<?php the_title( '<h1 class="tribe-events-single-event-title summary entry-title">', '</h1>' );
				?>
					<div class="tribe-events-schedule updated published tribe-clearfix">
						<?php 
							//echo '<h3>Du '.tribe_get_start_date($event_id).'<br>au '.tribe_get_end_date($event_id).'</h3>';
							echo '<h3>'.tribe_get_start_date($event_id).'</h3>';
						?>
						<?php //echo tribe_events_event_schedule_details( $event_id, '<h3>Du ', '</h3>' ); ?>
						<?php if ( tribe_get_cost() ) : ?>
							<span class="tribe-events-divider">|</span>
							<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
						<?php endif; ?>
					</div>

				
		</header>
	<?php endif; ?>
	<?php if(is_single()):?>
	<article class="row">
		<div id="col_droite" class="col-lg-12 col-md-12">
			<?php tribe_get_view(); ?>
		</div>
	</article>
</section>
<aside class="col-lg-3 col-md-3 hidden-xs hidden-sm">
		<?php get_sidebar(); ?>
	</aside>
	<?php else : ?>
	<section class="col-lg-12 col-md-12 col-sm-12">
		<header>
				<h1 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h1>
		</header>
	</section>
	<div class="col-lg-12 col-md-12 col-sm-12" id="liste">
		<?php tribe_get_view(); ?>
	</div>
	<?php endif; ?>


</div>
<?php
get_footer();
