<?php get_header(); ?>

<div class="row">
	<section class="col-lg-2 col-md-2 col-sm-4">
		<header>
			<h1 class="page-title"><?php printf( __( 'Votre recherche : %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header>
	</section>
	<div id="liste" class="col-lg-7 col-md-7 col-sm-8">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<div class="col-lg-4 picture">
									<?php the_post_thumbnail( 'medium' ); ?>
								</div>
								<div class="col-lg-8">
									<header class="entry-header article-header">
	
										<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
										<p class="byline entry-meta vcard">
											<?php printf( __( 'Posté le ' ).' %1$s %2$s',
	                  							     /* the time the post was published */
	                  							     '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
	                       								/* the author of the post */
	                       								'<span class="by">'.__('par').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
	                    							); ?>
										</p>
	
									</header>
	
									<section class="entry-content cf">
	
										<?php //the_post_thumbnail( 'medium' ); ?>
	
										<?php the_excerpt(); ?>
	
									</section>
	
									<footer class="article-footer">
	<a href="<?php the_permalink() ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Pour en savoir plus', 'tribe-events-calendar' ) ?> &raquo;</a>
									</footer>
								</div>
									
							</article>

							<?php endwhile; ?>


							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>
	</div>
	<aside class="col-lg-3 col-md-3 hidden-xs hidden-sm">
		<?php get_sidebar(); ?>
	</aside>
</div>

<?php get_footer(); ?>