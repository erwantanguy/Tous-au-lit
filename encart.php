<div id="slider" class="row">
<section class="col-md-6 col-lg-8">
		<?php $imagehome = get_field('imagehome', 'options');//print_r($imagehome); ?>
		<img src="<?php echo $imagehome['url']; ?>" alt="<?php echo $imagehome['alt']; ?>" />
    </section>
    <section class="col-md-6 col-lg-4" id="events">
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
						<picture class="col-xs-3">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('lactu2'); ?></a>
						</picture>
						<div class="col-xs-9">
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