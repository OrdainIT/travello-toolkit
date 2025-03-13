<?php

namespace ordainit_toolkit\Widgets;

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
class Od_slider extends Widget_Base
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
        return 'slider';
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
        return __('Slider', 'ordainit-toolkit');
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
            'od_slider_content',
            [
                'label' => __('Slider', 'ordainit-toolkit'),
            ]
        );


        $this->add_control(
            'od_slider_content_lists',
            [
                'label' => esc_html__('Slider List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_slider_content_list_title',
                        'label' => esc_html__('Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Lets Explore the world', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_slider_content_list_subtitle',
                        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Memories For Life', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_slider_content_list_image',
                        'label' => esc_html__('Slider Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-1/slider/slider-1-2.jpg',
                        ],
                    ]
                ],
                'default' => [
                    [
                        'od_slider_content_list_title' => esc_html__('Lets Explore the world', 'ordainit-toolkit'),
                    ],
                    [
                        'od_slider_content_list_title' => esc_html__('Lets Explore the world', 'ordainit-toolkit'),
                    ],
                    [
                        'od_slider_content_list_title' => esc_html__('Lets Explore the world', 'ordainit-toolkit'),
                    ],
                ],
                'title_field' => '{{{ od_slider_content_list_title }}}',
            ]
        );

        $this->end_controls_section();



        // Style Starts
        $this->start_controls_section(
            'od_slider_content_style',
            [
                'label' => __('Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_slider_content_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slider-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_slider_content_title_typography',
                'selector' => '{{WRAPPER}} .it-slider-title',
            ]
        );

        $this->add_control(
            'od_slider_content_subtitle_color',
            [
                'label' => esc_html__('Sub Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Sub Title Typography', 'ordainit-toolkit'),
                'name' => 'od_slider_content_subtitle_typography',
                'selector' => '{{WRAPPER}} .it-section-subtitle',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'od_slider_content_form_style',
            [
                'label' => __('Content Form Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_slider_content_form_bg_color',
            [
                'label' => esc_html__('Form BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-tour-package-box' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_slider_content_form_package_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-tour-package-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-tour-package-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_slider_content_form_package_title_typography',
                'selector' => '{{WRAPPER}} .it-tour-package-title',
            ]
        );

        $this->add_control(
            'od_slider_content_form_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-tour-package-text input::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Placeholder Typography', 'ordainit-toolkit'),
                'name' => 'od_slider_content_form_placeholder_typography',
                'selector' => '{{WRAPPER}} .it-tour-package-text input',
            ]
        );

        $this->add_control(
            'od_slider_content_form_btn_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slider-tour-style .it-tour-package-search button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_slider_content_form_btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slider-tour-style .it-tour-package-search button' => 'background-color: {{VALUE}}',
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
        $od_slider_content_lists = $settings['od_slider_content_lists'];


?>


        <!-- start slider area  -->
        <div class="it-slider-area fix">
            <div class="it-slider-wrapper p-relative">
                <div class="swiper-container it-slider-active">
                    <div class="swiper-wrapper">
                        <?php foreach ($od_slider_content_lists as $single_slider_item):
                            $slider_img_url = $single_slider_item['od_slider_content_list_image'];

                        ?>
                            <div class="swiper-slide">
                                <div class="it-slider-item it-slider-overlay it-slider-height p-relative d-flex align-items-center">
                                    <div class="it-slider-bg" style="background-image: url(<?php echo esc_url($slider_img_url['url'], 'ordainit-toolkit'); ?>);"></div>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="it-slider-title-box text-center mb-85 z-index">
                                                    <span class="it-section-subtitle"><?php echo od_kses($single_slider_item['od_slider_content_list_subtitle'], 'ordainit-toolkit'); ?></span>
                                                    <h3 class="it-slider-title"><?php echo od_kses($single_slider_item['od_slider_content_list_title'], 'ordainit-toolkit'); ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="it-tour-package-main">
                    <div class="container">
                        <form method="get" action="<?php echo esc_url(home_url('/tour/')); ?>">
                            <div class="it-tour-package-wrap it-slider-tour-style it-tour-package-box z-index">
                                <div class="it-tour-package-location__wrapper">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-6">
                                            <div class="it-tour-package-item d-flex">
                                                <div class="it-tour-package-icon">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </div>
                                                <div class="it-tour-package-text">
                                                    <h3 class="it-tour-package-title">Location</h3>
                                                    <select name="tour_package_location" id="tour_package_location">
                                                        <option value=""><?php esc_html_e('Where Are You Going?', 'your-text-domain'); ?></option>
                                                        <?php
                                                        // Get terms from the 'tour-package-destination' taxonomy
                                                        $terms = get_terms(array(
                                                            'taxonomy' => 'tour-package-destination',
                                                            'hide_empty' => false,
                                                        ));

                                                        // Loop through and display the terms in the select dropdown
                                                        if (!empty($terms) && !is_wp_error($terms)) {
                                                            foreach ($terms as $term) {
                                                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-4 col-md-6">
                                            <div class="it-tour-package-item d-flex">
                                                <div class="it-tour-package-icon">
                                                    <i class="fa-light fa-calendar"></i>
                                                </div>
                                                <div class="it-tour-package-text">
                                                    <h3 class="it-tour-package-title">Check In</h3>
                                                    <div class="it-clander-input">
                                                        <input class="form-control" id="selectingCheckInDate" type="date" name="check_in" placeholder="Check In">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6">
                                            <div class="it-tour-package-item d-flex">
                                                <div class="it-tour-package-icon">
                                                    <i class="fa-light fa-calendar"></i>
                                                </div>
                                                <div class="it-tour-package-text">
                                                    <h3 class="it-tour-package-title">Check Out</h3>
                                                    <div class="it-clander-input">
                                                        <input class="form-control" id="selectingCheckOutDate" type="date" name="check_out" placeholder="Check Out">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6">
                                            <div class="it-tour-package-item d-flex">
                                                <div class="it-tour-package-icon">
                                                    <i class="fa-regular fa-user"></i>
                                                </div>
                                                <div class="it-tour-package-text">
                                                    <h3 class="it-tour-package-title">Guest</h3>
                                                    <input type="text" name="guest" placeholder="Total Guest">
                                                </div>
                                                <div class="it-tour-package-search">
                                                    <button type="submit">
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>





                    </div>
                </div>
            </div>
        </div>
        <!-- end slider area  -->





        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_slider());
