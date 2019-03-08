<?php if (ot_get_option('call_to_action', 'off') == 'on') { ?>
	<div class="small-12 columns">
		<aside class="thb_call_to_action reverse-<?php echo esc_attr(ot_get_option('call_to_action_rtl', 'off')); ?>">
			<div><?php echo wp_kses_post(ot_get_option('call_to_action_text')); ?></div>
			<a href="<?php echo esc_attr(ot_get_option('call_to_action_button_link')); ?>" class="button <?php echo esc_attr(ot_get_option('call_to_action_button_color')); ?> <?php echo esc_attr(ot_get_option('call_to_action_button_style')); ?>" target="_blank" title="<?php echo esc_attr(ot_get_option('call_to_action_button_text')); ?>">
				<span><?php echo esc_html(ot_get_option('call_to_action_button_text')); ?></span>
			</a>
		</aside>
	</div>
<?php } ?>