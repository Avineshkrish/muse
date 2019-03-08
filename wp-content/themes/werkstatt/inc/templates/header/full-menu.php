<!-- Start Full Menu -->
<nav class="full-menu" id="full-menu">
	<?php if (has_nav_menu('nav-menu')) { wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'thb-full-menu', 'walker' => new thb_fullmenu ) ); }?>
	<?php if ('style3' !== ot_get_option('header_style', 'style1')) { ?>
		<?php $fullmenu_social_link = ot_get_option('fullmenu_social_link'); ?>
		<?php do_action( 'thb_social_links', $fullmenu_social_link, true ); ?>
		<?php do_action( 'thb_language_switcher' ); ?>
	<?php } ?>
</nav>
<!-- End Full Menu -->