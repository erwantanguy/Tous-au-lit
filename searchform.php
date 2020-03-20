<form action="<?php echo home_url( '/' ); ?>" class="searchform row" id="searchform" method="get" role="search">
	<div class="form-group">
		<label for="s" class="screen-reader-text" style="display: none;">Rechercher&nbsp;:</label>
		<div class=" col-lg-9 col-md-9 col-sm-10 col-xs-10">
			<input type="text" id="s" name="s" value="" class="form-control" placeholder="Rechercher">
		</div>
		
		<input type="submit" value="OK" id="searchsubmit" class="btn btn-default">
	</div>
</form>