<?php

settings_errors();

// Get Plugin Version Information
$base_nam       = plugin_dir_path( dirname( __FILE__, 1 ) );
$filpath        = str_replace( "\\", "/", $base_nam );
$plugin_data    = get_plugin_data( $filpath . 'prime-extensions-vc-pro.php' );
$plugin_version = $plugin_data['Version'];

?>
<div id="pev-wrap">
    <div id="pev-desc-main">
        <h3 id="pev-title">Prime Extensions For Visual Composer</h3>
        <p>Prime Extensions has module basis structure. You can easily activate/deactivate any module as your needs anytime. When you updated plugin, you can check this page and activate new
            modules.</p>
    </div>
    <div class="pev-logo-img"><span>Version <?php echo $plugin_version; ?></span></div>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Addons</a></li>
        <li><a href="#tab-2">About</a></li>
    <!--    <li><a href="#tab-3">Updates</a></li>-->

    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <form method="post" action="options.php">
				<?php
				settings_fields( 'prime_vc_options_group' );
				$option = get_option( 'prime_vc' );
				if ( is_array( $option ) ) {
					$activate   = count( array_filter( $option ) );
					$all_extens = count( $option );
					$inactive   = $all_extens - $activate;
				} else {
					$activate   = 0;
					$all_extens = count( $this->shortcodes );
					$inactive   = count( $this->shortcodes );
				}
				?>

                <ul class="prime_module_count">
                    <li class="prime-ext-all"><a href="<?php echo add_query_arg( array( 'page' => 'prime_vc', 'filter' => 'all' ), admin_url( 'admin.php' ) ); ?>">All <span
                                    class="count">(<?php echo $all_extens; ?>)</span></a> |
                    </li>
                    <li class="active"><a href="<?php echo add_query_arg( array( 'page' => 'prime_vc', 'filter' => 'active' ), admin_url( 'admin.php' ) ); ?>">Active <span
                                    class="count">(<?php echo $activate; ?>)</span></a> |
                    </li>
                    <li class="inactive"><a href="<?php echo add_query_arg( array( 'page' => 'prime_vc', 'filter' => 'inactive' ), admin_url( 'admin.php' ) ); ?>">Inactive <span
                                    class="count">(<?php echo $inactive; ?>)</span></a></li>

                </ul>
                <div class="prime_checkbox_select">
                    <input type="checkbox" id="select_all" value="1" class="checkbox"> Enable/Disable All
                </div>

                <!--<input type="checkbox" id='select_all' />Activate All<br />-->

				<?php
				do_settings_sections( 'prime_vc' );
				submit_button();
				?>
            </form>
        </div>

        <div id="tab-2" class="tab-pane">

            <div class="prime-page-welcome about-wrap container">
                <div class="prime_welcome-feature">
                    <!--<div class="about-text">The Prime Extensions VC Addons currently has a lot of modules. It will be updated periodically and you'll get much more modules & existing modules will be
                        improved.
                    </div>-->


                    <div class="prime-grid-wrapper row">
                        <div class="col-md-6 prime-grid-item ">
                            <h4><span class="dashicons dashicons-images-alt2 prime_lefticon"></span>What is the Prime Extensions for Visual Composer?</h4>
                            <p>The Prime Extensions for Visual Composer is developed to extend Visual Composer to save your time in building websites. This plugin adds a number of elements to the basic set of elements that come with the page builder. All these elements are added to your Visual Composer editor and can be used just like any other built-in features.</p>
                        </div>

                        <div class="col-md-6 prime-grid-item">
                            <h4><span class="dashicons dashicons-admin-settings prime_lefticon"></span> Icons, Fonts, Typography, Design</h4>
                            <p>Infinity effects & variations usage comes with Prime Extensions VC Addons in your way. You can apply your own customized shortcodes in anywhere with flexible
                                effects.</p>
                        </div>
                    </div>
                    <div class="prime-grid-wrapper">
                        <div class="col-md-6 prime-grid-item">
                            <h4><span class="dashicons dashicons-editor-expand prime_lefticon"></span>Advanced Elements</h4>
                            <p>With the Prime Extensions Addons, you are free to use the basic elements of Visual Composer with several advanced elements that it adds in the editor.</p>
                        </div>

                        <div class="col-md-6 ">
                            <h4><span class="dashicons dashicons-universal-access prime_lefticon"></span> We stand by you!</h4>
                            <p>With several video tutorials and a dedicated support team, we assure complete help and support whenever you need us. Go ahead and explore the Prime elements of the Prime Extensions for Visual Composer!</p>
                        </div>
                    </div>

                    <div class="prime-grid-wrapper">
                        <div class="col-lg-12 nopadding">
                            <iframe class="prime-iframe" src="http://codecans.com/tutorials/prime-extension-documentation/change-log.html" frameborder="0" width="100%" height="400px"></iframe>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!--<div id="tab-3" class="tab-pane">
            <h3>Updates</h3>
        </div>-->
    </div>
</div>