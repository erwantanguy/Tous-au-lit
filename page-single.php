<?php /*
Template name: Comme Actualités
 */
?>
 
<?php get_header(); ?>

<div class="row">
	<nav class="col-lg-9 text-right">
		<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>
	</nav>
</div>
<div class="row">
	<section id="content" class="col-lg-9 col-md-9">
		<?php //$test = the_field('slider_soliloquy'); print_r($test); ?>
		<?php if (get_field('slider_soliloquy')) :?>
		<?php the_field('slider_soliloquy'); ?>
		<?php else :?>
			<picture id="picture">
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
			<?php endif; ?>
			<?php //echo get_the_post_thumbnail( $post_id, 'full' ); ?>
			<?php //the_post_thumbnail('full'); ?>
		<article class="row">
			<header id="col_gauche" class="col-lg-4 col-md-4">
				<h1><?php the_title();?></h1>
			</header>
			<div id="col_droite" class="col-lg-8 col-md-8">
				<?php the_content(); ?>
				<footer>
					<?php the_tags(); ?>
			</footer>
			</div>
		</article>
	</section>
	
	<aside class="col-lg-3 col-md-3">
		<?php get_sidebar(); ?>
	</aside>
</div>

<?php get_footer(); ?>