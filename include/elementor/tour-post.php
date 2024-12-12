<?php



use Elementor\Widget_Base;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Od_Tour_Post extends Widget_Base
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
        return 'od-tour-post';
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
        return __('Tour Post', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/tour-post.php');
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
        $posts_per_page = $settings['posts_per_page'];
        $tour_post_order = $settings['tour_post_order'];
        $od_tour_post_button_text = $settings['od_tour_post_button_text'];



        $args = array(
            'post_type' => 'tour-package',
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'order' => $tour_post_order,
        );

        // The Query
        $query = new \WP_Query($args);
?>


        <?php if ($settings['od_design_style']  == 'layout-2'): ?>
            <div class="it-featured-style-2">

                <div class="it-featured-item-wrap mb-30">
                    <div class="row">
                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) :
                                $query->the_post();


                                $post_id = get_the_ID(); // Dynamically get the post ID

                                $meta_data = get_post_meta($post_id);



                                $travello_package_info = get_post_meta($post_id, 'travello_travello_package_info_options', true);
                                $travello_feature_package_options = get_post_meta($post_id, 'travello_feature_package_options', true);
                                $travello_location_options = get_post_meta($post_id, 'travello_location_options', true);

                                $travello_price_percentage = $travello_package_info['travello_price_percentage'];
                                $travello_price_type = $travello_package_info['travello_price_type'];
                                $travello_price_deltype = $travello_package_info['travello_price_deltype'];
                                $travello_duration = $travello_package_info['travello_duration'];
                                $travello_booking_count = $travello_package_info['travello_booking_count'];
                                $feature_package_switcher = $travello_feature_package_options['feature_package_switcher'];
                                $travello_map = $travello_location_options['travello_map'];
                                $travello_map_url = $travello_location_options['travello_map2'];



                            ?>
                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 wow itfadeUp" data-wow-duration=".9s"
                                    data-wow-delay=".3s">
                                    <div class="it-featured-item p-relative">
                                        <div class="it-featured-thumb p-relative">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        </div>
                                        <div class="it-featured-top d-flex align-items-center">
                                            <?php if (!empty($travello_price_percentage)): ?>
                                                <div class="it-featured-offer">
                                                    <span><?php echo esc_html($travello_price_percentage, 'travello'); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($feature_package_switcher)): ?>
                                                <div class="it-featured-categories">
                                                    <span><?php echo esc_html__('featured', 'travello'); ?></span>
                                                </div>

                                            <?php endif; ?>
                                        </div>
                                        <div class="it-featured-content">

                                            <h3 class="it-featured-title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    $title = get_the_title(); // Get the full title
                                                    $word_limit = 3; // Set the word limit
                                                    $title_words = wp_trim_words($title, $word_limit, '...'); // Limit the words
                                                    echo esc_html($title_words);
                                                    ?>

                                                </a>
                                            </h3>
                                            <div class="it-featured-mid-box mb-30">
                                                <div class="it-featured-review-box">
                                                    <div class="it-featured-review d-flex align-items-center">
                                                        <i class="fa-solid fa-star"></i>
                                                        <p>
                                                            <span><?php echo Travello_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()); ?> </span>(<?php echo Travello_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()) == 1 ? esc_html__('Review', 'travello') : esc_html__('Reviews', 'travello') ?>)
                                                        </p>
                                                    </div>
                                                    <div class="it-featured-meta mb-15">
                                                        <a href="<?php echo esc_url($travello_map_url, 'travello'); ?>">
                                                            <i class="fa-solid fa-location-dot"></i> <?php echo esc_html($travello_map['address']); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="it-featured-price-box d-flex align-items-center justify-content-between">
                                                    <div class="it-featured-meta d-flex align-items-center">
                                                        <?php if (!empty($travello_duration)): ?>
                                                            <div class="it-featured-time">
                                                                <span><i class="fa-regular fa-clock"></i> <?php echo esc_html($travello_duration, 'travello'); ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (!empty($travello_booking_count)): ?>
                                                            <div class="it-featured-user">
                                                                <span><i class="fa-regular fa-user"></i> <?php echo esc_html($travello_booking_count, 'travello'); ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="it-featured-price d-flex align-items-center">
                                                        <i class="fa-regular fa-circle-dollar"></i>
                                                        <p>
                                                            <?php if (!empty($travello_price_type)): ?>
                                                                <?php echo esc_html__('From', 'travello'); ?> <span>$
                                                                    <?php
                                                                    if (isset($travello_price_type)) {
                                                                        echo esc_html($travello_price_type, 'travello');
                                                                    }
                                                                    ?>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if (!empty($travello_price_deltype)): ?>
                                                                <del>$
                                                                    <?php
                                                                    if (isset($travello_price_deltype)) {
                                                                        echo esc_html($travello_price_deltype, 'travello');
                                                                    }
                                                                    ?>
                                                                </del>
                                                            <?php endif; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="it-featured-bottom">
                                                <div class="it-featured-action text-center">
                                                    <a href="<?php the_permalink(); ?>" class="it-btn-blog featured-btn-black w-100"><?php echo esc_html($od_tour_post_button_text, 'travello'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php endwhile;
                            wp_reset_query(); ?>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>
            <div class="it-featured-style-2 it-featured-style-3">
                <div class="it-featured-item-wrap it-featured-style-3-space mb-30">
                    <div class="row">

                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) :
                                $query->the_post();


                                $post_id = get_the_ID(); // Dynamically get the post ID

                                $meta_data = get_post_meta($post_id);



                                $travello_package_info = get_post_meta($post_id, 'travello_travello_package_info_options', true);
                                $travello_feature_package_options = get_post_meta($post_id, 'travello_feature_package_options', true);
                                $travello_location_options = get_post_meta($post_id, 'travello_location_options', true);

                                $travello_price_percentage = $travello_package_info['travello_price_percentage'];
                                $travello_price_type = $travello_package_info['travello_price_type'];
                                $travello_price_deltype = $travello_package_info['travello_price_deltype'];
                                $travello_duration = $travello_package_info['travello_duration'];
                                $travello_booking_count = $travello_package_info['travello_booking_count'];
                                $feature_package_switcher = $travello_feature_package_options['feature_package_switcher'];
                                $travello_map = $travello_location_options['travello_map'];
                                $travello_map_url = $travello_location_options['travello_map2'];



                            ?>
                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 wow itfadeUp" data-wow-duration=".9s"
                                    data-wow-delay=".3s">
                                    <div class="it-featured-item p-relative">
                                        <div class="it-featured-thumb p-relative">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        </div>
                                        <div class="it-featured-top d-flex align-items-center">
                                            <?php if (!empty($travello_price_percentage)): ?>
                                                <div class="it-featured-offer">
                                                    <span><?php echo esc_html($travello_price_percentage, 'travello'); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($feature_package_switcher)): ?>
                                                <div class="it-featured-categories">
                                                    <span><?php echo esc_html__('featured', 'travello'); ?></span>
                                                </div>

                                            <?php endif; ?>
                                        </div>
                                        <div class="it-featured-content">

                                            <h3 class="it-featured-title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    $title = get_the_title(); // Get the full title
                                                    $word_limit = 3; // Set the word limit
                                                    $title_words = wp_trim_words($title, $word_limit, '...'); // Limit the words
                                                    echo esc_html($title_words);
                                                    ?>

                                                </a>
                                            </h3>
                                            <div class="it-featured-mid-box mb-30">
                                                <div class="it-featured-review-box">
                                                    <div class="it-featured-review d-flex align-items-center">
                                                        <i class="fa-solid fa-star"></i>
                                                        <p>
                                                            <span><?php echo Travello_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()); ?> </span>(<?php echo Travello_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()) == 1 ? esc_html__('Review', 'travello') : esc_html__('Reviews', 'travello') ?>)
                                                        </p>
                                                    </div>
                                                    <div class="it-featured-meta mb-15">
                                                        <a href="<?php echo esc_url($travello_map_url, 'travello'); ?>">
                                                            <i class="fa-solid fa-location-dot"></i> <?php echo esc_html($travello_map['address']); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="it-featured-price-box d-flex align-items-center justify-content-between">
                                                    <div class="it-featured-meta d-flex align-items-center">
                                                        <?php if (!empty($travello_duration)): ?>
                                                            <div class="it-featured-time">
                                                                <span><i class="fa-regular fa-clock"></i> <?php echo esc_html($travello_duration, 'travello'); ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (!empty($travello_booking_count)): ?>
                                                            <div class="it-featured-user">
                                                                <span><i class="fa-regular fa-user"></i> <?php echo esc_html($travello_booking_count, 'travello'); ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="it-featured-price d-flex align-items-center">
                                                        <i class="fa-regular fa-circle-dollar"></i>
                                                        <p>
                                                            <?php if (!empty($travello_price_type)): ?>
                                                                <?php echo esc_html__('From', 'travello'); ?> <span>$
                                                                    <?php
                                                                    if (isset($travello_price_type)) {
                                                                        echo esc_html($travello_price_type, 'travello');
                                                                    }
                                                                    ?>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if (!empty($travello_price_deltype)): ?>
                                                                <del>$
                                                                    <?php
                                                                    if (isset($travello_price_deltype)) {
                                                                        echo esc_html($travello_price_deltype, 'travello');
                                                                    }
                                                                    ?>
                                                                </del>
                                                            <?php endif; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="it-featured-bottom">
                                                <div class="it-featured-action text-center">
                                                    <a href="<?php the_permalink(); ?>" class="it-btn-blog featured-btn-black w-100"><?php echo esc_html($od_tour_post_button_text, 'travello'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php endwhile;
                            wp_reset_query(); ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-4'): ?>
            <div class="it-featured-4">
                <div class="it-featured-item-wrap">
                    <div class="row">
                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) :
                                $query->the_post();


                                $post_id = get_the_ID(); // Dynamically get the post ID




                                $travello_package_info = get_post_meta($post_id, 'travello_travello_package_info_options', true);
                                $travello_feature_package_options = get_post_meta($post_id, 'travello_feature_package_options', true);
                                $travello_location_options = get_post_meta($post_id, 'travello_location_options', true);

                                $travello_price_percentage = $travello_package_info['travello_price_percentage'];
                                $travello_price_type = $travello_package_info['travello_price_type'];
                                $travello_price_deltype = $travello_package_info['travello_price_deltype'];
                                $travello_duration = $travello_package_info['travello_duration'];
                                $travello_booking_count = $travello_package_info['travello_booking_count'];
                                $feature_package_switcher = $travello_feature_package_options['feature_package_switcher'];
                                $travello_map = $travello_location_options['travello_map'];
                                $travello_map_url = $travello_location_options['travello_map2'];



                            ?>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="it-featured-item p-relative">
                                        <div class="it-featured-4-thumb p-relative">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                            <div class="it-featured-content">
                                                <div class="it-featured-meta mb-5">
                                                    <a href="<?php echo esc_url($travello_map_url, 'travello'); ?>">
                                                        <i class="fa-solid fa-location-dot"></i><?php echo esc_html($travello_map['address']); ?>
                                                    </a>
                                                </div>
                                                <h3 class="it-featured-title">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                        $title = get_the_title(); // Get the full title
                                                        $word_limit = 3; // Set the word limit
                                                        $title_words = wp_trim_words($title, $word_limit, '...'); // Limit the words
                                                        echo esc_html($title_words);
                                                        ?>

                                                    </a>
                                                </h3>
                                                <div class="it-featured-review-box pb-25 mb-25 d-flex align-items-center justify-content-between">
                                                    <div class="it-featured-price d-flex align-items-center">
                                                        <i class="fa-regular fa-circle-dollar"></i>
                                                        <p>
                                                            <?php if (!empty($travello_price_type)): ?>
                                                                <?php echo esc_html__('From', 'travello'); ?> <span>$
                                                                    <?php
                                                                    if (isset($travello_price_type)) {
                                                                        echo esc_html($travello_price_type, 'travello');
                                                                    }
                                                                    ?>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if (!empty($travello_price_deltype)): ?>
                                                                <del>$
                                                                    <?php
                                                                    if (isset($travello_price_deltype)) {
                                                                        echo esc_html($travello_price_deltype, 'travello');
                                                                    }
                                                                    ?>
                                                                </del>
                                                            <?php endif; ?>
                                                        </p>
                                                    </div>
                                                    <div class="it-featured-review d-flex align-items-center">
                                                        <i class="fa-solid fa-star"></i>
                                                        <p>
                                                            <span><?php echo Travello_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()); ?> </span>(<?php echo Travello_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()) == 1 ? esc_html__('Review', 'travello') : esc_html__('Reviews', 'travello') ?>)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="it-featured-top z-index d-flex align-items-center">
                                            <?php if (!empty($travello_price_percentage)): ?>
                                                <div class="it-featured-offer">
                                                    <span><?php echo esc_html($travello_price_percentage, 'travello'); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($feature_package_switcher)): ?>
                                                <div class="it-featured-categories">
                                                    <span><?php echo esc_html__('featured', 'travello'); ?></span>
                                                </div>

                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>


                            <?php endwhile;
                            wp_reset_query(); ?>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        <?php elseif ($settings['od_design_style']  == 'layout-5'):

            $od_tour_post_title_content_title = $settings['od_tour_post_title_content_title'];
            $od_tour_post_title_content_subtitle = $settings['od_tour_post_title_content_subtitle'];
            $od_tour_post_title_content_shap = $settings['od_tour_post_title_content_shap'];
        ?>

            <!-- start featured area  -->
            <div class="it-featured-area inner-feat-style it-featured-4 pt-120 pb-120 p-relative">
                <div class="container">
                    <div class="it-featured-title-wrap p-relative">
                        <div class="it-featured-shape d-none d-lg-block">
                            <span>
                                <img src="<?php echo esc_url($od_tour_post_title_content_shap['url'], 'travello'); ?>" alt="">
                            </span>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-xl-5 col-lg-6 col-md-6">
                                <div class="it-featured-title-box z-index mb-60">
                                    <span class="it-section-subtitle"><?php echo esc_html($od_tour_post_title_content_subtitle, 'travello'); ?></span>
                                    <h3 class="it-section-title"><?php echo od_kses($od_tour_post_title_content_title, 'travello'); ?></h3>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-6">
                                <div class="it-categories-arrow-box z-index text-md-end">
                                    <button class="it-cat-prev" tabindex="0">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </button>
                                    <button class="it-cat-next" tabindex="0">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="it-featured-item-wrap">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="swiper-container inner-feat-active">
                                    <div class="swiper-wrapper">
                                        <?php if ($query->have_posts()) : ?>
                                            <?php while ($query->have_posts()) :
                                                $query->the_post();


                                                $post_id = get_the_ID(); // Dynamically get the post ID

                                                $meta_data = get_post_meta($post_id);



                                                $travello_package_info = get_post_meta($post_id, 'travello_travello_package_info_options', true);
                                                $travello_feature_package_options = get_post_meta($post_id, 'travello_feature_package_options', true);
                                                $travello_location_options = get_post_meta($post_id, 'travello_location_options', true);

                                                $travello_price_percentage = $travello_package_info['travello_price_percentage'];
                                                $travello_price_type = $travello_package_info['travello_price_type'];
                                                $travello_price_deltype = $travello_package_info['travello_price_deltype'];
                                                $travello_duration = $travello_package_info['travello_duration'];
                                                $travello_booking_count = $travello_package_info['travello_booking_count'];
                                                $feature_package_switcher = $travello_feature_package_options['feature_package_switcher'];
                                                $travello_map = $travello_location_options['travello_map'];
                                                $travello_map_url = $travello_location_options['travello_map2'];



                                            ?>
                                                <div class="swiper-slide">
                                                    <div class="it-featured-item p-relative">
                                                        <div class="it-featured-4-thumb p-relative">
                                                            <?php if (has_post_thumbnail()) : ?>
                                                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                                            <?php endif; ?>

                                                            <div class="it-featured-content">
                                                                <div class="it-featured-meta mb-5">
                                                                    <a href="<?php echo esc_url($travello_map_url, 'travello'); ?>">
                                                                        <i class="fa-solid fa-location-dot"></i><?php echo esc_html($travello_map['address']); ?>
                                                                    </a>
                                                                </div>
                                                                <h3 class="it-featured-title">
                                                                    <a href="<?php the_permalink(); ?>">
                                                                        <?php
                                                                        $title = get_the_title(); // Get the full title
                                                                        $word_limit = 3; // Set the word limit
                                                                        $title_words = wp_trim_words($title, $word_limit, '...'); // Limit the words
                                                                        echo esc_html($title_words);
                                                                        ?>

                                                                    </a>
                                                                </h3>
                                                                <div class="it-featured-review-box pb-25 mb-25 d-flex align-items-center justify-content-between">
                                                                    <div class="it-featured-price d-flex align-items-center">
                                                                        <i class="fa-regular fa-circle-dollar"></i>
                                                                        <p>
                                                                            <?php if (!empty($travello_price_type)): ?>
                                                                                <?php echo esc_html__('From', 'travello'); ?> <span>$
                                                                                    <?php
                                                                                    if (isset($travello_price_type)) {
                                                                                        echo esc_html($travello_price_type, 'travello');
                                                                                    }
                                                                                    ?>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                            <?php if (!empty($travello_price_deltype)): ?>
                                                                                <del>$
                                                                                    <?php
                                                                                    if (isset($travello_price_deltype)) {
                                                                                        echo esc_html($travello_price_deltype, 'travello');
                                                                                    }
                                                                                    ?>
                                                                                </del>
                                                                            <?php endif; ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="it-featured-review d-flex align-items-center">
                                                                        <i class="fa-solid fa-star"></i>
                                                                        <p> <span><?php echo Travello_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()); ?> </span>(<?php echo Travello_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()) == 1 ? esc_html__('Review', 'travello') : esc_html__('Reviews', 'travello') ?>)</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="it-featured-top z-index d-flex align-items-center">
                                                            <?php if (!empty($travello_price_percentage)): ?>
                                                                <div class="it-featured-offer">
                                                                    <span><?php echo esc_html($travello_price_percentage, 'travello'); ?></span>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($feature_package_switcher)): ?>
                                                                <div class="it-featured-categories">
                                                                    <span><?php echo esc_html__('featured', 'travello'); ?></span>
                                                                </div>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endwhile;
                                            wp_reset_query(); ?>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end featured area  -->
        <?php else: ?>

            <div class="it-featured-item-wrap">
                <div class="row">
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) :
                            $query->the_post();


                            $post_id = get_the_ID(); // Dynamically get the post ID

                            $meta_data = get_post_meta($post_id);



                            $travello_package_info = get_post_meta($post_id, 'travello_travello_package_info_options', true);
                            $travello_feature_package_options = get_post_meta($post_id, 'travello_feature_package_options', true);
                            $travello_location_options = get_post_meta($post_id, 'travello_location_options', true);

                            $travello_price_percentage = $travello_package_info['travello_price_percentage'];
                            $travello_price_type = $travello_package_info['travello_price_type'];
                            $travello_price_deltype = $travello_package_info['travello_price_deltype'];
                            $travello_duration = $travello_package_info['travello_duration'];
                            $travello_booking_count = $travello_package_info['travello_booking_count'];
                            $feature_package_switcher = $travello_feature_package_options['feature_package_switcher'];
                            $travello_map = $travello_location_options['travello_map'];
                            $travello_map_url = $travello_location_options['travello_map2'];



                        ?>
                            <div class="col-xl-4 col-lg-6 col-md-6 wow itfadeUp" data-wow-duration=".9s"
                                data-wow-delay=".3s">
                                <div class="it-featured-item p-relative">
                                    <div class="it-featured-thumb p-relative">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                    </div>
                                    <div class="it-featured-top d-flex align-items-center">
                                        <?php if (!empty($travello_price_percentage)): ?>
                                            <div class="it-featured-offer">
                                                <span><?php echo esc_html($travello_price_percentage, 'travello'); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($feature_package_switcher)): ?>
                                            <div class="it-featured-categories">
                                                <span><?php echo esc_html__('featured', 'travello'); ?></span>
                                            </div>

                                        <?php endif; ?>

                                    </div>
                                    <div class="it-featured-content">

                                        <div class="it-featured-meta mb-5">
                                            <a href="<?php echo esc_url($travello_map_url, 'travello'); ?>">
                                                <i class="fa-solid fa-location-dot"></i><?php echo esc_html($travello_map['address']); ?>
                                            </a>
                                        </div>
                                        <h3 class="it-featured-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                $title = get_the_title(); // Get the full title
                                                $word_limit = 3; // Set the word limit
                                                $title_words = wp_trim_words($title, $word_limit, '...'); // Limit the words
                                                echo esc_html($title_words);
                                                ?>

                                            </a>
                                        </h3>
                                        <div
                                            class="it-featured-review-box pb-25 mb-25 d-flex align-items-center justify-content-between">
                                            <div class="it-featured-price d-flex align-items-center">
                                                <i class="fa-regular fa-circle-dollar"></i>
                                                <p>
                                                    <?php if (!empty($travello_price_type)): ?>
                                                        <?php echo esc_html__('From', 'travello'); ?> <span>$
                                                            <?php
                                                            if (isset($travello_price_type)) {
                                                                echo esc_html($travello_price_type, 'travello');
                                                            }
                                                            ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($travello_price_deltype)): ?>
                                                        <del>$
                                                            <?php
                                                            if (isset($travello_price_deltype)) {
                                                                echo esc_html($travello_price_deltype, 'travello');
                                                            }
                                                            ?>
                                                        </del>
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                            <div class="it-featured-review d-flex align-items-center">
                                                <i class="fa-solid fa-star"></i>
                                                <p>
                                                    <span><?php echo Travello_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()); ?> </span>(<?php echo Travello_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()) == 1 ? esc_html__('Review', 'travello') : esc_html__('Reviews', 'travello') ?>)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="it-featured-bottom d-flex align-items-center justify-content-between">
                                            <div class="it-featured-meta d-flex align-items-center">
                                                <?php if (!empty($travello_duration)): ?>
                                                    <div class="it-featured-time">
                                                        <span><i class="fa-regular fa-clock"></i> <?php echo esc_html($travello_duration, 'travello'); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($travello_booking_count)): ?>
                                                    <div class="it-featured-user">
                                                        <span><i class="fa-regular fa-user"></i> <?php echo esc_html($travello_booking_count, 'travello'); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="it-featured-action">
                                                <a href="<?php the_permalink(); ?>" class="it-btn-blog featured-btn"><?php echo esc_html($od_tour_post_button_text, 'travello'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile;
                        wp_reset_query(); ?>
                    <?php endif; ?>

                </div>
            </div>


        <?php endif; ?>







        <script>
            jQuery(document).ready(function($) {

                ////////////////////////////////////////////////////
                // 28. Swiper Js
                const innerFeatSwiper = new Swiper(".inner-feat-active", {
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
                    navigation: {
                        prevEl: ".it-cat-prev",
                        nextEl: ".it-cat-next",
                    },
                });




            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Tour_Post());
