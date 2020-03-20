<?php get_header(); ?>
<div class="row">
	<nav class="col-lg-offset-1 col-lg-10 text-right">
		<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>
	</nav>
</div>
<div id="artiste" class="row">
	<section id="col_gauche" class="col-lg-offset-1 col-lg-5 col-md-6">
		<header>
			<h1><?php the_title();?></h1>
			<?php $extrait=$post->post_excerpt; if ($extrait) : ?> 
			<div><?php the_excerpt(); ?></div>
			<?php endif; ?>
		</header>
		<?php the_content(); ?>
	</section>
	<section id="col_droite" class="col-lg-5 col-md-6">
		<?php the_field(); 
		the_field('content_right'); ?>
	</section>
</div>
<div id="artiste" class="row">
	<aside class="col-lg-offset-1 col-lg-5 col-md-6  hidden-xs hidden-sm">
		<?php
			if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('barre_gauche_footer_artiste') )
		?>
	</aside>
	<aside class="col-lg-5 col-md-6 hidden-xs hidden-sm">
		<?php
			if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('barre_droite_footer_artiste') )
		?>
	</aside>
</div>

<?php get_footer(); ?>