<?php 
$html_class[] = thb_overflow_class(); 
$html_class[] = 'custom-scrollbar-'.ot_get_option('custom_scrollbar', 'on');
?>
<!doctype html>
<html <?php language_attributes(); ?> class="<?php echo implode(' ', $html_class); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
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