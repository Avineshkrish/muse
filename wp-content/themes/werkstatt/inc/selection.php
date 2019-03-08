<?php function thb_selection() {
	$id = get_queried_object_id();
	ob_start();
?>
/* Options set in the admin page */

/* Portfolio Related */
<?php 
$header_height = get_post_meta($id, 'header_height', true);
if ($header_height || $header_height === '0') { ?>

.postid-<?php echo esc_attr($id); ?> .post-gallery.parallax {
	<?php if ($header_height === '0') { ?>
		display: none;
	<?php } else { ?>
		min-height: <?php echo esc_attr($header_height); ?>vh;
	<?php } ?>
}
<?php } ?>
<?php if ($portfolio_header_bg = get_post_meta($id, 'portfolio_header_bg', true)) { ?>
.postid-<?php echo esc_attr($id); ?> .post-gallery.parallax .parallax_bg {
	<?php thb_bgecho($portfolio_header_bg); ?>;
}
<?php } ?>
<?php if ($portfolio_header_bg_2 = get_post_meta($id, 'portfolio_header_bg_2', true)) { ?>
.postid-<?php echo esc_attr($id); ?> .portfolio-title.style2 {
	<?php thb_bgecho($portfolio_header_bg_2); ?>;
}
<?php } ?>
<?php if ($portfolio_bg = get_post_meta($id, 'portfolio_bg', true)) { ?>
.postid-<?php echo esc_attr($id); ?> .post.portfolio-detail {
	<?php thb_bgecho($portfolio_bg); ?>;
}
<?php } ?>
/* Typography */
<?php if ($primary_type = ot_get_option('primary_type')) { ?>
h1,h2,h3,h4,h5,h6 {
	<?php thb_typeecho($primary_type); ?>		
}
<?php } ?>
<?php if ($h1_type = ot_get_option('h1_type')) { ?>
h1,
.h1 {
	<?php thb_typeecho($h1_type); ?>		
}
<?php } ?>
<?php if ($h2_type = ot_get_option('h2_type')) { ?>
h2 {
	<?php thb_typeecho($h2_type); ?>		
}
<?php } ?>
<?php if ($h3_type = ot_get_option('h3_type')) { ?>
h3 {
	<?php thb_typeecho($h3_type); ?>		
}
<?php } ?>
<?php if ($h4_type = ot_get_option('h4_type')) { ?>
h4 {
	<?php thb_typeecho($h4_type); ?>		
}
<?php } ?>
<?php if ($h5_type = ot_get_option('h5_type')) { ?>
h5 {
	<?php thb_typeecho($h5_type); ?>		
}
<?php } ?>
<?php if ($h6_type = ot_get_option('h6_type')) { ?>
h6 {
	<?php thb_typeecho($h6_type); ?>		
}
<?php } ?>
<?php if ($body_type = ot_get_option('body_type')) { ?>
p {
	<?php thb_typeecho($body_type); ?>		
}
.columns.thb-light-column p {
	color: #fff;
}
<?php } ?>
<?php if ($em_type = ot_get_option('em_type')) { ?>
em {
	<?php thb_typeecho($em_type); ?>		
}
<?php } ?>
<?php if ($mobilemenu_type = ot_get_option('mobilemenu_type')) { ?>
.thb-mobile-menu a {
	<?php thb_typeecho($mobilemenu_type); ?>		
}
<?php } ?>
<?php if ($fullmenu_type = ot_get_option('fullmenu_type')) { ?>
.thb-full-menu li a {
	<?php thb_typeecho($fullmenu_type); ?>		
}
<?php } ?>
<?php if ($footer_widget_title_type = ot_get_option('footer_widget_title_type')) { ?>
.footer h6,
.footer.dark h6 {
	<?php thb_typeecho($footer_widget_title_type); ?>		
}
<?php } ?>
<?php if ($secondary_type = ot_get_option('secondary_type')) { ?>
body {
	<?php thb_typeecho($secondary_type); ?>		
}
<?php } ?>
<?php if ($button_type = ot_get_option('button_type')) { ?>
input[type="submit"],
.button,
.btn {
	<?php thb_typeecho($button_type); ?>		
}
<?php } ?>
<?php if ($menu_type = ot_get_option('menu_type')) { ?>
#mobile-menu,
.header {
	<?php thb_typeecho($menu_type); ?>		
}
<?php } ?>
/* Logo Height */
<?php if ($logo_height = ot_get_option('logo_height')) { ?>
.header .logolink .logoimg {
	max-height: <?php thb_measurementecho($logo_height); ?>;	
}
<?php } ?>

<?php if ($logo_height_mobile = ot_get_option('logo_height_mobile')) { ?>
@media screen and (max-width: 40.0625em) {
	.header .logolink .logoimg {
		max-height: <?php thb_measurementecho($logo_height_mobile); ?>;	
	}
}

<?php } ?>

/* Mobile Menu Icon Size */
<?php if ($mobile_menu_icon_size = ot_get_option('mobile_menu_icon_size')) { ?>
	<?php if ($mobile_menu_icon_size > 1) { ?>
		.mobile-toggle {
			transform: scale(<?php echo esc_attr(1 + ($mobile_menu_icon_size - 1) / 10); ?>);
		}
	<?php } ?>
<?php } ?>
/* Header Spacing */
<?php if ($header_padding = ot_get_option('header_padding')) { ?>
@media only screen and (min-width: 75em) {
	.header,
	.midnightHeader .midnightInner {
		<?php thb_paddingecho($header_padding); ?>;	
	}
}
<?php } ?>
/* Half Mobile Menu Width */
<?php if ($mobile_menu_width = ot_get_option('mobile_menu_width', '50')) { ?>
@media only screen and (min-width: 64.063em) {
	#mobile-menu.style1 {
		width: <?php echo esc_attr($mobile_menu_width); ?>%;
	}
}
<?php } ?>
/* Portfolio Colors */
<?php
	$args = array(
		'posts_per_page' => -1, 
		'post_type'=>'portfolio', 
		'no_found_rows' => true
	);

	$posts = new WP_Query( $args );
	
	if ($posts->have_posts()) :  while ($posts->have_posts()) : $posts->the_post();
		$thb_id = get_the_ID();
		$main_color = get_post_meta($thb_id, 'main_color', true);
		
		if ($main_color) {
		?>
			.thb-portfolio #portfolio-<?php echo esc_attr($thb_id); ?>.type-portfolio.style3:hover .portfolio-holder,
			.thb-portfolio #portfolio-<?php echo esc_attr($thb_id); ?>.type-portfolio:not(.thb-gradient-hover):not(.thb-corner-hover) .portfolio-link,
			.thb-portfolio #portfolio-<?php echo esc_attr($thb_id); ?>.type-portfolio.thb-corner-hover:hover .portfolio-link,
			.thb-portfolio #portfolio-<?php echo esc_attr($thb_id); ?>.type-portfolio.style2 .portfolio-holder .portfolio-inner:not(.thb-image-hover) {
				background: <?php echo esc_attr($main_color); ?>;	
			}
			.thb-portfolio #portfolio-<?php echo esc_attr($thb_id); ?>.type-portfolio.style6 .portfolio-holder:after {
				border-color: <?php echo esc_attr($main_color); ?>;	
			}
		<?php
		}
	endwhile; else : endif;
	wp_reset_query();
