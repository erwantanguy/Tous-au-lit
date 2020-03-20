<?php get_header(); ?>

<?php if( have_rows('slider_copie') ){?>
	<div id="slider" class="carousel slide" data-ride="carousel">
		 <div class="carousel-inner" role="listbox">
		<?php  while ( have_rows('slider_copie') ) : the_row();?>
			<div class="item"><?php $image = get_sub_field('image');//print_r($image); ?>
				<picture alt="<?php echo $image['alt']; ?>"><source srcset="<?php echo $image['sizes']['box2']; ?>" media="(max-width:767px)"><source srcset="<?php echo $image['sizes']['box3']; ?>" media="(max-width:900px)"><img src="<?php echo $image['sizes']['box1']/*['url']*/; ?>" alt="<?php echo $image['alt']; ?>" /></picture>
			</div>
		<?php endwhile;?>
		</div>
	</div>
<?php }else{/*?>
	<?php if(get_the_post_thumbnail()){?>
		<?php $image_full = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'page');$image_mobile = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mobile');$alt_text = get_post_meta(get_post_thumbnail_id($post->ID) , '_wp_attachment_image_alt', true);//print_r($alt_text); ?>
		<figure>
			<!--<picture>
				<?php the_post_thumbnail('page'); ?>
			</picture>-->
			<picture alt="<?php echo $alt_text; ?>"><source srcset=<?php echo $image_full[0]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_full[0]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_mobile[0]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_full[0]; ?>><img src=<?php echo $image_full[0]; ?> alt="<?php echo $alt_text; ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
	<?php }?>
<?php */}?>
<script>
    jQuery(document).ready(function() { 
    	jQuery('[data-toggle="tooltip"]').tooltip();
    	//jQuery('body').css('background-color','red');
    	//jQuery('#slider').css('border','1px red solid');
    	jQuery('#slider .carousel ol.carousel-indicators li:first-child').addClass('active');
    	jQuery('#slider .carousel-inner .item:first-child').addClass('active');
    	//jQuery('.carousel .carousel-inner .item:first-child').addClass('active');
    	//jQuery('.carousel .carousel-indicators li:first-child').addClass('active');
    	//jQuery('.carousel-inner').css('display','none');
    	jQuery('.carousel').carousel({
    		interval:3000
    	});
    });
    </script>

<div class="row">
	<nav class="col-lg-12 colo-md-12 col-sm-12 hidden-xs text-right">
		<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>
	</nav>
</div>
<div class="row">
	<section id="col_gauche" class="col-lg-3 col-md-3 col-sm-4">
		<header>
			<h1><?php the_title();?></h1>
			<?php $thumb_id = get_post_thumbnail_id();$url = wp_get_attachment_image_src($thumb_id,'full', true);//print_r($url); ?>
			<a href="<?php echo $url[0]; ?>"><?php the_post_thumbnail('tablette'); ?></a>
			<?php //the_excerpt(); ?>
		</header>
	</section>
	<section id="col_droite" class="col-md-offset-1 col-lg-8 col-md-8 col-sm-8">
		<?php the_content(); ?>
	</section>
</div>

<?php get_footer(); ?>