<?php 
	$id = get_the_ID();
	$style6_header_fixed = get_post_meta($id, 'style6_header_fixed', true) ? get_post_meta($id, 'style6_header_fixed', true) : 'on';
?>
<?php if ('on' == $style6_header_fixed) { ?>
<div class="thb-fixed">
<?php } ?>
	<header class="portfolio-title style6 entry-header">
		<div class="row max_width">
			<div class="small-12 columns">
				<?php the_title('<h1 class="entry-title" itemprop="name headline">', '</h1>'); ?>
				<?php if ($portfolio_subtitle = get_post_meta($id, 'portfolio_subtitle', true)) { ?>
					<h4><?php echo wp_kses_post($portfolio_subtitle); ?></h4>
				<?php } ?>
				<?php if (has_excerpt()) { the_excerpt(); } ?>
				<?php if (get_post_meta(get_the_ID(), 'portfolio_header_attributes', true) !== 'off') { do_action( 'thb_portfolio_attributes'); } ?>
			</div>
		</div>
	</header>
<?php if ('on' == $style6_header_fixed) { ?>
	<div class="sticky-content-spacer"></div>
</div>
<?php } ?>
	