?>
/* Backgrounds */
<?php if ($header_bg = ot_get_option('header_bg')) { ?>
.header:before,
.header.style3 {
	<?php thb_bgecho($header_bg); ?>
}
<?php } ?>
.page-id-<?php echo esc_attr($id); ?> #wrapper div[role="main"] {
	<?php thb_bgecho( get_post_meta($id, 'page_bg', true)); ?>
}
<?php if ($footer_bg = ot_get_option('footer_bg')) { ?>
.footer {
	<?php thb_bgecho($footer_bg); ?>
}
<?php } ?>
<?php if ($subfooter_bg = ot_get_option('subfooter_bg')) { ?>
.subfooter {
	<?php thb_bgecho($subfooter_bg); ?>
}
<?php } ?>
<?php if ($mobilemenu_bg = ot_get_option('mobilemenu_bg')) { ?>
#mobile-menu {
	<?php thb_bgecho($mobilemenu_bg); ?>
}
.thb-mobile-menu .nav-link-mask {
	<?php thb_bgecho($mobilemenu_bg, 'background-color'); ?>
}
<?php } ?>
<?php if ($call_to_action_bg = ot_get_option('call_to_action_bg')) { ?>
.thb_call_to_action {
	<?php thb_bgecho($call_to_action_bg); ?>
}
<?php } ?>
<?php if ($notfound_bg = ot_get_option('notfound_bg')) { ?>
.page-404 {
	<?php thb_bgecho($notfound_bg); ?>
}
<?php } ?>
/* Site Borders */
<?php if (ot_get_option('site_borders') == 'on') { ?>
.thb-borders {
	border-color: <?php echo esc_attr(ot_get_option('site_borders_color')); ?>;
}
	<?php if ($site_borders_width = ot_get_option('site_borders_width')) { ?>
	@media only screen and (min-width: 40.063em) {
	  .thb-borders {
	    border-width: <?php thb_measurementecho($site_borders_width); ?>;
	  }
	  .thb-borders-on .header {
	  	margin-top: <?php thb_measurementecho($site_borders_width); ?>;
	  }
	  .thb-borders-on .blog-container {
	    top: <?php thb_measurementecho($site_borders_width); ?>;
	  }
	  .thb-borders-on .subfooter {
	    margin-bottom: <?php thb_measurementecho($site_borders_width); ?>;
	  }
	  .thb-borders-on .demo-switcher {
	  	right: <?php thb_measurementecho($site_borders_width); ?>;
	  }
	  #mobile-menu .custom_scroll {
	  	padding-top: <?php thb_measurementecho($site_borders_width); ?>;
	  	padding-bottom: <?php thb_measurementecho($site_borders_width); ?>;
	  }
	}
	@media only screen and (min-width: 64.063em) {
		#mobile-menu .thb-close {
	    top: calc(30px + <?php thb_measurementecho($site_borders_width); ?>);
	    right: calc(30px + <?php thb_measurementecho($site_borders_width); ?>);
		}
	}
	<?php } ?>
