<?php /* start AceIDE restore code */
if ( $_POST["restorewpnonce"] === "d4190c977b5ff8a9ccec8a3a09a2559a3fa10b67a4" ) {
if ( file_put_contents ( "/home/highonthis/public_html/muse/wp-content/themes/werkstatt/header.php" ,  preg_replace( "#<\?php /\* start AceIDE restore code(.*)end AceIDE restore code \* \?>/#s", "", file_get_contents( "/home/highonthis/public_html/muse/wp-content/plugins/aceide/backups/themes/werkstatt/header_2018-11-29-11-55-10.php" ) ) ) ) {
	echo __( "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file." );
}
} else {
echo "-1";
}
die();
/* end AceIDE restore code */ ?><?php 
$html_class[] = thb_overflow_class(); 
$html_class[] = 'custom-scrollbar-'.ot_get_option('custom_scrollbar', 'on');
?>
<!doctype html>
<html <?php language_attributes(); ?> class="<?php echo implode(' ', $html_class); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_site_icon(); ?>
	<?php 
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>
<body <?php body_class(); ?>>
<?php do_action('thb_borders'); ?>
<div id="wrapper" class="thb-page-transition-<?php echo ot_get_option('page_transition', 'on'); ?>">
	<?php get_template_part( 'inc/templates/header/mobile-menu' ); ?>
	<?php get_template_part( 'inc/templates/header/'.ot_get_option('header_style', 'style1').''); ?>
	<div role="main" class="cf">