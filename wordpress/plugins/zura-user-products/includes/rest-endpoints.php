<?php

add_action('rest_api_init', function() {
    register_rest_route('my-api/v1', '/user/(?P<id>\d+)/products', [
        'methods' => 'GET',
        'callback' => 'zura_get_user_products',
        'permission_callback' => '__return_true',
    ]);
});

function zura_get_user_products($data) {
    $user_id = $data['id'];
    $products = zura_fetch_user_products($user_id);

    if (isset($products['error'])) {
        return new WP_Error('ci_api_error', $products['error'], ['status' => 500]);
    }

    return rest_ensure_response($products);
}
?>