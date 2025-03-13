<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Od_Product extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'od-product';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Od Product', 'ordainit-toolkit');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'od-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['ordainit-toolkit'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['ordainit-toolkit'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'od_product_layout_setion',
            [
                'label' => __('Design Style', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_design_style',
            [
                'label' => __('Product Layout', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'layout-1',
                'options' => [
                    'layout-1' => __('Layout 1', 'ordainit-toolkit'),
                    'layout-2' => __('Layout 2', 'ordainit-toolkit'),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'od_product_section',
            [
                'label' => __('Product Query', 'ordainit-toolkit'),
            ]
        );

        // Product Category
        $this->add_control(
            'od_product_category',
            [
                'label' => __('Product Category', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => od_get_categories('product_cat'),
            ]
        );

        // Product Limit

        $this->add_control(
            'od_product_limit',
            [
                'label' => __('Product Limit', 'ordainit-toolkit'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );









        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => __('Text Transform', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __('None', 'ordainit-toolkit'),
                    'uppercase' => __('UPPERCASE', 'ordainit-toolkit'),
                    'lowercase' => __('lowercase', 'ordainit-toolkit'),
                    'capitalize' => __('Capitalize', 'ordainit-toolkit'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget ouodut on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $od_product_category = $settings['od_product_category'];
        $od_product_limit = $settings['od_product_limit'];

        // Set the number of products to show
        $od_product_limit = !empty($od_product_limit) ? intval($od_product_limit) : 10;

        // Check if category is passed and make sure it's an array
        $od_product_category = !empty($od_product_category) ? (array) $od_product_category : [];



        // Initialize tax query array
        $tax_query = [];

        // Convert slugs to term IDs (if necessary)
        if (!empty($od_product_category)) {
            // Convert each slug to term_id
            $term_ids = [];
            foreach ($od_product_category as $slug) {
                $term = get_term_by('slug', $slug, 'product_cat');
                if ($term && !is_wp_error($term)) {
                    $term_ids[] = $term->term_id;
                }
            }

            if (!empty($term_ids)) {
                $tax_query[] = [
                    'taxonomy' => 'product_cat', // WooCommerce category taxonomy
                    'field'    => 'term_id',
                    'terms'    => $term_ids, // Use term IDs
                    'operator' => 'IN', // Match any selected category
                ];
            }
        }

        // Prepare WP_Query arguments
        $args = [
            'post_type'      => 'product',
            'posts_per_page' => $od_product_limit,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        // Add tax query if categories are selected
        if (!empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }


        // Run the query
        $query = new \WP_Query($args);
?>

        <!-- write post query -->

        <?php
        while ($query->have_posts()) {
            $query->the_post();
            global $product;
            $product = wc_get_product(get_the_ID()); // Ensure $product is set

            if ($product) {
                set_query_var('product_id', $product->get_id()); // Pass product ID to template
                get_template_part('woocommerce/components/modal-product');
            }
        }
        ?>

        <?php if ($settings['od_design_style']  == 'layout-2'): ?>
            <div class="it-shop-style-2">
                <div class="swiper-container it-shop-2-active">
                    <div class="swiper-wrapper">
                        <?php


                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                global $product; // Get the WooCommerce product object

                                // get product id
                                $product_id = $product->get_id();

                                // Get the meta value for the current product
                                $travello_product_product_options = get_post_meta(get_the_ID(), 'travello_product_product_options', true);

                                // Check if the meta value is an array
                                if (is_array($travello_product_product_options)) {
                                    // Retrieve specific meta values
                                    $product_badge_label_switcher = $travello_product_product_options['product_badge_label_switcher'];

                                    $product_badge_label_text = $travello_product_product_options['product_badge_label_text'];
                                }
                        ?>
                                <div class="swiper-slide">
                                    <div class="it-shop-item p-relative">
                                        <div class="it-shop-thumb p-relative">
                                            <a href="<?php the_permalink(); ?>"> <!-- Dynamic link to product details -->
                                                <?php
                                                // Display the product image
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail('woocommerce_thumbnail');
                                                } else {
                                                    echo '<img src="' . wc_placeholder_img_src() . '" alt="' . get_the_title() . '">';
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <?php if (!empty($product_badge_label_switcher)): ?>
                                            <div class="it-shop-categories">
                                                <span><?php echo esc_html($product_badge_label_text, 'travello'); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="it-shop-action-box">
                                            <button type="button" class="it-shop-action-btn it-product-action-btn-2 it-product-add-to-wishlist-btn it-shop-add-to-wishlist-btn" data-product-id="<?php echo esc_attr($product_id, 'travello'); ?>">
                                                <i class="flaticon-reload"></i>
                                            </button>

                                            <button type="button" class="it-shop-action-btn it-product-action-btn-2 it-product-add-to-compare-btn it-shop-add-to-compare-btn" data-product-id="<?php echo esc_attr($product_id, 'travello'); ?>">
                                                <i class="flaticon-like"></i>
                                            </button>
                                            <button type="button" class="it-shop-action-btn it-product-action-btn-2 it-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal<?php echo esc_attr($product_id, 'travello'); ?>">

                                                <i class="flaticon-eye"></i>
                                            </button>
                                        </div>
                                        <div class="it-shop-content text-center">
                                            <h3 class="it-shop-title mb-15">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <div class="it-shop-price-box mb-25 d-flex align-items-center justify-content-between">
                                                <div class="it-shop-price">
                                                    <p>
                                                        <?php echo $product->get_price_html(); // Display product price 
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="it-shop-rating mb-5">
                                                    <span>
                                                        <i class="flaticon-star"></i>
                                                        <?php
                                                        $rating_count = $product->get_rating_count(); // Get the rating count
                                                        echo $rating_count; // Display the rating count
                                                        ?>
                                                        <?php
                                                        // Check if the rating count is greater than 1, and display "reviews" or "review"
                                                        if ($rating_count > 1) {
                                                            echo ' Reviews';
                                                        } else {
                                                            echo ' Review';
                                                        }
                                                        ?>
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="it-shop-button">
                                                <a href="<?php the_permalink(); ?>">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php else: ?>



            <div class="swiper-container it-shop-active">
                <div class="swiper-wrapper">
                    <?php


                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            global $product; // Get the WooCommerce product object

                            // get product id
                            $product_id = $product->get_id();
                    ?>
                            <div class="swiper-slide" id="product-<?php echo esc_attr($product_id, 'ordainint-toolkit'); ?>">
                                <div class="it-shop-item p-relative">
                                    <div class="it-shop-thumb p-relative">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                        <div class="it-shop-cart">
                                            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>">
                                                <?php echo esc_html($product->add_to_cart_text()); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="it-shop-categories">
                                        <?php

                                        $regular_price = floatval($product->get_regular_price());
                                        $sale_price    = floatval($product->get_sale_price());

                                        if ($sale_price && $regular_price > $sale_price) {
                                            $discount_percentage = round((($regular_price - $sale_price) / $regular_price) * 100);
                                            echo '<span class="sale-badge">-' . esc_html($discount_percentage) . '%</span>';
                                        }
                                        ?>
                                    </div>

                                    <div class="it-shop-action-box">
                                        <button type="button" class="it-shop-action-btn it-product-action-btn-2 it-product-add-to-wishlist-btn it-shop-add-to-wishlist-btn" data-product-id="<?php echo esc_attr($product_id, 'travello'); ?>">
                                            <i class="flaticon-reload"></i>
                                        </button>

                                        <button type="button" class="it-shop-action-btn it-product-action-btn-2 it-product-add-to-compare-btn it-shop-add-to-compare-btn" data-product-id="<?php echo esc_attr($product_id, 'travello'); ?>">
                                            <i class="flaticon-like"></i>
                                        </button>
                                        <button type="button" class="it-shop-action-btn it-product-action-btn-2 it-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal<?php echo esc_attr($product_id, 'travello'); ?>">

                                            <i class="flaticon-eye"></i>
                                        </button>
                                    </div>
                                    <div class="it-shop-content text-center">
                                        <h3 class="it-shop-title mb-15">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <?php
                                        $average = $product->get_average_rating();
                                        $review_count = $product->get_review_count();

                                        if ($review_count > 0) : // Show only if there are reviews
                                        ?>
                                            <div class="it-shop-rating mb-5">
                                                <?php
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= floor($average)) {
                                                        echo '<span><i class="flaticon-star"></i></span>'; // Filled star
                                                    } else {
                                                        echo '<span><i class="flaticon-star empty"></i></span>'; // Empty star
                                                    }
                                                }
                                                ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="it-shop-price">
                                            <p><?php echo $product->get_price_html(); ?></p>
                                        </div>
                                    </div>
                                </div>


                            </div>


                    <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>


                </div>
            </div>

        <?php endif; ?>






        <script>
            jQuery(document).ready(function($) {

                ////////////////////////////////////////////////////
                // 24. Swiper Js
                const shopSwiper = new Swiper(".it-shop-active", {
                    speed: 1000,
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: false,
                    breakpoints: {
                        1400: {
                            slidesPerView: 3,
                        },
                        1200: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        0: {
                            slidesPerView: 1,
                        },
                    },
                });

                ////////////////////////////////////////////////////
                // 25. Swiper Js
                const shop2Swiper = new Swiper(".it-shop-2-active", {
                    speed: 1000,
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: true,
                    breakpoints: {
                        1400: {
                            slidesPerView: 3,
                        },
                        1200: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 2,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        0: {
                            slidesPerView: 1,
                        },
                    },
                });

            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Product());
