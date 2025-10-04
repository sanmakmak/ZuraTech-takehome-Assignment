<?php
/**
 * Plugin Name: Zura User Products
 * Description: Integrates CodeIgniter API to expose User Products via custom REST API.
 * Version: 1.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) exit;

require_once plugin_dir_path(__FILE__) . 'includes/cpt-user-products.php';
require_once plugin_dir_path(__FILE__) . 'includes/api-client.php';
require_once plugin_dir_path(__FILE__) . 'includes/rest-endpoints.php';
require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
?>