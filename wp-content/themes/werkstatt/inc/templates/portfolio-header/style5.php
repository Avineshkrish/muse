<header class="portfolio-floating-button dark">
	<a href="#" title="<?php esc_attr_e('Show Project Info', 'werkstatt'); ?>" class="thb-toggle"><span class="show-message"><?php esc_html_e('Show Project Info', 'werkstatt'); ?></span><span class="hide-message"><?php esc_html_e('Hide Project Info', 'werkstatt'); ?></span></a>
	<div>
		<div class="header-content portfolio-title not-activated">
			<div class="custom_scroll">
				<?php the_title('<h1 class="entry-title" itemprop="name headline">', '</h1>'); ?>
				<?php if ($portfolio_subtitle = get_post_meta(get_the_ID(), 'portfolio_subtitle', true)) { ?>
					<h4><?php echo wp_kses_post($portfolio_subtitle); ?></h4>
				<?php } ?>
				<?php if (has_excerpt()) { the_excerpt(); } ?>
				<?php if (get_post_meta(get_the_ID(), 'portfolio_header_attributes', true) !== 'off') { do_action( 'thb_portfolio_attributes'); } ?>
			</div>
		</div>
	</div>
</header>
