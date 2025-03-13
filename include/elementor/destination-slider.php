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
class Od_Destination_Slider extends Widget_Base
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
        return 'od-destination-slider';
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
        return __('Destination Slider', 'ordainit-toolkit');
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

        // Bg Color

        $this->add_control(
            'od_destination_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-destination-2-overlay::before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'od_destination_title_content',
            [
                'label' => __('Title & Content', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2'],
                ],
            ]
        );

        $this->add_control(
            'od_destination_title_content_title',
            [
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Explore the Beautiful Places Around World', 'ordainit-toolkit'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'od_destination_title_content_subtitle',
            [
                'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('DESTINATION LIST', 'ordainit-toolkit'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'od_destination_title_content_description',
            [
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do..', 'ordainit-toolkit'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'od_destination_title_content_btn_text',
            [
                'label' => esc_html__('Button Text', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'ordainit-toolkit'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'od_destination_title_content_btn_url',
            [
                'label' => esc_html__('Button URL', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,

            ]
        );





        $this->end_controls_section();





        $this->start_controls_section(
            'od_destination_slider_contnet',
            [
                'label' => __('Slider Lists', 'ordainit-toolkit'),
            ]
        );


        $this->add_control(
            'od_destination_slider_content_wrap',
            [
                'label' => esc_html__('Slider List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_destination_slider_title',
                        'label' => esc_html__('Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Title', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_destination_slider_subtitle',
                        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Sub Title', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_destination_slider_description',
                        'label' => esc_html__('Description', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Description', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_destination_slider_btn_text',
                        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('See More', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_destination_slider_url',
                        'label' => esc_html__('URL', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_destination_slider_image',
                        'label' => esc_html__('Slider Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-1/destination/img/img-1.jpg',
                        ],
                    ],
                ],
                'default' => [
                    [
                        'od_destination_slider_title' => esc_html__('Europe', 'ordainit-toolkit'),
                    ],
                    [
                        'od_destination_slider_title' => esc_html__('North America', 'ordainit-toolkit'),
                    ],
                    [
                        'od_destination_slider_title' => esc_html__('South Africa', 'ordainit-toolkit'),
                    ],
                    [
                        'od_destination_slider_title' => esc_html__('Costa Rica', 'ordainit-toolkit'),
                    ],
                ],
                'title_field' => '{{{ od_destination_slider_title }}}',
            ]
        );








        $this->end_controls_section();




        $this->start_controls_section(
            'od_destination_slider_setttings',
            [
                'label' => __('Slider Settings', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_destination_slider_autoplay_switcher',
            [
                'label' => esc_html__('Autoplay On/Off', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'ordainit-toolkit'),
                'label_off' => esc_html__('Off', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'od_destination_slider_shap',
            [
                'label' => __('Shap', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2'],
                ],
            ]
        );

        $this->add_control(
            'od_destination_slider_shap_img',
            [
                'label' => esc_html__('Shap Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/destination/shape/d-walk.png',
                ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'od_destination_slider_section_content',
            [
                'label' => __('Title & Content', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2'],
                ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'od_destination_slider_section_content_title',
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
                'name' => 'od_destination_slider_section_content_title_typo',
                'selector' => '{{WRAPPER}} .it-section-title',
            ]
        );

        $this->add_control(
            'od_destination_slider_section_content_subtitle',
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
                'name' => 'od_destination_slider_section_content_subtitle_typo',
                'selector' => '{{WRAPPER}} .it-section-subtitle',
            ]
        );
        $this->add_control(
            'od_destination_slider_section_content_description',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-destination-2-title-box p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_destination_slider_section_content_description_typo',
                'selector' => '{{WRAPPER}} .it-destination-2-title-box p',
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'od_destination_slider_section_content_button',
            [
                'label' => __('Button', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2'],
                ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'od_destination_slider_section_content_button_tabs'
        );

        // Normal

        $this->start_controls_tab(
            'od_destination_slider_section_content_button_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_destination_slider_section_content_button_normal_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-secondary' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_destination_slider_section_content_button_normal_text_color',
            [
                'label' => esc_html__('Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-secondary' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_tab();

        // Hover

        $this->start_controls_tab(
            'od_destination_slider_section_content_button_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_destination_slider_section_content_button_hover_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-secondary:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_destination_slider_section_content_button_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-secondary:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_destination_slider_section_content_button_typo',
                'selector' => '{{WRAPPER}} .it-btn-secondary',
            ]
        );



        $this->end_controls_section();



        $this->start_controls_section(
            'od_destination_slider_style',
            [
                'label' => __('Slider Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_destination_slider_bg_overlay_color',
            [
                'label' => esc_html__('BG Overlay Color', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-3', 'layout-4'],
                ],
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-destination-item::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-travel-feat-thumb::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_destination_slider_content_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'condition' => [
                    'od|_design_style' => ['layout-2'],
                ],
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-destination-2-text' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_destination_slider_title_heading',
            [
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'od_destination_slider_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-destination-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-destination-2-place' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-travel-feat-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_destination_slider_title_hover_color',
            [
                'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-destination-title:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-destination-2-place:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-travel-feat-item:hover .it-travel-feat-content .it-travel-feat-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_destination_slider_title_typo',
                'selector' => '{{WRAPPER}} .it-destination-title, {{WRAPPER}}  .it-destination-2-place',
            ]
        );

        $this->add_control(
            'od_destination_slider_subtitle_heading',
            [
                'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
                ],
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'od_destination_slider_subtitle_color',
            [
                'label' => esc_html__('Sub Title Color', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
                ],
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-destination-content span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-destination-2-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_destination_slider_subtitle_typo',
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
                ],
                'selector' => '{{WRAPPER}} .it-destination-content span, {{WRAPPER}} .it-destination-2-text',
            ]
        );


        $this->add_control(
            'od_destination_slider_description_heading',
            [
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-4']
                ],
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'od_destination_slider_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-4']
                ],
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-travel-feat-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_destination_slider_description_typo',
                'condition' => [
                    'od_design_style' => ['layout-4']
                ],
                'selector' => '{{WRAPPER}} .it-travel-feat-content p',
            ]
        );





        $this->end_controls_section();


        $this->start_controls_section(
            'od_destination_slider_button_4',
            [
                'label' => __('Button', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-4'],
                ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'od_destination_slider_button_4_tabs'
        );

        // Normal

        $this->start_controls_tab(
            'od_destination_slider_button_4_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );


        $this->add_control(
            'od_destination_slider_button_4_normal_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-travel-feat-button a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_destination_slider_button_4_normal_text_color',
            [
                'label' => esc_html__('Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-travel-feat-button a' => 'color: {{VALUE}}',
                ],
            ]
        );



        $this->end_controls_tab();

        // Hover

        $this->start_controls_tab(
            'od_destination_slider_button_4_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_destination_slider_button_4_hover_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-travel-feat-button a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_destination_slider_button_4_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-travel-feat-button a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );



        $this->end_controls_tab();


        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'od_destination_slider_section_content_arrow',
            [
                'label' => __('Arrow', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2'],
                ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'od_destination_slider_section_content_arrow_tabs'
        );

        // Normal

        $this->start_controls_tab(
            'od_destination_slider_section_content_arrow_normal_tab',
            [
                'label' => esc_html__('Normal', 'odrainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_destination_slider_section_content_arrow_normal_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slide-btn-1' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_destination_slider_section_content_arrow_normal_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slide-btn-1' => 'color: {{VALUE}}',
                ],
            ]
        );





        $this->end_controls_tab();

        // Hover

        $this->start_controls_tab(
            'od_destination_slider_section_content_arrow_hover_tab',
            [
                'label' => esc_html__('Hover', 'odrainit-toolkit'),
            ]
        );


        $this->add_control(
            'od_destination_slider_section_content_arrow_hover_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slide-btn-2:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-slide-btn-1:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_destination_slider_section_content_arrow_hover_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slide-btn-2:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-slide-btn-1:hover' => 'color: {{VALUE}}',
                ],
            ]
        );



        $this->end_controls_tab();

        // Active

        $this->start_controls_tab(
            'od_destination_slider_section_content_arrow_active_tab',
            [
                'label' => esc_html__('Active', 'odrainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_destination_slider_section_content_arrow_active_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slide-btn-2' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_destination_slider_section_content_arrow_active_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slide-btn-2' => 'color: {{VALUE}}',
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
        $od_destination_slider_content_wrap = $settings['od_destination_slider_content_wrap'];
        $od_destination_slider_autoplay_switcher = $settings['od_destination_slider_autoplay_switcher'];
?>

        <?php if ($settings['od_design_style']  == 'layout-2'):

            $od_destination_title_content_title = $settings['od_destination_title_content_title'];
            $od_destination_title_content_subtitle = $settings['od_destination_title_content_subtitle'];
            $od_destination_title_content_description = $settings['od_destination_title_content_description'];
            $od_destination_title_content_btn_text = $settings['od_destination_title_content_btn_text'];
            $od_destination_title_content_btn_url = $settings['od_destination_title_content_btn_url'];
            $od_destination_slider_shap_img = $settings['od_destination_slider_shap_img'];
        ?>
            <div class="it-destination-2-area it-destination-2-pt it-destination-2-overlay p-relative pt-120 pb-120 fix">
                <div class="it-destination-2-shape-box">
                    <div class="it-destination-2-shape-1 d-none d-xl-block">
                        <img src="<?php echo esc_url($od_destination_slider_shap_img['url'], 'ordainit-toolkit'); ?>" alt="">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="it-destination-2-title-box">
                                <span class="it-section-subtitle"><?php echo od_kses($od_destination_title_content_subtitle, 'ordainit-toolkit'); ?></span>
                                <h3 class="it-section-title"><?php echo od_kses($od_destination_title_content_title, 'ordainit-toolkit'); ?></h3>
                                <p><?php echo od_kses($od_destination_title_content_description, 'ordainit-toolkit'); ?></p>
                            </div>
                            <div class="it-destination-2-button">
                                <a href="<?php echo esc_url($od_destination_title_content_btn_url, 'ordainit-toolkit'); ?>" class="it-btn-secondary"><?php echo esc_html($od_destination_title_content_btn_text, 'ordainit-toolkit'); ?></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="it-destination-2-slider-wrap p-relative">
                                <div class="swiper-container it-destination-2-active">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($od_destination_slider_content_wrap as $single_item_desti_slide):
                                            $desti_slider_img_url = $single_item_desti_slide['od_destination_slider_image'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="it-destination-2-item p-relative">
                                                    <div class="it-destination-2-thumb">
                                                        <img src="<?php echo esc_url($desti_slider_img_url['url'], 'ordainit-toolkit'); ?>" alt="">
                                                    </div>
                                                    <div class="it-destination-2-text text-center">
                                                        <h3 class="it-destination-2-place"><a href="<?php echo esc_url($single_item_desti_slide['od_destination_slider_url'], 'ordainit-toolkit'); ?>"><?php echo esc_html($single_item_desti_slide['od_destination_slider_title'], 'ordainit-toolkit'); ?></a></h3>
                                                        <span class="it-destination-2-tourist"><?php echo esc_html($single_item_desti_slide['od_destination_slider_subtitle'], 'ordainit-toolkit'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="it-destination-2-arrow-box d-none d-md-block">
                                    <button class="destination-2-prev it-slide-btn-1">
                                        <i class="flaticon-left-chevron"></i>
                                    </button>
                                    <button class="destination-2-next it-slide-btn-2">
                                        <i class="flaticon-chevron"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>
            <div class="it-destination-slider-wrap">
                <div class="swiper-container it-popular-active">
                    <div class="swiper-wrapper">

                        <?php foreach ($od_destination_slider_content_wrap as $single_destination_wrap3):
                            $od_destination_thumb_url3 = $single_destination_wrap3['od_destination_slider_image'];
                        ?>
                            <div class="swiper-slide">
                                <div class="it-destination-item p-relative">
                                    <div class="it-destination-thumb">
                                        <a href="<?php echo esc_url($single_destination_wrap3['od_destination_slider_url'], 'ordainit-toolkit'); ?>">
                                            <img src="<?php echo esc_url($od_destination_thumb_url3['url'], 'ordainit-toolkit'); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="it-destination-content">
                                        <h3 class="it-destination-title"><a href="<?php echo esc_url($single_destination_wrap3['od_destination_slider_url'], 'ordainit-toolkit'); ?>"><?php echo esc_html($single_destination_wrap3['od_destination_slider_title'], 'ordainit-toolkit'); ?></a></h3>
                                        <span><?php echo esc_html($single_destination_wrap3['od_destination_slider_subtitle'], 'ordainit-toolkit'); ?></span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-4'): ?>

            <div class="swiper-container it-travel-feat-active">
                <div class="swiper-wrapper">

                    <?php foreach ($od_destination_slider_content_wrap as $single_destination_wrap4):
                        $od_destination_thumb_url4 = $single_destination_wrap4['od_destination_slider_image'];
                    ?>
                        <div class="swiper-slide">
                            <div class="it-travel-feat-item p-relative">
                                <div class="it-travel-feat-thumb fix p-relative mb-25">
                                    <img src="<?php echo esc_url($od_destination_thumb_url4['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <h3 class="it-travel-feat-title text-center"><?php echo esc_html($single_destination_wrap4['od_destination_slider_title'], 'ordainit-toolkit'); ?></h3>
                                <div class="it-travel-feat-content z-index text-center">
                                    <h3 class="it-travel-feat-title">
                                        <a href="<?php echo esc_url($single_destination_wrap4['od_destination_slider_url'], 'ordainit-toolkit'); ?>"><?php echo esc_html($single_destination_wrap4['od_destination_slider_title'], 'ordainit-toolkit'); ?></a>
                                    </h3>
                                    <p><?php echo od_kses($single_destination_wrap4['od_destination_slider_description'], 'ordainit-toolkit'); ?></p>
                                    <div class="it-travel-feat-button">
                                        <a href="<?php echo esc_url($single_destination_wrap4['od_destination_slider_url'], 'ordainit-toolkit'); ?>"><?php echo esc_html($single_destination_wrap4['od_destination_slider_btn_text'], 'ordainit-toolkit'); ?></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>


            <div class="it-destination-slider-wrap">
                <div class="swiper-container it-destination-slider-active">
                    <div class="swiper-wrapper">
                        <?php foreach ($od_destination_slider_content_wrap as $single_destination_wrap):
                            $od_destination_thumb_url = $single_destination_wrap['od_destination_slider_image'];
                        ?>
                            <div class="swiper-slide">
                                <div class="it-destination-item p-relative">
                                    <div class="it-destination-thumb">
                                        <img src="<?php echo esc_url($od_destination_thumb_url['url'], 'ordainit-toolkit'); ?>" alt="">
                                    </div>
                                    <div class="it-destination-content">
                                        <h3 class="it-destination-title"><a href="<?php echo esc_url($single_destination_wrap['od_destination_slider_url'], 'ordainit-toolkit'); ?>"><?php echo esc_html($single_destination_wrap['od_destination_slider_title'], 'ordainit-toolkit'); ?></a></h3>
                                        <span><?php echo esc_html($single_destination_wrap['od_destination_slider_subtitle'], 'ordainit-toolkit'); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>
                </div>
            </div>



        <?php endif; ?>








        <script>
            jQuery(document).ready(function($) {

                ////////////////////////////////////////////////////
                // 16. Swiper Js

                const desination_slider_autoplay = <?php echo $od_destination_slider_autoplay_switcher ? 'true' : 'false'; ?>;
                const destiNationswiper = new Swiper('.it-destination-slider-active', {
                    speed: 1000,
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: desination_slider_autoplay ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 4,
                        },
                        '1200': {
                            slidesPerView: 4,
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


                ////////////////////////////////////////////////////
                // 19. Swiper Js
                const desination_slider_autoplay2 = <?php echo $od_destination_slider_autoplay_switcher ? 'true' : 'false'; ?>;
                const destiNation2swiper = new Swiper(".it-destination-2-active", {
                    speed: 1000,
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: desination_slider_autoplay2 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        1400: {
                            slidesPerView: 4,
                        },
                        1200: {
                            slidesPerView: 4,
                        },
                        992: {
                            slidesPerView: 4,
                        },
                        768: {
                            slidesPerView: 4,
                        },
                        576: {
                            slidesPerView: 3,
                        },
                        0: {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: ".destination-2-prev",
                        nextEl: ".destination-2-next",
                    },
                });

                ////////////////////////////////////////////////////
                // 17. Swiper Js
                const desination_slider_autoplay3 = <?php echo $od_destination_slider_autoplay_switcher ? 'true' : 'false'; ?>;
                const poPularswiper = new Swiper(".it-popular-active", {
                    speed: 1000,
                    slidesPerView: 6,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: desination_slider_autoplay3 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        1400: {
                            slidesPerView: 6,
                        },
                        1200: {
                            slidesPerView: 4,
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
                // 18. Swiper Js
                const desination_slider_autoplay4 = <?php echo $od_destination_slider_autoplay_switcher ? 'true' : 'false'; ?>;
                const travelFeatwiper = new Swiper(".it-travel-feat-active", {
                    speed: 1000,
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: desination_slider_autoplay4 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        1400: {
                            slidesPerView: 4,
                        },
                        1200: {
                            slidesPerView: 4,
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



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Destination_Slider());
