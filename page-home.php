<?php /*
Template name: Page home
 */
?>
<?php get_header(); ?>
<?php include 'slider.php'; ?>
<?php rewind_posts(); ?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();?>


<div class="row">
	<section id="col_gauche" class="col-lg-3 col-md-2 col-sm-4">
		<header>
			<?php the_post_thumbnail('tablette'); ?>
			<?php //the_excerpt(); ?>
		</header>
	</section>
	<section id="col_droite" class="col-lg-6 col-md-7 col-sm-8">
		<?php the_content(); ?>
	</section>
	<aside class="col-lg-3 col-md-3 hidden-xs hidden-sm">
		<?php get_sidebar(); ?>
	</aside>
</div>
	<?php endwhile;
else :
	echo wpautop( 'Sorry, no posts were found' );
endif;
?>
<?php get_footer(); ?>
<script>jQuery(document).ready(function(){jQuery('.carousel .carousel-inner .item:first-child').addClass('active');jQuery('.carousel .carousel-indicators li:first-child').addClass('active');jQuery('.carousel').carousel({interval:5000});});</script>