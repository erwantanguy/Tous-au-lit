<?php /*
Template name: Page sans sidebar sur 2 colonnes
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
	<section id="col_gauche" class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-6">
		<header>
			<h1><?php the_title();?></h1>
		</header>
		<?php the_content(); ?>
	</section>
	<section id="col_droite" class="col-lg-5 col-md-5 col-sm-6">
		<?php the_field(); 
		the_field('colonne_droite'); ?>
	</section>
</div>
<aside class="row">
	<div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 hidden-xs hidden-sm">
		<?php
			if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('barre_gauche_footer_artiste') )
		?>
	</div>
	<div class="col-lg-5 col-md-5 hidden-xs hidden-sm">
		<?php
			if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('barre_droite_footer_artiste') )
		?>
	</div>
</aside>

<?php get_footer(); ?>