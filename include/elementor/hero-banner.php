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
class OD_Hero_Banner extends Widget_Base
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
        return 'od-hero-banner';
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
        return __('Hero banner', 'ordainit-toolkit');
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Background
        $this->start_controls_section(
            'od_section_background',
            [
                'label' => __('Background Image', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-3']
                ],
            ]

        );

        $this->add_control(
            'od_section_background_image',
            [
                'label' => esc_html__('Choose Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-3/hero/hero-bg.jpg',
                ],
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-3']
                ],
            ]
        );

        $this->add_control(
            'od_section_background_overlay',
            [
                'label' => esc_html__('BG Overlay Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slider-2-ovarlay::before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]
        );

        $this->end_controls_section();

        // Title & Content
        $this->start_controls_section(
            'od_section_content',
            [
                'label' => __('Title & Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_subtitle',
            [
                'label' => __('Subtitle', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Subtitle', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your subtitle here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2']
                ],
            ]
        );
        $this->add_control(
            'od_description',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Description', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your Description here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            'od_section_button',
            [
                'label' => __('Button', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_btn_text',
            [
                'label' => esc_html__('Button Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'ordainit-toolkit'),
                'title' => esc_html__('Enter button text', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_btn_link',
            [
                'label' => esc_html__('Button link', 'ordainit-toolkit'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('htods://your-link.com', 'ordainit-toolkit'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'od_btn_link_type' => '1',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => od_get_all_pages(),
                'condition' => [
                    'od_btn_link_type' => '2',
                ]
            ]
        );

        $this->end_controls_section();


        // Customer Box Section
        $this->start_controls_section(
            'od_customer_box',
            [
                'label' => __('Customer Box', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]

        );

        // Switcher
        $this->add_control(
            'od_customer_box_switcher',
            [
                'label' => esc_html__('Show Customer Box', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        //Thumbnail
        $this->add_control(
            'od_custom_box_thumbnail_image',
            [
                'label' => esc_html__('Choose Customer Box Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-3/hero/shape/customer.png',
                ],
            ]
        );
        // Text
        $this->add_control(
            'od_custom_box_text',
            [
                'label' => __('Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Customer Box Text', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Form Section
        $this->start_controls_section(
            'od_form_section',
            [
                'label' => __('Form Area', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]
        );

        // Switcher
        $this->add_control(
            'od_form_section_switcher',
            [
                'label' => esc_html__('Show Form Area', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        // Placeholder text
        $this->add_control(
            'od_form_input_placeholder',
            [
                'label' => __('Placeholder', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Where are you going?', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Thumbnail Section
        $this->start_controls_section(
            'od_section_thumbnail',
            [
                'label' => __('Thumbnail', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_thumbnail_image',
            [
                'label' => esc_html__('Choose Big Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-3/about/thumb/about-3-1.png',
                ],
            ]
        );
        $this->add_control(
            'od_thumbnail_image_2',
            [
                'label' => esc_html__('Choose Small Image ', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-3/hero/thumb/hero-sm-thumb.jpg',
                ],
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->end_controls_section();

        // Shape
        $this->start_controls_section(
            'od_section_shape',
            [
                'label' => __('Shape', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_shape_image_1',
            [
                'label' => esc_html__('Choose Shape 1', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-3/about/shape/rocket.png',
                ],
            ]
        );

        $this->add_control(
            'od_shape_image_2',
            [
                'label' => esc_html__('Choose Shape 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/cloud.png',
                ],
            ]
        );

        $this->add_control(
            'od_shape_image_3',
            [
                'label' => esc_html__('Choose Shape 3', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/cloud.png',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->end_controls_section();

        // Banner Section Style
        $this->start_controls_section(
            'od_banner_section_style',
            [
                'label' => __('Section BG Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'od_banner_section_bgcolor',
            [
                'label' => esc_html__('Banner BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grey-bg' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Title & Content Style
        $this->start_controls_section(
            'od_title_content_style',
            [
                'label' => __('Title & Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Title Style
        $this->add_control(
            'od_title_color',
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
                'name' => 'od_title_typography',
                'selector' => '{{WRAPPER}} .it-slider-title',
            ]
        );

        // SubTitle Style
        $this->add_control(
            'od_subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-1']
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
                'name' => 'od_subtitle_typography',
                'selector' => '{{WRAPPER}} .it-section-subtitle',
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-1']
                ],
            ]
        );

        // Description Style
        $this->add_control(
            'od_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-hero-title-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_description_typography',
                'selector' => '{{WRAPPER}} .it-hero-title-box p',
            ]
        );

        $this->end_controls_section();



        // Button Style
        $this->start_controls_section(
            'od_btn_style',
            [
                'label' => __('Button Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-1']
                ],
            ]
        );

        $this->start_controls_tabs(
            'od_btn_style_tabs'
        );

        $this->start_controls_tab(
            'od_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_btn_style_normal_color',
            [
                'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_btn_style_normal_bgcolor',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_btn_style_hover_color',
            [
                'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_btn_style_hover_bgcolor',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_button_typography',
                'selector' => '{{WRAPPER}} .it-btn-primary',
            ]
        );

        $this->end_controls_section();

        // Customer Box Style
        $this->start_controls_section(
            'od_customer_box_text_style',
            [
                'label' => __('Customer Box Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_customer_box_text_color',
            [
                'label' => esc_html__('Customer Box Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-hero-customer-text span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Customer Box Text Typography', 'ordainit-toolkit'),
                'name' => 'od_customer_box_text_typography',
                'selector' => '{{WRAPPER}}  .it-hero-customer-text span',
            ]
        );


        $this->end_controls_section();
        // Form Section
        $this->start_controls_section(
            'od_form_style',
            [
                'label' => __('Form Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]
        );

        $this->add_control(
            'od_form_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-slider-2-input input::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Placeholder Typography', 'ordainit-toolkit'),
                'name' => 'od_form_placeholder_typography',
                'selector' => '{{WRAPPER}}  .it-slider-2-input input::placeholder',
            ]
        );

        // Form Button style
        $this->start_controls_tabs(
            'od_form_btn_style_tabs'
        );

        $this->start_controls_tab(
            'od_form_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_form_btn_style_normal_color',
            [
                'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_form_btn_style_normal_bgcolor',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_form_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_form_btn_style_hover_color',
            [
                'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_form_btn_style_hover_bgcolor',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_form_btnr_typography',
                'selector' => '{{WRAPPER}}  .it-btn-primary',
            ]
        );


        $this->end_controls_section();

        // Thumbnail Shape Style
        $this->start_controls_section(
            'od_thumbnail_shape_style',
            [
                'label' => __('Thumbnail Shape Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'od_thumbnail_shape_bgcolor',
            [
                'label' => esc_html__('Shape BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-about-style-3 .it-about-thumb-shape' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-about-style-3 .it-about-thumb-shape::before, {{WRAPPER}}  .it-about-style-3 .it-about-thumb-shape::after' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .it-about-style-3 .it-about-thumb-shape::after' => 'background-color: {{VALUE}}',
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
        $od_title = $settings['od_title'];
        $od_subtitle = $settings['od_subtitle'];
        $od_description = $settings['od_description'];
        $od_btn_text = $settings['od_btn_text'];
        $od_btn_link_type = $settings['od_btn_link_type'];
        $od_btn_link = $settings['od_btn_link'];
        $od_btn_page_link = $settings['od_btn_page_link'];
        $od_thumbnail_image = $settings['od_thumbnail_image'];
        $od_thumbnail_image_2 = $settings['od_thumbnail_image_2'];
        $od_shape_image_1 = $settings['od_shape_image_1'];
        $od_shape_image_2 = $settings['od_shape_image_2'];
        $od_shape_image_3 = $settings['od_shape_image_3'];
        $od_section_background_image = $settings['od_section_background_image'];
        $od_customer_box_switcher = $settings['od_customer_box_switcher'];
        $od_custom_box_thumbnail_image = $settings['od_custom_box_thumbnail_image'];
        $od_custom_box_text = $settings['od_custom_box_text'];
        $od_form_section_switcher = $settings['od_form_section_switcher'];
        $od_form_input_placeholder = $settings['od_form_input_placeholder'];



?>
        <?php if ($settings['od_design_style']  == 'layout-2'):

            // Link
            if ('2' == $od_btn_link_type) {
                $this->add_render_attribute('od-button-arg', 'href', get_permalink($od_btn_page_link));
                $this->add_render_attribute('od-button-arg', 'target', '_self');
                $this->add_render_attribute('od-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('od-button-arg', 'class', 'it-btn-primary');
            } else {
                if (! empty($od_btn_link['url'])) {
                    $this->add_link_attributes('od-button-arg', $od_btn_link);
                    $this->add_render_attribute('od-button-arg', 'class', 'it-btn-primary');
                }
            }
        ?>

            <div class="it-hero-area fix it-hero-overlay it-hero-height it-hero-bg p-relative" style="background-image: url('<?php echo esc_url($od_section_background_image['url'], 'ordainit-toolkit'); ?>')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="it-hero-content-wrap p-relative">
                                <div class="it-hero-content-shape d-none d-md-block">
                                    <?php
                                    $alt_text_4 = str_replace(['-', '_'], ' ', pathinfo($od_shape_image_1['url'], PATHINFO_FILENAME));
                                    ?>
                                    <img src="<?php echo $od_shape_image_1['url'] ?>" alt="<?php echo esc_attr($alt_text_4); ?>">
                                </div>
                                <div class="it-hero-title-box mb-30">
                                    <span class="it-section-subtitle wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s"><?php echo od_kses($od_subtitle, 'ordainit-toolkit') ?></span>
                                    <h3 class="it-section-title mb-20 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s"><?php echo od_kses($od_title, 'ordainit-toolkit') ?></h3>
                                    <p class="wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s"><?php echo od_kses($od_description, 'ordainit-toolkit') ?></p>
                                </div>
                                <div class="it-hero-button-area d-flex align-items-center wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".8s">
                                    <div class="it-hero-action mr-20">
                                        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                            <?php echo esc_html($od_btn_text, 'ordainit-toolkit') ?>
                                        </a>
                                    </div>
                                    <div class="it-hero-customer-box-wrap d-none d-sm-block">
                                        <?php if (!empty($od_customer_box_switcher)) : ?>
                                            <div class="it-hero-customer-box d-flex align-items-center">
                                                <div class="it-hero-customer-thumb mr-15">
                                                    <?php
                                                    $alt_text_4 = str_replace(['-', '_'], ' ', pathinfo($od_custom_box_thumbnail_image['url'], PATHINFO_FILENAME));
                                                    ?>
                                                    <img src="<?php echo $od_custom_box_thumbnail_image['url'] ?>" alt="<?php echo esc_attr($alt_text_4); ?>">
                                                </div>
                                                <div class="it-hero-customer-text">
                                                    <span><?php echo od_kses($od_custom_box_text, 'ordainit-toolkit') ?></span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="it-hero-thumb-box p-relative">
                                <div class="it-hero-thumb-shape d-none d-sm-block">
                                    <?php
                                    $alt_text_3 = str_replace(['-', '_'], ' ', pathinfo($od_shape_image_2['url'], PATHINFO_FILENAME));
                                    ?>
                                    <img src="<?php echo $od_shape_image_2['url'] ?>" alt="<?php echo esc_attr($alt_text_3); ?>">
                                </div>
                                <div class="it-hero-thumb p-relative">
                                    <?php
                                    $alt_text_1 = str_replace(['-', '_'], ' ', pathinfo($od_thumbnail_image['url'], PATHINFO_FILENAME));
                                    ?>
                                    <img src="<?php echo $od_thumbnail_image['url'] ?>" alt="<?php echo esc_attr($alt_text_1); ?>">
                                    <div class="it-hero-sub-thumb">
                                        <?php
                                        $alt_text_2 = str_replace(['-', '_'], ' ', pathinfo($od_thumbnail_image_2['url'], PATHINFO_FILENAME));
                                        ?>
                                        <img src="<?php echo $od_thumbnail_image_2['url'] ?>" alt="<?php echo esc_attr($alt_text_2); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>
            <div class="it-slider-2-area it-slider-2-ovarlay it-slider-2-height p-relative">
                <div class="it-slider-2-bg" style="background-image: url('<?php echo $od_section_background_image['url'] ?>');"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="it-slider-2-content-wrap z-index-5">
                                <div class="it-slider-2-text">
                                    <h3 class="it-slider-title mb-20 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s"><?php echo od_kses($od_title, 'ordainit-toolkit') ?></h3>
                                    <p class="wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s"><?php echo od_kses($od_description, 'ordainit-toolkit') ?></p>
                                </div>
                                <?php if (!empty($od_form_section_switcher)) : ?>
                                    <div class="it-slider-2-form p-relative wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                                        <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                                            <div class="it-slider-2-input">
                                                <input type="text" name="s" placeholder="<?php echo esc_attr($od_form_input_placeholder); ?>" value="<?php echo get_search_query(); ?>">
                                            </div>
                                            <button class="it-btn-primary" type="submit">Search</button>
                                        </form>

                                        <div class="it-slider-2-input-icon">
                                            <i class="flaticon-origami"></i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else:

            // Link
            if ('2' == $od_btn_link_type) {
                $this->add_render_attribute('od-button-arg', 'href', get_permalink($od_btn_page_link));
                $this->add_render_attribute('od-button-arg', 'target', '_self');
                $this->add_render_attribute('od-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('od-button-arg', 'class', 'it-btn-primary');
            } else {
                if (! empty($od_btn_link['url'])) {
                    $this->add_link_attributes('od-button-arg', $od_btn_link);
                    $this->add_render_attribute('od-button-arg', 'class', 'it-btn-primary');
                }
            }
        ?>


            <div class="it-hero-area it-hero-3 it-hero-3-space it-about-style-3 grey-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="it-hero-content-wrap p-relative">
                                <div class="it-hero-title-box mb-30">
                                    <span class="it-section-subtitle wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s"><?php echo od_kses($od_subtitle, 'ordainit-toolkit') ?></span>
                                    <h3 class="it-slider-title mb-20 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s"><?php echo od_kses($od_title, 'ordainit-toolkit') ?></h3>
                                    <p class="wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s"><?php echo od_kses($od_description, 'ordainit-toolkit') ?></p>
                                </div>
                                <div class="it-hero-button-area d-flex align-items-center wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                                    <div class="it-hero-action mr-20">
                                        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                            <?php echo esc_html($od_btn_text, 'ordainit-toolkit') ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="it-about-thumb-wrap it-hero-3-thumb-pl d-flex justify-content-center">
                                <div class="it-about-main-thumb z-index p-relative">
                                    <?php
                                    $alt_text_1 = str_replace(['-', '_'], ' ', pathinfo($od_thumbnail_image['url'], PATHINFO_FILENAME));
                                    ?>
                                    <img src="<?php echo $od_thumbnail_image['url'] ?>" alt="<?php echo esc_attr($alt_text_1); ?>">

                                    <span class="it-about-thumb-shape"></span>
                                    <div class="it-about-thumb-rocket d-none d-sm-block">
                                        <?php
                                        $alt_text_2 = str_replace(['-', '_'], ' ', pathinfo($od_shape_image_1['url'], PATHINFO_FILENAME));
                                        ?>
                                        <img src="<?php echo $od_shape_image_1['url'] ?>" alt="<?php echo esc_attr($alt_text_2); ?>">
                                    </div>
                                    <div class="it-about-thumb-cloud-1 d-none d-sm-block">
                                        <span>
                                            <?php
                                            $alt_text_3 = str_replace(['-', '_'], ' ', pathinfo($od_shape_image_2['url'], PATHINFO_FILENAME));
                                            ?>
                                            <img src="<?php echo $od_shape_image_2['url'] ?>" alt="<?php echo esc_attr($alt_text_3); ?>">

                                        </span>
                                    </div>
                                    <div class="it-about-thumb-cloud-2 d-none d-sm-block">
                                        <span>
                                            <?php
                                            $alt_text_3 = str_replace(['-', '_'], ' ', pathinfo($od_shape_image_3['url'], PATHINFO_FILENAME));
                                            ?>
                                            <img src="<?php echo $od_shape_image_3['url'] ?>" alt="<?php echo esc_attr($alt_text_3); ?>">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>



        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Hero_Banner());
