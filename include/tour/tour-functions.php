<?php

function add_tour_data_to_cart($cart_item_data, $product_id)
{
    // Check if the data exists in the URL
    if (isset($_GET['tour_name']) && isset($_GET['tour_adults_price']) && isset($_GET['tour_kids_price']) && isset($_GET['tour_children_price'])) {
        $cart_item_data['tour_name'] = sanitize_text_field($_GET['tour_name']);
        $cart_item_data['tour_adults_price'] = floatval($_GET['tour_adults_price']);
        $cart_item_data['tour_kids_price'] = floatval($_GET['tour_kids_price']);
        $cart_item_data['tour_children_price'] = floatval($_GET['tour_children_price']);
    }
    return $cart_item_data;
}
add_filter('woocommerce_add_cart_item_data', 'add_tour_data_to_cart', 10, 2);

function display_tour_data_in_cart($item_data, $cart_item)
{
    if (isset($cart_item['tour_name'])) {
        $item_data[] = array(
            'name' => 'Tour Name',
            'value' => $cart_item['tour_name'],
        );
    }
    if (isset($cart_item['tour_adults_price'])) {
        $item_data[] = array(
            'name' => 'Adults Price',
            'value' => wc_price($cart_item['tour_adults_price']),
        );
    }
    if (isset($cart_item['tour_kids_price'])) {
        $item_data[] = array(
            'name' => 'Kids Price',
            'value' => wc_price($cart_item['tour_kids_price']),
        );
    }
    if (isset($cart_item['tour_children_price'])) {
        $item_data[] = array(
            'name' => 'Children Price',
            'value' => wc_price($cart_item['tour_children_price']),
        );
    }
    return $item_data;
}
add_filter('woocommerce_get_item_data', 'display_tour_data_in_cart', 10, 2);

function add_tour_data_to_order($item, $cart_item_key, $values, $order)
{
    if (isset($values['tour_name'])) {
        $item->add_meta_data('Tour Name', $values['tour_name']);
    }
    if (isset($values['tour_adults_price'])) {
        $item->add_meta_data('Adults Price', $values['tour_adults_price']);
    }
    if (isset($values['tour_kids_price'])) {
        $item->add_meta_data('Kids Price', $values['tour_kids_price']);
    }
    if (isset($values['tour_children_price'])) {
        $item->add_meta_data('Children Price', $values['tour_children_price']);
    }
}
add_action('woocommerce_checkout_create_order_line_item', 'add_tour_data_to_order', 10, 4);
