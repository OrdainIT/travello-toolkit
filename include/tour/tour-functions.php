<?php
// Capture custom tour data and store it in the session
function od_capture_tour_data_in_checkout()
{
    if (isset($_POST['tour_name']) && isset($_POST['total_price'])) {
        WC()->session->set('tour_name', sanitize_text_field($_POST['tour_name']));
        WC()->session->set('total_price', sanitize_text_field($_POST['total_price']));
    }
}
add_action('template_redirect', 'od_capture_tour_data_in_checkout');

// Add custom tour data to WooCommerce order
function od_add_tour_data_to_order($order_id)
{
    if ($tour_name = WC()->session->get('tour_name')) {
        update_post_meta($order_id, 'Tour Name', $tour_name);
    }
    if ($total_price = WC()->session->get('total_price')) {
        update_post_meta($order_id, 'Total Price', $total_price);
    }
}
add_action('woocommerce_checkout_update_order_meta', 'od_add_tour_data_to_order');

// Display custom tour data in the order email
function od_display_tour_data_in_emails($order, $sent_to_admin, $plain_text, $email)
{
    $tour_name = get_post_meta($order->get_id(), 'Tour Name', true);
    $total_price = get_post_meta($order->get_id(), 'Total Price', true);

    if ($tour_name && $total_price) {
        echo '<p><strong>Tour Name:</strong> ' . esc_html($tour_name) . '</p>';
        echo '<p><strong>Total Price:</strong> ' . wc_price($total_price) . '</p>';
    }
}
add_action('woocommerce_email_order_meta', 'od_display_tour_data_in_emails', 10, 4);

// Display custom tour data in the WooCommerce admin order page
function od_display_tour_data_in_admin_order($order)
{
    $tour_name = get_post_meta($order->get_id(), 'Tour Name', true);
    $total_price = get_post_meta($order->get_id(), 'Total Price', true);

    if ($tour_name && $total_price) {
        echo '<p><strong>Tour Name:</strong> ' . esc_html($tour_name) . '</p>';
        echo '<p><strong>Total Price:</strong> ' . wc_price($total_price) . '</p>';
    }
}
add_action('woocommerce_admin_order_data_after_order_details', 'od_display_tour_data_in_admin_order');

add_action('woocommerce_before_checkout_form', function () {
    $tour_name = WC()->session->get('tour_name');
    $total_price = WC()->session->get('total_price');

    if ($tour_name && $total_price) {
        echo '<div class="tour-details">';
        echo '<h3>Booking Details</h3>';
        echo '<p><strong>Tour Name:</strong> ' . esc_html($tour_name) . '</p>';
        echo '<p><strong>Total Price:</strong> ' . wc_price($total_price) . '</p>';
        echo '</div>';
    }
});



// Redirect to the checkout page after adding an item to the cart
function od_redirect_to_checkout()
{
    if (isset($_REQUEST['add-to-cart']) && isset($_POST['total_price'])) {
        // Skip cart and redirect to checkout
        wp_safe_redirect(wc_get_checkout_url());
        exit;
    }
}
add_action('template_redirect', 'od_redirect_to_checkout');
