<?php
function zura_register_user_products_cpt() {
    register_post_type('user_product', [
        'label' => 'User Products',
        'public' => true,
        'supports' => ['title', 'editor', 'custom-fields'],
        'show_in_rest' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
    ]);
}
add_action('init', 'zura_register_user_products_cpt');
?>