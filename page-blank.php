<?php /*
Template name: Page simple pour version GB
 */
?>
<head>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<?php wp_head(); ?>
 </head>
 <body class="">
 	<section class="">
		<header class="">
		 	<?php the_post_thumbnail('full'); ?>
			<h1><?php the_title();?></h1>
		</header>
		<main id="col">
		<?php the_content(); ?>
		</main>
	</section>
</body>