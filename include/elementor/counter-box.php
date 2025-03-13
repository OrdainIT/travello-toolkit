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
class OD_Counter_Box extends Widget_Base
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
        return 'od_counter-box';
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
        return __('Counter Box', 'ordainit-toolkit');
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Icon Type Section
        $this->start_controls_section(
            'od_counter_box_icon_type',
            [
                'label' => __('Icon Types', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_counter_box_icon_class',
            [
                'label' => __('Select Icon', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'flaticon-journey' => __('Journey', 'ordainit-toolkit'),
                    'flaticon-camping' => __('Camping', 'ordainit-toolkit'),
                    'flaticon-travel' => __('Travel', 'ordainit-toolkit'),
                    'flaticon-luggage' => __('Luggage', 'ordainit-toolkit'),
                ],
                'default' => 'flaticon-journey',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Counter Section
        $this->start_controls_section(
            'od_counter_box_content',
            [
                'label' => __('Counter Content', 'ordainit-toolkit'),
            ]
        );

        // Value
        $this->add_control(
            'od_counter_box_end_value',
            [
                'label' => esc_html__('Counter End Value', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 835,
            ]
        );
        // SubText
        $this->add_control(
            'od_counter_box_subtext',
            [
                'label' => esc_html__('Counter Sub Text', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+',
            ]
        );
        //Title
        $this->add_control(
            'od_counter_box_title',
            [
                'label' => esc_html__('Counter Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Total Donations',
            ]
        );

        $this->end_controls_section();

        // Icon Switcher
        $this->start_controls_section(
            'od_counter_box_icon',
            [
                'label' => esc_html__('Icon Switcher', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_counter_box_icon_switcher',
            [
                'label' => esc_html__('Icon Show / Hide', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();


        // Style Section

        $this->start_controls_section(
            'od_counter_box_style',
            [
                'label' => __('Counter Box Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]

        );

        // Counter Box background
        $this->add_control(
            'od_counter_box_bg_color',
            [
                'label' => esc_html__('Counter Box BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-funfact-2 .it-funfact-item' => 'background-color: {{VALUE}}',

                ],
            ]
        );

        $this->add_control(
            'od_counter_box_border_color',
            [
                'label' => esc_html__('Counter Box border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-funfact-2 .it-funfact-item' => 'border-color: {{VALUE}}',

                ],
            ]
        );


        $this->end_controls_section();

        // Counter Box before bg
        $this->start_controls_section(
            'od_counter_box_before_style',
            [
                'label' => __('Counter Box Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]

        );

        $this->add_control(
            'od_counter_box_before_bg_color',
            [
                'label' => esc_html__('Counter Box Before BG', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-funfact-4 .it-funfact-text::before' => 'background-color: {{VALUE}}',

                ],
            ]
        );

        $this->end_controls_section();

        //Content Style
        $this->start_controls_section(
            'od_counter_box_content_style',
            [
                'label' => __('Counter Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // icon Style
        $this->add_control(
            'od_counter_box_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-funfact-icon span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-funfact-2 .it-funfact-icon' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2']
                ],
            ]
        );
        // Font Size
        $this->add_control(
            'od_counter_box_font_size',
            [
                'label' => esc_html__('Icon Font Size', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'], // Specify the units you want to support
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0.5,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => 0.5,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .it-funfact-2 .it-funfact-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],

            ]
        );

        $this->add_control(
            'od_counter_box_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'solid',
            ]
        );

        // Value/Sub Text , icon Style
        $this->add_control(
            'od_counter_box_value_color',
            [
                'label' => esc_html__('Value + SubText Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-funfact-number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Value Typography', 'ordainit-toolkit'),
                'name' => 'od_counter_box_value_typography',
                'selector' => '{{WRAPPER}} .it-funfact-number',
            ]
        );

        // Title Style
        $this->add_control(
            'od_counter_box_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-funfact-text p' => 'color: {{VALUE}}',

                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_counter_box_title_typography',
                'selector' => '{{WRAPPER}} .it-funfact-text p',
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
        $od_counter_box_end_value = $settings['od_counter_box_end_value'];
        $od_counter_box_subtext = $settings['od_counter_box_subtext'];
        $od_counter_box_title = $settings['od_counter_box_title'];
        $od_counter_box_icon_switcher = $settings['od_counter_box_icon_switcher'];
        $od_counter_box_icon_class = $settings['od_counter_box_icon_class'];
?>

        <?php if ($settings['od_design_style']  == 'layout-4'): ?>
            <div class="it-funfact-5">
                <div class="it-funfact-item d-flex justify-content-center">
                    <div class="it-funfact-text">
                        <h3 class="it-funfact-number">
                            <b
                                class="purecounter"
                                data-purecounter-duration="0"
                                data-purecounter-end="<?php echo esc_attr($od_counter_box_end_value, 'ordainit-toolkit'); ?>">
                                <?php echo esc_html($od_counter_box_end_value, 'ordainit-toolkit'); ?>
                            </b>
                            <?php echo esc_html($od_counter_box_subtext, 'ordainit-toolkit') ?>
                        </h3>
                        <p><?php echo esc_html($od_counter_box_title, 'ordainit-toolkit') ?></p>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="it-funfact-4">
                <div class="it-funfact-item d-flex align-items-center">
                    <div class="it-funfact-text">
                        <h3 class="it-funfact-number">
                            <b
                                class="purecounter"
                                data-purecounter-duration="0"
                                data-purecounter-end="<?php echo esc_attr($od_counter_box_end_value, 'ordainit-toolkit'); ?>">
                                <?php echo esc_html($od_counter_box_end_value, 'ordainit-toolkit'); ?>
                            </b>
                            <?php echo esc_html($od_counter_box_subtext, 'ordainit-toolkit') ?>
                        </h3>
                        <p><?php echo esc_html($od_counter_box_title, 'ordainit-toolkit') ?></p>
                    </div>
                </div>
            </div>


        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>
            <div class="it-funfact-2">
                <div class="it-funfact-item d-flex align-items-center justify-content-center">
                    <div class="it-funfact-content d-flex">
                        <?php if (!empty($od_counter_box_icon_switcher)) : ?>
                            <div class="it-funfact-icon">
                                <i class="<?php echo esc_attr($od_counter_box_icon_class, 'ordainit-toolkit') ?>"></i>
                            </div>
                        <?php endif; ?>
                        <div class="it-funfact-text">
                            <h3 class="it-funfact-number">
                                <b
                                    class="purecounter"
                                    data-purecounter-duration="0"
                                    data-purecounter-end="<?php echo esc_attr($od_counter_box_end_value, 'ordainit-toolkit'); ?>">
                                    <?php echo esc_html($od_counter_box_end_value, 'ordainit-toolkit'); ?>
                                </b>
                                <?php echo esc_html($od_counter_box_subtext, 'ordainit-toolkit') ?>
                            </h3>
                            <p><?php echo esc_html($od_counter_box_title, 'ordainit-toolkit') ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="it-funfact-item d-flex align-items-center justify-content-sm-center">
                <div class="it-funfact-text">
                    <h3 class="it-funfact-number">
                        <b
                            class="purecounter"
                            data-purecounter-duration="0"
                            data-purecounter-end="<?php echo esc_attr($od_counter_box_end_value, 'ordainit-toolkit'); ?>">
                            <?php echo esc_html($od_counter_box_end_value, 'ordainit-toolkit'); ?>
                        </b>
                        <?php echo esc_html($od_counter_box_subtext, 'ordainit-toolkit') ?>
                    </h3>
                    <p><?php echo esc_html($od_counter_box_title, 'ordainit-toolkit') ?></p>
                </div>


                <div class="it-funfact-icon">
                    <?php if (!empty($od_counter_box_icon_switcher)) : ?>
                        <span>
                            <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-9.93439e-08 22.364L0 24.6367L47 24.6367L47 22.364L-9.93439e-08 22.364Z" fill="currentColor"></path>
                                <path d="M-9.93439e-08 22.364L0 24.6367L47 24.6367L47 22.364L-9.93439e-08 22.364Z" fill="currentColor"></path>
                                <path d="M22.3633 1.90735e-05L22.3633 47L24.636 47L24.636 1.89741e-05L22.3633 1.90735e-05Z" fill="currentColor"></path>
                                <path d="M22.3633 1.90735e-05L22.3633 47L24.636 47L24.636 1.89741e-05L22.3633 1.90735e-05Z" fill="currentColor"></path>
                                <path d="M6.07812 39.3168L7.68517 40.9238L40.9189 7.69004L39.3117 6.08309L6.07812 39.3168Z" fill="currentColor"></path>
                                <path d="M6.07812 39.3168L7.68517 40.9238L40.9189 7.69004L39.3117 6.08309L6.07812 39.3168Z" fill="currentColor"></path>
                                <path d="M6.07812 7.69004L39.3118 40.9238L40.9187 39.3168L7.68517 6.08309L6.07812 7.69004Z" fill="currentColor"></path>
                                <path d="M6.07812 7.69004L39.3118 40.9238L40.9187 39.3168L7.68517 6.08309L6.07812 7.69004Z" fill="currentColor"></path>
                                <path d="M13.5898 44.828L15.6946 45.6855L33.4279 2.15887L31.3229 1.30136L13.5898 44.828Z" fill="currentColor"></path>
                                <path d="M13.5898 44.828L15.6946 45.6855L33.4279 2.15887L31.3229 1.30136L13.5898 44.828Z" fill="currentColor"></path>
                                <path d="M1.31641 15.6771L44.843 33.4102L45.7005 31.3054L2.17391 13.5723L1.31641 15.6771Z" fill="currentColor"></path>
                                <path d="M1.31641 15.6771L44.843 33.4102L45.7005 31.3054L2.17391 13.5723L1.31641 15.6771Z" fill="currentColor"></path>
                                <path d="M13.668 2.10514L31.2178 45.707L33.3262 44.8584L15.7764 1.25659L13.668 2.10514Z" fill="currentColor"></path>
                                <path d="M13.668 2.10514L31.2178 45.707L33.3262 44.8584L15.7764 1.25659L13.668 2.10514Z" fill="currentColor"></path>
                                <path d="M1.29297 31.2314L2.14138 33.3398L45.7432 15.7948L44.895 13.6864L1.29297 31.2314Z" fill="currentColor"></path>
                                <path d="M1.29297 31.2314L2.14138 33.3398L45.7432 15.7948L44.895 13.6864L1.29297 31.2314Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    <?php endif; ?>
                </div>

            </div>

        <?php endif; ?>





        <script>
            jQuery(document).ready(function($) {

                if ($(".purecounter").length) {
                    new PureCounter({
                        filesizing: true,
                        selector: ".filesizecount",
                        pulse: 2,
                    });
                    new PureCounter();
                }


            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Counter_Box());
