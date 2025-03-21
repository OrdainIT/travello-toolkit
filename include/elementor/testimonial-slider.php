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
class OD_Testimonial_Slider extends Widget_Base
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
        return 'od-testimonial-slider';
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
        return __('Testimonial Slider', 'ordainit-toolkit');
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
                'label' => esc_html__('Testimonial Layout', 'ordainit-toolkit'),
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

        // Title & Content Section
        $this->start_controls_section(
            'od_testimonial_content',
            [
                'label' => __('Testimonial Title & Content', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        // Title
        $this->add_control(
            'od_testimonial_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        // Subtitle
        $this->add_control(
            'od_testimonial_subtitle',
            [
                'label' => __('Subtitle', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Subtitle', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your subtitle here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        // Thumbnail
        $this->add_control(
            'od_testimonial_thumbnail_heading',
            [
                'label' => esc_html__('Thumbnail', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'od_testimonial_thumbnail',
            [
                'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/testimonial/thumb/test-2-1.jpg',
                ],
            ]
        );

        // Shape
        $this->add_control(
            'od_testimonial_shape_heading',
            [
                'label' => esc_html__('Shape Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'od_testimonial_shape_image_1',
            [
                'label' => esc_html__('Choose Shape 1', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/testimonial/shape/test-2.1.png',
                ],
            ]
        );

        $this->add_control(
            'od_testimonial_shape_image_2',
            [
                'label' => esc_html__('Choose Shape 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/testimonial/shape/test-2.2.png',
                ],
            ]
        );

        $this->end_controls_section();

        // Testimonial List Content
        $this->start_controls_section(
            'od_testimonial_section_content_list',
            [
                'label' => __('Testimonial Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_testimonial_lists',
            [
                'label' => esc_html__('Testimonial List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_testimonial_list_description',
                        'label' => esc_html__('Description', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('OD Testimonial Description', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_testimonial_list_author',
                        'label' => esc_html__('Author', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('OD Testimonial Author', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_testimonial_list_avatar',
                        'label' => esc_html__('Choose Image', 'ordainit-toolkit'),
                        'description' => esc_html__('It works for layout - 1 , 3, 4 & 5'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' =>
                            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-1/testimonial/img/avater-1.png',
                        ],

                    ],
                    [
                        'name' => 'od_testimonial_list_designation',
                        'label' => esc_html__('Designation', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('OD Testimonial Designation', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_testimonial_list_rating',
                        'label' => esc_html__('Select Star', 'ordainit-toolkit'),
                        'description' => esc_html__('It works for layout - 1, 4 & 5'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => '5',
                        'options' => [
                            '1' => esc_html__('1 Star', 'ordainit-toolkit'),
                            '2' => esc_html__('2 Stars', 'ordainit-toolkit'),
                            '3' => esc_html__('3 Stars', 'ordainit-toolkit'),
                            '4' => esc_html__('4 Stars', 'ordainit-toolkit'),
                            '5' => esc_html__('5 Stars', 'ordainit-toolkit'),
                        ],

                    ],

                ],
                'default' => [
                    [
                        'od_testimonial_list_author' => esc_html__('Francis Roman', 'ordainit-toolkit'),
                    ],
                    [
                        'od_testimonial_list_author' => esc_html__('Isco Alarcon', 'ordainit-toolkit'),
                    ],
                    [
                        'od_testimonial_list_author' => esc_html__('Sergio Ramos', 'ordainit-toolkit'),
                    ],
                    [
                        'od_testimonial_list_author' => esc_html__('Marco Asensio', 'ordainit-toolkit'),
                    ],

                ],
                'title_field' => '{{{ od_testimonial_list_author }}}',
            ]
        );

        $this->end_controls_section();

        // Testimonial settings
        $this->start_controls_section(
            'od_testimonial_settings',
            [
                'label' => __('Testimonial Settings', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_testimonial_slider_autoplay',
            [
                'label' => esc_html__('Autoplay On / Off', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'ordainit-toolkit'),
                'label_off' => esc_html__('Off', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Quote Icon Switcher
        $this->start_controls_section(
            'od_testimonial_quote_switcher_section',
            [
                'label' => __('Quote Icon Switcher', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-5']
                ],
            ]
        );

        $this->add_control(
            'od_testimonial_quote_switcher',
            [
                'label' => esc_html__('Show / Hide Quote', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Arrow Switcher
        $this->start_controls_section(
            'od_testimonial_arrow_switcher_section',
            [
                'label' => __('Testimonial Arrow Switcher', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-3', 'layout-5']
                ],
            ]
        );

        $this->add_control(
            'od_testimonial_arrow_switcher',
            [
                'label' => esc_html__('Show / Hide Arrow', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Pagination Switcher
        $this->start_controls_section(
            'od_testimonial_pagination_switcher_section',
            [
                'label' => __('Testimonial Pagination Switcher', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-4', 'layout-5']
                ],
            ]
        );

        $this->add_control(
            'od_testimonial_pagination_switcher',
            [
                'label' => esc_html__('Show / Hide Pagination', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Style Section Starts

        // Heading Style
        $this->start_controls_section(
            'od_testimonial_heading_style',
            [
                'label' => __('Testimonial Heading Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        //Title
        $this->add_control(
            'od_testimonial_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-section-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_testimonial_title_typography',
                'selector' => '{{WRAPPER}} .it-section-title',
            ]
        );
        //Subtitle
        $this->add_control(
            'od_testimonial_subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
                'name' => 'od_testimonial_subtitle_typography',
                'selector' => '{{WRAPPER}} .it-section-subtitle',
            ]
        );

        $this->end_controls_section();

        // Testimonial Content Style Starts
        $this->start_controls_section(
            'od_testimonial_style',
            [
                'label' => __('Testimonial Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Testi box bg
        $this->add_control(
            'od_testimonial_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testimonial-item' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .theme-bg' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-item' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-5']
                ],
            ]
        );

        // Content Style
        $this->add_control(
            'od_testimonial_content_style_heading',
            [
                'label' => esc_html__('Content Style', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Description Style
        $this->add_control(
            'od_testimonial_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testimonial-dsc p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-2-dsc i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-4-avater-box p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-text p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_testimonial_description_typography',
                'selector' => '{{WRAPPER}} .it-testimonial-dsc p, {{WRAPPER}} .it-testi-2-dsc i, {{WRAPPER}} .it-testi-4-avater-box p, {{WRAPPER}} .it-testi-inner-text p',
            ]
        );

        // Author Style
        $this->add_control(
            'od_testimonial_author_color',
            [
                'label' => esc_html__('Author Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testimonial-avater-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-2-avater-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-4-avater-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-author-info h5' => 'color: {{VALUE}}',

                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Author Typography', 'ordainit-toolkit'),
                'name' => 'od_testimonial_author_typography',
                'selector' => '{{WRAPPER}} .it-testimonial-avater-title, {{WRAPPER}} .it-testi-2-avater-title, {{WRAPPER}} .it-testi-4-avater-title, {{WRAPPER}} .it-testi-inner-author-info h5',
            ]
        );

        // Designation Style
        $this->add_control(
            'od_testimonial_designation_color',
            [
                'label' => esc_html__('Designation Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testimonial-avater-designation' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-2-avater-info span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-4-designation-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-author-info span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Designation Typography', 'ordainit-toolkit'),
                'name' => 'od_testimonial_designation_typography',
                'selector' => '{{WRAPPER}} .it-testimonial-avater-designation, {{WRAPPER}} .it-testi-2-avater-info span, {{WRAPPER}} .it-testi-4-designation-title, {{WRAPPER}} .it-testi-inner-author-info span',
            ]
        );

        $this->add_control(
            'hr-2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-4', 'layout-5']
                ],
            ]
        );

        // Rating star style
        $this->add_control(
            'od_testimonial_star_color',
            [
                'label' => esc_html__('Rating Star Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testimonial-rating span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-4-designation-review span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-review i' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-4', 'layout-5']
                ],
            ]
        );

        $this->add_control(
            'od_testimonial_star_font_size',
            [
                'label' => esc_html__('Star Font Size', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0.5,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => 0.5,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .it-testimonial-rating span' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .it-testi-4-designation-review span' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .it-testi-inner-review i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-4', 'layout-5']
                ],
            ]
        );

        $this->add_control(
            'hr-3',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-5']
                ],
            ]
        );


        // Quote Color
        $this->add_control(
            'od_testimonial_quote_color',
            [
                'label' => esc_html__('Quote Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testimonial-avater-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-2-avater-quote i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-quote span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-5']
                ],
            ]
        );
        $this->add_control(
            'od_testimonial_quote_bg_color',
            [
                'label' => esc_html__('Quote Icon BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testimonial-avater-icon i' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->end_controls_section();


        // Arrow Style
        $this->start_controls_section(
            'od_testimonial_arrow_style',
            [
                'label' => __('Testimonial Arrow Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-3', 'layout-5']
                ],
            ]
        );

        $this->start_controls_tabs(
            'od_testimonial_arrow_style_tabs'
        );

        $this->start_controls_tab(
            'od_testimonial_arrow_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );
        $this->add_control(
            'od_testimonial_arrow_style_normal_bg_color',
            [
                'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-arrow button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_testimonial_arrow_style_normal_color',
            [
                'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-arrow button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_testimonial_arrow_style_normal_border_color',
            [
                'label' => esc_html__('Arrow Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-arrow button' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_testimonial_arrow_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );
        $this->add_control(
            'od_testimonial_arrow_style_hover_bg_color',
            [
                'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-arrow button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_testimonial_arrow_style_hover_color',
            [
                'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-arrow button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_testimonial_arrow_style_hover_border_color',
            [
                'label' => esc_html__('Arrow Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev:hover' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-arrow button:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        // Pagination Style

        $this->start_controls_section(
            'od_testimonial_pagination_style',
            [
                'label' => __('Testimonial pagination Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-4', 'layout-5']
                ],
            ]
        );

        $this->start_controls_tabs(
            'od_testimonial_pagination_style_tabs'
        );

        $this->start_controls_tab(
            'od_testimonial_pagination_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );
        $this->add_control(
            'od_testimonial_pagination_style_normal_bg_color',
            [
                'label' => esc_html__('Pagination BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-4-dots .swiper-pagination-bullet' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-dots .swiper-pagination-bullet' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_testimonial_pagination_style_active_tab',
            [
                'label' => esc_html__('Active', 'ordainit-toolkit'),
            ]
        );
        $this->add_control(
            'od_testimonial_pagination_style_active_bg_color',
            [
                'label' => esc_html__('Pagination BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-4-dots .swiper-pagination-bullet-active' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-dots .swiper-pagination-bullet-active' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

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
        $od_testimonial_lists = $settings['od_testimonial_lists'];
        $od_testimonial_slider_autoplay = $settings['od_testimonial_slider_autoplay'];
        $od_testimonial_title = $settings['od_testimonial_title'];
        $od_testimonial_subtitle = $settings['od_testimonial_subtitle'];
        $od_testimonial_thumbnail = $settings['od_testimonial_thumbnail'];
        $od_testimonial_shape_image_1 = $settings['od_testimonial_shape_image_1'];
        $od_testimonial_shape_image_2 = $settings['od_testimonial_shape_image_2'];
        $od_testimonial_arrow_switcher = $settings['od_testimonial_arrow_switcher'];
        $od_testimonial_pagination_switcher = $settings['od_testimonial_pagination_switcher'];
        $od_testimonial_quote_switcher = $settings['od_testimonial_quote_switcher'];
?>


        <?php if ($settings['od_design_style']  == 'layout-5'): ?>

            <div class="it-testi-inner-wrapp p-relative">
                <div class="swiper-container inner-testi-active">
                    <div class="swiper-wrapper">

                        <?php foreach ($od_testimonial_lists as $od_testimonial_list):
                            $testimonial_avatar_url = $od_testimonial_list['od_testimonial_list_avatar'];
                            $testimonial_rating_star = $od_testimonial_list['od_testimonial_list_rating'];
                        ?>

                            <div class="swiper-slide">
                                <div class="it-testi-inner-item p-relative">
                                    <div class="it-testi-inner-review mb-20">
                                        <?php
                                        $rating = intval($testimonial_rating_star);
                                        for ($i = 1; $i <= $rating; $i++) : ?>
                                            <span><i class="fa-solid fa-star"></i></span>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="it-testi-inner-text">
                                        <p>“<?php echo od_kses($od_testimonial_list['od_testimonial_list_description'], 'orsdainit-toolkit') ?>”</p>
                                    </div>
                                    <div class="it-testi-inner-author-box d-flex align-items-center">
                                        <div class="it-testi-inner-avater mr-20">
                                            <img
                                                src="<?php echo esc_url($testimonial_avatar_url['url'], 'ordainit-toolkit') ?>"
                                                alt="<?php echo esc_html($od_testimonial_list['od_testimonial_list_author']) ?>">
                                        </div>
                                        <div class="it-testi-inner-author-info">
                                            <h5><?php echo esc_html($od_testimonial_list['od_testimonial_list_author'], 'ordainit-toolkit') ?></h5>
                                            <span><?php echo esc_html($od_testimonial_list['od_testimonial_list_designation'], 'ordainit-toolkit') ?></span>
                                        </div>
                                    </div>

                                    <?php if (!empty($od_testimonial_quote_switcher)) : ?>
                                        <div class="it-testi-inner-quote d-none d-xl-block">
                                            <span>
                                                <svg width="80" height="60" viewBox="0 0 80 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.6827 0C30.6706 0 38.6242 9.32996 38.6242 22.9052C38.6242 42.7317 23.8203 56.7736 2.62616 59.4793C2.21964 59.5155 1.81359 59.4063 1.4782 59.1704C1.14281 58.9345 0.899378 58.5868 0.790157 58.1878C0.680936 57.7888 0.712796 57.3635 0.880231 56.9859C1.04767 56.6083 1.33992 56.3023 1.70661 56.1206C9.84407 52.4819 13.9819 47.8167 14.4876 43.1984C14.7724 41.7621 14.5509 40.2698 13.8619 38.9823C13.1728 37.6948 12.06 36.6939 10.7177 36.1541C4.69505 34.7079 0.695312 27.1039 0.695312 19.2667C0.695312 14.1568 2.6958 9.25629 6.25663 5.6431C9.81746 2.0299 14.647 0 19.6827 0Z" fill="currentColor" />
                                                    <path d="M61.0577 0C72.0456 0 79.9992 9.32996 79.9992 22.9052C79.9992 42.7317 65.1953 56.7736 44.0012 59.4793C43.5946 59.5155 43.1886 59.4063 42.8532 59.1704C42.5178 58.9345 42.2744 58.5868 42.1652 58.1878C42.0559 57.7888 42.0878 57.3635 42.2552 56.9859C42.4227 56.6083 42.7149 56.3023 43.0816 56.1206C51.2191 52.4819 55.3569 47.8167 55.8626 43.1984C56.1474 41.7621 55.9259 40.2698 55.2369 38.9823C54.5478 37.6948 53.435 36.6939 52.0927 36.1541C46.07 34.7079 42.0703 27.1039 42.0703 19.2667C42.0703 14.1568 44.0708 9.25629 47.6316 5.6431C51.1925 2.0299 56.022 0 61.0577 0Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if (!empty($od_testimonial_arrow_switcher)) : ?>
                    <div class="it-testi-inner-arrow mt-40 d-flex justify-content-between">
                        <button class="it-testi-prev" tabindex="0">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button class="it-testi-next" tabindex="0">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if (!empty($od_testimonial_pagination_switcher)) : ?>
                    <div class="<?php echo $od_testimonial_arrow_switcher ? 'it-testi-inner-dots' : 'it-testi-inner-dots mt-40 z-3' ?>"></div>
                <?php endif; ?>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-4'): ?>

            <div class="it-testi-4-slider-wrap">
                <div class="swiper-container it-testi-4-active">
                    <div class="swiper-wrapper">
                        <?php foreach ($od_testimonial_lists as $od_testimonial_list) :
                            $testimonial_avatar_url = $od_testimonial_list['od_testimonial_list_avatar'];
                            $testimonial_rating_star = $od_testimonial_list['od_testimonial_list_rating'];
                        ?>
                            <div class="swiper-slide">
                                <div class="it-testi-4-avater-box text-center">
                                    <div class="it-testi-4-avater mb-25">
                                        <img src="<?php echo esc_url($testimonial_avatar_url['url'], 'ordainit-toolkit') ?>" alt="<?php echo esc_html($od_testimonial_list['od_testimonial_list_author']) ?>">
                                    </div>
                                    <h3 class="it-testi-4-avater-title"><?php echo esc_html($od_testimonial_list['od_testimonial_list_author'], 'ordainit-toolkit') ?></h3>
                                    <div class="it-testi-4-designation-box d-flex align-items-center justify-content-center">
                                        <span class="it-testi-4-designation-title mr-5"><?php echo esc_html($od_testimonial_list['od_testimonial_list_designation'], 'ordainit-toolkit') ?></span>
                                        <div class="it-testi-4-designation-review">
                                            <?php
                                            $rating = intval($testimonial_rating_star); // Convert to integer for safety
                                            for ($i = 1; $i <= $rating; $i++) : ?>
                                                <span><i class="fa-solid fa-star"></i></span>
                                            <?php endfor; ?>

                                        </div>
                                    </div>
                                    <p>“<?php echo od_kses($od_testimonial_list['od_testimonial_list_description'], 'orsdainit-toolkit') ?>”</p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if (!empty($od_testimonial_pagination_switcher)) : ?>
                    <div class="row text-center mt-25">
                        <div class="it-testi-4-dots"></div>
                    </div>
                <?php endif; ?>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="it-testi-style-3">
                <div class="it-testimonial-wrapper p-relative">
                    <div class="swiper-container it-testi-3-active">
                        <div class="swiper-wrapper">
                            <?php foreach ($od_testimonial_lists as $od_testimonial_list) :
                                $testimonial_avatar_url = $od_testimonial_list['od_testimonial_list_avatar'];
                            ?>
                                <div class="swiper-slide">
                                    <div class="it-testimonial-content">
                                        <div class="it-testimonial-dsc p-relative">
                                            <i class="fa-solid fa-quote-right qoute-1"></i>
                                            <p>“<?php echo od_kses($od_testimonial_list['od_testimonial_list_description'], 'orsdainit-toolkit') ?>”</p>
                                        </div>
                                        <div class="it-testimonial-avater d-flex align-items-center">
                                            <div class="it-testimonial-avater-thumb">
                                                <img src="<?php echo esc_url($testimonial_avatar_url['url'], 'ordainit-toolkit') ?>" alt="<?php echo esc_html($od_testimonial_list['od_testimonial_list_author']) ?>">
                                            </div>
                                            <div class="it-testimonial-avater-info">
                                                <h3 class="it-testimonial-avater-title"><?php echo esc_html($od_testimonial_list['od_testimonial_list_author'], 'ordainit-toolkit') ?></h3>
                                                <span class="it-testimonial-avater-designation"><?php echo esc_html($od_testimonial_list['od_testimonial_list_designation'], 'ordainit-toolkit') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if (!empty($od_testimonial_arrow_switcher)) : ?>
                        <div class="it-testi-2-arrow-box text-end">
                            <button class="testi-2-prev">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                            <button class="testi-2-prev testi-2-next">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="it-testi-2-area pt-120 pb-120 p-relative">
                <div class="it-testi-2-shape-box d-none d-md-block">
                    <div class="it-testi-2-shape-top">
                        <?php
                        $alt_text_1 = str_replace(['-', '_'], ' ', pathinfo($od_testimonial_shape_image_1['url'], PATHINFO_FILENAME));
                        ?>
                        <img src="<?php echo $od_testimonial_shape_image_1['url'] ?>" alt="<?php echo esc_attr($alt_text_1); ?>">
                    </div>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8">
                            <div class="it-testi-2-title-box">
                                <span class="it-section-subtitle"><?php echo od_kses($od_testimonial_subtitle, 'ordainit-toolkit') ?></span>
                                <h3 class="it-section-title">
                                    <?php echo od_kses($od_testimonial_title, 'ordainit-toolkit') ?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-4 col-sm-4">
                            <?php if (!empty($od_testimonial_arrow_switcher)) : ?>
                                <div class="it-testi-2-arrow-box text-end">
                                    <button class="testi-2-prev">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </button>
                                    <button class="testi-2-prev testi-2-next">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="it-testi-2-wrap mt-70">
                        <div class="row align-items-center">
                            <div class="col-xl-4 col-lg-4">
                                <div class="it-testi-2-thumb-box d-none d-lg-block text-center p-relative">
                                    <div class="it-testi-2-shape d-none d-lg-block">
                                        <?php
                                        $alt_text_2 = str_replace(['-', '_'], ' ', pathinfo($od_testimonial_shape_image_2['url'], PATHINFO_FILENAME));
                                        ?>
                                        <img src="<?php echo $od_testimonial_shape_image_2['url'] ?>" alt="<?php echo esc_attr($alt_text_2); ?>">
                                    </div>
                                    <div class="it-testi-2-thumb">
                                        <?php
                                        $alt_text_3 = str_replace(['-', '_'], ' ', pathinfo($od_testimonial_thumbnail['url'], PATHINFO_FILENAME));
                                        ?>
                                        <img src="<?php echo $od_testimonial_thumbnail['url'] ?>" alt="<?php echo esc_attr($alt_text_3); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8">
                                <div class="it-testi-2-content theme-bg">
                                    <div class="swiper-container it-testi-2-active">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($od_testimonial_lists as $od_testimonial_list) : ?>
                                                <div class="swiper-slide">
                                                    <div class="it-testi-2-item">
                                                        <div class="it-testi-2-dsc mb-15">
                                                            <i>“<?php echo od_kses($od_testimonial_list['od_testimonial_list_description'], 'orsdainit-toolkit') ?>”</i>
                                                        </div>
                                                        <div
                                                            class="it-testi-2-avater-content d-flex align-items-center justify-content-between">
                                                            <div class="it-testi-2-avater-info">
                                                                <h3 class="it-testi-2-avater-title mb-10"><?php echo esc_html($od_testimonial_list['od_testimonial_list_author'], 'ordainit-toolkit') ?></h3>
                                                                <span><?php echo esc_html($od_testimonial_list['od_testimonial_list_designation'], 'ordainit-toolkit') ?></span>
                                                            </div>

                                                            <?php if (!empty($od_testimonial_quote_switcher)) : ?>
                                                                <div class="it-testi-2-avater-quote">
                                                                    <i class="fa-solid fa-quote-right"></i>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="swiper-container it-testimonial-active">
                <div class="swiper-wrapper">
                    <?php foreach ($od_testimonial_lists as $od_testimonial_list):
                        $testimonial_avatar_url = $od_testimonial_list['od_testimonial_list_avatar'];
                        $testimonial_rating_star = $od_testimonial_list['od_testimonial_list_rating'];
                    ?>
                        <div class="swiper-slide">
                            <div class="it-testimonial-item">
                                <div class="it-testimonial-rating">
                                    <?php
                                    $rating = intval($testimonial_rating_star);
                                    for ($i = 1; $i <= $rating; $i++) : ?>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    <?php endfor; ?>
                                </div>
                                <div class="it-testimonial-dsc">
                                    <p>“<?php echo od_kses($od_testimonial_list['od_testimonial_list_description'], 'orsdainit-toolkit') ?>”</p>
                                </div>
                                <div class="it-testimonial-avater-box d-flex align-items-center">
                                    <div class="it-testimonial-avater-thumb p-relative">
                                        <img src="<?php echo esc_url($testimonial_avatar_url['url'], 'ordainit-toolkit') ?>" alt="<?php echo esc_html($od_testimonial_list['od_testimonial_list_author']) ?>">

                                        <?php if (!empty($od_testimonial_quote_switcher)) : ?>
                                            <div class="it-testimonial-avater-icon">
                                                <i class="fa-solid fa-quote-right"></i>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="it-testimonial-avater-info">
                                        <h3 class="it-testimonial-avater-title"><?php echo esc_html($od_testimonial_list['od_testimonial_list_author'], 'ordainit-toolkit') ?></h3>
                                        <span class="it-testimonial-avater-designation"><?php echo esc_html($od_testimonial_list['od_testimonial_list_designation'], 'ordainit-toolkit') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>

        <?php endif; ?>


        <script>
            jQuery(document).ready(function($) {
                const sliderAutoplay = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay2 = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay3 = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay4 = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay5 = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;

                // Testimonial Layout 1
                const testiMonialswiper = new Swiper('.it-testimonial-active', {
                    speed: 1000,
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 3,
                        },
                        '1200': {
                            slidesPerView: 3,
                        },
                        '992': {
                            slidesPerView: 3,
                        },
                        '768': {
                            slidesPerView: 2,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },

                });

                // Testimonial Layout 2
                const testiMonial2swiper = new Swiper('.it-testi-2-active', {
                    speed: 1000,
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay2 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 1,
                        },
                        '1200': {
                            slidesPerView: 1,
                        },
                        '992': {
                            slidesPerView: 1,
                        },
                        '768': {
                            slidesPerView: 1,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: '.testi-2-prev',
                        nextEl: '.testi-2-next',
                    }
                });

                // Testi - layout - 3
                const testi3swiper = new Swiper('.it-testi-3-active', {
                    speed: 1000,
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay3 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 1,
                        },
                        '1200': {
                            slidesPerView: 1,
                        },
                        '992': {
                            slidesPerView: 1,
                        },
                        '768': {
                            slidesPerView: 1,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: '.testi-2-prev',
                        nextEl: '.testi-2-next',
                    }

                });


                // Testi layout-4
                const testiMonial4swiper = new Swiper('.it-testi-4-active', {
                    speed: 1000,
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay4 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 1,
                        },
                        '1200': {
                            slidesPerView: 1,
                        },
                        '992': {
                            slidesPerView: 1,
                        },
                        '768': {
                            slidesPerView: 1,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    pagination: {
                        el: ".it-testi-4-dots",
                        clickable: true,
                    }

                });

                // Testi - layout - 5
                const innerTestiSwiper = new Swiper('.inner-testi-active', {
                    speed: 1000,
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay5 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 1,
                        },
                        '1200': {
                            slidesPerView: 1,
                        },
                        '992': {
                            slidesPerView: 1,
                        },
                        '768': {
                            slidesPerView: 1,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: '.it-testi-prev',
                        nextEl: '.it-testi-next',
                    },
                    pagination: {
                        el: ".it-testi-inner-dots",
                        clickable: true,
                    }

                });



            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Testimonial_Slider());
