<footer id="footer" class="row">
				<div class="col-md-6"><!-- © -->
					<p>Tous au lit - Les Éditions des Braques <i class="glyphicon glyphicon-copyright-mark"></i> Tous Droits Réservés - 2016 - Création <a href="http://www.ticoet.fr">ticoët</a></p>
				</div>	
				<div class="col-md-6">
					<?php wp_nav_menu(array(
						'theme_location' => 'troisieme',
						'walker' => new Bootstrap_Walker_Nav_Menu(),
						'menu_class' => 'nav navbar-nav'
					) );
					?>
				</div>
				<?php wp_footer(); ?>
			</footer>
		</div>
	</body>
</html>