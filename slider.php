<div id="slider" class="row">
<section class="col-xs-8">
		<?php
					//$myCat = 'Actualités';
							
					//$my_query = new WP_Query('category_name=' . $myCat . '&showposts=5' .'&post__in=get_option('sticcky_pots')');
					$my_query = new WP_Query(array(
						'post__in' => get_option('sticky_posts'),
						'ignore_sticky_posts' => 1,
						'posts_per_page' => '10',
					));
					//print_r($my_query);
				?>
		<div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
      <ol class="carousel-indicators">
       <?php rewind_posts(); 
       $toto=0;?>
       <?php if ( have_posts() ) { ?>
		<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<li class="" data-slide-to="<?php echo $toto;$toto++; ?>" data-target="#carousel-example-generic"></li>
		<?php endwhile;  } else{?>
        	<!-- <li class="test" data-slide-to="0" data-target="#carousel-example-generic"></li> -->
        <?php }?>
      </ol>
      <div role="listbox" class="carousel-inner">
      	<?php rewind_posts(); ?>
      	<?php if ( have_posts() ) { ?>
		<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <div class="item">
          <?php 
				//real dimension of the slideshow image is 516w x 248h
					if ( function_exists( 'add_theme_support' ) && has_post_thumbnail()){
					//the_post_thumbnail(array(1240,701), array('class' => 'feature-large'));
					}
					the_post_thumbnail('slider2');
				?>
				<div class="carousel-caption">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php //$my_excerpt = get_the_excerpt(); //print_r($my_excerpt);
						/*if ( '' != $my_excerpt ) {
					?>
					<p class="hidden-xs"><a href="<?php the_permalink();?>"><?php echo get_the_excerpt(); ?></a></p>
					<?php }*/
					?>
				</div>
        </div>
        <?php endwhile;   } else{?>
        	<div class="item">
        		<img alt="First slide [900x500]" src="<?php header_image(); ?>" alt="<?php bloginfo( 'description' ); ?>">
        	</div>
        <?php }?>
      </div>
      <?php if ( have_posts() ) { ?>
      <a data-slide="prev" role="button" href="#carousel-example-generic" class="left carousel-control">
        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a data-slide="next" role="button" href="#carousel-example-generic" class="right carousel-control">
        <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
      <?php } ?>
    </div>
    </section>
    <section class="col-xs-4" id="events">
    	<?php 
					//$posts = tribe_get_list_widget_events();
					//$posts = get_events();
					//print_r($posts);
					$args = array(
						'post_type'=>array(TribeEvents::POSTTYPE),
						'posts_per_page'=>3,
					);
					$events = new WP_Query($args);
					//print_r($events);
					?>
					<?php if($events->have_posts()){?>
					<h2><a href="http://www.tousaulit.fr/calendrier/">Prochainement</a></h2>
					
					<?php while($events->have_posts()) : $events->the_post();
						$start_datetime = tribe_get_start_date(null,false);
						$formatevent = 'Y\-m\-d\Tg:i';
						$start_event = tribe_get_start_date(null,false, $formatevent);
					?>
					<article class="row">
						<picture class="col-md-4">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('lactu2'); ?></a>
						</picture>
						<div class="col-md-8">
							<header>
								<time datetime="<?php echo $start_event; ?>"><span><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $start_datetime; ?></span></time>
								<?php if(get_field('titre_court')){?>
									<h1><a href="<?php the_permalink(); ?>"><?php the_field('titre_court'); ?></a></h1>
								<?php }else{?>
									<h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
								<?php }?>
							</header>
							<?php the_excerpt(); ?>
						</div>
					</article>
					<?php endwhile; ?>
					
					<?php }else{?>
					<h2>Dernières actualités</h2>

					<?php
					$my_actu = new WP_Query(array(
						'post_type'		=> 'post',
						'posts_per_page' => '5',
					));
					while($my_actu->have_posts()) : $my_actu->the_post();
					?>
					<article class="row">
						<picture class="col-md-4">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('lactu2'); ?></a>
						</picture>
						<div class="col-md-8">
							<header>
								<time datetime="<?php the_time('Y\-m\-d\Tg:i'); ?>"><?php the_date(); ?></time>
								<h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
							</header>
							<?php the_excerpt(); ?>
						</div>
					</article>
					<?php endwhile; ?>
					<?php } ?>
					
    			
    </section>
   </div>