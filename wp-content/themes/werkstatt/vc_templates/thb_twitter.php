<?php function thb_twitter( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_twitter', $atts );
	extract( $atts );
	ob_start();

 	$tweets = thb_gettweets($count);
	
	$classes[] = 'thb_twitter_container';
	$classes[] = $style;
	
	if ($style == 'style2') {
		$classes[] = 'slick text-center';
	}
 	?>
 	<aside class="<?php echo implode(' ', $classes); ?>" data-pagination="true" data-columns="1">
 		<?php 
 			if (is_array($tweets)) {
 				foreach ($tweets as $tweet) {
 					?>
 					<div class="thb_tweet">
 						<p><?php echo wp_kses_post($tweet['tweet']); ?></p>
 						<a href="<?php echo esc_url($tweet['url']); ?>" class="thb_tweet_time" target="_blank"><?php echo wp_kses_post($tweet['time']); ?></a>
 					</div>
 					<?php
 				}
 			} else {
 				var_dump($tweets);
 			}
 		?>
	</aside>
	<?php
   $out = ob_get_contents();
   if (ob_get_contents()) ob_end_clean();
  return $out;
}
thb_add_short('thb_twitter', 'thb_twitter');
