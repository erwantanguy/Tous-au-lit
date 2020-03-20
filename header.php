<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>
			<?php 
				if(is_home() || is_front_page()) :
					bloginfo('name');
				else :
					wp_title("", true);
				endif;
			?>
		</title>
		<!--<?php if(is_home) :?>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php endif; ?>-->
		<meta name="author" content="Valérie Bour">
		<!--<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />-->
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); echo '?ver=' . filemtime( get_bloginfo( 'stylesheet_url' ) ); ?>" type="text/css" media="screen" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<?php wp_head(); ?>
		<?php $image = get_field('logo', 'option');?>
	</head>

	<body <?php body_class(); ?>>
		<div class="container">
			<header role="banner" id="top" class="navbar navbar-static-top bs-docs-nav">
				<?php if(is_home()): ?><div id="titre" class="hidden-xs"><a href="<?php bloginfo('url'); ?>">Tous au lit !</a></div><?php endif; ?>
					<?php $couv = get_field('couverture', 'options'); ?>
					<?php if(is_home()): ?><picture class="hidden-xs hidden-sm" id="couv" alt="<?php echo $couv['alt']; ?>"><img src="<?php echo $couv['url']; ?>" alt="<?php echo $couv['alt']; ?>" /></picture><?php endif; ?>
			    <div class="navbar-header">
			      <button aria-expanded="false" aria-controls="bs-navbar" data-target="#bs-navbar" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <?php //print_r($image[sizes]); ?>
			      <a class="navbar-brand<?php if(is_home()): ?> hidden-sm hidden-md hidden-lg<?php endif; ?>" href="<?php bloginfo('url'); ?>"><?php 
			      	if(!$image){bloginfo('name');} else{echo'<img src="'.$image[sizes][logo].'" alt="'.$image['alt'].'" class="logo" />';} 
			      ?></a>
			    </div>
			    <nav class="collapse navbar-collapse" id="bs-navbar">
			      	<?php wp_nav_menu(array(
						'theme_location' => 'premier',
						'walker' => new Bootstrap_Walker_Nav_Menu(),
						'menu_class' => 'nav navbar-nav'
					) );
					?>
					
			    
				    <div id="moteurrecherche" class="nav navbar-nav navbar-right col-lg-2">
						<ul id="socialmedia" class="nav navbar-nav navbar-right">
		            <?php if(get_option('facebook')){?>
									<li class="fb"><a href="<?php echo get_option('facebook'); ?>" title="Facebook <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<?php }?>
								<?php if(get_option('twitter')){?>
									<li class="twitter"><a href="<?php echo get_option('twitter'); ?>" title="Twitter <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<?php }?>
								<?php if(get_option('google')){?>
									<li class="hidden-md"><a href="<?php echo get_option('google'); ?>" title="Google + <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								<?php }?>
								<?php if(get_option('instagram')){?>
									<li class="hidden-md"><a href="<?php echo get_option('instagram'); ?>" title="Instagram <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<?php }?>
								<?php if(get_option('pinterest')){?>
									<li class="hidden-md"><a href="<?php echo get_option('pinterest'); ?>" title="Pinterest <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
								<?php }?>
								<?php if(get_option('flickr')){?>
									<li class="hidden-md"><a href="<?php echo get_option('flickr'); ?>" title="Flickr <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
								<?php }?>
								<?php if(get_option('spotify')){?>
									<li class="hidden-md"><a href="<?php echo get_option('spotify'); ?>" title="Spotify <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
								<?php }?>
								<?php if(get_option('mail')){?>
									<li class="mail hidden-md"><a href="mailto:<?php echo get_option('mail'); ?>" title="Mail à <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-envelope-o"></i></a></li>
								<?php }?>
		         	 </ul>
				  </div>
				  <?php if(is_home()):?>
				  <?php wp_nav_menu(array(
						'theme_location' => 'deuxieme',
						'walker' => new Bootstrap_Walker_Nav_Menu(),
						'menu_class' => 'nav navbar-nav navbar-right'
					) );
					?>
					<?php endif;?>
			  </nav>
			</header>
		</div>
		<?php if(is_page):?>
		<div id="content" class="container">
		<?php else:?>
		<div class="container-fluid">
		<?php endif;?>