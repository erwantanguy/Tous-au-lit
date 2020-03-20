<?php get_header(); ?>
		
		
		
			
			
			
			<div id="slider" class="row">
				<?php
					//$myCat = 'Actualités';
							
					//$my_query = new WP_Query('category_name=' . $myCat . '&showposts=5' .'&post__in=get_option('sticcky_pots')');
					$my_query = new WP_Query(array(
						'post__in' => get_option('sticky_posts'),
						'posts_per_page' => '10',
					));
				?>
								<div data-ride="carousel" class="carousel slide col-lg-12" id="carousel-example-captions">
      <ol class="carousel-indicators">
      	<?php rewind_posts(); $toto=0; ?>
		<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<li class="" data-slide-to="<?php echo $toto;$toto++; ?>" data-target="#carousel-example-generic"></li>
		<?php endwhile; ?>
      </ol>
      <div role="listbox" class="carousel-inner">
        <?php rewind_posts(); ?>
		<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="item">
				<?php 
				//real dimension of the slideshow image is 516w x 248h
					if ( function_exists( 'add_theme_support' ) && has_post_thumbnail()){
					the_post_thumbnail(array(800,9999), array('class' => 'feature-large'));
					}
				?>
				<div class="carousel-caption">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php $my_excerpt = get_the_excerpt(); //print_r($my_excerpt);
						if ( '' != $my_excerpt ) {
					?>
					<p><a href="<?php the_permalink();?>"><?php echo get_the_excerpt(); ?></a></p>
					<?php }
					?>
				</div>
			</div>
		<?php endwhile; ?>
      </div>
      <a data-slide="prev" role="button" href="#carousel-example-captions" class="left carousel-control">
        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a data-slide="next" role="button" href="#carousel-example-captions" class="right carousel-control">
        <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    	
			</div>





			<div id="artiste" class="row">
				<section class="col-lg-9 col-md-9">
					<header>
						<h1 class="entry-title"><?php echo 'Cette page n\'existe pas !'; ?></h1>
					</header>
					<div class="entry-content">
					<p><?php echo "Nous n'avons pas trouvé la page que vous cherchez. Essayez avec l'outil de recherche."; ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
				</section>
				<aside class="col-lg-3 col-md-3 hidden-xs hidden-sm">
					<?php get_sidebar(); ?>
				</aside>
			</div>

<?php get_footer(); ?>


<script>
	jQuery(document).ready(function(){
		jQuery('.carousel .carousel-inner .item:first-child').addClass('active');
		jQuery('.carousel .carousel-indicators li:first-child').addClass('active');
		//jQuery('.carousel-inner').css('display','none');
		jQuery('.carousel').carousel({
			interval:5000
		});
	});
	</script>	




