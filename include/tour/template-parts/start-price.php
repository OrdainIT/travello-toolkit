<?php
// Retrieve the prices meta field
$prices = get_post_meta(get_the_ID(), '_tour_prices', true);

// Ensure the prices exist and parse default values if not set
$prices = wp_parse_args($prices, [
    'adults_regular' => 0,
    'adults_sale' => 0,
    'kids_regular' => 0,
    'kids_sale' => 0,
    'children_regular' => 0,
    'children_sale' => 0,
]);

// Filter out blank prices (zero or empty)
$filtered_prices = array_filter([
    'adults_regular' => $prices['adults_regular'],
    'adults_sale' => $prices['adults_sale'],
    'kids_regular' => $prices['kids_regular'],
    'kids_sale' => $prices['kids_sale'],
    'children_regular' => $prices['children_regular'],
    'children_sale' => $prices['children_sale'],
]);

// Get the lowest regular price, excluding zero or empty values
$regular_prices = array_filter([
    $prices['adults_regular'],
    $prices['kids_regular'],
    $prices['children_regular'],
]);

// Get the lowest sale price, excluding zero or empty values
$sale_prices = array_filter([
    $prices['adults_sale'],
    $prices['kids_sale'],
    $prices['children_sale'],
]);

// If there are regular prices, find the lowest regular price; otherwise, set to a default (0 or some fallback)
$lowest_regular_price = !empty($regular_prices) ? min($regular_prices) : 0;

// If there are sale prices, find the lowest sale price; otherwise, set to a default (0 or some fallback)
$lowest_sale_price = !empty($sale_prices) ? min($sale_prices) : 0;

// Decide which price to display: sale price (if set), otherwise regular price
if ($lowest_sale_price > 0) {
    $display_price = $lowest_sale_price;
} else {
    $display_price = $lowest_regular_price;
}

?>

<p>
    <?php echo esc_html('From', 'ordainit-toolkit'); ?> <br>
    <?php if ($lowest_sale_price > 0) : ?>
        <!-- Display regular price with strike-through and sale price -->
        <span class="regular-price" style="text-decoration: line-through;">$<?php echo number_format($lowest_regular_price, 2); ?></span>
        <span class="sale-price" style="color: red;">$<?php echo number_format($lowest_sale_price, 2); ?></span>
    <?php else : ?>
        <!-- Display only regular price -->
        <span>$<?php echo number_format($display_price, 2); ?></span>
    <?php endif; ?>
</p>