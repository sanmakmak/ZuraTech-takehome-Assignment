<?php

function zura_fetch_user_products($user_id) {
    $token = getenv('CI_API_BEARER_TOKEN') ?: 'here-is-my-token'; // fallback
    $url = "http://codeigniter/index.php/users/{$user_id}/products";

    $response = wp_remote_get($url, [
        'headers' => [
            'Authorization' => 'Bearer ' . $token
        ]
    ]);

    if (is_wp_error($response)) {
        return ['error' => $response->get_error_message()];
    }

    $body = wp_remote_retrieve_body($response);
    return json_decode($body, true);
}
?>