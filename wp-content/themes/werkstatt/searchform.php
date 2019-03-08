<!-- Start SearchForm -->
<form method="get" class="searchform" role="search" action="<?php echo esc_url(home_url('/')); ?>">
    <fieldset>
    	<input name="s" type="text" class="s small-12" placeholder="<?php esc_html_e( 'Type here to search', 'werkstatt' ); ?>">
    	<input type="submit" class="btn accent" value="<?php esc_html_e( 'Search', 'werkstatt' ); ?>" />
    </fieldset>
</form>
<!-- End SearchForm -->