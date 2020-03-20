<?php /*
Template name: Page images
 */
?>
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
<?php }else{?>
	<?php if(get_the_post_thumbnail()){?>
		<?php $image_full = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'page');$image_mobile = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mobile');$alt_text = get_post_meta(get_post_thumbnail_id($post->ID) , '_wp_attachment_image_alt', true);//print_r($alt_text); ?>
		<figure>
			<!--<picture>
				<?php the_post_thumbnail('page'); ?>
			</picture>-->
			<picture alt="<?php echo $alt_text; ?>"><source srcset=<?php echo $image_full[0]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_full[0]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_mobile[0]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_full[0]; ?>><img src=<?php echo $image_full[0]; ?> alt="<?php echo $alt_text; ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
	<?php }?>
<?php }?>
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
	<section id="col_gauche" class="col-lg-12 col-md-12 col-sm-12">
		<header>
			<h1><?php the_title();?></h1>
			<?php the_post_thumbnail('tablette'); ?>
			<?php the_excerpt(); ?>
		</header>
	</section>
</div>
	<?php

// check if the repeater field has rows of data
if( have_rows('les_onglets') ):?>
<div class="row"><section class="col-sm-12">
	<ul class="nav nav-tabs" role="tablist">
		<?php $bloc = 1;
	    while ( have_rows('les_onglets') ) : the_row();?>
		<li role="presentation"<?php if($bloc===1){echo " class='active'";}?>>
			<a href="#<?php the_sub_field('ancre'); ?>" aria-controls="home" role="tab" data-toggle="tab">
				<?php the_sub_field('titre'); ?>
			</a>
	    </li>
	    <?php $bloc++;?>
	    <?php endwhile;$bloc = 1;?>
    </ul>
    <div class="tab-content">
	    <?php while ( have_rows('les_onglets') ) : the_row();?>
		<div role="tabpanel" class="tab-pane<?php if($bloc===1){echo " active";}?>" id="<?php the_sub_field('ancre'); ?>">
			<?php the_sub_field('images'); ?>
	    </div>
	    <?php $bloc++;?>
    <?php endwhile;?>
    </div>
</section></div>

<?php endif;

?>
	


<?php get_footer(); ?>