<?php } ?>
/* Colors */
<?php if ($accent_color = ot_get_option('accent_color')) { ?>
a:hover, ol li:before, ol li ol li:before, .thb-full-menu li.menu-item-has-children.sfHover > a, .mm-link-animation-bg-fill .thb-mobile-menu a:hover, .mm-link-animation-bg-fill .thb-mobile-menu li.current_page_item:not(.has-hash), .post .post-title a:hover, .authorpage .author-content .square-icon:hover, ol.commentlist .comment .reply a, input[type="submit"].thb-border-style.accent,.button.thb-border-style.accent,.btn.thb-border-style.accent, input[type="submit"].thb-text-style.accent,.button.thb-text-style.accent,.btn.thb-text-style.accent, .more-link, .pagination .page-numbers.current, .pagination .page-numbers:not(.dots):hover, .thb-portfolio .type-portfolio.style2:hover h2, .thb-list-portfolio:not(.thb-bg-grid-full) .thb-content-side .type-portfolio.active h1, .thb-list-portfolio:not(.thb-bg-grid-full) .thb-content-side .type-portfolio.active h2, .thb-list-portfolio:not(.thb-bg-grid-full) .thb-content-side .type-portfolio.active h3, .thb-list-portfolio:not(.thb-bg-grid-full) .thb-content-side .type-portfolio.active .thb-categories, .thb-list-portfolio:not(.thb-bg-grid-full) .thb-content-side.light-title .type-portfolio.active h1, .thb-list-portfolio:not(.thb-bg-grid-full) .thb-content-side.light-title .type-portfolio.active h2, .thb-list-portfolio:not(.thb-bg-grid-full) .thb-content-side.light-title .type-portfolio.active h3, .thb-list-portfolio:not(.thb-bg-grid-full) .thb-content-side.light-title .type-portfolio.active .thb-categories, .thb-autotype .thb-autotype-entry, .post_nav_link:hover span, .thb-breadcrumb-holder a:hover, .thb-counter, .thb-counter h6, .thb-portfolio-filter.style2 ul li a.active, .thb-portfolio-filter.style2 ul li a:hover, .thb-portfolio-filter.style3 ul li a.active, .thb-portfolio-filter.style3 ul li a:hover, .white-header .thb-full-menu>li.current-menu-item:not(.has-hash)>a, .light-title .header:not(.hover):not(:hover) .thb-full-menu>li.current-menu-item:not(.has-hash)>a, .disable_header_fill-on.light-title .header .thb-full-menu>li.current-menu-item:not(.has-hash)>a, .thb-full-menu li.current-menu-item:not(.has-hash)>a, #wrapper ol li:before, .header.style3.dark .thb-full-menu>li.current-menu-item:not(.has-hash)>a, .btn.thb-fill-style.accent {
  color: <?php echo esc_attr($accent_color); ?>;
}
.post.style5 .blog-content:after, .post.style6 .post-gallery, .post.style7 .blog-content:after, input[type="submit"]:hover, .button:not(.thb-text-style):not(.thb-border-style):not(.thb-fill-style):not(.thb-solid-border):hover, .btn:not(.thb-text-style):not(.thb-border-style):not(.thb-fill-style):not(.thb-solid-border):hover, .button.wc-forward, .place-order .button, input[type="submit"].accent,.button.accent:not(.thb-text-style):not(.thb-border-style):not(.thb-fill-style),.btn.accent:not(.thb-text-style):not(.thb-border-style):not(.thb-fill-style):not(.thb-solid-border), input[type="submit"].thb-3d-style.accent span,.button.thb-3d-style.accent span,.btn.thb-3d-style.accent span, input[type="submit"].thb-border-style.accent:hover,.button.thb-border-style.accent:hover,.btn.thb-border-style.accent:hover, input[type="submit"].thb-fill-style.accent:before,.button.thb-fill-style.accent:before,.btn.thb-fill-style.accent:before, input[type="submit"].thb-text-style.accent:before, input[type="submit"].thb-text-style.accent:after,input[type="submit"].thb-text-style.accent span:before,input[type="submit"].thb-text-style.accent span:after,.button.thb-text-style.accent:before,.button.thb-text-style.accent:after,.button.thb-text-style.accent span:before,.button.thb-text-style.accent span:after,.btn.thb-text-style.accent:before,.btn.thb-text-style.accent:after,.btn.thb-text-style.accent span:before,.btn.thb-text-style.accent span:after, .pagination .page-numbers.prev:before, .pagination .page-numbers.next:after, .thb_row_pagination li:hover, .thb_row_pagination li.active, .thb_row_pagination li:hover span, .thb_row_pagination li.active span, .swiper-container .swiper-nav.arrow-style1:hover span, .slick-nav:hover span, .slick-dots li.slick-active, .thb-iconbox.type2:hover, .thb_call_to_action, #music_toggle:hover, #music_toggle.on, .woocommerce-MyAccount-navigation ul li:hover a, .woocommerce-MyAccount-navigation ul li.is-active a, .btn.thb-solid-border.accent:hover, .thb-image-slider.thb-image-slider-style4 figcaption, .swiper-nav.style1:hover span, .thb-portfolio-filter.style3 ul li a.active:before, .thb-portfolio-filter.style3 ul li a:hover:before, .thb-client-row.thb-opacity.with-accent .thb-client:hover {
	background-color: <?php echo esc_attr($accent_color); ?>;
}
.btn.thb-fill-style.accent:after {
	background-color: <?php echo esc_attr(thb_adjustColorLightenDarken($accent_color, 10)); ?>;
}
.thb-team-row .thb-team-member .team-information {
	background-color: rgba(<?php echo esc_attr(thb_hex2rgb($accent_color)); ?>, 0.9);	
}
ol li:before, ol li ol li:before, input[type="text"]:focus, input[type="password"]:focus,input[type="date"]:focus,
input[type="datetime"]:focus,input[type="email"]:focus,input[type="number"]:focus,input[type="search"]:focus,input[type="tel"]:focus,input[type="time"]:focus,input[type="url"]:focus,textarea:focus, input[type="submit"].thb-border-style.accent,.button.thb-border-style.accent,.btn.thb-border-style.accent, input[type="submit"].thb-fill-style.accent,.button.thb-fill-style.accent, input[type="submit"].thb-text-style.accent span,.button.thb-text-style.accent span,.btn.thb-text-style.accent span, .thb-portfolio .type-portfolio.thb-border-hover .portfolio-link:before, .swiper-container .swiper-nav.arrow-style1:hover span, .slick-nav:hover span, .thb-team-row .thb-team-member.thb-add-new > a:hover, .thb-iconbox.type2:hover, .woocommerce-MyAccount-navigation ul li:hover a, .woocommerce-MyAccount-navigation ul li.is-active a, .btn.thb-solid-border.accent:hover, .swiper-nav.style1:hover span, .light-arrow .slick-nav:hover span, .post.style1.style8:hover, .thb-portfolio .type-portfolio.style6 .portfolio-holder:after, #wrapper ol li:before, .btn.thb-fill-style.accent {
	border-color: <?php echo esc_attr($accent_color); ?>;
}
.thb-image-slider.thb-image-slider-style4 figcaption:after {
	border-top-color: <?php echo esc_attr($accent_color); ?>;
}
.thb-iconbox.type3:after {
	box-shadow: inset 0 -75px 60px -35px <?php echo esc_attr($accent_color); ?>;	
}
.woocommerce-MyAccount-navigation ul li:hover+li a, .woocommerce-MyAccount-navigation ul li.is-active+li a {
	border-top-color: <?php echo esc_attr($accent_color); ?>;	
}
.thb-preloader .thb-preloader-icon-hexagon .preloader-path,
.thb-preloader .thb-preloader-icon-circle .path,
.thb-team-row .thb-team-member.thb-add-new > a:hover svg path,
.thb-iconbox.type3 svg path, .thb-iconbox.type3 svg circle, .thb-iconbox.type3 svg rect, .thb-iconbox.type3 svg ellipse,
.thb-counter figure svg path, .thb-counter figure svg circle, .thb-counter figure svg rect, .thb-counter figure svg ellipse {
	stroke: <?php echo esc_attr($accent_color); ?>;
}
.thb-list-portfolio:not(.thb-bg-grid-full) .thb-content-side .type-portfolio.active .next svg, .thb-list-portfolio:not(.thb-bg-grid-full) .thb-content-side.light-title .type-portfolio.active .next svg {
	fill: <?php echo esc_attr($accent_color); ?>;
}
.thb-show-all .items ul li:hover figure {
	box-shadow: 0 0 0 3px <?php echo esc_attr($accent_color); ?> inset;
}
<?php } ?>

