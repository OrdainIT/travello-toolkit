<?php

function enqueue_dynamic_pricing_script()
{


    // Fetch prices dynamically from post meta
    $tour_prices = get_post_meta(get_the_ID(), '_tour_prices', true);

    $prices = array(
        'adults' => array(
            'regular' => $tour_prices['adults_regular'] ?? 0,
            'sale'    => $tour_prices['adults_sale'] ?? 0,
        ),
        'kids' => array(
            'regular' => $tour_prices['kids_regular'] ?? 0,
            'sale'    => $tour_prices['kids_sale'] ?? 0,
        ),
        'children' => array(
            'regular' => $tour_prices['children_regular'] ?? 0,
            'sale'    => $tour_prices['children_sale'] ?? 0,
        ),
    );

    // Pass the prices array to JavaScript
    wp_localize_script('ordainit-toolkit-plugin', 'dynamicPrices', $prices);
}
add_action('wp_enqueue_scripts', 'enqueue_dynamic_pricing_script');



add_action('wp_ajax_add_to_wc_cart', 'add_to_wc_cart');
add_action('wp_ajax_nopriv_add_to_wc_cart', 'add_to_wc_cart');

function add_to_wc_cart()
{
    // Validate AJAX request
    check_ajax_referer('dynamic_price_nonce', 'security');

    // Retrieve data from the request
    $adults_quantity = intval($_POST['adults_quantity']);
    $kids_quantity = intval($_POST['kids_quantity']);
    $children_quantity = intval($_POST['children_quantity']);
    $prices = $_POST['prices']; // Prices for the items

    // WooCommerce Product IDs (replace with your product IDs)
    $adults_product_id = 123; // Replace with the actual WooCommerce product ID for Adults
    $kids_product_id = 124; // Replace with the actual WooCommerce product ID for Kids
    $children_product_id = 125; // Replace with the actual WooCommerce product ID for Children

    // Add Adults to the cart
    if ($adults_quantity > 0) {
        WC()->cart->add_to_cart($adults_product_id, $adults_quantity, 0, array(), array('price' => $prices['adults']));
    }

    // Add Kids to the cart
    if ($kids_quantity > 0) {
        WC()->cart->add_to_cart($kids_product_id, $kids_quantity, 0, array(), array('price' => $prices['kids']));
    }

    // Add Children to the cart
    if ($children_quantity > 0) {
        WC()->cart->add_to_cart($children_product_id, $children_quantity, 0, array(), array('price' => $prices['children']));
    }

    // Redirect to WooCommerce checkout
    wp_send_json_success(array('redirect_url' => wc_get_checkout_url()));

    wp_die();
}

function enqueue_wc_dynamic_script()
{


    wp_localize_script('ordainit-toolkit-plugin', 'odTourajaxData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('dynamic_price_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_wc_dynamic_script');
