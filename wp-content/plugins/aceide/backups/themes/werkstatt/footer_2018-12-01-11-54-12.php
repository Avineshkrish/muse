<?php /* start AceIDE restore code */
if ( $_POST["restorewpnonce"] === "d4190c977b5ff8a9ccec8a3a09a2559a6c50411033" ) {
if ( file_put_contents ( "/home/highonthis/public_html/muse/wp-content/themes/werkstatt/footer.php" ,  preg_replace( "#<\?php /\* start AceIDE restore code(.*)end AceIDE restore code \* \?>/#s", "", file_get_contents( "/home/highonthis/public_html/muse/wp-content/plugins/aceide/backups/themes/werkstatt/footer_2018-12-01-11-54-12.php" ) ) ) ) {
	echo __( "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file." );
}
} else {
echo "-1";
}
die();
/* end AceIDE restore code */ ?><?php 
	$footer_columns = ot_get_option('footer_columns', 'fourcolumns');
	$footer_effect = ot_get_option('footer_effect', 'off');
	$footer_max_width = ot_get_option('footer_max_width', 'off');
	$disable_footer = get_post_meta(get_the_ID(), 'disable_footer', true); 
	$footer_color = ot_get_option('footer_color', 'light');
	
	$subfooter = ot_get_option('subfooter', 'off');
	$subfooter_style = ot_get_option('subfooter_style', 'style1');
	
	$footer_classes[] = 'footer';
	$footer_classes[] = $subfooter == 'on' ? 'subfooter-enabled' : false;
	$footer_classes[] = $footer_color;
	$footer_classes[] = $footer_max_width == 'off' ? 'full-width-footer' : false;
	
	
	$cond = (ot_get_option('footer', 'on') != 'off' && $disable_footer !== 'on') && !is_page_template('template-fullscreen.php');
	$onepage = (ot_get_option('footer', 'on') != 'off' && $disable_footer !== 'on') && is_page_template('template-onepage.php');
?>
		</div><!-- End role["main"] -->
