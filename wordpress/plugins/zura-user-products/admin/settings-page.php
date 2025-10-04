<?php
function zura_plugin_menu() {
    add_menu_page('Zura Settings', 'Zura Settings', 'manage_options', 'zura-settings', 'zura_settings_page');
}
add_action('admin_menu', 'zura_plugin_menu');

function zura_settings_page() {
    ?>
    <div class="wrap">
        <h2>Zura User API Settings</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('zura-settings-group');
            do_settings_sections('zura-settings-group');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">User ID</th>
                    <td><input type="number" name="zura_user_id" value="<?php echo esc_attr(get_option('zura_user_id')); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function zura_register_settings() {
    register_setting('zura-settings-group', 'zura_user_id');
}
add_action('admin_init', 'zura_register_settings');
?>