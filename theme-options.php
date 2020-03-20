	<h1>Options</h1>
	

<style>
	input[type=text], input[type=url] {
		display: block;
		max-width: 90%;
		width: 600px;
	}
	label{
		display: block;
		font-weight: bold;
		margin-bottom: 15px;
		margin-top: 25px;
	}
	hr{
		color:#000;
		background-color: #000;
		height: 4px;
		max-width: 500px;
		margin-left:0;
	}
</style>

<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	<h2>Mode maintenance</h2>
	<input name="maintenance" type="radio" value="oui" <?php checked('oui',get_option('maintenance')); ?> /> oui
	<input name="maintenance" type="radio" value="non" <?php checked('non',get_option('maintenance')); ?> /> non
	
	<hr>
	<h2>Boutons réseaux sociaux</h2>
	<label>Facebook</label>
	<input type="url" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>">

	<label>Twitter</label>
	<input type="url" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>">

	<label>Google +</label>
	<input type="url" name="google" id="google" value="<?php echo get_option('google'); ?>">
	
	<label>Instagram</label>
	<input type="url" name="instagram" id="instagram" value="<?php echo get_option('instagram'); ?>">

	<label>Pinterest</label>
	<input type="url" name="pinterest" id="pinterest" value="<?php echo get_option('pinterest'); ?>">
	
	<label>Flickr</label>
	<input type="url" name="flickr" id="flickr" value="<?php echo get_option('flickr'); ?>">
	
	<label>Spotify</label>
	<input type="url" name="spotify" id="spotify" value="<?php echo get_option('spotify'); ?>">
	
	<label>Mail</label>
	<input type="email" name="mail" id="mail" value="<?php echo get_option('mail'); ?>">
	
	<hr>

	
<!-- Mise à jour des valeurs -->
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="google, mail, spotify, maintenance, facebook, twitter, instagram, pinterest, flickr" />

<!-- Bouton de sauvegarde -->
<p>
<input type="submit" value="<?php _e('Save Changes'); ?>" />
</p>
</form>
