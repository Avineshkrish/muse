<?php

/* Custom Language Switcher */
function thb_language_switcher() {
	$host = 'werkstatt.fuelthemes.net';
	$thb_ls = ot_get_option('thb_ls', 'on');
	if ($thb_ls !== 'off') {
		if ( function_exists('icl_get_languages') || $_SERVER['HTTP_HOST'] === $host || function_exists('pll_the_languages')) {
			$permalink = get_permalink();
		?>
		<ul class="thb-full-menu thb-language-switcher">
			<li class="menu-item-has-children">
				<a href="#"><?php
					if ($_SERVER['HTTP_HOST'] === $host) {
						$languages = array(
							"en" => array(
								"language_code" => "en",
								"active" => 1,
								"url" => $permalink,
								"native_name" => "English"
							),
							"fr" => array(
								"language_code" => "fr",
								"active" => 0,
								"url" => $permalink,
								"native_name" => "Français"
							),
							"de" => array(
								"language_code" => "de",
								"active" => 0,
								"url" => $permalink,
								"native_name" => "Deutsch"
							)
						);
					} else if (function_exists('pll_the_languages')) {
						$languages = pll_the_languages(array('raw'=>1));	
					} else if (function_exists('icl_get_languages')) {
						$languages = icl_get_languages('skip_missing=0');
					} 
					
						if(1 < count($languages)){
							if (function_exists('pll_the_languages')) { // Polylang
								foreach($languages as $l){
									echo esc_attr($l['current_lang'] ? $l['slug'] : '');
								}
							} else { // WPML
								foreach($languages as $l){
									echo esc_attr($l['active'] ? $l['language_code'] : '');
								}
							}
						}
					?></a>
				<ul class="sub-menu" id="thb_language_selector">
				<?php
					if(0 < count($languages)){
						foreach($languages as $l){
							if (function_exists('pll_the_languages')) {
								if (!$l['current_lang']) {
									echo '<li><a href="'.$l['url'].'" title="'.$l['name'].'">'.$l['slug'].'</a></li>';
								}
							} else {
								if (!$l['active']) {
									echo '<li><a href="'.$l['url'].'" title="'.$l['native_name'].'">'.$l['native_name'].'</a></li>';
								}
							}
						}
					} else {
						echo '<li>'.esc_html__('Add Languages', 'werkstatt').'</li>';	
					}
				?>
				</ul>
			</li>
		</ul>
		<?php 
		}
	}
}
add_action( 'thb_language_switcher', 'thb_language_switcher' );

/* Custom Language Switcher */
function thb_language_switcher_mobile() {
	$thb_ls = ot_get_option('thb_ls', 'on');
	$host = 'werkstatt.fuelthemes.net';
	if ($thb_ls !== 'off') {
		if ( function_exists('icl_get_languages') || $_SERVER['HTTP_HOST'] === $host || function_exists('pll_the_languages')) {
			$permalink = get_permalink();
		?>
		<div class="thb-mobile-language-switcher" id="thb_language_selector">
			<?php
				if ($_SERVER['HTTP_HOST'] === $host) {
					$languages = array(
						"en" => array(
							"language_code" => "en",
							"active" => 1,
							"url" => $permalink,
							"native_name" => "English"
						),
						"fr" => array(
							"language_code" => "fr",
							"active" => 0,
							"url" => $permalink,
							"native_name" => "Français"
						),
						"de" => array(
							"language_code" => "de",
							"active" => 0,
							"url" => $permalink,
							"native_name" => "Deutsch"
						)
					);
				} else if (function_exists('pll_the_languages')) {
					$languages = pll_the_languages(array('raw'=>1));	
				} else if (function_exists('icl_get_languages')) {
					$languages = icl_get_languages('skip_missing=0');
				} 

				if(0 < count($languages)){
					foreach($languages as $l){
						if (function_exists('pll_the_languages')) {
							$class = $l['current_lang'] ? ' class="active"' : '';  
							echo '<a href="'.$l['url'].'"'.$class.' title="'.$l['name'].'">'.$l['slug'].'</a>';
						} else {
							$class = $l['active'] ? ' class="active"' : '';  
							echo '<a href="'.$l['url'].'"'.$class.' title="'.$l['native_name'].'">'.$l['language_code'].'</a>';
						}
					}
				} else {
					echo esc_html__('Add Languages', 'werkstatt');	
				}
			?>
		</div>
		<?php 
		}
	}
}
add_action( 'thb_language_switcher_mobile', 'thb_language_switcher_mobile' );