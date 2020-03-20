<?php /*
Template name: Titre et contenu sur une colonne avec sidebar
 */
?>

<?php get_header(); ?>

<div class="row">
	<nav class="col-lg-9 colo-md-9 col-sm-12 hidden-xs text-right">
		<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>
	</nav>
</div>
<div class="row">
	<section id="content" class="col-lg-9 col-md-9 col-sm-12">
		<header>
			<h1><?php the_title();?></h1>
			<?php //the_excerpt(); ?>
		</header>
		<?php the_content(); ?>
	</section>
	<aside class="col-lg-3 col-md-3 hidden-xs hidden-sm">
		<?php get_sidebar(); ?>
	</aside>
</div>

<?php get_footer(); ?>