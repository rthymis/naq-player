<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Naq_Player
 * @subpackage Naq_Player/admin/partials
 */
?>
<div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

        <form action="options.php" method="post">
            <?php
                // security field
                settings_fields( 'myplugin-settings-page' );

                // output settings section here
                do_settings_sections('myplugin-settings-page');

                // save settings button
                submit_button( __('Save Settings', 'naq-player') );
            ?>
        </form>

        <p><?php echo _e('Place the shortcode ', 'naq-player')?><span style="font-size:18px;">[naq_player_shortcode]</span> <?php echo _e('where you want the player to appear.', 'naq-player')?> </p>



</div>
