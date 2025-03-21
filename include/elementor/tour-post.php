<?php



use Elementor\Widget_Base;

use Elementor\Controls_Manager;

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
        // layout Panel
        $this->start_controls_section(
            'od_layout',
            [
                'label' => esc_html__('Design Layout', 'ordainit-toolkit'),
            ]
        );
        $this->add_control(
            'od_design_style',
            [
                'label' => esc_html__('Select Layout', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'ordainit-toolkit'),
                    'layout-2' => esc_html__('Layout 2', 'ordainit-toolkit'),
                    'layout-3' => esc_html__('Layout 3', 'ordainit-toolkit'),
                    'layout-4' => esc_html__('Layout 4', 'ordainit-toolkit'),
                    'layout-5' => esc_html__('Layout 5', 'ordainit-toolkit'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'od_tour_post_title_content',
            [
                'label' => __('Title & Content', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-5'],
                ],
            ]
        );

        $this->add_control(
            'od_tour_post_title_content_title',
            [
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Amazing tour Places around the world', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_tour_post_title_content_subtitle',
            [
                'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Featured Tours', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_tour_post_title_content_shap',
            [
                'label' => esc_html__('Shap', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'od_tour_post_query',
            [
                'label' => __('Tour Post Query', 'ordainit-toolkit'),
            ]
        );


        $post_type = 'tour-package';

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'ordainit-toolkit'),
                'description' => esc_html__('Leave blank or enter -1 for all.', 'tvcore'),
                'type' => Controls_Manager::NUMBER,
                'default' => '3',
            ]
        );

        $this->add_control(
            'tour_post_order',
            [
                'label' => esc_html__('Orderby', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'asc',
                'options' => [
                    'asc' => esc_html__('ASC', 'ordainit-toolkit'),
                    'desc' => esc_html__('DESC', 'ordainit-toolkit'),
                ],
            ]
        );



        $this->add_control(
            'tour_package_type_select',
            [
                'label'    => __('Select Tour Package Types', 'text-domain'),
                'type'     => \Elementor\Controls_Manager::SELECT2,
                'options'  => od_get_tour_package_types(),
                'multiple' => true, // Enable multiple selection
                'default'  => [],
            ]
        );

        $this->add_control(
            'tour_package_destination_select',
            [
                'label'    => __('Select Tour Package Destinations', 'text-domain'),
                'type'     => \Elementor\Controls_Manager::SELECT2,
                'options'  => od_get_tour_package_destinations(), // Function to get destinations
                'multiple' => true, // Enable multiple selection
                'default'  => [],
            ]
        );







        $this->end_controls_section();

        $this->start_controls_section(
            'od_tour_post_button',
            [
                'label' => __('Button', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3'],
                ],
            ]
        );



        $this->add_control(
            'od_tour_post_button_text',
            [
                'label' => esc_html__('Button Text', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore More', 'ordainit-toolkit'),
                'label_block' => true,
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


        $posts_per_page = $settings['posts_per_page'];
        $tour_post_order = $settings['tour_post_order'];
        $tour_package_type_select = $settings['tour_package_type_select'];
        $tour_package_destination_select = $settings['tour_package_destination_select'];
        $od_tour_post_button_text = $settings['od_tour_post_button_text'];

        $args = [
            'post_type'      => 'tour-package',
            'post_status'    => 'publish',
            'posts_per_page' => $posts_per_page,
            'order'          => $tour_post_order,
        ];


        // Initialize tax query array
        $tax_query = [];

        // If Tour Package Type is selected, filter by selected types
        if (!empty($tour_package_type_select)) {
            $tax_query[] = [
                'taxonomy' => 'tour-package-type',
                'field'    => 'term_id',
                'terms'    => $tour_package_type_select, // Multiple selections are allowed
                'operator' => 'IN', // Show posts in any of the selected types
            ];
        }

        // If Tour Package Destination is selected, filter by selected destinations
        if (!empty($tour_package_destination_select)) {
            $tax_query[] = [
                'taxonomy' => 'tour-package-destination',
                'field'    => 'term_id',
                'terms'    => $tour_package_destination_select, // Multiple selections are allowed
                'operator' => 'IN', // Show posts in any of the selected destinations
            ];
        }

        // Add tax query only if there are filters applied
        if (!empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }


        // The Query
        $query = new \WP_Query($args);
?>


        <?php if ($settings['od_design_style']  == 'layout-2'): ?>
            <div class="it-featured-style-2">

                <div class="it-featured-item-wrap mb-30">
                    <div class="row">
                        <?php $i = -1;
                        if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) :
                                $query->the_post();
                                $i++;


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
                                    data-wow-delay="<?php echo esc_attr(.3 + $i * .2); ?>s">
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

                        <?php $i = -1;
                        if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) :
                                $query->the_post();
                                $i++;


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
                                    data-wow-delay="<?php echo esc_attr(.3 + $i * .2); ?>s">
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
                    <?php
                    $i = -1;
                    if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) :
                            $query->the_post();
                            $i++;


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
                                data-wow-delay="<?php echo esc_attr(.3 + $i * .2); ?>s">
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
