<?php get_header(); ?>
<div class="row">
	<nav class="col-lg-9 text-right">
		<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>
	</nav>
</div>
<div class="row">
	<section id="content" class="col-lg-9 col-md-9">
		<?php if(get_field('une')){ $une = get_field('une'); ?>
			<picture id="picture">
				<?php 
					$srcfull = $une['url'];
					$srclarge = $une['sizes']['tablette'];
					$srcmedium = $une['sizes']['mobile'];
					$img_id = $une['ID'];
					$alt_text = $une['alt'];
					if (!$alt_text){
						$alt_text= get_the_title();
					}
				 ?>
			    <source srcset="<?php echo $srcmedium; ?>" media="(max-width: 768px)">
			    <source srcset="<?php echo $srclarge; ?>" media="(max-width: 1000px)">
			    <source srcset="<?php echo $srcfull; ?>">
			    <img src="<?php echo $srclarge; ?>" srcset="<?php echo $srcfull; ?>" alt="<?php echo $alt_text;?>">
			</picture>
		<?php }else{?>
			<picture id="picture">
				<?php 
					$srcfull = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					$srclarge = wp_get_attachment_image_src( get_post_thumbnail_id(), 'tablette' );
					$srcmedium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'mobile' );
					//$alt_text = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
					//$attachment = get_post($post->ID);
    				//$alt_text = trim(strip_tags( $attachment->post_title ));
					$img_id = get_post_thumbnail_id($post->ID);
					$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
					if (!$alt_text){
						$alt_text= get_the_title();
					}
					//echo 'test : '.$alt_text;
				 //echo $test[0]; ?>
			    <source srcset="<?php echo $srcmedium[0]; ?>" media="(max-width: 768px)">
			    <source srcset="<?php echo $srclarge[0]; ?>" media="(max-width: 1000px)">
			    <source srcset="<?php echo $srcfull[0]; ?>">
			    <img src="<?php echo $srclarge[0]; ?>" srcset="<?php echo $srcfull[0]; ?>" alt="<?php echo $alt_text;?>">
			</picture>
		<?php } ?>
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