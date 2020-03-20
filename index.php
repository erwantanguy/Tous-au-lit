<?php get_header(); ?>

<?php include 'encart.php'; ?>
<?php
//print_r(get_sub_field('modale', 'options'));
//the_field('modale','options');
if(get_field('modale', 'options')):?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php the_field('titre_modale','options');?></h4>
				</div>
				<?php the_field('modale','options');?>
			</div>
		</div>
	</div>
<?php endif;
// check if the flexible content field has rows of data
if( have_rows('contents', 'options') ):

     // loop through the rows of data
    while ( have_rows('contents', 'options') ) : the_row();
        if( get_row_layout() == 'unique' ):?>
		<div class="row">
			<section class="col-xs-12">
        		<?php the_sub_field('unique', 'options'); ?>
        	</section>
		</div>
       	<?php elseif( get_row_layout() == 'multiple' ): ?>
       	<div class="row">
       	<?php while ( have_rows('gauche', 'options') ) : the_row();?>
       		<header class="col-md-4">
       			<?php if( get_row_layout() == 'image' ):?>
       				<?php //the_sub_field('image', 'options'); ?>
       				<?php $image = get_sub_field('image', 'options');//var_dump($image);?>
     				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
       			<?php elseif( get_row_layout() == 'texte' ):?>
       				<?php the_sub_field('texte', 'options'); ?>
       			<?php endif; ?>
       		</header>
       	<?php endwhile;
       	while ( have_rows('centre', 'options') ) : the_row();?>
       		<article class="col-md-4"><?php //var_dump(get_row_layout());?>
       			<?php if( get_row_layout() == 'image' ):?>
       				<?php $image = get_field('image', 'option');?>
     				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
       			<?php elseif( get_row_layout() == 'texte' ):?>
       				<?php the_sub_field('texte', 'options'); ?>
       			<?php endif; ?>
       		</article>
       	<?php endwhile;
       	while ( have_rows('droite', 'options') ) : the_row();?>
       		<aside class="col-md-4">
       			<?php if( get_row_layout() == 'image' ):?>
       				<?php $image = get_field('image', 'option');?>
     				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
       			<?php elseif( get_row_layout() == 'texte' ):?>
       				<?php the_sub_field('texte', 'options'); ?>
       			<?php endif; ?>
       		</aside>
       	<?php endwhile;?>
       </div>
        <?php endif;

    endwhile;

else :

    // no layouts found

endif;

?>
			
<?php //include 'slider.php'; ?>

<?php get_footer(); ?>


<script>
	jQuery(document).ready(function(){
		jQuery('.carousel .carousel-inner .item:first-child').addClass('active');
		jQuery('.carousel .carousel-indicators li:first-child').addClass('active');
		//jQuery('.carousel-inner').css('display','none');
		jQuery('.carousel').carousel({
			interval:5000
		});
		/*jQuery('#myModal').on('shown.bs.modal', function () {
		  jQuery('#myInput').focus();
		})*/
		jQuery('#myModal').modal('show');
	});
	</script>	




