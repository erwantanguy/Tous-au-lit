<?php /*
Template name: Page sans sidebar sur une colonne
 */
?>
 
<?php get_header(); ?>
<div class="row">
	<nav class="col-lg-offset-1 col-lg-10 text-right">
		<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>
	</nav>
</div>
<div id="artiste" class="row">
	<section id="col_gauche" class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
		<header>
			<h1><?php the_title();?></h1>
		</header>
		<?php the_content(); ?>
	</section>
</div>
<aside class="row">
	<div class="col-lg-offset-3 col-lg-3 col-md-offset-3 col-md-9 hidden-xs hidden-sm">
		<?php
			if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('barre_gauche_footer_artiste') )
		?>
	</div>
	<div class="col-lg-offset-0 col-lg-3 col-md-offset-3 col-md-9 hidden-xs hidden-sm">
		<?php
			if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('barre_droite_footer_artiste') )
		?>
	</div>
</aside>

<?php get_footer(); ?>