<?php if ($onepage) { ?>
	<div class="footer-container wpb_row fp-auto-height" id="fp-footer">
<?php } else if ($footer_effect == 'on' && !is_page_template('template-fullscreen.php')) { ?>
	<div class="fixed-footer-container">
<?php } ?>
	<?php if ($cond || $onepage) { ?>
	<!-- Start Footer -->
	<footer id="footer" class="<?php echo implode(' ', $footer_classes); ?>">
		<div class="row">
			<?php get_template_part( 'inc/templates/footer/cta' ); ?>
			<?php if ($footer_columns == 'fourcolumns') { ?>
		  <div class="small-12 medium-6 large-3 columns">
		  	<?php dynamic_sidebar('footer1'); ?>
		  </div>
		  <div class="small-12 medium-6 large-3 columns">
		  	<?php dynamic_sidebar('footer2'); ?>
		  </div>
		  <div class="small-12 medium-6 large-3 columns">
		    <?php dynamic_sidebar('footer3'); ?>
		  </div>
		  <div class="small-12 medium-6 large-3 columns">
		    <?php dynamic_sidebar('footer4'); ?>
		  </div>
		  <?php } elseif ($footer_columns == 'threecolumns') { ?>
		  <div class="small-12 medium-6 large-4 columns">
		  	<?php dynamic_sidebar('footer1'); ?>
		  </div>
		  <div class="small-12 medium-6 large-4 columns">
		  	<?php dynamic_sidebar('footer2'); ?>
		  </div>
		  <div class="small-12 large-4 columns">
		      <?php dynamic_sidebar('footer3'); ?>
		  </div>
		  <?php } elseif ($footer_columns == 'twocolumns') { ?>
		  <div class="small-12 medium-6 columns">
		  	<?php dynamic_sidebar('footer1'); ?>
		  </div>
		  <div class="small-12 medium-6 columns">
		  	<?php dynamic_sidebar('footer2'); ?>
		  </div>
		  <?php } elseif ($footer_columns == 'doubleleft') { ?>
		  <div class="small-12 large-6 columns">
		  	<?php dynamic_sidebar('footer1'); ?>
		  </div>
		  <div class="small-12 medium-6 large-3 columns">
		  	<?php dynamic_sidebar('footer2'); ?>
		  </div>
		  <div class="small-12 medium-6 large-3 columns">
		      <?php dynamic_sidebar('footer3'); ?>
		  </div>
		  <?php } elseif ($footer_columns == 'doubleright') { ?>
		  <div class="small-12 medium-6 large-3 columns">
		  	<?php dynamic_sidebar('footer1'); ?>
		  </div>
		  <div class="small-12 medium-6 large-3 columns">
		  	<?php dynamic_sidebar('footer2'); ?>
		  </div>
		  <div class="small-12 large-6 columns">
		      <?php dynamic_sidebar('footer3'); ?>
		  </div>
		  <?php } elseif ($footer_columns == 'fivecolumns') { ?>
		  <div class="small-12 medium-6 large-2 columns">
		  	<?php dynamic_sidebar('footer1'); ?>
		  </div>
		  <div class="small-12 medium-6 large-3 columns">
		  	<?php dynamic_sidebar('footer2'); ?>
		  </div>
		  <div class="small-12 medium-6 large-2 columns">
		  	<?php dynamic_sidebar('footer3'); ?>
		  </div>
		  <div class="small-12 medium-6 large-3 columns">
		  	<?php dynamic_sidebar('footer4'); ?>
		  </div>
		  <div class="small-12 large-2 columns">
		  	<?php dynamic_sidebar('footer5'); ?>
		  </div>
		  <?php } elseif ($footer_columns == 'onecolumns') { ?>
		  <div class="small-12 columns">
		  	<?php dynamic_sidebar('footer1'); ?>
		  </div>
		  <?php } elseif ($footer_columns == 'sixcolumns') { ?>
	    <div class="small-6 medium-4 large-2 columns">
	    	<?php dynamic_sidebar('footer1'); ?>
	    </div>
	    <div class="small-6 medium-4 large-2 columns">
	    	<?php dynamic_sidebar('footer2'); ?>
	    </div>
	    <div class="small-6 medium-4 large-2 columns">
	    	<?php dynamic_sidebar('footer3'); ?>
	    </div>
	    <div class="small-6 medium-4 large-2 columns">
	    	<?php dynamic_sidebar('footer4'); ?>
	    </div>
	    <div class="small-6 medium-4 large-2 columns">
	    	<?php dynamic_sidebar('footer5'); ?>
	    </div>
	    <div class="small-6 medium-4 large-2 columns">
	    	<?php dynamic_sidebar('footer6'); ?>
	    </div>
		  <?php } ?>
		</div>
	</footer>
	<!-- End Footer -->
	<?php } ?>
	<?php if (($subfooter !== 'off' && $disable_footer !== 'on') && !is_page_template('template-fullscreen.php')) { ?>
	<?php get_template_part('inc/templates/footer/subfooter-'.$subfooter_style); ?>
	<?php } ?>
	<?php if (($footer_effect == 'on' && !is_page_template('template-fullscreen.php')) || $onepage) { ?>
		</div> <!-- End .fixed-footer-container -->
	<?php } ?>
</div> <!-- End #wrapper -->
<?php 
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	 wp_footer(); 
?>
<link rel="stylesheet" type="text/css" href="http://highonthis.in/muse/wp-content/themes/werkstatt/assets/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="http://highonthis.in/muse/wp-content/themes/werkstatt/assets/css/component.css" />

<script src="http://highonthis.in/muse/wp-content/themes/werkstatt/assets/js/anime.min.js"></script>
<script src="http://highonthis.in/muse/wp-content/themes/werkstatt/assets/js/charming.min.js"></script>
<script src="http://highonthis.in/muse/wp-content/themes/werkstatt/assets/js/main.js"></script>
</body>
</html>