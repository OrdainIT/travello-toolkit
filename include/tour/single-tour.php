<?php
get_header();

// Get the current tour post
$tour_id = get_the_ID();

// Fetch pricing information
$prices = get_post_meta($tour_id, '_tour_prices', true);
$adult_price = isset($prices['adults_regular']) ? $prices['adults_regular'] : 0;
$adult_sale_price = isset($prices['adults_sale']) ? $prices['adults_sale'] : 0;

// Get the linked WooCommerce product ID
$product_id = get_post_meta($tour_id, '_linked_product_id', true);

if ($product_id) {
    // Get the WooCommerce product object
    $product = wc_get_product($product_id);
    if ($product) {
?>


        <div class="tour-details">
            <h1><?php the_title(); ?></h1>
            <div class="tour-description">
                <?php the_content(); ?>
            </div>
            <div class="tour-price">
                <p>
                    <?php
                    // Display the price with sale if available
                    if ($adult_sale_price && $adult_sale_price < $adult_price) {
                        echo '<span class="price"><del>' . wc_price($adult_price) . '</del> ' . wc_price($adult_sale_price) . '</span>';
                    } else {
                        echo '<span class="price">' . wc_price($adult_price) . '</span>';
                    }
                    ?>
                </p>
            </div>
            <div class="buy-now">
                <a href="<?php echo esc_url(add_query_arg('add-to-cart', $product_id, wc_get_checkout_url())); ?>" class="button buy-now-button">Buy Now</a>
            </div>
        </div>



<?php
    }
}

get_footer();