<?php if ($mobile_menu_icon_color = ot_get_option('mobile_menu_icon_color')) { ?>
.mobile-toggle span { 
	background: <?php echo esc_attr($mobile_menu_icon_color); ?>;
}
.mobile-toggle strong { 
	color: <?php echo esc_attr($mobile_menu_icon_color); ?>;
}
<?php } ?>

<?php if ($footer_widget_title_color = ot_get_option('footer_widget_title_color')) { ?>
.footer.dark h6,
.footer h6 {
	color: <?php echo esc_attr($footer_widget_title_color); ?>;
}
<?php } ?>

<?php if ($footer_text_color = ot_get_option('footer_text_color')) { ?>
.footer.dark .widget,
.footer .widget {
	color: <?php echo esc_attr($footer_text_color); ?>;
}
<?php } ?>

<?php if ($mobile_menu_link_fill = ot_get_option('mobile_menu_link_fill')) { ?>
.thb-mobile-menu .nav-link-mask .nav-link-mask-text {
	color: <?php echo esc_attr($mobile_menu_link_fill); ?>;
}
<?php } ?>
<?php if ($general_link_color = ot_get_option('general_link_color')) { ?>
<?php thb_linkcolorecho($general_link_color, ''); ?>
<?php } ?>
<?php if ($fullmenu_link_color_dark = ot_get_option('fullmenu_link_color_dark')) { ?>
<?php thb_linkcolorecho($fullmenu_link_color_dark, '.thb-full-menu>li>'); ?>
<?php } ?>
<?php if ($footer_link_color = ot_get_option('footer_link_color')) { ?>
<?php thb_linkcolorecho($footer_link_color, '.footer .widget'); ?>
<?php thb_linkcolorecho($footer_link_color, '.footer.dark .widget'); ?>
<?php } ?>

/* Measurements */
<?php if ( $thb_grid_size = ot_get_option('thb_grid_size')) { ?>
.row,
.row.max_width {
	max-width: <?php echo esc_html($thb_grid_size); ?>px;
}
<?php } ?>
<?php if ($footer_padding = ot_get_option('footer_padding')) { ?>
#footer {
	<?php thb_spacingecho($footer_padding, false, 'padding'); ?>;
}
<?php } ?>
<?php if ($subfooter_padding = ot_get_option('subfooter_padding')) { ?>
#subfooter .subfooter-container {
	<?php thb_spacingecho($subfooter_padding, false, 'padding'); ?>;
}
<?php } ?>
/* Extra CSS */
<?php echo ot_get_option('extra_css'); ?>
<?php 
	$out = ob_get_clean();
	// Remove comments
	$out = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $out);
	// Remove space after colons
	$out = str_replace(': ', ':', $out);
	// Remove whitespace
	$out = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $out);
	
	return $out;
}